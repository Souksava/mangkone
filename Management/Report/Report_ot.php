
<?php
require_once __DIR__ . '../../../vendor/autoload.php';

function ShowData(){

    require '../../ConnectDB/connectDB.php';
    date_default_timezone_set("Asia/Bangkok");
    $datenow = time();
    $Date = date("Y-m-d",$datenow);
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    if(isset($_POST['btn'])){
        $sql = "select ot_id,emp_name,note,date_ot,amount,l.note,time_start,time_end,addtime(-time_start,time_end) as newtime,ot_type,l.status from ot l left join employees e on l.emp_id=e.emp_id where date_ot between '$date1' and '$date2' and l.status='ອະນຸມັດ';";
        $result = mysqli_query($link,$sql);
        $Bill = 0;
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $Bill = $Bill + 1 ;
            $output .='
                <tr align="center">
                    <td align="center">'.$Bill.'</td>
                    <td align="center">'.$row["emp_name"].'</td>
                    <td align="center">'.$row["date_ot"].'</td>
                    <td align="center">'.$row["ot_type"].'</td>
                    <td align="center">'.$row["note"].'</td>
                    <td align="center">'.$row["time_start"].'</td>
                    <td align="center">'.$row["time_end"].'</td>
                    <td align="center">'.$row["newtime"].'</td>
                    <td align="center">'.number_format($row["amount"],2).' USD</td>
                    <td align="center">'.$row["status"].'</td>
                </tr>
            
            ';
          
        }
        $sqlkip = "select sum(amount) as amount from ot where date_ot between '$date1' and '$date2' and status='ອະນຸມັດ';";
        $resultkip = mysqli_query($link,$sqlkip);
        $rowkip = mysqli_fetch_array($resultkip,MYSQLI_ASSOC);
        $output .='
                    <tr class="fontblack18">
                        <td colspan="6" align="right"><h3><b>ມູນຄ່າລວມ  </b></h3></td>
                        <td colspan="4" align="right"><h3><b>'.number_format($rowkip["amount"],2).' LAK</h3> </b></td>
                    </tr>    
                ';
        return $output;
    }
    if(isset($_POST['btnall'])){
        $sql = "select ot_id,emp_name,note,date_ot,amount,time_start,time_end,addtime(-time_start,time_end) as newtime,ot_type,l.status from ot l left join employees e on l.emp_id=e.emp_id where l.status='ອະນຸມັດ';";
        $result = mysqli_query($link,$sql);
        $Bill = 0;
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $Bill = $Bill + 1 ;
            $output .='
                <tr align="center">
                    <td align="center">'.$Bill.'</td>
                    <td align="center">'.$row["emp_name"].'</td>
                    <td align="center">'.$row["date_ot"].'</td>
                    <td align="center">'.$row["ot_type"].'</td>
                    <td align="center">'.$row["note"].'</td>
                    <td align="center">'.$row["time_start"].'</td>
                    <td align="center">'.$row["time_end"].'</td>
                    <td align="center">'.$row["newtime"].'</td>
                    <td align="center">'.number_format($row["amount"],2).' USD</td>
                    <td align="center">'.$row["status"].'</td>
                </tr>
            ';
          
        }
        $sqlkip = "select sum(amount) as amount from ot where status='ອະນຸມັດ';";
        $resultkip = mysqli_query($link,$sqlkip);
        $rowkip = mysqli_fetch_array($resultkip,MYSQLI_ASSOC);
        $output .='
                    <tr class="fontblack18">
                        <td colspan="6" align="right"><h3><b>ມູນຄ່າລວມ  </b></h3></td>
                        <td colspan="4" align="right"><h3><b>'.number_format($rowkip["amount"],2).' USD</h3> </b></td>
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

$content = '';
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
                        ລາຍງານ OT<br>
                    </u>
                </h2>
            </div>
            <table width="100%" border="1" cellspacing="0" cellpadding="3" style="font-size: 8px;">
                <tr align="center" style="background-color: #dbdbd8">
                    <th style="width: 20px;">#</th>
                    <th style="width: 80px;">ຊື່ພະນັກງານ</th>
                    <th style="width: 100px;">ວັນທີເຮັດວຽກລ່ວງເວລາ</th>
                    <th style="width: 120px;">ປະເພດ OT</th>
                    <th style="width: 180px;">ເນື້ອໃນ</th>
                    <th style="width: 60px;">ເວລາເລີ່ມ</th>
                    <th style="width: 60px;">ເວລາສິ້ນສຸດ</th>
                    <th style="width: 60px;">ລວມເວລາ</th>
                    <th style="width: 100px;">ລວມເປັນເງິນ</th>
                    <th style="width: 80px;">ສະຖານະ</th>
                </tr>
                '.ShowData().'
                </table><br>
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
$mpdf->SetFooter($footer);

$mpdf->WriteHTML($content);
$mpdf->Output('ລາຍງານວຽກລ່ວງເວລາ.pdf','I');
?>