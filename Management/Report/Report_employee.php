
<?php
require_once __DIR__ . '../../../vendor/autoload.php';

function ShowData(){

    require '../../ConnectDB/connectDB.php';
    date_default_timezone_set("Asia/Bangkok");
    $datenow = time();
    $Date = date("Y-m-d",$datenow);
    $search = $_POST['search'];
    if(isset($_POST['btn'])){
        $sql = "select emp_id,emp_name,upper(emp_surname) as emp_surname,gender,dob,address,tel,email,auther_name,salary,start_work,end_work,status,img_path from employees e left join auther a on e.auther_id=a.auther_id where emp_id='$search' or emp_name='$search' or emp_surname='$search' or gender='$search' or auther_name='$search' order by emp_id asc;";
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
                    <td align="center">'.$row["dob"].'</td>
                    <td align="center">'.$row["address"].'</td>
                    <td align="center">'.$row["tel"].'</td>
                    <td align="center">'.$row["email"].'</td>
                    <td align="center">'.$row["auther_name"].'</td>
                    <td align="center">'.number_format($row["salary"],2).' USD</td>
                    <td align="center">'.$row["start_work"].'</td>
                    <td align="center">'.$row["end_work"].'</td>
                    <td align="center">'.$row["status"].'</td>
                    <td align="center">
                        <img src="../../Stock/Management/images/'.$row['img_path'].'" width="40px" height="40px" alt="" /><br>
                    </td>
                </tr>
            
            ';
          
        }
        $sqlAmount = "select sum(salary) as amount from employees e left join auther a on e.auther_id=a.auther_id where emp_id='$search' or emp_name='$search' or emp_surname='$search' or gender='$search' or auther_name='$search';";
        $result7 = mysqli_query($link, $sqlAmount);
        $rowAmount = mysqli_fetch_array($result7, MYSQLI_ASSOC);
        $output .='
                <tr class="fontblack18">
                    <td colspan="11" align="right"><h3><b>ລວມທັງໝົດ  </b></h3></td>
                    <td colspan="5" align="right"><h3><b>'.number_format($rowAmount["amount"],2).' USD</h3> </b></td>
                </tr>    
                ';
        return $output;
    }
    if(isset($_POST['btnall'])){
        $sql = "select emp_id,emp_name,upper(emp_surname) as emp_surname,gender,dob,address,tel,email,auther_name,salary,start_work,end_work,status,img_path from employees e left join auther a on e.auther_id=a.auther_id order by emp_id asc;";
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
                    <td align="center">'.$row["dob"].'</td>
                    <td align="center">'.$row["address"].'</td>
                    <td align="center">'.$row["tel"].'</td>
                    <td align="center">'.$row["email"].'</td>
                    <td align="center">'.$row["auther_name"].'</td>
                    <td align="center">'.number_format($row["salary"],2).' USD</td>
                    <td align="center">'.$row["start_work"].'</td>
                    <td align="center">'.$row["end_work"].'</td>
                    <td align="center">'.$row["status"].'</td>
                    <td align="center">
                        <img src="../../Stock/Management/images/'.$row['img_path'].'" width="40px" height="40px" alt="" /><br>
                    </td>
                </tr>
            
            ';
          
        }
        $sqlAmount = "select sum(salary) as amount from employees";
        $result7 = mysqli_query($link, $sqlAmount);
        $rowAmount = mysqli_fetch_array($result7, MYSQLI_ASSOC);
        $output .='
                    <tr class="fontblack18">
                        <td colspan="11" align="right"><h3><b>ລວມທັງໝົດ  </b></h3></td>
                        <td colspan="5" align="right"><h3><b>'.number_format($rowAmount["amount"],2).' USD</h3> </b></td>
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
                        Report Employees<br>
                    </u>
                </h2>
            </div>
            <table width="100%" border="1" cellspacing="0" cellpadding="3" style="font-size: 8px;">
                <tr align="center" style="background-color: #dbdbd8">
                    <th style="width: 25px">#</th>
                    <th style="width: 75px">Employee ID</th>
                    <th style="width: 80px">Name</th>
                    <th style="width: 100px">Surname</th>
                    <th style="width: 50px">Gender</th>
                    <th style="width: 70px">Date of Birth</th>
                    <th style="width: 150px">Address</th>
                    <th style="width: 90px">Tel</th>
                    <th style="width: 120px">Email</th>
                    <th style="width: 100px">Auther</th>
                    <th style="width: 60px">Salary</th>
                    <th style="width: 60px">Start Work</th>
                    <th style="width: 60px">End work</th>
                    <th style="width: 60px">Status</th>
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
$mpdf->Output('ລາຍງານພະນັກງານ.pdf','I');
?>