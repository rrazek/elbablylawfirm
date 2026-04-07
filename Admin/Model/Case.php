<?php
require_once "Database.php";

interface iCase
{
    public function addCase($case);
    function updateCase($id, $case);
    function removeCase($id);
    function getCase($id);
    function getCases($state, $size);

    function hideCase($id);

    function showCase($id);
}
class CaseClass implements iCase {
    private $id;
    private $name;
    private $description;
    private $status;
    private $stateName;
    private $image;
    private $date;
    private $cat;
    private $catName;

	/**
	 * 
	 * @return mixed
	 */
	function getId() {
		return $this->id;
	}
	
	/**
	 * 
	 * @param mixed $id 
	 * @return CaseClass
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
	 * @return CaseClass
	 */
	function setName($name): self {
		$this->name = $name;
		return $this;
	}
	
	/**
	 * 
	 * @return mixed
	 */
	function getDescription() {
		return $this->description;
	}
	
	/**
	 * 
	 * @param mixed $description 
	 * @return CaseClass
	 */
	function setDescription($description): self {
		$this->description = $description;
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
	 * @return CaseClass
	 */
	function setStatus($status): self {
		$this->status = $status;
		return $this;
	}
	
	/**
	 * 
	 * @return mixed
	 */
	function getStateName() {
		return $this->stateName;
	}
	
	/**
	 * 
	 * @param mixed $stateName 
	 * @return CaseClass
	 */
	function setStateName($stateName): self {
		$this->stateName = $stateName;
		return $this;
	}
	/**
	 *
	 * @param mixed $case
	 *
	 * @return mixed
	 */
	function addCase($case) {
        $flag = false;
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $sql = "INSERT INTO cases (Name, Cat, Description,Image,Date) VALUES (?,?,?,?,?)";
        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sisss", $param_name, $param_cat, $param_description, $param_image,$param_date);

            // Set parameters
            $param_name = $case->getName();
            $param_cat = $case->getCat();
            $param_description = $case->getDescription();
            $param_image = $case->getImage();
            $param_date = $case->getDate();

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to landing page
                $flag= true;
            } else {
                echo $stmt->error;
                $flag= false;
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
	 * @param mixed $case
	 *
	 * @return mixed
	 */
	function updateCase($id, $case) {
        $flag=true;
        $db = Database::getInstance();
        $conn = $db->getConnection();
        var_dump ($case);
        $sql = "UPDATE cases SET Name=?,Cat=?, Description=? ,Image=? , Date = ? WHERE id=?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            // echo "in";

            mysqli_stmt_bind_param($stmt, "sisssi", $param_Name,$param_Cat ,$param_description,$param_image,$param_date,$param_id);
            // Set parameters
            $param_Name = $case->getName();
            $param_Cat = $case->getCat();
            $param_description = $case->getDescription();
            $param_image = $case->getImage();
            $param_date = $case->getDate();
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
	function removeCase($id) {
        $flag= true;
        $db = Database::getInstance();
        $conn = $db->getConnection();

        // Prepare a delete statement
        $sql = "DELETE FROM cases WHERE id = ?";

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
	function getCase($id) {
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $sql = "select * from cases join state on cases.status = state.id join Case_Category on Case_Category.id = cases.cat where cases.id = " . $id;
        $res = $conn->query($sql);

        $ArticlesDataSet = $conn->query($sql) or die($conn->error());
        $i = 0;
        $Result = array();
        while ($row = mysqli_fetch_array($ArticlesDataSet)) {
            $case = new CaseClass();
            $case->setId($row["ID"]);
            $case->setName($row["Name"]);
            $case->setCat($row["Cat"]);
            $case->setCatName($row["CatName"]);
            $case->setDescription($row["Description"]);
            $case->setImage($row["Image"]);
            $case->setDate($row["Date"]);
            $case->setStatus($row["Status"]);
            $case->setStateName($row["StateName"]);
            $Result[$i] = $case;
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
	function getCases($state, $size) {
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $sql = "select * from cases join state on cases.status = state.id join Case_Category on Case_Category.id = cases.cat ";
        if ($state == 1) {
            $sql .= " where status= 1 ";
        } else {}
        $sql .= " order by date desc ";
        if ($size != -1) {
            $sql = " limit $size";
        }
        $res = $conn->query($sql);
        $MembersDataSet = $conn->query($sql) or die($conn->error());
		$i = 0;
        $Result = array();
        while ($row = mysqli_fetch_array($MembersDataSet)) {
            $case = new CaseClass();
            $case->setId($row["ID"]);
            $case->setName($row["Name"]);
            $case->setCat($row["Cat"]);
            $case->setCatName($row["CatName"]);
            $case->setDescription($row["Description"]);
            $case->setImage($row["Image"]);
            $case->setDate($row["Date"]);
            $case->setStatus($row["Status"]);
            $case->setStateName($row["StateName"]);
            $Result[$i] = $case;
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
	function hideCase($id) {
        $flag = false;
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $sql = "UPDATE cases SET  Status=? WHERE id=?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_status, $param_id);

            // Set parameters
            $param_status = "2";
            $param_id = $id;
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records updated successfully. Redirect to landing page
                $flag= true;
            } else {
                echo(mysqli_stmt_error($stmt));
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
	function showCase($id) {
        $flag = false;
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $sql = "UPDATE cases SET  Status=? WHERE id=?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_status, $param_id);

            // Set parameters
            $param_status = "1";
            $param_id = $id;
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records updated successfully. Redirect to landing page
                $flag= true;
            } else {
                echo(mysqli_stmt_error($stmt));
                $flag= false;
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
        return $flag;
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
	 * @return CaseClass
	 */
	function setImage($image): self {
		$this->image = $image;
		return $this;
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
	 * @return CaseClass
	 */
	function setDate($date): self {
		$this->date = $date;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getCatName() {
		return $this->catName;
	}
	
	/**
	 * 
	 * @param mixed $catName 
	 * @return CaseClass
	 */
	function setCatName($catName): self {
		$this->catName = $catName;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getCat() {
		return $this->cat;
	}
	
	/**
	 * 
	 * @param mixed $cat 
	 * @return CaseClass
	 */
	function setCat($cat): self {
		$this->cat = $cat;
		return $this;
	}
	function getCategories(){
		$db = Database::getInstance();
        $conn = $db->getConnection();
        $sql = "select * from Case_Category ";
        
        $res = $conn->query($sql);
        $MembersDataSet = $conn->query($sql) or die($conn->error());
		$i = 0;
        $Result = array();
        while ($row = mysqli_fetch_array($MembersDataSet)) {
            $case = new CaseClass();
            $case->setCat($row["id"]);
            $case->setCatName($row["CatName"]);
            $Result[$i] = $case;
            $i++;
        }
        return $Result;
	}
}
