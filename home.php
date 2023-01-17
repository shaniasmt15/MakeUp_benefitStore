<?php
session_start();

if(empty($_SESSION)){
    
	header("Location: login.php");
    	
}
?>
    <?php require_once("koneksi.php");
    if (!isset($_SESSION)) {
        session_start();
    } ?>
    <!DOCTYPE html>
    <html>
    <title>Benefit Cosmetics</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="w3.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">



    <style>
        .w3-sidebar a {
            font-family: "Roboto", sans-serif
        }
        
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .w3-wide {
            font-family: "Montserrat", sans-serif;
        }

    </style>


    <body class="w3-content" style="max-width:1350px">

        <!-- Sidebar/menu -->
        <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:200px;height:1400px" id="mySidebar">
            <div class="w3-container w3-display-container w3-padding-16">
                <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
                <a href="home.php"><img src="images/logo.jpg" height=150 width=204></a>
            </div>


            <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
                <font size=4> Product</font> <i class="fa fa-caret-down"></i> </a>
            <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
                <a href="brows.php" class="w3-bar-item w3-button w3-light-white">Brows</a>
                <a href="eyes.php" class="w3-bar-item w3-button w3-light-white">Eyes</a>
                <a href="face.php" class="w3-bar-item w3-button w3-light-white">Face</a>
                <a href="skin-care.php" class="w3-bar-item w3-button w3-light-white">Skin Care</a>
                <a href="lips.php" class="w3-bar-item w3-button w3-light-white">Lips</a>
                <a href="bodycare.php" class="w3-bar-item w3-button w3-light-white">Body Care & Fragrance</a>
            </div>


        </nav>

        <!-- Top menu on small screens -->
        <header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
            <div class="w3-bar-item w3-padding-24 w3-wide">BENEFIT</div>
            <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
        </header>

        <!-- Overlay effect when opening sidebar on small screens -->
        <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

        <!-- !PAGE CONTENT! -->
        <div class="w3-main" style="margin-left:250px">

            <!-- Push down content on small screens -->
            <div class="w3-hide-large" style="margin-top:83px"></div>

            <!-- Top header -->
            <header class="w3-container w3-xlarge" style="margin-top:40px">
                <p class="w3-left">
                    <font style="Segoe Script">Benefit Makeup - Home</font>
                </p>
                <p class="w3-right ">
                    <a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a>

                </p>

                <p class="w3-right">
                    <a href="detailcart.php"><i class="fa fa-shopping-cart w3-margin-right"></i></a>

                </p>
            </header>

            <!-- Image header -->
            <div class="w3-display-container w3-container">
                <div class="w3-content w3-section" width=1000px height=200px>
                    <img class="mySlides w3-animate-right" src="images/ab.gif" width=1020px height=500px>
                    <img class="mySlides w3-animate-right" src="images/aa.jpg" width=1020px height=500px>
                    <img class="mySlides w3-animate-right" src="images/ac.jpg" width=1020px height=500px>
                    <img class="mySlides w3-animate-right" src="images/ah.jpg" width=1020px height=500px>
                    <img class="mySlides w3-animate-right" src="images/ae.jpg" width=1020px height=500px>
                </div>

            </div>

            <div class="w3-container w3-text-grey" id="jeans">
                <h3>Produk Unggulan</h3>
                <hr>
            </div>

            <!-- Product grid -->
            <!--start: Wrapper-->
            <div id="w3-container w3-xlarge">
                <h4><a href="eyes.php" target="_blank" style="text-decoration:none">Eyes | More &raquo;</a></h4>
                <hr>
            

                    <div class="row">
                        <?php
                    $sql = mysqli_query($koneksi, "SELECT * FROM eyes ORDER BY br_id DESC limit 3");
                    while($data = mysqli_fetch_array($sql)){
                    ?>
                            <div class="span4">
                                <div class="icons-box">
                                    <div class="title">
                                        <h3>
                                            <?php echo $data['br_nm']; ?>
                                        </h3>
                                    </div>
                                    <img src="<?php echo $data['br_gbr']; ?>" />
                                    <div>
                                        <h3>Rp.
                                            <?php echo number_format($data['br_hrg'],2,",",".");?>
                                        </h3>
                                    </div>
                                    <!--	<p>
						
						</p> -->
                                    <div class="clear"><a href="detaileyes.php?kd=<?php echo $data['br_id'];?>" class="btn btn-lg btn-info">Detail</a>
                                        <a href="detaileyes.php?kd=<?php echo $data['br_id'];?>" class="btn btn-lg btn-info">Beli &raquo;</a></div>

                                </div>
                            </div>
                            <?php   
              }
              
              
              ?>
                            <!---->
                    </div>

                </div>


                <!--end eyes-->


                <hr>
              <div id="w3-container w3-xlarge">
                    <h4><a href="face.php" target="_blank" style="text-decoration:none">Face | More &raquo;</a></h4>
                    <hr>
                  

                        <div class="row">
                            <?php
                    $sql = mysqli_query($koneksi, "SELECT * FROM face ORDER BY br_id DESC limit 3");
                    while($data = mysqli_fetch_array($sql)){
                    ?>
                                <div class="span4">
                                    <div class="icons-box">
                                        <div class="title">
                                            <h3>
                                                <?php echo $data['br_nm']; ?>
                                            </h3>
                                        </div>
                                        <img src="<?php echo $data['br_gbr']; ?>" />
                                        <div>
                                            <h3>Rp.
                                                <?php echo number_format($data['br_hrg'],2,",",".");?>
                                            </h3>
                                        </div>
                                        <!--	<p>
						
						</p> -->
                                        <div class="clear"><a href="detaileyes.php?kd=<?php echo $data['br_id'];?>" class="btn btn-lg btn-info">Detail</a>
                                            <a href="detaileyes.php?kd=<?php echo $data['br_id'];?>" class="btn btn-lg btn-info">Beli &raquo;</a></div>

                                    </div>
                                </div>
                                <?php   
              }
              
              
              ?>
                                <!---->
                        </div>

                    </div>

                    <!--end face-->
                    <hr>
                  <div id="w3-container w3-xlarge">
                        <h4><a href="face.php" target="_blank" style="text-decoration:none">Lips | More &raquo;</a></h4>
                        <hr>
                      

                            <div class="row">
                                <?php
                    $sql = mysqli_query($koneksi, "SELECT * FROM lips ORDER BY br_id DESC limit 3");
                    while($data = mysqli_fetch_array($sql)){
                    ?>
                                    <div class="span4">
                                        <div class="icons-box">
                                            <div class="title">
                                                <h3>
                                                    <?php echo $data['br_nm']; ?>
                                                </h3>
                                            </div>
                                            <img src="<?php echo $data['br_gbr']; ?>" />
                                            <div>
                                                <h3>Rp.
                                                    <?php echo number_format($data['br_hrg'],2,",",".");?>
                                                </h3>
                                            </div>
                                            <!--	<p>
						
						</p> -->
                                            <div class="clear"><a href="detaileyes.php?kd=<?php echo $data['br_id'];?>" class="btn btn-lg btn-info">Detail</a>
                                                <a href="detaileyes.php?kd=<?php echo $data['br_id'];?>" class="btn btn-lg btn-info">Beli &raquo;</a></div>

                                        </div>
                                    </div>
                                    <?php   
              }
              
              
              ?>
                                    <!---->
                            </div>

                        </div>
                        <!--end: Container-->


                        <!-- Footer -->
                        <br><br>
                        <footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer">
                            <div class="w3-row-padding">
                                <div class="w3-col s4">
                                    <h4>About</h4>
                                    <p>Benefit Makeup Store</p>
                                    <p>Kami Adalah toko online resmi yang menjual berbagai produk dari benefit.Lihat Profil Kami
                                        <p><i class="material-icons">person</i> <a href="about.php">Shania Shamanta & Poppy Apriol</a></p>

                                </div>

                                <div class="w3-col s4">
                                    <h4>Office Address</h4>
                                    <p><i class="fa fa-fw fa-map-marker"></i> Jl. Umbansari 1 Rumbai,Kota Pekanbru</p>
                                    <h4>24/7 Support</h4>
                                    <p><i class="material-icons">phone</i> <a href="about.php">Poppy Apriola</a></p>
                                </div>

                                <div class="w3-col s4 w3-justify">
                                    <h4>Contact</h4>
                                    <p><i class="fa fa-fw fa-map-marker"></i> Makeup </p>
                                    <p><i class="fa fa-fw fa-phone"></i> 0044123123</p>
                                    <p><i class="fa fa-fw fa-envelope"></i> makeup@gmail.com</p>

                                    <br>
                                    <i class="fa fa-facebook-official w3-hover-opacity w3-large"></i> &nbsp&nbsp&nbsp
                                    <i class="fa fa-instagram w3-hover-opacity w3-large"></i> &nbsp&nbsp&nbsp
                                    <i class="fa fa-pinterest-p w3-hover-opacity w3-large"></i> &nbsp&nbsp&nbsp
                                    <i class="fa fa-twitter w3-hover-opacity w3-large"></i> &nbsp&nbsp&nbsp
                                </div>
                            </div>
                        </footer>

                        <!--Powered by-->
                        <div class="w3-black w3-center w3-padding-24">Made with &#10084 by Shania Shamanta | Poppy Apriola</div>

                        <!-- End page content -->
                    </div>

                    <script>
                        var myIndex = 0;
                        carousel();

                        function carousel() {
                            var i;
                            var x = document.getElementsByClassName("mySlides");
                            for (i = 0; i < x.length; i++) {
                                x[i].style.display = "none";
                            }
                            myIndex++;
                            if (myIndex > x.length) {
                                myIndex = 1
                            }
                            x[myIndex - 1].style.display = "block";
                            setTimeout(carousel, 3000);
                        }

                    </script>
                    <script>
                        // Accordion 
                        function myAccFunc() {
                            var x = document.getElementById("demoAcc");
                            if (x.className.indexOf("w3-show") == -1) {
                                x.className += " w3-show";
                            } else {
                                x.className = x.className.replace(" w3-show", "");
                            }
                        }

                        // Click on the "Jeans" link on page load to open the accordion for demo purposes
                        document.getElementById("myBtn").click();


                        // Script to open and close sidebar
                        function w3_open() {
                            document.getElementById("mySidebar").style.display = "block";
                            document.getElementById("myOverlay").style.display = "block";
                        }

                        function w3_close() {
                            document.getElementById("mySidebar").style.display = "none";
                            document.getElementById("myOverlay").style.display = "none";
                        }

                    </script>

                </div>

    </body>

    </html>
