
<?php
require_once __DIR__ . '../../../vendor/autoload.php';

function ShowData(){

    require '../../ConnectDB/connectDB.php';
    date_default_timezone_set("Asia/Bangkok");
    $datenow = time();
    $Date = date("Y-m-d",$datenow);
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    $emp_id = $_POST['emp_id'];
    $cus_id = $_POST['cus_id'];
    if(isset($_POST['btn'])){
        $sql = "select dateback,timeback,emp_name,d.pro_id,unit_name,cate_name,pro_name,d.serial,d.mac_address,d.qty,company,d.moreinfo,p.img_path from backdistribute d left join products p on d.pro_id=p.pro_id left join category c on p.cate_id=c.cate_id left join unit u on p.unit_id=u.unit_id left join customers l on d.cus_id=l.cus_id left join employees e on d.emp_id=e.emp_id where dateback between '$date1' and '$date2'  or d.emp_id='$emp_id' or d.cus_id='$cus_id'";
        $result = mysqli_query($link,$sql);
        $Bill = 0;
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $Bill = $Bill + 1 ;
            $output .='
                <tr align="center">
                    <td align="center">'.$Bill.'</td>
                    <td align="center">'.$row["dateback"].'</td>
                    <td align="center">'.$row["timeback"].'</td>
                    <td align="center">'.$row["company"].'</td>
                    <td align="center">'.$row["emp_name"].'</td>
                    <td align="center">'.$row["pro_name"].'</td>
                    <td align="center">'.$row["cate_name"].'</td>
                    <td align="center">'.$row["pro_id"].'</td>
                    <td align="center">'.$row["serial"].'</td>
                    <td align="center">'.$row["mac_address"].'</td>
                    <td align="center">'.$row["qty"].' '.$row["unit_name"].'</td>
                    <td align="center">'.$row["moreinfo"].'</td>
                    <td align="center">
                        <img src="../Management/images/'.$row['img_path'].'" width="40px" height="40px" alt="" /><br>
                    </td>
                </tr>
            
            ';
          
        }
        $sqlkip = "select count(*) as amount from backdistribute where dateback between '$date1' and '$date2' or emp_id='$emp_id' or cus_id='$cus_id';";
        $resultkip = mysqli_query($link,$sqlkip);
        $rowkip = mysqli_fetch_array($resultkip,MYSQLI_ASSOC);
        $output .='
            <tr class="fontblack18">
                <td colspan="10" align="right"><h3><b>ຈຳນວນລາຍການ </b></h3></td>
                <td colspan="5" align="right"><h3><b>'.$rowkip["amount"].' ລາຍການ</h3> </b></td>
            </tr>    
                ';
        return $output;
    }
    if(isset($_POST['btnall'])){
        $sql = "select dateback,timeback,emp_name,d.pro_id,unit_name,cate_name,pro_name,d.serial,d.mac_address,d.qty,company,d.moreinfo,p.img_path from backdistribute d left join products p on d.pro_id=p.pro_id left join category c on p.cate_id=c.cate_id left join unit u on p.unit_id=u.unit_id left join customers l on d.cus_id=l.cus_id left join employees e on d.emp_id=e.emp_id;";
        $result = mysqli_query($link,$sql);
        $Bill = 0;
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $Bill = $Bill + 1 ;
            $output .='
                <tr align="center">
                    <td align="center">'.$Bill.'</td>
                    <td align="center">'.$row["dateback"].'</td>
                    <td align="center">'.$row["timeback"].'</td>
                    <td align="center">'.$row["company"].'</td>
                    <td align="center">'.$row["emp_name"].'</td>
                    <td align="center">'.$row["pro_name"].'</td>
                    <td align="center">'.$row["cate_name"].'</td>
                    <td align="center">'.$row["pro_id"].'</td>
                    <td align="center">'.$row["serial"].'</td>
                    <td align="center">'.$row["mac_address"].'</td>
                    <td align="center">'.$row["qty"].' '.$row["unit_name"].'</td>
                    <td align="center">'.$row["moreinfo"].'</td>
                    <td align="center">
                        <img src="../Management/images/'.$row['img_path'].'" width="40px" height="40px" alt="" /><br>
                    </td>
                </tr>
            
            ';
          
        }
        $sqlkip = "select count(*) as amount from backdistribute";
        $resultkip = mysqli_query($link,$sqlkip);
        $rowkip = mysqli_fetch_array($resultkip,MYSQLI_ASSOC);
        $output .='
                    <tr class="fontblack18">
                        <td colspan="10" align="right"><h3><b>ຈຳນວນລາຍການ </b></h3></td>
                        <td colspan="5" align="right"><h3><b>'.$rowkip["amount"].' ລາຍການ</h3> </b></td>
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
                        ລາຍງານສິນຄ້າໝົດສັນຍາ<br>
                    </u>
                </h2>
            </div>
            <table width="100%" border="1" cellspacing="0" cellpadding="3" style="font-size: 8px;">
                <tr align="center" style="background-color: #dbdbd8">
                    <th style="width: 25px">#</th>
                    <th style="width: 35px">ວັນທີ</th>
                    <th style="width: 35px">ເວລາ</th>
                    <th style="width: 130px">ລູກຄ້າ</th>
                    <th style="width: 100px">ຜູ້ເບີກ</th>
                    <th style="width: 120px">ຊື່ສິນຄ້າ</th>
                    <th style="width: 80px">ປະເພດ</th>
                    <th style="width: 120px">ລະຫັດສິນຄ້າ</th>
                    <th style="width: 120px">Serial</th>
                    <th style="width: 120px">Mac Address</th>
                    <th style="width: 5s0px">ຈຳນວນ</th>
                    <th style="width: 100px">ໝາຍເຫດ</th>
                    <th style="width: 50px">ຮູບສິນຄ້າ</th>
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
$mpdf->Output('ລາຍງານສິນຄ້າໝົດສັນຍາ.pdf','I');
?>