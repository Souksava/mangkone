
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
        $sql = "select d.po_id,p.po_id as po2,p.po_date,d.bill,d.pdet_name,d.qty,d.price,d.qty*d.price as total,note,rate_id,p.status,emp_name from podetail d left join po p on p.po_id=d.po_id left join employees e on p.emp_id=e.emp_id where p.po_date between '$date1' and '$date2' or d.rate_id='$rate_id';";
        $result = mysqli_query($link,$sql);
        $Bill = 0;
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $Bill = $Bill + 1 ;
            $output .='
                <tr align="center">
                    <td align="center">'.$Bill.'</td>
                    <td align="center">'.$row["po_date"].'</td>
                    <td align="center">'.$row["bill"].'</td>
                    <td align="center">'.$row["pdet_name"].'</td>
                    <td align="center">'.$row["qty"].'</td>
                    <td align="center">'.number_format($row["price"],2).' '.$row["rate_id"].'</td>
                    <td align="center">'.number_format($row["total"],2).' '.$row["rate_id"].'</td>
                    <td align="center">'.$row["note"].'</td>
                    <td align="center">'.$row["status"].'</td>
                    <td align="center">'.$row["emp_name"].'</td>
                </tr>
            
            ';
          
        }
        $sqlsum = "select sum(qty*price) as amount_kip,rate_id from podetail d left join po p on d.po_id=p.po_id where p.po_date between '$date1' and '$date2' and rate_id='LAK';";
        $resultsum = mysqli_query($link,$sqlsum);
        $rowsum = mysqli_fetch_array($resultsum, MYSQLI_ASSOC);
        $sqlsum2 = "select sum(qty*price) as amount_baht,rate_id from podetail d left join po p on d.po_id=p.po_id where p.po_date between '$date1' and '$date2' and rate_id='THB';";
        $resultsum2 = mysqli_query($link,$sqlsum2);
        $rowsum2 = mysqli_fetch_array($resultsum2, MYSQLI_ASSOC);
        $sqlsum3 = "select sum(qty*price) as amount_us,rate_id from podetail d left join po p on d.po_id=p.po_id where p.po_date between '$date1' and '$date2' and rate_id='USD';";
        $resultsum3 = mysqli_query($link,$sqlsum3);
        $rowsum3 = mysqli_fetch_array($resultsum3, MYSQLI_ASSOC);
        $sqlsum4 = "select sum(qty*price) as amount,rate_id from podetail where rate_id='$rate_id';";
        $resultsum4 = mysqli_query($link,$sqlsum4);
        $rowsum4 = mysqli_fetch_array($resultsum4, MYSQLI_ASSOC);
        if(trim($rate_id) == ""){
        $output .='
                    <tr style="font-size: 26px;">
                        <th colspan="6" style="text-align: right;">ມູນຄ່າລວມ ('.$rowsum["rate_id"].')</th>
                        <th colspan="4" style="text-align: right;">'.number_format($rowsum["amount_kip"],2).' '.$rowsum["rate_id"].'</th>
                    </tr>    
                    <tr style="font-size: 26px;">
                        <th colspan="6" style="text-align: right;">ມູນຄ່າລວມ ('.$rowsum2["rate_id"].')</th>
                        <th colspan="4" style="text-align: right;">'.number_format($rowsum2["amount_baht"],2).' '.$rowsum2["rate_id"].'</th>
                    </tr>  
                    <tr style="font-size: 26px;">
                        <th colspan="6" style="text-align: right;">ມູນຄ່າລວມ ('.$rowsum3["rate_id"].')</th>
                        <th colspan="4" style="text-align: right;">'.number_format($rowsum3["amount_us"],2).' '.$rowsum3["rate_id"].'</th>
                     </tr>    
                ';
        }
        else {
            $output .='
            <tr style="font-size: 26px;">
                <th colspan="6" style="text-align: right;">ມູນຄ່າລວມ ('.$rowsum4["rate_id"].')</th>
                <th colspan="4" style="text-align: right;">'.number_format($rowsum4["amount"],2).' '.$rowsum4["rate_id"].'</th>
            </tr>    
        ';
        }
        return $output;
    }
    if(isset($_POST['btnall'])){
        $sql = "select d.po_id,p.po_id as po2,p.po_date,d.bill,d.pdet_name,d.qty,d.price,d.qty*d.price as total,note,rate_id,p.status,emp_name from podetail d left join po p on p.po_id=d.po_id left join employees e on p.emp_id=e.emp_id;";
        $result = mysqli_query($link,$sql);
        $Bill = 0;
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $Bill = $Bill + 1 ;
            $output .='
                <tr align="center">
                    <td align="center">'.$Bill.'</td>
                    <td align="center">'.$row["po_date"].'</td>
                    <td align="center">'.$row["bill"].'</td>
                    <td align="center">'.$row["pdet_name"].'</td>
                    <td align="center">'.$row["qty"].'</td>
                    <td align="center">'.number_format($row["price"],2).' '.$row["rate_id"].'</td>
                    <td align="center">'.number_format($row["total"],2).' '.$row["rate_id"].'</td>
                    <td align="center">'.$row["note"].'</td>
                    <td align="center">'.$row["status"].'</td>
                    <td align="center">'.$row["emp_name"].'</td>
                </tr>
            
            ';
          
        }
        $sqlsum = "select sum(qty*price) as amount_kip,rate_id from podetail where rate_id='LAK'";
        $resultsum = mysqli_query($link,$sqlsum);
        $rowsum = mysqli_fetch_array($resultsum, MYSQLI_ASSOC);
        $sqlsum2 = "select sum(qty*price) as amount_baht,rate_id from podetail where rate_id='THB'";
        $resultsum2 = mysqli_query($link,$sqlsum2);
        $rowsum2 = mysqli_fetch_array($resultsum2, MYSQLI_ASSOC);
        $sqlsum3 = "select sum(qty*price) as amount_us,rate_id from podetail where rate_id='USD'";
        $resultsum3 = mysqli_query($link,$sqlsum3);
        $rowsum3 = mysqli_fetch_array($resultsum3, MYSQLI_ASSOC);
        $output .='
                    <tr style="font-size: 26px;">
                        <th colspan="6" style="text-align: right;">ມູນຄ່າລວມ ('.$rowsum["rate_id"].')</th>
                        <th colspan="4" style="text-align: right;">'.number_format($rowsum["amount_kip"],2).' '.$rowsum["rate_id"].'</th>
                    </tr>    
                    <tr style="font-size: 26px;">
                        <th colspan="6" style="text-align: right;">ມູນຄ່າລວມ ('.$rowsum2["rate_id"].')</th>
                        <th colspan="4" style="text-align: right;">'.number_format($rowsum2["amount_baht"],2).' '.$rowsum2["rate_id"].'</th>
                    </tr>  
                    <tr style="font-size: 26px;">
                        <th colspan="6" style="text-align: right;">ມູນຄ່າລວມ ('.$rowsum3["rate_id"].')</th>
                        <th colspan="4" style="text-align: right;">'.number_format($rowsum3["amount_us"],2).' '.$rowsum3["rate_id"].'</th>
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
                        ລາຍງານລາຍຈ່າຍ<br>
                    </u>
                </h2>
            </div>
            <table width="100%" border="1" cellspacing="0" cellpadding="3" style="font-size: 8px;">
                <tr align="center" style="background-color: #dbdbd8">
                    <th style="width: 25px;">#</th>
                    <th style="width: 80px;">ວັນທີລົງບັນຊີ</th>
                    <th style="width: 70px;">ບິນລ່າຍຈ່າຍ</th>
                    <th style="width: 200px;">ລາຍການ</th>
                    <th style="width: 60px;">ຈຳນວນ</th>
                    <th style="width: 120px;">ລາຄາ</th>
                    <th style="width: 140px;">ລວມ</th>
                    <th style="width: 60px;">ໝາຍເຫດ</th>
                    <th style="width: 60px;">ສະຖານະ</th>
                    <th style="width: 60px;">ຜູ້ລົງບັນຊີ</th>
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
$mpdf->Output('ລາຍງານລາຍຈ່າຍ.pdf','I');
?>