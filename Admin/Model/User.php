<?php
require_once "Database.php";

class User
{
    private $id;
    private $name;
    private $username;
    private $password;
    private $email;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username): self
    {
        $this->username = $username;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password): self
    {
        $this->password = $password;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): self
    {
        $this->email = $email;
        return $this;
    }

    public function login($username, $password)
    {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $conn = $db->getConnection();
        $sql = "select * from users where username=? and password = ?";
        $user = new User();
        $flag = false;
        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

            // Set parameters
            $param_username = $username;
            $param_password = $password;
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records updated successfully. Redirect to landing page
                $res = mysqli_stmt_get_result($stmt);
                $ct = mysqli_num_rows($res);
                if ($ct > 0) {
                    while ($row = mysqli_fetch_array($res)) {
                        $user = new User();
                        $user->setId($row["id"]);
                        $user->setName($row["name"]);
                        $user->setUsername($row["username"]);
                        $user->setPassword($row["password"]);
                        $user->setEmail($row["email"]);}
                        $flag = true;
                }
            } else {
                echo (mysqli_stmt_error($stmt));
                $flag = false;
            }
            mysqli_stmt_close($stmt);
        }

        if ($flag == true) {
            return $user;
        } else {
            return false;
        }

    }

    public function addUser($user)
    {
        $flag = true;
        $db = Database::getInstance();
        $conn = $db->getConnection();
        // var_dump($member);
        $sql = "INSERT INTO users (name, username ,password, email) VALUES (?,?,?,?)";
        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_Name, $param_username, $param_password, $param_email);

            // Set parameters
            $param_Name = $user->getUsername();
            $param_username = $user->getUsername();
            $param_password = $user->getPassword();
            $param_email = $user->getEmail();

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

    

}
