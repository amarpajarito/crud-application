<?php
include "../db_conn.php";
$id = $_GET["id"];
$sql = "DELETE FROM TRANSACTION WHERE TRANSACTION_ID = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: ../index.php?transaction_msg=Transaction data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}
?>
