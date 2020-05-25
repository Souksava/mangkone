
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
        $sql = "select o.billno,emp_name,company,d.pro_id,pro_name,d.qty,d.price,d.qty*d.price as total,dateorder,timeorder,o.status,p.img_path,unit_name,cate_name from orderdetail d left join orders o on d.billno=o.billno left join products p on d.pro_id=p.pro_id left join employees e on o.emp_id=e.emp_id left join supplier s on o.sup_id=s.sup_id left join category c on p.cate_id=c.cate_id left join unit u on p.unit_id=u.unit_id where dateorder between '$date1' and '$date2' and o.status='ອະນຸມັດ';";
        $result = mysqli_query($link,$sql);
        $Bill = 0;
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $Bill = $Bill + 1 ;
            $output .='
                <tr align="center">
                    <td align="center">'.$Bill.'</td>
                    <td align="center">'.$row["billno"].'</td>
                    <td align="center">'.$row["emp_name"].'</td>
                    <td align="center">'.$row["company"].'</td>
                    <td align="center">'.$row["pro_id"].'</td>
                    <td align="center">'.$row["pro_name"].'</td>
                    <td align="center">'.$row["cate_name"].'</td>
                    <td align="center">'.$row["qty"].' '.$row["unit_name"].'</td>
                    <td align="center">'.$row["price"].' LAK</td>
                    <td align="center">'.$row["total"].'LAK</td>
                    <td align="center">'.$row["dateorder"].'</td>
                    <td align="center">'.$row["status"].'</td>
                    <td align="center">
                        <img src="../Management/images/'.$row['img_path'].'" width="40px" height="40px" alt="" /><br>
                    </td>
                </tr>
            
            ';
          
        }
        $sqlkip = "select sum(d.qty*d.price) as amount from orderdetail d left join orders o on d.billno=o.billno where dateorder between '$date1' and '$date2' and o.status='ອະນຸມັດ';";
        $resultkip = mysqli_query($link,$sqlkip);
        $rowkip = mysqli_fetch_array($resultkip,MYSQLI_ASSOC);
        $output .='
                    <tr class="fontblack18">
                        <td colspan="10" align="right"><h3><b>ລວມເງິນກີບ  </b></h3></td>
                        <td colspan="5" align="right"><h3><b>'.number_format($rowkip["amount"],2).' LAK</h3> </b></td>
                    </tr>    
                ';
        return $output;
    }
    if(isset($_POST['btnall'])){
        $sql = "select o.billno,emp_name,company,d.pro_id,pro_name,d.qty,d.price,d.qty*d.price as total,dateorder,timeorder,o.status,p.img_path,unit_name,cate_name from orderdetail d left join orders o on d.billno=o.billno left join products p on d.pro_id=p.pro_id left join employees e on o.emp_id=e.emp_id left join supplier s on o.sup_id=s.sup_id left join category c on p.cate_id=c.cate_id left join unit u on p.unit_id=u.unit_id where o.status='ອະນຸມັດ';";
        $result = mysqli_query($link,$sql);
        $Bill = 0;
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $Bill = $Bill + 1 ;
            $output .='
                <tr align="center">
                    <td align="center">'.$Bill.'</td>
                    <td align="center">'.$row["billno"].'</td>
                    <td align="center">'.$row["emp_name"].'</td>
                    <td align="center">'.$row["company"].'</td>
                    <td align="center">'.$row["pro_id"].'</td>
                    <td align="center">'.$row["pro_name"].'</td>
                    <td align="center">'.$row["cate_name"].'</td>
                    <td align="center">'.$row["qty"].' '.$row["unit_name"].'</td>
                    <td align="center">'.$row["price"].' LAK</td>
                    <td align="center">'.$row["total"].'LAK</td>
                    <td align="center">'.$row["dateorder"].'</td>
                    <td align="center">'.$row["status"].'</td>
                    <td align="center">
                        <img src="../Management/images/'.$row['img_path'].'" width="40px" height="40px" alt="" /><br>
                    </td>
                </tr>
            
            ';
          
        }
        $sqlkip = "select sum(d.qty*d.price) as amount from orderdetail d left join orders o on d.billno=o.billno where o.status='ອະນຸມັດ';";
        $resultkip = mysqli_query($link,$sqlkip);
        $rowkip = mysqli_fetch_array($resultkip,MYSQLI_ASSOC);
        $output .='
                    <tr class="fontblack18">
                        <td colspan="10" align="right"><h3><b>ລວມເງິນກີບ </b></h3></td>
                        <td colspan="5" align="right"><h3><b>'.number_format($rowkip["amount"],2).' LAK</h3> </b></td>
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
                    <th style="width: 40px">#</th>
                    <th style="width: 80px">ເລກທີບິນ</th>
                    <th style="width: 60px">ຜູ້ສັ່ງຊື້</th>
                    <th style="width: 120px">ຜຸ້ສະໜອງ</th>
                    <th style="width: 130px">ລະຫັດສິນຄ້າ</th>
                    <th style="width: 150px">ຊື່ສິນຄ້າ</th>
                    <th style="width: 150px">ປະເພດ</th>
                    <th style="width: 150px">ຈຳນວນ</th>
                    <th style="width: 150px">ລາຄາ</th>
                    <th style="width: 80px">ລວມ</th>
                    <th style="width: 160px">ວັນທີ</th>
                    <th style="width: 80px">ສະຖານະ</th>
                    <th style="width: 100px">ຮູບສິນຄ້າ</th>
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
$mpdf->Output('ລາຍງານການສັ່ງຊື້ສິນຄ້າ.pdf','I');
?>