$(document).ready(function() {

    $('#province').change(get_amphures);

    $('#amphures').change(get_districts);

    $('#tambon').change(function(event) {
        var zip_code = $('option:selected', this).data('zip-code');
        $('#zipcode').val(zip_code);
    });

    $('[name="work_status"]').change(function(event) {
        if($(this).val() == '0'){
            $('#div_no_work').show();
            $('#div_have_work').hide();
        }else {
            $('#div_no_work').hide();
            $('#div_have_work').show();

        }
    });

    $('#frm_survey').on('submit', save);

    $('#btn_send_no_work').click(function(event) {
        show_preload();
        $('#btn_sendForm').attr("disabled", true);
        var url = $('#frm_survey').attr('action');
        var param = {
            std_id:$('#std_id').val(),
            citizen_id:$('#citizen_id').val(),
            token_code:$('#token_code').val(),
            work_status:0
        };
        $.post(url, param, function(resp, textStatus, xhr) {
            hide_preload();
            if(resp.is_success){
                window.location.href = site_url+"survey/success_view";

            }else{
                $('#btn_send_no_work').attr("disabled", false);

                new PNotify({
                    title: 'แจ้งเตือน',
                    text: resp.msg,
                    type: 'warning'
                });
            }


        },'json').fail(function(){
            $('#btn_send_no_work').attr("disabled", false);

            hide_preload();
        });
    });

});//END READY

function get_amphures(){
    show_preload();
    var province_id = $('option:selected', this).data('code');
    var url = site_url+"address/get_amphures";
    $.post(url, {province_id: province_id}, function(data, textStatus, xhr) {

        var el_option = '<option value="0">เลือกอำเภอ</option>';
        $.each(data, function(index, el) {
            // console.log(el);
            el_option = el_option+'<option value="'+el.name_th+'" data-code="'+el.id+'">'+el.name_th+' ('+el.name_en+')'+'</option>';
            $('#amphures').html(el_option);
        });
        hide_preload();
    },'json').fail(function(){
        hide_preload();
    });

}

function get_districts(){
    show_preload();
    var amphure_id = $('option:selected', this).data('code');
    var url = site_url+"address/get_districts";
    $.post(url, {amphure_id: amphure_id}, function(data, textStatus, xhr) {
        console.log(data);
        var el_option = '<option value="0">เลือกตำบล/แขวง</option>';
        $.each(data, function(index, el) {
            // console.log(el);
            el_option = el_option+'<option value="'+el.name_th+'" data-code="'+el.id+'" data-zip-code="'+el.zip_code+'">'+el.name_th+' ('+el.name_en+')'+'</option>';
            $('#tambon').html(el_option);
        });
        hide_preload();

    },'json').fail(function(){
        hide_preload();
    });

}

function save(event){
    event.preventDefault();
    show_preload();
    $('#btn_sendForm').attr("disabled", true);
    var url = $(this).attr('action');
    var param = $(this).serializeJSON();
    $.post(url, param, function(resp, textStatus, xhr) {
        hide_preload();
        if(resp.is_success){
            window.location.href = site_url+"survey/success_view";

        }else{
            $('#btn_sendForm').attr("disabled", false);

            new PNotify({
                title: 'แจ้งเตือน',
                text: resp.msg,
                type: 'warning'
            });
        }


    },'json').fail(function(){
        $('#btn_sendForm').attr("disabled", false);

        hide_preload();
    });
}
