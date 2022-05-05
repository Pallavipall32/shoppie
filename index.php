<?php include "include/function.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <?php include "include/header.php"; ?>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <?php include "include/side.php";?>
                </div>
                <div class="col-9 mt-3">
                    <div class="row g-2">
                        <?php
                        
                        $callingproduct = calling("products JOIN category ON products.category=category.cat_id");
                        
                        if(isset($_GET['cat'])){
                            $cat = $_GET['cat'];
                            $callingproduct = calling("products JOIN category ON products.category=category.cat_id where category='$cat'");
                        }
                        elseif(isset($_GET['find'])){
                            $search= $_GET['search'];
                            $callingproduct = calling("products JOIN category ON products.category=category.cat_id where title LIKE '%$search%'");
                        }

                        foreach ($callingproduct as $value) {
                        ?>
                            <div class="col-3">
                                <div class="card mb-2">
                                    <img src="productimage/<?= $value['image']; ?>" alt="" class="card-img-top" style="object-fit:cover;height:200px">
                                    <div class="card-body p-2">
                                        <h2 class="h5">
                                            <span>Rs. <?= $value['discount_price'];?></span>
                                            <del class="small fw-lighter text-danger">Rs. <?= $value['price'];?></del>
                                        </h2>
                                        <h5 class='m-0 p-0 small fw-bold text-truncate'><?= $value['title']; ?></h5>
                                        <small class='m-0 py-2'><?= $value['cat_title']; ?></small>
                                        <a href="view.php?id=<?= $value['id'];?>" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
            </div>
        </div>
    </div>
</body>

</html>