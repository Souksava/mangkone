
<?php
require_once __DIR__ . '../../../vendor/autoload.php';

function ShowData(){

    require '../../ConnectDB/connectDB.php';
    date_default_timezone_set("Asia/Bangkok");
    $datenow = time();
    $Date = date("Y-m-d",$datenow);
    $search = $_POST['search'];
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    if(isset($_POST['btn'])){
        $sql = "select sry_id,c.emp_id,emp_name,emp_surname,gender,old_salary,new_salary,date_ch,auther_name,img_path from chsalary c left join employees e on c.emp_id=e.emp_id left join auther a on e.auther_id=a.auther_id where date_ch between '$date1' and '$date2' or c.emp_id='$search' or emp_name='$search' or gender='$search' or auther_name='$search' order by date_ch asc;";
        $result = mysqli_query($link,$sql);
        $Bill = 0;
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $Bill = $Bill + 1 ;
            $output .='
                <tr align="center">
                    <td align="center">'.$Bill.'</td>
                    <td align="center">'.$row["emp_id"].'</td>
                    <td align="center">'.$row["emp_name"].'</td>
                    <td align="center">'.$row["emp_surname"].'</td>
                    <td align="center">'.$row["gender"].'</td>
                    <td align="center">'.$row["auther_name"].'</td>
                    <td align="center">'.number_format($row["old_salary"],2).' USD</td>
                    <td align="center">'.number_format($row["new_salary"],2).' USD</td>
                    <td align="center">'.$row["date_ch"].'</td>
                    <td align="center">
                        <img src="../../Stock/Management/images/'.$row['img_path'].'" width="40px" height="40px" alt="" /><br>
                    </td>
                </tr>
            
            ';
          
        }
        $sqlAmount = "select sum(old_salary) as old,sum(new_salary) as new from chsalary c left join employees e on c.emp_id=e.emp_id left join auther a on e.auther_id=a.auther_id where date_ch between '$date1' and '$date2' or c.emp_id='$search' or emp_name='$search' or gender='$search' or auther_name='$search';";
        $result7 = mysqli_query($link, $sqlAmount);
        $rowAmount = mysqli_fetch_array($result7, MYSQLI_ASSOC);
        $output .='
            <tr class="font26">
                <td colspan="7" align="right">Total Old Salary:</td>
                <td colspan="3" align="right"> '.$rowAmount["old"].' USD</td>
            </tr>
            <tr class="font26">
                <td colspan="7" align="right">Total New Salary:</td>
                <td colspan="3" align="right"> '.$rowAmount["new"].' USD</td>
            </tr>
                ';
        return $output;
    }
    if(isset($_POST['btnall'])){
        $sql = "select sry_id,c.emp_id,emp_name,emp_surname,gender,old_salary,new_salary,date_ch,auther_name,img_path from chsalary c left join employees e on c.emp_id=e.emp_id left join auther a on e.auther_id=a.auther_id;";
        $result = mysqli_query($link,$sql);
        $Bill = 0;
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $Bill = $Bill + 1 ;
            $output .='
                <tr align="center">
                    <td align="center">'.$Bill.'</td>
                    <td align="center">'.$row["emp_id"].'</td>
                    <td align="center">'.$row["emp_name"].'</td>
                    <td align="center">'.$row["emp_surname"].'</td>
                    <td align="center">'.$row["gender"].'</td>
                    <td align="center">'.$row["auther_name"].'</td>
                    <td align="center">'.number_format($row["old_salary"],2).' USD</td>
                    <td align="center">'.number_format($row["new_salary"],2).' USD</td>
                    <td align="center">'.$row["date_ch"].'</td>
                    <td align="center">
                        <img src="../../Stock/Management/images/'.$row['img_path'].'" width="40px" height="40px" alt="" /><br>
                    </td>
                </tr>
            
            ';
          
        }
        $sqlAmount = "select sum(old_salary) as old_salary,sum(new_salary) as new_salary from chsalary;";
        $result7 = mysqli_query($link, $sqlAmount);
        $rowAmount = mysqli_fetch_array($result7, MYSQLI_ASSOC);
        $output .='
            <tr class="font26">
                <td colspan="7" align="right">Total Old Salary:</td>
                <td colspan="3" align="right"> '.$rowAmount["old_salary"].' USD</td>
            </tr>
            <tr class="font26">
                <td colspan="7" align="right">Total New Salary:</td>
                <td colspan="3" align="right"> '.$rowAmount["new_salary"].' USD</td>
            </tr>
                ';
        return $output;
    }
}   
date_default_timezone_set("Asia/Bangkok");
$datenow = time();
$Date = date("F d, Y",$datenow);
$com_name = $_POST['com_name'];
$com_address = $_POST['com_address'];
$com_tel = $_POST['com_tel'];
$com_fax = $_POST['com_fax'];
$slogan = $_POST['slogan'];
$tax_id = $_POST['tax_id'];
$logo = $_POST['logo'];
$com_email = $_POST['com_email'];
$website = $_POST['website'];
$content = '
            <div align="left" >
                <div style="float: left; width: 55%; ">
                    <img src="../../Stock/Management/images/'.$logo.'" width="150px">
                </div>
                <div style="float: right;text-align: right;">
                    <h2 style="color: orange;"> '.$slogan.'</h2>
                </div>
            </div>
            <div style="float: left; width: 45%; ">
                <p>
                    <h4 style="color: orange;">'.$com_name.'</h4>
                    <div>
                       <div style="font-size: 10px;">
                           '.$com_address.'
                       </div>
                        <b style="font-size: 8px;">
                            Registration No. / Tax ID : '.$tax_id.'
                        </b>
                    </div>
                </P>
            </div><br>
            <div style="clear: both;"></div>
            <div style="text-align: center;">
                <h2>
                    <u>
                        Report Apply Job<br>
                    </u>
                </h2>
            </div>
            <table width="100%" border="1" cellspacing="0" cellpadding="3" style="font-size: 8px;">
                <tr align="center" style="background-color: #dbdbd8">
                    <th style="width: 15px">#</th>
                    <th style="width: 30px">Employee ID</th>
                    <th style="width: 30px">Name</th>
                    <th style="width: 30px">Surname</th>
                    <th style="width: 30px">Gender</th>
                    <th style="width: 30px">Auther Name</th>
                    <th style="width: 60px">Old Salary</th>
                    <th style="width: 60px">New Salary</th>
                    <th style="width: 45px">Date</th>
                    <th style="width: 50px">Image</th>
                </tr>
                '.ShowData().'
                </table>
            ';
$mpdf = new \Mpdf\Mpdf([
    'format'            => 'A4-L',
    'mode'              => 'utf-8',      
    'tempDir'           => '/tmp',
    'default_font_size' => 8,
    'margin_bottom' => 18, 
    'margin_footer' => 5, 
	'default_font' => 'saysettha_ot'
]);
$mpdf->defaultfooterline = 0;
$footer = '<p align="center" style="font-size: 8px;">Page {PAGENO} of {nb}<br>
'.$com_address.'<br>
Tel: '.$com_tel.', '.$com_fax.' Email: '.$com_email.' '.$website.'</p>';
$mpdf->SetFooter($footer,'sample');
$mpdf->WriteHTML($content);
$mpdf->Output('ລາຍງານການປັບປ່ຽນເງິນເດືອນ.pdf','I');
?>