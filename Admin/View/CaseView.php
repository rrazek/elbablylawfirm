<?php
class CaseView
{
    public function Show_AllCases_Slider($status, $size)
    {

        $caseObj = new CaseClass();
        $Result = $caseObj->getCases($status, $size);
        //var_dump($Result);
        for ($i = 0; $i < count($Result); $i++) {
            //   $link = "single.php?id=".$Result[$i]->getId();
            //echo $link;
            echo ('
        <a href="singleCase.php?id=' . $Result[$i]->getId() . '" class="testimonial-link">
        <div class="testimonial-item">
            <i class="fa fa-quote-right"></i>
            <div class="row align-items-center">
                <div class="col-3">
                    <img src="' . $Result[$i]->getImage() . '" alt="" />
                </div>
                <div class="col-9">
                    <h2>' . $Result[$i]->getName() . ' </h2>
                    <p>' . $Result[$i]->getCatName() . '</p>
                </div>
                <div class="col-12">
                    <p>
                    ' . $this->truncate($Result[$i]->getDescription(), 100) . '
                    </p>
                </div>
            </div>
        </div>
        </a>
              ');

            //var_dump($Result[$i]);
            //echo "<hr>";
            //echo("<a href=../Controller/ArticleController.php?id=".$Result[$i]->getId().">".$Result[$i]->getTitle(). "</a><br>");
        }
    }

    public function Show_AllCases($status, $size)
    {
        $caseObj = new CaseClass();
        $Result = $caseObj->getCases($status, $size);
        // var_dump($Result);
        for ($i = 0; $i < count($Result); $i++) {
            $val = "";
            if($Result[$i]->getCat()==1)
                $val = "first";
            else if ($Result[$i]->getCat()==2)
                $val = "second";
            else if ($Result[$i]->getCat()==3)
                $val = "third";
            else if ($Result[$i]->getCat()==4)
                $val = "fourth";
            
            echo ('
            <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item '.$val.'">
                <div class="portfolio-wrap">
                    <img src="' . $Result[$i]->getImage() . '" alt="Portfolio Image">
                    <figure>
                        <p>' . $Result[$i]->getCatName() . '</p>
                        <a href="singleCase.php?id='.$Result[$i]->getId().'">' . $Result[$i]->getName() . '</a>
                        <span>' . $Result[$i]->getDate() . '</span>
                    </figure>
                </div>
            </div>
          ');
        }
    }
    public function Show_AllCasesAdmin($status, $size)
    {
        $caseObj = new CaseClass();
        $Result = $caseObj->getCases($status, $size);
        // var_dump($Result);
        echo "<table class='table table-bordered table-striped'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>#</th>";
        echo "<th>الاسم</th>";
        echo "<th>التفاصيل</th>";
        echo "<th>النوع</th>";
        echo "<th>التاريخ</th>";
        echo "<th>الحالة</th>";
        echo "<th>العملية</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        for ($i = 0; $i < count($Result); $i++) {
            echo "<tr>";
            echo "<td>" . $Result[$i]->getId() . "</td>";
            echo "<td>" . $Result[$i]->getName() . "</td>";
            echo "<td>" . $Result[$i]->getDescription() . "</td>";
            echo "<td>" . $Result[$i]->getCatName() . "</td>";
            echo "<td>" . $Result[$i]->getDate() . "</td>";
            echo "<td>" . $Result[$i]->getStateName() . "</td>";
            echo "<td>";
            echo "<a href='Admin/viewCase.php?id=" . $Result[$i]->getId() . "' title='عرض تفاصيل القضية' data-toggle='tooltip'><i class='fa fa-eye' style='color:#337ab7'></i>    </a>";
            echo "<a href='Admin/updateCase.php?id=" . $Result[$i]->getId() . "' title='تعديل تفاصيل القضية' data-toggle='tooltip'><i class='fa fa-pencil' style='color:#337ab7'></i>     </a>";
            echo "<a href='Admin/Controller/CaseController.php?id=" . $Result[$i]->getId() . "&state=" . $Result[$i]->getStatus() . "' title='إظهار/إخفاء القضية' data-toggle='tooltip'><i class='fa fa-eye-slash'style='color:#337ab7'></i>    </span></a>";
            echo "<a href='Admin/deleteCase.php?id=" . $Result[$i]->getId() . "' title='حدف القضية' data-toggle='tooltip'><i class='fa fa-trash' style='color:red'></i></a>";
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

   
    public function ShowCase($id)
    {

        $caseObj = new CaseClass();
        $Result = $caseObj->getCase($id);

        for ($i = 0; $i < count($Result); $i++) {
            echo ('
               <div class="section-header">
                  <h2>' . $Result[$i]->getName() . '</h2>
                </div>
                <div class="row">
                  <div class="col-12">
                    <img class="img-fluid rounded" src="../' . $Result[$i]->getImage() . '" alt="Image">
                    <div class="meta">
                      <i class="fa fa-list-alt"></i>
                      <a href="">' . $Result[$i]->getCatName() . '</a>
                      <p> <i class="fa fa-calendar-alt"></i>     ' . $Result[$i]->getDate() . '</p>
                    </div>
                    <p> ' . $Result[$i]->getDescription() . '</p>
                  </div>
                </div>

          ');
        }
    }
}
