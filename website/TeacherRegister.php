<?php
require_once ("../config/setup.php");
require_once ("../models/Accounts.php");
require_once ("../models/Courses.php");
require_once ("../models/Enrollment.php");
require_once ("../models/Students.php");
require_once ("../models/Teachers.php");
require_once ("../models/Teaches.php");
require_once ("../models/Utils.php");
$arr = [];
if (isset($_POST["register"])) {
  $arr = Utils::validateStudentFields([
    $_POST["userName"],
    $_POST["name"],
    $_POST["password"],
    $_POST["address"],
  ]);
  $userName = $_POST["userName"];
  $name = $_POST["name"];
  $password = $_POST["password"];
  $address = $_POST["address"];
  if (empty($arr)) {
    $Account = [$userName, $password];
    Accounts::insert($Account);
    $accountId = intval(Accounts::select(["id"], ["userName" => $userName])[0]["id"]);
    $teachers = [$accountId, $userName, $name, $address];
    Teachers::insert($teachers);
    Enrollment::enroll();
    $_SESSION["id"] = $accountId;
    $_SESSION["userName"] = $userName;
    $_SESSION["type"] = "teacher";
  }
}?>
<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="TeacherRegister.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <title>Kemet Sign Up</title>
</head>

<body>

  <div class="container" width="50" height="50" align="center">
    <div class="head">
      <h2>SignUp</h2>
    </div>
    <div class="body" width="200" height="200">
      <form method="Post">
        <input type="text" name="userName" class="user-name" placeholder="UserName"><br>
        <input type="text" name="name" class="name" placeholder="name"><br>
        <input type="text" name="password" class="password" placeholder="Password"><br>
        <input type="text" name="address" class="address" placeholder="address"><br>

        <div class="dropdown">
          <button>Choose courses<i class="uil uil-angle-down"></i></button>
          
          <div class="content">

          <label>Electronics<input type="checkbox" name="checkbox"/></label>
           
          <label>Math-1 <input type="checkbox" name="checkbox"/> </label>

            <label>Math-0<input type="checkbox"name="checkbox"/></label>

              <label>Human Rights<input type="checkbox"name="checkbox"/></label>

                <label>Technical Report<input type="checkbox"name="checkbox"/></label>

                  <label>Discrete Math<input type="checkbox"name="checkbox"/></label>

                    <label>Programming 1<input type="checkbox"name="checkbox"/></label>

                      <label>Logic Design<input type="checkbox"name="checkbox"/></label>

                        <label>Math-2<input type="checkbox"name="checkbox"/></label>

                          <label>Probability and Statistics 1<input type="checkbox"name="checkbox"/></label>

                            <label>Microeconomics<input type="checkbox"name="checkbox"/></label>

                              <label>Introduction to Network<input type="checkbox"name="checkbox"/></label>

                                <label>Introduction to Database<input type="checkbox"name="checkbox"/></label>

                                  <label>Introduction to Software Engineering<input type="checkbox"name="checkbox"/></label>

                                    <label>Programming 2<input type="checkbox"name="checkbox"/></label>

                                      <label>Math-3<input type="checkbox"name="checkbox"/></label>

                                        <label>Probability and Statistics 2<input type="checkbox"name="checkbox"/></label>

                                          <label>Data Structures<input type="checkbox"name="checkbox"/></label>

                                            <label>Web<input type="checkbox"name="checkbox"/></label>

                                              <label>Machine Learning<input type="checkbox"name="checkbox"/></label>

                                                <label>Introduction to Operation Research<input type="checkbox"name="checkbox"/></label>

            <label>Network Labs<input type="checkbox"name="checkbox"/></label>

              <label>Enterpreneurship<input type="checkbox"name="checkbox"/></label>

          </div>
          
       
            
          
            </div>
          </div>
        </div>
        <div class="invalid-courses hide">Invalid number of courses : Please choose atleast one course </div>
        <input type="submit" name="register" value="Register"><br>
        <a class="font-dark" href="login.php">Login</a>

      </form>
    </div>
    <div class="footer" width="200" height="200">
      <p style="font-size : 10px">Powerd by Kemet University</p>
    </div>
  </div>

</body>

</html>
<script type="module" src="../js/TeacherRegister.js?t=<?= time() ?>"></script>



