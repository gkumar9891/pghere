<?php
    session_start();

    require_once "config.php";


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | PGHERE</title>
    <link rel="stylesheet" href="./style.css">
    <script src="main.js"></script>
    <script src="https://kit.fontawesome.com/9061437dbd.js" crossorigin="anonymous"></script>
</head>

<body>
    <header id="header">
        <div class="container">
            <div class="d-flex align-items-center">
                <div class="logo mr-auto">
                    <a href="./">
                        <span>P.G. HERE</span>
                    </a>
                </div>

                <nav class="navigation">
                    <ul class="list">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Contact us</a></li>
                    </ul>
                </nav>

                <div class="user ml-auto">
                    <a href="login-tenant.php" class="btn btn-primary">Tenant</a>
                    <a href="login-landlord.php" class="btn btn-primary">Landload</a>
                </div>
            </div>
        </div>
    </header>

    <div class="banner">
        <div class="container">
            <div class="description">
                <h2>A very simple platform for tenant and landlord</h2>
                <a href="login-tenant.php" class="btn btn-secondary">Login as Tenant</a>
                <a href="login-landlord.php" class="btn btn-secondary">Login as Landload</a>
            </div>
        </div>
    </div>
    <main id="content">
        <div class="container">
            <form class="search-group" method="GET" action="<?php echo $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data" >
                <div class="description">
                    <h2>Search properties for rent near any location</h2>
                </div>
                <input type="text" name="search" class="search-bar" placeholder="input to search" />
                <input type="submit"
                    class="btn btn-primary" value="search" />
            </form>

           <?php /* 
                
                if(!isset($_GET['search'])) {
                    $query = "";
                } else {
                
                $query = $_GET['search'];
                $sql = 'select * from rental_property where match (title, location, address) against ("$query")';
               
                $result = $mysqli->query($sql);

      if ($result->num_rows > 0) {

        print_r($result);
        while($row = $result->fetch_assoc()) {
        
            $title = $row['title'];
            $location = $row['location'];
            $address = $row['address'];
            $rent = $row['rental_price'];
        }

        

      }

                                
                }
                
              /*  if($stmt = $mysqli->prepare($sql)) {
                    if($stmt->execute()) {
                        $stmt->store_result();

                        if($stmt->num_rows > 0) {
                            if($stmt->fetch()) {
                                while(($row = $result->fetch()) {
                                    $title = $row['title'];
                                    $location = $row['location'];
                                    $address = $row['address'];
                                    $rent = $row['rental_price'];
                
                                    echo ' <div class="result">
                                    <div class="featured-img">
                                        <a href="#"><img src="./images/image1.jpg" alt=""></a>
                                    </div>
                    
                                    <div class="description">
                                        <h3><a href="#">8 bhk residental appartment in malviya nagar</a></h3>
                    
                                        <h4 class="rent">Rent - Rs 3000/Month </h4>
                    
                                        <h4>Services</h4>
                                        <ul>
                                            <li>24*7 electricity</li>
                                            <li>A very big market near location</li>
                                            <li>just 250m away from metro station</li>
                                        </ul>
                    
                                        <div class="ratings">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                        </div>
                    
                                        <div class="landlord">
                                            <div class="image">
                                                <img src="./images/image5.jpg" alt="">
                                            </div>
                                            <h5>Ravi Thakur</h5>
                                        </div>
                    
                                    </div>
                                </div>';
                                }
                            }
                        }
                    }
                } */

            ?>


<div class="result">
                                    <div class="featured-img">
                                        <a href="#"><img src="./images/image1.jpg" alt=""></a>
                                    </div>
                    
                                    <div class="description">
                                        <h3><a href="#">8 bhk residental appartment in malviya nagar</a></h3>
                    
                                        <h4 class="rent">Rent - Rs 3000/Month </h4>
                    
                                        <h4>Services</h4>
                                        <ul>
                                            <li>24*7 electricity</li>
                                            <li>A very big market near location</li>
                                            <li>just 250m away from metro station</li>
                                        </ul>
                    
                                        <div class="ratings">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                        </div>
                    
                                        <div class="landlord">
                                            <div class="image">
                                                <img src="./images/image5.jpg" alt="">
                                            </div>
                                            <h5>Ravi Thakur</h5>
                                        </div>
                    
                                    </div>
                                </div>

                                <div class="result">
                                    <div class="featured-img">
                                        <a href="#"><img src="./images/image3.jpg" alt=""></a>
                                    </div>
                    
                                    <div class="description">
                                        <h3><a href="#">2bhk residental appartment in malviya nagar</a></h3>
                    
                                        <h4 class="rent">Rent - Rs 7000/Month </h4>
                    
                                        <h4>Services</h4>
                                        <ul>
                                            <li>24*7 electricity</li>
                                            <li>A very big market near location</li>
                                            <li>just 250m away from metro station</li>
                                        </ul>
                    
                                        <div class="ratings">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                        </div>
                    
                                        <div class="landlord">
                                            <div class="image">
                                                <img src="./images/image4.jpg" alt="">
                                            </div>
                                            <h5>Ravi Thakur</h5>
                                        </div>
                    
                                    </div>
                                </div>

                                <div class="result">
                                    <div class="featured-img">
                                        <a href="#"><img src="./images/image2.jpg" alt=""></a>
                                    </div>
                    
                                    <div class="description">
                                        <h3><a href="#">4bhk residental appartment in dwarka</a></h3>
                    
                                        <h4 class="rent">Rent - Rs 4000/Month </h4>
                    
                                        <h4>Services</h4>
                                        <ul>
                                            <li>24*7 electricity</li>
                                            <li>A very big market near location</li>
                                            <li>just 250m away from metro station</li>
                                        </ul>
                    
                                        <div class="ratings">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                        </div>
                    
                                        <div class="landlord">
                                            <div class="image">
                                                <img src="./images/image6.jpg" alt="">
                                            </div>
                                            <h5>Rahul Kumar</h5>
                                        </div>
                    
                                    </div>
                                </div>

                <!-- Trigger/Open The Modal -->

                <button type="button" class="open-modal" data-open="modal1">
                    Launch first modal with a slide animation
                  </button>

                  <div class="modal" id="modal1" data-animation="slideInOutLeft">
                    <div class="modal-dialog">
                      <header class="modal-header">
                        The header of the first modal
                        <button class="close-modal" aria-label="close modal" data-close>
                          ✕  
                        </button>
                      </header>
                      <section class="modal-content">
                        <p><strong>Press ✕, ESC, or click outside of the modal to close it</strong></p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo repellendus reprehenderit accusamus totam ratione! Nesciunt, nemo dolorum recusandae ad ex nam similique dolorem ab perspiciatis qui. Facere, dignissimos. Nemo, ea.</p>
                        <p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure</p>
                        <p>Nullam vitae enim vel diam elementum tincidunt a eget metus. Curabitur finibus vestibulum rutrum. Vestibulum semper tellus vitae tortor condimentum porta. Sed id ex arcu. Vestibulum eleifend tortor non purus porta dapibus</p>
                        <p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure</p>
                      </section>
                      <footer class="modal-footer">
                        The footer of the first modal
                      </footer>
                    </div>
                  </div>


            </div>
        </div>
    </main>
    <footer id="footer">
        <div class="foot-note">
            <div class="container">
                <p>&copy; all right reserved</p>
            </div>
        </div>
    </footer>

    <script src="main.js"></script>
</body>

</html>