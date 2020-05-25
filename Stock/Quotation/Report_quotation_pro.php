
<?php
require_once __DIR__ . '../../../vendor/autoload.php';

function ShowData(){

    require '../../ConnectDB/connectDB.php';
    date_default_timezone_set("Asia/Bangkok");
    $datenow = time();
    $Date = date("Y-m-d",$datenow);
    $quo_id2 = $_POST['quo_id'];
    $rate2 = $_POST['rate'];
    $sql = "select d.pro_id,pro_name,sum(d.qty) as qty,d.price,sum(d.qty)*d.price as total from quotationdetail2 d left join products p on d.pro_id=p.pro_id where d.quo_id='$quo_id2' group by d.pro_id;";
    $result = mysqli_query($link,$sql);
    $Bill = 0;
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
    $sqlAmount = "select sum(qty*price) as Total from quotationdetail2 where quo_id='$quo_id2';";
    $result7 = mysqli_query($link, $sqlAmount);
    $rowAmount = mysqli_fetch_array($result7, MYSQLI_ASSOC);
    $sqlvat = "select sum(vat) as vat from quotationdetail2 where quo_id='$quo_id2';";
    $resultvat = mysqli_query($link, $sqlvat);
    $rowvat = mysqli_fetch_array($resultvat, MYSQLI_ASSOC);
    $sqltotalamount = "select sum(vat) + sum(qty*price) as amount from quotationdetail2 where quo_id='$quo_id2';";
    $resulttotalamount = mysqli_query($link, $sqltotalamount);
    $rowtotal = mysqli_fetch_array($resulttotalamount, MYSQLI_ASSOC);
    $output .='
                <tr class="fontblack18">
                    <td colspan="4" align="right"><h3><b>Amount ('.$rate2.') </b></h3></td>
                    <td colspan="2" align="right"><h3><b>'.$rate2.' '.number_format($rowAmount["Total"],2).'</h3> </b></td>
                </tr>    
                <tr class="fontblack18">
                    <td colspan="4" align="right"><h3><b>VAT 10% ('.$rate2.') </b></h3></td>
                    <td colspan="2" align="right"><h3><b>'.$rate2.' '.number_format($rowvat["vat"],2).'</h3> </b></td>
                </tr>    
                <tr class="fontblack18">
                    <td colspan="4" align="right"><h3><b>Total Amount ('.$rate2.') </b></h3></td>
                    <td colspan="2" align="right"><h3><b>'.$rate2.' '.number_format($rowtotal["amount"],2).'</h3> </b></td>
                </tr>    
            ';
    return $output;
}

function Showdetail(){

    require '../../ConnectDB/connectDB.php';
    $quo_id3 = $_POST['quo_id'];
    $sql2 = "select component,description,plus from productdetail p left join quotationdetail2 d on p.pro_id=d.pro_id where quo_id='$quo_id3' group by prod_id;";
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
$quo_id = $_POST['quo_id'];
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
            <div style="float: left; width: 70%; ">
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
                   QUOTATION<br>
                </h2>
            </div>
           <table width="100%" border="1" cellspacing="0" cellpadding="3" style="font-size: 8px;">
                <tr>
                    <td style="width: 65%">
                        <b>Customer Name: </b>'.$Company.'
                        <p>
                            <b>Address: </b>'.$address.'<br>
                            <b>Tel: </b>'.$cus_tel.'<b> Email: </b>'.$cus_email.'
                        </p>
                    </td>
                    <td style="width: 35%">
                        <b>Document No.: </b>QU'.$quo_id.''.$textbill.'<br>
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
                1. "Mangkone Technology Company Limited" provide '.$credit_day.' days credit for each Payment Terms<br>
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
$mpdf->defaultfooterline = 0;
$footer = '<p align="center" style="font-size: 8px;">Page {PAGENO} of {nb}<br>
'.$com_address.'<br>
Tel: '.$com_tel.', '.$com_fax.' Email: '.$com_email.' '.$website.'</p>';
$mpdf->SetFooter($footer);

$mpdf->WriteHTML($content);
$mpdf->Output('ໃບສະເໜີລາຄາສິນຄ້າແບບບໍ່ມີສ່ວນລົດ.pdf','I');
?>