
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    
    <link href="../../../css/bootstrap.css"  rel="stylesheet" />
   
    <link href="../../../css/style.css"  rel="stylesheet" />
    <link href="../../../fonts/glyphicons-halflings-regular.ttf" />
    <link href="../../../fonts/Phetsarath_OT.ttf" />
   
    <script> src="../../../js/production_jQuery331.js"</script>
   
  
   
    
  </head>
  <body  >
      
   
      
        <!-- body -->
        <?php
              require '../../../connectdb/connectDB.php';
              
              $sqlsum = "select Max(BillNo) as BillNo from Sells;";
              $result3 = mysqli_query($link, $sqlsum);
              $rowBill = mysqli_fetch_array($result3, MYSQLI_ASSOC);
             


     
            $sqlShow = "select * from ListSellRetail_View;";
            $result4 = mysqli_query($link, $sqlShow);
           
           
             
         
          ?>
       
        <br>
    <div class="container" >
        <div  >
           
           
            <div class="fontblack100 pad-left60 billmid " align="center">
                <img src="../../../image/logo2.png" width="500px"><br>
                <p><label>ຮ້ານຂາຍຢາສັນຕິພາບ </label></p>
                <!-- <button type="submit" onclick="window.print();return true">print</button> -->
                 
            </div>
            <br><br>
            
              
                <div class="fontblack60" align="left">
                        <label> ທີ່ຢູ່ ບ້ານ ສັນຕິສຸກ  ເມືອງທ່າແຂກ ແຂວງຄຳມ່ວນ </label><br>
                        <label> ເບີໂທ 020 22323636, 051 212954 </label><br>
                        
                        <label class="billRight fontblack60" align="right">ລູກຄ້າທົ່ວໄປ </label><br>
                        <label > ເລກທີບິນ <?PHP echo $rowBill['BillNo'] + 1; ?></label> 
                </div>
               
                <div class="clearfix"></div>
               
               <hr width="100%" size="1" color="black" />
              
           <br> <br>
        <table  class="fontblack60 billmid " >
          <tr>
              <th class="billeft" align="left">ລຳດັບ</th>
              <th class=" billmid " align="center">ຊື່ສິນຄ້າ</th>
              <th class="billRight" align="right">ຈຳນວນ</th>
              <th class=" billmid " align="center">ລາຄາ</th>
              <th class=" billmid " align="center">ລວມ</th>
              <th ></th>
          </tr>
           <?php
             while($row3 = mysqli_fetch_array($result4, MYSQLI_ASSOC)){
               
                
                
               
              
                $Bill = $Bill + 1 ;
               
                
          ?>
       
           <tr >
               
              
                 <td align="left" class="billeft"><?PHP echo $Bill ;?></td>
               <td align="center" class="billmid"  >
               <?PHP echo $row3['Pro_Name']; ?> <br>
              
                </td>
               
               <td  align="right" class="billwid3" ><?PHP echo $row3['Qty'] ;?> x </td>
               <td  align="center" class="billwid3" > <?PHP echo number_format($row3['price']); ?></td>
               <td align="right" colspan="2" ><?PHP echo number_format($row3['total']); ?></td>
              <td></td>
            
               
            
           </tr>
           <tr >
               
              
              <td></td>
               <td align="center"  >
                     <?PHP echo $row3['Pro_ID']; ?>
                </td>
                <td></td>
                <td></td>
                <td></td>
               
              
               
            
           </tr>
          
           <?php
                // $Amount = $Amount + $Total; 
            } 
            $sqlAmount = "select sum(total) as Amount from ListSellRetail_View where BillNo=(select max(BillNo) from ListsellRetail_view);";
            $result7 = mysqli_query($link, $sqlAmount);
            $rowAmount = mysqli_fetch_array($result7, MYSQLI_ASSOC);
              //   $sqlsum = "select sum(Total) as Total from Expire_view;";
              //   $result3 = mysqli_query($link, $sqlsum);
               
              //    $rowsum = mysqli_fetch_array($result3, MYSQLI_ASSOC);
               
             ?>
             
            
       
          
            
            
             
         
        </table>
        <hr width="100%" size="1" color="black" />
        <p align="right"  class="fontblack60" >  
            <b>
                  ລວມເປັນເງິນທັງໝົດ :  
                <?php echo number_format($rowAmount['Amount']); ?> ກີບ
            </b>
        </p>
       
        </div>

    </div>
   
    <div align="center">
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            ............................................................
    </div>

      <?php
            // $connector = new windowsPrintConnector("A83I(Receipt)"); 
            // $Printer = new Printer($connector);
            // $Printer -> text("BillRetail.php");
            // $Printer -> cut();
            // $Printer -> close();
             
      ?>




        <!-- body -->
                          
                         
































     
        
    
  </body>
  <script src="../../js/production_jQuery331.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../js/style.js"></script>
</html>
