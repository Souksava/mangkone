
<?php
require_once __DIR__ . '../../../vendor/autoload.php';

function ShowData(){

    require '../../ConnectDB/connectDB.php';
    date_default_timezone_set("Asia/Bangkok");
    $datenow = time();
    $Date = date("Y-m-d",$datenow);
    $re_id2 = $_POST['re_id'];
    $rate2 = $_POST['rate_id'];
    $sql = "select cash_name,sum(qty) as qty,price,sum(qty)*price as total from cash_receipt where re_id='$re_id2' group by barcode;";
    $result = mysqli_query($link,$sql);
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $Bill = $Bill + 1 ;
        $output .='
            <tr align="center">
                <td align="center">'.$Bill.'</td>
                <td align="center">'.$row["cash_name"].'</td>
                <td align="center">'.$row["qty"].'</td>

                <td align="center"> '.$rate2.' '.number_format($row["price"],2).'</td>
                <td align="center"> '.$rate2.' '.number_format($row["total"],2).' </td>
               
            </tr>
        
        ';
      
    }
    $sqlAmount = "select sum(qty*price) as Total from cash_receipt where re_id='$re_id2';";
    $result7 = mysqli_query($link, $sqlAmount);
    $rowAmount = mysqli_fetch_array($result7, MYSQLI_ASSOC);
    $sqlvat = "select sum(vat) as vat from cash_receipt where re_id='$re_id2';";
    $resultvat = mysqli_query($link, $sqlvat);
    $rowvat = mysqli_fetch_array($resultvat, MYSQLI_ASSOC);
    $sqltotalamount = "select sum(vat) + sum(qty*price) as amount from cash_receipt where re_id='$re_id2';";
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
    require '../../ConnectDB/connectDB.php';
    $re_id3 = $_POST['re_id'];
    $sql2 = "select component,description,plus from productdetail p left join cash_receipt d on p.pro_id=d.barcode where re_id='$re_id3' group by prod_id;";
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
$re_id = $_POST['re_id'];
$Company = $_POST['company'];
$cus_address = $_POST['cus_address'];
$cus_fax = $_POST['cus_fax'];
$cus_tel = $_POST['cus_tel'];
$cus_email = $_POST['cus_email'];
$bill_ = $_POST['bill'];
$emp_name = $_POST['emp_name'];
$emp_email = $_POST['emp_email'];
$emp_tel = $_POST['emp_tel'];
$textbill = $_POST['textbill'];
$com_name = $_POST['com_name'];
$com_address = $_POST['com_address'];
$com_tel = $_POST['com_tel'];
$com_fax = $_POST['com_fax'];
$slogan = $_POST['slogan'];
$tax_id = $_POST['tax_id'];
$logo = $_POST['logo'];
$com_email = $_POST['com_email'];
$website = $_POST['website'];
if($bill_ == 0){
    $bill_ = "";
}
else{
    $bill_ = "<b>Refer to: </b>INV".$_POST['bill'].$textbill."<br>";
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
                   RECEIPT<br>
                </h2>
            </div>
           <table width="100%" border="1" cellspacing="0" cellpadding="3" style="font-size: 8px;">
                <tr>
                    <td style="width: 60%">
                        <b>Customer Name:</b> '.$Company.'<br><br>
                        <p>
                            <b>Address: </b>'.$cus_address.'<br>
                            <b> Email: </b>'.$cus_email.'<br>
                                <b>Tel: </b>'.$cus_tel.' <b>Fax: </b>'.$cus_fax.'
                        </p>
                    </td>
                    <td style="width: 40%">
                        <b>Document No.: </b>RCP'.$re_id.''.$textbill.'<br>
                       '.$bill_.'
                        <b>Document Date: </b>'.$Date.'<br>
                        <b>Sale Person: </b>'.$emp_name.' | '.$emp_tel.' <br>
                        <b>Email: </b> '.$emp_email.'
                    </td>
                </tr>
           </table><br>
            <table width="100%" border="1" cellspacing="0" cellpadding="3" style="font-size: 8px;">
                <tr align="center" style="background-color: #dbdbd8">
                     <th>#</th>
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
            <table width="50%" border="1" cellspacing="0" cellpadding="3" style="font-size: 8px;" align="right">
                <tr>
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
$mpdf->Output('ໃບຮັບເງິນສິນຄ້າປະເພດອຸປະກອນ.pdf','I');
?>