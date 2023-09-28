<?php
  require_once('db.php');
  $con = getConnection();
$action = $_GET['action'];

if ($action === 'fetch_projects') {
    $query = "SELECT name FROM project";
    $result = $conn->query($query);

    $projects = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $projects[] = $row;
        }
    }

    echo json_encode($projects);
}

$conn->close();
?>
