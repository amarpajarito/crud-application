<?php
include "../db_conn.php";
$id = $_GET["id"];

$STORE_ID = '';
$ITEM_ID = '';
$DATE = '';
$QUANTITY = '';

if (isset($_POST["submit"])) {
   $id = $_GET["id"]; 
   $STORE_ID = $_POST['STORE_ID'];
   $ITEM_ID = $_POST['ITEM_ID'];
   $DATE = $_POST['DATE'];
   $QUANTITY = $_POST['QUANTITY'];

   $update_sql = "UPDATE INVENTORY SET STORE_ID = '$STORE_ID', ITEM_ID = '$ITEM_ID', DATE = '$DATE', QUANTITY = '$QUANTITY' WHERE INVENTORY_ID = '$id'";
   $update_result = mysqli_query($conn, $update_sql);

   if ($update_result) {
       header("Location: ../index.php?inventory_msg=Inventory record updated successfully");
       exit();
   } else {
       echo "Failed to update record: " . mysqli_error($conn);
   }
}

// Fetching the existing inventory record for editing
$sql = "SELECT * FROM INVENTORY WHERE INVENTORY_ID = $id";
$result = mysqli_query($conn, $sql);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $STORE_ID = $row['STORE_ID'];
    $ITEM_ID = $row['ITEM_ID'];
    $DATE = $row['DATE'];
    $QUANTITY = $row['QUANTITY'];
} else {
    echo "Failed to fetch inventory record: " . mysqli_error($conn);
    exit();
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

   <title>Big Brew CRUD Application - Edit Inventory</title>
</head>

<body>
   <nav class="navbar navbar-light; justify-content-center fs-3 mb-5" style="background-color: #39393f">
    <img src="../images/logo.png" width=150 height=130><p style="color: white; margin-left: 10px">Big Brew CRUD Application (Inventory)</p>
  </nav>

   <div class="container">
      <div class="text-center mb-4">
         <h3>Edit Inventory</h3>
         <p class="text-muted">Click update after changing any information</p>
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Store ID:</label>
                  <input type="number" class="form-control" name="STORE_ID" placeholder="1" value="<?php echo $STORE_ID ?>">
               </div>

               <div class="col">
                  <label class="form-label">Item ID:</label>
                  <input type="number" class="form-control" name="ITEM_ID" placeholder="1" value="<?php echo $ITEM_ID ?>">
               </div>
            </div>

            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Date:</label>
                  <input type="date" class="form-control" name="DATE" value="<?php echo $DATE ?>">
               </div>

               <div class="col">
                  <label class="form-label">Quantity:</label>
                  <input type="number" class="form-control" name="QUANTITY" placeholder="1" value="<?php echo $QUANTITY ?>">
               </div>
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
