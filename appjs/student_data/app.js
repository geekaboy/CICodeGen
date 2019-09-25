$(document).ready(function () {

    get_list();

    $('#btn_search').click(get_list);
    $('#btn_clear').click(clear_search);
    $('#search_text').change(function (e) {
        e.preventDefault();
        if($(this).val() == ''){
            get_list();
        }

    });

});//End ready

function get_list(){
    $('#dev_table').html('');
    var url = site_url+"student_data/get_list?"+
                'search_text='+$('#search_text').val();
    $('#div_table').load(url, function (response, status, request) {
        console.log('status=>', status);
    });

}

function clear_search(){
    $('#search_text').val('');
    get_list();
}

function del(el) {
    var cf = confirm("Want to delete?");
    if(!cf){
        return false;
    }
    var url = site_url + "student_data/del";
    var param = {
        id: $('el').val()
    };

    $.post(url, param, function (resp, textStatus, xhr) {
        if (resp.is_success) {
            alert(resp.msg);
        }else{
            alert(resp.msg);
        }
    }, 'json').fail(function(){
        alert("Fail");
    });
}
