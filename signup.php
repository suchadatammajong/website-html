<?php 

    session_start();
    require_once 'config/db.php';

?>
	<!DOCTYPE html>
	<html lang="en" >
	<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>register</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700" rel="stylesheet"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
	<link rel="stylesheet" href="./style.css">

	</head>
	<body>
    <form action="signup_db.php" method="post"> 
            <label class="fs-2 text-center ">Register</label>
            <hr>
            <div class="mb-1">
            <?php if(isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </div>
            <?php } ?>
            <?php if(isset($_SESSION['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </div>
            <?php } ?>
            <?php if(isset($_SESSION['warning'])) { ?>
                <div class="alert alert-warning" role="alert">
                    <?php 
                        echo $_SESSION['warning'];
                        unset($_SESSION['warning']);
                    ?>
                </div>
            <?php } ?>  
                <label for="firstname" class="form-label">First name</label>
                <input type="text" class="form-control" name="mname" aria-describedby="mname">
            </div>
            <div class="mb-1">
                <label for="lastname" class="form-label">Last name</label>
                <input type="text" class="form-control" name="sname" aria-describedby="sname">
            </div>
            <div class="mb-1">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" aria-describedby="email">
            </div>
            <div class="mb-1">
                <label for="email" class="form-label">Tel</label>
                <input type="text" class="form-control" name="tel" aria-describedby="tel">
            </div>
            <div class="mb-1">
                <label for="Address" class="form-label">Address</label>
                <input type="text" class="form-control" name="Address" aria-describedby="Address">
            </div>
            <div class="mb-1">
                <label for="Username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" aria-describedby="username">
            </div>
            <div class="mb-1">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="mb-2">
                <label for="confirm password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="c_password">
            </div>
            <div class="inputGroup inputGroup3">
			<button type="submit" name="signup" >Sign up</button>
            <hr>
            <p>เป็นสมาชิกแล้วใช่ไหม คลิ๊กที่นี่เพื่อ <a href="login.php">เข้าสู่ระบบ</a></p>
		</div>
        
        </form>
	<!-- partial -->
	<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js'></script>

	</body>
	</html>
