<?php
class MessageView
{

    public function ShowMessage($id)
    {

        $messageObj = new Message();
        $Result = $messageObj->getMessage($id);

        for ($i = 0; $i < count($Result); $i++) {


          echo ('
          <div class="card" style="direction:rtl;text-align:right;" >
  <div class="card-header">
  الرسالة المستقبلة من  ' . $Result[$i]->getName() . '  </div>
  <div class="card-body">
    <h5 class="card-title">' . $Result[$i]->getType() . '</h5>
    <p> <i class="fa fa-calendar-alt"></i>     ' . $Result[$i]->getDate() . '</p>
    <p> <i class="fa fa-phone-alt"></i>     ' . $Result[$i]->getPhone() . '</p>
    <p> <i class="fa fa-inbox"></i>     ' . $Result[$i]->getEmail() . '</p>
    <p class="card-text">' . $Result[$i]->getContent() . '</p>
    <a href="Controller/MessageController.php?id=' . $Result[$i]->getId() . '&state=' . $Result[$i]->getSeen() . '" class="btn btn-primary">تغيير حالة الرسالة</a>
  </div>
</div>
          ');

            
        }
    }

    public function Show_AllMessagesAdmin($status, $size)
    {
        $messageObj = new Message();

        $Result = $messageObj->getMessages($status, $size);
        //var_dump($Result);
        if ($Result) {
            echo "<table class='table table-bordered table-striped'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>#</th>";
            echo "<th>الاسم</th>";
            echo "<th>رقم التليفون</th>";
            echo "<th>البريد الإلكتروني</th>";
            echo "<th>النوع</th>";
            echo "<th>الرسالة</th>";
            echo "<th>التاريخ</th>";
            echo "<th>الحالة</th>";
            echo "<th>العملية</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            for ($i = 0; $i < count($Result); $i++) {
                if ($Result[$i]->getSeen() == 0) {
                    echo '<tr class="table-primary">';
                } else {
                    echo "<tr>";
                }

                echo "<td>" . $Result[$i]->getId() . "</td>";
                echo "<td>" . $Result[$i]->getName() . "</td>";
                echo "<td>" . $Result[$i]->getPhone() . "</td>";
                echo "<td>" . $Result[$i]->getEmail() . "</td>";
                echo "<td>" . $Result[$i]->getType() . "</td>";
                echo "<td>" . $Result[$i]->getContent() . "</td>";
                echo "<td>" . $Result[$i]->getDate() . "</td>";
                if ($Result[$i]->getSeen() == 1) {
                    echo "<td>تمت رؤيتها</td>";
                } else {
                    echo "<td>رسالة جديدة</td>";

                }
                echo "<td>";
                echo "<a href='Admin/viewMessage.php?id=" . $Result[$i]->getId() . "' title='عرض الرسالة' data-toggle='tooltip'><i class='fa fa-eye' style='color:#337ab7'></i>    </a>";
                echo "<a href='Admin/Controller/MessageController.php?id=" . $Result[$i]->getId() . "&state=" . $Result[$i]->getSeen() . "' title='إظهار الرسالة كرسالة جديدة او لا' data-toggle='tooltip'><i class='fa fa-eye-slash'style='color:#337ab7'></i>    </span></a>";
                echo "<a href='Admin/deleteMessage.php?id=" . $Result[$i]->getId() . "' title='حدف الرسالة' data-toggle='tooltip'><i class='fa fa-trash' style='color:red'></i></a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "لا توجد رسائل حتي الآن";
        }
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
