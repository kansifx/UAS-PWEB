<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modul extends CI_Controller {

	public function detail($slug = '')
	{
		if (empty($slug)) {
			show_404();
		}

		$modul = $this->Module_model->get_by_slug($slug);

		if (!$modul) {
			show_404();
		}

		$data['modul'] = $modul;
		$data['membership'] = $this->session->userdata('membership') ?? 'free';
		$data['nama'] = $this->session->userdata('nama') ?? 'User';
		$this->load->view('modul/detail', $data);
	}

	public function belajar($bahasa = '')
	{
		if (empty($bahasa)) {
			show_404();
		}

		// Ambil data modul dari database
		$modul = $this->Module_model->get_by_slug($bahasa);

		if (!$modul) {
			show_404();
		}

		$data['modul'] = $modul;
		$data['membership'] = $this->session->userdata('membership') ?? 'free';
		$this->load->view('modul/belajar_template', $data);
	}
}
