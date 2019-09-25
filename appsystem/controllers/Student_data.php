<?php
//------------[Controller File name : Student_data.php ]----------------------//
//----------------[ Create by: @ At 2019-09-25 ]----------------------//
if (!defined('BASEPATH'))  exit('No direct script access allowed');

class Student_data extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function index()
    {

    }

    public function list_view()
    {
        //@Plugin & @Appjs
        $data['plugin'] = array();
        $data['appjs'] = array('appjs/student_data/app.js');

    	//@VIEW
    	$this->load->view('theme/header', $data);
    	$this->load->view('demo/student_data/list_view');
    	$this->load->view('theme/footer');
    }

    public function get_list()
    {
        $get = $this->input->get(NULL, TRUE);

        $where = "";
        if ($get['search_text'] != "") {
            $where .= "";
        }
        $sql = "SELECT COUNT(*) AS total_row
            FROM cse_v2.student_data";

        $q = $this->db->query($sql)->row();
        $total_row = $q->total_row;
        $page = (isset($get['page'])) ? $get['page'] : 1;

        $this->load->helper('pagination');
        $config['base_url'] = site_url('student_data/get_list');
        $config['total_row'] = $total_row;
        $config['per_page'] = 100;
        gen_pagination($config);

        $limit = $config['per_page'];
        $start = ($page - 1) * $limit;
        $data['start'] = $start;

        $sql = "SELECT id, std_id, citizen_id, prefix, fullname, gender, maj_name, lev_name_th, date_graduated, year_graduated, degree_num, fac_name, mobile_number, email, email_status, work_status, count_survey, is_answer
        FROM cse_v2.student_data
        LIMIT $limit OFFSET $start";

        $data['student_data_list'] = $this->db->query($sql)->result();

        $this->load->view('demo/student_data/table_view', $data);
    }

}//END CLASS
?>
