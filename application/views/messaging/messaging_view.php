
<html>

<style>
    #button-row{
        padding: 0 0 5px 0;
    }

    input[type="checkbox"] {
        line-height: normal;
        margin-top: 0;
    }

</style>

<script type="text/javascript">
    jQuery(document).ready(
        function($){
            $(".clickable-row").click(
                function(){
                    window.location = $(this).data("href");
                }
            )
            $('input:checkbox').click(function(e){
                e.stopPropagation();
            })
        }
    )
</script>
<body>

<div class="container">

    <div class="row" id="button-row">
        <div class="col-6-lg pull-left">
            <a href="<?php echo base_url() ?>index.php/messaging/send" class="btn btn-primary" style="float: right;">Send Message</a>
        </div>

    </div>



</div>


<div class="container">
    <div class="row">
        <?php if(isset($message)) :?>
            <!--    echo "<table style=\"width:100%\""; echo "<tr><th>Author</th><th>Subject</th><th>Contents</th></tr>";foreach($message as $row) {
                                                                                                echo "<tr><th>{$row['sender']}</th><th>{$row['subject']}</th><th>{$row['contents']}</th></tr>";
                                                                                                                                                                                             }echo "</table>"echo "<a href=\"".base_url()."index.php/messaging\" class=\"btn btn-primary\">Back</a>"; -->
        <?php elseif(isset($messages)) : ?>
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item active">
                    <a class="nav-link" data-toggle="tab" href="#inbox" role="tab">Inbox</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#sent" role="tab">Sent</a>
                </li>
            </ul>

            <div class ="tab-content">
                <div class="tab-pane active" id="inbox" role="tabpanel">
                    <table class = "table table-striped table-hover">
                        <thead>
                        <tr>
                            <td align="center">From</td>
                            <td align="center">Subject</td>
                            <td align="center">Time Sent</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($messages as $row) : ?>
                            <?php $username = $this->session->username; ?>
                            <?php if(strcmp($username, $row['sender'])) : ?>

                                <?php
                                $dt = new DateTime();
                                $dt->setTimestamp($row['timestamp']);
                                $dt->setTimezone(new DateTimeZone('America/Los_Angeles'));
                                $time = $dt->format('h:ia M j');
                                ?>
                                <tr class="clickable-row" data-href="messaging/open/<?php echo $row['messageid']; ?>">
                                    <td align="center" scope="row"><?php echo $row['sender']; ?> </td>
                                    <td align="center" scope="row"><?php echo $row['subject']; ?> </td>
                                    <td align="center" scope="row"><?php echo $time; ?> </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>

                <div class="tab-pane" id="sent" role="tabpanel">
                    <table class = "table table-striped table-hover">
                        <thead>
                        <tr>
                            <td align="center">To</td>
                            <td align="center">Subject</td>
                            <td align="center">Time Sent</td>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach($messages as $row) : ?>

                            <?php $username = $this->session->username; ?>
                            <?php if(strcmp($username, $row['sender']) == 0) : ?>

                                <?php
                                $dt = new DateTime();
                                $dt->setTimestamp($row['timestamp']);
                                $dt->setTimezone(new DateTimeZone('America/Los_Angeles'));
                                $time = $dt->format('h:ia M j');
                                ?>
                                <tr class="clickable-row" data-href="messaging/open/<?php echo $row['messageid']; ?>">
                                    <td align="center" scope="row"><a href='messaging/open/<?php echo $row['messageid']; ?>'><?php echo $row['recipient']; ?></a> </td>
                                    <td align="center" scope="row"><?php echo $row['subject']; ?> </td>
                                    <td align="center" scope="row"><?php echo $time; ?> </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--          foreach($messages as $row) {
                    $dt = new DateTime();
                    $dt->setTimestamp($row['timestamp']);
                    $dt->setTimezone(new DateTimeZone('America/Los_Angeles'));
                    $time = $dt->format('h:ia M j');
                echo "<th><a href='messaging/open/{$row['messageid']}'>{$row['recipient']}</a></th>"
                ."<th><a href='messaging/open/{$row['messageid']}'>{$row['sender']}</a></th>"
                ."<th><a href='messaging/open/{$row['messageid']}'>{$row['subject']}</a></th>"
                ."<th><a href='messaging/open/{$row['messageid']}'>$time</a></th></tr>";
            echo "</table>";-->
        <?php else: ?>
            echo "Error loading data.";
        <?php endif; ?>
    </div>
</div>
</body>
</html>