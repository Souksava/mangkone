
<?php
require_once __DIR__ . '../../../vendor/autoload.php';
require '../../ConnectDB/connectDB.php';

function ShowData(){

    require '../../ConnectDB/connectDB.php';
    date_default_timezone_set("Asia/Bangkok");
    $datenow = time();
    $Date = date("Y-m-d",$datenow);
    $sry_id2 = $_POST['sry_id'];
    $sqlrate = "select * from rate where rate_id='USD';";
    $resultrate = mysqli_query($link,$sqlrate);
    $rowrate = mysqli_fetch_array($resultrate,MYSQLI_ASSOC);
    $rate_buy = $rowrate['rate_buy'];
    $sql = "select sdet_id,sry_id,emp_name,qty,l.salary,ot,eat,oil,mobile,bonus,missday,miss,more,unit_id,acc_id,ppy_id,(l.salary*qty)+ot+eat+oil+mobile+bonus as total,((l.salary*qty)+ot+eat+oil+mobile+bonus)-(miss+more) as amount,(((l.salary*qty)+ot+eat+oil+mobile+bonus)-(miss+more))*'$rate_buy' as amount_kip,(l.salary*qty)*.055 as lsw1,(l.salary*qty)*0.06 as lsw2 from salarydetail l left join employees e on l.emp_id=e.emp_id where l.sry_id='$sry_id2';";
    $result = mysqli_query($link,$sql);
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $Bill = $Bill + 1 ;
        $output .='
            <tr align="center">
                <td>'.$Bill.'</td>
                <td>'.$row['emp_name'].'</td>
                <td>'.$row['qty'].'</td>
                <td>'.number_format($row['salary'],2).'</td>
                <td>'.number_format($row['ot'],2).'</td>
                <td>'.number_format($row['eat'],2).'</td>
                <td>'.number_format($row['oil'],2).'</td>
                <td>'.number_format($row['mobile'],2).'</td>
                <td>'.number_format($row['bonus'],2).'</td>
                <td>'.number_format($row['total'],2).'</td>
                <td>'.number_format($row['missday']).'</td>
                <td>'.number_format($row['miss'],2).'</td>
                <td>'.number_format($row['lsw1'],2).'</td>
                <td>'.number_format($row['lsw2'],2).'</td>
                <td>'.number_format($row['more'],2).'</td>
                <td>'.number_format($row['amount'],2).' ໂດລາ</td>
                <td>'.number_format($row['amount_kip'],2).' ກີບ</td>   
            </tr>
        
        ';
      
    }
    $sqlAmount = "select sum(((salary*qty)+ot+eat+oil+mobile+bonus)-(miss+more)) as amount_us,sum((((salary*qty)+ot+eat+oil+mobile+bonus)-(miss+more))*'$rate_buy') as amount_kip from salarydetail where sry_id='$sry_id2';";
    $result7 = mysqli_query($link, $sqlAmount);
    $rowAmount = mysqli_fetch_array($result7, MYSQLI_ASSOC);
    $output .='
                <tr class="fontblack18">
                    <td colspan="12" align="right"><h3><b>ມູນຄ່າລວມ USD </b></h3></td>
                    <td colspan="6" align="right"><h3><b>USD '.number_format($rowAmount["amount_us"],2).'</h3> </b></td>
                </tr>    
                <tr class="fontblack18">
                    <td colspan="12" align="right"><h3><b>ມູນຄ່າລວມ LAK </b></h3></td>
                    <td colspan="6" align="right"><h3><b>LAK '.number_format($rowAmount["amount_kip"],2).'</h3> </b></td>
                </tr>      
            ';
    return $output;
}   
date_default_timezone_set("Asia/Bangkok");
$datenow = time();
$Date = date("F d, Y",$datenow);
$sal_mon = $_POST['sal_mon'];
$sry_id = $_POST['sry_id'];
$emp_name = $_POST['emp_name'];
$emp_surname = $_POST['emp_surname'];
$com_name = $_POST['com_name'];
$com_address = $_POST['com_address'];
$com_tel = $_POST['com_tel'];
$com_fax = $_POST['com_fax'];
$slogan = $_POST['slogan'];
$tax_id = $_POST['tax_id'];
$logo = $_POST['logo'];
$com_email = $_POST['com_email'];
$website = $_POST['website'];
$sqlck = "select * from salary where status='ຍັງບໍ່ອະນຸມັດ' and sry_id='$sry_id';";
$resultck = mysqli_query($link,$sqlck);
if(mysqli_num_rows($resultck) > 0){
    echo"<script>";
    echo"alert('ບໍ່ສາມາດພິມໃບເບີກຈ່າຍເງິນເດືອນໄດ້ ເນື່ອງຈາກໃບເບີກຈ່າຍນີ້ຍັງບໍ່ທັນອະນຸມັດ');";
    echo"window.location.href='accept.php';";
    echo"</script>";
}
$content = '';
$content = '
            <div align="left" >
                <div style="float: left; width: 55%; ">
                    <img src="../../Stock/Management/images/'.$logo.'" width="150px">
                </div>
                <div style="float: right;text-align: right;">
                    <h2 style="color: orange;">'.$slogan.'</h2>
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
            </div>
            <div style="float: left;text-align: right;"> <br><br>
                ເລກທີ: '.$sry_id.'<br>
                ວັນທີ: '.$Date.'<br>
            </div>
            <div align="center"  style="font-size: 16px;">
                <u>
                    <b> ຕາຕະລາງຈ່າຍເງິນເດືອນພະນັກງານປະຈຳເດືອນ '.$sal_mon.'</b>
                </u>
            </div>
            <table width="100%" border="1" cellspacing="0" cellpadding="3" style="font-size: 8px;text-align: center;">
                <tr align="center" style="background-color: #dbdbd8;">
                    <th  style="width: 15px;">#</th>
                    <th style="width: 100px;">ຊື່ພະນັກງານ</th>
                    <th>ຈຳນວນເດືອນ</th>
                    <th>ເງິນເດືອນພື້ນຖານ</th>
                    <th style="width: 60px;">ເງິນລ່ວງເວລາ</th>
                    <th>ເງິນກິນເຂົ້າ</th>
                    <th>ເງິນນ້ຳມັນ</th>
                    <th  style="width: 60px;">ເງິນໂທລະສັບ</th>
                    <th>ເງິນໂບນັດ</th>
                    <th>ລວມທັງໝົດ</th>
                    <th>ວັນຂາດ</th>
                    <th style="width: 60px;">ຫັກເງິນຂາດວຽກ</th>
                    <th style="width: 60px;">ຫັກ ອປສ 5,5%</th>
                    <th style="width: 60px;">ຫັກ ອປສ 6%</th>
                    <th style="width: 60px;">ຫັກເງິນອື່ນໆ</th>
                    <th style="width: 100px;">ເງິນເບີກຈ່າຍຕົວຈິງ</th>
                    <th style="width: 100px;">ລວມເປັນເງິນກີບ</th>
                </tr>
                '.ShowData().'
                </table>
            ';
