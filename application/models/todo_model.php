<?php

class Todo_model extends CI_Model{

    public function get_by_user($usuario_id) {
        // Asegúrate de que el id del usuario esté definido
        if (!$usuario_id) {
            return []; // Retorna un array vacío si no se proporciona un usuario_id
        }

        $this->db->select("*");
        $this->db->where("usuario_id",$usuario_id);
        $query = $this->db->get("pendientes");


        // Verifica si hay resultados y los devuelve
        if ($query->num_rows() > 0) {
            return $query->result(); // Devuelve un array de objetos
        } else {
            return []; // Retorna un array vacío si no hay resultados
        }
    }

    

}