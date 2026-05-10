<h2>My Expenses</h2>

<table border="1" cellpadding="10">

<tr>
    <th>Date</th>
    <th>Category</th>
    <th>Amount</th>
    <th>Description</th>
</tr>

<?php

$user_id = $_SESSION['user_id'];

$query = mysqli_query($conn,"
SELECT expenses.*, categories.category_name
FROM expenses
INNER JOIN categories
ON expenses.category_id = categories.category_id
WHERE expenses.user_id = '$user_id'
ORDER BY expenses.date DESC
");

while($row = mysqli_fetch_array($query)){
?>

<tr>
    <td><?php echo $row['date']; ?></td>
    <td><?php echo $row['category_name']; ?></td>
    <td><?php echo $row['amount']; ?></td>
    <td><?php echo $row['description']; ?></td>
</tr>

<?php } ?>

<td>
<a href="delete_expense.php?id=<?php echo $row['expense_id']; ?>"
onclick="return confirm('Delete this expense?')">
Delete
</a>
</td>

</table>