$content .= '<br><br>
            <table width="100%" border="1" cellspacing="0" cellpadding="3" style="font-size: 8px;">
                <tr>
                    <td>
<pre>
   <b>Director</b>   
   
   







   Authorized Person  _______________________

                     (  Watana PATHAMAVONG  )    
                     

                     Date _____________________


</pre>
                    </td>
                    <td>
<pre>
    <b>Finance</b>








    Authorized Person  _______________________

                     ( '.$emp_name.' '.$emp_surname.' )    
                               
                     

                     
                           '.$Date.'


</pre>
                    </td>
                </tr>
            </table>
            ';
$mpdf = new \Mpdf\Mpdf([
    'format'            => 'A4-L',
    'mode'              => 'utf-8',      
    'tempDir'           => '/tmp',
	'default_font_size' => 8,
	'default_font' => 'saysettha_ot'
]);
$footer = '<p align="center" style="font-size: 8px;">Page {PAGENO} of {nb}<br>
'.$com_address.'<br>
Tel: '.$com_tel.', '.$com_fax.' Email: '.$com_email.' '.$website.'</p>';
$mpdf->SetFooter($footer);
$mpdf->WriteHTML($content);
$mpdf->Output('ໃບເບີກຈ່າຍເງິນເດືອນລວມ.pdf','I');
?>