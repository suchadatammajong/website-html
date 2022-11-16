<?php

session_start();
require_once "functions.php";

if (isset($_POST['submit'])) {
  $cname = $_POST['cname'];
  $sname = $_POST['sname'];
  $address = $_POST['address'];
  $tel = $_POST['tel'];
                  $stmt = $conn->prepare("INSERT INTO tbl_customer(cname, sname, address, tel) VALUES(:cname, :sname, :address, :tel)");
                  $stmt->bindParam(":cname", $cname, PDO::PARAM_STR);
                  $stmt->bindParam(":sname", $sname, PDO::PARAM_STR);
                  $stmt->bindParam(":address", $address, PDO::PARAM_STR);
                  $stmt->bindParam(":tel", $tel, PDO::PARAM_STR);
                  $result = $stmt->execute();

                    if ($result) {
                        $_SESSION['success'] = "ใส่ข้อมูลเรียบร้อยแล้ว";
                        header("location: customer.php");
                    } else {
                        $_SESSION['error'] = "ใส่ข้อมูลไม่สำเร็จ";
                        header("location: customer.php");
                      }
                    }
?>
