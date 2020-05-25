
<?php
require_once __DIR__ . '../../../vendor/autoload.php';
require '../../ConnectDB/connectDB.php';
function ShowData(){

    require '../../ConnectDB/connectDB.php';
    date_default_timezone_set("Asia/Bangkok");
    $datenow = time();
    $sqlrate = "select * from rate where rate_id='USD';";
    $resultrate = mysqli_query($link,$sqlrate);
    $rowrate = mysqli_fetch_array($resultrate,MYSQLI_ASSOC);
    $rate_buy = $rowrate['rate_buy'];
    $sdet_id2 = $_POST['sdet_id'];
    $sql = "select sdet_id,e.emp_id,emp_name,upper(emp_surname) as emp_surname,e.gender,e.address,e.tel,e.email,auther_name,qty,l.salary,ot,eat,oil,mobile,bonus,missday,miss,more,unit_id,acc_id,ppy_id,(l.salary*qty)+ot+eat+oil+mobile+bonus as total,((l.salary*qty)+ot+eat+oil+mobile+bonus)-(miss+more) as amount,(((l.salary*qty)+ot+eat+oil+mobile+bonus)-(miss+more))*'$rate_buy' as amount_kip,(l.salary*qty)*.055 as lsw1,(l.salary*qty)*0.06 as lsw2 from salarydetail l left join employees e on l.emp_id=e.emp_id left join auther a on e.auther_id=a.auther_id where l.sdet_id='$sdet_id2'; ";
    $result = mysqli_query($link,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
       
        $output .='
            <tr align="center">
                <td>ລະຫັດພະນັກງານ: '.$row['emp_id'].'</td>
            </tr>
            <tr align="center">
                <td>ຊື່ ແລະ ນາມສະກຸນ: '.$row['emp_name'].' '.$row['emp_surname'].' ເພດ: '.$row['gender'].'</td>
            </tr>
            <tr align="center">
                <td>ທີ່ຢູ່ປັດຈຸບັນ: '.$row['address'].'</td>
            </tr>
            <tr align="center">
                <td>ເບີໂທລະສັບ: '.$row['tel'].' ອີເມວ: '.$row['email'].'</td>
            </tr>
            <tr align="center">
                <td>ຕຳແໜ່ງ: '.$row['auther_name'].'</td>
            </tr>
            <tr align="center">
                <td>ເງິນເດືອນພື້ນຖານ: '.number_format($row['salary'],2).' USD</td>
            </tr>
            <tr align="center">
                <td>ຈຳນວນ: '.$row['qty'].' ເດືອນ</td>
            </tr>
            <tr align="center">
                <td>ເງິນລ່ວງເວລາ: '.number_format($row['ot'],2).' USD</td>
            </tr>
            <tr align="center">
                <td>ເງິນກິນເຂົ້າ: '.number_format($row['eat'],2).'USD</td>
            </tr>
            <tr align="center">
                <td>ເງິນຄ່ານ້ຳມັນ: '.number_format($row['oil'],2).' USD</td>
            </tr>
            <tr align="center">
                <td>ເງິນໂທລະສັບ: '.number_format($row['mobile'],2).' USD</td>
            </tr>
            <tr align="center">
                <td>ເງິນໂບນັດ: '.number_format($row['bonus'],2).' USD</td>
            </tr>
            <tr align="center">
                <td>ລວມ: '.number_format($row['total'],2).' USD</td>
            </tr>
            <tr align="center">
                <td>ວັນຂາດການ: '.$row['missday'].' ວັນ</td>
            </tr>
            <tr align="center">
                <td>ຫັກເງິນຂາດການ: '.number_format($row['miss'],2).' USD</td>
            </tr>
            <tr align="center">
                <td>ເງິນປະກັນສັງຄົມ 5,5 %: '.number_format($row['lsw1'],2).' USD</td>
            </tr>
            <tr align="center">
                <td>ເງິນປະກັນສັງຄົມ 6 %: '.number_format($row['lsw2'],2).' USD</td>
            </tr>
            <tr align="center">
                <td>ຫັກເງິນອື່ນໆ: '.number_format($row['more'],2).' USD</td>
            </tr>
            <tr align="center">
                <td>ເງິນເບີກຈ່າຍຕົວຈິງ: '.number_format($row['amount'],2).' USD  Rate: '.number_format($rate_buy,2).' LAK</td>
            </tr>
            <tr align="center">
                <td>ເປັນເງິນກີບ '.number_format($row['amount_kip'],2).' LAK</td>
            </tr>
        ';
    return $output;
}
date_default_timezone_set("Asia/Bangkok");
$datenow = time();
$Date = date("F d, Y",$datenow);
$sdet_id = $_POST['sdet_id'];
$sry_id = $_POST['sry_id'];
$sal_mon = $_POST['sal_mon'];
$emp_name = $_POST['emp_name'];
$emp_surname = $_POST['emp_surname'];
$emp_name2 = $_POST['emp_name2'];
$emp_surname2 = $_POST['emp_surname2'];
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
$content .= '';
$content .= '
            <div align="left" >
                <div style="float: left; width: 55%; ">
                    <img src="../../Stock/Management/images/'.$logo.'" width="150px">
                </div>
                <div style="float: right;text-align: right;">
                    <h2 style="color: orange;">'.$slogan.'</h2>
                </div>
                </div>
                <div style="float: left; width: 65%; ">
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
            </div><br>
            <div align="center"  style="font-size: 16px;">
                <u>
                    <b> ໃບເບີກຈ່າຍເງິນເດືອນປະຈຳເດືອນ '.$sal_mon.'</b>
                </u>
            </div>
            <table width="100%" cellspacing="0" cellpadding="3" style="font-size: 14px;">
                '.ShowData().'
                </table>
            ';
            $content .= '<br><br>
            <table width="100%" border="1" cellspacing="0" cellpadding="3" style="font-size: 8px;">
                <tr>
                    <td>
<pre>
   <b>Finance</b>   
   



   





   Authorized Person  _______________________

                     ( '.$emp_name.' '.$emp_surname.' )    
                     

                     Date _____________________


</pre>
                    </td>
                    <td>
<pre>
    <b>Employee</b>









    Authorized Person  _______________________

                     ( '.$emp_name2.' '.$emp_surname2.' )    
                               
                     

                     
                           '.$Date.'


</pre>
                    </td>
                </tr>
            </table>
            ';
$mpdf = new \Mpdf\Mpdf([
    'format'            => 'A4',
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
$mpdf->Output('ໃບເບີກຈ່າຍເງີນເດືອນສ່ວນບຸກຄົນ.pdf','I');
?>