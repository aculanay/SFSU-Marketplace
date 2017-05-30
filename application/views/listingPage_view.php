<html>

<head>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>

<body>


<div class="container">

    <!-- Item Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <?php
                if(isset($results)){
                    foreach($results as $item){
                        echo $item['name'];
                        $name = $item['name'];
                    }
                }
                ?>
                <!-- <small></small> -->
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Item Row -->
    <div class="row">

        <div class="col-md-6">
            <img class="img-responsive" src="<?php echo base_url('images/item_images/' . $item['image']); ?>" alt="">
        </div>

        <div class="col-md-4">
            <h3>About the Product</h3>
            <p>
                Sold By:
                <?php
                if(isset($results)){
                    foreach($results as $item){
                        echo $item['username'];
                        $username = $item['username'];
                    }
                }
                ?>
            </p>
            <p>
                Duration:
                <?php
                if(isset($results)){
                    foreach($results as $item){
                        echo $item['duration'];
                    }
                }
                ?>

            </p>
            <p>
                Condition:
                <?php
                if(isset($results)){
                    foreach($results as $item){
                        echo $item['condition'];
                    }
                }
                ?>

            </p>
            <p>
                <?php
                if(isset($results)){
                    foreach($results as $item){
                        echo $item['description'];
                    }
                }
                ?>
            </p>
            <h3>
                <?php
                if(isset($results)){
                    foreach($results as $item){
                        echo "$" . $item['price']  ;
                    }
                }
                ?>

            </h3>


            <a href="<?php echo base_url()?>index.php/messaging/send/<?php echo $username;?>/<?php echo $name; ?>"
               class="btn btn-default" style="width:80%; font-size: 20px; background-color: #4089d4; color: white;">Contact Seller</a>

        </div>

    </div>
    <!-- /.row -->

    <!-- Other images of the same product -->
    <div class="row">

        <div class="col-lg-12">
            <h3 class=""></h3>
        </div>
    </div>
    <!-- /.row -->

    <hr>
</body>

<body>
<!-- Preferred Meetup Places -->
<h3>Preferred Safe Meetup Place</h3>
<div id="map"></div>
<script>
    function initMap() {
        var uluru = {lat: 37.722358, lng: -122.478664};
        var cesarChavez = {lat: 37.722167, lng: -122.478452};
        var quad = {lat: 37.722293, lng: -122.477607};
        var sucGardens = {lat: 37.723090, lng: -122.477343};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 18,
            center: uluru,
            scrollwheel: false
        });

        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
        var marker2 = new google.maps.Marker({
            position: cesarChavez,
            map: map
        });
        var marker3 = new google.maps.Marker({
            position: quad,
            map: map
        });
        var marker4 = new google.maps.Marker({
            position: sucGardens,
            map: map
        });

        map.addListener('click', function() {
            map.set('scrollwheel', true);
        });
    }


</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZo144k1-N4Tb2MIp47EfPDJB-r1LcBcE&callback=initMap">
</script>
</html>
