<!Doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>ເຂົ້າສູ່ລະບົບ</title>

    <!-- Bootstrap core CSS -->
    <LINK REL="SHORTCUT ICON" HREF="image/ICO.ico">
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet" />
    <link href="css/Style.css" type="text/css" rel="stylesheet" />
  
    <link href="fonts/Phetsarath_OT.ttf" />
    <!-- Custom styles for this template -->
  </head>
  <body>
    
  <?php
    require 'ConnectDB/connectDB.php';
    $sql = "select  * from company;";
    $result = mysqli_query($link,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  ?>
        <div class="container responsive font16" style="margin:0 auto;width:500px;height:430px;margin-top:120px;background-color: white;box-shadow: 5px 10px 8px 8px #9f9e9a;">
          <form action="Check/checklogin.php" id="form1" method="POST"><br>
                <div class="row" align="center"><br>
                    <img src="Stock/Management/images/<?php echo $row['logo']; ?>" alt="" width="180px" height="120px;">
                </div>
                <div class="row col-md-12" align="center"><br>
                        <input type="email" name="email" id="email" placeholder="ທີ່ຢູ່ອີເມວ" class="form-control ">
                </div>
                <div class="row col-md-12" align="center"><br>
                    <input type="password" name="pass" id="pass" placeholder="ລະຫັດຜ່ານ" class="form-control">
                </div>
                <div class="row col-md-12" align="center"><br>
                    <button type="submit" class="btn btn-warning" style="width: 90%">
                        ເຂົ້າສູ່ລະບົບ
                    </button>
                </div>
                <div class="row col-md-12 font12" align="center"><br>
                  <?php echo $row['com_name']; ?> <br>
                  <?php echo $row['email']; ?>
                </div>
          </form>
        </div>
  </body>
</html>
