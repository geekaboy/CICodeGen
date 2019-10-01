$(document).ready(function() {
    get_devname();
});//END READY
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
    console.log('asdasd');
}

function get_devname(){
    var cicodegen = localStorage.getItem('cicodegen');
    if(cicodegen != null){
        var setting = JSON.parse(cicodegen);
        console.log(setting);
    }

}
