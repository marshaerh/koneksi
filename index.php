<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Koneksi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<?php 
    include 'koneksi.php';
    $sql = mysqli_query($connection, 'SELECT * FROM users');
    //$id = array();


    if(isset($_GET['refresh'])){
        header("location:index.php");
    }

    if(isset($_GET['delete'])){
        include 'koneksi.php';

        try{
            $sql = "DELETE FROM `users` WHERE `users`.`id` = ".$_GET['delete'];

            if($connection->query($sql) === true){
                echo "Data Berhasil Dihapus";
                header("location:index.php");
            } else {
                echo "Error: " . $sql . "<br>" . $connection->error;
            }
        } catch (Exception $e){
            echo $e->getMessage();
        }
    }
?>

<body>
    <h1 class="text-center">Tabel User</h1>
    <div class="table-responsive container-fluid">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Nomor HP</th>
                    <th>Action</th>
                </tr>
            </thead>

            <?php while($data = mysqli_fetch_array($sql)) { ?>
            <tr>
                <td><?php echo $data['username']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['alamat']; ?></td>
                <td><?php echo $data['no_hp']; ?></td>
                <td>
                    <button class="btn btn-danger"
                        onclick="location.href='index.php?delete=<?php echo $data['id']; ?>'"
                        type="button">Delete</button>
                    <button class="btn btn-warning" onclick="location.href='ubah.php?update=<?php echo $data['id']; ?>'"
                        type="button">Update</button>
                </td>
            </tr>
            <?php } ?>
        </table>
        <button class="btn btn-primary" onclick="location.href='tambah.php'" type="button">Tambah</button>
        <button class="btn btn-primary" onclick="location.href='index.php?refresh'"
            type="button">Refresh</button>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>