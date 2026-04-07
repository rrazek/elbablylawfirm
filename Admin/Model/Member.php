<?php
require_once "Database.php";

interface iMember
{
    public function addMember($member);
    function updateMember($id, $member);
    function removeMember($id);
    function getMember($id);
    function getMembers($state, $size);

    function hideMember($id);

    function showMember($id);
}
class Member implements iMember {

    private $id;
    private $name;
    private $bio;

    private $position;
    private $twitter;
    private $facebook;
    private $linkedIn;
    private $whatsapp;
    private $status;
    private $stateName;

    private $image;
    

	function getId() {
		return $this->id;
	}
	
	/**
	 * 
	 * @param mixed $id 
	 * @return Member
	 */
	function setId($id): self {
		$this->id = $id;
		return $this;
	}
	
	/**
	 * 
	 * @return mixed
	 */
	function getName() {
		return $this->name;
	}
	
	/**
	 * 
	 * @param mixed $name 
	 * @return Member
	 */
	function setName($name): self {
		$this->name = $name;
		return $this;
	}
	
	/**
	 * 
	 * @return mixed
	 */
	function getPosition() {
		return $this->position;
	}
	
	/**
	 * 
	 * @param mixed $position 
	 * @return Member
	 */
	function setPosition($position): self {
		$this->position = $position;
		return $this;
	}
	
	/**
	 * 
	 * @return mixed
	 */
	function getTwitter() {
		return $this->twitter;
	}

	function setStateName($state){
		$this->stateName=$state;
	}
	function getStateName(){
		return $this->stateName;
	}
	
	/**
	 * 
	 * @param mixed $twitter 
	 * @return Member
	 */
	function setTwitter($twitter): self {
		$this->twitter = $twitter;
		return $this;
	}
	
	/**
	 * 
	 * @return mixed
	 */
	function getFacebook() {
		return $this->facebook;
	}
	
	/**
	 * 
	 * @param mixed $facebook 
	 * @return Member
	 */
	function setFacebook($facebook): self {
		$this->facebook = $facebook;
		return $this;
	}
	
	/**
	 * 
	 * @return mixed
	 */
	function getLinkedIn() {
		return $this->linkedIn;
	}
	
	/**
	 * 
	 * @param mixed $linkedIn 
	 * @return Member
	 */
	function setLinkedIn($linkedIn): self {
		$this->linkedIn = $linkedIn;
		return $this;
	}
	
	/**
	 * 
	 * @return mixed
	 */
	function getWhatsapp() {
		return $this->whatsapp;
	}
	
	/**
	 * 
	 * @param mixed $whatsapp 
	 * @return Member
	 */
	function setWhatsapp($whatsapp): self {
		$this->whatsapp = $whatsapp;
		return $this;
	}
	
	/**
	 * 
	 * @return mixed
	 */
	function getStatus() {
		return $this->status;
	}
	
