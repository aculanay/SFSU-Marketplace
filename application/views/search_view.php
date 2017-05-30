<html>
    <body>
        <div class="container-fluid bg-3 text-left">
            <div class="dropdown" name="category">

            </div>
	   <?php echo form_open('search/execute_search'); ?>
            <form>
                <!-- If category is not set, set it to All. Otherwise, set it to the previously selected one -->
                <select name="Category" size="1" > 
                    <option selected value="<?php if (isset($category)){echo $category;} 
                    else {echo "All";}?>" >
                        <?php
                        if (isset($category)){echo $category;}
                        else {echo "All";}?>
                    </option>
                    <option value="All">All</option>
                    <option value="Furniture">Furniture</option>
                    <option value="Electronics">Electronics</option>
                    <option value="Books">Books</option>
                    <option value="Other">Other</option>
                </select>
                <input type="text" name="searchquery"/>
                <input type="submit" name="submit" value="Search for Items"/>
            </form>
    </body>

    <?php
    if (isset($results))
    {
        echo "<br>";
        foreach ($results as $row)
        {
            ?>
            <!-- Click any search result image to go to href link-->
            <a href="<?php echo base_url('/index.php/search/load_description'); ?>">
                <img src="<?php echo base_url('images/item_images/' . $row['image_link']); ?>" class="img-thumbnail" width="100px" height="100px" alt="Image not found">
            </a>
            <?php
            echo $row['name'] . "<br>";
            echo $row['description'] . "<br>";
            echo "<br>";
        }
    }
    ?>

</div>
</html>
