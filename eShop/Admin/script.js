$(document).ready(function(){
    $.ajax({
        url:"http://localhost:8080/TonyTarraf/start.php",
        method: "POST",
        dataType: "json",
        beforeSend: function(){

        },
        success: function(data)
        {
            var html ="";
            $.each(data, function(index, value){
                html = `<tr class = "rowt" data-id = "`+value['id']+`">
                        <td><i class="fas fa-trash-alt deleteUser" data-id ='`+value['id']+`'></i>        
                            <i class="fas fa-pen" data-id ='`+value['id']+`'></i>
                        </td>
                        <td>`+value['fname'] +`</td>
                        <td>`+value['lname'] +`</td>
                        <td>`+value['email']  +`</td>
                    </tr>`
                $(".table1").append(html);

            })

        },
        error:function(){

        },
        complete: function(){

        }
    });
    $(document).on("click", ".noBtn", function(){
        $('.modal').modal('hide');
    });
    $(document).on("click", ".fa-times", function(){
        $('.modal').modal('hide');
    });

    $(document).on("click", ".deleteUser", function(){
        $('.modal').modal('show');
        var checkId = $(this).attr('data-id');
        $(".yesBtn").attr('data-id', checkId);
        $(document).on("click", ".yesBtn", function(){
            $('.modal').modal('hide');
                $.ajax({
                    url: "http://localhost:8080/TonyTarraf/delete.php",
                    method: "POST",
                    data: {html: $(this).attr('data-id')},
                    dataType:"json",
                    beforeSend: function(){
    
                    },
                    success: function (data) {
                        if(data == 1)
                        {
                            ($(".rowt[data-id="+ checkId +"]")).remove();
                        }
                    },
                    error: function() {
                        alert("error");
                    },
                    complete:function(){
                        
                    },
                });
            });
        });
        $(document).on("click", ".fa-pen", function(){
            $("#editSec").removeClass("displayNone");
            dataId= $(this).attr('data-id');
            $.ajax({
                url: "http://localhost:8080/TonyTarraf/edit1.php",
                method: "POST",
                data: {html:dataId },
                dataType: "json",
                beforeSend: function(){
        
                },
                success:function(data){
                    if (data !=0)
                    {
                        $("#fname").val(data[0][2]);
                        $("#lname").val(data[0][3]);
                        $("#email").val(data[0][4]);;
                    }
                },
                error: function(){
                    alert("error");
                },
                complete:function(){
        
                }
            });
            $(document).on("click", "#cancelBtn", function(){
                $("#editSec").addClass("displayNone");
            })
            $(document).on("click", "#saveBtn", function(){
                $.ajax({
                    url: "http://localhost:8080/TonyTarraf/edit.php",
                    method: "POST",
                    data: $("#editForm").serialize() + "&html=" + dataId,
                    dataType: "json",
                    beforeSend: function(){
                        
                    },
                    success:function(data){
                        var flag = data[0];
                        var msg = data[1];
                        if(flag==1)
                        {
                            $("#editSec").addClass("displayNone");
                            $.ajax({
                                url:"http://localhost:8080/TonyTarraf/start.php",
                                method: "POST",
                                dataType: "json",
                                beforeSend: function(){
                        
                                },
                                success: function(data)
                                {
                                    $(".rowt").remove();
                                    var html ="";
                                    $.each(data, function(index, value){
                                        html = `<tr class = "rowt" data-id = "`+value['id']+`">
                                                <td><i class="fas fa-trash-alt deleteUser" data-id ='`+value['id']+`'></i>        
                                                    <i class="fas fa-pen" data-id ='`+value['id']+`'></i>
                                                </td>
                                                <td>`+value['fname'] +`</td>
                                                <td>`+value['lname'] +`</td>
                                                <td>`+value['email']  +`</td>
                                            </tr>`
                                        $(".table1").append(html);
                        
                                    })
                        
                                },
                                error:function(){
                        
                                },
                                complete: function(){
                        
                                }
                            });
                        }
                        else{
                            alert(msg);
                        }
                        
                    },
                    error: function(){
                        alert("error22");
                    },
                    complete:function(){
            
                    }
                });

        });
})})