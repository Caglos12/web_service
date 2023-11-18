<?php
class MdlConfig extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function LOGINE($usuario = '', $hash = ''){
        $this->db->select('U.ID, U.USERNAME, U.PASSWD, U.BLOQUEAR');
        $this->db->from('usuarios U');
        $this->db->where('U.USERNAME',$usuario);
        if(!empty($hash)){
            $this->db->where('U.PASSWD',"SHA1(CONCAT(U.ID,'$hash'))",false);
		}
        $this->db->where('U.STATUS',"1");
        $this->db->where('U.BLOQUEAR',"0");
        $result = $this->db->get();
        if($result->num_rows()>0){
            return $result->row(0);
        }else{
            return FALSE;
        }
    }

    public function token_key($usuario = '', $key='',$sistema='',$nivel=''){
		$fecha_actual = date('Y-m-d H:i:s');
        $this->db->set('ULTIMOACCESO',"$fecha_actual");
        $this->db->set('KEY',"$key");
        $this->db->set('id_panel',"$sistema");
        $this->db->set('NIVEL',"$nivel");
        $this->db->set('id_usuario',"$usuario");
        $this->db->where('id_usuario',"$usuario");
        $this->db->replace('class_panel_user');
        return TRUE;
    }

    public function validar_token($id_user = '',$sistema = ''){
        if(!empty($id_user)){
            $this->db->select('U.KEY, U.ULTIMOACCESO');
            $this->db->from('class_panel_user U');
            $this->db->where(' U.id_usuario', $id_user);
            $this->db->where(' U.id_panel', $sistema);
            $result = $this->db->get();
            if($result->num_rows()>0){
                return $result->row(0);
            }  
        }
        return FALSE;
    }
	public function GuardaUsuario($usuario = ''){
		$this->db->set('USERNAME', $usuario);
		$this->db->insert('usuarios');
		$id = $this->db->insert_id();
		return ['id' => $id];
	}
}
?>