
<?php
require_once __DIR__ . '../../../vendor/autoload.php';

function ShowData(){

    require '../../ConnectDB/connectDB.php';
    date_default_timezone_set("Asia/Bangkok");
    $datenow = time();
    $Date = date("Y-m-d",$datenow);
    $date1 = $_POST['date1'];
    $voice_id2 = $_POST['voice_id'];
    $rate2 = $_POST['rate'];
    $sql = "select d.pro_id,pro_name,d.qty,d.price,d.qty*d.price as total from invoicedetail d left join acc_product p on d.pro_id=p.pro_id where d.voice_id='$voice_id2';";
    $result = mysqli_query($link,$sql);
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $Bill = $Bill + 1 ;
        $output .='
            <tr align="center">
                <td align="center">'.$Bill.'</td>
                <td align="center">'.$row["pro_name"].'</td>
                <td align="center">'.$row["qty"].'</td>

                <td align="center"> '.$rate2.' '.number_format($row["price"],2).'</td>
                <td align="center"> '.$rate2.' '.number_format($row["total"],2).' </td>
               
            </tr>
        
        ';
      
    }
    $sqlAmount = "select sum(qty*price) as Total from invoicedetail where voice_id='$voice_id2';";
    $result7 = mysqli_query($link, $sqlAmount);
    $rowAmount = mysqli_fetch_array($result7, MYSQLI_ASSOC);
    $sqlvat = "select sum(vat) as vat from invoicedetail where voice_id='$voice_id2';";
    $resultvat = mysqli_query($link, $sqlvat);
    $rowvat = mysqli_fetch_array($resultvat, MYSQLI_ASSOC);
    $sqltotalamount = "select sum(vat) + sum(qty*price) as amount from invoicedetail where voice_id='$voice_id2';";
    $resulttotalamount = mysqli_query($link, $sqltotalamount);
    $rowtotal = mysqli_fetch_array($resulttotalamount, MYSQLI_ASSOC);
    $output .='
                <tr class="fontblack18">
                    <td colspan="2" align="right"><h3><b>Amount ('.$rate2.') </b></h3></td>
                    <td colspan="3" align="right"><h3><b>'.$rate2.' '.number_format($rowAmount["Total"],2).'</h3> </b></td>
                </tr>    
                <tr class="fontblack18">
                    <td colspan="2" align="right"><h3><b>VAT 10% ('.$rate2.') </b></h3></td>
                    <td colspan="3" align="right"><h3><b>'.$rate2.' '.number_format($rowvat["vat"],2).'</h3> </b></td>
                </tr>    
                <tr class="fontblack18">
                    <td colspan="2" align="right"><h3><b>Total Amount ('.$rate2.') </b></h3></td>
                    <td colspan="3" align="right"><h3><b>'.$rate2.' '.number_format($rowtotal["amount"],2).'</h3> </b></td>
                </tr>    
            ';
    return $output;
}

