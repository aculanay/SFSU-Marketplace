<html>
    <style>
        body{
            color: black;
            /*margin: 25px;*/
        }

        label{
            margin-bottom: 0px;
        }

        .itemdescription{

            padding: 25px;
            border: 1px solid black;
            margin-top: 10px;
        }

        .payment{
            margin-top: 25px;
            margin-bottom: 25px;
            padding: 25px;
            padding-top: 10px;
            border: 1px solid black;
        }

        .submitbuttons{
            padding-bottom:10px;
        }

        #buttonrow{
            padding: 25px;
        }

        #title h3{
            margin-bottom: 0px;
            text-align: center;

        }

        #title p{
            text-align: center;
        }

        label{
            font-size: 15px;
        }

        .form-group.required .control-label:after{
            content:"*";
            color:red;
        }
    </style>

    <head>
        <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
        <script type="text/javascript">bkLib.onDomLoaded(function() {
                new nicEditor({buttonList: ['bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript']}).panelInstance('description');
            });</script>
    </head>

     <body>
        <div id="title">
            <h3>Create A Listing</h3>
            <p>Post an item to sell here!</p>
        </div>
        <div class="itemdescription container">
            <div class="row">
                <h4>Describe your item:</h4>

                <p><span style="color:red">* required field</span></p>
            </div>

            <!--Form's first row, containing title, condition, and category -->
            <?php echo validation_errors(); ?>


            <?php echo form_open_multipart('Upload_item/do_upload');?>
            <form>
                <div class="row form-group required form-inline">
                    <div class="col-sm-4">
                        <label class="control-label" for="itemname">Title </label>
                        <input type="text" class="form-control" id="itemName" value="<?php echo set_value('item-name')?>" name="item-name">
                    </div>

                    <!--Category Dropdown -->
                    <div class ="col-sm-4">
                        <label class ="control-label" for="categoryselect">Category</label>
                        <select class="form-control" id="categoryselect" name="category-select">
                            <option value="" selected hidden>Select Category</option>
                            <option value="Books" <?php echo set_select('category-select', 'Books'); ?>>Books</option>
                            <option value="Furniture" <?php echo set_select('category-select', 'Furniture'); ?> >Furniture</option>
                            <option value="Electronics" <?php echo set_select('category-select', 'Electronics'); ?>>Electronics</option>
                            <option value="Clothing" <?php echo set_select('category-select', 'Clothing'); ?> >Clothing</option>
                            <option value="Other" <?php echo set_select('category-select', 'Other'); ?>>Other</option>
                        </select>
                    </div>

                    <!--Condition Dropdown-->
                    <div class ="col-sm-4">
                        <label class="control-label" for="itemcondition">Condition</label>
                        <select class="form-control" id="itemcondition" name="item-condition">
                            <option value="" selected hidden>Select Condition</option>
                            <option value="Brand New" <?php echo set_select('item-condition', 'Brand New'); ?> >Brand New</option>
                            <option value="Like New" <?php echo set_select('item-condition', 'Like New'); ?>>Like New</option>
                            <option value="Good" <?php echo set_select('item-condition', 'Good'); ?>>Good</option>
                            <option value="Acceptable" <?php echo set_select('item-condition', 'Acceptable'); ?>>Acceptable</option>
                        </select>
                    </div>
                </div>
                <!-- End first row -->


                <div class="row form-group required">
                    <label class="control-label" for="description">Item Description</label>
                    <textarea class="form-control" rows="5" id="description"  name="description"><?php echo set_value('description')?></textarea>
                </div>



                <div class="row form-group">
                    <label for="photoUpload">Upload photos</label>
                        <input type="file" name="userfile" size="20" />
                        <input type="hidden" name="image-name" value = "<?php echo uniqid(); ?>" />
                </div>
            </div>

            <!-- lower box for payment -->
            <div class="container payment">
                <div class="row">
                    <h4>Payment:</h4>
                </div>
                <div class="row form-group required form-inline">
                    <div class="col-sm-6">
                        <label class="control-label" for="price">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="<?php echo set_value('price') ?>">
                    </div>

                    <div class ="form-group required col-sm-6">
                        <label class="control-label" for="listingduration">Duration</label>

                        <select class="form-control" id="listingduration" name="listing-duration">
                            <option>4 weeks</option>
                            <option>3 weeks</option>
                            <option>2 weeks</option>
                            <option>1 week</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- end payment box -->

            <!-- submit and cancel buttons -->
            <div align="right" class="container submitbuttons">
                <div class="row" id="buttonrow">
                    <a href="<?php echo base_url()?>index.php/home" button class="btn btn-danger pull-left" type="button" id="Cancel">Cancel</button></a>
                    <button class="btn btn-primary" type="submit" name="upload-item" id="submit">Submit</button>
                </div>
            </div>
            <!-- end button row -->
        </form>
        <?php echo form_close() ?>
    </body>

</html>