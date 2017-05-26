<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');
	}
 
	function index(){
		$data = $this->mymodel->getpeminjaman();   
		$this->load->view('admin_home', array('data' => $data));
	}
 
	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'passwd' => $password
			);
		$cek = $this->m_login->cek_login("user",$where)->num_rows();
		echo $cek;
		if($cek == 0){
 
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
			$this->load->helper('url');
			redirect('http://localhost/mppl/index.php/admin_ctr/');
 
		}else{
			echo "Username dan password salah !";
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		$this->load->helper('url');
		redirect('http://localhost/mppl/');
	}
}