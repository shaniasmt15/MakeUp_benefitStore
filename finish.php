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
    <title>Benefit Cosmetic's - Brows</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="login/css/bootstrap.min.css" rel="stylesheet">
    <!-- start: CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
    <!-- end: CSS -->


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
            <header class="w3-container w3-xlarge">
                <p class="w3-left">
                    <font style="Segoe Script">Benefit Makeup - Brows</font>
                </p>
                <p class="w3-right ">
                    <a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a>

                </p>

                <p class="w3-right">
                    <a href="cart.php"><i class="fa fa-shopping-cart w3-margin-right"></i></a>

                </p>



            </header>
            <!-- Product grid -->

            <!--start: Wrapper-->
            <div id="wrapper">

                <!-- start: Container -->
                <div class="container">

                    <!-- start: Table -->
                    <div class="table-responsive">
                        <div class="title">
                            <h3>Checkout Selesai</h3>
                        </div>
                        <div class="hero-unit">Selamat Anda telah berhasil checkout, silahkan catat info di bawah ini..</div>
                        <div class="hero-unit">
                            <?php
			if($_POST['finish']){
				session_destroy();
				echo 'Terima kasih Anda sudah berbelanja di Toko Online kami dan berikut ini adalah data yang perlu Anda catat.';
				echo '<p>Total biaya untuk pembelian Produk adalah Rp. '.$_POST['total'].',- dan biaya bisa di kirimkan melalui Rekening Bank Mandiri cabang Pekanbaru dengan nomor rekening 123-234-56347-8 atas nama Shania Shamanta.</p>';
				echo '<p>Dan barang akan kami kirim ke alamat di bawah ini:</p>';
				echo '<p>Nama Lengkap : '.$_POST['nm_usr'].'<br>';
                echo 'Email : '.$_POST['email_usr'].'<br>';
                echo 'Alamat : '.$_POST['almt_usr'].'<br>';
                echo 'Kode Pos : '.$_POST['kp_usr'].'<br>';
                echo 'Kota : '.$_POST['kota_usr'].'<br>';
                echo 'No Telepon : '.$_POST['tlp'].'<br>';
                echo 'Total Belanja : Rp. '.$_POST['total'].',-</p>';
			}else{
				header("Location: thanks.php");
			}
			?>

                        </div>
                        <a href="thanks.php" class="btn btn-sm btn-info">Finis</a></td>
                        <!-- end: Table -->

                    </div>
                    <!-- end: Container -->

                </div>
            </div>
            <!-- end: Wrapper  -->

            <br><br>
            <div class="w3-black w3-center w3-padding-24">
                <div class="w3-black w3-center w3-padding-24">Made with &#10084 by Shania Shamanta | Poppy Apriola</div>

            </div>
            <br><br><br>

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
