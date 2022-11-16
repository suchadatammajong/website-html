<?php

    session_start();

    require_once "functions.php";

    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        $deletestmt = $conn->query("DELETE FROM tbl_customer WHERE id = $delete_id");
        $deletestmt->execute();

        if ($deletestmt) {
            echo "<script>alert('ลบข้อมูลเรียบร้อยแล้ว');</script>";
            $_SESSION['success'] = "ข้อมูลถูกลบเรียบร้อยแล้ว";
            header("refresh:1; url=customer.php");
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>

    <!-- CSS only -->
    <link rel="shortcut icon" type="image/jpg" href="./img/tattoo.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>
<body>
<header class="header-area header-sticky">
  </header>
  <?php include('headeradmin.php'); ?>
  <br>
  <br>
  <br>
  <br>
<!--
    <div class="modal fade" id="userModal" tabcustomer="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="insert.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="firstname" class="col-form-label">First Name:</label>
                    <input type="text" required class="form-control" name="cname">
                </div>
                <div class="mb-3">
                    <label for="firstname" class="col-form-label">Last Name:</label>
                    <input type="text" required class="form-control" name="sname">
                </div>
                <div class="mb-3">
                    <label for="firstname" class="col-form-label">Address:</label>
                    <input type="text" required class="form-control" name="address">
                </div>
                <div class="mb-3">
                    <label for="firstname" class="col-form-label">Tel:</label>
                    <input type="text" required class="form-control" name="tel">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>

        </div>
    </div>
    </div> -->
    <table align="center">
<form name="frmSearch" method="get" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
    <tr>
      <th>ค้นหาชื่อสมาชิก
      <input name="txtKeyword" type="text" id="txtKeyword" value="<?php echo $_GET["txtKeyword"];?>">
      <input type="submit" value="Search"></th> <br>
    </tr>
  </table>
</form><br><br>
<?php
if($_GET["txtKeyword"] != "")
	{
	$objConnect = mysql_connect("localhost","surache1_room1g2","ZPN25472") or die("Error Connect to Database");
	$objDB = mysql_select_db("surache1_room1g2");
	// Search By Name or Email
	$strSQL = "SELECT * FROM tbl_customer WHERE (cname LIKE '%".$_GET["txtKeyword"]."%' or sname LIKE '%".$_GET["txtKeyword"]."%' )";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	?>
    <table align="center" width="70%">
	  
	<?php
	while($objResult = mysql_fetch_array($objQuery))
	{
	?>
	  <tr>
		<td><div align="center"><?php echo $objResult["id"];?></div></td>
		<td><?php echo $objResult["cname"];?></td>
		<td><?php echo $objResult["sname"];?></td>
        <td><?php echo $objResult["address"];?></td>
		<td><?php echo $objResult["tel"];?></td>


	  </tr>
	<?php
	}
	?>
	</table>
	<?php
	mysql_close($objConnect);
}
?>
</body>
</html>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1></h1>
            </div>
            <div class="col-md-0 d-flex justify-content-start">
                
         </div>
        </div>
        <hr>
        <?php if (isset($_SESSION['success'])) { ?>
            <div class="alert alert-success">
                <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                ?>
            </div>
        <?php } ?>
        <?php if (isset($_SESSION['error'])) { ?>
            <div class="alert alert-danger">
                <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                ?>
            </div>
        <?php } ?>
  
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th scope="col">Firstname</th>
                      <th scope="col">Lastname</th>
                      <th scope="col">Address</th>
                      <th scope="col">Tel</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $stmt = $conn->query("SELECT * FROM tbl_customer");
                    $stmt->execute();
                    $tbl_customer = $stmt->fetchAll();
                    foreach($tbl_customer as $user)  {
                ?>
                    <tr>
                        <td scope="row"><input type="hidden"><?php echo $user['id']; ?></th>
                        <td><?php echo $user['cname']; ?></td>
                        <td><?php echo $user['sname']; ?></td>
                        <td><?php echo $user['address']; ?></td>
                        <td><?php echo $user['tel']; ?></td>

                        <td>
                            <a href="edit.php?id=<?php echo $user['id']; ?>" class="btn btn-warning">Edit</a>
                            <a onclick="return confirm('Are you sure you want to delete?');" href="?delete=<?php echo $user['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            </table>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        let imgInput = document.getElementById('imgInput');
        let previewImg = document.getElementById('previewImg');

        imgInput.onchange = evt => {
            const [file] = imgInput.files;
                if (file) {
                    previewImg.src = URL.createObjectURL(file)
            }
        }

    </script>
</body>
</html>

	<!-- core  -->
    <script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- bootstrap 3 affix -->
	<script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- Isotope -->
    <script src="assets/vendors/isotope/isotope.pkgd.js"></script>

    <!-- LeadMark js -->
    <script src="assets/js/leadmark.js"></script>