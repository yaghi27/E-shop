$(document).ready(function(){

    $(document).on("click", "#signupBTN", function(){
        document.getElementById("su").classList.remove('display');
        document.getElementById("login").classList.add('display');
    });

    $(document).on("click", "#signupBTN2", function(){
        if (validateSignupForm()) {
            $.ajax({
                url:"http://localhost:8080/TonyTarraf/Login/signup.php",
                method: "POST",
                data: $("#signupForm").serialize(),
                dataType: "json",
                beforeSend: function(){
        
                },
                success: function(data)
                {
                    var flag = data[0];
    
                    if (flag == 1) {
                        document.getElementById("login").classList.remove('display');
                        document.getElementById("su").classList.add('display');
                    } else {
                        var msg = data[1];
                        alert(msg);
                    }
                },
                error:function(){
                    alert("an error has occured");
                },
                complete: function(){
        
                }
            })
        }

    })
    $(document).on("click", "#loginBTN", function(){
        if (validateLoginForm()) {
            $.ajax({
                url:"http://localhost:8080/TonyTarraf/Login/loginphp.php",
                method: "POST",
                data: $("#loginForm").serialize(),
                dataType: "json",
                beforeSend: function(){
        
                },
                success: function(data)
                {
                if (data == 1)
                {
                    location.href = '../Shop/shop.php';
                }
                },
                error:function(){
                    alert("an error has occured");
                },
                complete: function(){
        
                }
            })
        }
    });
})
function validateLoginForm(){
    var email = $(".email").val();
    var password = $(".password").val();
    if (email.trim() == "") {
        alert("Email Address is required.");
        return false;
    } else {
        if (!validateEmail(email)) {
            alert("Invalid Email Address.");
            return false;
        }
    }

    if (password.trim() == "") {
        alert("Password is required.");
        return false;
    }
    return true;

}

function validateSignupForm () {
    var fname = $("#fname").val();
    var lname = $("#lname").val();
    var email = $("#email").val();
    var password = $("#password").val();

    if (fname.trim() == "") {
        alert("First Name is required.");
        return false;
    }

    if (lname.trim() == "") {
        alert("Last Name is required.");
        return false;
    }

    if (email.trim() == "") {
        alert("Email Address is required.");
        return false;
    } else {
        if (!validateEmail(email)) {
            alert("Invalid Email Address.");
            return false;
        }
    }

    if (password.trim() == "") {
        alert("Password is required.");
        return false;
    }

    return true;
}


// Email Validation //
function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return email.match(re);
}