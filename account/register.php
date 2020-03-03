<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

    //RE-CAPTCHA
    $postfields = array('secret'=>'6LdvDsEUAAAAAGFVp9Sy8DMs214HrgqzDGh-DbBV', 'response'=>$_POST['g-recaptcha-response']);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $result = curl_exec($ch);
    $raw =  json_decode($result, true);
    if(!$raw['success']){
        $captcha_err = 'Failed captcha.';
    }else{

        //PASSED CAPTCHA
        require"sql.php";
       

        // cek username
        if(empty(trim($_POST["username"]))){
            $username_err = "Tolong masukan username.";
        } else{
            $username = trim($_POST["username"]);

            $query = $db->prepare('SELECT id FROM users WHERE username = ?');
            $query->bind_param('s', $username);
            if ($query->execute()) {
                $query->store_result();
                if($query->num_rows > 0){
                    $username_err = "Username ini sudah diambil.";
                }
            }else{
                die("Gagal membaca database.");
            }
            $query->close();
        }
        
        // cek password
        if(empty(trim($_POST["password"]))){
            $password_err = "Tolong masukan password.";     
        } elseif(strlen(trim($_POST["password"])) < 6){
            $password_err = "Password minimal 6 karakter.";
        } else{
            $password = trim($_POST["password"]);
        }
        
        // cek confirm password
        if(empty(trim($_POST["confirm_password"]))){
            $confirm_password_err = "Tolong ulangi password anda.";     
        } else{
            $confirm_password = trim($_POST["confirm_password"]);
            if(empty($password_err) && ($password != $confirm_password)){
                $confirm_password_err = "Password tidak cocok.";
            }
        }
        
        // database insert
        if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $query = $db->prepare('INSERT INTO users (username, password) VALUES ( ?, ?)');
            $query->bind_param('ss', $username, $hash);
            if ($query->execute()) {
                $success=true;  //success
                unset($username_err,$password_err,$confirm_password_err);
            }else{
                die("Gagal membuat record di database.");
            }
        }
        
        // close connection
        $db->close();
    }
}
?>

<!doctype html>
<html data-n-head-ssr lang="en" data-n-head="lang">

<head data-n-head="">
    <title data-n-head="true">WEV.SE</title>
    <meta data-n-head="true" charset="utf-8">
    <meta data-n-head="true" name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon" href="/assets/icons/32.png"/>
    <link data-n-head="true" rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap">
   
   <link rel="stylesheet" href="https://wevhx.github.io/miniature-doodle/doti.css" />
    <link rel="stylesheet" href="https://wev.se/assets/css/custom.css" />

    <script type="text/javascript" src="https://wev.se/assets/js/main.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    
     

    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>



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
Register
</h1>
                            <p class="mt-3">Sudah punya akun? <a href="/account/login" class="font-medium text-teal-500 hover:underline"><span class="__cf_email__">Login aja bos</span></a></p>
                            <form onsubmit="regis.disabled = true" action="register" method="post" class="mt-8">
                                <div class="<?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                    <label class="block cursor-pointer relative"><span class="text-gray-600 font-medium text-xs absolute bg-white px-3 pt-1 ml-2 -mt-3">USERNAME</span>
                                        <input placeholder="Usernamemu" type="text" name="username" class="form-input block w-full" value="<?php echo $username; ?>" required> </label>
                                        <span class="help-block" style="color:#ff7575"><?php echo $username_err; ?></span>
                                </div>
                                <div class="mt-6 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                    <label class="block cursor-pointer relative"><span class="text-gray-600 font-medium text-xs absolute bg-white px-3 pt-1 ml-2 -mt-3">PASSWORD</span>
                                        <input type="password" name="password" value="<?php echo $password; ?>" placeholder="Password" class="form-input block w-full" required> </label>
                                        <span class="help-block" style="color:#ff7575"><?php echo $password_err; ?></span>
                                </div>
                                
                                <div class="mt-6 <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                    <label class="block cursor-pointer relative"><span class="text-gray-600 font-medium text-xs absolute bg-white px-3 pt-1 ml-2 -mt-3">KONFIRMASI PASSWORD</span>
                                        <input type="password" name="confirm_password" value="<?php echo $confirm_password; ?>" placeholder="Sama dengan yang diatas" class="form-input block w-full" required> </label>
                                </div>
                                
                                <div class="g-recaptcha mt-6" data-sitekey="6LdvDsEUAAAAAA6mWiV2pjA2NNW4WGUiPEog7dJM"></div>
            <span class="help-block" style="color:#ff7575"><?php echo $captcha_err; ?></span>
                              
                              <div class="mt-6"> <div class="text-left"> <a href="https://wev.se/account/login" class="inline-block shadow-md bg-teal-600 text-white font-medium rounded py-2 px-3 hover:bg-teal-500 focus:bg-teal-700 focus:outline-none" value="Login">
                                        « Back</a></div>
                              
                                <div class="mt-6 text-right">
                                    <button type="submit" name="regis" class="inline-block shadow-md bg-teal-600 text-white font-medium rounded py-3 px-8 hover:bg-teal-500 focus:bg-teal-700 focus:outline-none" value="Submit">
                                        Register
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </main>



</body>

</html>