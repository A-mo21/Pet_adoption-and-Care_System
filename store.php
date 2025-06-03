<?php
include_once('db_connect.php'); // Your database connection

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawPalace Pet Store</title>
    <link rel="stylesheet" href="store.css"> </head>
<body>
    <?php include 'nav.php'; ?>  <section class="product-list">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="product-card">
                    <img src="<?php echo htmlspecialchars($row['image_url']); ?>" alt="<?php echo htmlspecialchars($row['product_name']); ?>">
                    <h3><?php echo htmlspecialchars($row['product_name']); ?></h3>
                    <p class="category">Category: <?php echo htmlspecialchars($row['category']); ?></p>
                    <p class="price">Price: $<?php echo htmlspecialchars(number_format($row['price'], 2)); ?></p>
                    <p class="description"><?php echo htmlspecialchars($row['description']); ?></p>
                    <button class="add-to-cart" data-product-id="<?php echo $row['product_id']; ?>">Add to Cart</button>
                </div>
                <?php
            }
        } else {
            echo "<p>No products available at the moment.</p>";
        }
        ?>
    </section>

    <?php include 'footer.php'; ?> <script src="store.js"></script>  </body>
</html>