	/**
	 * 
	 * @param mixed $status 
	 * @return Member
	 */
	function setStatus($status): self {
		$this->status = $status;
		return $this;
	}
	/**
	 *
	 * @param mixed $article
	 *
	 * @return mixed
	 */
	function addMember($member) {
        $flag = true;
        $db = Database::getInstance();
        $conn = $db->getConnection();
		// var_dump($member);
        $sql = "INSERT INTO members (Name, Bio ,Position, Twitter,Facebook,LinkedIn,Whatsapp,image) VALUES (?,?,?,?,?,?,?,?)";
		if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
			mysqli_stmt_bind_param($stmt, "ssssssss", $param_Name,$param_bio ,$param_position, $param_twitter, $param_facebook, $param_linkedIn, $param_whatsapp,$param_image);

            // Set parameters
            $param_Name = $member->getName();
            $param_bio = $member->getBio();
            $param_position = $member->getPosition();
            $param_twitter = $member->getTwitter();
            $param_facebook = $member->getFacebook();
            $param_linkedIn = $member->getLinkedIn();
            $param_whatsapp = $member->getWhatsapp();
            $param_image = $member->getImage();

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to landing page
                $flag=true;
            } else {
                echo $stmt->error;
                $flag=false;
            }
        }
        // Close statement
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        return $flag;

	}
	
	/**
	 *
	 * @param mixed $id
	 * @param mixed $article
	 *
	 * @return mixed
	 */
	function updateMember($id, $member) {
	        $flag=true;
        $db = Database::getInstance();
        $conn = $db->getConnection();
        // var_dump ($member);
        $sql = "UPDATE members SET Name=?,Bio=?, Position=?, Twitter=? ,Facebook=?,LinkedIn=?,Whatsapp=? ,Image=? WHERE id=?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            // echo "in";

            mysqli_stmt_bind_param($stmt, "ssssssssi", $param_Name,$param_bio ,$param_position, $param_twitter, $param_facebook, $param_linkedIn, $param_whatsapp,$param_image,$param_id);
            // Set parameters
            $param_Name = $member->getName();
            $param_bio = $member->getBio();
            $param_position = $member->getPosition();
            $param_twitter = $member->getTwitter();
            $param_facebook = $member->getFacebook();
            $param_linkedIn = $member->getLinkedIn();
            $param_whatsapp = $member->getWhatsapp();
            $param_image = $member->getImage();
            $param_id = $id;
            // echo "in func";

            // Attempt to execute the prepared statement

            if (mysqli_stmt_execute($stmt)) {
                // Records updated successfully. Redirect to landing page
                $flag=true;
            } else {
                echo(mysqli_stmt_error($stmt));
                echo "Something went wrong. Please try again later.";
                $flag= false;
            }
        }
        // Close statement
        mysqli_stmt_close($stmt);
        return $flag;
	}
	
	/**
	 *
	 * @param mixed $id
	 *
	 * @return mixed
	 */
	function removeMember($id) {
        $flag= true;
        $db = Database::getInstance();
        $conn = $db->getConnection();

        // Prepare a delete statement
        $sql = "DELETE FROM members WHERE id = ?";

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

        }

        // Close statement
        mysqli_stmt_close($stmt);

        // Close connection
        mysqli_close($conn);
        return $flag;
	}
	
	/**
	 *
	 * @param mixed $id
	 *
	 * @return mixed
	 */
	function getMember($id) {
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $sql = "select * from members join state on members.status = state.id where members.id = " . $id;

        $ArticlesDataSet = $conn->query($sql) or die($conn->error);
        $i = 0;
        $Result = array();
        while ($row = mysqli_fetch_array($ArticlesDataSet)) {
			$Member = new Member();
            $Member->setId($row["ID"]);
            $Member->setName($row["Name"]);
            $Member->setBio($row["bio"]);
            $Member->setPosition($row["Position"]);
            $Member->setTwitter($row["Twitter"]);
            $Member->setFacebook($row["Facebook"]);
            $Member->setLinkedIn($row["LinkedIn"]);
            $Member->setWhatsapp($row["Whatsapp"]);
            $Member->setImage($row["image"]);
            $Member->setStatus($row["Status"]);
            $Member->setStateName($row["StateName"]);
			
            $Result[$i] = $Member;
            $i++;
        }
        return $Result;
	}
	
	/**
	 *
	 * @param mixed $state
	 * @param mixed $size
	 *
	 * @return mixed
	 */
	function getMembers($state, $size) {
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $sql = "select * from members join state on members.status = state.id";
        if ($state == 1) {
            $sql .= " where status= 1 ";
        } else {}
        // $sql .= " order by date desc ";
        if ($size != -1) {
            $sql .= " LIMIT $size";
        }

        $MembersDataSet = $conn->query($sql) or die($conn->error);
		$i = 0;
        $Result = array();
        while ($row = mysqli_fetch_array($MembersDataSet)) {
            $Member = new Member();
            $Member->setId($row["ID"]);
            $Member->setName($row["Name"]);
            $Member->setBio($row["bio"]);
            $Member->setPosition($row["Position"]);
            $Member->setTwitter($row["Twitter"]);
            $Member->setFacebook($row["Facebook"]);
            $Member->setLinkedIn($row["LinkedIn"]);
            $Member->setWhatsapp($row["Whatsapp"]);
            $Member->setImage($row["image"]);
            $Member->setStatus($row["Status"]);
            $Member->setStateName($row["StateName"]);
			
            $Result[$i] = $Member;
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
	function hideMember($id) {
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $sql = "UPDATE members SET  Status=? WHERE id=?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_status, $param_id);

            // Set parameters
            $param_status = "2";
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
	}
	
	/**
	 *
	 * @param mixed $id
	 *
	 * @return mixed
	 */
	function showMember($id) {
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $sql = "UPDATE members SET  Status=? WHERE id=?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_status, $param_id);

            // Set parameters
            $param_status = "1";
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
        return false;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getImage() {
		return $this->image;
	}
	
	/**
	 * 
	 * @param mixed $image 
	 * @return Member
	 */
	function setImage($image): self {
		$this->image = $image;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getBio() {
		return $this->bio;
	}
	
	/**
	 * 
	 * @param mixed $bio 
	 * @return Member
	 */
	function setBio($bio): self {
		$this->bio = $bio;
		return $this;
	}
}
