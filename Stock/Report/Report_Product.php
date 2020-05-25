
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
        $sql = "select pro_id,pro_name,unit_name,cate_name,price,price_baht,price_us,img_path from products p left join category c on p.cate_id=c.cate_id left join unit u on p.unit_id=u.unit_id where pro_id='$pro_id' or pro_name='$pro_id' or p.cate_id='$cate_id' or p.unit_id='$unit_id' order by pro_name asc;";
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
                    <td align="center">'.number_format($row["price"],2).' LAK</td>
                    <td align="center">'.number_format($row["price_baht"],2).' THB</td>
                    <td align="center">'.number_format($row["price_us"],2).' USD</td>
                    <td align="center">
                        <img src="../Management/images/'.$row['img_path'].'" width="40px" height="40px" alt="" /><br>
                    </td>
                </tr>
            
            ';
          
        }
        $sqlAmount = "select count(pro_id) as count,sum(price) as total_kip,sum(price_baht) as total_baht,sum(price_us) as total_us from products where pro_id='$pro_id' or pro_name='$pro_id' or cate_id='$cate_id' or unit_id='$unit_id';";
        $result7 = mysqli_query($link, $sqlAmount);
        $rowAmount = mysqli_fetch_array($result7, MYSQLI_ASSOC);
        $output .='
                    <tr class="fontblack18">
                        <td colspan="5" align="right"><h3><b>ຈຳນວນທັງໝົດ  </b></h3></td>
                        <td colspan="3" align="right"><h3><b>'.$rowAmount["count"].' ລາຍການ</h3> </b></td>
                    </tr>    
                    <tr class="fontblack18">
                        <td colspan="5" align="right"><h3><b>ລວມມູນຄ່າເງິນກີບ </b></h3></td>
                        <td colspan="3" align="right"><h3><b>'.number_format($rowAmount["total_kip"],2).' LAK</h3> </b></td>
                    </tr> 
                    <tr class="fontblack18">
                        <td colspan="5" align="right"><h3><b>ລວມມູນຄ່າເງິນບາດ </b></h3></td>
                        <td colspan="3" align="right"><h3><b>'.number_format($rowAmount["total_baht"],2).' THB</h3> </b></td>
                    </tr> 
                    <tr class="fontblack18">
                        <td colspan="5" align="right"><h3><b>ລວມມູນຄ່າເງິນໂດລາ </b></h3></td>
                        <td colspan="3" align="right"><h3><b>'.number_format($rowAmount["total_us"],2).' USD</h3> </b></td>
                    </tr> 
                       
                   
                ';
        return $output;
    }
    if(isset($_POST['btnall'])){
        $sql = "select pro_id,pro_name,unit_name,cate_name,price,price_baht,price_us,img_path from products p left join category c on p.cate_id=c.cate_id left join unit u on p.unit_id=u.unit_id;";
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
                    <td align="center">'.number_format($row["price"],2).' LAK</td>
                    <td align="center">'.number_format($row["price_baht"],2).' THB</td>
                    <td align="center">'.number_format($row["price_us"],2).' USD</td>
                    <td align="center">
                        <img src="../Management/images/'.$row['img_path'].'" width="40px" height="40px" alt="" /><br>
                    </td>
                </tr>
            
            ';
          
        }
        $sqlAmount = "select count(pro_id) as count,sum(price) as total_kip,sum(price_baht) as total_baht,sum(price_us) as total_us from products;";
        $result7 = mysqli_query($link, $sqlAmount);
        $rowAmount = mysqli_fetch_array($result7, MYSQLI_ASSOC);
        $output .='
                    <tr class="fontblack18">
                        <td colspan="5" align="right"><h3><b>ຈຳນວນທັງໝົດ  </b></h3></td>
                        <td colspan="3" align="right"><h3><b>'.$rowAmount["count"].' ລາຍການ</h3> </b></td>
                    </tr>    
                    <tr class="fontblack18">
                        <td colspan="5" align="right"><h3><b>ລວມມູນຄ່າເງິນກີບ </b></h3></td>
                        <td colspan="3" align="right"><h3><b>'.number_format($rowAmount["total_kip"],2).' LAK</h3> </b></td>
                    </tr> 
                    <tr class="fontblack18">
                        <td colspan="5" align="right"><h3><b>ລວມມູນຄ່າເງິນບາດ </b></h3></td>
                        <td colspan="3" align="right"><h3><b>'.number_format($rowAmount["total_baht"],2).' THB</h3> </b></td>
                    </tr> 
                    <tr class="fontblack18">
                        <td colspan="5" align="right"><h3><b>ລວມມູນຄ່າເງິນໂດລາ </b></h3></td>
                        <td colspan="3" align="right"><h3><b>'.number_format($rowAmount["total_us"],2).' USD</h3> </b></td>
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
                        ລາຍງານສິນຄ້າ<br>
                    </u>
                </h2>
            </div>
            <table width="100%" border="1" cellspacing="0" cellpadding="3" style="font-size: 8px;">
                <tr align="center" style="background-color: #dbdbd8">
                    <th>#</th>
                    <th>ລະຫັດສິນຄ້າ</th>
                    <th>ຊື່ສິນຄ້າ</th>
                    <th>ປະເພດສິນຄ້າ</th>
                    <th>ລາຄາ(LAK)</th>
                    <th>ລາຄາ(THB)</th>
                    <th>ລາຄາ(USD)</th>
                    <th>ຮູບພາບ</th>
                </tr>
                '.ShowData().'
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
$mpdf->Output('ລາຍງານສິນຄ້າ.pdf','I');
?>