$(document).ready(function() {
    $('body').removeClass('sidebar-lg-show');
    $.datepicker.setDefaults({
        regional:'th',
        dateFormat:'yy-mm-dd'
    });
    $( "#date_start" ).datepicker();
    $( "#date_end" ).datepicker();

    getDateSurvey();

    $('#year_graduated').change(getDateSurvey);
    $('#fac_name').change(get_maj_by_fac);
    $('#btn_search').click(get_detail);



});//END READY

//=========================== FUNCTION ======================================//

function getDateSurvey(){
    show_preload();
    var url = site_url+"survey_group/get_detail";
    var param = {
        year:$('#year_graduated').val()
    };
    $.post(url, param, function(resp, textStatus, xhr) {
        /*optional stuff to do after success */
        $('#date_start').val(resp.start_survey.substr(0,10));
        $('#date_end').val(resp.end_survey.substr(0,10));
        hide_preload();
    },'json').fail(function(){
        hide_preload();
    });
}

function get_detail(){
    show_preload();
    var url = site_url + "reports/overview_detail?";
    var param = {
        fac_name:$('#fac_name').val(),
        maj_name:$('#maj_name').val(),
        year:$('#year_graduated').val(),
        date_start:$('#date_start').val(),
        date_end:$('#date_end').val()
    };
    param = $.param(param);
    url += param;
    $('#div_detail').load(url, function(){
        // student_chart();
        chart_overview();
        hide_preload();
    });

}

function get_maj_by_fac(){
    show_preload();
    $('#maj_name').html('<option value="">ทั้งหมด</option>');
    var url = site_url + 'student_data/get_maj_by_fac';
    var param = {
        fac_name: $(this).val()
    };
    $.post(url, param, function(resp, textStatus, xhr) {
        $.each(resp,function(index, maj) {
            var html_tag = '<option value="'+maj.maj_name+'">'+maj.maj_name+'</option>';
            $('#maj_name').append(html_tag);
        });
        hide_preload();
    }, 'json').fail(function(){

        hide_preload();
    });
}

function chart_overview(){
    var chart_data = JSON.parse($('#chart_data').html());

    if(chart_data.length == 0 ){
        $('#div_chart').hide();
        return false;
    }
    $('#div_chart').show();
    var label = [], score=[];
    $.each(chart_data, function(index, resp) {
        var title = resp.question_group.replace(/ /g,'\n');
        label.push(title);
        score.push(resp.avg_score);
    });
    var radarChart = new Chart($('#chart_overview'),{
        type: 'radar',
        data: {
            labels: label,
            datasets: [{
                label: 'กราฟแสดงคุณภาพบัณฑิตตามกรอบมาตรฐาน TQF',
                backgroundColor: 'rgba(255,143,190, .3)',
                borderColor: 'rgba(255,143,190, 1)',
                pointBackgroundColor: 'rgba(151, 187, 205, 1)',
                pointBorderColor: '#fff',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(151, 187, 205, 1)',
                data: score
            }]
        },
        options: {
            responsive: true,
            legend: {
                display: false,
            },
            scale: {
                ticks: {
                    beginAtZero: true,
                    max: 5,
                    min: 0,
                    stepSize: 0.5
                },
                pointLabels: {
                    fontSize: 14,
                    fontFamily: "'Sarabun', sans-serif"
                }
            }
        }
    });
}

function get_qlist_data(){

    var qg_id = $(this).data('qg-id');
    if($('#collapse_'+qg_id).is(":visible")){
        $('#collapse_'+qg_id).hide('200');
        return false;
    }else{
        $('.collapseDetail').hide();
        show_preload();
        var param = {
            qg_id: qg_id,
            fac_name:$('#fac_name').val(),
            maj_name:$('#maj_name').val(),
            year:$('#year_graduated').val(),
            date_start:$('#date_start').val(),
            date_end:$('#date_end').val()
        };
        var url = site_url + "reports/overview_answer_list_score";
        $.post(url, param, function(resp, textStatus, xhr) {
            var td_html = '<table class="table table-bordered mb-0 question-list">';
            $.each(resp, function(index, data) {
                var avg_score = (data.sum_score != 0)?numeral(data.sum_score/data.count_survey).format('0.00'):0;
                var level_txt = '';
                if(avg_score>=4.51)level_txt='<span class="text-success">มากที่สุด</span>';
                if(avg_score>=3.51 && avg_score<=4.50)level_txt='<span class="text-success">มาก</span>';
                if(avg_score>=2.51  && avg_score<=3.50)level_txt='<span class="text-primary">พอใช้</span>';
                if(avg_score>=1.51  && avg_score<=2.50)level_txt='<span class="text-warning">น้อย</span>';
                if(avg_score<=1.50)level_txt='<span class="text-danger">น้อยที่สุด</span>';

                td_html +='<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;'+data.order_num+')'+data.title+'</td>'+
                    '<td class="text-center" width="150">'+numeral(data.sum_score).format('0,0')+'</td>'+
                    '<td class="text-center" width="150">'+numeral(data.count_survey).format('0,0')+'</td>'+
                    '<td class="text-center" width="150">'+avg_score+'</td>'+
                    '<td class="text-center" width="150">'+level_txt+'</td></tr>';
            });
            $('#tdCollapse_'+qg_id).html(td_html+'</table>');
            $('#collapse_'+qg_id).show('200');
            hide_preload();


        },'json').fail(function(){
            hide_preload();
            $('#collapse_'+qg_id).hide('500');
        });

    }


}

function print(){
    var url = site_url + "reports/overview_detail_pdf?";
    var param = {
        fac_name:$('#fac_name').val(),
        maj_name:$('#maj_name').val(),
        year:$('#year_graduated').val(),
        date_start:$('#date_start').val(),
        date_end:$('#date_end').val()
    };
    param = $.param(param);
    url += param;
    window.open(url, '_blank');
}
