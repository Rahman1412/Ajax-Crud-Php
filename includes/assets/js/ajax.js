$(document).ready(function(){
    
    get_student_list();

    $(document).on("submit","#student_form",function(e){
        e.preventDefault();
        let formData = new FormData(this);
        formData.append("action","add_student");
        $.ajax({
            url:'includes/connection.php',
            type:'POST',
            data:formData,
            contentType:false,
            processData:false,
            dataType:"JSON",
            success:function(data){
                if(data.code === 400){
                    $.each(data,function(key,value){
                        $("."+key).text(value);
                    })
                }
                if(data.code == 200){
                    $("#student_form")[0].reset();
                    $('.close').click();
                    get_student_list();
                }
            }      
        });
    });
});

function get_student_list(){
    $('#student_record').html("");
    $.ajax({
        url: 'includes/connection.php',
        type: 'GET',
        data:{
            action : 'get_list_student',
        },
        dataType:"JSON",
        success:function(data){
            if(data.code === 200){
                if(data.student_data.length >0){
                    var rows = '';
                    $.each(data.student_data,function(key,value){
                        rows = rows+"<tr>\
                        <td>"+value['id']+"</td>\
                        <td>"+value['name']+"</td>\
                        <td><img src='includes/uploads/"+value['image']+"' width='100px'/></td>\
                        <td>"+value['email']+"</td>\
                        <td>"+value['phone']+"</td>\
                        <td>"+value['dob']+"</td>\
                        <td>\
                        <span class='badge badge-danger' style='cursor:pointer;' onclick='delete_student(this)' data-s_id='"+value['id']+"' data-img_id='"+value['image']+"'>Delete</span>\
                        </td>\
                        </tr>";
                    });
                    $('#student_record').html(rows);
                }
            }
        }
    });
}


function delete_student(element){
    let student_id = $(element).data('s_id');
    let image = $(element).data('img_id');
    $.ajax({
        url:'includes/connection.php',
        type:'POST',
        data:{
            action:'delete_student',
            id:student_id,
            image:image
        },
        dataType:"JSON",
        success:function(data){
            if(data.code === 200){
                get_student_list();
            }
        }
    });
}