<?php  
session_start();
  
?> 
<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>LOGIN - Aplikasi Koperasi</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="css/style.css" rel="stylesheet">
    
</head>

<body class="h-100">
    
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
<!-- TES GITHUB -->


    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="index.html"> <h2>APLIKASI KOPERASI</h2></a>
                                <a class="text-center" href="index.html"> <h4>PT. Megariamas Sentosa</h4></a>
        
                                <form class="mt-5 mb-5 login-input" method="post" action="login.php">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="user_id" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                    <button class="btn login-form__btn submit w-100" type="submit" value="Login" name="login">Masuk</button>
                                </form>
                                <p class="mt-5 login-form__footer">Belum punya akun? hubungi Administrator.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>
</body>
</html>

<?php  
  
include("koneksi.php");  
  
if(isset($_POST['login']))  
{  
    $user_id=$_POST['user_id'];  
    $password=md5($_POST['password']);   
  
    $run =  mysqli_query($con, "select * from users WHERE user_id='$user_id' AND password='$password'");  
	$xrun = mysqli_fetch_assoc($run);
    if(mysqli_num_rows($run) > 0)  
    {  
        echo "<script>window.open('index.php','_self')</script>";  
  
        $_SESSION['no_anggota']=$xrun['no_anggota'];
  
    }  
    else  
    {  
      echo "<script>alert('Username dan/atau Password salah!')</script>";  
    }  
}  
?>  



