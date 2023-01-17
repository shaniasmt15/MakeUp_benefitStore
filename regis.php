<!DOCTYPE html>
<html>
<title>Benefit</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">

<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        background-image: url('images/s.jpg');
        min-height: 100%;
        background-position: center;
        background-size: cover;
    }
    
    .row {
        margin: 100px auto;
        width: 300px;
        text-align: center;
    }
    
    .wel {
        background-color: #fff;
        padding: 5px;
    }
    
    .login {
        background-color: #fff;
        padding: 20px;
        margin-top: 20px;
    }

</style>

<body>

    <div class="container">
        <div class="row">
            <div class="wel">
                <h2>Welcome To Benefit Makeup Store</h2>
                <p>Please Login To Start Shopping</p>

                <div class="login">

                    <?php
				if(isset($_POST['regis'])){
					include("koneksi.php");
					
					$username	= $_POST['username'];
					$password	= md5($_POST['password']);
                    $nama       = $_POST['nama'];
                    $email      = $_POST['email'];
					
					
    if (empty($username)) {
        header('location: regis.php?error=' .base64_encode('Username tidak boleh kosong'));
    }
    if (empty($password)) {
        header('location: regis.php?error=' .base64_encode('Password tidak boleh kosong'));   
    }
    if (empty($nama)) {
        header('location: regis.php?error=' .base64_encode('Nama tidak boleh kosong'));   
    }
    $level = '1'; // default, 
    // SQL Insert
    $sql = "INSERT INTO users (username,password, nama, email, level) VALUES ('$username', '$password', '$nama', '$email','$level')";
    $insert =$koneksi->query($sql);
    // jika gagal
    if (! $insert) {
        echo "<script>alert('".$dbconnect->error."'); window.location.href = 'regis.php';</script>";
    } else {
        echo "<script>alert('Insert Data Berhasil'); window.location.href = 'login.php';</script>";
    }
}
?>

                        <form role="form" action="" method="post">
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="Username" required autofocus />
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Password" required autofocus />
                            </div>
                            <div class="form-group">
                                <input type="text" name="nama" class="form-control" placeholder="Nama" required autofocus />
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" placeholder="Email" required autofocus />
                            </div>
                            <div class="form-group">
                                <select name="level" class="form-control" required>
							
							<option value="1">Customer</option>
							
						</select>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="regis" class="btn btn-primary btn-block" value="Registration" />
                            </div>
                            <p>OR</p>
                            <div class="form-group">
                                <a href="login.php"><input name="back" class="btn btn-primary btn-block" value="Back to Login" /></a>
                            </div>

                        </form>
                </div>

            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
