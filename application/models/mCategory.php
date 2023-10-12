<?php defined('BASEPATH') OR exit('No direct script access allowed');

class mCategory extends CI_Model {

    private $_table = "kategori";

   	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

    public function getCategory($category_id){
        $query = $this->db->query("SELECT * FROM kategori WHERE id_kategori = $category_id");
        return $query->result();
    }
}