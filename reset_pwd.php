<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_POST['reset_pwd_submit'])) 
{
    if(isset($_GET['token']))
    {
        $token = $_GET['token'];

        $newpassword = md5($_POST['password']);
        $cpassword = md5($_POST['cpassword']);

        if ($newpassword === $cpassword) 
        {    
            $updatequery = "update admin set password='$newpassword' where token='$token' "; 

            $result = mysqli_query($conn, $updatequery);
            if ($result) 
            {
                $_SESSION['msg'] = "Your password has been updated successfully.";
                header('Location:login.php');
                //echo "<script>alert('Your password has been updated successfully.')</script>";                
            } 
            else  
            {
                $_SESSION['passmsg'] = "Your password is not updated.";
                header('Location:reset_pwd.php');
                 //echo "<script>alert('Your password is not updated.')</script>";
            }
        } 
        else 
        {
            echo "<script>alert('Password Not Matched.')</script>";
        }
    }
    else
    {
        echo "<script>alert('Woops! Something went wrong.')</script>";
    }
}

?>
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Login Form</title>
    <link rel="shortcut icon" href="./src/gpslogo2.png">
    <link rel="stylesheet" href="./src/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<div class="container">
        <form action="" method="POST" class="form" name="reset_pwd_form" onsubmit="return validateForm(this)">
            <h1 class="form__title">Reset Your Password</h1>
            <div class="form__message form__message--error">
                <?php
                    if(isset($_SESSION['passmsg'])){
                        echo $_SESSION['passmsg'];
                    }
                    else{
                        echo $_SESSION['passmsg']="";
                    }

                ?>
            </div>
            <span class="form__input-error-message" id="pwd_error"></span>
            <div class="form__input-group">
                <i class="fa fa-lock icon"></i>
                <input type="password" class="form__input" name="password" autofocus placeholder="Password"  required>
            </div>

            <span class="form__input-error-message" id="cpwd_error"></span>
            <div class="form__input-group">
                <i class="fa fa-lock icon"></i>
                <input type="password" class="form__input" name="cpassword" autofocus placeholder="Confirm password"  required>
            </div>
            
            <button class="form__button" type="submit" name="reset_pwd_submit" >Reset Password</button>
            <div class="form__input-group"></div>
            
            <div class="form__text">
                <a href="https://www.instagram.com/gharkul_parivar/"><i class="fa_icon fa fa-instagram" aria-hidden="true"></i></a>
                <a href="https://www.facebook.com/GharkulParivar/"><i class="fa_icon fa fa-facebook" aria-hidden="true"></i></a>
                <a href="https://twitter.com/GharkulS"><i class="fa_icon fa fa-twitter" aria-hidden="true"></i></a>
				<a href="https://www.youtube.com/channel/UCeHn-bsT4_R0iuN51b3891A"><i class="fa_icon fa fa-youtube" aria-hidden="true"></i></a>
            </div>
        </form>
    </div>
	
</body>
<script type="text/javascript">
			function validateForm(form)             // function for password validation
            { 
                if(validatePassword() != true){
                    return false;
                }
                else{
                    //alert("Account Created Successfully - Welcome to Gharkul Pariwar Sanstha");
                    return true;
                }

            }
            function validatePassword()             // function for password validation
            { 
              
                password1 = reset_pwd_form.password.value; 
                password2 = reset_pwd_form.cpassword.value; 
                
                if (password1 == "")
                    pwd_error.innerHTML = "<span style='color: red;'>"+"*Please Enter Password!</span>"
                    //alert("Please Enter Password!");
                else if  (password1.length<6)   
                    pwd_error.innerHTML = "<span style='color: red;'>"+"*Please enter password of more than 6 characters!</span>"
                    //alert("Please enter password of more than 6 characters!");
                else if  (password1.length>15)
                  pwd_error.innerHTML = "<span style='color: red;'>"+"*Password length must not exceed 15 characters!</span>"    
                    //alert("Password length must not exceed 15 characters!");
                else if (password1 != password2) { 
                    cpwd_error.innerHTML = "<span style='color: red;'>"+"*Password did not match: Please try again...</span>"
                    pwd_error.innerHTML = "<span style='color: red;'>"+"*Password did not match: Please try again...</span>"
                    //alert ("\nPassword did not match: Please try again..."); 
                    return false; 
                } 
                // If same return True. 
                else{   
                    pwd_error.innerHTML = "";
                    return true; 
                } 
            }
            
</script>

</html>