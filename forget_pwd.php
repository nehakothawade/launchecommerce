<?php 

include 'config.php';

error_reporting(0);

session_start();



if (isset($_POST['forget_pwd_submit'])) 
{
    
    $email = $_POST['email'];

    $emailquery = "SELECT * FROM admin WHERE email='$email' ";
    $query = mysqli_query($conn, $emailquery);
    $emailcount = mysqli_num_rows($query);

    if($emailcount)
    {
        $userdata = mysqli_fetch_array($query);

        $username = $userdata['username'];
        $token = $userdata['token']; 

        $subject = "Password Reset";
        $body = "Hello, $username. Click here too reset your password http://localhost/AGPS/reset_pwd.php?token=$token";
        $sender_email = "From: miss.gauribankar@gmail.com";

        if(mail($email, $subject, $body, $sender_email)){
        	$_SESSION['msg']=" Check your mail to reset password";
        	header('Location:login.php');
        	//echo "<script>alert('check mail to reset your password $email')</script>";
        	
        }       
        else
        {
        	echo "<script>alert('Email Sending Failed..!')</script>";
        } 
    }
    else
    {
    	echo "<script>alert('Woops! No Email ID Found!')</script>";
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
        <form action="" method="POST" class="form" name="forget_pwd_form" onsubmit="return validateForm(this)">
            <h1 class="form__title">Recover Your Password</h1>
            
            <span class="form__input-error-message" id="email_error"></span>
            <div class="form__input-group">
                <i class="fa fa-envelope icon"></i>
                <input type="email" class="form__input" name="email" autofocus placeholder="Email Address" required>
            </div>
            
            <button href="reset_pwd.php"class="form__button" type="submit" name="forget_pwd_submit">Send Me Email</button>
            <div class="form__input-group"></div>
            <p class="form__text">
                <a class="form__link" href="register.php">Don't have an account? Create account</a>
            </p>
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
			function validateForm(form)
			{
				if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(forget_pwd_form.email.value))
                  {
                    email_error.innerHTML = "";
                    return (true)
                  }
                    email_error.innerHTML = "<span style='color: red;'>"+"*Please enter valid Email Address!.</span>"
                    //alert("Please enter valid Email Address!")
                    return (false)
			}
</script>

</html>