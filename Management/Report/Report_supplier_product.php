
<?php
require_once __DIR__ . '../../../vendor/autoload.php';

function ShowData(){

    require '../../ConnectDB/connectDB.php';
    date_default_timezone_set("Asia/Bangkok");
    $datenow = time();
    $Date = date("Y-m-d",$datenow);
    $company = $_POST['company'];
    if(isset($_POST['btn'])){
        $sql = "select * from supplier where sup_id like '$company' or company like '$company';";
        $result = mysqli_query($link,$sql);
        $Bill = 0;
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $Bill = $Bill + 1 ;
            $output .='
                <tr align="center">
                    <td align="center">'.$Bill.'</td>
                    <td align="center">'.$row["cus_id"].'</td>
                    <td align="center">'.$row["company"].'</td>
                    <td align="center">'.$row["address"].'</td>
                    <td align="center">'.$row["tel"].'</td>
                    <td align="center">'.$row["fax"].'</td>
                    <td align="center">'.$row["email"].'</td>
                    <td align="center">'.$row["end_promise"].'</td>
                    <td align="center">
                        <img src="../Management/images/'.$row['img_path'].'" width="40px" height="40px" alt="" /><br>
                    </td>
                </tr>
            
            ';
          
        }
        $sqlAmount = "select count(*) as count from supplier where sup_id like '$company' or company like '$company';";
        $result7 = mysqli_query($link, $sqlAmount);
        $rowAmount = mysqli_fetch_array($result7, MYSQLI_ASSOC);
        $output .='
        <tr class="fontblack18">
            <td colspan="6" align="right"><h3><b>ຈຳນວນລາຍການທັງໝົດ  </b></h3></td>
            <td colspan="3" align="right"><h3><b>'.$rowAmount["count"].' ລາຍການ</h3> </b></td>
        </tr>    
                ';
        return $output;
    }
    if(isset($_POST['btnall'])){
        $sql = "select * from supplier;;";
        $result = mysqli_query($link,$sql);
        $Bill = 0;
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $Bill = $Bill + 1 ;
            $output .='
                <tr align="center">
                    <td align="center">'.$Bill.'</td>
                    <td align="center">'.$row["sup_id"].'</td>
                    <td align="center">'.$row["company"].'</td>
                    <td align="center">'.$row["address"].'</td>
                    <td align="center">'.$row["tel"].'</td>
                    <td align="center">'.$row["fax"].'</td>
                    <td align="center">'.$row["email"].'</td>
                    <td align="center">'.$row["end_promise"].'</td>
                    <td align="center">
                        <img src="../Management/images/'.$row['img_path'].'" width="40px" height="40px" alt="" /><br>
                    </td>
                </tr>
            
            ';
          
        }
        $sqlAmount = "select count(*) as count from supplier;";
        $result7 = mysqli_query($link, $sqlAmount);
        $rowAmount = mysqli_fetch_array($result7, MYSQLI_ASSOC);
        $output .='
                    <tr class="fontblack18">
                        <td colspan="6" align="right"><h3><b>ຈຳນວນລາຍການທັງໝົດ  </b></h3></td>
                        <td colspan="3" align="right"><h3><b>'.$rowAmount["count"].' ລາຍການ</h3> </b></td>
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
                        ລາຍງານຜູ້ສະໜອງສິນຄ້າ<br>
                    </u>
                </h2>
            </div>
            <table width="100%" border="1" cellspacing="0" cellpadding="3" style="font-size: 8px;">
                <tr align="center" style="background-color: #dbdbd8">
                    <th style="width: 25px;">#</th>
                    <th style="width: 30px;">ລະຫັດ</th>
                    <th style="width: 150px;">ຊື່ບໍລິສັດ</th>
                    <th style="width: 200px;">ທີ່ຕັ້ງບໍລິສັດ</th>
                    <th style="width: 100px;">ເບີໂທຕິດຕໍ່</th>
                    <th style="width: 100px;">ແຟັກ</th>
                    <th style="width: 120px;">ທີ່ຢູ່ອີເມວ</th>
                    <th style="width: 100px;">ວັນທີໝົດສັນຍາ</th>
                    <th style="width: 80px;">ໃບສັນຍາ</th>
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
$mpdf->Output('ລາຍງານຜູ້ສະໜອງ.pdf','I');
?>