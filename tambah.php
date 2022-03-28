<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<?php
    include 'koneksi.php';
    session_start();

    if(isset($_POST['register'])){
        try{
            $username   = $_POST["username"];
            $nama       = $_POST["nama"];
            $alamat     = $_POST["alamat"];
            $nomorhp    = $_POST["no_hp"];
            $level      = $_POST["level"];
            $password   = $_POST["password"];

            $sql = "INSERT INTO users (username, password, nama, alamat, no_hp, level) VALUES
            ('$username', '$password', '$nama', '$alamat', '$nomorhp', 1)";

            if($connection->query($sql) === true){
                echo '<div class="alert alert-success text-center" role="alert">Hey, <strong>'.$nama.'</strong> your registration was successful</div>';
            } else {
                echo "Error: " . $sql . "<br>" . $connection->error;
            }
        } catch (Exception $e){
            echo $e->getMessage();
        }
    }
?>

<body>
    <div class="container-fluid">
        <h1 class="text-center">Tambah Data User</h1>
        <div class="row">
            <div class="col">

            </div>
            <div class="col-6">
                <form method="POST">
                    <div class="form-group">
                        <label for="Name">Nama</label>
                        <input type="name" class="form-control" id="name" name="nama" placeholder="Enter Name" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="username" class="form-control" id="username" placeholder="Enter Username"
                            name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <input type="address" class="form-control" id="address" placeholder="Enter Address"
                            name="alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="number">Nomor HP</label>
                        <input type="number" class="form-control" id="number" name="no_hp"
                            placeholder="Enter Number Phone" required>
                    </div>
                    <input type="hidden" class="form_login" name="level">
                    <button type="submit" class="btn btn-primary" name="register">Submit</button>
                    <button class="btn btn-primary" onclick="location.href='index.php'"
                        type="button">Kembali</button>
                </form>
            </div>
            <div class="col">

            </div>
        </div>
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