<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendonor extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Pendonor');
	}

	public function index()
	{
		$data['pendonor'] = $this->M_Pendonor->getAll();
		$this->load->view('pendonor', $data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('nama_pendonor', 'Nama', 'required');
		$this->form_validation->set_rules('alamat_pendonor', 'Alamat', 'required');
		$this->form_validation->set_rules('tempatlahir_pendonor', 'Tempat lahir', 'required');
		$this->form_validation->set_rules('tgllahir_pendonor', 'Tanggal lahir', 'required');
		$this->form_validation->set_rules('goldarah_pendonor', 'Golongan Darah', 'required');
		$this->form_validation->set_rules('nomor_hp', 'Nomor Hp', 'required|numeric');

		$this->form_validation->set_message('required', '{field} tidak boleh kosong. Mohon untuk diisi.');
		$this->form_validation->set_message('numeric', '{field} harus berupa angka.');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if ($this->form_validation->run() == false) {
			$this->load->view('pendonor-tambah');
		} else {
			$this->proses_tambah_pendonor();
		}
	}

	public function proses_tambah_pendonor()
	{
		$data = [
			'nama' => $this->input->post('nama_pendonor'),
			'alamat' => $this->input->post('alamat_pendonor'),
			'tempat_lahir' => $this->input->post('tempatlahir_pendonor'),
			'tanggal_lahir' => $this->input->post('tgllahir_pendonor'),
			'golongan_darah' => $this->input->post('goldarah_pendonor'),
			'nomor_hp' => $this->input->post('nomor_hp'),
		];

		$this->M_Pendonor->insertPendonor($data);
		$this->session->set_flashdata('pesan', 'Data pendonor berhasil di tambahkan');
		redirect(base_url());
	}

	public function ubah($id)
	{
		$data['pendonor'] = $this->M_Pendonor->getPendonorById($id);

		$this->form_validation->set_rules('nama_pendonor', 'Nama', 'required');
		$this->form_validation->set_rules('alamat_pendonor', 'Alamat', 'required');
		$this->form_validation->set_rules('tempatlahir_pendonor', 'Tempat lahir', 'required');
		$this->form_validation->set_rules('tgllahir_pendonor', 'Tanggal lahir', 'required');
		$this->form_validation->set_rules('goldarah_pendonor', 'Golongan Darah', 'required');
		$this->form_validation->set_rules('nomor_hp', 'Nomor Hp', 'required|numeric');

		$this->form_validation->set_message('required', '{field} tidak boleh kosong. Mohon untuk diisi.');
		$this->form_validation->set_message('numeric', '{field} harus berupa angka.');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if ($this->form_validation->run() == false) {
			$this->load->view('pendonor-ubah', $data);
		} else {
			$this->proses_ubah_pendonor();
		}
	}

	public function proses_ubah_pendonor()
	{
		$id = $this->input->post('id');
		$data = [
			'nama' => $this->input->post('nama_pendonor'),
			'alamat' => $this->input->post('alamat_pendonor'),
			'tempat_lahir' => $this->input->post('tempatlahir_pendonor'),
			'tanggal_lahir' => $this->input->post('tgllahir_pendonor'),
			'golongan_darah' => $this->input->post('goldarah_pendonor'),
			'nomor_hp' => $this->input->post('nomor_hp'),
		];

		$this->M_Pendonor->updatePendonor($data, $id);
		$this->session->set_flashdata('pesan', 'Data pendonor berhasil di perbarui');
		redirect(base_url());
	}

	public function hapus($id)
	{
		$this->M_Pendonor->delete($id);
		$this->session->set_flashdata('pesan', 'Data pendonor berhasil dihapus');
		redirect(base_url());
	}
}
