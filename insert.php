<?php include "include/function.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
<?php include "include/header.php";?>


    <div class="container">
        <div class="row">
            <div class="col-4 mx-auto">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="">title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">category</label>
                        <select name="category" class="form-select">
                            <option value="">select category</option>
                            <?php
                            $callingcat=calling("category");
                            foreach($callingcat as $cat){
                            $id= $cat['cat_id'];
                            $title=$cat['cat_title'];
                            echo "<option value='$id'>$title</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                 
                    <div class="mb-3">
                        <label for="">brand</label>
                        <input type="text" name="brand" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">price</label>
                        <input type="text" name="price" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">discount_price</label>
                        <input type="text" name="discount_price" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">description</label>
                        <input type="text" name="description" class="form-control">
                    </div>
                    <div class="mb-3">

                        <input type="submit" name="send" class="btn btn-success w-100">
                    </div>
                </form>
                <?php
                if (isset($_POST['send'])) {
                    //image work
                    $image=$_FILES['image']['name'];
                    $temp_image=$_FILES['image']['tmp_name'];
                    move_uploaded_file($temp_image,"productimage/$image");
                    $data = [
                        'title' => $_POST['title'],
                        'category' => $_POST['category'],
                        'brand' => $_POST['brand'],
                        'price' => $_POST['price'],
                        'discount_price' => $_POST['discount_price'],
                        'description' => $_POST['description'],
                        'image' => $image,
                    ];
                    insertData("products", $data);
                    if($data){
                        echo "<script>window.open('try again')</script>";
                    }
                }
               
            
                ?>
            </div>
        </div>
</body>
</html>
