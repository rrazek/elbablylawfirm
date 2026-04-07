<?php
require_once "Database.php";

interface iMessage
{
    public function addMessage($message);
    function getMessage($id);
    function getMessages($state, $size);

    function removeMessage($id);

    function seenMessage($id);

    function unseenMessage($id);
}

class Message implements iMessage
{
    private $id;
    private $name;
    private $phone;

    private $email;
    private $type;
    private $content;
    private $seen;
    private $date;

    /**
     *
     * @return mixed
     */
    function getId()
    {
        return $this->id;
    }

    /**
     *
     * @param mixed $id
     * @return Message
     */
    function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     *
     * @return mixed
     */
    function getName()
    {
        return $this->name;
    }

    /**
     *
     * @param mixed $name
     * @return Message
     */
    function setName($name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     *
     * @return mixed
     */
    function getPhone()
    {
        return $this->phone;
    }

    /**
     *
     * @param mixed $phone
     * @return Message
     */
    function setPhone($phone): self
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     *
     * @return mixed
     */
    function getEmail()
    {
        return $this->email;
    }

    /**
     *
     * @param mixed $email
     * @return Message
     */
    function setEmail($email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     *
     * @return mixed
     */
    function getType()
    {
        return $this->type;
    }

    /**
     *
     * @param mixed $type
     * @return Message
     */
    function setType($type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     *
     * @return mixed
     */
    function getSeen()
    {
        return $this->seen;
    }

    /**
     *
     * @param mixed $seen
     * @return Message
     */
    function setSeen($seen): self
    {
        $this->seen = $seen;
        return $this;
    }
    /**
     *
     * @param mixed $message
     *
     * @return mixed
     */
    function addMessage($message)
    {
        $flag = true;
        $db = Database::getInstance();
        $conn = $db->getConnection();
        var_dump($message);
        $sql = "INSERT INTO messages (Name, phone ,email, type,message) VALUES (?,?,?,?,?)";
        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_Name, $param_phone, $param_email, $param_type, $param_message);

            // Set parameters
            $param_Name = $message->getName();
            $param_phone = $message->getPhone();
            $param_email = $message->getEmail();
            $param_type = $message->getType();
            $param_message = $message->getContent();

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to landing page
                $flag = true;
            } else {
                echo $stmt->error;
                $flag = false;
            }
            mysqli_stmt_close($stmt);
        }
        // Close statement
        
        mysqli_close($conn);
        return $flag;

    }

    /**
     *
     * @param mixed $state
     * @param mixed $size
     *
     * @return mixed
     */

    function getMessage($id)
    {
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $sql = "select * from messages where id = " . $id;
        $res = $conn->query($sql);
        $i = 0;
        $MessagesDataSet = $conn->query($sql) or die($conn->error());
        while ($row = mysqli_fetch_array($MessagesDataSet)) {
            $message = new Message();
            $message->setId($row["id"]);
            $message->setName($row["name"]);
            $message->setPhone($row["phone"]);
            $message->setEmail($row["email"]);
            $message->setType($row["type"]);
            $message->setContent($row["message"]);
            $message->setSeen($row["seen"]);
            $message->setDate($row["date"]);


            $Result[$i] = $message;
            $i++;
        }
        return $Result;
    }
    function getMessages($state, $size)
    {
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $sql = "select * from messages ";
        if ($state == 1) {
            $sql .= " where seen= 1 ";
        } else if ($state == 0) {
            $sql .= " where seen= 0 ";
        }
        $sql .= " order by seen asc , date desc";
        if ($size != -1) {
            $sql = " limit $size";
        }
        $res = $conn->query($sql);
        $MembersDataSet = $conn->query($sql) or die($conn->error());
        $i = 0;
        $Result = array();
        while ($row = mysqli_fetch_array($MembersDataSet)) {
            $message = new Message();
            $message->setId($row["id"]);
            $message->setName($row["name"]);
            $message->setPhone($row["phone"]);
            $message->setEmail($row["email"]);
            $message->setType($row["type"]);
            $message->setContent($row["message"]);
            $message->setSeen($row["seen"]);
            $message->setDate($row["date"]);

            $Result[$i] = $message;
            $i++;
        }
        return $Result;

    }

    /**
     *
     * @param mixed $id
     *
     * @return mixed
     */
    function seenMessage($id)
    {
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $sql = "UPDATE messages SET  Seen=? WHERE id=?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ii", $param_status, $param_id);

            // Set parameters
            $param_status = 1;
            $param_id = $id;
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records updated successfully. Redirect to landing page
                return true;
            } else {
                echo(mysqli_stmt_error($stmt));
                return false;
            }
            mysqli_stmt_close($stmt);
        }
        return false;
        // Close statement
	}

    /**
     *
     * @param mixed $id
     *
     * @return mixed
     */
    function unseenMessage($id)
    {
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $sql = "UPDATE messages SET  Seen=? WHERE id=?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ii", $param_status, $param_id);

            // Set parameters
            $param_status = 0;
            $param_id = $id;
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records updated successfully. Redirect to landing page
                return true;
            } else {
                echo(mysqli_stmt_error($stmt));
                return false;
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
        return false;
    }
    /**
     *
     * @return mixed
     */
    function getContent()
    {
        return $this->content;
    }

    /**
     *
     * @param mixed $content
     * @return Message
     */
    function setContent($content): self
    {
        $this->content = $content;
        return $this;
    }
	/**
	 *
	 * @param mixed $id
	 *
	 * @return mixed
	 */
	function removeMessage($id) {
        $flag= true;
        $db = Database::getInstance();
        $conn = $db->getConnection();

        // Prepare a delete statement
        $sql = "DELETE FROM messages WHERE id = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            // Set parameters
            $param_id = $id;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records deleted successfully. Redirect to landing page
                $flag= true;
            } else {
                echo "Oops! Something went wrong. Please try again later.";
                $flag= false;
            }
            mysqli_stmt_close($stmt);
        }

        // Close statement
        // Close connection
        mysqli_close($conn);
        return $flag;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getDate() {
		return $this->date;
	}
	
	/**
	 * 
	 * @param mixed $date 
	 * @return Message
	 */
	function setDate($date): self {
		$this->date = $date;
		return $this;
	}
}
