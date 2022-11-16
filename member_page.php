<?php
session_start(); 

$hostname_surachet = "localhost";
$database_surachet = "surache1_room1g2";
$username_surachet = "surache1_room1g2";
$password_surachet = "ZPN25472";
$surachet = mysql_pconnect($hostname_surachet, $username_surachet, $password_surachet) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_surachet, $surachet);


if($_SESSION['role'] != '0'){
	Header("Location: logout.php");
	exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["Product_ID"] != NULL) {

    $Product_ID=$_POST['Product_ID'];
  // End Insert File

    

  $sql2 = "INSERT INTO tbl_fav (username,Product_ID) 
  VALUES ('{$_SESSION['username']}','$Product_ID')";
  $dbquery = mysql_db_query($database_surachet, $sql2)or die(mysql_error());
  
  header("location:profile.php");
  
      
      }
      
?>
<!DOCTYPE html>
<html lang="en">
<?php include('headermem.php')?>
<?php include('conn.php')?>


    <!-- Page Header -->
    <header class="header">
        <div class="overlay">
            <h1 class="subtitle"> Landing Page</h1>
            <h1 class="title">book lovers club</h1>  
        </div>  
        <div class="shape">
            <svg viewBox="0 0 1500 200">
                <path d="m 0,240 h 1500.4828 v -71.92164 c 0,0 -286.2763,-81.79324 -743.19024,-81.79324 C 300.37862,86.28512 0,168.07836 0,168.07836 Z"/>
            </svg>
        </div>  
        <div class="mouse-icon"><div class="wheel"></div></div>
    </header>
    <!-- End Of Page Header -->

    <!-- Service Section -->
    <section  id="service" class="section pt-0">
        <div class="container">
            <h6 class="section-title text-center">CATEGORY</h6>
            <div class="row">
               
                <!-- carditem1-->
            <div class="col-md-4">
            <div class="card">
            <div class="imgBox">
         <img src="assets/imgs/1.png" alt="mouse corsair" class="mouse">
            </div>
                <div class="contentBox">
                 <h1>สารคดี</h1>
                 <a href="#1" class="buy">VIEW BOOK</a>
                </div>
                </div>
</div>
                  <!-- End carditem1-->
                     <!-- carditem2-->
                     <div class="col-md-4">
            <div class="card">
            <div class="imgBox">
             <img src="assets/imgs/2.png" alt="mouse corsair" class="mouse">
            </div>
                <div class="contentBox">
                 <h1>การ์ตูน</h1>
                 <a href="#2" class="buy">VIEW BOOK</a>
                </div>
                </div>
                            </div>

                  <!-- End carditem2-->
                     <!-- carditem3-->
                     <div class="col-md-4">
            <div class="card">
            <div class="imgBox">
         <img src="assets/imgs/3.png" alt="mouse corsair" class="mouse">
            </div>
                <div class="contentBox">
                 <h1>หนังสือเรียน</h1>
                 <a href="#3" class="buy">VIEW BOOK</a>
                </div>
                </div>
                </div>

                  <!-- End carditem3-->
            </div>
        </div>
    </section>
    <!-- End OF Service Section -->

    <br><h2 class="section-title text-center" id="1">สารคดี</h2><br>
    

<!-- card-->
<div class="center">
    <?php
                                $sql = "SELECT * FROM `tbl_Product` WHERE ProductTypeID = 1
                                GROUP BY ProductName";
                                $result = $con->query($sql);

                                while($row = $result->fetch_assoc()) {
                                    echo  '<div class="col-md-3">';
                                    echo  '<div class="property-card">';
                                    echo  '<div class="property-image">';
                                    echo  '<div class="property-image-title">';
                                    echo  '<form action='.htmlspecialchars($_SERVER["PHP_SELF"]).'  method="POST" enctype="multipart/form-data">';
                                    echo  "<img src='img/".$row[Pic]."' width='150px' align='center'>";
                                    echo  '</div>';
                                    echo  '</div></a>';
                                    echo  '<div class="property-description">';
                                    echo  "<h5>".$row[ProductName]."</h5>";
                                    echo  "<p>".$row[ProductDetail]."</p>";
                                    echo  '</div>';
                                    echo  '<a2 href="#">';
                                    echo  '<div class="property-social-icons">';
                                    echo  "<button type='submit' name='Product_ID' value='".$row[Product_ID]."'>เพิ่มลงรายการโปรด</button>";
                                    echo  '</div>';
                                    echo  '</a2>';
                                    echo  '</div>';
                                    echo  '</div>';
                                  
                                }?></form>
