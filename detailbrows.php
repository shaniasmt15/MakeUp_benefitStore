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

            <div id="wrapper">

                <!--start: Container -->
                <div class="container">
                    <div class="title">
                        <h3>Keranjang Anda</h3>
                    </div>
                    <div class="hero-unit">
                        <!--<div class="tittle"><h3><strong><span class="glyphicon glyphicon-shopping-cart"></span> Your Cart</strong></h3></div>-->
                        <table class="table table-hover table-condensed">
                            <tr>
                                <th>
                                    <center>No</center>
                                </th>
                                <th>
                                    <center>Item</center>
                                </th>
                                <th>
                                    <center>Quantity</center>
                                </th>
                                <th>
                                    <center>Sub Total</center>
                                </th>
                            </tr>
                            <?php
				//MENAMPILKAN DETAIL KERANJANG BELANJA//
                
    $total = 0;
    //mysql_select_db($database_conn, $conn);
    if (isset($_SESSION['items'])) {
        foreach ($_SESSION['items'] as $key => $val) {
            $query = mysqli_query($koneksi, "SELECT br_id, br_nm, br_hrg FROM brows WHERE br_id = '$key'");
            $data = mysqli_fetch_array($query);
            $jumlah_harga = $data['br_hrg'] * $val;
            $total += $jumlah_harga;
            $no = 1;
            ?>
                                <tr>
                                    <td>
                                        <center>
                                            <?php echo $no ++; ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $data['br_nm']; ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo number_format($val); ?> Pcs</center>
                                    </td>
                                    <td>
                                        <center>Rp.
                                            <?php echo number_format($jumlah_harga); ?>
                                        </center>
                                    </td>
                                </tr>

                                <?php
                    //mysql_free_result($query);			
						}
							//$total += $sub;
						}?>
                                    <?php
				if($total == 0){ ?>
                                        <td colspan="4" align="center">
                                            <?php echo "Keranjang Kosong!"; ?>
                                        </td>
                                        <?php } else { ?>

                                        <td colspan="4" style="font-size: 18px;"><b><div class="pull-right">Total Belanja Anda : Rp. <?php echo number_format($total); ?>,- </div> </b></td>

                                        <?php	}
				?>
                        </table>
                        <p>
                            <div align="right">
                                <a href="detailcart.php" class="btn btn-info">&raquo Details Keranjang &laquo</a>
                            </div>
                        </p>
                    </div>
                    <!-- start: Row -->

                    <div class="row">
                        <div class="col-sm-6">
                            <?php                  
$query = mysqli_query($koneksi, "SELECT * FROM brows WHERE br_id='$_GET[kd]'");
$data  = mysqli_fetch_array($query);
?>
                            <!--<div class="span4">-->
                            <!--<div class="icons-box">-->
                            <div class="hero-unit" style="margin-left: 20px;">
                                <table>
                                    <tr>
                                        <td rowspan="7"><img src="<?php echo $data['br_gbr']; ?>" /></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <div class="title">
                                                <h3>
                                                    <?php echo $data['br_nm']; ?>
                                                </h3>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td size="200">
                                            <h3>Harga</h3>
                                        </td>
                                        <td>
                                            <h3>:</h3>
                                        </td>
                                        <td>
                                            <div>
                                                <h3>Rp.
                                                    <?php echo number_format($data['br_hrg'],2,",",".");?>
                                                </h3>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <h3>Stock</h3>
                                        </td>
                                        <td>
                                            <h3>:</h3>
                                        </td>
                                        <td>
                                            <div>
                                                <h3>
                                                    <?php if ($data['br_stok'] >= 1){
	                           echo '<strong style="color: pink;">In Stock</strong>';	
                                } else {
	                           echo '<strong style="color: red;">Out Of Stock</strong>';	
                                }; ?></h3>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <h3>Satuan</h3>
                                        </td>
                                        <td>
                                            <h3>:</h3>
                                        </td>
                                        <td>
                                            <div>
                                                <h3>
                                                    <?php echo $data['br_satuan']; ?>
                                                </h3>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <h3>Keterangan</h3>
                                        </td>
                                        <td>
                                            <h3>:</h3>
                                        </td>
                                        <td>
                                            <div>
                                                <h3>
                                                    <?php echo $data['ket']; ?>
                                                </h3>
                                            </div>
                                        </td>
                                    </tr>
                                    <!--	<p>
						
						</p> -->
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <div class="clear"> <a href="cart.php?act=add&amp;barang_id=<?php echo $data['br_id']; ?>&amp;ref=detailbrows.php?kd=<?php echo $data['br_id'];?>" class="btn btn-lg btn-info">Beli &raquo;</a></div>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                            <!--</div> -->
                            <!--</div> -->
                            <!---->
                        </div>
                        <!-- end: Row -->


                    </div>


                </div>

            </div>



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
