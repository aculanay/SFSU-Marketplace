<?php
// define variables and set to empty values
$titleErr = $categoryErr = $conditionErr = $photosErr = $descriptionErr = $priceErr = "";
$title = $category = $condition = $photos = $description = $price = "";
?>

<html>
    <head>
        <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
        <meta charset=utf-8 />
        <style>
            .button{margin-left: 16px;}
            .error {color: #FF0000; margin-left: 16px;}
            .fieldwidth{width: 500px; 
                        margin-left: 10%; 
                        margin-right: auto;
                        text-align: center;}
            .filefield{
                font-size: small;
            }
            h1{margin-left: 16px;}

            .indent{margin-left: 16px;}

            label{
                width:180px;
                margin-left: 16px;
            }
            .labelformat{
                color: black;

            }

            .submit{
                color: black;
            }

            article, aside, figure, footer, header, hgroup, 
            menu, nav, section { display: block; }
        </style>
    </head>
    <body>
        <!-- Needed for preview of uploaded images -->
        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#itemPhoto')
                                .attr('src', e.target.result)
                                .width(200)
                                .height(100);
                    };

                    reader.readAsDataURL(input.files[0]);

                    //Set the image preview to not be hidden, when an image is uploaded.
                    $("#itemPhoto").toggle();
                }
            }
        </script>
        <!-- Use CKEditor 4 plugin to make a rich text editor -->
        <script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

        <p><span class="error">* required field.</span></p>

        <form class="labelformat" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">  
            <h1>Describe your item</h1> <br><br>

            <label for="text" class="labelformat">Title: </label>
            <input type="text" name="title" value="<?php echo $title; ?>" class="fieldwidth"/>
            <span class="error">* <?php echo $titleErr; ?></span>
            <br><br>

            <label for="text">Category: </label>
            <select name="category" size="1" class="fieldwidth" >
                <option value="All">All</option>
                <option value="Furniture">Furniture</option>
                <option value="Electronics">Electronics</option>
                <option value="Books">Books</option>
                <option value="Other">Other</option>
            </select>
            <br><br>

            <label for="text">Condition: </label>
            <select name="condition" size="1" class="fieldwidth" >
                <option value="New">All</option>
                <option value="Refurbished">Electronics</option>
                <option value="Used">Furniture</option>
            </select>
            <br><br>

            <!-- Photos | Only images can be uploaded -->
            <label for="text">Photos: </label>
            <div class="filefield">

                <?php echo $error;?>
                <?php echo form_open_multipart('Upload_item/upload_img');?>
                    <input type="file" name="itemPhoto" size="20" />
                    <br /><br />
                    <input type="submit" value="upload" />
                </form>


            </div>
            <br><br>

            <label for="text">Description: </label>
            <div id = "CKeditor_Container">           
                <textarea name="description" id="description" ></textarea>
            </div>
            <script>
                CKEDITOR.replace('description');
                CKEDITOR.config.height = 160;
                CKEDITOR.config.width = 500;
                document.getElementById('CKeditor_Container').style.margin = "0px 0px 0px 310px";
                document.getElementById("CKeditor_Container").style.textAlign = "center";
            </script>
            <br><br>

            <label for="text" class="labelformat">Price: </label>
            <input type="text" name="price" class="fieldwidth"/>$
            <span class="error"> * <?php echo $priceErr; ?></span>
            <br><br>

            <label for="text">Listing Duration: </label>
            <select name="duration" size="1" class="fieldwidth" >
                <option value="_1day">1 day</option> 
                <option value="_2days">2 days</option> 
                <option value="_3days">3 days</option>
                <option value="_4days">4 days</option>
                <option value="_5days">5 days</option>
                <option value="_6days">6 days</option>
                <option value="_7days">7 days</option>
            </select>

            <br><br>
            <div class="labelformat">
                <input class="button"  type="submit" name="submit" value="Cancel" > 
                <input class="button"  type="submit" name="submit" value="Submit" style="float: right;"> 
                <input class="button" type="submit" name="submit" value="Preview" style="float: right;"> 
            </div>


            <br><br>
        </form>


    </body>
</html>
