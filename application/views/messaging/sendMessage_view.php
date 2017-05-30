<html>
<?php
/**
 * Created by PhpStorm.
 * User: aculanay
 * Date: 4/25/17
 * Time: 6:50 AM
 */ ?>
<style>
    body{
        font-size: 15px;
    }
</style>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">

                <?php
                if(isset($sent)):
                    switch ($sent) {
                        case 1:
                            echo "Message Sent.<br>";
                            echo "<a href=\"" . base_url() . "index.php/messaging\" class=\"btn btn-primary\">Back to Inbox</a>";
                            break;
                        case -1:
                            echo "User not found.<br>";
                            echo "<a href=\"" . base_url() . "index.php/messaging\" class=\"btn btn-primary\">Back to Inbox</a>";
                            break;
                        case 0:
                            echo "An unknown error occured. Please contact the administrator.";
                            echo "<a href=\"" . base_url() . "index.php/messaging/send/Admin\" class=\"btn btn-primary\">Back to Inbox</a>";
                            echo "<a href=\"" . base_url() . "index.php/messaging\" class=\"btn btn-primary\">Back to Inbox</a>";
                            break;
                    }
                else:
                if (!isset($recipient)) {
                    $recipient = "";
                }
                if (!isset($subject)) {
                    $subject = "";
                }
                echo form_open('messaging/send_message'); ?>

                <form class="form-horizontal">
                    <fieldset>
                        <legend class="text-center header">Send Message</legend>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-1 text-right">To:</span>
                            <div class="col-md-8">
                                <input id="recipient-field" name="recipient" type="text" placeholder="Recipient" class="form-control"
                                    value=<?php echo $recipient ?>>
                            </div>
                        </div>

                        <br>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-1 text-center">Subject:</span>
                            <div class="col-md-8">
                                <input id="subject-field" name="subject" type="text" placeholder="Subject" class="form-control"
                                    value="<?php echo $subject ?>">
                            </div>
                        </div>

                        <br>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <textarea class="form-control" id="contents" name="contents" placeholder="Enter your message here." rows="7"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </fieldset>
                </form>

                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>