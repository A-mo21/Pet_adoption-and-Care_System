<!-- <div class="adoption-card">
    <a href="post-detail.php?id=<?php echo $id; ?>">
        <img src="<?php echo $image; ?>" alt="Pet Image" />
        <h3>Category: <?php echo $category; ?></h3>
        <p>Name: <?php echo $name; ?></p>
        <p>Location: <?php echo $location; ?></p>
        <p>Species: <?php echo $species; ?></p>
        <p>Age: <?php echo $age; ?></p>
        <p>Size: <?php echo $size; ?></p>
        <p>Vaccinated: <?php echo $vaccinated; ?></p>
        <p>Gender: <?php echo $gender; ?></p>
        <p>Neutered/Spayed: <?php echo $neutered; ?></p>
    </a>
</div> -->


<div class="adoption-card"
    onclick="console.log('Card clicked!'); document.getElementById('post-detail-form-<?php echo $id; ?>').submit();"
    style="cursor: pointer;">
    <img src="<?php echo $image; ?>" alt="<?php echo $name; ?>" />
    <h3><?php echo $name; ?></h3>
    <p>Category: <?php echo $category; ?></p>
    <p>Location: <?php echo $location; ?></p>
    <p>Species: <?php echo $species; ?></p>
    <p>Age: <?php echo $age; ?></p>
    <p>Size: <?php echo $size; ?></p>
    <p>Vaccinated: <?php echo $vaccinated; ?></p>
    <p>Gender: <?php echo $gender; ?></p>
    <p>Neutered/Spayed: <?php echo $neutered; ?></p>

    <!-- Hidden form for submission -->
    <form id="post-detail-form-<?php echo $row['id']; ?>" method="post" action="card-detail.php" style="display:none;">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    </form>

</div>