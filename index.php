<?php
include "db_conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Big Brew CRUD Application</title>
</head>

<body>
  <nav class="navbar navbar-light; justify-content-center fs-3 mb-5" style="background-color: #39393f">
    <img src="images/logo.png" width=150 height=130><p style="color: white; margin-left: 10px">Big Brew CRUD Application</p>
  </nav>

  <div class="container">
    <?php
    if (isset($_GET["employee_msg"])) {
      $msg = $_GET["employee_msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <a href="EMPLOYEE/add-new-employee.php" class="btn btn-dark mb-3">Add New</a>

    <table class="table table-hover text-center">
      <thead class="table-dark">
        <tr>
          <th scope="col">Employee ID</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Position</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM EMPLOYEE";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row["EMPLOYEE_ID"] ?></td>
            <td><?php echo $row["F_NAME"] ?></td>
            <td><?php echo $row["L_NAME"] ?></td>
            <td><?php echo $row["POSITION"] ?></td>
            <td>
              <a href="EMPLOYEE/edit-employee.php?id=<?php echo $row["EMPLOYEE_ID"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
              <a href="EMPLOYEE/delete-employee.php?id=<?php echo $row["EMPLOYEE_ID"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>

  <br>
  <div class="container">
    <?php
    if (isset($_GET["store_msg"])) {
      $msg = $_GET["store_msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <a href="STORE LOCATION/add-new-store_location.php" class="btn btn-dark mb-3">Add New</a>

    <table class="table table-hover text-center">
      <thead class="table-dark">
        <tr>
          <th scope="col">Store ID</th>
          <th scope="col">Location Name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM STORE_LOCATION";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row["STORE_ID"] ?></td>
            <td><?php echo $row["LOC_NAME"] ?></td>
            <td>
              <a href="STORE LOCATION/edit-store_location.php?id=<?php echo $row["STORE_ID"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
              <a href="STORE LOCATION/delete-store_location.php?id=<?php echo $row["STORE_ID"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
   
  <br>
  <div class="container">
    <?php
    if (isset($_GET["inventory_item_msg"])) {
      $msg = $_GET["inventory_item_msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <a href="INVENTORY ITEM/add-new-inventory_item.php" class="btn btn-dark mb-3">Add New</a>

    <table class="table table-hover text-center">
      <thead class="table-dark">
        <tr>
          <th scope="col">Item ID</th>
          <th scope="col">Item Name</th>
          <th scope="col">Unit</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM INVENTORY_ITEM";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row["ITEM_ID"] ?></td>
            <td><?php echo $row["ITEM_NAME"] ?></td>
            <td><?php echo $row["UNIT"] ?></td>
            <td>
              <a href="INVENTORY ITEM/edit-inventory_item.php?id=<?php echo $row["ITEM_ID"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
              <a href="INVENTORY ITEM/delete-inventory_item.php?id=<?php echo $row["ITEM_ID"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>

  <br>
  <div class="container">
    <?php
    if (isset($_GET["inventory_msg"])) {
      $msg = $_GET["inventory_msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <a href="INVENTORY/add-new-inventory.php" class="btn btn-dark mb-3">Add New</a>

    <table class="table table-hover text-center">
      <thead class="table-dark">
        <tr>
          <th scope="col">Inventory ID</th>
          <th scope="col">Store ID</th>
          <th scope="col">Item ID</th>
          <th scope="col">Date</th>
          <th scope="col">Quantity</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM INVENTORY";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row["INVENTORY_ID"] ?></td>
            <td><?php echo $row["STORE_ID"] ?></td>
            <td><?php echo $row["ITEM_ID"] ?></td>
            <td><?php echo $row["DATE"] ?></td>
            <td><?php echo $row["QUANTITY"] ?></td>
            <td>
              <a href="INVENTORY/edit-inventory.php?id=<?php echo $row["INVENTORY_ID"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
              <a href="INVENTORY/delete-inventory.php?id=<?php echo $row["INVENTORY_ID"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>

  <br>
  <div class="container">
    <?php
    if (isset($_GET["transaction_msg"])) {
      $msg = $_GET["transaction_msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <a href="TRANSACTION/add-new-transaction.php" class="btn btn-dark mb-3">Add New</a>

    <table class="table table-hover text-center">
      <thead class="table-dark">
        <tr>
          <th scope="col">Transaction ID</th>
          <th scope="col">Issued Quantity</th>
          <th scope="col">Sold Quantity</th>
          <th scope="col">Damaged Quantity</th>
          <th scope="col">Discrepancy</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM TRANSACTION";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row["TRANSACTION_ID"] ?></td>
            <td><?php echo $row["ISSUED_QTY"] ?></td>
            <td><?php echo $row["SOLD_QTY"] ?></td>
            <td><?php echo $row["DAMAGED_QTY"] ?></td>
            <td><?php echo $row["DISCREPANCY"] ?></td>
            <td>
              <a href="TRANSACTION/edit-transaction.php?id=<?php echo $row["TRANSACTION_ID"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
              <a href="TRANSACTION/delete-transaction.php?id=<?php echo $row["TRANSACTION_ID"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>