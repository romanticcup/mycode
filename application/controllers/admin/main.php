<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends Admin_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view($this->admin_dir.'/admin_main');
    }
    
    public function info() {
        $this->view('main_info');
    }
    
    public function login() {
        $post = $this->input->post(NULL, TRUE);
        if ($post['opt'] == 'ajax') {
            $this->load->model('User_model');
            $username = trim($post['user_name']);
            $userpass = trim($post['user_pass']);
            if ($this->User_model->login($username, $userpass)) {
                echo 'ok';
                exit;
            } else {
                echo 'error';
                exit;
            }
        }
        $this->load->view('login.php');
    }

    public function logout() {
        $this->load->model('User_model');
        $this->User_model->logout();
        redirect(site_aurl('login'));
    }

}

?>