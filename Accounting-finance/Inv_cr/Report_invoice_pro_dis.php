
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
    $sql = "select d.pro_id,pro_name,sum(d.qty) as qty,d.price,sum(d.qty)*d.price as total from invoicedetail2 d left join products p on d.pro_id=p.pro_id where d.voice_id='$voice_id2' group by d.pro_id;";
    $result = mysqli_query($link,$sql);
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $Bill = $Bill + 1 ;
        $output .='
            <tr align="center">
                <td align="center">'.$Bill.'</td>
                <td align="center">'.$row["pro_id"].'</td>
                <td align="center">'.$row["pro_name"].'</td>
                <td align="center">'.$row["qty"].'</td>

                <td align="center"> '.$rate2.' '.number_format($row["price"],2).'</td>
                <td align="center"> '.$rate2.' '.number_format($row["total"],2).' </td>
               
            </tr>
        
        ';
      
    }
        $sqlsum = "select sum((qty*price) + vat) as newamount,rate_id,sum(qty*price) as amount,sum(vat) as vat,kip_amount,us_amount,baht_amount from invoicedetail2 d left join invoice2 i on d.voice_id=i.voice_id where d.voice_id = '$voice_id2' group by rate_id;";
        $resultsum = mysqli_query($link,$sqlsum);
        $rowsum = mysqli_fetch_array($resultsum, MYSQLI_ASSOC);
        $kip_amount = $rowsum['kip_amount'];
        $baht_amount = $rowsum['baht_amount'];
        $us_amount = $rowsum['us_amount'];
        $discount = $rowsum['newamount'] - ($kip_amount + $baht_amount + $us_amount);
    $output .='
                <tr >
                    <td colspan="3" align="right"><h4><b>Amount ('.$rate2.') </b></h4></td>
                    <td colspan="3" align="right"><h4><b>'.$rate2.' '.number_format($rowsum["amount"],2).'</h4> </b></td>
                </tr>    
                <tr class="fontblack18">
                    <td colspan="3" align="right"><h4><b>VAT 10% ('.$rate2.') </b></h4></td>
                    <td colspan="3" align="right"><h4><b>'.$rate2.' '.number_format($rowsum["vat"],2).'</h4> </b></td>
                </tr>    
                <tr class="fontblack18">
                    <td colspan="3" align="right"><h4><b>Amount ('.$rate2.') </b></h4></td>
                    <td colspan="3" align="right"><h4><b>'.$rate2.' '.number_format($rowsum["newamount"],2).'</h4> </b></td>
                </tr> 
                <tr class="fontblack18">
                    <td colspan="3" align="right"><h4><b>Special Discount ('.$rate2.') </b></h4></td>
                    <td colspan="3" align="right"><h4><b>('.$rate2.' '.number_format($discount,2).')</h4> </b></td>
                </tr>  
                <tr class="fontblack18">
                    <td colspan="3" align="right"><h4><b>Total Amount ('.$rate2.') </b></h4></td>
                    <td colspan="3" align="right"><h4><b>'.$rate2.' '.number_format($rowsum["newamount"] - $discount,2).'</h4> </b></td>
                </tr>    
            ';
    return $output;
}

function Showdetail(){

    require '../../ConnectDB/connectDB.php';
    $voice_id3 = $_POST['voice_id'];
    $sql2 = "select component,description,plus from productdetail p left join invoicedetail2 d on p.pro_id=d.pro_id where voice_id='$voice_id3' group by prod_id;";
    $result2 = mysqli_query($link,$sql2);
    while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
        $output2 .='
            <tr align="center">
                <td align="left"><b>'.$row2["component"].'</b></td>
                <td align="left">'.$row2["description"].'</td>
                <td align="center">'.$row2["plus"].'</td>
            </tr>
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
                        <b>Customer Name: </b>'.$Company.'
                        <p>
                            <b>Address: </b>'.$address.'<br>
                            <b>Tel: </b>'.$cus_tel.'<b> Email: </b>'.$cus_email.'
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
                <tr align="center" style="background-color: #dbdbd8">
                     <th>#</th>
                     <th>Barcode</th>
                    <th style="width: 300px;">Equipment List</th>
                    <th>Qty</th>
                    <th>Price ('.$rate1.')</th>
                    <th>Amount ('.$rate1.')</th>
                </tr>
                '.ShowData().'
                </table><br>
            ';
//$content .= ShowData();
//$content .= '</table><br>';
$content .= '
            <table width="65%" border="1" cellspacing="0" cellpadding="3" style="font-size: 8px;">
                <tr align="center" style="background-color: #ffd618;">
                    <th>COMONENT/PARTS</th>
                    <th>FAULT/FAILURE DESCRIPTION</th>
                    <th>PLUS</th>
                </tr>
                '.Showdetail().'
                </table><br>
';
//$content .= Showdetail();
//$content .= '</table><br>';
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
$mpdf->Output('ໃບວາງບິນສິນຄ້າແບບມີສ່ວນລົດ.pdf','I');
?>