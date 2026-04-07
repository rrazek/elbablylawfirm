<?php
class LibraryView
{

    public function Show_AllFiles($status, $size, $type)
    {
        $libObj = new Library();
        $Result = $libObj->getFiles($status, $size);
        // var_dump($Result);
        $rowCt=0;
        for ($i = 0; $i < count($Result); $i++) {
            if ($type == $Result[$i]->getCat()) {
                if ($rowCt % 2 == 0) {
                    echo ('
                <li class="list-group-item">
                    <a href="' . $Result[$i]->getFilepath() . '">
                        <div class="row" >
                            <div class="col-3"> <p> <i class="fa fa-calendar-alt"></i>     ' . $Result[$i]->getDate() . '</p>                            </div>
                            <div class="col-9" style="text-align: right;"> ' . $Result[$i]->getFilename() . '  </div>
                        </div>
                    </a>
                </li>');
                } else {
                    echo ('
                    <li class="list-group-item list-group-item-secondary">
                        <a href="' . $Result[$i]->getFilepath() . '">
                            <div class="row" >
                                <div class="col-3"> <p> <i class="fa fa-calendar-alt"></i>     ' . $Result[$i]->getDate() . '</p>                            </div>
                                <div class="col-9" style="text-align: right;"> ' . $Result[$i]->getFilename() . '  </div>
                            </div>
                        </a>
                    </li>');
                }
            $rowCt+=1;
            }
        }
    }
    public function Show_AllFilesAdmin($status, $size)
    {
        $libObj = new Library();

        $Result = $libObj->getFiles($status, $size);
        //  var_dump($Result);
        if ($Result) {
            echo "<table class='table table-bordered table-striped'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>#</th>";
            echo "<th>الاسم</th>";
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
                echo "<td>" . $Result[$i]->getFilename() . "</td>";
                echo "<td>" . $Result[$i]->getCatName() . "</td>";
                echo "<td>" . $Result[$i]->getDate() . "</td>";
                echo "<td>" . $Result[$i]->getStateName() . "</td>";
                echo "<td>";
                echo "<a href='" . $Result[$i]->getFilepath() . "' title='عرض  الملف' data-toggle='tooltip'><i class='fa fa-eye' style='color:#337ab7'></i>    </a>";
                echo "<a href='Admin/updateFile.php?id=" . $Result[$i]->getId() . "' title='تعديل تفاصيل الملف' data-toggle='tooltip'><i class='fa fa-pencil' style='color:#337ab7'></i>     </a>";
                echo "<a href='Admin/Controller/libraryController.php?id=" . $Result[$i]->getId() . "&state=" . $Result[$i]->getStatus() . "' title='إظهار/إخفاء الملف' data-toggle='tooltip'><i class='fa fa-eye-slash'style='color:#337ab7'></i>    </span></a>";
                echo "<a href='Admin/deleteFile.php?id=" . $Result[$i]->getId() . "' title='حدف الملف' data-toggle='tooltip'><i class='fa fa-trash' style='color:red'></i></a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";} else {
            echo "لا توجد ملفات حتي الآن";

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
