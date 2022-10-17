<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css">
    <link rel="stylesheet" href="./login.css">
    <title>Login Page</title>
</head>
<body>
<div class = "login" id = "login">
        <div class = "container login-cont">
            <h1 id = "loginHeader">Login</h1>
            <form method="POST" id="loginForm">
                <div class="form">
                    <input type = "email" name = "email" class = "email" placeholder="Email@example.com" style = "width:75%; margin-bottom: 30px;">
                    <input type = "password" name = "password" class = "password" placeholder="Password" style = "width:75%">
                </div>
            </form>
            <div style = "text-align: center;">
                <button type = "button" id = "loginBTN">Login <i class="fas fa-sign-in-alt"></i></button> or 
                <button type = "button" id = "signupBTN">Sign up <i class="fas fa-plus"></i></button>
            </div>
        </div>
    </div>
    <div class = "display"  id = "su">
        <div class = "container signup-cont">
            <h1 id = "signupHeader">Sign up</h1>
            <form method="POST" id = "signupForm">
                <div class = "row">
                    <div class = "col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <input type = "text" name = "fname" id="fname" placeholder="First name" style = "width:80%; margin-bottom: 30px;">
                    </div>
                    <div class = "col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <input type = "text" name = "lname" id="lname"  placeholder="Last name" style = "width:80% ; margin-bottom : 30px;">
                    </div>
                </div>
                <div class="row">
                    <div class = "col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <input type = "email" name = "email" id="email"  placeholder="Email@example.com" style = "width:80%; margin-bottom: 30px;">
                    </div>
                    <div class = "col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <input type = "password" name = "password" id="password"  placeholder="Password" style = "width:80%">
                    </div>
                </div>
            </form>
            <div style = "text-align: center;">
                <button type = "button" id = "signupBTN2">Sign up</button>
            </div>
        </div>
    </div>
</body>
<footer> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
        <script type="text/javascript" src="./login.js"></script>   
</footer>
</html>