<!DOCTYPE html>
<html lang="en">

<head>
    <title>Connecting MySQL Server</title>
    <!-- CSS only --
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
   <!-- JavaScript Bundle with Popper -->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="icon" href="img/favicon/favicon.ico">
    <link rel="stylesheet" href="css/styles.css">
    <meta name="description" content="A free html template with Sketch design made with Bootstrap">
    <meta name="keywords" content="free html template, bootstrap, ui kit, sass" />
    <meta name="author" content="Codrops" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- end favicon links -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/flickity.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>




<style>

    
  
@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
   
}
.form {
  position: relative;
  z-index: 1;
  background: #87A6A2;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background:#374242;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #465656;
}
.form .message {
  margin: 15px 0 0;
  color: black;
  font-size: 12px;
}
.form .message a {
  color: white;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
  
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}

    
</style>
</head>

<body>
    <div class="container-fluid">

        <div class="row">
            <div class="header-nav-wrapper">
                <div class="carousel-cell" style="background-image: url(img/viewcodes.png);">
                    <div class="logo">
                    </div>
                    <div class="primary-nav-wrapper">
                        <nav>
                            <ul class="primary-nav">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="signup.html">Sign Up</a></li>

                            </ul>
                        </nav>

                        <div class="login-page">
                            <p style="font-size: 40px; color: #414a52; text-align: center; text-shadow: 2px 2px #6B7E7F"> View my Code</p>
                            <div class="form">
                                <form method="POST" class="login-form">
                                    <input type="text" placeholder="UserName" name="username" />

                                    <button type="submit" name="submit">Submit</button>


                                </form>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>

<?php
   include_once 'require/conn.php';

   $username = $_POST['username'];

   if(isset($_POST['submit'])) { 
      if (!empty($username)) {
         $sql = "SELECT DATE, CODE FROM teacher_code WHERE USERNAME= '$username'";
         $result = $conn->query($sql);
      if ($result && $result->num_rows) {
      echo "<table class='table table-hover'><tr><th scope='col'>Date</th><th scope='col'>Code</th></tr>";
      // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["DATE"]."</td><td>".$row["CODE"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
   } 
   else{
      echo '<script>alert("Fill all the fields")</script>';
   }
}
?>
                </div>
            </div>
        </div>

    </div>
</body>

</html>