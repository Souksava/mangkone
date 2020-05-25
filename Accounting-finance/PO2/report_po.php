
<?php
require_once __DIR__ . '../../../vendor/autoload.php';

function ShowData(){

    require '../../ConnectDB/connectDB.php';
    date_default_timezone_set("Asia/Bangkok");
    $datenow = time();
    $Date = date("Y-m-d",$datenow);
    $purchase_id2 = $_POST['purchase_id'];
    $amount2 = $_POST['amount'];
    $rate_id = $_POST['rate_id'];
    $sql = "select pdet_name,qty,price,qty*price as total,billno,po_date from purchasedetail where purchase_id = '$purchase_id2';";
    $result = mysqli_query($link,$sql);
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $Bill = $Bill + 1 ;
        $output .='
            <tr align="center" style="font-size: 10px;">
                <td align="center">'.$Bill.'</td>
                <td align="center">'.$row["billno"].'</td>
                <td align="center">'.$row["po_date"].'</td>
                <td align="center">'.$row["pdet_name"].'</td>
                <td align="center">'.$row["qty"].'</td>
                <td align="center">'.number_format($row["price"],2).' '.$rate_id.'</td>
                <td align="center">'.number_format($row["total"],2).' '.$rate_id.'</td>
               
            </tr>
        
        ';
      
    }
    $sqlAmount = "select sum(qty) as TotalQty from orderdetail d join 
    orders o on d.billno=o.billno where d.billno='$BillNo2' and o.status='$Status';";
    $result7 = mysqli_query($link, $sqlAmount);
    $rowAmount = mysqli_fetch_array($result7, MYSQLI_ASSOC);
    $output .='
                <tr class="fontblack18">
                   
                    <td colspan="4" align="right"><h2><b>'.$rate_id.' Total: </b></h2></td>
                    <td colspan="3" align="center"><h2><b>'.number_format($amount2,2).' '.$rate_id.'</h2> </b></td>
                   
                </tr>    
            ';
    return $output;
}


   
date_default_timezone_set("Asia/Bangkok");
$datenow = time();
$Date = date("d-m-Y",$datenow);
$purchase_id = $_POST['purchase_id'];
$po_date = $_POST['po_date'];
$emp_name = $_POST['emp_name'];
$emp_surname = $_POST['emp_surname'];
$rate_buy = $_POST['rate_buy'];
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
            <div align="center" style="font-size: 10px;">
                ສາທາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ<br>
                ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນາຖາວອນ<br>
                =========oooo=========
            </div>
            <div align="left" style="z-index: 1;position: absolute;margin-top: -50px;">
                <img src="../../Stock/Management/images/'.$logo.'" width="100px">
            </div>
            <div style="float: left; width: 75%;">
                <p>
                    <h4 style="color: orange;">'.$com_name.'</h4>
                    <p style="font-size: 10px;">
                        ຮຽນ: ທ່ານປະທານ ບໍລິສັດ ມັງກອນເຕັກໂນໂລຢີ ຈຳກັດ ທີ່ນັບຖື<br>
                        ເລື່ອງ: ເບີກຈ່າຍ<br>
                        ມີລາຍລະອຽດລຸ່ມນີ້
                    </p>
                </P>
            </div>
            <div style="float: left;text-align: right;">
                <br><br><br>
                ເລກທີ '.$purchase_id.'<br>
                ວັນທີ: '.$po_date.'
            </div>
            <div align="center" style="font-size: 16px;">
                <u>
                    <b>
                        Purchase Order
                    </b>
                </u>
            </div>
            <table width="100%" border="1" cellspacing="0" cellpadding="3" style="font-size: 8px;">
                <tr align="center" >
                    <th colspan="7" style="background-color: #ffd618;"> 
                        ລາຍການ 
                    </th>
                </tr>
                <tr align="center">
                     <th style="width: 20px;">No.</th>
                     <th style="width: 100px;">ເລກທີບິນ</th>
                     <th style="width: 70px;">ວັນທີ</th>
                     <th style="width: 200px;">ລາຍການ</th>
                    <th style="width: 50px;">ຈຳນວນ</th>
                    <th>ລາຄາ</th>
                    <th>ລວມ</th>
                </tr>
            

            ';
$content .= ShowData();
$content .= '</table>
            <div>
                <b>Rate: </b>'.number_format($rate_buy,2).' LAK
            </div>
            <br><br>
            <table width="100%" border="1" cellspacing="0" cellpadding="3" style="font-size: 8px;">
                <tr>
                    <td>
<pre>
   Director   
   
   








   Authorized Person  _______________________

                     (   Watana PATHAMAVONG   )    
                     

                     Date _____________________


</pre>
                    </td>
                    <td>
<pre>
    Purchaser








    Authorized Person  _______________________

                     (   '.$emp_name.' '.$emp_surname.'   )    
                               
                     

                     
                    Date _____________________


</pre>
                    </td>
                </tr>
            </table><br>
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
$mpdf->Output('ໃບສະເໜີລາຍຈ່າຍ.pdf','I');
?>