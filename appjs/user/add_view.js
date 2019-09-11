$(document).ready(function() {
  $('#btn_save').click(save);
});

function save(){
  var btn_save = $(this);
  btn_save.prop('disabled', true);
  var param = $('#frm_user').serializeJSON();
  var url = site_url+'/user/save';

  $.post(url, param, function(data, textStatus, xhr) {

    if(data.is_successful){
      swal({
        type: 'success',
        title: 'สำเร็จ',
        html: data.message
      }).then(function(){
        window.location.reload();
      });
    }else{
      btn_save.prop('disabled', false);
      swal({
        type: 'warning',
        title: 'แจ้งเตือน',
        html: data.message
      });

    }
  }, 'json').fail(function(){

    btn_save.prop('disabled', false);
    swal({
      type: 'warning',
      title: 'แจ้งเตือน',
      html: data.message
    });

  });

}
