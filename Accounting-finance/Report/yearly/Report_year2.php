
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
        $sql = "select * from yearly_view where year(po_date)='$this_Year' or year(re_date)='$this_Year' or year(year_date)='$last_Year';";
        $result = mysqli_query($link,$sql);
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ 
            $last_year = $row['po_price'] - $row['re_price'];
            $this_year = $row['po_total'] - ($row['re_total'] + $row['vat']);
            $total_po = $last_year + $this_year;
            $last_year2 = $row['re_price'] - $row['po_price'];
            $this_year2 = ($row['re_total'] + $row['vat']) - $row['po_total'];
            $total_re = $last_year2 + $this_year2;
            if($row['po_price'] == null){
                $row['po_price'] = 0;
            }
            if($row['re_price'] == null){
                $row['re_price'] = 0;
            }
            if($row['po_total'] == null){
                $row['po_total'] = 0;
            }
            if($row['re_total'] == null){
                $row['re_total'] = 0;
            }
            $output .='
                        <tr style="font-size: 10px">
                            <td>'.$row["acc_id"].'</td>
                            <td>'.$row["acc_name"].'</td>
                    ';
                    if($total_po > 0){
                        $output .='<td align="right">'.number_format($total_po).'</td>';
                    }
                    else{
                        $output .='<td align="right">0</td>';
                    }
                    if($total_re > 0){
                        $output .='<td align="right">'.number_format($total_re).'</td>';
                    }
                    else{
                        $output .='<td align="right">0</td>';
                    }
            $output .='
                            <td align="right">0</td>
                            <td align="right">0</td>
                    ';
                if($total_po > 0){
                    $output .='<td align="right">'.number_format($total_po).'</td>';
                }
                else{
                    $output .='<td align="right">0</td>';
                }
                if($total_re > 0){
                    $output .='<td align="right">'.number_format($total_re).'</td>';
                }
                else{
                    $output .='<td align="right">0</td>';
                }
            $output .=' </tr>';
        }
        $output .=' <tr style="font-size: 10px">';
        $output .=' 
                    <th align="center" colspan="2">ລວມ: </th>
                ';
                $sqlamount_po = "select * from yearly_view where year(po_date)='$this_Year' or year(re_date)='$this_Year' or year(year_date)='$last_Year';";
                $resultamount_po = mysqli_query($link,$sqlamount_po);
                $amount_po = 0;
                while($rowamount_po = mysqli_fetch_array($resultamount_po, MYSQLI_ASSOC)){
                    $last_year_po = $rowamount_po['po_price'] - $rowamount_po['re_price'];
                    $this_year_po = $rowamount_po['po_total'] - ($rowamount_po['re_total'] + $rowamount_po['vat']);
                    $total_po = $last_year_po + $this_year_po;
                    if($total_po > 0){
                        $amount_po = $amount_po + $total_po;
                    }
                }
                $output .='<th align="right">'.number_format($amount_po).'</th>';
                $sqlamount_re = "select * from yearly_view where year(po_date)='$this_Year' or year(re_date)='$this_Year' or year(year_date)='$last_Year';";
                $resultamount_re = mysqli_query($link,$sqlamount_re);
                $amount_re = 0;
                while($rowamount_re = mysqli_fetch_array($resultamount_re, MYSQLI_ASSOC)){
                    $last_year_re = $rowamount_re['re_price'] - $rowamount_re['po_price'];
                    $this_year_re = ($rowamount_re['re_total'] + $rowamount_re['vat']) - $rowamount_re['po_total'];
                    $total_re = $last_year_re + $this_year_re;
                    if($total_re > 0){
                        $amount_re = $amount_re + $total_re;
                    }
                }
                $output .='<th align="right">'.number_format($amount_re).'</th>';
                   
            $output .='    
                        <th align="right">0</th>
                        <th align="right">0</th>
                    ';
            $output .='<th align="right">'.number_format($amount_po).'</th>';
            $output .='<th align="right">'.number_format($amount_re).'</th>';
        $output .=' </tr>';
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
                        ນະຄອນຫຼວງວຽງຈັນ ສປປ ລາວ <br>
                        ໂທ: 021 240 069
                    </p>
            </div>
            <div style="float: left; width: 33%;text-align:center;font-size:12px;">
                <br><b style="font-size: 18px;">ໃບດຸນດ່ຽງ ພາຍຫຼັງ ການປັບປຸງ</b><br>
                ປະຈຳປີ '.$year.'<br>
                ໄລຍະ 01/'.$year.' ຫາ 12/'.$year.'
            </div>
            <div style="float: left;text-align: right;">
                <br><br><br><br>     
                ສະກຸນເງິນກີບ
            </div>
            <table width="100%" repeat_header="0" >
                <tr height="30px" style="font-size:12px;" repeat_header="0">
                    <th rowspan="2" style="text-align: center;width: 55px;">ເລກທີບັນຊີ</th>   
                    <th rowspan="2" style="text-align: center;width: 300px;">ເນື້ອໃນລາຍການ</th>
                    <th colspan="2" style="text-align: center;">ຍອດເຫຼືອທ້າຍກ່ອນການປັບປຸງ</th> 
                    <th colspan="2" style="text-align: center;">ລາຍການປັບປຸງ</th>   
                    <th colspan="2" style="text-align: center;">ຍອດເຫຼືອທ້າຍຍົກໄປ</th> 
                </tr>
                <tr height="30px" style="font-size:12px;" repeat_header="0">
                    <th style="text-align: center;">ໜີ້</th>       
                    <th style="text-align: center;">ມີ</th> 
                    <th style="text-align: center;">ໜີ້</th>       
                    <th style="text-align: center;">ມີ</th> 
                    <th style="text-align: center;">ໜີ້</th>       
                    <th style="text-align: center;">ມີ</th> 
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
    'format'            => 'A4-L',
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
$mpdf->Output('ໃບດຸນດ່ຽງພາຍຫຼັງການປັບປຸງ.pdf','I');
?>