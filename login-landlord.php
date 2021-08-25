<?php 

   session_start();

   require_once "config.php";

   if(isset($_SESSION["loggedin"])) {

    header("location: dashboard-landlord.php");
      echo "hello";
        exit;
   } 
   

   $username = $password = "";
   $username_err = $password_err = "";

   if($_SERVER["REQUEST_METHOD"] == "POST" ) {


    //check username is empty

    if(empty(trim($_POST["username"]))) {
        $username_err = "Please enter username";
    } else {
        $username = trim($_POST["username"]);
    }

    //check password is empty

    if(empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    //validate creadentials

    if(empty($username_err) && empty($password_err)) {
        $sql = "select username, password from registerlandlord where username = ?";
        
        if($stmt = $mysqli->prepare($sql)) {

            $stmt->bind_param("s", $param_username);

            $param_username = $username;

            if($stmt->execute()) {

                $stmt->store_result();

                if($stmt->num_rows == 1) {
                    $stmt->bind_result($username, $password);

                        if($stmt->fetch()) {
                            if($_POST["password"] == $password) {

                                session_start();

                                $_SESSION["loggedin"] = true;
                                $_SESSION["username"] = $username;

                                header("location: dashboard-landlord.php");
                            }  else {
                                $password_err = "The password you entered was not valid.";
                            }
                            
                        }

                } else {
                    $username_err = "No account found with that username.";
                }
                } else {
                    echo "Oops! please try again.";
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
    <title>Login Landlord | PG Here</title>
    <link rel="stylesheet" type="text/css" href="./style.css">
    <script src="main.js"></script>
    <script src="https://kit.fontawesome.com/9061437dbd.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="form">
        <h1 class="text-center">Login as Landlord</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
            <label for="user-name">User Name</label>
            <input type="text" id="username" name="username" value="<?php echo $username; ?>" />
                <div class="<?php echo (!empty($username_err)) ? 'has-error' : ''; ?>"><?php echo $username_err?></div>
            </div>
            
            <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" value="<?php echo $password; ?>">
                <div class="<?php echo (!empty($password_err)) ? "has-error" : ''; ?>"><?php echo $password_err?></div>
            </div>
            
               
            <label for="checkbox"> <input class="d-inline-block" type="checkbox" id="checkbox" />Remember me</label>

            <input type="submit" class="btn btn-primary" value="submit">
           <div><a href="./signup-landlord.php" style="color: blue">Signup</a> if you have not any account </div>
        </form>
   </div>
</body>
</html>