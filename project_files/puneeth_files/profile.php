
<?php
// include "config/config.php";
// session_start();

// if (!isset($_SESSION['user'])) {
// 	session_destroy();
//   header("location: signup.php");
//   die();
// }
?>


<!DOCTYPE html>
<title>Profile Page</title>
<style>
    body {
    background: #67B26F;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #4ca2cd, #67B26F);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #4ca2cd, #67B26F); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    padding: 0;
    margin: 0;
    font-family: 'Lato', sans-serif;
    color: #000;
}

.student-profile .card {
    border-radius: 10px;
}

.student-profile .card .card-header .profile_img {
    width: 150px;
    height: 150px;
    object-fit: cover;
    margin: 10px auto;
    border: 10px solid #ccc;
    border-radius: 50%;
}

.student-profile .card h3 {
    font-size: 20px;
    font-weight: 700;
}

.student-profile .card p {
    font-size: 16px;
    color: #000;
}

.student-profile .table th,
.student-profile .table td {
    font-size: 14px;
    padding: 5px 10px;
    color: #000;
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Student Profile Page Design Example</title>

    <meta name="author" content="Codeconvey" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet"><link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>

    <!--Only for demo purpose - no need to add.-->
    <link rel="stylesheet" href="css/demo.css" />
    
	    <link rel="stylesheet" href="css/style.css">
</head>
<body>
		

<header class="ScriptHeader">
    <div class="rt-container" style="margin-left:30px;margin-top:20px;">
    	<div class="col-rt-12">
        	<div class="rt-heading">
            	<h1>Profile Page</h1>
            </div>
        </div>
    </div>
</header>

<section>
    <div class="rt-container">
          <div class="col-rt-12">
              <div class="Scriptcontent">
              
<!-- Student Profile -->
<div class="student-profile py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
            <img class="profile_img" src="https://source.unsplash.com/600x300/?student" alt="student dp">
            <h3><?php
        print($_SESSION['user']["first_name"]); ?> <?php
        print($_SESSION['user']["last_name"]); ?></h3>
          </div>
          <div class="card-body">
            <p class="mb-0"><strong class="pr-1">Date of Birth:</strong>321000001</p>
            <p class="mb-0"><strong class="pr-1">Employee ID:</strong><?php
        print($_SESSION['user']["id"]); ?></p>
            <p class="mb-0"><strong class="pr-1">Email ID:</strong><?php
        print($_SESSION['user']["email"]); ?></p>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
          </div>
          <div class="card-body pt-0">
            <table class="table table-bordered">
              <tr>
                <th width="30%">Address </th>
                <td width="2%">:</td>
                <td>asdsasdas</td>
              </tr>
              <tr>
                <th width="30%">City </th>
                <td width="2%">:</td>
                <td>asdad dsa</td>
              </tr>
              <tr>
                <th width="30%">Street</th>
                <td width="2%">:</td>
                <td>Maasdsfdafale</td>
              </tr>
              <tr>
                <th width="30%">State</th>
                <td width="2%">:</td>
                <td>afdsasd</td>
              </tr>
              <tr>
                <th width="30%">Country</th>
                <td width="2%">:</td>
                <td>asfadass</td>
              </tr>
              <tr>
                <th width="30%">Zip Code</th>
                <td width="2%">:</td>
                <td>afsfass</td>
              </tr>
            </table>
          </div>
        </div>
          <div style="height: 26px"></div>
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Other Information</h3>
          </div>
          <div class="card-body pt-0">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- partial -->
           
    		</div>
		</div>
    </div>
</section>
     


    <!-- Analytics -->

	</body>
</html>