$(document).ready(function () {
    $('#btn_edit').click(function (e) { 
        e.preventDefault();
        if($('#question_group').val() == '' || $('#question_text').val() == ''){
  
            Swal.fire({
                type: 'warning',
                title: 'Oops...',
                text: 'กรุณากรอกคำถาม',
            });
          return false;
        }
        Swal.fire({
            title: 'Confirmation',
            text: 'ท่านต้องการแก้ไขข้อมูล ใช่ หรือ ไม่ ?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ใช่',
            cancelButtonText: 'ไม่'
        }).then(function(result){
            if (result.value) {
    
                show_preload();
                var url = site_url+"question/question_update";
                var param = {
                group_id:$('#group_id').val(),
                    id:$('#id').val(),
                    title:$('#question_text').val()
                };
                $.post(url, param, function(data, textStatus, xhr) {
                    if(data.is_success){
                        window.location = site_url+"question/add_view";
                    }
                },'json');
            }
        });
    
        
    });
});//end ready