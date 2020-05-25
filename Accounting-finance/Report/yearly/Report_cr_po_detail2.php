
<?php
require_once __DIR__ . '../../../../vendor/autoload.php';

function ShowData(){

    require '../../../ConnectDB/connectDB.php';
    date_default_timezone_set("Asia/Bangkok");
    $datenow = time();
    $Date = date("Y-m-d",$datenow);
    $this_Year = $_POST['year'];
    $last_Year = $this_Year - 1;
    if(isset($_POST['btnall'])){
        $sqlre = "select * from yearly_revenue_view where year(po_date)='$this_Year' or year(re_date)='$this_Year' or year(year_date)='$last_Year';";
        $resultre = mysqli_query($link,$sqlre);
        while($rowre = mysqli_fetch_array($resultre,MYSQLI_ASSOC)){
           $output .='
                    <tr>
                        <td>'.$rowre["unit_name"].'</td>
                        <td align="right"><i>'.number_format($rowre["re_price"]).'</i></td>
                        <td align="right"><i>'.number_format($rowre["re_total"]).'</i></td>
                        <td></td>
                        <td></td>
                    </tr>
                    ';
                    $unit_re = $rowre['unit_id'];
                    $sqlredetail = "select * from yearly_revenuedetail_view where unit_id='$unit_re' and (year(re_date)='$this_Year' or year(year_date)='$last_Year') order by acc_id asc;";
                    $resultredetail = mysqli_query($link,$sqlredetail);
                    while($rowredetail = mysqli_fetch_array($resultredetail,MYSQLI_ASSOC)){
                        $output .='
                                <tr>
                                    <td>'.$rowredetail["acc_id"].': '.$rowredetail["acc_name"].'</td>
                                    <td align="right">'.number_format($rowredetail["re_price"]).'</td>
                                    <td align="right">'.number_format($rowredetail["re_total"]).'</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                        ';
                    }
        }
        $sqlsumre = "select sum(re_price) as re_price,sum(re_total) as re_total from yearly_revenue_view where year(po_date)='$this_Year' or year(re_date)='$this_Year' or year(year_date)='$last_Year';";
        $resultsumre = mysqli_query($link,$sqlsumre);
        $rowsumre = mysqli_fetch_array($resultsumre,MYSQLI_ASSOC);
        $sqlsumpo = "select sum(po_price) as po_price,sum(po_total) as po_total from yearly_po_view where year(po_date)='$this_Year' or year(year_date)='$last_Year';";
        $resultsumpo = mysqli_query($link,$sqlsumpo);
        $rowsumpo = mysqli_fetch_array($resultsumpo,MYSQLI_ASSOC);
        $output .='
                <tr>
                    <td><b>I. ລວມຍອດລາຍຮັບ</b></td>
                    <td align="right"><b>'.number_format($rowsumre["re_price"]).'</b></td>
                    <td align="right"><b>'.number_format($rowsumre["re_total"]).'</b></td>
                    <td><b></b></td>
                    <td><b></b></td>
                </tr>
                ';
        $sqlpo = "select * from yearly_po_view where year(po_date)='$this_Year' or year(re_date)='$this_Year' or year(year_date)='$last_Year';";
        $resultpo = mysqli_query($link,$sqlpo);
        while($rowpo = mysqli_fetch_array($resultpo,MYSQLI_ASSOC)){
        $output .='
                    <tr>
                        <td>'.$rowpo["unit_name"].'</td>
                        <td align="right"><i>'.number_format($rowpo["po_price"]).'</i></td>
                        <td align="right"><i>'.number_format($rowpo["po_total"]).'</i></td>
                        <td></td>
                        <td></td>
                    </tr>
                    ';
                    $unit_po = $rowpo['unit_id'];
                    $sqlpodetail = "select * from yearly_podetail_view where unit_id='$unit_po' and (year(po_date)='$this_Year' or year(year_date)='$last_Year') order by acc_id asc;";
                    $resultpodetail = mysqli_query($link,$sqlpodetail);
                    while($rowpodetail = mysqli_fetch_array($resultpodetail,MYSQLI_ASSOC)){
                        $output .='
                                <tr>
                                    <td>'.$rowpodetail["acc_id"].': '.$rowpodetail["acc_name"].'</td>
                                    <td align="right">'.number_format($rowpodetail["po_price"]).'</td>
                                    <td align="right">'.number_format($rowpodetail["po_total"]).'</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                        ';
                    }
        }
        $output .='
        <tr>
            <td><b>II. ລວມຍອດລາຍຈ່າຍ</b></td>
            <td align="right"><b>'.number_format($rowsumpo["po_price"]).'</b></td>
            <td align="right"><b>'.number_format($rowsumpo["po_total"]).'</b></td>
            <td><b></b></td>
            <td><b></b></td>
        </tr>
        ';
        $output .='
                    <tr>
                        <td><b>(*) - ໃນນັ້ນມູນຄ່າຍັງເຫຼືອໃນບັນຊີຂອງອົງປະກອບທີ່ໄດ້ຂາຍ</b></td>
                        <td align="right"><b>0</b></td>
                        <td align="right"><b>0</b></td>
                        <td><b></b></td>
                        <td><b></b></td>
                    </tr>
                    <tr>
                        <td><b>:................................</b></td>
                        <td align="right"><b>0</b></td>
                        <td align="right"><b>0</b></td>
                        <td><b></b></td>
                        <td><b></b></td>
                    </tr>
                    <tr>
                        <td><b>ໃຫ້ເພີ່ມ ຫຼື ຫຼຸດ</b></td>
                        <td align="right"><b>0</b></td>
                        <td align="right"><b>0</b></td>
                        <td><b></b></td>
                        <td><b></b></td>
                    </tr>
                    <tr>
                        <td><b>ດັດແກ້ລາຍຈ່າຍ</b></td>
                        <td align="right"><b>0</b></td>
                        <td align="right"><b>0</b></td>
                        <td><b></b></td>
                        <td><b></b></td>
                    </tr>
                ';
        $totalThisYear = $rowsumre['re_total'] - $rowsumpo['po_total'];
        $totalLastyear = $rowsumre['re_price'] - $rowsumpo['po_price'];
        $totalThisYear2 = $rowsumre['re_total'] - $rowsumpo['po_total'];
        $totalLastyear2 = $rowsumre['re_price'] - $rowsumpo['po_price'];
        if($totalThisYear < 0){
            $totalThisYear = "(".number_format(abs($totalThisYear)).")";
        }
        else{
            $totalThisYear = number_format($totalThisYear);
        }
        if($totalLastyear < 0){
            $totalLastyear = "(".number_format(abs($totalLastyear)).")";
        }
        else{
            $totalLastyear = number_format($totalLastyear);
        }
        $output .='
                <tr>
                    <td><b>III. ລວມລາຍຈ່າຍຕົວຈິງ</b></td>
                    <td align="right"><b>'.number_format($rowsumpo["po_price"]).'</b></td>
                    <td align="right"><b>'.number_format($rowsumpo["po_total"]).'</b></td>
                    <td><b></b></td>
                    <td><b></b></td>
                </tr>
                ';
        $company = $totalThisYear2 + $totalLastyear2;
        if($company < 0 ){
            $company = '( ຂາດທຶນ )';
        }
        else{
            $company = '( ກຳໄລ )';
        }
        $output .='
                    <tr>
                        <td>
                            <b>ຜົນໄດ້ຮັບ ( I-III )</b> '.$company.'
                        </td>
                ';
        $output .='
                        <td align="right"><b>'.$totalLastyear.'</b></td>
                        <td align="right"><b>'.$totalThisYear.'</b></td>
                        <td><b></b></td>
                        <td><b></b></td>
                    </tr>
                ';
        return $output;
    }
}   
$year = $_POST['year'];
$content = '
            <html>
            <head>
                <title></title>
                <style type="text/css">
                table {
                    border: 1px solid black; 
                    border-collapse: collapse;
                    width: 100%;
                }
                th {
                    border: 1px solid black;
                }
                td {
                    border-right: 1px solid black;
                    padding: 5px;
                }
            </style>
            </head>
            <body>
            <div align="center" style="font-size: 12px;">
                ສາທາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ<br>
                ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນາຖາວອນ<br>
                =========oooo=========
            </div>
            <div style="float: left; width: 33%;font-size:12px;">
                    <p style="font-size: 10px;">
                        ບໍລິສັດ ມັງກອນເຕັກໂນໂລຊີ ຈຳກັດ <br>
                        ບ້ານ ຊຽງຍືນ ເມືອງ ຈັນທະບູລີ <br>
                        ນະຄອນຫຼວງວຽງຈັນ ສປປ ລາວ 
                    </p>
            </div>
            <div style="float: left; width: 38%;text-align:center;font-size:12px;">
                <br><b style="font-size: 18px;">ລາຍລະອຽດ "ໃບລາຍງານຜົນໄດ້ຮັບ"</b>
            </div>
            <div style="float: left;text-align: right;">
                <br><br><br>    
                ປິດບັນຊີ ວັນທີ: 31/12/'.$year.'
            </div>
            <table width="100%" repeat_header="0" style="font-size: 8px;">
                <tr height="30px">
                    <th rowspan="2" style="text-align: center;width: 300px;">ຊື່ລາຍການ</th>   
                    <th rowspan="2" style="text-align: center;width: 90px;">ປີກ່ອນ</th>   
                    <th rowspan="2" style="text-align: center;width: 90px;">ປີນີ້, ສະຫຼຸບບັນຊີ<br>ວັນທີ 31/12/'.$year.'</th> 
                    <th colspan="2" style="text-align: center;width:160px;">ຕົ້ນທຶນທາງກົງ</th>    
                </tr>
                <tr height="30px">
                    <th style="text-align: center;">ຂອງ ຜ/ພ ທີ່ໄດ້ຂາຍ</th>       
                    <th style="text-align: center;">ຂອງສິນຄ້າທີ່ໄດ້ຂາຍ</th> 
                </tr>
                    '.ShowData().'
            </table>
            <br><br>
            <div style="float: left; width: 33%;font-size:12px;">
                <p style="font-size: 12px;">
                    ຜູ້ອຳນວຍການ
                </p>
            </div>
            <div style="float: left; width: 33%;text-align:center;font-size:12px;">
                <p style="font-size: 12px;">
                    ຫົວໜ້າບັນຊີ
                </p>
            </div>
            <div style="float: left;text-align: right;">
                <p style="font-size: 12px;">
                    ຜູ້ຄິດໄລ່
                </p>
            </div>
            </body>
            </html>
            ';
$mpdf = new \Mpdf\Mpdf([
    'format'            => 'A4',
    'mode'              => 'utf-8',      
    'tempDir'           => '/tmp',
    'default_font_size' => 8,
    'margin_bottom' => 18, 
    'margin_footer' => 5, 
    'margin_top' => 8,
	'default_font' => 'saysettha_ot'
]);
$mpdf->defaultfooterline = 0;
$mpdf->defaultheaderline = 0;
$footer = '<p align="right" style="font-size: 8px;">ລາຍງານວັນທີ 31/12/'.$year.' Mangkone v 1.0.0  &nbsp;&nbsp;&nbsp;&nbsp; Page {PAGENO} of {nb}</p>';
//$mpdf->SetHeader($header,'sample');
$mpdf->SetFooter($footer,'sample');
$mpdf->WriteHTML($content);
$mpdf->Output('ລາຍລະອຽດໃບລາຍງານຜົນໄດ້ຮັບ.pdf','I');
?>