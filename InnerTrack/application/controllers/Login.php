<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view("login.php");
	}
	public function autenticar(){
		$dados = $this->input->post();
		$this->load->model('Usuarios_model');
		if($this->Usuarios_model->validaUsuario($dados)){
			$this->session->set_userdata('usuario_logado',$this->Usuarios_model->validaUsuario($dados));
			echo json_encode(array('status'=>true));
		}else{
			echo json_encode(array('status'=>false));
		}
		
	}
	public function config(){
        $this->load->template("generico/template_grid",array());
	}
	public function logout()
	{
		$this->session->unset_userdata('usuario_logado');
		$this->session->flashdata('success','Deslogado com sucesso!');
		redirect('Login');
	}
}
