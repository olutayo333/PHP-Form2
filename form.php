<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="row d-flex  justify-content-center text-center">
        <div class="col-lg-6 shadow px-4 py-5 mt-5 rounded ">
            <?php 
                 session_start();
                if (isset($_SESSION['error_message'])){
                     echo "<div class='text-danger'>" .$_SESSION['error_message']. "</div>";
                }
                //session_destroy();
                unset($_SESSION['error_message']);
            ?>
            <form action="index.php" method="post">
                <input type="text" name="firstName" placeholder="firstName" class="form-control my-2">
                <input type="text" name="lastName" placeholder="lastName" class="form-control my-2">
                <input type="email" name="email" placeholder="email" class="form-control my-2">
                <input type="password" name="password" placeholder="password" class="form-control my-2">
                <input type="text" placeholder="address" name="address" class="form-control my-2">
                <input type="submit" name="submit" class="btn btn-dark w-100"> 
            </form>
        </div>
        </div>
    </div>
</body>
</html>