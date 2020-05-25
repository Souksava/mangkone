
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
        $sql = "select app_id,app_name,app_surname,rate_id,gender,dob,address,tel,email,auther_name,school,salary,experience,can_start,date_apply from applyemp p left join auther a on p.auther_id=a.auther_id where date_apply between '$date1' and '$date2' or app_name='$search' or gender='$search' or auther_name='$search' order by date_apply asc;";
        $result = mysqli_query($link,$sql);
        $Bill = 0;
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $Bill = $Bill + 1 ;
            $output .='
                <tr align="center">
                    <td align="center">'.$Bill.'</td>
                    <td align="center">'.$row["app_name"].'</td>
                    <td align="center">'.$row["app_surname"].'</td>
                    <td align="center">'.$row["gender"].'</td>
                    <td align="center">'.$row["dob"].'</td>
                    <td align="center">'.$row["address"].'</td>
                    <td align="center">'.$row["tel"].'</td>
                    <td align="center">'.$row["email"].'</td>
                    <td align="center">'.$row["auther_name"].'</td>
                    <td align="center">'.$row["school"].'</td>
                    <td align="center">'.number_format($row["salary"],2).' '.$row["rate_id"].'</td>
                    <td align="center">'.$row["experience"].'</td>
                    <td align="center">'.$row["can_start"].'</td>
                    <td align="center">'.$row["date_apply"].'</td>
                </tr>
            
            ';
          
        }
        $sqlAmount = "select count(*) as amount from applyemp p left join auther a on p.auther_id=a.auther_id where date_apply between '$date1' and '$date2' or app_name='$search' or gender='$search' or auther_name='$search';";
        $result7 = mysqli_query($link, $sqlAmount);
        $rowAmount = mysqli_fetch_array($result7, MYSQLI_ASSOC);
        $output .='
            <tr class="fontblack18">
                <td colspan="9" align="right"><h3><b>Counts:  </b></h3></td>
                <td colspan="5" align="right"><h3><b>'.$rowAmount["amount"].' LIST</h3> </b></td>
            </tr>     
                ';
        return $output;
    }
    if(isset($_POST['btnall'])){
        $sql = "select app_id,app_name,app_surname,rate_id,gender,dob,address,tel,email,auther_name,school,salary,experience,can_start,date_apply from applyemp p left join auther a on p.auther_id=a.auther_id order by date_apply asc;";
        $result = mysqli_query($link,$sql);
        $Bill = 0;
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $Bill = $Bill + 1 ;
            $output .='
                <tr align="center">
                    <td align="center">'.$Bill.'</td>
                    <td align="center">'.$row["app_name"].'</td>
                    <td align="center">'.$row["app_surname"].'</td>
                    <td align="center">'.$row["gender"].'</td>
                    <td align="center">'.$row["dob"].'</td>
                    <td align="center">'.$row["address"].'</td>
                    <td align="center">'.$row["tel"].'</td>
                    <td align="center">'.$row["email"].'</td>
                    <td align="center">'.$row["auther_name"].'</td>
                    <td align="center">'.$row["school"].'</td>
                    <td align="center">'.number_format($row["salary"],2).' '.$row["rate_id"].'</td>
                    <td align="center">'.$row["experience"].'</td>
                    <td align="center">'.$row["can_start"].'</td>
                    <td align="center">'.$row["date_apply"].'</td>
                </tr>
            
            ';
          
        }
        $sqlAmount = "select count(*) as amount from applyemp";
        $result7 = mysqli_query($link, $sqlAmount);
        $rowAmount = mysqli_fetch_array($result7, MYSQLI_ASSOC);
        $output .='
                    <tr class="fontblack18">
                        <td colspan="9" align="right"><h3><b>Counts:  </b></h3></td>
                        <td colspan="5" align="right"><h3><b>'.$rowAmount["amount"].' LIST</h3> </b></td>
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
                    <th style="width: 25px">#</th>
                    <th style="width: 100px">Name</th>
                    <th style="width: 100px">Surname</th>
                    <th style="width: 45px">Gender</th>
                    <th style="width: 80px">Date of Birth</th>
                    <th style="width: 350px">Address</th>
                    <th style="width: 110px">Tel</th>
                    <th style="width: 120px">Email</th>
                    <th style="width: 100px">Auther</th>
                    <th style="width: 140px">University</th>
                    <th style="width: 150px">Salary</th>
                    <th style="width: 140px">Experience</th>
                    <th style="width: 60px">Can Start</th>
                    <th style="width: 60px">Date Apply</th>
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
$mpdf->Output('ລາຍງານຜູ້ສະໝັກງານ.pdf','I');
?>