<!-- end card -->
</div>

<br><h2 class="section-title text-center" id="2">การ์ตูน</h2><br>
    

    <!-- card-->
    <div class="center">
        <?php
                                    $sql = "SELECT * FROM `tbl_Product` WHERE ProductTypeID = 4
                                    GROUP BY ProductName";
                                    $result = $con->query($sql);
    
                                    while($row = $result->fetch_assoc()) {
                                        echo  '<div class="col-md-3">';
                                        echo  '<div class="property-card">';
                                        echo  '<div class="property-image">';
                                        echo  '<div class="property-image-title">';
                                        echo  '<form action='.htmlspecialchars($_SERVER["PHP_SELF"]).'  method="POST" enctype="multipart/form-data">';
                                        echo  "<img src='img/".$row[Pic]."' width='150px' align='center'>";
                                        echo  '</div>';
                                        echo  '</div></a>';
                                        echo  '<div class="property-description">';
                                        echo  "<h5>".$row[ProductName]."</h5>";
                                        echo  "<p>".$row[ProductDetail]."</p>";
                                        echo  '</div>';
                                        echo  '<a2 href="#">';
                                        echo  '<div class="property-social-icons">';
                                        echo  "<button type='submit' name='Product_ID' value='".$row[Product_ID]."'>เพิ่มลงรายการโปรด</button>";
                                        echo  '</div>';
                                        echo  '</a2>';
                                        echo  '</div>';
                                        echo  '</div>';
                                      
                                    }?></form>
    <!-- end card -->
    </div>

    
    <br><h2 class="section-title text-center" id="3">หนังสือเรียน</h2><br>
    

<!-- card-->
<div class="center">
    <?php
                                $sql = "SELECT * FROM `tbl_Product` WHERE ProductTypeID = 5
                                GROUP BY ProductName";
                                $result = $con->query($sql);

                                while($row = $result->fetch_assoc()) {
                                    echo  '<div class="col-md-3">';
                                    echo  '<div class="property-card">';
                                    echo  '<div class="property-image">';
                                    echo  '<div class="property-image-title">';
                                    echo  '<form action='.htmlspecialchars($_SERVER["PHP_SELF"]).'  method="POST" enctype="multipart/form-data">';
                                    echo  "<img src='img/".$row[Pic]."' width='150px' align='center'>";
                                    echo  '</div>';
                                    echo  '</div></a>';
                                    echo  '<div class="property-description">';
                                    echo  "<h5>".$row[ProductName]."</h5>";
                                    echo  "<p>".$row[ProductDetail]."</p>";
                                    echo  '</div>';
                                    echo  '<a2 href="#">';
                                    echo  '<div class="property-social-icons">';
                                    echo  "<button type='submit' name='Product_ID' value='".$row[Product_ID]."'>เพิ่มลงรายการโปรด</button>";
                                    echo  '</div>';
                                    echo  '</a2>';
                                    echo  '</div>';
                                    echo  '</div>';
                                  
                                }?></form>
<!-- end card -->
</div>
	<!-- core  -->
    <script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- bootstrap 3 affix -->
	<script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- Isotope -->
    <script src="assets/vendors/isotope/isotope.pkgd.js"></script>

    <!-- LeadMark js -->
    <script src="assets/js/leadmark.js"></script>
    
</body>
</html>
