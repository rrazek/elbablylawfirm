<?php
class MemberView
{
    public function Show_AllMembers_Slider($status, $size)
    {

        $memberObj = new Member();
        $Result = $memberObj->getMembers($status, $size);
        //var_dump($Result);
        for ($i = 0; $i < count($Result); $i++) {
        //   $link = "single.php?id=".$Result[$i]->getId();
          //echo $link;
        echo ('
        <div class="col-lg-3 col-md-6">
        <div class="team-item">
                <div class="team-img">
                  <img src="' . $Result[$i]->getImage() . '" alt="Team Image" />
                </div>
                <div class="team-text">
                  <h2>' . $Result[$i]->getName() . '</h2>
                  <p>' . $Result[$i]->getPosition() . '</p>
                  <div class="team-social">
                    <a class="social-tw" href="'. $Result[$i]->getTwitter() .'"
                      ><i class="fab fa-twitter" ></i
                    ></a>
                    <a class="social-fb" href="' . $Result[$i]->getFacebook() . '"
                      ><i class="fab fa-facebook-f"></i
                    ></a>
                    <a class="social-li" href="' . $Result[$i]->getLinkedIn() . '"
                      ><i class="fab fa-linkedin-in"></i
                    ></a>
                    <a class="social-in" href="' . $Result[$i]->getWhatsapp() . '"
                      ><i class="fab fa-whatsapp"></i
                    ></a>
                  </div>
                </div>
              </div>
              </div>
              ');
          
            //var_dump($Result[$i]);
            //echo "<hr>";
            //echo("<a href=../Controller/ArticleController.php?id=".$Result[$i]->getId().">".$Result[$i]->getTitle(). "</a><br>");
        }
    }

    public function Show_AllMembersWithBio_Slider($status, $size)
    {
        $memberObj = new Member();
        $Result = $memberObj->getMembers($status, $size);
        // var_dump($Result);
        for ($i = 0; $i < count($Result); $i++) {
          echo ('
            <div class="testimonial-item">
              <i class="fa fa-quote-right"></i>
              <div class="row align-items-center">
                <div class="col-3">
                <img src="' . $Result[$i]->getImage() . '" alt="Team Image" />
                </div>
                <div class="col-9">
                  <h2>' . $Result[$i]->getName() . '</h2>
                  <p>' . $Result[$i]->getPosition() . '</p>
                </div>
                <div class="col-12">
                  <p>
                  ' . $Result[$i]->getBio() . '                  
                  </p>
                </div>
              </div>
            </div>
          ');
        }
    }
public function Show_AllMembersAdmin($status, $size)
    {
        $memberObj = new Member();
        $Result = $memberObj->getMembers($status, $size);
        // var_dump($Result);
        echo "<table class='table table-bordered table-striped'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>#</th>";
        echo "<th>الاسم</th>";
        echo "<th>المنصب</th>";
        echo "<th>التعريف بالموظف</th>";
        echo "<th>الحالة</th>";
        echo "<th>العملية</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        for ($i = 0; $i < count($Result); $i++) {
            echo "<tr>";
            echo "<td>" . $Result[$i]->getId() . "</td>";
            echo "<td>" . $Result[$i]->getName() . "</td>";
            echo "<td>" . $Result[$i]->getPosition() . "</td>";
            echo "<td>" . $Result[$i]->getBio() . "</td>";
            echo "<td>" . $Result[$i]->getStateName() . "</td>";
            echo "<td>";
            echo "<a href='Admin/viewMember.php?id=" . $Result[$i]->getId() . "' title='عرض بيانات الموظف' data-toggle='tooltip'><i class='fa fa-eye' style='color:#337ab7'></i>    </a>";
            echo "<a href='Admin/updateMember.php?id=" . $Result[$i]->getId() . "' title='تعديل بيانات الموظف' data-toggle='tooltip'><i class='fa fa-pencil' style='color:#337ab7'></i>     </a>";
            echo "<a href='Admin/Controller/MemberController.php?id=" . $Result[$i]->getId() . "&state=". $Result[$i]->getStatus() ."' title='إظهار/إخفاء الموظف' data-toggle='tooltip'><i class='fa fa-eye-slash'style='color:#337ab7'></i>    </span></a>";
            echo "<a href='Admin/deleteMember.php?id=" . $Result[$i]->getId() . "' title='حدف الموظف' data-toggle='tooltip'><i class='fa fa-trash' style='color:red'></i></a>";
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

    



    // public function ShowMember($id)
    // {

    //     $memberObj = new Member();
    //     $Result = $memberObj->getMembers($status, $size);
        
    //     for ($i = 0; $i < count($Result); $i++) {
    //         echo ('
    //            <div class="section-header">
    //               <h2>' . $Result[$i]->getName() . '</h2>
    //             </div>
    //             <div class="row">
    //               <div class="col-12">
    //                 <img class="img-fluid rounded" src="' . $Result[$i]->getImage() . '" alt="Image">
    //                 <div class="meta">
    //                   <i class="fa fa-list-alt"></i>
    //                   <a href="">' . $Result[$i]->getPosition() . '</a>
    //                 </div>
    //                 <p> ' . $Result[$i]->getLinkedIn() . '</p>
    //               </div>
    //             </div>

    //       ');
    //     }

    // }

    // public function Show_AllMembers($status, $size)
    // {

    //     $articeObj = new Article();
    //     $Result = $articeObj->getArticles($status, $size);
    //     //var_dump($Result);
    //     for ($i = 0; $i < count($Result); $i++) {
    //         echo ('
    //        <div class="col-lg-4 col-md-6 blog-item">
    //        <img src="' . $Result[$i]->getImage() . '" alt="Blog">
    //        <h3>' . $Result[$i]->getTitle() . '</h3>
    //        <div class="meta">
    //            <i class="fa fa-list-alt"></i>
    //            <a href="">' . $Result[$i]->getLawType() . '</a>
    //            <i class="fa fa-calendar-alt"></i>
    //            <p>' . $Result[$i]->getDate() . '</p>
    //        </div>
    //        <p>
    //        ' . $this->truncate($Result[$i]->getContent(), 80) . '
    //        </p>
    //        <a class="btn" href="single.php?id='.$Result[$i]->getId().'"> اقرأ المزيد <i class="fa fa-angle-left"></i></a>
    //    </div>



    //        ');

    //         //var_dump($Result[$i]);
    //         //echo "<hr>";
    //         //echo("<a href=../Controller/ArticleController.php?id=".$Result[$i]->getId().">".$Result[$i]->getTitle(). "</a><br>");
    //     }
    // }

    
}
