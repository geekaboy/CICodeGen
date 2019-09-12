$(document).ready(function() {


    $('#db_table').change(get_build_form_view);
    $('#add-option').click(addOption);

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
    console.log(form);
    var input_list = [];
    $.each(form, function(index, el) {
        var column_name = $(el).data('column-name');
        var arr = {
            'column_name':column_name,
            'column_default':$(el).data('column-default'),
            'data_type':$(el).data('data-type'),
            'input_type':$('#'+column_name+'_type').val()
        };
        input_list.push(arr);
    });
    var param = {
        input_list:input_list
    };
    var url = site_url+'create/generate_view';
    $('#div_code_view').load(url, param, function(data){

        $('html, body').animate({
            scrollTop: $('#div_code_view').offset().top - 60
        }, 500, 'linear');
        hide_preload();
    });
}

function input_type_change(){
    if($(this).val() == 'checkbox' || $(this).val() == 'radio'){
        var btn_addmore = '<button class="btn btn-primary btn-sm pull-right" '+
        'onclick="optionModal(\''+$(this).val()+'\',\''+$(this).data('column-name')+'\')">'+
        '<i class="fa fa-plus-circle"></i> option'+
        '</button>';
        $(this).after(btn_addmore);
    }else{
        $(this).next('button').remove();
        $('#show_option_'+$(this).data('column-name')).html('');
    }

}
function optionModal(input_type, column_name) {
    if(input_type == 'checkbox' || input_type == 'radio'){
        $('#column_name').val(column_name);
        var option_val = $('#option_'+column_name+'_val').text();
        var html = '';
        if(option_val != ''){
            option_val = JSON.parse(option_val);
            $.each(option_val, function(index, obj) {
                 html+='<tr>'+
                     '<td><input class="form-control" type="text" name="title" id="title" value="'+obj.title+'"/></td>'+
                     '<td><input class="form-control" type="text" name="name" id="name" value="'+obj.name+'"/></td>'+
                     '<td><input class="form-control" type="text" name="id" id="id" value="'+obj.id+'"/></td>'+
                     '<td><input class="form-control" type="text" name="value" id="value" value="'+obj.value+'"/></td>'+
                 '</tr>';
            });
        }
        html += '<tr>'+
            '<td><input class="form-control" type="text" name="title" id="title"/></td>'+
            '<td><input class="form-control" type="text" name="name" id="name"/></td>'+
            '<td><input class="form-control" type="text" name="id" id="id"/></td>'+
            '<td><input class="form-control" type="text" name="value" id="value"/></td>'+
        '</tr>';
        $('#tb_option').html(html);
        $('#modal_option').modal('show');
    }else{
        $('#show_option_'+$(this).data('column-name')).html('');
    }
}

function addNewOption(){
    var html = '<tr>'+
        '<td><input class="form-control" type="text" name="title" id="title"/></td>'+
        '<td><input class="form-control" type="text" name="name" id="name"/></td>'+
        '<td><input class="form-control" type="text" name="id" id="id"/></td>'+
        '<td><input class="form-control" type="text" name="value" id="value"/></td>'+
    '</tr>';
    $('#tb_option').append(html);
}

function addOption(){
    var option_el = $('#tb_option>tr');
    var option_list = [];
    var show_table_option = '<b>Input option</b><table class="table table-bordered table-sm"><thead><tr><th>Title</th><th>Name</th><th>ID</th><th>Value</th></tr></thead>';
    $.each(option_el, function(index, el) {
        if($(el).find('#title').val() != '' && $(el).find('#name').val() != '' && $(el).find('#id').val() != '' && $(el).find('#value').val() != ''){
            var arr = {
                title:$(el).find('#title').val(),
                name:$(el).find('#name').val(),
                id : $(el).find('#id').val(),
                value : $(el).find('#value').val()
            };
            show_table_option+= '<tr><td>'+arr.title+'</td><td>'+arr.name+'</td><td>'+arr.id+'</td><td>'+arr.value+'</td></tr>';

            option_list.push(arr);
        }

    });

    if(option_list.length > 0){
        var column_name = $('#column_name').val();
        var html = show_table_option+'</table>'+'<div style="display:none;" id="option_'+column_name+'_val">'+JSON.stringify(option_list)+'</div>';
        $('#show_option_'+column_name).html(html);
    }
    $('#modal_option').modal('hide');

    // Prism.highlightAll();

}
