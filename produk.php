<?php require_once("koneksi.php");
    if (!isset($_SESSION)) {
        session_start();
    } ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- start: CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic">
    <!-- end: CSS -->

</head>

<body>

    <!--start: Wrapper-->
    <div id="w3-container w3-xlarge">


            <div class="row">
                <?php
                    $sql = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY br_id DESC limit 9");
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
                            <div class="clear"><a href="detailproduk.php?kd=<?php echo $data['br_id'];?>" class="btn btn-lg btn-danger">Detail</a> <a href="detailproduk.php?kd=<?php echo $data['br_id'];?>" class="btn btn-lg btn-success">Beli &raquo;</a></div>

                        </div>
                    </div>
                    <?php   
              }
              
              
              ?>
                    <!---->
            </div>

        </div>
        <!--end: Container-->

    </div>
    <!-- end: Wrapper  -->


</body>

</html>
