$(document).ready(function () {
    load_list();

    $('#btn_save').click(save);

}); //End ready

function load_list() {
    show_preload();
    $('#div_list').load(site_url + 'question/list_view', function(){
        hide_preload();
    });
}

function save(){

    if($('#question_group').val() == '' || $('#question_text').val() == ''){
  
        Swal.fire({
            type: 'warning',
            title: 'Oops...',
            text: 'กรุณากรอกคำถาม',
        });
      return false;
    }
    show_preload();
    var url = site_url+"question/question_save";
    var param = {
      question_group:$('#question_group').val(),
      question_name:$('#question_text').val()
    };
    $.post(url, param, function(data, textStatus, xhr) {
      if(data.is_success){
        $('#question_text').val('');
        load_list();
      }
    },'json').fail(function(){
        hide_preload();
    });
  }
  