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
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
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
                    <a href="detailcart.php"><i class="fa fa-shopping-cart w3-margin-right"></i></a>

                </p>



            </header>
            <!-- Product grid -->
            <div id="wrapper">

                <!-- start: Container -->
                <div class="container">

                    <!-- start: Table -->
                    <div class="title">
                        <h3>Detail Keranjang Belanja</h3>
                    </div>
                    <table class="table table-hover table-condensed">
                        <tr>
                            <th>
                                <center>No Pembelian</center>
                            </th>
                            <th>
                                <center>Kode Barang</center>
                            </th>
                            <th>
                                <center>Nama Barang</center>
                            </th>
                            <th>
                                <center>Jumlah</center>
                            </th>
                            <th>
                                <center>Harga Satuan</center>
                            </th>
                            <th>
                                <center>Sub Total</center>
                            </th>
                            <th>
                                <center>Opsi</center>
                            </th>
                        </tr>
                        <?php
				//MENAMPILKAN DETAIL KERANJANG BELANJA//
                
    $total = 0;
    //mysql_select_db($database_conn, $conn);
    if (isset($_SESSION['items'])) {
        foreach ($_SESSION['items'] as $key => $val) {
            $query = mysqli_query($koneksi, "select * from brows where br_id = '$key'");
            $data = mysqli_fetch_array($query);

            $jumlah_harga = $data['br_hrg'] * $val;
            $total += $jumlah_harga;
            $no = 1;
            ?>
                            <tr>
                                <td>
                                    <center>
                                        <?php echo $no++; ?>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <?php echo $data['br_id']; ?>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <?php echo $data['br_nm']; ?>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <?php echo number_format($data['br_hrg']); ?>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <?php echo number_format($val); ?>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <?php echo number_format($jumlah_harga); ?>
                                    </center>
                                </td>
                                <td>
                                    <center><a href="cart.php?act=plus&amp;barang_id=<?php echo $key; ?>&amp;ref=detailcart.php" class="btn btn-xs btn-info">Tambah</a> <a href="cart.php?act=min&amp;barang_id=<?php echo $key; ?>&amp;ref=detailcart.php" class="btn btn-xs btn-info">Kurang</a> <a href="cart.php?act=del&amp;barang_id=<?php echo $key; ?>&amp;ref=detailcart.php" class="btn btn-xs btn-info">Hapus</a></center>
                                </td>
                            </tr>

                            <?php
                    //mysql_free_result($query);			
						}
							//$total += $sub;
						}?>
                                <?php
				if($total == 0){
					echo '<tr><td colspan="5" align="center">Ups, Keranjang kosong!</td></tr></table>';
					echo '<p><div align="right">
						<a href="home.php" class="btn btn-info btn-lg">&laquo; Continue Shopping</a>
						</div></p>';
				} else {
					echo '
						<tr style="background-color: #f5a7b8;"><td colspan="4" align="right"><b>Total :</b></td><td align="right"><b>Rp. '.number_format($total,2,",",".").'</b></td></td></td><td></td></tr></table>
						<p><div align="right">
						<a href="home.php" class="btn btn-info">&laquo; CONTINUE SHOPPING</a>
						<a href="checkout.php?total='.$total.'" class="btn btn-info"><i class="glyphicon glyphicon-shopping-cart icon-white"></i> CHECK OUT &raquo;</a>
						</div></p>
					';
				}
				?>

                    </table>


                    <!-- end: Table -->

                </div>
                <!-- end: Container -->

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
