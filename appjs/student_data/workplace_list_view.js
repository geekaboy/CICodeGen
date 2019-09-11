$(document).ready(function () {
    $('body').removeClass('sidebar-lg-show');
    get_workplace_list();

    $('#btn_search').click(get_workplace_list);
    $('#btn_clear').click(clear_search);
    $('#search_text').change(function (e) { 
        e.preventDefault();
        if($(this).val() == ''){
            get_workplace_list();
        }
        
    });

    

});//End ready

function get_workplace_list(){
    show_preload();
    $('#dev_table').html('');
    var url = site_url+"student_data/get_workplace_list?"+
                'search_text='+$('#search_text').val()+
                '&year_graduated='+$('#year_graduated').val();
    $('#div_table').load(url, function (response, status, request) {
        
        hide_preload();
        
    });

}

function clear_search(){
    $('#search_text').val('');
    $('#year_graduated').val("2560").change();
    get_workplace_list();
}