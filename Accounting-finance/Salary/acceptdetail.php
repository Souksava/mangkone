<?php
   session_start();
    if($_SESSION['ses_id'] == ''){
        echo"<meta http-equiv='refresh' content='1;URL=../../index.php'>";        
    }
    else if($_SESSION['auther_id'] != 2){
        echo"<meta http-equiv='refresh' content='1;URL=../../Check/logout.php'>";
    }
    else{}
    require '../../ConnectDB/connectDB.php';
    $sry_id = $_GET['sry_id'];
    $sqlseen = "update salary set seen2='SEEN' where status='ອະນຸມັດ' and sry_id='$sry_id';";
    $resultseen = mysqli_query($link,$sqlseen);
    $sqlseen2 = "update salary set seen2='SEEN' where status='ບໍ່ອະນຸມັດ' and sry_id='$sry_id';";
    $resultseen2 = mysqli_query($link,$sqlseen2);
?>
<!Doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ລາຍລະອຽດ</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="accept.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                ລາຍລະອຽດລາຍຈ່າຍ
            </div>
            <div class="tapbar" align="right">
              <a href="../../Check/Logout.php">
                  <img src="../../image/Close.png" width="30px">
              </a>
            </div>
          </div>
      </div>
     <!-- head -->

      <div class="clearfix"></div><br>
      <!-- body -->
    <?php
       
        $sqlget = "select s.sry_id,emp_name,upper(emp_surname) as emp_surname,amount,sal_date,sal_mon,s.status,s.img_path,d.po_id from salary s left join employees e on s.emp_id=e.emp_id left join salarydetail d on s.sry_id=d.sry_id left join po p on d.po_id=p.po_id where s.sry_id='$sry_id' group by s.sry_id;";
        $resultget = mysqli_query($link, $sqlget);
        $rowget = mysqli_fetch_array($resultget, MYSQLI_ASSOC);
        $sqlcompany = "select * from company;";
        $resultcompany = mysqli_query($link,$sqlcompany);
        $rowcompany = mysqli_fetch_array($resultcompany, MYSQLI_ASSOC);
    ?>
    <div class="container font14">
        <div class="row">
            <div style="float: left;">
                <label>ເລກທີ: <?php echo $rowget['sry_id'];?></label><br>
                <label>ລົງວັນທີ: <?php echo $rowget['sal_date'];?></label><br>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal3" style="float: left;width: 50px;height: 43px;" >
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> 
                </button> 
                <form action="acceptdetail.php" method="POST" id="frmdelete">
                    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title font18" id="myModalLabel" align="center"><b>ທ່ານຕ້ອງການຈະລົບ ຫຼື ບໍ່</b></h4>
                                </div>
                                    <input type="hidden" class="form-control" name="sry_id" value="<?php echo $sry_id?>">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">ຍົກເລີກ</button>
                                    <button type="submit" name="btndelete" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form action="Report_salary.php" method="POST" id="form1">
                    <input type="hidden" name="sry_id" value="<?php echo $rowget['sry_id'] ?>">
                    <input type="hidden" name="emp_name" value="<?php echo $rowget['emp_name'] ?>">
                    <input type="hidden" name="emp_surname" value="<?php echo $rowget['emp_surname'] ?>">
                    <input type="hidden" name="sal_date" value="<?php echo $rowget['sal_date'] ?>">
                    <input type="hidden" name="sal_mon" value="<?php echo $rowget['sal_mon'] ?>">
                    <input type="hidden" name="com_name" value="<?php echo $rowcompany['com_name'] ?>">
                    <input type="hidden" name="com_address" value="<?php echo $rowcompany['address'] ?>">
                    <input type="hidden" name="com_tel" value="<?php echo $rowcompany['tel'] ?>">
                    <input type="hidden" name="com_fax" value="<?php echo $rowcompany['fax'] ?>">
                    <input type="hidden" name="slogan" value="<?php echo $rowcompany['slogan'] ?>">
                    <input type="hidden" name="tax_id" value="<?php echo $rowcompany['tax_id'] ?>">
                    <input type="hidden" name="logo" value="<?php echo $rowcompany['logo'] ?>">
                    <input type="hidden" name="com_email" value="<?php echo $rowcompany['email'] ?>">
                    <input type="hidden" name="website" value="<?php echo $rowcompany['website'] ?>">
                    <button type="submit" name="btn" class="btn btn-primary">
                        <img src="../../image/Print.png" width="28px">
                    </button> 
                </form>
            </div>
            <div style="float: right;" align="right">
                <label>ຜູ້ລົງບັນຊີ: <?php echo $rowget['emp_name'];?></label><br>
                <label>ສະຖານະການຈ່າຍ: <?php echo $rowget['status'];?></label><br>
                <a href="#" data-toggle="modal" data-target="#myModal">
                    <img src="../../Stock/Management/images/<?php echo $rowget['img_path']; ?>" width="40px" height="40px" alt="" class="img-circle" /><br>
                </a>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document" style="margin-left: 0px;">
                        <img src="../../Stock/Management/images/<?php echo $rowget['img_path']; ?>" width="100%"  class="imagelist" />
                    </div>
                </div>
                <p style="margin-left: 50px;" class="font12" >
                <a href="#" data-toggle="modal" data-target="#myModal2">
                    ອັບໂຫຼດຫຼັກຖານ
                </a>
                <form action="acceptdetail.php" id="formImage" method="POST" enctype="multipart/form-data">
                    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title font18" id="myModalLabel" align="center"><b>ເລືອກຮູບ</b></h4>
                                </div>
                                <div class="modal-body" align="center">
                                    <div class="row">
                                        <div class="col-xs-12 form-group">
                                            <input type="file" class="form-control" name="img_path">
                                            <input type="hidden" class="form-control" name="sry_id" value="<?php echo $sry_id?>">
                                            <input type="hidden" class="form-control" name="po_id" value="<?php echo $rowget['po_id']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="btnimg" class="btn btn-primary">
                                        <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <?php
                    if(isset($_POST['btnimg'])){
                        $sry_idimg = $_POST['sry_id'];
                        $po_id = $_POST['po_id'];
                        $sqlck2 = "select * from salary where status='ຍັງບໍ່ອະນຸມັດ' and sry_id='$sry_idimg';";
                        $resultck2 = mysqli_query($link,$sqlck2);
                       if(mysqli_num_rows($resultck2) > 0){
                            echo"<script>";
                            echo"alert('ບໍ່ສາມາດໂຫຼດຫຼັກຖານໄດ້ ເນື່ອງຈາກໃບເບີກຈ່າຍເງິນເດືອນນີ້ຍັງບໍ່ທັນໄດ້ອະນຸມັດ');";
                            echo"window.location.href='accept.php';";
                            echo"</script>";
                       }
                       else {
                            if($_FILES['img_path']['name'] == "")//ກວດສອບວ່າຟາຍເປັນຄ່າວ່າງ ຫຼື ບໍ່
                            {
                                echo"<script>";
                                echo"window.location.href='acceptdetail.php';";
                                echo"</script>";
                            }
                            else {
                                $sqlsec = "select img_path from salary where sry_id='$sry_idimg';";
                                $resultsec = mysqli_query($link, $sqlsec);
                                $data2 = mysqli_fetch_array($resultsec, MYSQLI_ASSOC);
                                $path = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data2['img_path'];
                                if(file_exists($path) && !empty($data2['img_path'])){
                                    unlink($path);
                                }
                                $ext = pathinfo(basename($_FILES['img_path']['name']), PATHINFO_EXTENSION);
                                $new_image_name = 'img_'.uniqid().".".$ext;
                                $image_path = "../../Stock/Management/images/";
                                $upload_path = $image_path.$new_image_name;
                                move_uploaded_file($_FILES['img_path']['tmp_name'], $upload_path);
                                $pro_image = $new_image_name;
                                //ສິນສຸດການຕັ້ງຊື່
                                $sql = "update salary set img_path='$pro_image' where sry_id ='$sry_idimg';";
                                $result1 = mysqli_query($link, $sql);
                                $sqlpo = "update po set img_path='$pro_image' where po_id='$po_id';";
                                $resultpo = mysqli_query($link,$sqlpo);
                                if(!$result1)
                                {
                                    echo"<script>";
                                    echo"alert('ບໍ່ສາມາດອັບໂຫຼດຫຼັກຖານໄດ້');";
                                    echo"window.location.href='acceptdetail.php';";
                                    echo"</script>";
                                }
                                else{   
                                    echo"<script>";
                                    echo"alert('ອັບໂຫຼດຫຼັກຖານສຳເລັດ');";
                                    echo"window.location.href='accept.php';";
                                    echo"</script>";
                                }
                            }
                       }
                    }
                    if(isset($_POST['btnUpload'])){
                        $sdet_id = $_POST['sdet_id'];
                        $sry_id2 = $_POST['sry_id'];
                        $sqlck3 = "select * from salary where status='ຍັງບໍ່ອະນຸມັດ' and sry_id='$sry_id2';";
                        $resultck3 = mysqli_query($link,$sqlck3);
                       if(mysqli_num_rows($resultck3) > 0){
                            echo"<script>";
                            echo"alert('ບໍ່ສາມາດໂຫຼດຫຼັກຖານໄດ້ ເນື່ອງຈາກໃບເບີກຈ່າຍເງິນເດືອນນີ້ຍັງບໍ່ທັນໄດ້ອະນຸມັດ');";
                            echo"window.location.href='accept.php';";
                            echo"</script>";
                       }
                       else {
                        if($_FILES['img_path']['name'] == "")//ກວດສອບວ່າຟາຍເປັນຄ່າວ່າງ ຫຼື ບໍ່
                        {
                            echo"<script>";
                            echo"window.location.href='acceptdetail.php';";
                            echo"</script>";
                        }
                        else {
                                $sqlsec2 = "select img_path from salarydetail where sdet_id='$sdet_id';";
                                $resultsec2 = mysqli_query($link, $sqlsec2);
                                $data3 = mysqli_fetch_array($resultsec2, MYSQLI_ASSOC);
                                $path2 = __DIR__.DIRECTORY_SEPARATOR.'../../Stock/Management/images'.DIRECTORY_SEPARATOR.$data3['img_path'];
                                if(file_exists($path2) && !empty($data3['img_path'])){
                                    unlink($path2);
                                }
                                $ext2 = pathinfo(basename($_FILES['img_path']['name']), PATHINFO_EXTENSION);
                                $new_image_name2 = 'img_'.uniqid().".".$ext2;
                                $image_path2 = "../../Stock/Management/images/";
                                $upload_path2 = $image_path2.$new_image_name2;
                                move_uploaded_file($_FILES['img_path']['tmp_name'], $upload_path2);
                                $pro_image2 = $new_image_name2;
                                //ສິນສຸດການຕັ້ງຊື່
                                $sql2 = "update salarydetail set img_path='$pro_image2' where sdet_id ='$sdet_id';";
                                $result2 = mysqli_query($link, $sql2);
                                if(!$result2)
                                {
                                echo"<script>";
                                echo"alert('ບໍ່ສາມາດອັບໂຫຼດຫຼັກຖານໄດ້');";
                                echo"window.location.href='acceptdetail.php';";
                                echo"</script>";
                                }
                                else{   
                                echo"<script>";
                                echo"alert('ອັບໂຫຼດຫຼັກຖານສຳເລັດ');";
                                echo"window.location.href='accept.php';";
                                echo"</script>";
                                }
                        }
                       }
                      
                    }
                    if(isset($_POST['btndelete'])){
                        $sry_idel = $_POST['sry_id'];
                        $sqlck = "select * from salary where status='ອະນຸມັດ' and sry_id='$sry_idel';";
                        $resultck = mysqli_query($link,$sqlck);
                        if(mysqli_num_rows($resultck) > 0){
                            echo"<script>";
                            echo"alert('ບໍ່ສາມາດລົບໄດ້ ເນື່ອງຈາກໃບເບີກຈ່າຍເງິນເດືອນນີ້ໄດ້ອະນຸມັດແລ້ວ');";
                            echo"window.location.href='accept.php';";
                            echo"</script>";
                        }
                        else {
                            $sqldelsd = "delete from salarydetail where sry_id='$sry_idel';";
                            $resultsd = mysqli_query($link, $sqldelsd);
                            $sqldelsa = "delete from salary where sry_id='$sry_idel';";
                            $resultsa = mysqli_query($link,$sqldelsa);
                            if(!$resultsa){
                                echo"<script>";
                                echo"alert('ລົບໃບເບີກຈ່າຍເງິນເດືອນບໍ່ສຳເລັດ');";
                                echo"window.location.href='accept.php';";
                                echo"</script>";
                            }
                            else {
                                echo"<script>";
                               echo"alert('ລົບໃບເບີກຈ່າຍເງິນເດືອນສຳເລັດ');";
                               echo"window.location.href='accept.php';";
                               echo"</script>";
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </div><br>
    <div align="center">
        <h3 class="font26"> <b><u>ຕາຕະລາງສະຫຼຸບຈ່າຍເງິນເດືອນພະນັກງານປະຈຳເດືອນ <?php echo $rowget['sal_mon'] ?></u></b></h3>
    </div>
    <div class="container font14">
        <div class="table-responsive">
            <table class="table table-striped" style="width: 2000px">
                <tr class="info">
                    <th>#</th>
                    <th>ຊື່ພະນັກງານ</th>
                    <th>ນາມສະກຸນ</th>
                    <th>ຈຳນວນເດືອນ</th>
                    <th>ເງິນເດືອນພື້ນຖານ</th>
                    <th>ເງິນລ່ວງເວລາ</th>
                    <th>ເງິນກິນເຂົ້າ</th>
                    <th>ເງິນນ້ຳມັນ</th>
                    <th>ເງິນໂທລະສັບ</th>
                    <th>ເງິນໂບນັດ</th>
                    <th>ລວມທັງໝົດ</th>
                    <th>ວັນຂາດ</th>
                    <th>ຫັກເງິນຂາດວຽກ</th>
                    <th>ຫັກ_ອປສ_5,5%</th>
                    <th>ຫັກ_ອປສ_6%</th>
                    <th>ຫັກເງິນອື່ນໆ</th>
                    <th>ເງິນເບີກຈ່າຍຕົວຈິງ</th>
                    <th>ລວມເປັນເງິນກີບ</th>
                    <th>ຫຼັກຖານ</th>
                    <th colspan="2">ອັບໂຫຼດຫຼັກຖານ</th>
                    <th>ເຄື່ອງມື</th> 
                </tr>
                <?php
                    $sqlrate = "select * from rate where rate_id='USD';";
                    $resultrate = mysqli_query($link,$sqlrate);
                    $rowrate = mysqli_fetch_array($resultrate,MYSQLI_ASSOC);
                    $rate_buy = $rowrate['rate_buy'];
                    $sqlshow = "select sdet_id,sry_id,emp_name as emp_name2,upper(emp_surname) as emp_surname2,qty,l.salary,ot,eat,oil,mobile,bonus,missday,miss,more,acc_id,(l.salary*qty)+ot+eat+oil+mobile+bonus as total,((l.salary*qty)+ot+eat+oil+mobile+bonus)-(miss+more) as amount,(((l.salary*qty)+ot+eat+oil+mobile+bonus)-(miss+more))*'$rate_buy' as amount_kip,(l.salary*qty)*.055 as lsw1,(l.salary*qty)*0.06 as lsw2,l.img_path from salarydetail l left join employees e on l.emp_id=e.emp_id where l.sry_id='$sry_id';";
                    $resultshow = mysqli_query($link,$sqlshow);
                    $NO_ = 0;
                    while($rowshow = mysqli_fetch_array($resultshow, MYSQLI_ASSOC)){
                    $NO_ = $NO_ + 1;
                ?>
                <tr>
                        <td><?php echo $NO_?></td>
                        <td><?php echo $rowshow['emp_name2'] ?></td>
                        <td><?php echo $rowshow['emp_surname2'] ?></td>
                        <td><?php echo $rowshow['qty'] ?></td>
                        <td><?php echo number_format($rowshow['salary'],2) ?></td>
                        <td><?php echo number_format($rowshow['ot'],2) ?></td>
                        <td><?php echo number_format($rowshow['eat'],2) ?></td>
                        <td><?php echo number_format($rowshow['oil'],2) ?></td>
                        <td><?php echo number_format($rowshow['mobile'],2) ?></td>
                        <td><?php echo number_format($rowshow['bonus'],2) ?></td>
                        <td><?php echo number_format($rowshow['total'],2) ?></td>
                        <td><?php echo number_format($rowshow['missday']) ?></td>
                        <td><?php echo number_format($rowshow['miss'],2) ?></td>
                        <td><?php echo number_format($rowshow['lsw1'],2) ?></td>
                        <td><?php echo number_format($rowshow['lsw2'],2) ?></td>
                        <td><?php echo number_format($rowshow['more'],2) ?></td>
                        <td><?php echo number_format($rowshow['amount'],2) ?> ໂດລາ</td>
                        <td><?php echo number_format($rowshow['amount_kip'],2) ?> ກີບ</td>   
                        <td>
                            <a href="../../Stock/Management/images/<?php echo $rowshow['img_path']; ?>">
                                <img src="../../Stock/Management/images/<?php echo $rowshow['img_path']; ?>" width="40px" height="40px" alt="" class="img-circle" /><br>
                            </a>
                        </td>
                        <form action="acceptdetail.php" method="POST" id="uploadfile" enctype="multipart/form-data">
                            <td>
                                    <input type="file" name="img_path" class="form-control">
                                    <input type="hidden" name="sry_id" value="<?php echo $rowget['sry_id'] ?>">
                                    <input type="hidden" name="sdet_id" value="<?php echo $rowshow['sdet_id']; ?>">
                            </td>
                            <td>
                                    <button type="submit" name="btnUpload" class="btn btn-primary">ອັບໂຫຼດ</button>
                                
                            </td>
                        </form>
                        <td>
                            <form action="Report_salarydetail.php" method="POST" id="form1">
                                <input type="hidden" name="sry_id" value="<?php echo $rowget['sry_id'] ?>">
                                <input type="hidden" name="emp_name2" value="<?php echo $rowshow['emp_name2'] ?>">
                                <input type="hidden" name="emp_surname2" value="<?php echo $rowshow['emp_surname2'] ?>">
                                <input type="hidden" name="sdet_id" value="<?php echo $rowshow['sdet_id'];?>">
                                <input type="hidden" name="sal_mon" value="<?php echo $rowget['sal_mon'] ?>">
                                <input type="hidden" name="emp_name" value="<?php echo $rowget['emp_name'] ?>">
                                <input type="hidden" name="emp_surname" value="<?php echo $rowget['emp_surname'] ?>">
                                <input type="hidden" name="com_name" value="<?php echo $rowcompany['com_name'] ?>">
                                <input type="hidden" name="com_address" value="<?php echo $rowcompany['address'] ?>">
                                <input type="hidden" name="com_tel" value="<?php echo $rowcompany['tel'] ?>">
                                <input type="hidden" name="com_fax" value="<?php echo $rowcompany['fax'] ?>">
                                <input type="hidden" name="slogan" value="<?php echo $rowcompany['slogan'] ?>">
                                <input type="hidden" name="tax_id" value="<?php echo $rowcompany['tax_id'] ?>">
                                <input type="hidden" name="logo" value="<?php echo $rowcompany['logo'] ?>">
                                <input type="hidden" name="com_email" value="<?php echo $rowcompany['email'] ?>">
                                <input type="hidden" name="website" value="<?php echo $rowcompany['website'] ?>">
                                <button type="submit" name="btn" class="btn btn-primary">
                                    <img src="../../image/Print.png" width="18px">
                                </button> 
                            </form>
                        </td>
                </tr>
                <?php
                        }
                        $sqlamount = "select sum(((salary*qty)+ot+eat+oil+mobile+bonus)-(miss+more)) as amount_us,sum((((salary*qty)+ot+eat+oil+mobile+bonus)-(miss+more))*'$rate_buy') as amount_kip from salarydetail where sry_id='$sry_id';";
                        $resultamount = mysqli_query($link,$sqlamount);
                        $rowamount = mysqli_fetch_array($resultamount,MYSQLI_ASSOC);
                    ?>
                    <tr class="danger">
                        <th colspan="9" style="text-align: right;font-size: 26px;"><b>ມູນຄ່າລວມ:</b></th>
                        <th colspan="4" style="text-align: center;font-size: 26px;"><b><?php echo number_format($rowamount['amount_us'],2); ?> ໂດລາ</b>
                            <input type="hidden" name="amount" value="<?php echo $rowamount['amount_us'];?>">
                        </th>
                        <th colspan="8" style="text-align: center;font-size: 26px;"><b><?php echo number_format($rowamount['amount_kip'],2); ?> ກີບ</b>
                            <input type="hidden" name="amount_kip" value="<?php echo $rowamount['amount_kip']; ?>">
                        </th>
                    </tr>
            </table>
        </div>
    </div>
      <!-- body -->
  </body>
        <script src="../../js/production_jQuery331.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/Style.js"></script>
</html>
