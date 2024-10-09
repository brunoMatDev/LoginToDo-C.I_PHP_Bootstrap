<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		redirect('auth/login'); //Redirecciona al usuario

        
	}

	public function login(){
		$this->load->library('form_validation'); //Se adhirio al CI Controller la libreria de form validation
		$this->form_validation->set_rules('username','Username', 'trim|strtolower|required');
		$this->form_validation->set_rules('password','Password', 'required');

		if($this->form_validation->run() == FALSE){ //metodo run-> true si se pasaron todas las reglas y false si no se pasaron
			$this->load->view('login'); //Le paso a la vista principal el array de datos
		}else{
			$this->load->model('usuarios_model');
			$username = set_value('username');
			$pass = set_value('password');
			if($uid= $this->usuarios_model->check_login($username,$pass)){
				$u = $this->usuarios_model->get_by_id($uid);
				if($u["estado"]==1){
					$this->session->set_userdata("usuario_id",$uid);
					$this->session->set_userdata("usuario",$u["usuario"]);
					$this->session->set_userdata("rol_id",$u["rol_id"]);
					redirect("todo");
				}else{
					$this->session->set_flashdata('OP','USUARIO INACTIVO');
					redirect("auth/login");
				}
			}else{
				$this->session->set_flashdata('OP','USUARIO INCORRECTO');
				redirect('auth/login');
			}
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		$this->session->set_flashdata('OP','SALIÓ');
		redirect('auth/login');
	}

	
}
