<!DOCTYPE html>


<?php session_start(); 
  include ("db_connection.php");
  ?>


  <head>

  <title>lab5_signin</title>

  <style>

  body {
    background-image: url('chapel.jpeg');
    background-repeat: no-repeat;
    background-size: cover;
 
  }


  .behindlogin{
  width: 35%;
  height: 100%;
  opacity: 1;
  position: absolute;
  }


  .login-div{
  font-family: proxima nova;
  font-size: 30px;
  width: 40%;
  height: 100%;
  color: #ffffff;
  background-image: linear-gradient( rgba(0,55,103,0.25), rgba(0,55,103,1));
  margin: 0px;
  position: absolute;
  top: 0px;
  left: 0px;
  }

  .caption{
  font-family: monospace;
  font-size: 15px;



  }
  </style>
  </head>


  <body>
  <div class="behindlogin"></div>

  <div id="loginForm" class = "login-div" >
  <center>
  <h1>Education Management System</h1>
  <text class="caption">please sign in</text><br><br>
  <form name="login-form" method="POST" action="validate-login.php">
    Username: <input type="text" name="uid" id="uid" /><br><br>
    Password: <input type="text" name="pwd" id="pwd" /><br><br>

    <input type="submit" value="login" />
    <input type="submit" value="reset" />
  </form>
  </center>


  </div>




  </body>


</html>