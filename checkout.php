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
    <?php require_once("cart.php"); ?>
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
            <div id="w3-container w3-xlarge">

                <!-- start: Container -->
                <div class="row">

                    <!-- start: Table -->
                    <div class="table-responsive">
                        <div class="title">
                            <h3>Form Checkout</h3>
                        </div>
                        <div class="hero-unit">Harap isi form dibawah ini dengan lengkap dan benar sesuai idenditas anda!</div>
                        <div class="hero-unit">Total Belanja Anda Rp.
                            <?php echo abs((int)$_GET['total']); ?>,-</div>
                        <form id="formku" action="finish.php" method="post">
                            <table class="table table-condensed">
                                <input type="hidden" name="total" value="<?php echo abs((int)$_GET['total']); ?>">
                                <tr>
                                    <td><label for="nm_usr">Nama</label></td>
                                    <td><input name="nm_usr" type="text" class="required" minlength="6" id="nm_usr" size="200" /></td>
                                </tr>
                                <tr>
                                    <td><label for="log_usr">Username</label></td>
                                    <td><input name="log_usr" type="text" class="required" minlength="6" id="log_usr" /></td>
                                </tr>
                                <tr>
                                    <td><label for="pas_usr">Password</label></td>
                                    <td><input name="pas_usr" type="password" class="required" minlength="6" id="pas_usr" /></td>
                                </tr>
                                <tr>
                                    <td><label for="email_usr">Email</label></td>
                                    <td><input name="email_usr" type="email" class="email required" id="email_usr" /></td>
                                </tr>
                                <tr>
                                    <td><label for="almt_usr">Alamat</label></td>
                                    <td><input name="almt_usr" type="text" class="required" id="almt_usr" /></td>
                                </tr>
                                <tr>
                                    <td><label for="kp_usr">Kode Pos</label></td>
                                    <td><input name="kp_usr" type="text" class="required number" minlength="5" maxlength="5" id="kp_usr" /></td>
                                </tr>
                                <tr>
                                    <td><label for="kota_usr">Kota</label></td>
                                    <td><input name="kota_usr" type="text" class="required" minlength="6" id="kota_usr" /></td>
                                </tr>
                                <tr>
                                    <td><label for="tlp">No telepon</label></td>
                                    <td><input name="tlp" type="text" class="required number" minlength="12" id="tlp" /></td>
                                </tr>
                                <tr>
                                    <td><label for="rek">No Rekening</label></td>
                                    <td><input name="rek" type="text" class="required number" minlength="12" id="rek" /></td>
                                </tr>
                                <tr>
                                    <td><label for="nmrek">Nama Rekening</label></td>
                                    <td><input name="nmrek" type="text" class="required" minlength="6" id="nmrek" /></td>
                                </tr>
                                <tr>
                                    <td><label for="bank">Bank</label></td>
                                    <td><select name="bank" class="required">
        <option></option>
        <option value="Mandiri">Mandiri</option>
        <option value="BNI">BNI</option>
        <option value="CIMB">CIMB</option>
        <option value="BCA">BCA</option>
        <option value="Bank Jabar">Bank Jabar</option>
        <option value="Danamon">Danamon</option>
        <option value="BRI">BRI</option>
        <option value="Permata">Permata</option>
        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" value="Simpan Data" name="finish" class="btn btn-sm btn-info" />&nbsp;<a href="home.php" class="btn btn-sm btn-info">Kembali</a></td>
                                </tr>
                            </table>
                        </form>

                        <script src="jquery.validate.js"></script>
                        <script>
                            $(document).ready(function() {
                                $("#formku").validate();
                            });

                        </script>

                        <style type="text/css">
                            label.error {
                                color: red;
                                padding-left: .5em;
                            }

                        </style>
                    </div>

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

            </script>

        </div>


    </body>

    </html>
