<nav class="navbar navbar-expand-lg navbar-dark bg-warning">
    <div class="container">

        <a href="index.php" class="navbar-brand"><img src="productimage/logo.jpg" width="60px" height="60px" alt=""></a></a>
        <form action="index.php" class="d-flex mx-auto">
            <input type="search" name="search" size="70" class="form-control" placeholder="search everything">
            <input type="submit" name="find" class="btn btn-info text-black" value="search">


        </form>
       
        <ul class="navbar-nav">
            <li class="nav-item"><a href="insert.php" class="nav-link nav-link text-info"><img src="productimage/insert_logo.png" width="60px" height="60px"  alt=""></a></li>
            <ul class="navbar-nav">
                <?php
                if (isset($_SESSION['users'])){ ?>
                    <li class="nav-item"><a href="auth/logout.php" class="nav-link text-success mt-3"><b>Logout</b></a></li>
                    <li class="nav-item"><a href="auth/login.php" class="nav-link text-success mt-3"><b>
                        <?php
                        $log=$_SESSION['users'];
                        $data=calling ("users where email='$log' OR contact='$log'");
                        echo $fullname=$data[0]['fullname'];
                        ?>
                    </b></a></li>
                    <?php } else { ?>
                    <li class="nav-item"><a href="auth/login.php" class="nav-link text-info"><b>Login</b></a></li>
                    <li class="nav-item"><a href="auth/signup.php" class="nav-link text-info"><b>Signup</b></a></li>
                    <?php } ?>
                    <li class="nav-item"><a href='cart.php' class=" btn btn-warning btn-sm mt-1 position-relative text-success mt-3">
                            <i class="bi bi-cart"></i>cart
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                2
                            </span>

                        </a>
                    </li>

            </ul>

    </div>
</nav>