<html>
    <style>
        body{
            color: black;
            /*margin: 25px;*/
        }

        #welcome-message{
            border-bottom: 1px solid gray;

        }

        .dashboard-buttons{
            padding:5px;
        }
        .messages-panel{
            background-color: #337ab7;
            border: 1px solid #337ab7;
            color: white;
            margin: 10px;
        }

        .listings-panel{
            background-color: #178c31;
            border: 1px solid #178c31;
            color: white;
            margin: 10px;
        }

        .settings-panel{
            background-color: #d9534f;
            border: 1px solid #d9534f;
            color: white;
            margin: 10px;

        }

        .panel-icon{
            padding: 0px;
        }

        .panel-description{
            margin-top: 13px;

        }

        .icon-description{
            background-color: white;
            color: black;
            text-align: center;
            vertical-align: middle;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;

        }

        .equal{
            display: flex;
            flex-wrap: wrap;
        }


    </style>
    <head>
        <script src="https://use.fontawesome.com/42175f8426.js"></script>
    </head>

    <body>
        <div class="container">
            <div id="welcome-message">
                <h3>Welcome, <?php echo $this->session->username ?>!</h3>
            </div>
            <div class="row dashboard-buttons">
                <div class="col-md-5 panel messages-panel">
                    <div class="row equal">
                        <div class="col-xs-3 panel-icon text-center">
                            <i class="fa fa-comments-o fa-3x" aria-hidden="true"></i>
                        </div>

                        <a href="<?php echo base_url() ?>index.php/messaging" class="col-xs-9 icon-description">
                            <div>
                                <span class="pull-left panel-description">Messages</span>
                                <span class="pull-right panel-description">
                                    <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                </span>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-5 panel listings-panel">
                    <div class="row equal">
                        <div class="col-xs-3 panel-icon text-center">
                            <i class="fa fa-list-ul fa-3x" aria-hidden="true"></i>
                        </div>

                        <a href="<?php echo base_url() ?>/index.php/My_listings" class="col-xs-9 icon-description">

                            <div>
                                <span class="pull-left panel-description">My Listings</span>
                                <span class="pull-right panel-description">
                                    <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                </span>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-5 panel settings-panel">
                    <div class="row equal">
                        <div class="col-xs-3 panel-icon text-center">
                            <i class="fa fa-cog fa-3x" aria-hidden="true"></i>
                        </div>

                        <a href="#" class="col-xs-9 icon-description">

                            <div>
                                <span class="pull-left panel-description">Account Settings</span>
                                <span class="pull-right panel-description">
                                    <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                </span>
                            </div>
                        </a>
                    </div>
                </div>

            </div>


        </div>


    </body>
</html>
