
<?php
require_once __DIR__ . '../../../vendor/autoload.php';

function ShowData(){

    require '../../ConnectDB/connectDB.php';
    date_default_timezone_set("Asia/Bangkok");
    $datenow = time();
    $Date = date("Y-m-d",$datenow);
    $date1 = $_POST['date1'];
    $BillNo2 = $_POST['billno'];
    $Company2 = $_POST['company'];
    $Emp_Name2 = $_POST['emp_name'];
    $Status = "ອະນຸມັດ";
    $rate1 = $_POST['rate'];
    $sql = "select d.pro_id,pro_name,cate_name,d.qty,unit_name,d.price,qty*d.price as total from orderdetail d join orders o on d.billno=o.billno join products m on d.pro_id=m.pro_id join category c on m.cate_id=c.cate_id join unit u on m.unit_id=u.unit_id where d.BillNo='$BillNo2' and o.status='$Status';";
    $result = mysqli_query($link,$sql);
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $Bill = $Bill + 1 ;
        $output .='
            <tr align="center">
                <td align="center">'.$Bill.'</td>
                <td align="center">'.$row["pro_id"].'</td>
                <td align="center">'.$row["pro_name"].'</td>
                <td align="center">'.$row["qty"].'</td>
                <td align="center">'.$row["unit_name"].'</td>
                <td align="center">'.number_format($row["price"],2).' '.$rate1.'</td>
                <td align="center">'.number_format($row["total"],2).' '.$rate1.'</td>
               
            </tr>
        
        ';
      
    }
    $sqlAmount = "select sum(qty*price) as Total from orderdetail d join orders o on d.billno=o.billno where d.billno='$BillNo2' and o.status='$Status';";
    $result7 = mysqli_query($link, $sqlAmount);
    $rowAmount = mysqli_fetch_array($result7, MYSQLI_ASSOC);
    $output .='
                <tr class="fontblack18">
                    <td colspan="4" align="center"><h2><b>Total: </b></h2></td>
                    <td colspan="3" align="center"><h2><b>'.number_format($rowAmount["Total"]).' '.$rate1.'</h2> </b></td>
                   
                </tr>    
            ';
    return $output;
}


   
date_default_timezone_set("Asia/Bangkok");
$datenow = time();
$Date = date("d-m-Y",$datenow);
$BillNo = $_POST['billno'];
$Company = $_POST['company'];
$Emp_Name = $_POST['emp_name'];
$Emp_Surname = $_POST['emp_surname'];
$supaddress = $_POST['address'];
$supemail = $_POST['email'];
$suptel = $_POST['tel'];
$emp_tel = $_POST['emp_tel'];
$emp_email = $_POST['emp_email'];
$rate2 = $_POST['rate'];
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
                    <h2 style="color: orange;">'.$slogan.'</h2>
                </div>
            </div>
            <div style="float: left; width: 65%; ">
                <p>
                    <h4 style="color: orange;">'.$com_name.'</h4>
                    <b style="font-size: 10px;">
                       '.$com_address.'
                    </b>
                </P>
            </div>
            <div style="float: left;text-align: center;">
                <h3>
                    <br><br>
                    ໃບສັ່ງຊື້ສິນຄ້າ/Purchase Order<br>
                </h3>
            </div>
           <table width="100%" border="1" cellspacing="0" cellpadding="3" style="font-size: 8px;">
                <tr>
                    <td style="width: 65%;">
                        <b>
                        Company: '.$Company.'
                        </b>
                        <p>
                            <b>Address: </b>'.$supaddress.'<br>
                            <b>Email: </b>'.$supemail.' <b>Phone: </b>'.$suptel.'

                        </p>
                    </td>
                    <td style="width: 35%;">
                        <b>Bill No.: </b>'.$BillNo.'<br>
                        <b>Date of Order: </b>'.$Date.'<br>
                        <b>Order Person: </b>'.$Emp_Name.' | '.$emp_tel.' <br>
                        <b>Email: </b> '.$emp_email.'
                    </td>
                </tr>
           </table><br>
            <table width="100%" border="1" cellspacing="0" cellpadding="3" style="font-size: 8px;">
                <tr align="center" >
                    <th colspan="7" style="background-color: #ffd618;"> 
                        List of Order 
                    </th>
                </tr>
                <tr align="center">
                     <th>#</th>
                     <th>Barcode</th>
                    <th>Description</th>
                    <th>Qty</th>
                    <th>Unit</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            

            ';
$content .= ShowData();
$content .= '</table><br><br>
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
    Order Person







    Authorized Person  _______________________

                     (   '.$Emp_Name.' '.$Emp_Surname.'   )    
                               
                     

                     
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
$mpdf->defaultfooterline = 0;
$footer = '<p align="center" style="font-size: 8px;">Page {PAGENO} of {nb}<br>
'.$com_address.'<br>
Tel: '.$com_tel.', '.$com_fax.' Email: '.$com_email.' '.$website.'</p>';
$mpdf->SetFooter($footer);
$mpdf->WriteHTML($content);
$mpdf->Output('ລາຍງານການສັ່ງຊື້.pdf','I');
?>