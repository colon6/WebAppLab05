<!DOCTYPE html>


<?php session_start(); 
  include ("../db_connection.php");
 
  
  if(($_SESSION['role'] !="faculty"))
  {
	  echo "You are not allowed to access this page. You are now signed out. <a href='login.php'>Login Again</a>";
	  session_destroy();
	  header('Location: login.php');
  }
  else{
  $uid = $_SESSION['uid'];
  
  $faculty_check = "SELECT * FROM Faculty_tab WHERE Fac_id = '$uid'";
  $faculty_result= $connect->query($faculty_check);

  while($row_product = $faculty_result->fetch_assoc())
  {
	$sid = $row_product["SID"];
	$Fac_id = $row_product["Fac_id"];
	$Fac_name = $row_product["Fac_name"];
	$Fac_DOJ = $row_product["Fac_DOJ"];
	$qualification = $row_product["qualification"];
	$department = $row_product["department"];
  }

  
  $courses_check = "SELECT * FROM Courses_tab WHERE Fac_id = '$Fac_id'";
  $courses_result= $connect->query($courses_check);
  




  }
  ?>




<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Studentpage</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="../https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="../https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="../https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <span class="d-block d-lg-none"><?php echo $Fac_name; ?></span>
                <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="assets/img/profile.jpg" alt="..." /></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">Personal Details</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#experience">Courses</a></li>
                </ul>
            </div>
        </nav>
        <!-- Page Content-->
        <div class="container-fluid p-0">
            <!-- About-->
            <section class="resume-section" id="about">
                <div class="resume-section-content">
                    <h1 class="mb-0">
                        <?php echo $Fac_name; ?>
                        <span class="text-primary"></span>
                    </h1>
                    <div class="subheading mb-5">
                        <?php echo $Fac_id; ?> · <?php echo $department; ?> · <?php echo $qualification; ?> · DOJ: <?php echo $Fac_DOJ; ?>
                        
                    </div>
                    <p class="lead mb-5"></p>

                </div>
            </section>
            <hr class="m-0" />
            <!-- Experience-->
            <section class="resume-section" id="experience">
                <div class="resume-section-content">
                    <h2 class="mb-5">Courses You Teach</h2>
					<table>
					<tr>
					<?php while( $row_product = $courses_result->fetch_assoc()) { ?>
					
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">	
                        <div class="flex-grow-1">
                            <h3 class="mb-0"><?php echo $row_product["Course_name"]; ?></h3>
                            <div class="subheading mb-3">Faculty ID: <?php echo $row_product["Fac_id"]; ?></div>
                            <p>Offered in: <?php echo $row_product["Offered_in"]; ?><br>
							   Credits: <?php echo $row_product["credits"]; ?><br>
							   Pre_req: <?php echo $row_product["pre_req"]; ?><br>
							   Type: <?php echo $row_product["type"]; ?><br>
							</p>
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary">Course ID: <?php echo $row_product["Course_id"]; ?></span></div>
						
                    </div>
					
					<?php } ?>
					</table>

                </div>
            </section>
            <hr class="m-0" />
            <!-- Education-->
            
            <hr class="m-0" />
            
        </div>
        <!-- Bootstrap core JS-->
        <script src="../https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>
    </body>
</html>
