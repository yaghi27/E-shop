<?php     
    session_start();
    include "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="./shop.css">
    <title>Edit</title>
</head>
<body>
    <div class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <i class="fas fa-exclamation-triangle"></i>
                <h5 class="modal-title">Attention</h5>
                <i class="far fa-times-circle"></i>
            </div>
            <div class="modal-body" style = "text-align:center">
                <p>Are you sure you want to delete this item?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="yes">Yes</button>
                <button type="button" class="no">No</button>
            </div>
            </div>
        </div>
    </div>
    <div class = "container">
        <div id = "editSec" class = "displayNone">
            <form id = "editForm">
                <div class="row">
                    <div class = "col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <input type = "text" name = "name" id="name" placeholder="Item name" style = "width:80%; margin-bottom: 30px; margin-top:30px">
                    </div>
                    <div class = "col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <input type = "text" name = "description" id="description" placeholder="Description" style = "width:80%; margin-bottom: 30px; margin-top:30px">
                    </div>
                </div>
                <div class = "row">
                    <div class = "col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <select class="form-select" aria-label="Default select example" id = "size" name= "size" style = "margin-top:30px;">
                            <option selected>Size</option>
                            <option value="1">Small</option>
                            <option value="2">Medium</option>
                            <option value="3">Large</option>
                        </select>
                    </div>
                    <div class = "col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <input type = "text" name = "color" id="color" placeholder="color" style = "width:80%; margin-bottom: 30px; margin-top:30px">
                    </div>
                </div>
                <div class = "row">
                    <div class = "col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <input type = "number" name = "price" id="price" placeholder="price" style = "width:80%; margin-bottom: 30px; margin-top:30px">
                    </div>
                    <div class = "col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <input type = "number" name = "category" id="category" placeholder="category" style = "width:80%; margin-bottom: 30px; margin-top:30px">
                    </div>
                </div>
                <div class = "btns">
                    <button type="button" id = "comfirm">Comfirm</button>
                    </form>
                    <button type="button" id = "cancel">Cancel</button>
                 </div>
    </div>
    <div id = "sale" class = "displayNone">
        <div class="row">
            <input type = "text" name = "perc" id = "perc" placeholder="Sale" style = "width:20%; margin-bottom: 30px; margin-top:30px">
            <button type="button" id = "saleBtn">Comfirm</button>
            <button type="button" id = "saleCancel">Cancel</button>
        </div>
    </div>
    <button type="button" id = "add">Add item</button>
    <div class = " displayNone" id = "addSection">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            Select image of the product:
            <input type="file" name="fileToUpload" id="fileToUpload" >
            <div class="row" style="margin-top: 15px;">
                <div class = "col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <label for="name">Name:</label><br>
                    <input type = "text" name = "name" id="name" placeholder="Item name" style = "width:80%; margin-bottom: 30px; margin-top:10px">
                </div>
                <div class = "col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <label for="description">Description:</label><br>
                    <input type = "text" name = "description" id="description" placeholder="description" style = "width:80%; margin-bottom: 30px; margin-top:10px">
                </div>
            </div>
            <div class = "row">
                <div class = "col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <label for="size">Size:</label><br>
                    <select class="form-select" id = "size" aria-label="Default select example" name= "size" style = "margin-top:10px; width: 80%;">
                        <option selected>--select--</option>
                        <option value="1">Small</option>
                        <option value="2">Medium</option>
                        <option value="3">Large</option>
                    </select>
                </div>
                <div class = "col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <label for="color">Color:</label><br>
                    <input type = "text" name = "color" id="color" placeholder="color" style = "width:80%; margin-bottom: 30px; margin-top:10px">
                </div>
            </div>
            <div class = "row">
                <div class = "col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <label for="price">Price:</label><br>
                    <input type = "number" name = "price" id="price" placeholder="price" style = "width:80%; margin-bottom: 30px; margin-top:10px">
                </div>
                <div class = "col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <label for="category">Category:</label><br>
                    <input type = "number" name = "category" id="category" placeholder="category" style = "width:80%; margin-bottom: 30px; margin-top:10px">
                </div>
            </div>
            <div class = "row">
                <div class = "col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <label for="qty">Quantity:</label><br>
                    <input type = "number" name = "qty" id="qty" placeholder="quantity" style = "width:80%; margin-bottom: 30px; margin-top:10px">
                </div>
                <div class = "col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <label for="code">Code:</label><br>
                    <input type = "text" name = "code" id="code" placeholder="code" style = "width:80%; margin-bottom: 30px; margin-top:10px">
                </div>
            </div>
            <div class="btns">
                <input type="submit" value="Upload Item" name="submit" style = "text-align:right" id = "submit">
            </form>
            <button type="button" id = "cancel">Cancel</button>
        </div>
    </div>

        <table class = "table" id = "table1" style="margin-top: 30px;">
            <tr>
                <thead>
                    <th>Action</th>
                    <th>Name</th>
                    <th>Size</th>
                    <th>Image</th>
                    <th>Descrption</th>
                    <th>Color</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Code</th>
                </thead>           
            </tr>
            <tbody>

            </tbody>
        </table>
        
    </div>
</body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="./edit.js"></script>  
</html>