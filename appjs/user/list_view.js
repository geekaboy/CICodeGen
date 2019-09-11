$(document).ready(function() {
  $('.btn-del').click(del);
});

function del(){
  var username = $(this).attr('data-username');
  swal({
    type:'warning',
    title:'ยืนยันการลบ',
    showCancelButton: true,
    confirmButtonText: 'Yes'
  }).then(function(result) {
    if(result.value){
      var url = site_url+'user/del';
      var param = {
        username:username
      };
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
          swal({
            type: 'warning',
            title: 'แจ้งเตือน',
            html: data.message
          });
        }
      }, 'json').fail(function(){
        swal({
          type: 'warning',
          title: 'แจ้งเตือน',
          html: data.message
        });

      });
    }//end if
  });//end swal
}
