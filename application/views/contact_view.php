<html>
<style>
body{
    color: black;
}
    label{
    text-align: right;
    }

    #formrow{
        margin-left: 23%;
    }


    input.form-control{
    width: 50%;
}


    .control-label{
    font-size: 15px;
    }


</style>


<head>
    <h3 style="text-align: center; margin-top: 0px; color:black;">
        Contact
    </h3>
    <p style ="text-align: center;">Please enter your email and message below. We will reply to you within 3 - 5 business days.</p>
</head>

<div class="form-group row">
    <label class="control-label col-md-4" for="email">Enter Email: </label>
    <div class="col-md-8">
        <input type="text" class="form-control" id="email" placeholder="Email">
    </div>
</div>

<div class="form-group row">
    <label class="control-label col-md-4" for="message">Enter your message here: </label>
    <div class="col-md-8">
        <input type="text" class="form-control" id="message" placeholder="Message here">
    </div>
</div>

<div style="text-align: center">
    <a style="..." href="<?php echo base_url() ?>index.php/contact_submit" class="rst-footer-buttons">Submit</a>
   <!-- <a href="http://google.com" class="button">Go to Google</a>
    <a style="font-size: 14px;" href="<?php echo base_url() ?>index.php/contact">Contact</a>-->
</div>

