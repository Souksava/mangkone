
<?php
require_once __DIR__ . '../../../vendor/autoload.php';

function ShowData(){

    require '../../ConnectDB/connectDB.php';
    date_default_timezone_set("Asia/Bangkok");
    $datenow = time();
    $Date = date("Y-m-d",$datenow);
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    if(isset($_POST['btn'])){
        $sql = "select billimp,billno,company,emp_name,pro_name,i.pro_id,serial,mac_address,qty,i.price,qty*i.price as total,dateimp,timeimp,moreinfo,rate_id,p.img_path,rate,unit_name from imports i left join products p on i.pro_id=p.pro_id left join employees e on i.emp_id=e.emp_id left join supplier s on i.sup_id=s.sup_id left join unit u on p.unit_id=u.unit_id where dateimp between '$date1' and '$date2' order by dateimp asc;";
        $result = mysqli_query($link,$sql);
        $Bill = 0;
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $Bill = $Bill + 1 ;
            $output .='
                <tr align="center">
                    <td align="center">'.$Bill.'</td>
                    <td align="center">'.$row["billimp"].'</td>
                    <td align="center">'.$row["billno"].'</td>
                    <td align="center">'.$row["emp_name"].'</td>
                    <td align="center">'.$row["company"].'</td>
                    <td align="center">'.$row["pro_name"].'</td>
                    <td align="center">'.$row["pro_id"].'</td>
                    <td align="center">'.$row["serial"].'</td>
                    <td align="center">'.$row["mac_address"].'</td>
                    <td align="center">'.$row["qty"].' '.$row["unit_name"].'</td>
                    <td align="center">'.number_format($row["price"],2).' '.$row["rate_id"].'</td>
                    <td align="center">'.number_format($row["total"],2).' '.$row["rate_id"].'</td>
                    <td align="center">'.$row["dateimp"].'</td>
                    <td align="center">'.$row["moreinfo"].'</td>
                    <td align="center">
                        <img src="../Management/images/'.$row['img_path'].'" width="40px" height="40px" alt="" /><br>
                    </td>
                </tr>
            
            ';
          
        }
        $sqlkip = "select sum(qty*price) as amount from imports where dateimp between '$date1' and '$date2' and rate_id='LAK';";
        $resultkip = mysqli_query($link,$sqlkip);
        $rowkip = mysqli_fetch_array($resultkip,MYSQLI_ASSOC);
        $sqlbaht = "select sum(qty*price) as amount from imports where dateimp between '$date1' and '$date2' and rate_id='THB';";
        $resultbaht = mysqli_query($link,$sqlbaht);
        $rowbaht = mysqli_fetch_array($resultbaht,MYSQLI_ASSOC);
        $output .='
                    <tr class="fontblack18">
                        <td colspan="10" align="right"><h3><b>ລວມເງິນກີບ  </b></h3></td>
                        <td colspan="5" align="right"><h3><b>'.number_format($rowkip["amount"],2).' LAK</h3> </b></td>
                    </tr>    
                    <tr class="fontblack18">
                        <td colspan="10" align="right"><h3><b>ລວມເງິນບາດ </b></h3></td>
                        <td colspan="5" align="right"><h3><b>'.number_format($rowbaht["amount"],2).' THB</h3> </b></td>
                    </tr> 
                   
                ';
        return $output;
    }
    if(isset($_POST['btnall'])){
        $sql = "select billimp,billno,company,emp_name,pro_name,i.pro_id,serial,mac_address,qty,i.price,qty*i.price as total,dateimp,timeimp,moreinfo,rate_id,p.img_path,rate,unit_name from imports i left join products p on i.pro_id=p.pro_id left join employees e on i.emp_id=e.emp_id left join supplier s on i.sup_id=s.sup_id left join unit u on p.unit_id=u.unit_id order by dateimp asc;";
        $result = mysqli_query($link,$sql);
        $Bill = 0;
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $Bill = $Bill + 1 ;
            $output .='
                <tr align="center">
                    <td align="center">'.$Bill.'</td>
                    <td align="center">'.$row["billimp"].'</td>
                    <td align="center">'.$row["billno"].'</td>
                    <td align="center">'.$row["emp_name"].'</td>
                    <td align="center">'.$row["company"].'</td>
                    <td align="center">'.$row["pro_name"].'</td>
                    <td align="center">'.$row["pro_id"].'</td>
                    <td align="center">'.$row["serial"].'</td>
                    <td align="center">'.$row["mac_address"].'</td>
                    <td align="center">'.$row["qty"].' '.$row["unit_name"].'</td>
                    <td align="center">'.number_format($row["price"],2).' '.$row["rate_id"].'</td>
                    <td align="center">'.number_format($row["total"],2).' '.$row["rate_id"].'</td>
                    <td align="center">'.$row["dateimp"].'</td>
                    <td align="center">'.$row["moreinfo"].'</td>
                    <td align="center">
                        <img src="../Management/images/'.$row['img_path'].'" width="40px" height="40px" alt="" /><br>
                    </td>
                </tr>
            
            ';
          
        }
        $sqlkip = "select sum(qty*price) as amount from imports where rate_id='LAK';";
        $resultkip = mysqli_query($link,$sqlkip);
        $rowkip = mysqli_fetch_array($resultkip,MYSQLI_ASSOC);
        $sqlbaht = "select sum(qty*price) as amount from imports where rate_id='THB';";
        $resultbaht = mysqli_query($link,$sqlbaht);
        $rowbaht = mysqli_fetch_array($resultbaht,MYSQLI_ASSOC);
        $output .='
                    <tr class="fontblack18">
                        <td colspan="10" align="right"><h3><b>ລວມເງິນກີບ  </b></h3></td>
                        <td colspan="5" align="right"><h3><b>'.number_format($rowkip["amount"],2).' LAK</h3> </b></td>
                    </tr>    
                    <tr class="fontblack18">
                        <td colspan="10" align="right"><h3><b>ລວມເງິນບາດ </b></h3></td>
                        <td colspan="5" align="right"><h3><b>'.number_format($rowbaht["amount"],2).' THB</h3> </b></td>
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
                        ລາຍງານການນຳເຂົ້າສິນຄ້າ<br>
                    </u>
                </h2>
            </div>
            <table width="100%" border="1" cellspacing="0" cellpadding="3" style="font-size: 8px;">
                <tr align="center" style="background-color: #dbdbd8">
                    <th style="width: 20px">#</th>
                    <th style="width: 45px">ບິນນຳເຂົ້າ</th>
                    <th style="width: 45px">ບິນສັ່ງຊື້</th>
                    <th style="width: 80px">ພະນັກງານ</th>
                    <th style="width: 80px">ຜຸ້ສະໜອງ</th>
                    <th style="width: 80px">ຊື່ສິນຄ້າ</th>
                    <th style="width: 80px">ລະຫັດສິນຄ້າ</th>
                    <th style="width: 80px">Serial</th>
                    <th style="width: 80px">Mac Address</th>
                    <th style="width: 50px">ຈຳນວນ</th>
                    <th style="width: 80px">ລາຄາ</th>
                    <th style="width: 80px">ລວມ</th>
                    <th style="width: 30px">ວັນທີນຳເຂົ້າ</th>
                    <th style="width: 80px">ໝາຍເຫດ</th>
                    <th style="width: 50px">ຮູບພາບ</th>
                </tr>
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
$mpdf->Output('ລາຍງານການນຳເຂົ້າສິນຄ້າ.pdf','I');
?>