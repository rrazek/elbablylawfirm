<?php
class ArticleView
{
    public function Show_AllArticles_Slider($status, $size)
    {

        $articeObj = new Article();
        $Result = $articeObj->getArticles($status, $size);
        //var_dump($Result);
        for ($i = 0; $i < count($Result); $i++) {
          $link = "single.php?id=".$Result[$i]->getId();
          //echo $link;
          echo ('
            <div class="blog-item">
            <img src="' . $Result[$i]->getImage() . '" alt="Blog" />
            <h3>' . $Result[$i]->getTitle() . '</h3>
            <div class="meta">
              <i class="fa fa-list-alt"></i>
              <a href="">' . $Result[$i]->getLawType() . '</a>
              <i class="fa fa-calendar-alt"></i>
              <p>' . $Result[$i]->getDate() . '</p>
            </div>
            <p>
            ' . $this->truncate($Result[$i]->getContent(), 100) . '
            </p>
            <a class="btn" href="' . $link . '">
            اقرأ المزيد 
            <i class="fa fa-angle-left"></i
            ></a>
          </div>
            ');

            //var_dump($Result[$i]);
            //echo "<hr>";
            //echo("<a href=../Controller/ArticleController.php?id=".$Result[$i]->getId().">".$Result[$i]->getTitle(). "</a><br>");
        }
    }
    public function ShowArticle($id)
    {

        $articeObj = new Article();
        $Result = $articeObj->getArticle($id);

        for ($i = 0; $i < count($Result); $i++) {
            echo ('
               <div class="section-header">
                  <h2>' . $Result[$i]->getTitle() . '</h2>
                </div>
                <div class="row">
                  <div class="col-12">
                    <img class="img-fluid rounded" src="' . $Result[$i]->getImage() . '" alt="Image">
                    <div class="meta">
                      <i class="fa fa-list-alt"></i>
                      <a href="">' . $Result[$i]->getLawType() . '</a>
                      <p> <i class="fa fa-calendar-alt"></i>     ' . $Result[$i]->getDate() . '</p>
                    </div>
                    <p> ' . $Result[$i]->getContent() . '</p>
                  </div>
                </div>

          ');
        }

        // echo "<table border=2><tr><td>Id</td><td>" . $StdObj->Id . "</td></tr>";

        // echo "<tr><td>Full Name</td><td>" . $StdObj->FullName . "</td></tr>";
        // echo "<tr><td>Address </td><td>" . $StdObj->Address . "</td></tr>";

        // echo "<tr><td>Hobbies Played</td><td>";
        // for ($i = 0; $i < count($StdObj->HobbyArrayObj); $i++) {
        //     echo "<br>" . $StdObj->HobbyArrayObj[$i]->HobbyName;
        // }
        // echo "</td></tr>";

        // echo "</table>";
    }

    public function Show_AllArticles($status, $size)
    {

        $articeObj = new Article();
        $Result = $articeObj->getArticles($status, $size);
        //var_dump($Result);
        for ($i = 0; $i < count($Result); $i++) {
            echo ('
           <div class="col-lg-4 col-md-6 blog-item">
           <img src="' . $Result[$i]->getImage() . '" alt="Blog">
           <h3>' . $Result[$i]->getTitle() . '</h3>
           <div class="meta">
               <i class="fa fa-list-alt"></i>
               <a href="">' . $Result[$i]->getLawType() . '</a>
               <i class="fa fa-calendar-alt"></i>
               <p>' . $Result[$i]->getDate() . '</p>
           </div>
           <p>
           ' . $this->truncate($Result[$i]->getContent(), 80) . '
           </p>
           <a class="btn" href="single.php?id='.$Result[$i]->getId().'"> اقرأ المزيد <i class="fa fa-angle-left"></i></a>
       </div>



           ');

            //var_dump($Result[$i]);
            //echo "<hr>";
            //echo("<a href=../Controller/ArticleController.php?id=".$Result[$i]->getId().">".$Result[$i]->getTitle(). "</a><br>");
        }
    }

    public function Show_AllArticlesAdmin($status, $size)
    {
        $articeObj = new Article();
        $Result = $articeObj->getArticles($status, $size);
        //var_dump($Result);
        echo "<table class='table table-bordered table-striped'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>#</th>";
        echo "<th>العنوان</th>";
        echo "<th>القانون</th>";
        echo "<th>التاريخ</th>";
        echo "<th>الحالة</th>";
        echo "<th>العملية</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        for ($i = 0; $i < count($Result); $i++) {
            echo "<tr>";
            echo "<td>" . $Result[$i]->getId() . "</td>";
            echo "<td>" . $Result[$i]->getTitle() . "</td>";
            echo "<td>" . $Result[$i]->getLawType() . "</td>";
            echo "<td>" . $Result[$i]->getDate() . "</td>";
            echo "<td>" . $Result[$i]->getStateName() . "</td>";
            echo "<td>";
            echo "<a href='single.php?id=" . $Result[$i]->getId() . "' title='عرض المقالة' data-toggle='tooltip'><i class='fa fa-eye' style='color:#337ab7'></i>    </a>";
            echo "<a href='Admin/updateArticle.php?id=" . $Result[$i]->getId() . "' title='تعديل المقالة' data-toggle='tooltip'><i class='fa fa-pencil' style='color:#337ab7'></i>     </a>";
            echo "<a href='Admin/Controller/ArticleController.php?id=" . $Result[$i]->getId() . "&state=". $Result[$i]->getState() ."' title='إظهار/إخفاء المقالة' data-toggle='tooltip'><i class='fa fa-eye-slash'style='color:#337ab7'></i>    </span></a>";
            echo "<a href='Admin/deleteArticle.php?id=" . $Result[$i]->getId() . "' title='حدف القالة' data-toggle='tooltip'><i class='fa fa-trash' style='color:red'></i></a>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }

    public function truncate($string, $length = 100, $append = "&hellip;")
    {
        $string = trim($string);

        if (strlen($string) > $length) {
            $string = wordwrap($string, $length);
            $string = explode("\n", $string, 2);
            $string = $string[0] . $append;
        }

        return $string;
    }

    
}
