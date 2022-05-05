<?php include "function.php";
$id = $_GET['edit'];
$calling = mysqli_query($connect, "select * from products where id='$id'");
$row = mysqli_fetch_array($calling);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <?php include "header.php"; ?>


    <div class="container">
        <div class="row">
            <div class="col-4 mx-auto">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="">title</label>
                        <input type="text" value="<?php echo $row['title']; ?>" name="title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">category</label>
                        <select name="category" value="<?php echo $row['category']; ?>" class="form-select">
                            <option value="">select category</option>
                            <?php
                            $callingcat = calling("category");
                            foreach ($callingcat as $cat) {
                                $id = $cat['cat_id'];
                                $title = $cat['cat_title'];
                                echo "<option value='$id'>$title</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">image</label>
                        <input type="file" value="<?php echo $row['image']; ?>" name="image" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="">brand</label>
                        <input type="text" value="<?php echo $row['brand']; ?>" name="brand" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">price</label>
                        <input type="text" value="<?php echo $row['price']; ?>" name="price" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">discount_price</label>
                        <input type="text" value="<?php echo $row['discount_price']; ?>" name="discount_price" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">description</label>
                        <input type="text" value="<?php echo $row['description']; ?>" name="description" class="form-control">
                    </div>
                    <div class="mb-3">

                        <input type="submit" name="send" class="btn btn-success w-100">
                    </div>
                </form>
                <?php
                if (isset($_POST['send'])) {
                    //image work
                    $image = $_FILES['image']['name'];
                    $temp_image = $_FILES['image']['tmp_name'];
                    move_uploaded_file($temp_image, "productimage/$image");
                    $id = $_GET['edit'];
                    
                        $title = $_POST['title'];
                        $category = $_POST['category'];
                        $brand = $_POST['brand'];
                        $price = $_POST['price'];
                        $discount_price = $_POST['discount_price'];
                        $description = $_POST['description'];
                        $image = $image;
                
                    $query = mysqli_query($connect, "update products SET title='$title',category='$category',brand='$brand',price='$price',discount_price='$discount_price',description='$description',image='$image' where id='$id'");
                    if ($query) {
                        echo "<script>window.open('index.php', '_self')</script>";
                    } else {
                        echo "<script>window.open('try again')</script>";
                    }
                }

                ?>
            </div>
        </div>
</body>

</html>