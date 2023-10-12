<?php defined('BASEPATH') OR exit('No direct script access allowed');

class mProduct extends CI_Model {

    private $_table = "produk";
    private $_table1 = "status";


    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getStatus()
    {
        return $this->db->get($this->_table1)->result();
    }

    public function getByStatus()
    {
        return $this->db->get_where($this->_table, ["status_id" => 1])->result();
    }    

    public function getCategory($categoryID){
        $query = $this->db->query("SELECT * FROM kategori WHERE id_kategori = ?", array($categoryID));
        return $query->result();
    }

    public function view_update($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_produk   = $post["id_produk"];
        $this->nama_produk = $post["nama_produk"];
        $harga             = $post["harga"];
    
        // Menghilangkan titik sebagai pemisah ribuan
        $harga = str_replace('.', '', $harga);
    
        // Menghilangkan simbol Rupiah
        $harga = str_replace('Rp', '', $harga);
    
        $this->harga       = $harga;
        $this->kategori_id  = $post["kategori_id"];
        $this->status_id    = $post["status_id"];
    
        return $this->db->insert($this->_table, $this);
    }

    public function update($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

	public function delete($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }
}