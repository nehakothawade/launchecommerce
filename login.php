<?php
session_start();
?>

<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Login Form</title>
    <link rel="shortcut icon" href="img/core-img/sairajlogo2.png">
    <link rel="stylesheet" href="./src/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<?php 

include 'config.php';

//session_start();

error_reporting(0);

/*if (isset($_SESSION['username'])) {
    header("Location: logout.php");
}
*/

if (isset($_POST['login_submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    if($username=="Admin")
    {
	$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    	$result = mysqli_query($conn, $sql);
    	if ($result->num_rows == 1) {
        	$row = mysqli_fetch_assoc($result);
        	$_SESSION['username'] = $row['username'];
        	header("Location: admin/dashboard.php");
    		} else {
        	echo "<script>alert('Woops! Username or Password is Wrong.')</script>";}
    }
    else
    {
    	$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    	$result = mysqli_query($conn, $sql);
    	if ($result->num_rows == 1) {
        	$row = mysqli_fetch_assoc($result);
        	$_SESSION['username'] = $row['username'];
        	header("Location: index1.php");
    		} else {
        	echo "<script>alert('Woops! Username or Password is Wrong.')</script>";}
    }
}

?>


<body>
    <div class="container">
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?> " method="POST" class="form" name="loginform" id="login" onsubmit="return validateForm(this)">
            <h1 class="form__title">Login</h1>
            <div class="form__message form__message--error">
                <?php
                    if(isset($_SESSION['msg']))
                        echo $_SESSION['msg'];
                ?>
            </div>
            <span class="form__input-error-message" id="username_error"></span>
            <div class="form__input-group">
                <i class="fa fa-user icon"></i>
                <input type="text" class="form__input" name="username" autofocus placeholder="Username">
            </div>
            <span class="form__input-error-message" id="pwd_error"></span>
            <div class="form__input-group">
                <i class="fa fa-lock icon"></i>
                <input type="password" class="form__input"  name="password" autofocus placeholder="Password">
            </div>
            <button class="form__button" type="submit" name="login_submit">Continue</button>
            <p class="form__text">
                <a href="forget_pwd.php" class="form__link">Forgot your password?</a>
            </p>
            <p class="form__text">
                <a class="form__link" href="register.php">Don't have an account? Create account</a>
            </p>
            <div class="form__title"></div>
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
    
            function validateForm(form)     // this function is for complete form validation
            {
                              
                if(validateUserName()!=true)
                {
                    return false;
                }
                else if(validatePassword() != true){
                    return false;
                }
                else{
                    //alert("Account Created Successfully - Welcome to Gharkul Pariwar Sanstha");
                    return true;
                }
            }

            function validateUserName()             // function for username validation
            {
                username = loginform.username.value;
                var usernameRegex = /\W/;       // allow letters, numbers, and underscores
                
                if (username == "") 
                    username_error.innerHTML = "<span style='color: red;'>"+"*Please enter Username!.</span>"
                    //alert("Please enter Username!.");
                else if ((username.length < 5) || (username.length > 20))
                    username_error.innerHTML = "<span style='color: red;'>"+"*Username must have 5-20 characters.</span>"
                    //alert("Username must have 5-20 characters.");
                else if (usernameRegex.test(username)) 
                    username_error.innerHTML = "<span style='color: red;'>"+"*Use only numbers & alphabets & underscores in Username.</span>"
                    //alert("Please enter valid Username. Use only numbers and alphabets and underscores.");
                else
                {
                    username_error.innerHTML = "";
                    return true;
                }
             }
            
           
            function validatePassword()             // function for password validation
            { 
                password = loginform.password.value; 
                            
                if (password ==    "")
                    pwd_error.innerHTML = "<span style='color: red;'>"+"*Please Enter Password!</span>"
                    //alert("Please Enter Password!");
                else if  (password.length<6)   
                    pwd_error.innerHTML = "<span style='color: red;'>"+"*Please enter password of more than 6 characters!</span>"
                    //alert("Please enter password of more than 6 characters!");
                else if  (password.length>15)
                    pwd_error.innerHTML = "<span style='color: red;'>"+"*Password length must not exceed 15 characters!</span>"    
                    //alert("Password length must not exceed 15 characters!");

                // If same return True. 
                else{   
                    pwd_error.innerHTML = "";
                    return true; 
                } 
            }
    </script>
        <!--End of JavaScript code section-->

