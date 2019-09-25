$(document).ready(function() {


});//END Ready

function save(){
    $('.btn-save').attr("disabled", true);
    var url = site_url+"/web_contents/save";
    var param = $('form[name="frm_add"]').serializeJSON();
    $.post(url, param, function(resp, textStatus, xhr) {
        if(resp.is_success){
            alert(resp.msg);
            window.location.reload();
        }else{
            $('.btn-save').attr("disabled", false);
            alert(resp.msg);
        }
    },'json').fail(function(){
        $('.btn-save').attr("disabled", false);
        alert('Fail');
    });
}
