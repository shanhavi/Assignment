<?php
header('Content-Type: application/json');

 include '../../connection.php';

$sqlQuery = "SELECT Amount,cafidate FROM cafetariaincome ORDER BY CafeIncome_ID";

$result = mysqli_query($con,$sqlQuery);

$data = array();
foreach ($result as $row) {
  $data[] = $row;
}

mysqli_close($con);

echo json_encode($data);
?>
