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
    $id = $_GET['update'];

    $sql = mysqli_query($connection, 'SELECT * FROM users');
    while($data = mysqli_fetch_array($sql)){
        if($id == $data['id']){
            $temp_nama  =   $data["nama"];
            $temp_user  =   $data["username"];
            $temp_pwd  =   $data["password"];
            $temp_alamat  =   $data["alamat"];
            $temp_nomor  =   $data["no_hp"];
        }
    }

    if(isset($_POST['edit'])){
        try{
            $username   = $_POST["username"];
            $nama       = $_POST["nama"];
            $alamat     = $_POST["alamat"];
            $nomorhp    = $_POST["no_hp"];
            $level      = $_POST["level"];
            $password   = $_POST["password"];

            $sql = "UPDATE users SET 
            nama      = '$nama', 
            username  = '$username', 
            password  = '$password', 
            level     = '$level', 
            alamat    = '$alamat', 
            no_hp     = '$nomorhp' 
            WHERE users.id = '$id'";

            if($connection->query($sql) === true){
                echo '<div class="alert alert-success text-center" role="alert">Hey, <strong>'.$nama.'</strong> Your data change was successful</div>';
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
        <h1 class="text-center">Edit Data User</h1>
        <div class="row">
            <div class="col">

            </div>
            <div class="col-6">
                <form method="POST">
                    <div class="form-group">
                        <label for="id">ID User</label>
                        <input class="form-control" type="text" placeholder="<?php echo $id ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="Name">Nama</label>
                        <input type="name" class="form-control" id="name" name="nama" value="<?php echo $temp_nama ?>" placeholder="<?php echo $temp_nama ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="username" class="form-control" id="username" value="<?php echo $temp_user ?>" placeholder="<?php echo $temp_user ?>"
                            name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <input type="address" class="form-control" id="address" value="<?php echo $temp_alamat ?>" placeholder="<?php echo $temp_alamat ?>"
                            name="alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="number">Nomor HP</label>
                        <input type="number" class="form-control" id="number" value="<?php echo $temp_nomor ?>" name="no_hp"
                            placeholder="<?php echo $temp_nomor ?>" required>
                    </div>
                    <input type="hidden" class="form_login" name="level">
                    <button type="submit" class="btn btn-primary" name="edit">Submit</button>
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