<?php
/* Change to the correct path if you copy this example! */
require __DIR__ . '/../../autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

/**
 * Install the printer using USB printing support, and the "Generic / Text Only" driver,
 * then share it (you can use a firewall so that it can only be seen locally).
 *
 * Use a WindowsPrintConnector with the share name to print.
 *
 * Troubleshooting: Fire up a command prompt, and ensure that (if your printer is shared as
 * "Receipt Printer), the following commands work:
 *
 *  echo "Hello World" > testfile
 *  copy testfile "\\%COMPUTERNAME%\Receipt Printer"
 *  del testfile
 */
try {
    // Enter the share name for your USB printer here
   // $connector = null;
    $connector = new WindowsPrintConnector("WebPrint");

    /* Print a "Hello world" receipt" */
    $printer = new Printer($connector);
    function ShowData(){

        require '../../../connectdb/connectDB.php';
        date_default_timezone_set("Asia/Bangkok");
        $datenow = time();
        $Date = date("Y-m-d",$datenow);
       
        $sqlsum = "select Max(BillNo) as BillNo from Sells;";
        $result3 = mysqli_query($link, $sqlsum);
        $rowBill = mysqli_fetch_array($result3, MYSQLI_ASSOC);
        $sqlShow = "select * from ListSellRetail_View;";
        $result4 = mysqli_query($link, $sqlShow);
        while($row = mysqli_fetch_array($result4, MYSQLI_ASSOC)){
        
            $output .='
             1  '.$row['Pro_Name'].'      '.$row['Qty'].'     '.$row['price'].'     '.$row['total'].'
    '.$row['Pro_ID'].'
';
          
        }
       
        return $output;
        
     }
    $content .='Pharmacy
    ';
    $content .= ShowData();




    $printer -> text("$content\n");
   // $printer -> cut();
    
    /* Close printer */
    $printer -> close();
} catch (Exception $e) {
    echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
}
