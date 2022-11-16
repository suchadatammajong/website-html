<?php
session_start(); 


$hostname_surachet = "localhost";
$database_surachet = "surache1_room1g2";
$username_surachet = "surache1_room1g2";
$password_surachet = "ZPN25472";
$surachet = mysql_pconnect($hostname_surachet, $username_surachet, $password_surachet) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_surachet, $surachet);
$Username=$_GET['username'];
?>
<!DOCTYPE html>
<html lang="en">
<?php include('headermem.php')?>


    <!-- Portfolio Section -->
  <br><br><br>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="POST" enctype="multipart/form-data">

    <div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
<div class="col-md-12" >
<div class="center">
<?
        $Username=$_SESSION['username'];
        $sql="SELECT * FROM member WHERE username = '$Username'";
        $qry = mysql_query($sql,$surachet) or die(mysql_error());
        $data = mysql_fetch_array($qry);  
        
        ?>
                                                                

                                    
                                                <div class="card-user user-card-full">
                                                    <div class="row m-l-0 m-r-0">
                                                        <div class="col-md-12 bg-c-lite-green user-profile">
                                                            <div class="card-block text-center text-white">
                                                                <div class="m-b-25">
                                                                </div>

                                                                <h6 class="f-w-600"><?php echo $data['username']; ?></h6>
                                                                <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="card-block">
                                                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">ประวัติส่วนตัว</h6>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-10 f-w-600">ชื่อจริง</p>
                                                                        <h6 class="text-muted f-w-400"><?php echo $data['mname']; ?></h6>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-10 f-w-600">นามสกุล</p>
                                                                        <h6 class="text-muted f-w-400"><?php echo $data['sname']; ?></h6>
                                                                    </div>
                                                                    </div>
                                                                    <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-10 f-w-600">Email</p>
                                                                        <h6 class="text-muted f-w-400"><?php echo $data['email']; ?></h6>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-10 f-w-600">เบอร์โทร</p>
                                                                        <h6 class="text-muted f-w-400"><?php echo $data['tel']; ?></h6>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-10 f-w-600">ที่อยู่</p>
                                                                        <h6 class="text-muted f-w-400"><?php echo $data['address']; ?></h6>
                                                                    </div>
                                                                </div>
                                                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">รายชื่อหนังสือเล่มโปรด</h6>
                                                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="POST" enctype="multipart/form-data">
                                                                <?php 
                                                                 $Username=$_SESSION['username'];
                                                                $sql2="SELECT p.ProductName FROM member m , tbl_Product p,tbl_fav f WHERE f.username = m.username AND p.Product_ID = f.Product_ID
                                                                GROUP BY p.ProductName";
                                                                $result2 = $con->query($sql2);

                                                                while($row2 = $result2->fetch_assoc()) {
                                                                echo '<div class="row">';
                                                                echo '    <div class="col-sm-12">';
                                                                echo "        <h6 class='text-muted f-w-400'>".$row2[ProductName]."</h6>";
                                                                echo '    </div>';
                                                                echo '</div>'; }?>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             </div>
                                                </div>
                                            </div>
        </div>           
    </section></form>
    <!-- End of portfolio section -->

	<!-- core  -->
    <script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- bootstrap 3 affix -->
	<script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- Isotope -->
    <script src="assets/vendors/isotope/isotope.pkgd.js"></script>

    <!-- LeadMark js -->
    <script src="assets/js/leadmark.js"></script>