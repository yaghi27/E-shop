$(document).ready(function(){

    $.ajax({
        url:"http://localhost:8080/TonyTarraf/Shop/start.php",
        method: "POST",
        dataType: "json",
        beforeSend: function(){

        },
        success: function(data)
        {
            $.each(data, function(index, value){
                html = `<tr class = "rowt" data-id = "`+value['id']+`">
                            <td>
                            <i class="fas fa-trash-alt delete" data-id ='`+value['id']+`'></i>
                            <i class="fas fa-pen edit" data-id ='`+value['id']+`'></i>
                            <i class="fas fa-percent sale" data-id = ${value['id']}></i>
                            </td>
                            <td>`+value['name'] +`</td>
                            <td>`+value['size'] +`</td>
                            <td>`+value['image']  +`</td>
                            <td>`+value['description']  +`</td>
                            <td>`+value['color']  +`</td>
                            <td>`+value['price']  +`</td>
                            <td>`+value['category']  +`</td>
                            <td>`+value['code']  +`</td>                          
                        </tr>`;

                $(".table").append(html);
                //$(".table").DataTable();
            })
            $('#table1').DataTable({
                
            });
        },
        error:function(){

        },
        complete: function(){

        }
    });
    $(document).on("click", ".delete", function(){
        var checkId = $(this).attr('data-id');
        $('.modal').modal('show');
        
        $(document).on("click", ".yes", function(){
            $(this).attr('data-id', checkId);
            $('.modal').modal('hide');
             $.ajax({
                url: "http://localhost:8080/TonyTarraf/Shop/delete.php",
                method: "POST",
                data: {html: $(this).attr('data-id')},
                dataType:"json",
                beforeSend: function(){
                
                    },
                success: function (data) {
                        ($(".rowt[data-id="+ checkId +"]")).remove();
                    },
                error: function() {
                        alert("error");
                    },
                complete:function(){
                
                    },
                });
        })
    })
    $(document).on("click", ".no", function(){
        $('.modal').modal('hide');
    });
    $(document).on("click", ".fa-times-circle", function(){
        $('.modal').modal('hide');
    });
    var id;
    $(document).on("click", ".edit", function(){
        $("#editSec").removeClass("displayNone");
        $(document).on("click", "#cancel", function(){
            $("#editSec").addClass("displayNone");
        });
        var dataId= $(this).attr('data-id');
        id = dataId;
        $.ajax({
            url: "http://localhost:8080/TonyTarraf/Shop/edit1.php",
            method: "POST",
            data: {html:dataId },
            dataType: "json",
            beforeSend: function(){
    
            },
            success:function(data){
                if (data !=0)
                {
                    $("#name").val(data[0][0]);
                    $("#size").val(data[0][1]);
                    $("#description").val(data[0][3]);
                    $("#color").val(data[0][6]);
                    $("#price").val(data[0][7]);
                    $("#category").val(data[0][8]);
                    $("#code").val(data[0][9]);
                }
            },
            error: function(){
                alert("error");
            },
            complete:function(){
    
            }
        });
        $(document).on("click", "#comfirm", function(){
            $.ajax({
                url: "http://localhost:8080/TonyTarraf/Shop/edit2.php",
                method: "POST",
                data: $("#editForm").serialize() + "&itemId=" + id,
                //dataType: "json",
                beforeSend: function(){
        
                },
                success:function(data){
                    //if (data !=0)
                    //{
                      $("#editSec").addClass("displayNone");
                      window.location.reload();
                  // }
                },
                error: function(){
                    alert("error");
                },
                complete:function(){
        
                }
            });
        })
    })
    var itemId;
    $(document).on("click", ".sale" , function(){
        $("#sale").removeClass("displayNone");
        itemId = $(this).attr("data-id")
    });
    $(document).on("click", "#saleCancel" , function(){
        $("#sale").addClass("displayNone");
    });
    $(document).on("click", "#saleBtn", function(){
        $.ajax({
            url:"http://localhost:8080/TonyTarraf/Shop/sale.php",
            method: "POST",
            data:{sale: $("#perc").val() ,id : itemId},
            dataType: "json",
            beforeSend: function(){
    
            },
            success: function(data)
            {
                $("#sale").addClass("displayNone");
            },
            error:function(){
                alert("an error has occured");
            },
            complete: function(){
    
            }
        })
    })
    $(document).on("click", "#add", function(){
        $("#addSection").removeClass("displayNone")
    });
    $(document).on("click", "#cancel", function(){
        $("#addSection").addClass("displayNone")
    });
})
