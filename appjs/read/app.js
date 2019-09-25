$(document).ready(function() {
    $('#db_table').change(get_build_form_view);
    $('#db_schema').change(get_table_list);



});//End ready

function get_table_list(){
    if($(this).val() == ''){
        return false;
    }
    var param = {
        table_schema:$(this).val()
    };
    var url = site_url+'getdatabase/get_table_list?';
    url+= $.param(param);

    $.getJSON(url, function(resp, textStatus) {
        var option_html ='<option value="">Select table</option>';
        $.each(resp, function(index, data) {
            option_html += '<option value="'+data.table_schema+'.'+data.table_name+'">'+data.table_schema+'.'+data.table_name+'</option>';
        });
        $('#db_table').html(option_html);
        //Set event change


    });


}

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
    var url = site_url+'read/build_code_view?';
    url+= $.param(param);
    $('#div_build_form').load(url,function(){
        $('html, body').animate({
            scrollTop: $('#div_build_form').offset().top - 60
        }, 500, 'linear');
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
        var arr = {
            'column_name':column_name,
            'label':$('#input_label_'+column_name).val(),
            'column_default':$(el).data('column-default'),
            'data_type':$(el).data('data-type')
        };
        input_list.push(arr);
    });

    var param = {
        db_table: $('#db_table').val(),
        cond:$('#cond').val(),
        limit_list:$('#limit_list').val(),
        developer_name:$('#developer_name').val(),
        input_list:input_list
    };
    console.log(param);
    // return false;
    var url = site_url+'read/generate';
    $('#div_code_view').load(url, param, function(data){

        $('html, body').animate({
            scrollTop: $('#div_code_view').offset().top - 60
        }, 500, 'linear');
        hide_preload();
    });
}
