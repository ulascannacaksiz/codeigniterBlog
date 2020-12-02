<?php
class Upload extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index() {
        //$this->load->view('upload_form', array('error' => ' ' ));
    }

    public function do_upload() {

        $config['upload_path']   = 'uploads';

        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 100;
        $config['max_width']     = 1024;
        $config['max_height']    = 768;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        echo '<a href="../uploads">TEST</a> <br>';

        if ( ! $this->upload->do_upload('kapak_resim')) {
            $error = array('error' => $this->upload->display_errors());
            //$this->load->view('upload_form', $error);

            print_r ($error);
        }

        else {
            $data = array('upload_data' => $this->upload->data());
            $upload_data = $this->upload->data();
            echo "başarılı ". $upload_data['file_name'];

            //$this->load->view('upload_success', $data);
        }
    }
}