<?php
include "../db_conn.php";
$id = $_GET["id"];

$LOC_NAME = '';

if (isset($_POST["submit"])) {
  $id = $_GET["id"]; 
  $LOC_NAME = $_POST['LOC_NAME'];

  $check_sql = "SELECT * FROM STORE_LOCATION WHERE LOC_NAME = '$LOC_NAME' AND STORE_ID != '$id'";
  $check_result = mysqli_query($conn, $check_sql);

  if (mysqli_num_rows($check_result) > 0) {
      header("Location: ../index.php?store_msg=Store Location already exists");
      exit();
  } else {
      $update_sql = "UPDATE STORE_LOCATION SET LOC_NAME = '$LOC_NAME' WHERE STORE_ID = '$id'";
      $update_result = mysqli_query($conn, $update_sql);

      if ($update_result) {
          header("Location: ../index.php?store_msg=Store Location record updated successfully");
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
    <img src="../images/logo.png" width=150 height=130><p style="color: white; margin-left: 10px">Big Brew CRUD Application (Store Location)</p>
  </nav>

  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit Store Location</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>

    <?php
    $sql = "SELECT * FROM STORE_LOCATION WHERE STORE_ID = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        
        <div class="mb-3">
          <label class="form-label">Location Name:</label>
          <input type="text" class="form-control" name="LOC_NAME" value="<?php echo $row['LOC_NAME'] ?>">
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