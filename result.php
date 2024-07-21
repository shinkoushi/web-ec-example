<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dafatar Member EC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body style="margin: 50px;">
<h1>Daftar Member <img src="images/flag.png" class="logo"/></h1>
    <br>
    <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="cari nama.." aria-label="Search" name="search">
        <button class="btn btn-outline-success" type="submit">Cari</button>
    </form>
    <br>
    <table class="table"> 
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Class</th>
                <th>Major</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Reason</th>
            </tr>
        </thead>
        <tbody>
            <?php
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $db   = 'data_ec';
            $connection = new mysqli ($host, $user, $pass, $db);

            if ($connection->connect_error) {
                die("Koneksi gagal: ".$connection->connect_error);
            }

            $search = isset($_GET['search']) ? $_GET['search'] : '';
            $sql = "SELECT * FROM ec WHERE nama LIKE '%$search%'";
            $result = $connection->query($sql);

            if (!$result) {
                die("invalid query: ".$connection->error);
            }

            while($row = $result->fetch_assoc()){
                echo "<tr>
                <td>". $row ["id"]. "</td>
                <td>". $row ["nama"]. "</td>
                <td>". $row ["class"]."</td>
                <td>". $row ["major"]. "</td>
                <td>". $row ["phone"]."</td>
                <td>". $row ["alamat"]."</td>
                <td>". $row ["reason"]."</td>
                <td>
                <a class='btn btn-primary btn-sm' href='?hapus=". $row["id"] ." onclick=\"return confirm('Yakin akan menghapus data?');\">Delete</a>
                </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>

    <style>
        .bg-custom {
  background-color: lightgreen;
  width:200px;
  border-radius:5px;
  text-align:center;
}
.logo{
    width:50px;
    height:50px;
}
        </style>

    <?php 
    if(isset($_GET['hapus'])){
        mysqli_query($connection, "delete from ec where id='$_GET[hapus]'")
        or die (mysqli_error($connection));

        echo '<p class="bg-custom text-white p-2">Data berhasil dihapus</p>';
        echo "<meta http-equiv=refresh content=2;URL='result.php'>";
    }
    ?>
</body>
</html>