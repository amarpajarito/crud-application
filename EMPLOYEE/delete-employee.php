<?php
include "../db_conn.php";
$id = $_GET["id"];
$sql = "DELETE FROM EMPLOYEE WHERE EMPLOYEE_ID = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: ../index.php?employee_msg=Employee Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}
