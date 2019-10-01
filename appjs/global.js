var site_url = $('meta[name="site_url"]').attr('content');
var base_url = $('meta[name="base_url"]').attr('content');

$('[data-toggle="tooltip"]').tooltip();

function show_preload(){
    $('#model_preload').modal('show');
}
function hide_preload(){
    $('#model_preload').modal('hide');
}

function save_devname(){
    var cicodegen = {
        dev_name :$('#developer_name').val()
    };
    localStorage.setItem('cicodegen', JSON.stringify(cicodegen));

    PNotify.success({
      title: 'Saved',
      text: 'Developer name: '+$('#developer_name').val()
    });

}

function get_devname(){
    var cicodegen = localStorage.getItem('cicodegen');
    if(cicodegen != null){
        var setting = JSON.parse(cicodegen);
        $('#developer_name').val(setting.dev_name);
    }

}
