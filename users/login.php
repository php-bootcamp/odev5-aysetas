<?php include ("../netting/connect.php");

     $login= $db -> prepare("select * from admin");
     $login -> execute (array(1));
     $user= $login -> Fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo $user["user_name"];?></title>

  <!-- BOOTSTRAP STYLES-->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- FONTAWESOME STYLES-->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
   
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>

  <style>
      body {
 /*background-image: url("../../img/wallpaper.jpg");*/

 background-attachment:fixed;
 -moz-background-size:100% 100%;  /*firefox  3.6*/
 -o-background-size:100% 100%;    /*opera  9.5*/
 -webkit-background-size:100% 100%;  /*safari  3.0, chome*/
 background-size:100% 100%;          /*w3c, firefox  4.0, ie9*/



}
  </style>
</head>
<body >
    <div style="width:90%; margin:auto;" class="container">
        <div class="row text-center " style="padding-top:100px;">
            
        </div>
        <div  class="row ">

            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">

                <div style="background-color:#555; opacity:0.8;" class="panel-body">
                    <form  class="login100-form validate-form" action="../netting/process.php" method="POST">

                           

                            <hr />
                            <center><h3><B style="color:#fff;">KULLANICI GİRİŞİ</B></h3></center>
                            
                            <br/>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                <div  class="wrap-input100 validate-input" data-validate = "Lütfen Kullanıcı Adınızı Giriniz.">
                                <input  style="background-color:#555; color:#fff"  class="form-control" type="text" name="user_name" placeholder="Kullanıcı Adınız">
                                </div>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                <div class="wrap-input100 validate-input" data-validate = "Lütfen Şifrenizi Giriniz.">
                                    <input style="background-color:#555; color:#fff" class="form-control" type="password" name="password" placeholder="Şifreniz">
                            
                            </div>
                        
                        
                            </div>
                            <p style="color:#fff">
                            <?php
                            if(@$_GET['login']=="no"){
                                echo "Kullanıcı bulunamadı..";
                            }
                            ?>
                           </p>

                        <button style="width:100%" type="submit" name="loggin" class="btn btn-primary" >GİRİŞ YAP </button>
                        <hr />
                        
                    </form>
                </div>

            </div>


        </div>
    </div>

</body>

</html>