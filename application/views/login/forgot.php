<?php
if (isset($choice)) {
    switch ($choice) {
        case 1:
            ?>
            <div style="text-align: center">
                Password reset successfully.
            </div>
            <div style="text-align: center">
                <a href="<?php echo base_url() ?>index.php/" style="font-size: 15px;">Home</a>
            </div>
            <??>
            <div id="loginform" class="container">

                <?php echo form_open('Login/forgot'); ?>
                <div class="row" id="formrow">
                    <form class="form-horizontal">

                        <div class="form-group row">
                            <label class="control-label col-md-2" for="email">Email: </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="email" placeholder="Account's Email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-10">
                                <input type="hidden" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div style="width: 47%; padding-left:12px;">
                                <input type = "submit" name = "submit" value="Find Username" style="float: center;">
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <?php
            break;
        case 2:
            ?>
            <div id="loginform" class="container">

                <?php echo form_open('Login/forgot'); ?>
                <div class="row" id="formrow">
                    <form class="form-horizontal">

                        <div class="form-group row">
                            <label class="control-label col-md-2" for="email">Email: </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="email" placeholder="Account's Email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-2" for="password">Password: </label>
                            <div class="col-md-10">
                                <input type="password" class="form-control" name="password" placeholder="New Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div style="width: 47%; padding-left:12px;">
                                <input type = "submit" name = "submit" value="Reset Password" style="float: center;">
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <?php
            break;
        case 3:
            ?>
            <div style="text-align: center">
                Email not found, or not registered to an account.
            </div>
            <div style="text-align: center">
                <a href="<?php echo base_url() ?>index.php/" style="font-size: 15px;">Home</a>
            </div>
            <?php
            break;
        case 4:
            ?>
            <div style="text-align: center">
                Password reset successfully.
            </div>
            <div style="text-align: center">
                <a href="<?php echo base_url() ?>index.php/" style="font-size: 15px;">Home</a>
            </div>
            <?php
            break;
    }
} else if (isset($username)) {
    ?>
    <div style="text-align: center">
        Your username is <?php echo $username ?>.
    </div>
    <div style="text-align: center">
        <a href="<?php echo base_url() ?>index.php/" style="font-size: 15px;">Home</a>
    </div>
    <?php
} else {
    
}

