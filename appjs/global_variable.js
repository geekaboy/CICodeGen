var site_url = $('meta[name="site_url"]').attr('content');
var base_url = $('meta[name="base_url"]').attr('content');

$('[data-toggle="tooltip"]').tooltip();

function show_preload(){
    $('#model_preload').modal('show');
}
function hide_preload(){
    $('#model_preload').modal('hide');
}