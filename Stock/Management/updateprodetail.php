<?php
   session_start();
    if($_SESSION['ses_id'] == ''){
        echo"<meta http-equiv='refresh' content='1;URL=../../index.php'>";        
    }
    else if($_SESSION['auther_id'] != 1){
        echo"<meta http-equiv='refresh' content='1;URL=../../Check/logout.php'>";
    }
    else{}
    require '../../ConnectDB/connectDB.php';
?>
<!Doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ແກ້ໄຂຂໍ້ມູນ</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
   
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="productdetail.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
               ແກ້ໄຂຂໍ້ມູນລາຍລະອຽດສິນຄ້າ
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
    <div class="container font16">
    <?php 
       $id = $_GET['prod_id'];
       $sqlselect = "select prod_id,d.pro_id,pro_name,component,description,plus from productdetail d left join products p on d.pro_id=p.pro_id where prod_id='$id';";
       $resultselect = mysqli_query($link,$sqlselect);
       $row = mysqli_fetch_array($resultselect, MYSQLI_ASSOC);
    ?>
        <div class="row">
            <div class="col-md-12 col-sm-6 form-group">
                <div class="row">
                    <form action="updateprodetail.php" method="POST" id="form1">
                        <div class="col-xs-12 col-sm-6 form-group">
                            <input type="hidden" name="prod_id" value="<?php echo $row['prod_id'];?>" />
                            <input type="text" value="<?php echo $row['component'];?>" class="form-control" name="component" placeholder="Component">
                        </div> 
                        <div class="col-xs-12 col-sm-6 form-group">
                            <input type="text" value="<?php echo $row['description'];?>" class="form-control" name="description" placeholder="Description">
                        </div> 
                        <div class="col-xs-12 col-sm-6 form-group">
                            <select name="plus" id="" class="form-control">
                                <option value="<?php echo $row['plus'];?>"><?php echo $row['plus'];?></option>
                                <option value="YES">YES</option>
                                <option value="NO">NO</option>
                            </select>
                        </div> 
                        <div class="col-xs-12 col-sm-6 form-group">
                            <select name="pro_id" id="" class="form-control">
                                <option value="<?php echo $row['pro_id'];?>"><?php echo $row['pro_name'];?></option>
                                <?php
                                    $cate = $row['pro_id'];
                                    $sqlcate = "select * from products where pro_id != '$cate';";
                                    $resultcate = mysqli_query($link, $sqlcate);
                                    while($rowcate = mysqli_fetch_array($resultcate, MYSQLI_NUM)){
                                        echo" <option value='$rowcate[0]'>$rowcate[1]</option>";
                                    }
                                ?>
                            </select>
                        </div> 
                        <div class="col-xs-12" align="center">
                            <button type="submit" class="btn btn-success" name="btnUpdate" style="width: 300px;">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp ແກ້ໄຂຂໍ້ມູນ
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
        if(isset($_POST['btnUpdate'])){
            $prod_id = $_POST['prod_id'];
            $pro_id = $_POST['pro_id'];
            $component = $_POST['component'];
            $description = $_POST['description'];
            $plus = $_POST['plus'];
                 $sql = "update productdetail set pro_id='$pro_id',component='$component', description='$description',plus='$plus' where prod_id ='$prod_id';";
                 $result1 = mysqli_query($link, $sql);
                 if(!$result1)
                 {
                    echo"<script>";
                    echo"alert('ແກ້ໄຂຂໍ້ມູນຜິດພາດ');";
                    echo"window.location.href='productdetail.php';";
                    echo"</script>";
                 }
                 else{
                     
                    echo"<script>";
                    echo"alert('ແກ້ໄຂຂໍ້ມູນສຳເລັດ');";
                    echo"window.location.href='productdetail.php';";
                    echo"</script>";
                 }
            
        }
     
    ?>


    
  </body>
        <script src="../../js/production_jQuery331.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/Style.js"></script>
</html>
