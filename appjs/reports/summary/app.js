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
    $('#btn_search').click(get_detail);

});//END READY

//=========================== FUNCTION ======================================//

function getDateSurvey(){
    show_preload();
    var url = site_url+"survey_group/get_detail"
    var param = {
        year:$('#year_graduated').val()
    }
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
    var url = site_url + "reports/summary_detail";
    var param = {
        year:$('#year_graduated').val(),
        date_start:$('#date_start').val(),
        date_end:$('#date_end').val()
    }
    $('#div_detail').load(url,param, function(){
        student_chart();
        employer_chart();
        hide_preload();
    });

}

function student_chart(){
    var data_chart = [
        $('#avg_std_work').val(),
        $('#avg_std').val()
    ];
    console.log(data_chart);
    var pieChart = new Chart($('#student-chart-area'),{
        type: 'pie',

        data: {
            labels: ['มีงานทำ', 'ไม่ตอบกลับ หรือไม่มีงานทำ'],
            datasets: [{
                data: data_chart,
                backgroundColor: ['#b1cc9f', '#f4785e'],
                hoverBackgroundColor: ['#a2cc86', '#f2674a']
            }]
        },
        options: {
            responsive: true,
            tooltips: {
                callbacks: {
                    label: function(tooltipItem, data) {
                        return data['labels'][tooltipItem['index']] + ': ' + data['datasets'][0]['data'][tooltipItem['index']] + '%';
                    }
                }
            }
        }
    });


}

function employer_chart(){
    var data_chart = [
        $('#avg_employer_answer').val(),
        $('#avg_employer_suvey').val()
    ];
    console.log(data_chart);
    var pieChart = new Chart($('#employer-chart-area'),{
        type: 'pie',

        data: {
            labels: ['ตอบกลับ', 'ยังไม่ตอบกลับ'],
            datasets: [{
                data: data_chart,
                backgroundColor: ['#a5dad2', '#f7d47a'],
                hoverBackgroundColor: ['#78d7c9', '#f7c950']
            }]
        },
        options: {
            responsive: true,
            tooltips: {
                callbacks: {
                    label: function(tooltipItem, data) {
                        return data['labels'][tooltipItem['index']] + ': ' + data['datasets'][0]['data'][tooltipItem['index']] + '%';
                    }
                }
            }
        }
    });


}
