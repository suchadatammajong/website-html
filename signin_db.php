<?php 
session_start();
        if(isset($_POST['username'])){
				//connection
                  include("conn.php");
				//รับค่า user & password
                  $Username = $_POST['username'];
                  $Password = $_POST['password'];
				//query 
                  $sql="SELECT * FROM member Where username='".$Username."' and password='".$Password."' ";

                  $result = mysqli_query($con,$sql);
				
                  if(mysqli_num_rows($result)==1){

                      $row = mysqli_fetch_array($result);
                      $_SESSION['username'] = $row['username'];
                      $_SESSION["role"] = $row["role"];

                      if($_SESSION["role"]=="1"){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php

                        Header("Location: admin_page.php");
                        

                      }

                      if ($_SESSION["role"]=="0"){  //ถ้าเป็น member ให้กระโดดไปหน้า index.php

                        Header("Location: member_page.php");

                      }

                  }else{
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";

                  }

        }else{


             Header("Location: login.php"); //user & password incorrect back to login again

        }
?>