<?php
 require_once "config.php";

$username = $password = $confirm_password = $email_id = $phone_no = $first_name = $last_name = "";
$username_err = $password_err = $confirm_password_err = $email_id_err = $phone_no_err = $first_name_err = $last_name_err = "";

if($_SERVER["REQUEST_METHOD"] === "POST") {

    if(empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    }

    else {

     $sql = "select usernmae from registerlandlord where username = ?";
     

     if($stmt = $mysqli->prepare($sql)) {

        $stmt->bind_param("s", $param_username);
        $param_username = trim($_POST["username"]);


        if($stmt->execute()) {
            $stmt->store_result();

            if($stmt->num_rows ==  1) {
                $username_err = "This username is already taken.";
            }  else {
                $username = trim($_POST["username"]);
            }
        }  else {
            echo "something went wrong. Please try again.";
        }

        $stmt->close();
     }
    }

    //validate password 

    if(empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    }  elseif(strlen(trim($_POST["password"])) < 8 ) {
        $password_err = "Password much have atleast 8 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    if(empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);

        if(empty($password_err) && ($password != $confirm_password )) {
            $confirm_password_err = "Password did not match.";
        }
    }

     //validate phone no

    if(empty(trim($_POST["phone_no"]))) {
        $phone_no_err = "Please enter a phone no.";
    }  elseif(strlen(trim($_POST["phone_no"])) <= 9 ) {
        $phone_no_err = "Please enter a 10 digit number.";
    } else {
        $phone_no = filter_var((trim($_POST["phone_no"])),FILTER_SANITIZE_NUMBER_INT);
    }

    //validate first name

    if(empty(trim($_POST["first_name"]))) {
        $first_name_err = "Please enter your first name.";
    }  else {
        $first_name = trim($_POST["first_name"]);
    }

    //validate last name

    if(empty(trim($_POST["last_name"]))) {
        $last_name_err = "Please enter your last name.";
    }  else {
        $last_name = trim($_POST["last_name"]);
    }

    //validate email id 

     if(empty(trim($_POST["email_id"]))) {
        $email_id_err = "Please enter your email id.";
    }  elseif(filter_var($email_id, FILTER_VALIDATE_EMAIL)) {
        $email_id_err = "please enter a valid email id";
    } else {
        $email_id = trim($_POST["email_id"]);
    }

    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($first_name_err) && empty($last_name_err) && empty($phone_no_err) && empty($email_id_err)) {
       
        echo "hello";
        $sql = "insert into registerlandlord (first_name, last_name, phone_no, username, password, email_id) values (?, ?, ?, ?, ?, ?)";
            echo $sql;
        if($stmt = $mysqli->prepare($sql)) {

            echo "how are you";    

            $stmt->bind_param("ssssss", $param_first_name, $param_last_name, $param_phone_no, $param_username, $param_password, $param_email_id );

            $param_first_name = $first_name;
            $param_last_name = $last_name;
            $param_phone_no = $phone_no;
            $param_username = $username;
            $param_password = /*password_hash($password, PASSWORD_DEFAULT)*/ $password;
            $param_email_id = $email_id;


            if($stmt->execute()) {
                header("location: login-landlord.php");
            } else {
                 echo "Something went wrong. Please try again later.";
            }

            $stmt->close();
        }
        
    }
     $mysqli->close();

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Landlord | PG Here</title>
    <link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>

    <div class="form">
        <h1 class="text-center">Signup as Landlord</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

        
             
            <div class="form-group">
            <label for="first-name">First Name</label>
            <input type="text" id="first-name" name="first_name" value="<?php echo $first_name;  ?>"/>
            <div class="<?php echo (!empty($first_name_err)) ? 'has-error' : ''; ?>"><?php echo $first_name_err; ?></div>
            </div>

            <div class="form-group">
            <label for="last-name">Last Name</label>
            <input type="text" id="last-name" name="last_name" value="<?php echo $last_name;  ?>"/>
            <div class="<?php echo (!empty($last_name_err)) ? 'has-error' : ''; ?>"><?php echo $last_name_err; ?></div>
            </div>

            <div class="form-group">
             <label for="email-id">E-mail id</label>
            <input type="email" name="email_id" value="<?php echo $email_id;  ?>" id="email-id">
            <div class="<?php  echo (!empty($email_err)) ? 'has-error' : '';  ?>"><?php echo $email_id_err; ?></div>
           </div>
       
            
            <div class="form-group">
            <label for="username">User name</label>
            <input type="text" name="username" id="username" value="<?php echo $username; ?>" />
            <div class="<?php echo (!empty($username_err)) ? 'has-error' : ''; ?>"><?php echo $username_err; ?></div>
            </div>

            <div class="form-group">
            <label for="password">Enter the password</label>
            <input type="password" name="password" value="<?php echo $password; ?>" />
            <div class="<?php echo (!empty($username_err)) ? 'has-error' : ''; ?>"><?php echo $password_err; ?></div>
            </div>

             <div class="form-group">
            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="confirm-password" name="confirm_password" value="<?php echo $confirm_password; ?>" />
              <div class="<?php echo (!empty($username_err)) ? 'has-error' : ''; ?>"><?php echo $confirm_password_err; ?></div>
            </div>
   
            <div class="form-group">       
            <label for="phone-no">Phone No</label>
            <input type="tel" value="<?php echo $phone_no; ?>"  name="phone_no" id="phone-no"/>
              <div  class="<?php echo (!empty($phone_no_err)) ? 'has-error' : ''; ?>"><?php echo $phone_no_err; ?></div> 
           </div>
            <input type="submit" class="btn btn-primary" value="submit">
        </form>
   </div>
    
</body>
</html>