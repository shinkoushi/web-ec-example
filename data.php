<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'data_ec';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Connection failed: ". $conn->connect_error);
}

if (isset($_POST['nama']) && isset($_POST['class']) && isset($_POST['major']) && isset($_POST['phone']) && isset($_POST['alamat']) && isset($_POST['reason'])) {
    $nama = $_POST['nama'];
    $class = $_POST['class'];
    $major = $_POST['major'];
    $phone = $_POST['phone'];
    $alamat = $_POST['alamat'];
    $reason = $_POST['reason'];

    $sql = "INSERT INTO ec (nama, class, major, phone, alamat, reason) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("ssssss", $nama, $class, $major, $phone, $alamat, $reason);

        // Execute SQL statement
        if ($stmt->execute()) {
            echo "Data inserted successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>