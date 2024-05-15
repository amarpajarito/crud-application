<?php
include "../db_conn.php";
$id = $_GET["id"];
$sql = "DELETE FROM INVENTORY WHERE INVENTORY_ID = $id"; 
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: ../index.php?inventory_msg=Inventory Data deleted successfully"); 
} else {
  echo "Failed: " . mysqli_error($conn);
}
?>
