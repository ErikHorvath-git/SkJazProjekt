<?php
require_once 'panel.php'; 

$manager = new ProductManager();
$products = $manager->listProducts(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Manager</title>
</head>
<body>
<h2>Product List</h2>
<table>
    <?php foreach ($products as $product): ?>
    <tr>
        <td><?php echo htmlspecialchars($product['name']); ?> ($<?php echo htmlspecialchars($product['price']); ?>)</td>
        <td><img src="data:image/jpeg;base64,<?php echo base64_encode($product['picture']); ?>" alt="Product Image" height="100" /></td>
        <td><?php echo htmlspecialchars($product['description']); ?></td>
        <td>
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                <input type="text" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required>
                <input type="text" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" required>
                <input type="text" name="description" value="<?php echo htmlspecialchars($product['description']); ?>" required>
                <input type="file" name="picture" required>
                <button type="submit" name="update">Update</button>
            </form>
        </td>
        <td>
            <form method="post">
                <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                <button type="submit" name="delete">Delete</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<h2>Add New Product</h2>
<form method="post" enctype="multipart/form-data">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br>
    <label for="price">Price:</label>
    <input type="text" id="price" name="price" required><br>
    <label for="picture">Picture:</label>
    <input type="file" id="picture" name="picture" required><br>
    <label for="description">Description:</label>
    <input type="text" id="description" name="description" required><br>
    <input type="submit" name="create" value="Add Product">
</form>
</body>
</html>
