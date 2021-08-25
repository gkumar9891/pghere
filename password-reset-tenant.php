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
        <h1 class="text-center">Reset you password</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <div class="form-group">
            <label for="password">Enter your new password</label>
            <input type="password" name="password" value="<?php echo $password; ?>" />
            <div class="<?php echo (!empty($username_err)) ? 'has-error' : ''; ?>"><?php echo $password_err; ?></div>
            </div>

             <div class="form-group">
            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="confirm-password" name="confirm_password" value="<?php echo $confirm_password; ?>" />
              <div class="<?php echo (!empty($username_err)) ? 'has-error' : ''; ?>"><?php echo $confirm_password_err; ?></div>
            </div>
            <input type="submit" class="btn btn-primary" value="submit">
        </form>
   </div>
    
</body>
</html>