function Showdetail(){  
     $package = $_POST['package'];
     foreach ($package as $row2) {
        $output2 .='
             <li>- Free '.$row2.'</li>
        ';
     }
    return $output2;
}
date_default_timezone_set("Asia/Bangkok");
$datenow = time();
$Date = date("F d, Y",$datenow);
$voice_id = $_POST['voice_id'];
$emp_name = $_POST['emp_name'];
$emp_surname = $_POST['emp_surname'];
$emp_email = $_POST['emp_email'];
$cus_email = $_POST['cus_email'];
$address = $_POST['address'];
$cus_tel = $_POST['cus_tel'];
$emp_tel = $_POST['emp_tel'];
$billno_ = $_POST['billno_'];
$rate1 = $_POST['rate'];
$Company = $_POST['company'];
$textbill = $_POST['textbill'];
$quo_id = $_POST['quo_id'];
$credit_day = $_POST['credit_day'];
$com_name = $_POST['com_name'];
$com_address = $_POST['com_address'];
$com_tel = $_POST['com_tel'];
$com_fax = $_POST['com_fax'];
$slogan = $_POST['slogan'];
$tax_id = $_POST['tax_id'];
$logo = $_POST['logo'];
$com_email = $_POST['com_email'];
$website = $_POST['website'];
if($quo_id == 0){
    $quo_id = "";
}
else{
    $quo_id = "<b>Refer to: </b>QU".$_POST['quo_id'].$textbill."<br>";
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
            <div style="float: left;text-align: center;padding-top: -10px;">
                <h2>
                    <br><br>
                   INVOICE<br>
                </h2>
            </div>
           <table width="100%" border="1" cellspacing="0" cellpadding="3" style="font-size: 8px;">
                <tr>
                    <td style="width: 65%;">
                        <b>Customer Name:</b> '.$Company.'<br><br>
                        <p>
                            <b>Address: </b>'.$address.'<br>
                            <b> Email: </b>'.$cus_email.' <b>Tel: </b>'.$cus_tel.'
                        </p>
                    </td>
                    <td style="width: 35%;">
                        <b>Document No.: </b>INV'.$voice_id.''.$textbill.'<br>
                        '.$quo_id.'
                        <b>Document Date: </b>'.$Date.'<br>
                        <b>Sale Person: </b>'.$emp_name.' | '.$emp_tel.' <br>
                        <b>Email: </b> '.$emp_email.'
                    </td>
                </tr>
           </table><br>
            <table width="100%" border="1" cellspacing="0" cellpadding="3" style="font-size: 8px;">
                <tr align="center" style="background-color: #dbdbd8;">
                    <th>#</th>
                    <th style="width: 300px;">Equipments and Services List</th>
                    <th>Months</th>
                    <th>Price (Month)</th>
                    <th>Amount</th>
                </tr>
                '.ShowData().'
                </table>
            ';
//$content .= ShowData();
//$content .= '</table>';
$content .= '
            <div style="font-size: 8px;"><u><b>Yearly Service</b></u></div>
            <ul type="none" style="margin-left: -31px;margin-top: -2px; font-size: 8px">
               <li>- 24 x 7 Excusive Services</li>
                <ul type="none" style="margin-left: -25px;">
                    <li>- Internet Network Monitoring</li>
                    <li>- On call / On Site Support</li>
                </ul>
                <li>- Reliable SLA (Priority High/1hrs, Medium/2hrs, Low/4hrs)</li>
                <li>- Enterprise Network equipment at customer site</li>
';  
$content .= Showdetail();
$content .= '
                <li>- Internet speed increase within 30 mins after request</li>
                <li>- Network Quality of Services Management (QoS)</li>
                <li>- System and Network Management base on ISO27001</li>
                <li>- Free of charge (FOC) installment and setup for office relocation 1 time/year</li>
            </ul>';
$content .= '
            <table width="100%" border="1" cellspacing="0" cellpadding="3" style="font-size: 8px;">
                <tr>
                    <td>
<pre>
   <b>'.$Company.'</b>   
   
   





   




   Authorized Person  _______________________

                     (                        )    
                     

                     Date _____________________


</pre>
                    </td>
                    <td>
<pre>
    <b>Mangkone Technology Company Limited</b>










    Authorized Person  _______________________

                     (   Watana PATHAMAVONG    )    
                               
                     

                     
                           '.$Date.'


</pre>
                    </td>
                </tr>
            </table>
                <p style="font-size: 8px">
                    <u><b>Term & Conditions</b></u><br>
                    1. One-time payment '.$credit_day.' days credit after invoice<br>
                    2. Payment directly to "MANGKONE TECHNOLOGY CO.,LTD" in '.$rate1.'
                </p>
                <p style="font-size: 8px">
                    <b>Bank Name: </b>BCEL<br>
                    <b>Account Name: </b>MANGKONE TECHNOLOGY CO.,LTD<br>
                    <b>'.$rate1.' Account Number: </b>'.$billno_.'
                </p>
            ';

$mpdf = new \Mpdf\Mpdf([
    'format'            => 'A4',
    'mode'              => 'utf-8',      
    'tempDir'           => '/tmp',
    'default_font_size' => 8,
    'margin_bottom' => 18, 
    'margin_footer' => 5, 
	'default_font' => 'saysettha_ot'
]);
$footer = '<p align="center" style="font-size: 8px;">Page {PAGENO} of {nb}<br>
'.$com_address.'<br>
Tel: '.$com_tel.', '.$com_fax.' Email: '.$com_email.' '.$website.'</p>';
$mpdf->SetFooter($footer);
$mpdf->WriteHTML($content);
$mpdf->Output('ແບບວາງບິນອິນເຕີເນັດແບບບໍ່ມີສ່ວນລົດ.pdf','I');
?>