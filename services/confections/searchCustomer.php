<?php
    include('../../resources/connect.php');

    $searchTerm = isset($_POST['searchTerm']) ? $_POST['searchTerm'] : '';

    $db = conectar();
    $sql = "SELECT id, name FROM customers WHERE state = 'v' AND (id LIKE '%$searchTerm%' OR name LIKE '%$searchTerm%') ORDER BY name";
    $result = mysqli_query($db, $sql);
    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    mysqli_close($db);
    header('Content-Type: application/json');
    echo json_encode($data);
?>