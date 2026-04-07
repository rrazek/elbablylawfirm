<?php
require_once "Database.php";

interface iLibrary
{
    public function addFile($library);
    function updateFile($id, $library);
    function removeFile($id);
    function getFile($id);
    function getFiles($state, $size);

    function hideFile($id);

    function showFile($id);
    function getLawCategories();

}
class Library implements iLibrary {
    private $id;
    private $filename;
    private $filepath;
    private $status;
    private $stateName;
    private $date;
    private $cat;
    private $catName;
	/**
	 *
	 * @param mixed $library
	 *
	 * @return mixed
	 */
	function addFile($library) {
        $flag = false;
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $sql = "INSERT INTO library (file_name, file_path, law_cat) VALUES (?,?,?)";
        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssi", $param_name,$param_path ,$param_cat);

            // Set parameters
            $param_name = $library->getFilename();
            $param_cat = $library->getCat();
            $param_path = $library->getFilepath();
            
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
	 * @param mixed $library
	 *
	 * @return mixed
	 */
	function updateFile($id, $library) {
        $flag=true;
        $db = Database::getInstance();
        $conn = $db->getConnection();
        // var_dump ($library);
        $sql = "UPDATE library SET file_name=?,law_cat=?, file_path=?  WHERE ID=?";
        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            // echo "in";

            mysqli_stmt_bind_param($stmt, "sisi", $param_name,$param_cat ,$param_path,$param_id);
            // Set parameters
            $param_name = $library->getFilename();
            $param_cat = $library->getCat();
            $param_path = $library->getFilepath();
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
	function removeFile($id) {
        $flag= true;
        $db = Database::getInstance();
        $conn = $db->getConnection();

        // Prepare a delete statement
        $sql = "DELETE FROM library WHERE ID = ?";

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

        // Close statement
        mysqli_stmt_close($stmt);

        // Close connection
        mysqli_close($conn);
        return $flag;
	}
}
	
	/**
	 *
	 * @param mixed $id
	 *
	 * @return mixed
	 */
	function getFile($id) {
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $sql = "select * from library join state on library.status = state.id join law_cat on law_cat.id = library.law_cat where library.id = " . $id;

        $ArticlesDataSet = $conn->query($sql) or die($conn->error);
        $i = 0;
        $Result = array();
        // echo $sql;
        while ($row = mysqli_fetch_array($ArticlesDataSet)) {
            $lib = new Library();
            $lib->setId($row["ID"]);
            $lib->setFilename($row["file_name"]);
            $lib->setCat($row["law_cat"]);
            $lib->setCatName($row["Name"]);
            $lib->setFilepath($row["file_path"]);
            $lib->setDate($row["date"]);
            $lib->setStatus($row["status"]);
            $lib->setStateName($row["StateName"]);
            $Result[$i] = $lib;
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
	function getFiles($state, $size) {
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $sql = "select * from library join state on library.status = state.id join law_cat on law_cat.id = library.law_cat ";
        if ($state == 1) {
            $sql .= " where status= 1 ";
        } else {}
        // $sql .= " order by date desc ";
        if ($size != -1) {
            $sql .= " LIMIT $size";
        }

        $filesDataSet = $conn->query($sql) or die($conn->error);
		$i = 0;
        $Result = array();
        while ($row = mysqli_fetch_array($filesDataSet)) {
            $lib = new Library();
            $lib->setId($row["ID"]);
            $lib->setFilename($row["file_name"]);
            $lib->setCat($row["law_cat"]);
            $lib->setCatName($row["Name"]);
            $lib->setFilepath($row["file_path"]);
            $lib->setDate($row["date"]);
            $lib->setStatus($row["status"]);
            $lib->setStateName($row["StateName"]);
            $Result[$i] = $lib;
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
	function hideFile($id) {
        $flag = false;
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $sql = "UPDATE library SET  Status=? WHERE id=?";
        // echo "as";
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
	function showFile($id) {
        $flag = false;
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $sql = "UPDATE library SET  Status=? WHERE id=?";

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
	function getLawCategories() {
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $sql = "select * from law_cat ";

        $CatsDataSet = $conn->query($sql) or die($conn->error);
		$i = 0;
        $Result = array();
        while ($row = mysqli_fetch_array($CatsDataSet)) {

            $lib = new Library();
            $lib->setCat($row["id"]);
            $lib->setCatName($row["Name"]);
            $Result[$i] = $lib;
            $i++;        }
        return $Result;

	}
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
	function getFilename() {
		return $this->filename;
	}
	
	/**
	 * 
	 * @param mixed $filename 
	 * @return CaseClass
	 */
	function setFilename($filename): self {
		$this->filename = $filename;
		return $this;
	}
	
	/**
	 * 
	 * @return mixed
	 */
	function getFilepath() {
		return $this->filepath;
	}
	
	/**
	 * 
	 * @param mixed $filepath 
	 * @return CaseClass
	 */
	function setFilepath($filepath): self {
		$this->filepath = $filepath;
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
}

