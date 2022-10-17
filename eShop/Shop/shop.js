$(document).ready(function(){
    $.ajax({
        url:"http://localhost:8080/TonyTarraf/Shop/load.php",
        method: "POST",
        dataType: "json",
        beforeSend: function(){

        },
        success: function(data)
        {
            const codes = [];
            var i = 0;
            var testToAppend1 = `<div class="imageDiv">`;
            var testToAppend2 = `<div class="imageDiv">`;
                $.each(data, function(index, value){
                    var size = codes.length;
                    var exist = 0;
                    for (var j=0; j<size; j++)
                    {
                        if(codes[j] == value['code'])
                        {
                            exist = 1;
                        }
                    }
                    if(exist ==0)
                    {
                        codes[i] = value['code'];
                        i++;
                        if(value['category'] == 1)
                        {
                            if(value['sale']!=1)
                            {
                            testToAppend1 +=`<div class = "item" style = "margin-top:40px">
                                                <img src="../items/${value['image']}" id = "${value['code']}" class = "img1">
                                                <p>${value['name']} <i class="fas fa-eye view" data-id = ${value['code']}></i></p>
                                                <p style = "text-decoration: line-through;">${value['price']} $</p>
                                                <p>${value['fprice']} $</p>
                                            </div>`                        
                            }
                            else{
                            testToAppend1 +=`<div class = "item">
                                                <img src="../items/${value['image']}" class = "img1" id = "${value['code']}">
                                                <p>${value['name']} <i class="fas fa-eye view" data-id = ${value['code']}></i></p>
                                                <p>${value['fprice']} $</p>
                                            </div>`                
                        
                            }
                        }
                        else if(value['category'] == 2)
                        {
                            if(value['sale']!=1)
                            {
                            testToAppend2 +=`<div class = "item" style = "margin-top:40px">
                                                <img src="../items/${value['image']}" class = "img1" id = "${value['code']}">
                                                <p>${value['name']} <i class="fas fa-eye view" data-id = ${value['code']}></i></p>
                                                <p style = "text-decoration: line-through;">${value['price']} $</p>
                                                <p>${value['fprice']} $</p>
                                            </div>`
                        
                            }
                            else
                            {
                                testToAppend2 +=`<div class = "item">
                                                    <img src="../items/${value['image']}" class = "img1" id = "${value['code']}">
                                                    <p>${value['name']} <i class="fas fa-eye view" data-id = ${value['code']}></i></p>
                                                    <p>${value['fprice']} $</p>
                                                </div>`
                            
                                }
                        }
                    }
                });
                
                testToAppend1+="</div>";
                testToAppend2+="</div>";
                 $(".category1").append(testToAppend1);
                 $(".category2").append(testToAppend2);

        },
        error:function(){

        },
        complete: function(){

        }
    });
  $(document).on("click", ".view", function(){
    $("#qty").val("1");
    $('#modal').modal('show');
    dataId= $(this).attr('data-id');
    $(".atc").attr('data-id', dataId);
    $.ajax({
        url:"http://localhost:8080/TonyTarraf/Shop/modal.php",
        method: "POST",
        data: {html:dataId },
        dataType: "json",
        beforeSend: function(){

        },
        success: function(data)
        {
            var title = `<h5 class="modal-title">${data[0]['name']}</h5>`
            document.getElementById("header").innerHTML = title;
            var body = `<img src="../items/${data[0]['image']}" class = "modalimg">
                        <p class = "itemp">${data[0]['description']}</p>
                        <p class = "itemp"> Color: ${data[0]['color']}</p>`;
            document.getElementById("body").innerHTML = body;
            var price = `<p id="elementPrice" data-price='${data[0]['fprice']}' class = "itemp">Price : ${data[0]['fprice']} $</p>`;
            document.getElementById("price").innerHTML = price;
            var size = "";
            $.each(data, function(index, value){
                var label;
                if(value['size'] == 1)
                {
                    label = "Small";
                }
                else if(value['size'] == 2){
                    label = "Medium";
                }
                else{
                    label = "Large";
                }
                size+=`<button type = "button" class = "sizeBtn" size-id = "${value['size']}" clicked-id = 0 code-id = "${value['code']}">${label}</button>`;
                document.getElementById("size").innerHTML = size;
            });


            
        },
        error:function(){

        },
        complete: function(){

        }
    })
  })
  $(document).on("click", ".sizeBtn", function(){
    $(this).attr("clicked-id", 1);
    $(".size").not(this).each(function(){
        $(this).attr("clicked-id", 0);
    })
    $.ajax({
        url:"http://localhost:8080/TonyTarraf/Shop/size.php",
        method: "POST",
        data: {code: $(this).attr("code-id"), size:$(this).attr("size-id")},
        dataType: "json",
        beforeSend: function(){

        },
        success: function(data)
        {
            var quantity = $("#qty").val();
            var total = parseInt(quantity) * parseInt(data[0]['fprice']);
            var price = `<p id="elementPrice" data-price='${data[0]['fprice']}' class = "itemp">Price :` +total+  ` $</p>`;
            document.getElementById("price").innerHTML = price;
        },
        error:function(){
            alert("error");
        },
        complete: function(){

        }
    })
  });
  $(document).on("click", ".no", function(){
    $('#modal').modal('hide');
    $("#qty").val("1");
  });
  $("#qty").change(function(){
    var price = $("#elementPrice").attr("data-price");
    var quantity = $("#qty").val();

    if (quantity > 0) {
        var total = parseInt(price) * parseInt(quantity);
    
        $("#elementPrice").html(`Price: ${total} $`);
    } else {
        $("#qty").val("0");
        $("#elementPrice").html(`Price: 0 $`);
    }

  });
  $(document).on("click", ".close", function(){
        $('#modal').modal('hide');
        $("#qty").val("1");
   });
   $(document).on("click", ".closeIcon", function(){
        $('#cart').modal('hide');
    });
    $(document).on("click", ".no2", function(){
        $('#cart').modal('hide');
    });
   $(document).on("click", "#logout",function(){
    $.ajax({
        url:"http://localhost:8080/TonyTarraf/Shop/logout.php",
        method: "POST",
        dataType: "json",
        beforeSend: function(){

        },
        success: function(data)
        {
            location.href = 'shop.php';
        },
        error:function(){
            alert("an error has occured");
        },
        complete: function(){

        }
    })
    return false;
    });
    $(document).on("click", ".atc", function(){
        var quantity = $("#qty").val();
        $.ajax({
            url:"http://localhost:8080/TonyTarraf/Shop/addToCart.php",
            method: "POST",
            data: {code : $(this).attr("data-id"), qty : $("#qty").val(), size : $(".sizeBtn[clicked-id = '1']").attr("size-id")},
            dataType: "json",
            beforeSend: function(){
    
            },
            success: function(data)
            {
                $('#modal').modal('hide');
                var price = quantity * data[0]['fprice'];
                var testToAppend = `<div class = "row cartItem" row-id = "${data[0]['id']}" qty = "${quantity}" price = "${data[0]["fprice"]} ">
                                    <img src="../items/${data[0]['image']}" class = "imgCart" style="margin:10px">
                                    <p style = "text-align :left">${data[0]['name']}<br>
                                                                  Quantity: ${quantity}<br>
                                                                  Size: ${data[0]['size']}<br>
                                                                  Color: ${data[0]['color']}<br>
                                                                  Price: ${price} $
                                    </p>
                                    <i class="fas fa-trash-alt delete"></i>
                                    </div>`
                document.getElementById("cartBody").innerHTML += testToAppend;
            },
            error:function(){
                alert("Not enough quantity in our stocks");
            },
            complete: function(){
    
            }
        })
    });
    $(document).on("click", ".delete", function(){
        $(this).parent().remove();
    })
    $(document).on("click", ".buy", function(){
        var total = 0;
        $('.cartItem').each(function(i, obj) {
            itemId = $(this).attr("row-id");
            qty = $(this).attr("qty");
            price = $(this).attr("price");
            total += qty * price;
            $.ajax({
                url:"http://localhost:8080/TonyTarraf/Shop/buy.php",
                method: "POST",
                data: {id : itemId, quantity:qty},
                dataType: "json",
                beforeSend: function(){
        
                },
                success: function(data)
                {
                    $(".cartItem").remove();
                    $('#cart').modal('hide');
                },
                error:function(){
                    alert("an error has occured");
                },
                complete: function(){
        
                }
            });
        })
        alert("Your total is " + total + " $");
    });
    $(document).on("click", "#Carts", function(){
        $('#cart').modal('show');
    });
})