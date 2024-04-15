<?php
    include ("db_connection.php");
    session_start();

    $uid=$_POST['uid'];
    $pwd=$_POST['pwd'];


  
    

  $authentication_check ="SELECT * FROM users_tab WHERE userid='$uid' AND password='$pwd'";
  $authentication_result =$connect->query($authentication_check);

  while ($row_product = $authentication_result->fetch_assoc())
  {
    if ($row_product['userid'] == $uid AND $row_product['password'] == $pwd)
    {
      print "valid student credentials.";	
      $_SESSION['uid']=$uid;
      $_SESSION['pwd']=$pwd;

      if ($row_product['role'] == "student")
      {
      $_SESSION['role'] = "student";
      header('Location: Student/index.php');
      exit();
      }
      if ($row_product['role'] == "faculty")
      {
      $_SESSION['role'] = "faculty";
      header("Location: Faculty/index.php");
      exit();
      }
      if ($row_product['role'] == "admin")
      {
      $_SESSION['role'] = "admin";
      header("Location: Admin/index.php");
      exit();
      }
    }

    else{
      echo ("Invalid credentials, you are not allowed in.");
      exit();
    }	
	
  }



?>