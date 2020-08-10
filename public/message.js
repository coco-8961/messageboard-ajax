$(document).ready(function(){
    var id=0;
    //讀取資料
    function getMessages() {
        return new Promise((resolve) => {
            $.ajax({
                url: 'http://localhost:8080/messageboard/get',
                method: 'GET',
                dataType:'json',
                success: (response) => {
                    resolve(response);
                    console.log("get");
                }
            })
        })
    }
    getMessages().then((messages) => {
        console.log(messages);
        $.each(messages, function (key, message) {
            create(message['id'],message['name'],message['content'],message['time']);
            id = message['id'];
            console.log(id);
        });

    });

    function create(id,name,content,time){
        $("tbody").prepend(
            $("<tr>")
                .attr({
                    "id":"message",
                })
                .append(
                    $("<td>")
                        .attr(
                            "id","msg_id",
                        )
                        .text(id),
                    $("<td>")
                        .attr(
                            "id","msg_name",
                        )
                        .text(name),
                    $("<td>")
                        .attr({
                            "id":"msg_content",
                            "class":"align-middle",
                        }   
                        )
                        .text(content),
                    $("<td>")
                        .attr(
                            "id","msg_time",
                        )
                        .text(time),
                    $("<td>")
                        .append(
                            $("<button>")
                                .attr({
                                    "type":"button",
                                    "class":"btn btn-warning",
                                    "id":"bt_edit",
                                    "data-toggle":"modal",
                                    "data-target":"#editModalCenter",
                                })
                                .text("編輯"),
                            $("<button>")
                                .attr({
                                    "type":"button",
                                    "class":"btn btn-danger",
                                    "id":"bt_del",
                                })
                                .text("刪除"),
                        )
                )
            )
    }
    //新增
    $("#addmsg").click(function(){
        //取彈跳視窗input的值
        id++;
        var name = $("#add_name").val();
        var content = $('#add_content').val();
        var myDate = new Date().toLocaleString();
        console.log(name,content,myDate);
        $.ajax({
            url:"http://localhost:8080/messageboard/save",
            type:'POST',
            data:{
            'name':name,
            'content':content,
            'time':myDate,
            },
            success:function(response){
                console.log("add");
                console.log(response);
            }
        })
        create(id,name,content,myDate);
        $("#add_name").val("");
        $("#add_content").val("");
    })

    //刪除
    $("#allmessage").on("click","#bt_del",function(){
        var id = $(this).parent().siblings("#msg_id").text();        
        var del=confirm("確定刪除？");
        if(del==true){
            $(this).parents("tr").remove();  
            $.ajax({
                url:"http://localhost:8080/messageboard/delete/"+id,
                type:'POST',
                success:function(response){
                    console.log("del");
                    console.log(response);
                }
            })  
        }

        
    })

    //編輯
    $("#allmessage").on("click","#bt_edit",function(){
        edit_msg = $(this).parent();
        //拿留言板的值
        var id = edit_msg.siblings("#msg_id").text();
        var name = edit_msg.siblings("#msg_name").text();
        var content = edit_msg.siblings("#msg_content").text();
        // console.log(name,content);

        //將值放入input
        $("#edit_id").val(id);
        $("#edit_name").val(name);
        $("#edit_content").val(content);
    })
    $("#editmsg").click(function(){
        //取彈跳視窗input的值
        var editid = $("#edit_id").val();
        var editname = $("#edit_name").val();
        var editcontent = $('#edit_content').val();
        var editmyDate = new Date().toLocaleString();
        //變更內容
        edit_msg.siblings("#msg_name").text(editname);
        edit_msg.siblings("#msg_content").text(editcontent);
        edit_msg.siblings("#msg_time").text(editmyDate);
        $.ajax({
            url:"http://localhost:8080/messageboard/update",
            type:'POST',
            data:{
            'id':editid,
            'name':editname,
            'content':editcontent,
            'time':editmyDate,
            },
            success:function(response){
                console.log("edit")
            }
        })

    }) 

})
