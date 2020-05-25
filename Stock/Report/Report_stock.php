
<?php
require_once __DIR__ . '../../../vendor/autoload.php';

function ShowData(){

    require '../../ConnectDB/connectDB.php';
    date_default_timezone_set("Asia/Bangkok");
    $datenow = time();
    $Date = date("Y-m-d",$datenow);
    $pro_id = $_POST['pro_id'];
    $cate_id = $_POST['cate_id'];
    $unit_id = $_POST['unit_id'];
    if(isset($_POST['btn'])){
        $sql = "select p.pro_id,pro_name,unit_name,cate_name,price,price_baht,price_us,img_path,serial,mac_address,qty,moreinfo from stock s left join products p on p.pro_id=s.pro_id left join category c on p.cate_id=c.cate_id left join unit u on p.unit_id=u.unit_id where s.pro_id='$pro_id' or pro_name='$pro_id' or p.cate_id='$cate_id' or p.unit_id='$unit_id' order by pro_name asc;";
        $result = mysqli_query($link,$sql);
        $Bill = 0;
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $Bill = $Bill + 1 ;
            $output .='
                <tr align="center">
                    <td align="center">'.$Bill.'</td>
                    <td align="center">'.$row["pro_id"].'</td>
                    <td align="center">'.$row["pro_name"].'</td>
                    <td align="center">'.$row["cate_name"].'</td>
                    <td align="center">'.$row["serial"].'</td>
                    <td align="center">'.$row["mac_address"].'</td>
                    <td align="center">'.$row["qty"].' '.$row['unit_name'].'</td>
                    <td align="center">
                        <img src="../Management/images/'.$row['img_path'].'" width="40px" height="40px" alt="" /><br>
                    </td>
                    <td align="center">'.$row["moreinfo"].'</td>
                </tr>
            
            ';
          
        }
        $sqlAmount = "select count(s.serial) as count,sum(qty) as total_qty from stock s left join products p on p.pro_id=s.pro_id left join category c on p.cate_id=c.cate_id left join unit u on p.unit_id=u.unit_id where s.pro_id='$pro_id' or pro_name='$pro_id' or p.cate_id='$cate_id' or p.unit_id='$unit_id';";
        $result7 = mysqli_query($link, $sqlAmount);
        $rowAmount = mysqli_fetch_array($result7, MYSQLI_ASSOC);
        $output .='
        <tr class="fontblack18">
            <td colspan="6" align="right"><h3><b>ຈຳນວນລາຍການທັງໝົດ  </b></h3></td>
            <td colspan="3" align="right"><h3><b>'.$rowAmount["count"].' ລາຍການ</h3> </b></td>
        </tr>    
        <tr class="fontblack18">
            <td colspan="6" align="right"><h3><b>ຈຳນວນທັງໝົດ </b></h3></td>
            <td colspan="3" align="right"><h3><b>'.$rowAmount["total_qty"].'</h3> </b></td>
        </tr> 
                ';
        return $output;
    }
    if(isset($_POST['btnall'])){
        $sql = "select p.pro_id,pro_name,unit_name,cate_name,price,price_baht,price_us,img_path,serial,mac_address,qty,moreinfo from stock s left join products p on p.pro_id=s.pro_id left join category c on p.cate_id=c.cate_id left join unit u on p.unit_id=u.unit_id order by pro_name asc;";
        $result = mysqli_query($link,$sql);
        $Bill = 0;
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $Bill = $Bill + 1 ;
            $output .='
                <tr align="center">
                    <td align="center">'.$Bill.'</td>
                    <td align="center">'.$row["pro_id"].'</td>
                    <td align="center">'.$row["pro_name"].'</td>
                    <td align="center">'.$row["cate_name"].'</td>
                    <td align="center">'.$row["serial"].'</td>
                    <td align="center">'.$row["mac_address"].'</td>
                    <td align="center">'.$row["qty"].' '.$row['unit_name'].'</td>
                    <td align="center">
                        <img src="../Management/images/'.$row['img_path'].'" width="40px" height="40px" alt="" /><br>
                    </td>
                    <td align="center">'.$row["moreinfo"].'</td>
                </tr>
            
            ';
          
        }
        $sqlAmount = "select count(s.serial) as count,sum(qty) as total_qty from stock s left join products p on s.pro_id=p.pro_id;";
        $result7 = mysqli_query($link, $sqlAmount);
        $rowAmount = mysqli_fetch_array($result7, MYSQLI_ASSOC);
        $output .='
                    <tr class="fontblack18">
                        <td colspan="6" align="right"><h3><b>ຈຳນວນລາຍການທັງໝົດ  </b></h3></td>
                        <td colspan="3" align="right"><h3><b>'.$rowAmount["count"].' ລາຍການ</h3> </b></td>
                    </tr>    
                    <tr class="fontblack18">
                        <td colspan="6" align="right"><h3><b>ຈຳນວນທັງໝົດ </b></h3></td>
                        <td colspan="3" align="right"><h3><b>'.$rowAmount["total_qty"].'</h3> </b></td>
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
            </div><br>
            <div style="clear: both;"></div>
            <div style="text-align: center;">
                <h2>
                    <u>
                        ລາຍງານສາງສິນຄ້າ<br>
                    </u>
                </h2>
            </div>
            <table width="100%" border="1" cellspacing="0" cellpadding="3" style="font-size: 8px;">
                <tr align="center" style="background-color: #dbdbd8">
                    <th style="width: 15px;">#</th>
                    <th style="width: 100px;">ລະຫັດສິນຄ້າ</th>
                    <th style="width: 100px;">ຊື່ສິນຄ້າ</th>
                    <th style="width: 60px;">ປະເພດສິນຄ້າ</th>
                    <th style="width: 100px;">Serial</th>
                    <th style="width: 100px;">Mac Address</th>
                    <th style="width: 50px;">ຈຳນວນ</th>
                    <th style="width: 50px;">ຮູບພາບ</th>
                    <th style="width: 80px;">ໝາຍເຫດ</th>
                </tr>
                '.ShowData().'
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
$mpdf->defaultfooterline = 0;
$footer = '<p align="center" style="font-size: 8px;">Page {PAGENO} of {nb}<br>
'.$com_address.'<br>
Tel: '.$com_tel.', '.$com_fax.' Email: '.$com_email.' '.$website.'</p>';
$mpdf->SetFooter($footer,'sample');
$mpdf->WriteHTML($content);
$mpdf->Output('ລາຍງານສາງສິນຄ້າ.pdf','I');
?>