<html>
<title>SFSUMarketplace</title>

<h1 style="text-align: center; margin-top: 0px;">
    <br>
    <p style="color: black">Welcome to SFSUMarketplace!</p>
    <p style="color: black">The online market to buy and sell goods with other SFSU connected people!</p>
</h1>

<style>
    .carousel-inner > .item > img,
    .carousel-inner > .item > a > img {
        width: 100%;
        margin: auto;
        height: 260px;
    }
</style>

<div class="container-carousel">

    <!-- Title -->
    <div class="row">
        <div>
            <h3 style="color:black">Most Recent Listings</h3>
        </div>
    </div>
    <!-- /.row -->

    <!-- Page Features -->
    <div class="row text-center">

        <?php
        if(isset($recent_listings)) {
            foreach($recent_listings as $row) {
                $id = $row['itemid'];
                ?>
                <div class='col-md-2 col-sm-6 hero-feature' style="min-height: 300px;">
                    <div class='thumbnail'>
                        <img src="<?php echo base_url('images/item_images/' . 'thumbnail_' . $row['image']); ?>" alt="Image not found">
                        <div class="caption" style="height:155px;">
                            <h4><?php
                                echo $row['name'];
                                ?>
                            </h4>
                            <p>
                                <?php
                                echo "$" . $row['price'];
                                ?>
                            </p>
                            <p>
                                <a href="<?php echo base_url()?>index.php/search/load_details/<?php echo $id?>">
                                    <button class="btn btn-primary" type="submit" >More Info</button></a>                            </p>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>

    </div>
</div>

<div class="container-carousel">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class=""></li>
            <li data-target="#myCarousel" data-slide-to="1" class=""></li>
            <li data-target="#myCarousel" data-slide-to="2" class="active"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <a href="<?php echo base_url()?>index.php/search/category_books">
                    <img src="<?php echo base_url()?>images/banner4.jpg" alt="banner1" width="460" height="300">
                </a>
                <div class="carousel-caption d-none d-md-block">
                    <h3>Books</h3>
                    <p>...Browse textbooks and other books other students are selling!</p>
                </div>
            </div>

            <div class="item">
                <a href="<?php echo base_url()?>index.php/search/category_furniture">
                    <img src="<?php echo base_url()?>images/banner2.jpg" alt="banner2" width="460" height="300">
                </a>
                <div class="carousel-caption d-none d-md-block">
                    <h3>Furniture</h3>
                    <p>Get your hands on some rad furniture at low prices!</p>
                </div>
            </div>

            <div class="item">
                <a href="<?php echo base_url()?>index.php/search/category_electronics">
                    <img src="<?php echo base_url()?>images/banner3.jpg" alt="banner3" width="460" height="300">
                </a>
                <div class="carousel-caption d-none d-md-block">
                    <h3>Electronics</h3>
                    <p>Get the latest technology in the city!</p>
                </div>
            </div>

        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<style>

    .container-carousel {
        width: 80%;
        margin-left: auto;
        margin-right: auto;
    }


</style>

</body></html>