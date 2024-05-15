<?php
include "../db_conn.php";
$id = $_GET["id"];

$F_NAME = '';
$L_NAME = '';
$POSITION = '';

if (isset($_POST["submit"])) {
  $id = $_GET["id"];
  $F_NAME = $_POST['F_NAME'];
  $L_NAME = $_POST['L_NAME'];
  $POSITION = $_POST['POSITION'];

  $check_sql = "SELECT * FROM EMPLOYEE WHERE F_NAME = '$F_NAME' AND L_NAME = '$L_NAME' AND POSITION = '$POSITION' AND EMPLOYEE_ID != '$id'";
  $check_result = mysqli_query($conn, $check_sql);

  if (mysqli_num_rows($check_result) > 0) {
      header("Location: ../index.php?employee_msg=Employee already exists");
      exit();
  } else {
      $update_sql = "UPDATE EMPLOYEE SET F_NAME = '$F_NAME', L_NAME = '$L_NAME', POSITION = '$POSITION' WHERE EMPLOYEE_ID = '$id'";
      $update_result = mysqli_query($conn, $update_sql);

      if ($update_result) {
          header("Location: ../index.php?employee_msg=Employee record updated successfully");
          exit();
      } else {
          echo "Failed to update record: " . mysqli_error($conn);
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

  <title>Big Brew CRUD Application - Edit Employee</title>
</head>

<body>
  <nav class="navbar navbar-light; justify-content-center fs-3 mb-5" style="background-color: #39393f">
    <img src="../images/logo.png" width=150 height=130><p style="color: white; margin-left: 10px">Big Brew CRUD Application EMPLOYEE</p>
  </nav>

  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit Employee Information</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>

    <?php
    $sql = "SELECT * FROM EMPLOYEE WHERE EMPLOYEE_ID = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">First Name:</label>
            <input type="text" class="form-control" name="F_NAME" value="<?php echo $row['F_NAME'] ?>">
          </div>

          <div class="col">
            <label class="form-label">Last Name:</label>
            <input type="text" class="form-control" name="L_NAME" value="<?php echo $row['L_NAME'] ?>">
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Position:</label>
          <input type="text" class="form-control" name="POSITION" value="<?php echo $row['POSITION'] ?>">
        </div>

        <div>
          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="../index.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>