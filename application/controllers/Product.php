<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->model("mProduct");
		$this->load->model("mCategory");

	}

	public function index()
	{
		$data["product"] = $this->mProduct->getByStatus();
		$this->load->view('product/read_product', $data);
	}

	public function getCreate()
	{
		$data["status"] = $this->mProduct->getStatus();
		$data["category"] = $this->mCategory->getAll();
		$this->load->view('product/create_product', $data);
	}

	public function postCreate()
	{
		$newData = $this->mProduct;
        $result = $newData->save();

		return redirect('Product/index');
	}

	public function getUpdate($id_produk)
	{
		$data["category"] = $this->mCategory->getAll();
		$data["status"] = $this->mProduct->getStatus();
        $where = array('id_produk' => $id_produk);
        $data['product'] = $this->mProduct->view_update($where, 'produk')->result();
		$this->load->view('product/update_product', $data);
	}

	public function postUpdate()
	{
		$id_produk = $this->input->post('id_produk');
		$nama_produk = $this->input->post('nama_produk');
		$harga = $this->input->post('harga');
		$kategori_id = $this->input->post('kategori_id');
		$status_id = $this->input->post('status_id');
	
		$data = array(
			'nama_produk' => $nama_produk,
			'harga' => $harga,
			'kategori_id' => $kategori_id,
			'status_id' => $status_id
		);
	
		$where = array(
			'id_produk' => $id_produk,
		);
	
		$this->mProduct->update($where, $data, 'produk');
		return redirect('Product/index');
	}
	

	public function postDelete($id_produk){
		$where = array ('id_produk' => $id_produk);
		$this->mProduct->delete($where, 'produk');
	
		// Display alert and redirect
		echo '<script>alert("Data berhasil dihapus!");</script>';
		echo '<script>window.location.href = "'.base_url().'";</script>';
	}
	

}
