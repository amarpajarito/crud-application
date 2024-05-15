<?php
include "../db_conn.php";
$id = $_GET["id"];
$sql = "DELETE FROM INVENTORY_ITEM WHERE ITEM_ID = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: ../index.php?inventory_item_msg=Inventory Item Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}
