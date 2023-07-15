<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{
		$data['content']	= 'home';
		$this->load->view('template', $data);
	}

	public function save()
	{
		$no_pesanan 	= $this->input->post('no_pesanan');
		$tanggal		= $this->input->post('tanggal');
		$nama_supplier	= $this->input->post('nama_supplier');
		$nama_produk	= $this->input->post('nama_produk');
		$total			= str_replace(".", "", $this->input->post('total'));

		$this->db->insert('t_pesanan', [
			'no_pesanan'	=> $no_pesanan,
			'tanggal'		=> $tanggal,
			'nm_supplier'	=> $nama_supplier,
			'nm_produk'		=> $nama_produk,
			'total'			=> $total
		]);

		$result_query = $this->db->insert_id();

		if ($result_query) {
			echo json_encode([
				'status'	=> TRUE
			]);
		} else {
			echo json_encode([
				'status'	=> FALSE
			]);
		}
	}
}
