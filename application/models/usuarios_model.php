<?php

class Usuarios_model extends CI_Model {

    public function get_by_id($id){
        $this->db->select("usuarios.*,roles.Nombre AS rol_nombre"); //En el caso de no estar esta linea, se selecciona todo por defecto
        $this->db->join("roles","roles.rol_id=usuarios.rol_id","inner");
        $this->db->where("usuario_id",$id);
        $query = $this->db->get("usuarios");
        return $query->row_array();
    }

    public function check_login($usuario, $password){
        $this->db->select("usuario_id");
        $this->db->where("usuario",$usuario);
        $this->db->where("password",md5($password)); //Cuando usamos un where despues de otro, se forma una concatenacion
        $query = $this->db->get("usuarios");
        if($query->num_rows() > 0){
            $tmp = $query->row_array();
            return $tmp["usuario_id"];
        }else{
            return false;
        }
    }

}