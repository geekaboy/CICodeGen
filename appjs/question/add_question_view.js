$(document).ready(function () {
    
    load_list();
    $('#btn_save').click(save);
    $('#btn_edit').click(update);
}); //End ready
function load_list(){
    show_preload();
    $('#div_group').load(site_url + 'question/group_list_view', function () {
        hide_preload();
    });
}

function save() {
    show_preload();
    var url = site_url + "question/group_save";
    var param = {
        title: $('#question_group_name').val()
    };
    $.post(url, param, function (data, textStatus, xhr) {
        // console.log(this);
        if (data.is_success) {
            $('#question_group_name').val('');
            load_list();
        }
    }, 'json').fail(function () {

        hide_preload();

    });
}

function edit_group(id) {
    show_preload();

    $('#edit_id').val('');
    $('#edit_title').val('');
    var url = site_url+"question/get_group_detail";
    var param = {
        id: id
    };
    $.get(url, param, function (data, textStatus, jqXHR) {
        hide_preload();
        $('#edit_id').val(data.id);
        $('#edit_title').val(data.title);
        $('#edit_group_modal').modal('show');


    }, "json");
}

function update() {
    show_preload();
    $('#edit_group_modal').modal('hide');
    var url = site_url + 'question/group_update';
    var param = {
        title: $('#edit_title').val(),
        id: $('#edit_id').val()
    };
    $.post(url, param, function (resp, textStatus, jqXHR) {
        if(resp.is_success){
            load_list();
        }else{
            Swal.fire({
                type: 'warning',
                title: 'Oops...',
                text: 'Something went wrong!',
            });
            hide_preload();
        }

    }, "json").fail(function () {
        hide_preload();
    });
}

function group_delete() {

    var url = site_url + "question/group_delete";
    var param = {
        id: $('#id').val()
    };

    $.post(url, param, function (data, textStatus, xhr) {
        if (data.is_success) {
            console.log(data);
        }
    }, 'json');
}