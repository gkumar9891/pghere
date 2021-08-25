<?php 

session_start();

include_once "config.php";

$property_title = $property_location = $property_price = $property_address = $property_image = $property_service = "";
$property_title_err = $property_location_err = $property_price_err = $property_address_err = $property_image_err = $property_service_err = "";


if(isset($_SESSION["loggedin"])) {
     
   $username = $_SESSION["username"];

    if($_SERVER["REQUEST_METHOD"] == "POST" ) {

        if(empty(trim($_POST["property_title"]))) {
            $property_title_err = "please enter your property title like 2bhk apartment";
        }  else {
            $property_title = $_POST["property_title"];
        }

        if(empty(trim($_POST["property_location"]))) {
            $property_location_err = "please enter your property location like dwarka";
        }  else {
            $property_location = $_POST["property_location"];
        }
        
        if(empty(trim($_POST["property_address"]))) {
            $property_address_err = "please enter your property current address";
        }  else {
            $property_address = $_POST["property_address"];
        }

        if(empty(trim($_POST["property_price"]))) {
            $property_price_err = "please enter your property price for rent";
        }  else {
            $property_price = $_POST["property_price"];
        }

        if(empty($_FILES["property_image"]['name'])) {
                $property_image_err = "please upload an image";
        } else {
            $propety_image = $_FILES["property_image"]['name'];
        } 

        if(empty(trim($_POST["property_service"]))) {
            $property_service_err = "please add service for you rental property";
        } else {
            $property_service = $_POST["property_service"] ; 
        }

        if(empty($property_title_err) && empty($property_location_err) && empty($property_address_err) && empty($property_price_err) && empty($property_image_err) && empty($property_service_err)) {
            $sql = "insert into rental_property(username,title, location, address, rental_price, service1) values (?, ?, ?, ?, ?, ?)";
          
             if($stmt = $mysqli->prepare($sql)) {

                $stmt->bind_param("ssssss", $param_username, $param_property_title, $param_location, $param_address, $param_rental_price, $param_service1);

                $param_username = $username;
                $param_property_title = $property_title; 
                $param_location = $property_location;
                $param_address = $property_address; 
                $param_rental_price = $property_price;
                $param_service1 = $property_service;

                
                echo '<script>alert("hwo are you")</script>';

                if($stmt->execute()) {
                    echo '<script>alert("success")</script>';
                }  else {
                    echo "something is wrong";
                }

             }
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
                      <a href="dashboard-landlord-profile.php">Profile</a>
                      <a href="logout.php">Logout</a>
                   </div>
            </div>
            </div>
        </div>
    </header>

    
    <div class="two-column-section">
        <aside class="sidebar">
            <nav class="navigation">
                <ul>
                    <li><a href="./dashboard-landlord.php"><i class="fas fa-plus"></i><span>Add</span></a></li>
                    <li><a href="./dashboard-landlord-property.php"><i class="fas fa-th-list"></i><span>Properties</span></a></li>
                    <li><a href="#"><i class="fas fa-trash"></i><span>Trash</span></a></li>
                </ul>
            </nav>
        </aside>
       <main class="content">
          <div class="container">
               <div class="form dashboard-form">
                     <h1>Add Property</h1>
                     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                          <label for="property_title">Title</label>
                          <input type="text" name="property_title" class="form-control" value="<?php echo $property_title ?>">
                          <div class="<?php echo (!empty($property_title_err)) ? 'has-error' : ''; ?>"><?php echo $property_title_err; ?></div> 
                        </div>
                       
                          <div class="form-group">
                          <label for="property_location">Location</label>
                          <input type="text" class="form-control" name="property_location" value="<?php echo $property_location ?>">
                          <div class="<?php echo (!empty($property_location_err)) ? 'has-error' : ''; ?>"><?php echo $property_location_err; ?></div> 
                         </div>
                         
                          <div class="form-group">
                          <label for="property_address">Address of rental property</label>
                          <input type="text" class="form-control" name="property_address" value="<?php echo $property_address ?>">  
                          <div class="<?php echo (!empty($property_address_err)) ? 'has-error' : ''; ?>"><?php echo $property_address_err; ?></div>
                            </div>
                         
                          <div class="form-group">
                          <label for="photo">Photos</label>
                          <input type="file" name="property_image" value="<?php echo $property_image ?>"> 
                          <div class="<?php echo (!empty($property_image_err)) ? 'has-error' : ''; ?>"><?php echo $property_image_err; ?></div>
                        </div>
                         
                          <div class="form-group">
                          <?php 
                           if(isset($_SESSION['usernae'])) 
                          { 
                              echo '<div class="gallery-container">
                                <div class="gallery-item">
                                    <img src="./images/img1.jpg" alt="">
                                </div>
                                <div class="gallery-item">
                                    <img src="./images/img1.jpg" alt="">
                                </div>
                                <div class="gallery-item">
                                    <img src="./images/img1.jpg" alt="">
                                </div>
                                <div class="gallery-item">
                                    <img src="./images/img1.jpg" alt="">
                                </div>
                          </div>';
                          } 
                          ?>
                          
                          </div>        
                          <div class="form-group">
                            <div class="add-services">
                               <h3>Add Services</h3>
                                <input type="text" name="property_service" value="<?php echo $property_service ?>">                        
                                <div class="<?php echo (!empty($property_service_err)) ? 'has-error' : ''; ?>"><?php echo $property_service_err; ?></div>
                                <button id="add-service" class="btn btn-primary" type="button">Add more service</button>
                            </div>
                          </div>

                          <div class="form-group">
                          <label for="price" name="property_price">Price</label>
                          <input type="number" class="form-control" id="price" name="property_price" value="<?php echo $property_price ?>"><span>/Month</span>
                          <div class="<?php echo (!empty($property_price_err)) ? 'has-error' : ''; ?>"><?php echo $property_price_err; ?></div>
                          </div>

                          <div class="form-group">
                          <button type="submit" class="btn btn-primary">SAVE</button> <button class="btn btn-primary">Ready for Listing</button> <button class="btn btn-primary">Exclude from Listing</button>
                          </div>
                     </form>
               </div>
          </div>  
       </main>
    </div>
       
    <script src="./main.js"></script>
</body>

</html>