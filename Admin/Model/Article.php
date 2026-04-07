<?php
require_once "Database.php";

interface iArticle
{
    public function addArticle($article);
    function updateArticle($id, $article);
    function removeArticle($id);
    function getArticle($id);
    function getArticles($state, $size);

    function hiderArticle($id);

    function showArticle($id);
}
class Article implements iArticle
{

    private $id;
    private $title;
    private $lawType;
    private $date;
    private $content;
    private $image;
    private $state;

    private $stateName;

    function getId()
    {
        return $this->id;
    }

    function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    function getTitle()
    {
        return $this->title;
    }

    function setTitle($title): self
    {
        $this->title = $title;
        return $this;
    }

    function getLawType()
    {
        return $this->lawType;
    }

    function setLawType($lawType): self
    {
        $this->lawType = $lawType;
        return $this;
    }

    function getDate()
    {
        return $this->date;
    }

    function setDate($date): self
    {
        $this->date = $date;
        return $this;
    }

    function getContent()
    {
        return $this->content;
    }

    function setContent($content): self
    {
        $this->content = $content;
        return $this;
    }

    function getImage()
    {
        return $this->image;
    }

    function setImage($image): self
    {
        $this->image = $image;
        return $this;
    }

    function getState()
    {
        return $this->state;
    }
    function setState($state): self
    {
        $this->state = $state;
        return $this;
    }

    function addArticle($article)
    {
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $sql = "INSERT INTO articles (Title, Law_Type, Content,Image) VALUES (?,?,?,?)";
        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_title, $param_lawType, $param_content, $param_image);

            // Set parameters
            $param_title = $article->getTitle();
            $param_lawType = $article->getLawType();
            $param_content = $article->getContent();
            $param_image = $article->getImage();

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to landing page
                return true;
            } else {
                echo $stmt->error;
                return false;
            }
        }
        // Close statement
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        return false;
    }

    function updateArticle($id, $article)
    {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        // var_dump ($article);
        $sql = "UPDATE articles SET Title=?, Law_Type=?, Content=?  WHERE id=?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            echo "in";

            mysqli_stmt_bind_param($stmt, "sssi", $param_title, $param_lawType, $param_content, $param_id);
            // Set parameters
            $param_title = $article->getTitle();
            $param_lawType = $article->getLawType();

            $param_content = $article->getContent();
            $param_id = $id;
            echo "in func";

            // Attempt to execute the prepared statement

            if (mysqli_stmt_execute($stmt)) {
                // Records updated successfully. Redirect to landing page
                return true;
            } else {
                echo(mysqli_stmt_error($stmt));
                echo "Something went wrong. Please try again later.";
                return false;
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    function removeArticle($id)
    {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        // Prepare a delete statement
        $sql = "DELETE FROM articles WHERE id = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            // Set parameters
            $param_id = $id;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records deleted successfully. Redirect to landing page
                return true;
            } else {
                echo "Oops! Something went wrong. Please try again later.";
                return false;
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);

        // Close connection
        mysqli_close($conn);
    }

    function getArticle($id)
    {
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $sql = "select * from articles join state on articles.status = state.id where articles.id = " . $id;
        $res = $conn->query($sql);

        $ArticlesDataSet = $conn->query($sql) or die($conn->mysqli_error());
        $i = 0;
        $Result = array();
        while ($row = mysqli_fetch_array($ArticlesDataSet)) {
            $Article = new Article();
            $Article->setId($row["id"]);
            $Article->setTitle($row["Title"]);
            $Article->setLawType($row["Law_Type"]);
            $Article->setDate($row["Date"]);
            $Article->setContent($row["Content"]);
            $Article->setImage($row["Image"]);
            $Article->setState($row["Status"]);
            $Article->setStateName($row["StateName"]);

            $Result[$i] = $Article;
            $i++;
        }
        return $Result;
    }

    function getArticles($state, $size)
    {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $sql = "select * from articles join state on articles.status = state.id "; //order by date desc ";
        if ($state == 1) {
            $sql .= " where status= 1 ";
        } else {}
        $sql .= " order by date desc ";
        if ($size != -1) {
            $sql = " limit $size";
        }
        $res = $conn->query($sql);

        $ArticlesDataSet = $conn->query($sql) or die($conn->error());
        $i = 0;
        $Result = array();
        while ($row = mysqli_fetch_array($ArticlesDataSet)) {
            $Article = new Article();
            $Article->setId($row["id"]);
            $Article->setTitle($row["Title"]);
            $Article->setLawType($row["Law_Type"]);
            $Article->setDate($row["Date"]);
            $Article->setContent($row["Content"]);
            $Article->setImage($row["Image"]);
            $Article->setState($row["Status"]);
            $Article->setStateName($row["StateName"]);
            //echo("<hr>".$Article->getStateName()."<hr>");
            $Result[$i] = $Article;
            $i++;
        }
        return $Result;
    }

    function hiderArticle($id)
    {
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $sql = "UPDATE articles SET  Status=? WHERE id=?";

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

    function showArticle($id)
    {
        $db = Database::getInstance();
        $conn = $db->getConnection();
        $sql = "UPDATE articles SET  Status=? WHERE id=?";

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

    function getStateName()
    {
        return $this->stateName;
    }

    function setStateName($stateName): self
    {
        $this->stateName = $stateName;
        return $this;
    }
}

