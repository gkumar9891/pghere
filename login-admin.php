<?php 

   session_start();

   if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true ) {

    header("location: index.php");
        exit;
   } 

   require_once "config.php";

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

        
        $sql = "select username, password from admin_details where username = ?";

        if($stmt = $mysqli->prepare($sql)) {

            echo "gaurav";
            $stmt->bind_param("s", $param_username);

            $param_username = $username;

            if($stmt->execute()) {

                $stmt->store_result();

                if($stmt->num_rows == 1) {
                    $stmt->bind_result($username, $password);

                        if($stmt->fetch()) {
                            if($_POST["password"] == $password) {

                                session_start();

                                $SESSION["loggedin"] = true;
                                $SESSION["username"] = $username;

                                header("location: index.php");
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
    <title>Login Tenant | PG Here</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="form">
        <h1 class="text-center">Login as Tenant</h1>
         <form action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> " method="post">

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
         </form>
    </div>
</body>
</html>