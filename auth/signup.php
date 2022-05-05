<?php include "../include/function.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <?php include "../include/header.php";?>
    <div class="container mt-4">
        <div class="row">
            <div class="col-4 mx-auto">
                <div class="card shadow">
                    <div class="card-body">
                    <h4>Login Here</h4>
                        <form action="" method="post">
                        <div class="mb-3">
                                <label for="">fullname</label>
                                <input type="text" class="form-control" name="fullname">
                            </div>
                            <div class="mb-3">
                                <label for="">Contact</label>
                                <input type="text" class="form-control" name="contact">
                            </div>
                            <div class="mb-3">
                                <label for="">Email/Contact</label>
                                <input type="text" class="form-control" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="">Password</label>
                                <input type="text" class="form-control" name="password">
                            </div>
                            <div class="mb-3">
                                <input type="submit"  name="signup" class="btn btn-success">
                            </div>
                            <div class="mb-3">
                                <a href="login.php" class="text-dark p-0 m-0">Already have an Account</a>
                            </div>
                        </form>
                        <?php
                        if(isset($_POST['signup'])){
                        $data=[
                            'fullname'=> $_POST['fullname'],
                            'contact'=> $_POST['contact'],
                            'email'=> $_POST['email'],
                            'password'=> md5($_POST['password']),
                        ];
                        insertData("users",$data);
                        redirect("../index.php");
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>