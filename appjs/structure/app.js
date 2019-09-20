$(document).ready(function() {

    $('#db_table').change(get_build_form_view);

});//END READY

function get_build_form_view(){
    show_preload();
    $('#div_build_form').html('');
    $('#div_code_view').html('');
    if($(this).val() == ''){
        hide_preload();
        return false;
    }

    var param = {
        table_name:$(this).val()
    };
    var url = site_url+'create/build_form_view?';
    url+= $.param(param);
    $('#div_build_form').load(url,function(){

        $('html, body').animate({
            scrollTop: $('#div_build_form').offset().top - 60
        }, 500, 'linear');
        $('.input-type').change(input_type_change);
        $('.btn-add-option').click(addNewOption);
        hide_preload();
    });

}

function generate() {
    show_preload();
    $('#div_code_view').html('');
    var form = $('input[name="input_form[]"]:checked');
    var input_list = [];
    $.each(form, function(index, el) {
        var column_name = $(el).data('column-name');
        var option = $('#option_'+column_name+'_val').text();
        if(option != ''){
            option = JSON.parse($('#option_'+column_name+'_val').text());
        }
        var arr = {
            'column_name':column_name,
            'label':$('#input_label_'+column_name).val(),
            'column_default':$(el).data('column-default'),
            'data_type':$(el).data('data-type'),
            'input_type':$('#'+column_name+'_type').val(),
            'option':option
        };
        input_list.push(arr);
    });

    var param = {
        db_table: $('#db_table').val(),
        form_name:$('#form_name').val(),
        developer_name:$('#developer_name').val(),
        input_list:input_list
    };
    var url = site_url+'create/generate';
    $('#div_code_view').load(url, param, function(data){

        $('html, body').animate({
            scrollTop: $('#div_code_view').offset().top - 60
        }, 500, 'linear');
        hide_preload();
    });
}
