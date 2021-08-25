<?php 

  echo $_SESSION["logedin"];

?>

<!DOCTYPE html>
<html lang="en" class="dashboard">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | PGHERE</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/9061437dbd.js" crossorigin="anonymous"></script>
</head>

<body>
    <header id="header">
        <div class="container">
            <div class="d-flex align-items-center">
            <div class="logo">
                <a href="#">
                <span>P.G. HERE</span>
                 </a>
            </div>

            <div class="greeting">
                <span>hello <?php echo $username?></span>
            </div>

            <div class="user-profile ml-auto">
                   <a href="#" class="profile">
                         <img src="./images/name.png" alt="">
                   </a>
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
          <div class="container">
               <div class="property">
                <div class="result">
                    <a href="#" class="d-block">
                    <div class="featured-img">
                        <img src="./images/ls-a.png" alt="">
                    </div>
                    </a>

                    <div class="description">
                        <h3>8 bhk residental appartment in malviya nagar</h3>

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
                    </div>

                    <div class="more">
                        <a href="#"><i class="fas fa-ellipsis-h"></i></a>
                        
                        <div class="options">
                            <ul>
                                <li><a href="#">Edit</a></li>
                                <li><a href="#">delete</a></li>
                                <li><a href="#">Exclude from listing</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="result">
                    <a href="#" class="d-block">
                    <div class="featured-img">
                        <img src="./images/ls-a.png" alt="">
                    </div>
                    </a>

                    <div class="description">
                        <h3>8 bhk residental appartment in malviya nagar</h3>

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
                    </div>

                    <div class="more">
                        <a href="#"><i class="fas fa-ellipsis-h"></i></a>
                        
                        <div class="options">
                            <ul>
                                <li><a href="#">Edit</a></li>
                                <li><a href="#">Delete</a></li>
                                <li><a href="#">Exclude from listing</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
               </div>
          </div>  
       </main>
    </div>
       
</body>

</html>
