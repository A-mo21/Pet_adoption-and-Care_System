<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="filter-section">
    <!-- Filter Toggle Button -->
    <button id="filterToggle" class="filter-btn"><i class="fas fa-filter"></i> Filter</button>

    <!-- Filter Section (Initially Hidden) -->
    <div id="filterOptions" class="filter-options" style="display: none;">
        <form class="formclass" action="find-adoptions.php" method="GET">
            <div class="filter-item">
                <label for="type">Type:</label>
                <select name="type" id="type">
                    <option value="">All</option>
                    <option value="donate">Donate</option>
                    <option value="adopt">Adopt</option>
                </select>
            </div>
            <!-- Category Filter -->
            <div class="filter-item">
                <label for="category">Category:</label>
                <select name="category" id="category">
                    <option value="">All</option>
                    <option value="cat">Cat</option>
                    <option value="dog">Dog</option>
                    <option value="bird">Bird</option>
                    <option value="rabbit">Rabbit</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <!-- Species Filter -->
            <div class="filter-item">
                <label for="species">Species:</label>
                <input type="text" name="species" id="species" placeholder="Enter species" />
            </div>

            <!-- Location Filter -->
            <div class="filter-item">
                <label for="location">Location:</label>
                <input type="text" name="location" id="location" placeholder="Enter location" />
            </div>

            <!-- Type Filter -->


            <!-- Apply Filter Button -->
            <div class="filter-item">
                <button type="submit" class="apply-filter-btn">
                    Apply</button>
            </div>
        </form>
    </div>
</div>

<!-- JavaScript for toggling the filter section -->
<script>
    document.getElementById('filterToggle').addEventListener('click', function () {
        const filterOptions = document.getElementById('filterOptions');
        if (filterOptions.style.display === 'none') {
            filterOptions.style.display = 'flex';
        } else {
            filterOptions.style.display = 'none';
        }
    });
</script>