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
    <title>ຈັດການລາຍລະອຽດສິນຄ້າ</title>
    <LINK REL="SHORTCUT ICON" HREF="../../image/ICO.ico">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
   
  </head>
  <body >
    <!-- head -->
      <div class="header">
        <div class="container font18">
            <div class="tapbar">
                <a href="management.php">
                    <img src="../../image/Back.png" width="30px">
                </a>
            </div>
            <div align="center" class="tapbar">
                ລາຍລະອຽດສິນຄ້າ
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
      <div class="container font16">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <b>ລາຍລະອຽດສິນຄ້າ</b>&nbsp <img src="../../image/hidemenu.png" width="15px">
                </div>
                <div class="col-xs-12 col-sm-6" align="right">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal" >
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    <form action="productdetail.php" method="POST" id="form1">
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title font18" id="myModalLabel" align="center"><b>ເພີ່ມຂໍ້ມູນຜູ້ສະໜອງ</b></h4>
                                    </div>
                                    <div class="modal-body" align="center">
                                        <div class="row">
                                            <div class="col-xs-12 form-group">
                                                <input type="text" class="form-control" name="component" placeholder="Component">
                                            </div>
                                            <div class="col-xs-12 form-group">
                                                <input type="text" class="form-control" name="description" placeholder="Description">
                                            </div> 
                                            <div class="col-xs-12 form-group">
                                                <select name="plus" id="" class="form-control">
                                                    <option value="">Choose Plus</option>
                                                    <option value="YES">YES</option>
                                                    <option value="NO">NO</option>
                                                </select>
                                            </div>  
                                            <div class="col-xs-12 form-group">
                                                <select name="pro_id" id="" class="form-control">
                                                    <option value="">ເລືອກສິນຄ້າ</option>
                                                    <?php
                                                        $sqlcate = "select * from products;";
                                                        $resultcate = mysqli_query($link, $sqlcate);
                                                        while($rowcate = mysqli_fetch_array($resultcate, MYSQLI_NUM)){
                                                        echo" <option value='$rowcate[0]'>$rowcate[1]</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div> 
                                        </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">ປິດ</button>
                                        <button type="submit" name="btnsave" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                        if(isset($_POST['btnsave'])){
                            $component = $_POST['component'];
                            $description = $_POST['description'];
                            $plus = $_POST['plus'];
                            $pro_id = $_POST['pro_id'];
                          
                            if(trim($component) == ""){
                                echo"<script>";
                                echo"alert('Please input Component');";
                                echo"window.location.href='productdetail.php';";
                                echo"</script>";
                            }
                            elseif(trim($description) == ""){
                                echo"<script>";
                                echo"alert('Please input Description');";
                                echo"window.location.href='productdetail.php';";
                                echo"</script>";
                            }
                            elseif(trim($pro_id) == ""){
                                echo"<script>";
                                echo"alert('Please Choose Product');";
                                echo"window.location.href='productdetail.php';";
                                echo"</script>";
                            }
                            elseif(trim($plus) == ""){
                                echo"<script>";
                                echo"alert('Please Choose Status');";
                                echo"window.location.href='productdetail.php';";
                                echo"</script>";
                            }
                            else{
                                $sql = "insert into productdetail(pro_id,component,description,plus) values('$pro_id','$component','$description','$plus');";
                                $result = mysqli_query($link,$sql);
                                if(!$result)
                                {
                                    echo"<script>";
                                    echo"alert('ບໍ່ສາມາດເພີ່ມລາຍລະອຽດສີນຄ້າໄດ້');";
                                    echo"window.location.href='productdetail.php';";
                                    echo"</script>";
                                }
                                else{    
                                    echo"<script>";
                                    echo"alert('ເພີ່ມຂໍ້ມູນສຳເລັດ');";
                                    echo"window.location.href='productdetail.php';";
                                    echo"</script>";
                                }            
                            }
                        }
                    ?>
                </div>
            </div>
            <br>
      </div> 
      <div class="container">
            <div class="row">
                <form action="productdetail.php" method="POST" id="fomrsearch">
                    <input type="text" class="form-control" name="search" style="width: 300px;" placeholder="ຄົ້ນຫາ">
                    <button class="btn btn-primary">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </button>
                </form>
            </div>
      </div>
    <div class="clearfix"></div><br>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th>ລຳດັບ</th>
                    <th>ສິນຄ້າ</th>
                    <th>Component</th>
                    <th>Description</th>
                    <th>Plus</th>
                    <th width="75px">ເຄື່ອງມື</th>
                </tr>
                <?php
                    $search = "%".$_POST['search']."%";
                    $sqlsearch = "select prod_id,pro_name,component,description,plus from productdetail d left join products p on d.pro_id=p.pro_id where pro_name like '$search' or plus like '$search';";
                    $resultsearch = mysqli_query($link,$sqlsearch);
                    while($row = mysqli_fetch_array($resultsearch, MYSQLI_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $row['prod_id']; ?></td>
                    <td><?php echo $row['pro_name']; ?></td>
                    <td><?php echo $row['component']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['plus']; ?></td>
                    <td>
                        <a href="updateprodetail.php?prod_id=<?php echo $row['prod_id'];?>">
                            <img src="../../image/Edit.png" width="20px">
                        </a>
                        <a href="deleteprodetail.php?prod_id=<?php echo $row['prod_id']; ?>">
                            <img src="../../image/Delete.png" alt="" width="20px">
                        </a>
                    </td>
                </tr>
                <?php
                    }
                    mysqli_close($link);
                ?>
            </table>
        </div>
    </div>
     
      

  </body>
        <script src="../../js/production_jQuery331.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/Style.js"></script>
</html>
