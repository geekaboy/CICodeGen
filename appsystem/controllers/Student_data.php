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
        $this->load->view('demo/theme/header', $data);
        $this->load->view('demo/student_data/list_view');
        $this->load->view('demo/theme/footer');

    }

    public function get_list()
    {
        $get = $this->input->get(NULL, TRUE);

        $where = "WHERE 1=1 ";
        
        $where .= (isset($get['fullname']) && $get['fullname'] != '')?" AND fullname = {$this->db->escape($get['fullname'])}":"";
        $where .= (isset($get['maj_name']) && $get['maj_name'] != '')?" AND maj_name = {$this->db->escape($get['maj_name'])}":"";
        $where .= (isset($get['fac_name']) && $get['fac_name'] != '')?" AND fac_name = {$this->db->escape($get['fac_name'])}":"";
        $sql = "SELECT COUNT(*) AS total_row
            FROM cse_v2.student_data
            {$where}";

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

        $sql = "SELECT id, std_id, citizen_id, prefix, fullname, maj_name, lev_name_th, year_graduated, fac_name, work_status, count_survey, is_answer
            FROM cse_v2.student_data
            {$where}
            LIMIT $limit OFFSET $start";

        $data['student_data_list'] = $this->db->query($sql)->result();

        $this->load->view('demo/student_data/table_view', $data);
    }

    public function del()
    {
        $post = $this->input->post(NULL, TRUE);
        $sql = "SELECT * FROM cse_v2.student_data
                WHERE id='{$post['id']}'";
        $rdata= $this->db->query($sql);
        if ($rdata->num_rows() > 0) {
            $cond = array(
                'id' => $post['id'],
                    
            );
            // $this->db->delete('cse_v2.student_data', $cond)
            if (TRUE) {
                echo json_encode(array(
                    'is_success' => TRUE,
                    'msg' => 'Successfuly'
                ));
            }
        } else {
            echo json_encode(array(
                'is_success' => FALSE,
                'msg' => 'Data not found.'
            ));
            exit();
        }
    }  

}//END CLASS
?>
