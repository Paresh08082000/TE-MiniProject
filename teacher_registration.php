<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="Registration.css">
  <title>Registration</title>
</head>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $branch = $_POST['Branch'];
        $post = $_POST['Post'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $address = $_POST['address'];


      // Connecting to the Database
      $servername = "localhost:3308";
      $username = "root";
      $password = "";
      $database = "teachers";

      // Create a connection
      $conn = mysqli_connect($servername, $username, $password, $database);
      // Die if connection was not successful
      if (!$conn){
          die("Sorry we failed to connect: ". mysqli_connect_error());
      }
      else{
        // Submit these to a database
        // Sql query to be executed
        $sql = "INSERT INTO `teacher` ( `fName`, `lName`, `branch` , `post` , `gender` , `email` , `mobile` , `address`) VALUES ('$fName', '$lName', '$branch', '$post', '$gender', '$email', '$mobile', '$address')";
        $result = mysqli_query($conn, $sql);

        if($result){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Your entry has been submitted successfully!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        }
        else{
            echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        }

      }

    }


?>

<body>
<img class="bg" src="bg.jpg" alt="background_img">
  <div class="wrapper">
    <div class="title">
      Registration Form
    </div>

    <form class="" action="teacher_registration.php" method="post">
      <div class="form">
        <div class="inputfield">
          <label>First Name</label>
          <input type="text" name="fName" class="input" required>
        </div>
        <div class="inputfield">
          <label>Last Name</label>
          <input type="text" name="lName" class="input" required>
        </div>
        <div class="inputfield">
          <label>Branch: </label>
          <div class="custom_select">
            <select class="input-field" id="Branch" name="Branch" required>
              <option value="">Select</option>
              <option value="Computer">Computer</option>
              <option value="Information Technology">Information Technology</option>
              <option value="Entc">Entc</option>
              <option value="Mechanical">Mechanical</option>
              <option value="Civil">Civil</option>
              <option value="Civil">None</option>
            </select>
          </div>
        </div>
        <div class="inputfield">
          <label>Post: </label>
          <div class="custom_select">
            <select class="input-field" id="Branch" name="Post" required>
              <option value="">Select</option>
              <option value="Head of Department">Head of Department</option>
              <option value="Professor">Professor</option>
              <option value="Assistant Professor">Assistant Professor</option>
            </select>
          </div>
        </div>
        <div class="inputfield">
          <label>Gender</label>
          <div class="custom_select"  required>
            <select name="gender">
              <option value="">Select</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
          </div>
        </div>
        <div class="inputfield"  required>
          <label>Email Address</label>
          <input type="email"name="email" class="input">
        </div>
        <div class="inputfield">
          <label>Mobile Number</label>
          <input type="number" class="input" name="mobile" required>
        </div>
        <div class="inputfield">
          <label>Address</label>
          <textarea class="textarea" name="address" required></textarea>
        </div>
        <div class="inputfield">
          <input type="submit" value="Register" class="btn">
        </div>
        <div class="inputfield">
          <input type="button" value="Go Back" onclick="history.back()" class="btn">
        </div>
    </form>

  </div>

</body>

</html>
