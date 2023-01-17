<?php
session_start();

if($_SESSION){
	header("Location: home.php");
    
}
?>
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
			margin:100px auto;
			width:300px;
			text-align:center;
            
		}
        .wel{
            background-color: #fff;
            padding: 5px;
        }
		.login {
			background-color:#fff;
			padding:20px;
			margin-top:20px;
		}

</style>
<body>
    
    <div class="container">
		<div class="row">
            <div class="wel">
            <h2>Welcome To Benefit Makeup Store</h2>
            <p>Please Register To Start Shopping</p>
            
			<div class="login">
				
				<?php
				if(isset($_POST['login'])){
					include("koneksi.php");
					
					$username	= $_POST['username'];
					$password	= md5($_POST['password']);
					$level		= $_POST['level'];
					
					$query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'");
					if(mysqli_num_rows($query) == 0){
						echo '<div class="alert alert-danger">Upss...!!! Login gagal.</div>';
					}else{
						$row = mysqli_fetch_assoc($query);
						
						if($row['level'] == 1 && $level == 1){
							$_SESSION['username']=$username;
							$_SESSION['level']='admin';
							header("Location: home.php");
                        }else{
							echo '<div class="alert alert-danger">Upss...!!! Login gagal.</div>';
						}
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
						<select name="level" class="form-control" required>
							
							<option value="1">Customer</option>
							
						</select>
					</div>
					<div class="form-group">
						<input type="submit" name="login" class="btn btn-primary btn-block" value="Login" />
					</div>
                    <p>OR</p>
                    <div class="form-group">
                        <a href='regis.php' name="registration" class="btn btn-primary btn-block" >Registration</a>
                    </div>
                    
				</form>
			</div>
		
		</div>
	</div>
    </div>
    
 <div class="w3-display-bottomleft w3-padding-large">
    Powered by Shania Shamanta | Poppy ApriolaS
  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
