<?php include('db.php'); ?>

<?php
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
}

$user_id = $_SESSION['user_id'];

if(isset($_POST['save'])){

    $amount = $_POST['amount'];
    $category_id = $_POST['category_id'];
    $description = $_POST['description'];
    $date = $_POST['date'];

    mysqli_query($conn,
    "INSERT INTO expenses (user_id, category_id, amount, description, date)
    VALUES ('$user_id','$category_id','$amount','$description','$date')");

    header("Location: dashboard.php");
}
?>

<h2>Add Expense</h2>

<form method="POST">

<input type="number" name="amount" placeholder="Amount" required><br><br>

<select name="category_id" required>
    <option value="">Select Category</option>
    <?php
    $cat = mysqli_query($conn,"SELECT * FROM categories");
    while($c = mysqli_fetch_array($cat)){
        echo "<option value='".$c['category_id']."'>".$c['category_name']."</option>";
    }
    ?>
</select><br><br>

<input type="text" name="description" placeholder="Description"><br><br>

<input type="date" name="date" required><br><br>

<button type="submit" name="save">Save</button>

</form>
