<?php
/**
 * Created by PhpStorm.
 * User: aculanay
 * Date: 5/20/17
 * Time: 2:19 PM
 */
?>

<div class="container">
    <div class ="row">
        <div class="col-md-12">
            <?php foreach($message as $row): ?>
                    <div class="row">
                        <h5>From: <?php echo $row['sender']; ?></h5>
                    </div>

                    <div class="row">
                        <h5>Subject: <?php echo $row['subject']; ?></h5>

                    </div>

                    <div class="row">
                        <p> <?php echo $row['contents']; ?></p>

                    </div>

            <?php endforeach; ?>

        </div>

    </div>
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
                            <legend class="text-center header">Reply</legend>

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
                                           value=<?php echo $subject ?>>
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