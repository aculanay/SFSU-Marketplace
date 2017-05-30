<html>

<style>
    body {
        color: black;
    }
</style>
<body>
<div class="container">
    <div class="row">

        <!-- Main Page -->
        <div class="col-md-12">
            <!-- Header -->
            <h1>My Listings: <?php
                echo count($myListings);
                ?> Items</h1>

            <div class="row">

                <?php
                if (isset($myListings)) {
                    echo "<br>";
                    foreach ($myListings as $row) {
                        $id = $row['itemid'];
                        ?>
                        <div class="col-sm-4 col-lg-4 col-md-4">
                            <div class="thumbnail">
                                <img src="<?php echo base_url('images/item_images/' . 'thumbnail_' . $row['image']); ?>"
                                     class="img-responsive" width="100px" height="100px" alt="Image not found">
                                <?php
                                ?>
                                <h4>
                                    <?php
                                    echo $row['name'] . "<br>";
                                    ?>
                                </h4>
                                <p>
                                    <?php
                                    echo "$" . $row['price'] . "<br>";
                                    ?>
                                </p>
                                <?php
                                echo "<br>";
                                ?>
                                <a href="<?php echo base_url()?>index.php/My_listings/delete_listing/<?php echo $id?>">
                                    <button class="btn btn-danger" type="submit"> Delete </button></a>

                                <!-- Creates a form with a hidden field that has the itemid number in it.
                                     When button is clicked, calls the load_details function in the Search
                                     controller -->
                                <a href="<?php echo base_url()?>index.php/search/load_details/<?php echo $id?>">
                                    <button class="btn btn-primary" type="submit" >More Info</button></a>

                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>