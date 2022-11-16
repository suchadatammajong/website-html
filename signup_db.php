<?php 

    session_start();

    require_once 'config/db.php';
        if (isset($_POST['signup'])) {
        $mname = $_POST['mname'];
        $sname = $_POST['sname'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $address = $_POST['Address'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];
        $role = '0';

        if (empty($mname)) {
            $_SESSION['error'] = 'กรุณากรอกชื่อ';
            header("location: signup.php");
        } else if (empty($sname)) {
            $_SESSION['error'] = 'กรุณากรอกนามสกุล';
            header("location: signup.php");
        } 
         else if (empty($tel)) {
        $_SESSION['error'] = 'กรุณากรอกเบอร์โทร';
        header("location: signup.php");
        }
        else if (empty($address)) {
            $_SESSION['error'] = 'กรุณากรอกที่อยู่';
            header("location: signup.php");
            }
            else if (empty($username)) {
                $_SESSION['error'] = 'กรุณากรอก username';
                header("location: signup.php");
                }
    else if (empty($email)) {
            $_SESSION['error'] = 'กรุณากรอกอีเมล';
            header("location: signup.php");
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = 'รูปแบบอีเมลไม่ถูกต้อง';
            header("location: signup.php");
        } else if (empty($password)) {
            $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
            header("location: signup.php");
        } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
            $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร';
            header("location: signup.php");
        } else if (empty($c_password)) {
            $_SESSION['error'] = 'กรุณายืนยันรหัสผ่าน';
            header("location: signup.php");
        } else if ($password != $c_password) {
            $_SESSION['error'] = 'รหัสผ่านไม่ตรงกัน';
            header("location: signup.php");
        } else {
            try {

                $check_email = $conn->prepare("SELECT username FROM member WHERE username = :username");
                $check_email->bindParam(":username", $username);
                $check_email->execute();
                $row = $check_email->fetch(PDO::FETCH_ASSOC);

                if ($row['username'] == $username) {
                    $_SESSION['warning'] = "มี username อยู่ในระบบแล้ว <a href='login.php'>คลิ๊กที่นี่</a> เพื่อเข้าสู่ระบบ";
                    header("location: signup.php");
                } else if (!isset($_SESSION['error'])) {
                    $stmt = $conn->prepare("INSERT INTO member(mname, sname, email, tel,address,username,password, role) 
                                            VALUES(:mname, :sname, :email,:tel,:address,:username, :password, :role)");
                    $stmt->bindParam(":mname", $mname);
                    $stmt->bindParam(":sname", $sname);
                    $stmt->bindParam(":email", $email);
                    $stmt->bindParam(":tel", $tel);
                    $stmt->bindParam(":address", $address);
                    $stmt->bindParam(":username", $username);
                    $stmt->bindParam(":password", $password);
                    $stmt->bindParam(":role", $role);
                    $stmt->execute();
                    $_SESSION['success'] = "สมัครสมาชิกเรียบร้อยแล้ว! <a href='login.php' class='alert-link'>คลิ๊กที่นี่</a> เพื่อเข้าสู่ระบบ";
                    header("location: signup.php");
                } else {
                    $_SESSION['error'] = "มีบางอย่างผิดพลาด";
                    header("location: signup.php");
                }

            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }


?>