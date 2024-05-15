<?php
include "../db_conn.php";

$sql_reset_auto_increment = "ALTER TABLE EMPLOYEE AUTO_INCREMENT = 1";
mysqli_query($conn, $sql_reset_auto_increment);

if (isset($_POST["submit"])) {
   $F_NAME = $_POST['F_NAME'];
   $L_NAME = $_POST['L_NAME'];
   $POSITION = $_POST['POSITION']; 

   $check_sql = "SELECT * FROM EMPLOYEE WHERE F_NAME = '$F_NAME' AND L_NAME = '$L_NAME' AND POSITION = '$POSITION'";
   $check_result = mysqli_query($conn, $check_sql);

   if (mysqli_num_rows($check_result) > 0) {
      header("Location: ../index.php?employee_msg=Employee already exists");
      exit();
   } else {
      $sql = "INSERT INTO EMPLOYEE (`EMPLOYEE_ID`, `F_NAME`, `L_NAME`, `POSITION`) VALUES (NULL,'$F_NAME', '$L_NAME', '$POSITION')";
      $result = mysqli_query($conn, $sql);

      if ($result) {
         header("Location: ../index.php?employee_msg=New Employee record created successfully");
         exit();
      } else {
         echo "Failed: " . mysqli_error($conn);
      }
   }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <title>Big Brew CRUD Application - Add Employee</title>
</head>

<body>
   <nav class="navbar navbar-light; justify-content-center fs-3 mb-5" style="background-color: #39393f">
    <img src="../images/logo.png" width=150 height=130><p style="color: white; margin-left: 10px">Big Brew CRUD Application (Employee)</p>
  </nav>

   <div class="container">
      <div class="text-center mb-4">
         <h3>Add New Employee</h3>
         <p class="text-muted">Complete the form below to add a new employee</p>
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">First Name:</label>
                  <input type="text" class="form-control" name="F_NAME" placeholder="Juan">
               </div>

               <div class="col">
                  <label class="form-label">Last Name:</label>
                  <input type="text" class="form-control" name="L_NAME" placeholder="Dela Cruz">
               </div>
            </div>

            <div class="mb-3">
               <label class="form-label">Position:</label>
               <input type="text" class="form-control" name="POSITION" placeholder="Barista">
            </div>


            <div>
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="../index.php" class="btn btn-danger">Cancel</a>
            </div>
         </form>
      </div>
   </div>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>