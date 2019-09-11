$(document).ready(function () {
    $('body').removeClass('sidebar-lg-show');
    get_employer_list();

    $('#btn_search').click(get_employer_list);
    $('#btn_clear').click(clear_search);
    $('#search_text').change(function (e) {
        e.preventDefault();
        if($(this).val() == ''){
            get_employer_list();
        }

    });



});//End ready

function get_employer_list(){
    show_preload();
    $('#dev_table').html('');
    var url = site_url+"send_survey/get_employer_list?"+
                'search_text='+$('#search_text').val()+
                '&is_answer='+$('#is_answer').val()+
                '&year_graduated='+$('#year_graduated').val();
    $('#div_table').load(url, function (response, status, request) {

        hide_preload();

    });

}

function send_survey(){
    show_preload();
    var employer_list = $('input[name="employer[]"]:checkbox:checked').map(function() {
        return {
            id:$(this).val(),
            std_id:$(this).data('std-id'),
            citizen_id:$(this).data('citizen-id'),
            email:$(this).data('email')
        };
    }).get();

    var url = site_url+'send_survey/send_employer';
    var param = {
        list:employer_list,
        cse_email: $('#cse_email').val()
    };
    $.post(url, param, function(resp, textStatus, xhr) {
        hide_preload();
        Swal.fire({
          title: 'ส่งเรียบร้อยแล้ว',
          type: 'info',
          html:
            'จำนวนส่งสำเร็จ: ' +resp.success_list.length+'<br>'+
            'จำนวนส่งไม่สำเร็จ: ' +resp.fail_list.length
        })

    },'json').fail(function(){
        hide_preload();
    });

}

function clear_search(){
    $('#search_text').val('');
    $('#year_graduated').val("2560").change();
    $('#is_answer').val("0").change();
    get_employer_list();
}
