<?php


class Message_model extends CI_Model {

	public function getMessages($criteria = []){
		$this->db->where($criteria);
		return $this->db->get('Message')->result();
	}
	public function envoyerMessage($data){

		return $this->db->insert('Message',$data);

	}

}