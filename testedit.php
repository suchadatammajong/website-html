
<?php
session_start();

$hostname_surachet = "localhost";
$database_surachet = "surache1_room1g2";
$username_surachet = "surache1_room1g2";
$password_surachet = "ZPN25472";
$surachet = mysql_pconnect($hostname_surachet, $username_surachet, $password_surachet) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_surachet, $surachet);

$Product_ID=$_GET['Product_ID'];


if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["EditStudent"] == "Yes") {

  $Product_ID=$_POST['Product_ID'];
  $ProductName=$_POST['ProductName'];
  $ProductDetail=$_POST['ProductDetail'];
  $ProductPrice=$_POST['ProductPrice'];
  $ProductTypeID=$_POST['ProductTypeID'];


  $file=$_POST['file'];

  $locate_img ="img/";

// Insert File
    
$filenames = $_FILES["file"]["name"];
    
$allowedExts = array("doc", "docx", "pdf", "gif", "jpeg", "jpg", "png","xls","xlsx");
$extension = end(explode(".", $_FILES["file"]["name"]));
if (($_FILES["file"]["type"] == "application/pdf")
|| ($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "application/msword")
|| ($_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "application/vnd.ms-excel")
|| ($_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
&& in_array($extension, $allowedExts))

  {
  if ($_FILES["file"]["error"] > 0)
  {
  echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
  }
  else
  {

  if (file_exists($locate_img . $_FILES["file"]["name"]))

    {
    echo $_FILES["file"]["name"] . " already exists. ";

    }

  else
    {
    move_uploaded_file($_FILES["file"]["tmp_name"],$locate_img.$_FILES["file"]["name"]);
      

    echo "Stored in: " . $locate_img . $_FILES["file"]["name"];

    }

   }
   }
  else
  {
  echo "Invalid file";
   }

// End Insert File

$sql=" UPDATE tbl_Product SET  ProductName='$ProductName',ProductDetail='$ProductDetail',ProductPrice ='$ProductPrice',ProductTypeID ='$ProductTypeID'
       WHERE Product_ID='$Product_ID'";

$dbquery = mysql_db_query($database_surachet, $sql)or die(mysql_error());

header("location:admin_page.php");

    
    }
    
     ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <style>
        .container {
            max-width: 550px;
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  </head>
  <body>
    <br><br><br>  

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="POST" enctype="multipart/form-data">

    <?php
    $sql_2="SELECT tbl_Product.* FROM tbl_Product WHERE Product_ID='$Product_ID'";
    $qry_2 = mysql_query($sql_2,$surachet) or die(mysql_error());
    $data_2 = mysql_fetch_array($qry_2);
    ?>

<style>
        .container {
            max-width: 550px;
        }
    </style>
<div class="container mt-5">
        <h1>แก้ไขข้อมูลหนังสือ</h1>
           <table align='center'>
            <tr align='center'> <td>
             <? echo "<img src='img/".$data_2[Pic]."' width='100'>";?>
            </tr> </td>
            </table>


            <div class="mb-3">
            <label for="ProductName" class="col-form-label">ชื่อหนังสือ :</label>
            <input type="text" value="<?php echo $data_2['ProductName']; ?>" required class="form-control" name="ProductName" >
            <label for="ProductDetail" class="col-form-label">รายละเอียด :</label>
            <textarea id="freeform" rows="6" cols="50" value="ProductDetail" required class="form-control" name="ProductDetail" ><?php echo $data_2['ProductDetail']; ?></textarea>
            <label for="ProductPrice" class="col-form-label">ราคาหนังสือ :</label>
            <input type="text" value="<?php echo $data_2['ProductPrice']; ?>" required class="form-control" name="ProductPrice" >
            <label for="ProductTypeID" class="col-form-label">ชนิด :</label>
            <input type="radio" value="1" name="ProductTypeID" checked>สารคดี</input>
            <input type="radio" value="2" name="ProductTypeID" >วารสาร</input>
            <input type="radio" value="3" name="ProductTypeID" >นิตยสาร</input>
            <input type="radio" value="4" name="ProductTypeID" >การ์ตูน</input>
            <input type="radio" value="5" name="ProductTypeID" >หนังสือเรียน</input>
            <input type="radio" value="6" name="ProductTypeID" >ตำรา</input>



<br>

<!-- <label for="filePic" class="col-form-label">ภาพหนังสือ :</label>
            <input class="col-form-label" type="file" name="file" id="file" value="<?php echo $data_2['Pic']; ?>"> //
      -->
        </div>

           
            <a href="admin_page.php" class="btn btn-secondary">Go Back</a>
            <input type="hidden" name="Product_ID" value="<?php echo $data_2['Product_ID']; ?>">
            <input type="hidden" name="EditStudent" value="Yes">
            <button type="submit" name="submit" class="btn btn-primary">Edit</button>
</form>
  </body>
</html>
