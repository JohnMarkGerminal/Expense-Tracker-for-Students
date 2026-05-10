<?php include('db.php'); ?>

<?php

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h2>Welcome <?php echo $_SESSION['name']; ?></h2>

<a href="add_expense.php">Add Expense</a>
<br><br>

<a href="logout.php">Logout</a>



</body>
</html>