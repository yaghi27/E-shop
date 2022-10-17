<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css">
    <link rel="stylesheet" href="./style.css">
    <title>Main</title>
</head>
<body>
    <div class="modal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <i class="fas fa-exclamation-triangle"></i>
              <h5 class="modal-title">Attention</h5>
              <i class="fas fa-times"></i>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to remove this user?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="yesBtn">Yes</button>
              <button type="button" class="noBtn" >No </button>
            </div>
          </div>
        </div>
    </div>
    <div class = "container">
    <div id="editSec" class = "displayNone">
     <h4>Edit</h4>
     <form method = "post" id = "editForm">
     <div class ="row">
         <div class = "col-xl-4 col-lg-4 col-md-6 col-sm-12">
             <input type = "text" name="fname" id="fname" placeholder="First name">
         </div>
         <div class = "col-xl-4 col-lg-4 col-md-6 col-sm-12">
             <input type = "text" name="lname" id="lname" placeholder="Last name">
         </div>
         <div class = "col-xl-4 col-lg-4 col-md-6 col-sm-12">
             <input type = "email" name="email" id="email" placeholder="Example@example.com">
         </div>
     </div>
     <div>
          <button type="button" id="saveBtn">Save</button>
          <button type="button" id="cancelBtn">Cancel</button>
     </div>
        </form>
   </div>
        <h3>Employees:</h3>
        <div>
            <table class = "table1" style = "width:100%;">
                <tr>
                    <th>Action</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                </tr>
            </table>
        </div>
    </div>
</body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
    <script type="text/javascript" src="./script.js"></script>  
</html>