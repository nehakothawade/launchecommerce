<?php 

include 'config.php';

error_reporting(0);

session_start();



if (isset($_POST['reg_submit'])) 
{
    $fname = $_POST['Fname'];
    $lname = $_POST['Lname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    $token = bin2hex(random_bytes(15));

    $emailquery = "SELECT * FROM admin WHERE email='$email' ";
    $query = mysqli_query($conn, $emailquery);
    $emailcount = mysqli_num_rows($query);

    if($emailcount > 0)
    {
        echo "<script>alert('Sorry! Email Already Exists')</script>";
    }
    else
    {
        if ($password === $cpassword) {
            $sql = "SELECT * FROM admin WHERE username='$username'";
            $result = mysqli_query($conn, $sql);
            if (!$result->num_rows > 0) {
                $sql = "INSERT INTO admin (f_name, l_name, username, email, mobile, password, token)
                        VALUES ('$fname','$lname','$username','$email','$mobile','$password', '$token')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo "<script>alert('Wow! User Registration Completed.')</script>";
                    $fname="";
                    $lname="";
                    $username = "";
                    $email = "";
                    $mobile="";
                    $_POST['password'] = "";
                    $_POST['cpassword'] = "";
                } else {
                    echo "<script>alert('Woops! Something Wrong Went.')</script>";
                }
            } else {
                echo "<script>alert('Woops! Username Already Exists.')</script>";
            }
            
        } 
        else {
            echo "<script>alert('Password Not Matched.')</script>";
        }
    }
}

?>

<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Sign Up Form</title>
    <link rel="shortcut icon" href="./src/gpslogo2.png">
    <link rel="stylesheet" href="./src/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
       
         <form action="" method="POST" class="form" name="createAccount" id="createAccount" onsubmit="return validateForm(this)">
            <h1 class="form__title">Create Account</h1>
            <div class="form__message form__message--error"></div>
            <span class="form__input-error-message" id="Fname_error"></span>
            <span class="form__input-error-message" id="Lname_error"></span>
             <div class="form__input-group">
                <input type="text"  class="form__input" name="Fname"autofocus placeholder="First Name"  required>
                <div class="form__input-error-message"></div>
                <input type="text"  class="form__input" name="Lname" autofocus placeholder="Last Name"  required>
            </div>
                
            <span class="form__input-error-message" id="username_error"></span>
            <div class="form__input-group">
                <i class="fa fa-user icon"></i>
                <input type="text"  class="form__input" name="username" autofocus placeholder="Username" required>
            </div>

            <span class="form__input-error-message" id="email_error"></span>
            <div class="form__input-group">
                <i class="fa fa-envelope icon"></i>
                <input type="email" class="form__input" name="email" autofocus placeholder="Email Address" required>
            </div>

             <span class="form__input-error-message" id="mobile_error"></span>   
             <div class="form__input-group">
                <i class="fa fa-phone icon"></i>
                <input type="text" class="form__input" name="mobile" autofocus placeholder="Mobile No." required>
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
            
            
            <button class="form__button" type="submit" name="reg_submit">Submit</button>
            <p class="form__text">
                <a class="form__link" href="login.php" >Already have an account? Sign in</a>
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
    
            function validateForm(form)     // this function is for complete form validation
            {
                              
                if(validateFname()!=true){
                        //alert('Please enter the valid First Name.');
                        return false;
                }
                else if(validateLname()!=true){
                        //alert('Please enter the valid Last Name.');
                        return false;
                }
                else if(validateUserName()!=true)
                {
                    return false;
                }
                else if(validateEmail()!=true)
                {
                    return false;
                }
                else if(validatePhone()!= true)
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

            function validateFname()
            {
                var fname=createAccount.Fname.value;
                var regName = /^[a-zA-Z]+$/;
                if(!regName.test(fname)){
                    Fname_error.innerHTML = "<span style='color: red;'>"+"*Please enter the valid First Name.</span>"
                        //alert('Please enter the valid First Name.');
                        return false;
                }
                else{
                    Fname_error.innerHTML="";
                    return true;
                }
            }

            function validateLname()
            {   
                var lname=createAccount.Lname.value;
                var regName = /^[a-zA-Z]+$/;
                if(!regName.test(lname)){
                        Lname_error.innerHTML = "<span style='color: red;'>"+"*Please enter the valid Last Name.</span>"
                        //alert('Please enter the valid Last Name.');
                        return false;
                }
                else{
                    Lname_error.innerHTML="";
                    return true;
                }
            }
            function validateUserName()             // function for username validation
            {
                username = createAccount.username.value;
                var usernameRegex = /\W/;       // allow letters, numbers, and underscores
                
                if (username == "") 
                    username_error.innerHTML = "<span style='color: red;'>"+"*Please enter Username!.</span>"
                    //alert("Please enter Username!.");
                else if ((username.length < 5) || (username.length > 20))
                    username_error.innerHTML = "<span style='color: red;'>"+"*Username must have 5-20 characters.</span>"
                    //alert("Username must have 5-20 characters.");
                else if (usernameRegex.test(username)) 
                    username_error.innerHTML = "<span style='color: red;'>"+"*Use only numbers & alphabets & underscores in Username.</span>"
                    //alert("Please Use only numbers and alphabets and underscores in Username.");
                else
                {
                    username_error.innerHTML = "";
                    Fname_error.innerHTML = "";
                    Lname_error.innerHTML = "";
                    return true;
                }
             }
            
            function validateEmail()            // function for email validation
            {
                if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(createAccount.email.value))
                  {
                    email_error.innerHTML = "";
                    return (true)
                  }
                    email_error.innerHTML = "<span style='color: red;'>"+"*Please enter valid Email Address!.</span>"
                    //alert("Please enter valid Email Address!")
                    return (false)
                
            }

            function validatePhone()            // function for mobile_no validation
            {
                var phno= createAccount.mobile.value;
                var regex=/^([+][9][1]|[9][1]|[0]){0,1}([7-9]{1})([0-9]{9})$/;
                 if(phno.length<10)
                {
                    mobile_error.innerHTML = "<span style='color: red;'>"+"*Please enter valid Phone no!.</span>"
                    //alert("Please Enter Valid Phone no!");
                    return false;
                }
                else if(regex.test(phno)==false)
                {
                    mobile_error.innerHTML = "<span style='color: red;'>"+"*Please enter valid Phone no!.</span>"
                    //alert("Please Enter Valid Phone no!");
                    return false;
                }
                else
                {
                    mobile_error.innerHTML = "";
                    return true;
                }
            }

            function validatePassword()             // function for password validation
            { 
                password1 = createAccount.password.value; 
                password2 = createAccount.cpassword.value; 
                
                if (password1 ==    "")
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
        <!--End of JavaScript code section-->
 
