<?php
    include ("db_connection.php");
    session_start();

    $uid=$_POST['uid'];
    $pwd=$_POST['pwd'];


  
    

  $student_check ="SELECT * FROM Student_tab WHERE Stu_name='$uid' AND Stu_id='$pwd'";
  $student_result =$connect->query($student_check);

  while ($row_product = $student_result->fetch_assoc())
  {
    if ($row_product['Stu_name'] == $uid AND $row_product['Stu_id'] == $pwd)
    {
      print "valid student credentials.";	
      $_SESSION['uid']=$uid;
      $_SESSION['pwd']=$pwd;
      $_SESSION['role'] = "student";

      
      header("Location: Student.php");
      exit();
    }

    else{
      echo ("Invalid credentials, you are not allowed in.");
      exit();
    }	
	
  }


  $Faculty_check ="SELECT * FROM Faculty_tab WHERE Fac_name='$uid' AND Fac_id='$pwd'";
  $Faculty_result =$connect->query($Faculty_check);

  while ($row_product = $Faculty_result->fetch_assoc())
 
    if ($row_product['Fac_name'] == $uid AND $row_product['Fac_id'] == $pwd)
    {
      print "valid student credentials.";	
      $_SESSION['uid']=$uid;
      $_SESSION['pwd']=$pwd;
      $_SESSION['role'] = "Faculty";

      
      header("Location: Faculty.php");
      exit();
    }

    else{
      echo ("Invalid credentials, you are not allowed in.");
      exit();
    }	
	
  }


  $Admin_check ="SELECT * FROM Student_tab WHERE Stu_name='$uid' AND Stu_id='$pwd' AND role=' OR '";
  $Admin_result =$connect->query($Admin_check);

  while ($row_product = $Admin_result->fetch_assoc())
  {
    if ($row_product['Stu_name'] == $uid AND $row_product['Stu_id'] == $pwd)
    {
      print "valid student credentials.";	
      $_SESSION['uid']=$uid;
      $_SESSION['pwd']=$pwd;
      $_SESSION['role'] = "student";

      
      header("Location: Student.php");
      exit();
    }

    else{
      echo ("Invalid credentials, you are not allowed in.");
      exit();
    }	
	
  }






///      if($userid != "cologne")// in the case username does not exist in tab
///        echo "Invalid Credentials. Would you like to try again?";
///      elseif($password != //cologne[password]) in the case password does not match user
///        echo "Invalid Credentials. Would you like to try again?";
///      else// in the case password matches the user
///        echo "Valid Credentials! Thank you for logging in.";


?>