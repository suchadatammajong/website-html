<?php

    session_start();

    require_once "functions.php";

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $cname = $_POST['cname'];
        $sname = $_POST['sname'];
        $address = $_POST['address'];
        $tel = $_POST['tel'];
        $img = $_FILES['img'];

        $img2 = $_POST['img2'];
        $upload = $_FILES['img']['name'];

        if ($upload != '') {
            $allow = array('jpg', 'jpeg', 'png');
            $extension = explode('.', $img['name']);
            $fileActExt = strtolower(end($extension));
            $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number
            $filePath = 'uploads/'.$fileNew;

            if (in_array($fileActExt, $allow)) {
                if ($img['size'] > 0 && $img['error'] == 0) {
                   move_uploaded_file($img['tmp_name'], $filePath);
                }
            }

        } else {
            $fileNew = $img2;
        }

        $sql = $conn->prepare("UPDATE tbl_customer SET cname = :cname, sname = :sname, address = :address, tel = :tel, img = :img WHERE id = :id");
        $sql->bindParam(":id", $id);
        $sql->bindParam(":cname", $cname);
        $sql->bindParam(":sname", $sname);
        $sql->bindParam(":address", $address);
        $sql->bindParam(":tel", $tel);
        $sql->bindParam(":img", $fileNew);
        $sql->execute();

        if ($sql) {
            $_SESSION['success'] = "อัพเดทข้อมูลเรียบร้อยแล้ว
";
            header("location: customer.php");
        } else {
            $_SESSION['error'] = "ข้อมูลอัพเดตไม่สำเร็จ";
            header("location: customer.php");
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        .container {
            max-width: 550px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Data</h1>
        <hr>
        <form action="edit.php" method="post" enctype="multipart/form-data">
            <?php
                if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $stmt = $conn->query("SELECT * FROM tbl_customer WHERE id = $id");
                        $stmt->execute();
                        $data = $stmt->fetch();
                }
            ?>
                <div class="mb-3">
                    <label for="id" class="col-form-label">ID:</label>
                    <input type="text" readonly value="<?php echo $data['id']; ?>" required class="form-control" name="id" >
                    <label for="firstname" class="col-form-label">First Name:</label>
                    <input type="text" value="<?php echo $data['cname']; ?>" required class="form-control" name="cname" >
                    <input type="hidden" value="<?php echo $data['img']; ?>" required class="form-control" name="img2" >
                </div>
                <div class="mb-3">
                    <label for="firstname" class="col-form-label">Last Name:</label>
                    <input type="text" value="<?php echo $data['sname']; ?>" required class="form-control" name="sname">
                </div>
                <div class="mb-3">
                    <label for="firstname" class="col-form-label">Address:</label>
                    <input type="text" value="<?php echo $data['address']; ?>" required class="form-control" name="address">
                </div>
                <div class="mb-3">
                    <label for="firstname" class="col-form-label">Tel:</label>
                    <input type="text" value="<?php echo $data['tel']; ?>" required class="form-control" name="tel">
                </div>
               
                <hr>
                <a href="customer.php" class="btn btn-secondary">Go Back</a>
                <button type="submit" name="update" class="btn btn-primary">Update</button>
            </form>
    </div>

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
