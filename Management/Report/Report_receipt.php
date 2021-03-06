
<?php
require_once __DIR__ . '../../../vendor/autoload.php';

function ShowData(){

    require '../../ConnectDB/connectDB.php';
    date_default_timezone_set("Asia/Bangkok");
    $datenow = time();
    $Date = date("Y-m-d",$datenow);
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    $rate_id = $_POST['rate_id'];
    if(isset($_POST['btn'])){
        $sql = "select r.re_id,re_date,c.bill,barcode,cash_name,c.qty,c.price,c.qty*c.price as total,c.rate_id,c.rate,c.img_path,c.note,company,emp_name from cash_receipt c left join receipt r on c.re_id=r.re_id left join employees e on r.emp_id=e.emp_id left join customers s on r.cus_id=s.cus_id where r.re_date between '$date1' and '$date2' or rate_id='$rate_id';";
        $result = mysqli_query($link,$sql);
        $Bill = 0;
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $Bill = $Bill + 1 ;
            $output .='
                <tr align="center">
                    <td align="center">'.$Bill.'</td>
                    <td align="center">'.$row["re_date"].'</td>
                    <td align="center">'.$row["bill"].'</td>
                    <td align="center">'.$row["cash_name"].'</td>
                    <td align="center">'.$row["qty"].'</td>
                    <td align="center">'.number_format($row["price"],2).' '.$row["rate_id"].'</td>
                    <td align="center">'.number_format($row["total"],2).' '.$row["rate_id"].'</td>
                    <td align="center">'.$row["note"].'</td>
                    <td align="center">'.$row["re_id"].'</td>
                    <td align="center">'.$row["company"].'</td>
                    <td align="center">'.$row["emp_name"].'</td>
                </tr>
            
            ';
          
        }
        $sqlsum = "select sum(qty*price) as amount_kip,rate_id,sum(vat) as vat,sum(qty*price) + sum(vat) as newamount from cash_receipt c left join receipt r on c.re_id=r.re_id where r.re_date between '$date1' and '$date2' and rate_id='LAK'";
        $resultsum = mysqli_query($link,$sqlsum);
        $rowsum = mysqli_fetch_array($resultsum, MYSQLI_ASSOC);
        $sqlsum2 = "select sum(qty*price) as amount_baht,rate_id,sum(vat) as vat,sum(qty*price) + sum(vat) as newamount from cash_receipt c left join receipt r on c.re_id=r.re_id where r.re_date between '$date1' and '$date2' and rate_id='THB'";
        $resultsum2 = mysqli_query($link,$sqlsum2);
        $rowsum2 = mysqli_fetch_array($resultsum2, MYSQLI_ASSOC);
        $sqlsum3 = "select sum(qty*price) as amount_us,rate_id,sum(vat) as vat,sum(qty*price) + sum(vat) as newamount from cash_receipt c left join receipt r on c.re_id=r.re_id where r.re_date between '$date1' and '$date2' and rate_id='USD'";
        $resultsum3 = mysqli_query($link,$sqlsum3);
        $rowsum3 = mysqli_fetch_array($resultsum3, MYSQLI_ASSOC);
        $sqlsum4 = "select sum(qty*price) as amount_us,rate_id,sum(vat) as vat,sum(qty*price) + sum(vat) as newamount from cash_receipt where rate_id='$rate_id';";
        $resultsum4 = mysqli_query($link,$sqlsum4);
        $rowsum4 = mysqli_fetch_array($resultsum4, MYSQLI_ASSOC);
        if(trim($rate_id) == ""){
        $output .='
                    <tr style="font-size: 26px;">
                        <th colspan="5" style="text-align: right;">ມູນຄ່າລວມ ('.$rowsum["rate_id"].')</th>
                        <th colspan="6" style="text-align: right;">'.$rowsum["rate_id"].' '.number_format($rowsum["amount_kip"],2).'</th>
                    </tr>    
                    <tr style="font-size: 26px;">
                        <th colspan="5" style="text-align: right;">VAT 10%: ('.$rowsum["rate_id"].')</th>
                        <th colspan="3" style="text-align: right;">'.$rowsum["rate_id"].' '.number_format($rowsum["vat"],2).' </th>
                        <th colspan="3" style="text-align: right;">'.$rowsum["rate_id"].' '.number_format($rowsum["newamount"],2).'</th>
                    </tr>  
                    <tr style="font-size: 26px;">
                        <th colspan="5" style="text-align: right;">ມູນຄ່າລວມ ('.$rowsum2["rate_id"].')</th>
                        <th colspan="6" style="text-align: right;">'.$rowsum2["rate_id"].' '.number_format($rowsum2["amount_baht"],2).'</th>
                    </tr>    
                    <tr style="font-size: 26px;">
                        <th colspan="5" style="text-align: right;">VAT 10%: ('.$rowsum2["rate_id"].')</th>
                        <th colspan="3" style="text-align: right;">'.$rowsum2["rate_id"].' '.number_format($rowsum2["vat"],2).' </th>
                        <th colspan="3" style="text-align: right;">'.$rowsum2["rate_id"].' '.number_format($rowsum2["newamount"],2).'</th>
                    </tr>  
                    <tr style="font-size: 26px;">
                        <th colspan="5" style="text-align: right;">ມູນຄ່າລວມ ('.$rowsum3["rate_id"].')</th>
                        <th colspan="6" style="text-align: right;">'.$rowsum3["rate_id"].' '.number_format($rowsum3["amount_us"],2).'</th>
                    </tr>    
                    <tr style="font-size: 26px;">
                        <th colspan="5" style="text-align: right;">VAT 10%: ('.$rowsum3["rate_id"].')</th>
                        <th colspan="3" style="text-align: right;">'.$rowsum3["rate_id"].' '.number_format($rowsum3["vat"],2).' </th>
                        <th colspan="3" style="text-align: right;">'.$rowsum3["rate_id"].' '.number_format($rowsum3["newamount"],2).'</th>
                    </tr>  
                ';
        }
        else {
            $output .='
            <tr style="font-size: 26px;">
                <th colspan="5" style="text-align: right;">ມູນຄ່າລວມ ('.$rowsum4["rate_id"].')</th>
                <th colspan="6" style="text-align: right;"> '.$rowsum4["rate_id"].' '.number_format($rowsum4["amount_us"],2).'</th>
            </tr>  
            <tr style="font-size: 26px;">
                <th colspan="5" style="text-align: right;">VAT 10%: ('.$rowsum4["rate_id"].')</th>
                <th colspan="3" style="text-align: right;">'.$rowsum4["rate_id"].' '.number_format($rowsum4["vat"],2).' </th>
                <th colspan="3" style="text-align: right;">'.$rowsum4["rate_id"].' '.number_format($rowsum4["newamount"],2).'</th>
            </tr>  
        ';
        }
        return $output;
    }
    if(isset($_POST['btnall'])){
        $sql = "select r.re_id,re_date,c.bill,barcode,cash_name,c.qty,c.price,c.qty*c.price as total,c.rate_id,c.rate,c.img_path,c.note,company,emp_name from cash_receipt c left join receipt r on c.re_id=r.re_id left join employees e on r.emp_id=e.emp_id left join customers s on r.cus_id=s.cus_id;";
        $result = mysqli_query($link,$sql);
        $Bill = 0;
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $Bill = $Bill + 1 ;
            $output .='
                <tr align="center">
                    <td align="center">'.$Bill.'</td>
                    <td align="center">'.$row["re_date"].'</td>
                    <td align="center">'.$row["bill"].'</td>
                    <td align="center">'.$row["cash_name"].'</td>
                    <td align="center">'.$row["qty"].'</td>
                    <td align="center">'.number_format($row["price"],2).' '.$row["rate_id"].'</td>
                    <td align="center">'.number_format($row["total"],2).' '.$row["rate_id"].'</td>
                    <td align="center">'.$row["note"].'</td>
                    <td align="center">'.$row["re_id"].'</td>
                    <td align="center">'.$row["company"].'</td>
                    <td align="center">'.$row["emp_name"].'</td>
                </tr>
            
            ';
          
        }
        $sqlsum = "select sum(qty*price) as amount_kip,rate_id,sum(vat) as vat,sum(qty*price) + sum(vat) as newamount from cash_receipt where rate_id='LAK'";
        $resultsum = mysqli_query($link,$sqlsum);
        $rowsum = mysqli_fetch_array($resultsum, MYSQLI_ASSOC);
        $sqlsum2 = "select sum(qty*price) as amount_baht,rate_id,sum(vat) as vat,sum(qty*price) + sum(vat) as newamount from cash_receipt where rate_id='THB'";
        $resultsum2 = mysqli_query($link,$sqlsum2);
        $rowsum2 = mysqli_fetch_array($resultsum2, MYSQLI_ASSOC);
        $sqlsum3 = "select sum(qty*price) as amount_us,rate_id,sum(vat) as vat,sum(qty*price) + sum(vat) as newamount from cash_receipt where rate_id='USD'";
        $resultsum3 = mysqli_query($link,$sqlsum3);
        $rowsum3 = mysqli_fetch_array($resultsum3, MYSQLI_ASSOC);
        $output .='
                <tr style="font-size: 26px;">
                    <th colspan="5" style="text-align: right;">ມູນຄ່າລວມ ('.$rowsum["rate_id"].')</th>
                    <th colspan="6" style="text-align: right;">'.$rowsum["rate_id"].' '.number_format($rowsum["amount_kip"],2).'</th>
                </tr>    
                <tr style="font-size: 26px;">
                    <th colspan="5" style="text-align: right;">VAT 10%: ('.$rowsum["rate_id"].')</th>
                    <th colspan="3" style="text-align: right;">'.$rowsum["rate_id"].' '.number_format($rowsum["vat"],2).' </th>
                    <th colspan="3" style="text-align: right;">'.$rowsum["rate_id"].' '.number_format($rowsum["newamount"],2).'</th>
                </tr>  
                <tr style="font-size: 26px;">
                    <th colspan="5" style="text-align: right;">ມູນຄ່າລວມ ('.$rowsum2["rate_id"].')</th>
                    <th colspan="6" style="text-align: right;">'.$rowsum2["rate_id"].' '.number_format($rowsum2["amount_baht"],2).'</th>
                </tr>    
                <tr style="font-size: 26px;">
                    <th colspan="5" style="text-align: right;">VAT 10%: ('.$rowsum2["rate_id"].')</th>
                    <th colspan="3" style="text-align: right;">'.$rowsum2["rate_id"].' '.number_format($rowsum2["vat"],2).' </th>
                    <th colspan="3" style="text-align: right;">'.$rowsum2["rate_id"].' '.number_format($rowsum2["newamount"],2).'</th>
                </tr>  
                <tr style="font-size: 26px;">
                    <th colspan="5" style="text-align: right;">ມູນຄ່າລວມ ('.$rowsum3["rate_id"].')</th>
                    <th colspan="6" style="text-align: right;">'.$rowsum3["rate_id"].' '.number_format($rowsum3["amount_us"],2).'</th>
                </tr>    
                <tr style="font-size: 26px;">
                    <th colspan="5" style="text-align: right;">VAT 10%: ('.$rowsum3["rate_id"].')</th>
                    <th colspan="3" style="text-align: right;">'.$rowsum3["rate_id"].' '.number_format($rowsum3["vat"],2).' </th>
                    <th colspan="3" style="text-align: right;">'.$rowsum3["rate_id"].' '.number_format($rowsum3["newamount"],2).'</th>
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
                        ລາຍງານລາຍຮັບ<br>
                    </u>
                </h2>
            </div>
            <table width="100%" border="1" cellspacing="0" cellpadding="3" style="font-size: 8px;">
                <tr align="center" style="background-color: #dbdbd8">
                    <th style="width: 10px;">#</th>
                    <th style="width: 80px;">ວັນທີລົງບັນຊີ</th>
                    <th style="width: 70px;">ບິນລາຍຮັບ</th>
                    <th style="width: 300px;">ລາຍການ</th>
                    <th style="width: 60px;">ຈຳນວນ</th>
                    <th style="width: 120px;">ລາຄາ</th>
                    <th style="width: 140px;">ລວມ</th>
                    <th style="width: 100px;">ໝາຍເຫດ</th>
                    <th style="width: 120px;">ເລກທີບັນຊີລາຍຮັບ</th>
                    <th style="width: 150px;">ລູກຄ້າ</th>
                    <th style="width: 80px;">ຜູ້ລົງບັນຊີ</th>
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
$mpdf->Output('ລາຍງານລາຍຮັບ.pdf','I');
?>