$(document).ready(function() {

    $('#btn_work_cause').click(function (e) {
        e.preventDefault();
        show_preload();

        $('#btn_work_cause').attr("disabled", true);

        var url = site_url+"survey/save";
        var param = {
            work_status: $('input[name="work_status"]:checked').val(),
            work_cause: $('#work_cause').val(),
            student_workplace_id: $('#student_workplace_id').val(),
            std_id: $('#std_id').val(),
            citizen_id: $('#citizen_id').val(),
            token_code: $('#token_code').val()
        };

        $.post(url, param, function (resp, textStatus, jqXHR) {
            if (resp.is_success) {

                window.location.href = site_url+"survey/success_view";

            }else{
                $('#btn_work_cause').attr("disabled", false);
                hide_preload();

                new PNotify({
                    title: 'แจ้งเตือน',
                    text: 'กรุณาตรวจสอบอีกครั้ง',
                    type: 'warning'
                });
            }
        },"json").fail(function(data){
            $('#btn_work_cause').attr("disabled", false);
            hide_preload();

            new PNotify({
                title: 'แจ้งเตือน',
                text: 'กรุณาตรวจสอบอีกครั้ง',
                type: 'warning'
            });

        });

    });

    $('input[name="work_status"]').change(function (event) {
        if ($(this).val() == 0) {
            $('#div_cause').fadeIn();
            $('#q_form').fadeOut();
            $('#work_cause').focus();
        } else {
            $('#div_cause').fadeOut();
            $('#q_form').fadeIn();

        }
    }); //End event

    $('#q_form').on('submit', function(event) {
        event.preventDefault();
        console.log($('.answer:checked'));
        send_form();
    });



});//End ready


//=============================== FUNCTION ==================================//


function send_form() {
    show_preload();
    $("#btn_sendForm").attr("disabled", true);
    var answer = get_answer();

    var param = {
        work_status: $('input[name="work_status"]:checked').val(),
        organiz_name: $('#organization_name').val(),
        student_workplace_id: $('#student_workplace_id').val(),
        organiz_type: $("input[name='organiz_type']:checked").val(),
        organiz_type_other: $("#organiz_type_other").val(),
        director_type: $("input[name='director_type']:checked").val(),
        director_type_other: $("#director_type_other").val(),
        education_lev: $("input[name='education_lev']:checked").val(),
        std_id: $('#std_id').val(),
        token_code: $('#token_code').val(),
        citizen_id: $('#citizen_id').val(),
        std_name: $("#std_name").val(),
        work_position: $("#work_position").val(),
        maj_name: $("#maj_name").val(),
        fac_name: $("#fac_name").val(),
        work_year: $("#work_year").val(),
        work_month: $("#work_month").val(),
        answer_list: answer,
        comment_note: $('#comment_note').val(),
        work_cause: $('#work_cause').val()
    };

    url = site_url+"survey/save";
    $.post(url, param, function (resp, textStatus, xhr) {
        console.log(resp);
        if (resp.is_success) {

            window.location.href = site_url+"survey/success_view";

        }else{

            $('#btn_sendForm').attr("disabled", false);
            new PNotify({
                title: 'แจ้งเตือน',
                text: resp.msg,
                type: 'warning'
            });

        }
    }, 'json').fail(function(){

        $('#btn_sendForm').attr("disabled", false);

    });


}

function get_answer() {
    var answer = [];
    var answer_list = $('.answer:checked');
    $.each(answer_list, function (index, el) {

        answer.push({
            question_list_id: $(el).data('list-id'),
            question_group_id: $(el).data('group-id'),
            answer: $(el).val(),
        });

    });
    return answer;
}
