<?php include "include/function.php"; 

if(!isset($_GET['id'])){
    redirect("index.php");
}
$id = $_GET['id'];
$callingRecord = calling("products JOIN category ON products.category=category.cat_id where id='$id'");
$row = $callingRecord[0];
?>
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
                <div class="row">
                    <div class="col-4">
                        <img src="productimage/<?= $row['image'];?>" class="card-img-top" alt="">
                    </div>
                    <div class="col-8">
                        <table class="table">
                            <tr>
                                <th colspan="2"><?= $row['title'];?></th>
                            </tr>
                            <tr>
                                <th>MRP </th>
                                <td><del><?= $row['price'];?></del></td>
                            </tr>
                            <tr>
                                <th>Brand</th>
                                <td><?= $row['brand'];?></td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <td><?= $row['cat_title'];?></td>
                            </tr>
                            <tr>
                                <th>Offer Price</th>
                                <td><h4>Rs. <?= $row['discount_price'];?></h4></td>
                            </tr>
                        </table>

                        <a href="view.php?p_id=<?=$row['id'];?>&id=<?= $_GET['id'];?>" class="btn btn-warning"><i class="bi bi-cart"></i>Add to cart</a>
                        <a href="" class="btn btn-success"><i class="bi bi-bag-fill"></i>Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
if(isset($_GET['p_id'])){
    //retrive products details
    $p_id= $_GET['p_id'];
    $product=callingOne("products where id='$p_id'");

    $log= $_SESSION['users'];
    $user=callingOne("users where email='$log' OR contact='$log'");
    $product_id=$product['id'];


    if($product){
        $user_id=$user['user_id'];
        $order=callingOne("orders where ordered=0 AND user_id='$user_id'");
        
        if($order){
            $orderitem=callingOne("orderitem where user_id='$user_id' AND products_id='$product_id' AND ordered=0");
            if($orderitem){
                echo "testing";
                $order_id=$orderitem['order_id'];
                $updatequery=mysqli_query($connect,"update orderitem SET qty=qty+1 where order_id='$order_id' AND products_id='$product_id'");
            }
            else{
                $insertData=[
                   'ordered'=>0,
                   'user_id'=>$user_id,
                    'products_id'=>$product_id,
                    'order_id'=>$order['id'],
                    'qty'=>1,
 

                ];
               insertData("orderitem", $insertData);
               //redirect to cart page

            }
        }
        else{
            $insertOrder=[
                'ordered'=> 0,
                'user_id'=> $user_id,
            ];
            insertData("orders",$insertOrder);
            $lastId=mysqli_insert_id($connect);
            $insertData=[
                'ordered'=>0,
                'user_id'=>$user_id,
                 'products_id'=>$product_id,
                 'order_id'=>$lastId,
                 'qty'=>1,


             ];
            insertData("orderitem", $insertData);

        }
   
    }
    redirect("cart.php");
}
?>