<?php
session_start();
 
// Kalo dah login lempar ke homepage
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: https://wev.se/account/dashboard");
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // cek username kosong
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // cek pass kosong
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

    require "sql.php";
    
    // Validate user pass
    if(empty($username_err) && empty($password_err)){
        $query = $db->prepare('SELECT password FROM users WHERE username = ?');
        $query->bind_param('s', $username);
        if ($query->execute()) {
            $query->bind_result($hash);
            $query->fetch();
            if(password_verify($password, $hash)){
                
                // set session var
                $_SESSION["loggedin"] = true;
                $_SESSION["username"] = $username;                            
                
                // Redirect ke homepage
                $db->close();
                header("location: https://wev.se/account/dashboard");
            } else{
                $password_err = "The password you entered was not valid.";
                //if(isset($_POST["origin"])){
                    //header("location: ".$_POST["origin"]."?err=".$username);   //balik ke origin page
                //}else{
                    //header("location: /?err=".$username);   //balik ke mainpage
                //}
            }
        }else {
            Die("Internal server error");
        }
        $query->close();
    }
    $db->close();
}
?>

<!doctype html>
<html data-n-head-ssr lang="en" data-n-head="lang">

<head data-n-head="">
    <title data-n-head="true">Login | Wev.SE</title>
    <meta name="description" content="Login Page">
	<meta name="keywords" content="wev.se,login,wevse login">
    <meta data-n-head="true" charset="utf-8">
    <meta data-n-head="true" name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon" href="/assets/icons/32.png"/>
    <link data-n-head="true" rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap">
     <link rel="stylesheet" href="https://wev.se/assets/css/main.css" />
     <link rel="stylesheet" href="https://wev.se/assets/css/custom.css" />

    <script type="text/javascript" src="https://wev.se/assets/js/main.js"></script>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>

</head>



<body onload='check()'>
    
    
    
    
 <main id="main" class="pb-10 pt-32 text-gray-600">
                    <div class="px-5 w-full lg:w-1/2 xl:w-2/5 mx-auto min-h-70-screen">
                        
                        
                        <div style='text-align:center'>
            <?php 
				if($success==true){
					echo	"Registrasi sukses!!";
					echo '<br>';
					echo '<a href="/account/login" class="font-medium text-teal-500 hover:underline"><span class="__cf_email__">Login skuy</span></a>';
					exit;
				}
			?>
        </div>
       
                        
                        <div>
                           
                            <h1 class="text-3xl font-bold text-gray-700">
Login
</h1>
                            
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="mt-8">
                                <div class="<?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                    <label class="block cursor-pointer relative"><span class="text-gray-600 font-medium text-xs absolute bg-white px-3 pt-1 ml-2 -mt-3 border-red-400">Username</span>
                                        <input placeholder="Username" type="text" name="username" class="form-input block w-full" value="<?php echo $username; ?>" required> </label>
                                        <span class="border-red-400" style="color:#ff7575"><?php echo $username_err; ?></span>
                                </div>
                                <div class="mt-6 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                    <label class="block cursor-pointer relative"><span class="text-gray-600 font-medium text-xs absolute bg-white px-3 pt-1 ml-2 -mt-3">PASSWORD</span>
                                        <input type="password" name="password" value="<?php echo $password; ?>" placeholder="Password" class="form-input block w-full" required> </label>
                                        <span class="border-red-400" style="color:#ff7575"><?php echo $password_err; ?></span>
                                </div>
                                
                               <p class="mt-6">Lupa Password? <a href="/account/register" class="font-medium text-teal-500 hover:underline"><span class="__cf_email__">Buat baru aja</span></a></p>
                            
                            
                              
                                <div class="mt-6"> <div class="text-left"> <a href="https://wev.se/home" class="inline-block shadow-md bg-teal-600 text-white font-medium rounded py-2 px-3 hover:bg-teal-500 focus:bg-teal-700 focus:outline-none" value="Login">
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="24" height="24"
viewBox="0 0 24 24"
style=" fill:#fff;"><path d="M 12 2.0996094 L 1 12 L 4 12 L 4 21 L 11 21 L 11 15 L 13 15 L 13 21 L 20 21 L 20 12 L 23 12 L 12 2.0996094 z M 12 4.7910156 L 18 10.191406 L 18 11 L 18 19 L 15 19 L 15 13 L 9 13 L 9 19 L 6 19 L 6 10.191406 L 12 4.7910156 z"></path></svg></a></div>
                                    <div class="text-right"><button type="submit" class="inline-block shadow-md bg-teal-600 text-white font-medium rounded py-3 px-8 hover:bg-teal-500 focus:bg-teal-700 focus:outline-none" value="Login">
                                        Login
                                    </button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </main>







       
  



    
     <!-- Core plugin JavaScript-->
  <script src="https://blackrockdigital.github.io/startbootstrap-sb-admin-2/vendor/jquery-easing/jquery.easing.min.js"></script>
     
    <!-- Page level plugins -->
 

  <!-- Page level custom scripts -->
  

  <script type="text/javascript">
      $(document).ready(function() {
$('#dataTable').dataTable({
    "bPaginate": true,
    "bLengthChange": false,
    "bFilter": false,
    "bSort": false,
    "bInfo": false,
    "bAutoWidth": true });
});

  </script>
 


</body>

</html>