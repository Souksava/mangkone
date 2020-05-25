
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
        $sql = "select sry_id,emp_name,amount,sal_date,sal_mon,s.status,s.img_path from salary s left join employees e on s.emp_id=e.emp_id where sal_date between '$date1' and '$date2' and s.status='ອະນຸມັດ';";
        $result = mysqli_query($link,$sql);
        $Bill = 0;
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $Bill = $Bill + 1 ;
            $output .='
                <tr align="center">
                    <td align="center">'.$Bill.'</td>
                    <td align="center">'.$row["sry_id"].'</td>
                    <td align="center">'.$row["emp_name"].'</td>
                    <td align="center">'.$row["amount"].'</td>
                    <td align="center">'.$row["sal_date"].'</td>
                    <td align="center">'.$row["sal_mon"].'</td>
                    <td align="center">'.$row["status"].'</td>
                    <td align="center">
                        <img src="../../Stock/Management/images/'.$row['img_path'].'" width="40px" height="40px" alt="" /><br>
                    </td>
                </tr>
            
            ';
          
        }
        $sqlkip = "select sum(amount) as amount from salary where sal_date between '$date1' and '$date2' and status='ອະນຸມັດ';";
        $resultkip = mysqli_query($link,$sqlkip);
        $rowkip = mysqli_fetch_array($resultkip,MYSQLI_ASSOC);
        $output .='
                    <tr class="fontblack18">
                        <td colspan="4" align="right"><h3><b>ມູນຄ່າລວມ:  </b></h3></td>
                        <td colspan="4" align="right"><h3><b>'.$rowkip["amount"].' USD</h3> </b></td>
                    </tr>    
                ';
        return $output;
    }
    if(isset($_POST['btnall'])){
        $sql = "select sry_id,emp_name,amount,sal_date,sal_mon,s.status,s.img_path from salary s left join employees e on s.emp_id=e.emp_id where s.status='ອະນຸມັດ';";
        $result = mysqli_query($link,$sql);
        $Bill = 0;
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $Bill = $Bill + 1 ;
            $output .='
                <tr align="center">
                    <td align="center">'.$Bill.'</td>
                    <td align="center">'.$row["sry_id"].'</td>
                    <td align="center">'.$row["emp_name"].'</td>
                    <td align="center">'.$row["amount"].'</td>
                    <td align="center">'.$row["sal_date"].'</td>
                    <td align="center">'.$row["sal_mon"].'</td>
                    <td align="center">'.$row["status"].'</td>
                    <td align="center">
                        <img src="../../Stock/Management/images/'.$row['img_path'].'" width="40px" height="40px" alt="" /><br>
                    </td>
                </tr>
            
            ';
          
        }
        $sqlkip = "select sum(amount) as amount from salary where status='ອະນຸມັດ';";
        $resultkip = mysqli_query($link,$sqlkip);
        $rowkip = mysqli_fetch_array($resultkip,MYSQLI_ASSOC);
        $output .='
                    <tr class="fontblack18">
                        <td colspan="4" align="right"><h3><b>ມູນຄ່າລວມ: </b></h3></td>
                        <td colspan="4" align="right"><h3><b>'.$rowkip["amount"].' USD</h3> </b></td>
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
                        ລາຍງານເງິນເດືອນ<br>
                    </u>
                </h2>
            </div>
            <table width="100%" border="1" cellspacing="0" cellpadding="3" style="font-size: 8px;">
                <tr align="center" style="background-color: #dbdbd8">
                    <th style="width: 10px;">#</th>
                    <th style="width: 20px;">ເລກທີ</th>
                    <th style="width: 80px;">ຜູ້ລົງບັນຊີ</th>
                    <th style="width: 80px;">ມູນຄ່າ</th>
                    <th style="width: 80px;">ລົງວັນທີ</th>
                    <th style="width: 30px;">ປະຈຳເດືອນ</th>
                    <th style="width: 60px;">ສະຖານະ</th>
                    <th style="width: 50px;">ພາບຫຼັກຖານ</th>
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
$mpdf->Output('ລາຍງານເງິນເດືອນ.pdf','I');
?>