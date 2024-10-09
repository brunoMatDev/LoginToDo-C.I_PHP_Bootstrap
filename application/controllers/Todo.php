<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Todo extends CI_Controller {

	public function __construct() {
		parent::__construct(); //Construye el padre del constructor. Siempre que se crea un constructor, se arranca con esta linea
		if(!$this->session->userdata('usuario_id')) {
			$this->session->set_flashdata('OP','PROHIBIDO');
			redirect("auth/login");
		}

	}
	public function index()
	{
		redirect('todo/principal'); //Redirecciona al usuario
	}

	public function principal(){
		//$datos = array();
		//$datos['pendientes'] = $this->db->get('pendientes')->result_array(); //Trae todos los objetos en la tabla pendientes de la bdd, lo guarda en un array y lo almacena en el array $datos
		//echo $this->db->last_query(); --> Ver la ultima query en pantalla
		//$this->load->view('/todo/principal',$datos); //Le paso a la vista principal el array de datos
	
	
		// Verifica si el usuario está autenticado
        if (!$this->session->userdata('usuario_id')) {
            redirect('auth/login'); // Redirige si no está logueado
        }

		
        // Obtén el usuario_id del usuario logueado
        $usuario_id = $this->session->userdata("usuario_id");
		
        // Carga el modelo
        $this->load->model('todo_model'); // Asegúrate de que el modelo se llama Todo_model
        $data['pendientes'] = $this->todo_model->get_by_user($usuario_id);
		$this->session->set_userdata("usuario_id",$usuario_id);

        // Carga la vista y pasa las tareas
        $this->load->view('todo/principal', $data);
	}

	public function nuevo(){
		$texto = $this->input->post('texto');
		$id = $this->session->userdata("usuario_id");
		
		$this->db->set('texto',$texto);
		$this->db->set('usuario_id',$id);
		$this->db->insert('pendientes');
		$this->session->set_flashdata('OP','OK');
		redirect('todo/principal');
	}

	public function borrar($id = 0){
		$id = intval($id);
		$this->db->where('pendiente_id',$id);
		$this->db->delete('pendientes');

		$this->session->set_flashdata('OP','BORRADO');
		redirect('todo/principal');
	}

	public function listo($id = 0){
		$id = intval($id);
		$this->db->where('pendiente_id',$id);
		$this->db->set('estado',1);
		$this->db->update('pendientes');

		$this->session->set_flashdata('OP','ACTURALIZADO');
		redirect('todo/principal');
	}
}
