<?php 
  
  session_start();

   include_once "config.php";

   $first_name = $last_name = $username = $phone_no = $address = $profile_picture = "";
   $first_name_err = $last_name_err = $phone_no_err = $address_err = $profile_picture_err = "";

   if(isset($_SESSION["loggedin"])) {
        
      $username = $_SESSION["username"];

      $sql = "select first_name, last_name, phone_no, address, profile_img from registerlandlord where username = '$username'";

      $result = $mysqli->query($sql);

      if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
        
            $first_name = $row["first_name"];
            $last_name  = $row["last_name"];
            $phone_no = $row["phone_no"];
            $address = $row["address"];
            $profile_picture = $row["profile_img"];
        }

        

      }

      if($_SERVER["REQUEST_METHOD"] == "POST" ) {
            

        // check is first_name empty
        if(empty(trim($_POST["first_name"]))) {
            $first_err = "Please enter your first_name";
        } else {
            $first_name = trim($_POST["first_name"]);
        }
    
        //check password is empty
    
        if(empty(trim($_POST["last_name"]))) {
            $last_name_err = "Please enter your last_name.";
        } else {
            $last_name = trim($_POST["last_name"]);
        }
    
        if(empty(trim($_POST["phone_no"]))) {
            $phone_no_err = "Please enter a phone no.";
        }  elseif(strlen(trim($_POST["phone_no"])) <= 9 ) {
            $phone_no_err = "Please enter a 10 digit number.";
        } else {
            $phone_no = filter_var((trim($_POST["phone_no"])),FILTER_SANITIZE_NUMBER_INT);
        }
        
      /*   if(isset($_POST["profile"])) {
            $check = getimagesize($_FILES["profile_picture"]["tmp_name"]);
            if($check !== false) {
              echo '<script>alert("File is an image - " . $check["mime"] . ".")</script>';
              $uploadOk = 1;
            } else {
              echo '<script>alert("File is not an image.")</script>';
              $uploadOk = 0;
            }
          } */

       

            
            
           
            


          if(empty($first_name_err) && empty($last_name_err) && empty($phone_no_err)) {

                if(!empty($_POST["address"])) {
                    $address = $_POST["address"];
                    $sql = "update registerlandlord set address = '$address' where username = '$username'";
                    $mysqli->query($sql) or die($mysqli->error);
                }

                if(!empty($_FILES["profile_picture"]['name'])) {
                    $folder = "profiles/"; 
                    $profile_picture_name = $_FILES["profile_picture"]["name"];
                    $temp = explode(".", $_FILES["profile_picture"]["name"]);
                    $newfilename = $username . '.' . end($temp);
                    move_uploaded_file($_FILES["profile_picture"]["tmp_name"], "$folder" . $newfilename);

                    $sql = "update registerlandlord set profile_img = '$newfilename' where username = '$username'";
                    $mysqli->query($sql) or die($mysqli->error);
                } 
              
                $sql = "update registerlandlord set first_name = '$first_name', last_name = '$first_name', phone_no = '$phone_no' where username = '$username'"; 
                 $mysqli->query($sql) or die($mysqli->error);

                 echo "<script>alert('form submited')</script>";
 
                /* if($stmt = $mysqli->prepare($sql)) {

                    $param_first_name = $first_name;
                    $param_last_name = $last_name;
                    $param_phone_no = $phone_no;

                    $stmt->bind_param("sss", $param_first_name, $param_last_name, $param_phone_no);

                   

                    if($stmt->execute()) {
                      echo '<script>alert("form submited");</script>';
                    } 
                    else {
                        echo '<script>alert("something is wrong")</script>';
                    }

                    $stmt->close();
                } */

           



          }

          


          
        


       
        



      }

   }


?>
<!DOCTYPE html>
<html lang="en" class="dashboard">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | PGHERE</title>
    <link rel="stylesheet" href="./style.css">
    <script src="https://kit.fontawesome.com/9061437dbd.js" crossorigin="anonymous"></script>
</head>

<body>
    <header id="header">
        <div class="container">
            <div class="d-flex align-items-center">
            <div class="logo">
                <a href="./">
                <span>P.G. HERE</span>
                 </a>
            </div>

            <div class="greeting">
                <span>hello <?php echo $username?></span>
            </div>

            <div class="user-profile ml-auto">
                   <a href="#" class="profile">
                         G
                   </a>
                   
                   <div class="dropdown">
                      <a href="./dashboard-landlord-profile.php">Profile</a>
                      <a href="./logout.php">Logout</a>
                   </div>
            </div>
            </div>
        </div>
    </header>

    
    <div class="two-column-section">
        <aside class="sidebar">
            <nav class="navigation">
                <ul>
                    <li><a href="#"><i class="fas fa-plus"></i><span>Add</span></a></li>
                    <li><a href="#"><i class="fas fa-th-list"></i><span>Properties</span></a></li>
                    <li><a href="#"><i class="fas fa-trash"></i><span>Trash</span></a></li>
                </ul>
            </nav>
        </aside>
      
        <main class="content">
        <div class="form dashboard-form">
              <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST" enctype="multipart/form-data">
                     <div class="form-group">
                    <label for="first-name">First Name</label>
                    <input type="text" name="first_name" value="<?php echo $first_name?>" />
                    <div class="<?php echo (!empty($first_name_err)) ? 'has-error' : ''; ?>"><?php echo $first_name_err; ?></div>
                     </div>

                    <div class="form-group">
                    <label for="last-name">Last Name</label>
                    <input type="text" name="last_name" value="<?php echo $last_name?>" />
                    <div class="<?php echo (!empty($last_name_err)) ? 'has-error' : ''; ?>"><?php echo $last_name_err; ?></div>
                    </div>

                    <div class="form-group">
                    <label for="phone-no">
                        Phone No
                    </label>
                    <input type="tel" name="phone_no" value="<?php echo $phone_no ?>">
                    <div class="<?php echo (!empty($phone_no_err)) ? 'has-error' : ''; ?>"><?php echo $phone_no_err; ?></div>
                    </div>


                    <div class="from-group">
                    <label for="address">Addres</label>
                    <input type="text" name="address" value="<?php echo $address ?>">
                    <div class="<?php echo (!empty($address_err)) ? 'has-error' : ''; ?>"><?php echo $address_err; ?></div>
                    </div>

                    <div class="from-group">
                    <label for="profile-picture">Profile-picture</label>
                    <input type="file" name="profile_picture">
                    <div class="<?php echo (!empty($profile_picture_err)) ? 'has-error' : ''; ?>"><?php echo $profile_picture_err; ?></div>
                    </div>

                    <button type="submit" class="btn btn-primary">SAVE</button>
              </form>
        </div>
        </main>
    </div>
       
</body>

</html>
