<?php include('db.php'); ?>

<?php

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query = mysqli_query($conn,
    "SELECT * FROM users
    WHERE email='$email'
    AND password='$password'");

    $row = mysqli_fetch_assoc($query);

    if($row){

        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['name'] = $row['name'];

        header("Location: dashboard.php");

    }else{
        echo "Invalid Email or Password";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<form method="POST">

<input type="email" name="email" placeholder="Email" required><br><br>

<input type="password" name="password" placeholder="Password" required><br><br>

<button type="submit" name="login">Login</button>

</form>

<a href="register.php">Register Here</a>

</body>
</html>