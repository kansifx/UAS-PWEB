<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificate extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model');
		$this->load->model('Module_model');
	}

	/**
	 * Generate & download PDF sertifikat untuk module tertentu
	 */
	public function download($module_slug = '')
	{
		if (!$this->session->userdata('user_id')) {
			redirect('auth/login');
			return;
		}

		if (empty($module_slug)) {
			show_404();
		}

		$user = $this->Auth_model->get_user($this->session->userdata('user_id'));
		$module = $this->Module_model->get_by_slug($module_slug);

		if (!$user || !$module) {
			show_404();
		}

		// Mapping slug module ke short code bahasa (progress disimpan dgn short code)
		$slug_lang_map = [
			'javascript' => 'js',
			'php'        => 'php',
			'python'     => 'py',
			'java'       => 'java',
			'cpp'        => 'cpp',
			'c'          => 'c',
			'csharp'     => 'cs',
			'go'         => 'go',
			'ruby'       => 'ruby',
			'rust'       => 'rust',
			'typescript' => 'ts',
			'sqlite'     => 'sql',
		];
		$progress_lang = $slug_lang_map[$module_slug] ?? $module_slug;

		// Cek apakah user sudah menyelesaikan modul ini
		$progress = $this->db->get_where('progress', [
			'user_id' => $user['id'],
			'language' => $progress_lang
		])->row_array();

		if (!$progress) {
			show_404();
		}

		$completed = json_decode($progress['completed_topics'] ?? '[]', true);
		// Hitung total topik dari short code bahasa
		preg_match_all('/data-topic="' . $progress_lang . '-(\d+)"/', $module['content'], $matches);
		$total_topics = count(array_unique($matches[1] ?? []));
		if ($total_topics == 0) $total_topics = 12;

		if (count($completed) < $total_topics) {
			show_404();
		}

		// Ambil data sertifikat
		$cert = $this->db->get_where('certificates', ['module_slug' => $module_slug])->row_array();
		if (!$cert) {
			$cert = [
				'title_text' => 'Certificate of Completion',
				'body_text' => 'Telah menyelesaikan ' . $module['name'] . ' secara penuh',
				'color_theme' => '#0E6853'
			];
		}

		// Catat download sertifikat ke database (jika belum pernah)
		$already = $this->db->get_where('user_certificates', [
			'user_id' => $user['id'],
			'module_slug' => $module_slug
		])->num_rows();

		if ($already == 0) {
			$this->db->insert('user_certificates', [
				'user_id' => $user['id'],
				'module_slug' => $module_slug
			]);
		}

	// Render HTML sertifikat
		$html = $this->load->view('certificate/template', [
			'user' => $user,
			'module' => $module,
			'cert' => $cert,
			'date' => date('d F Y')
		], TRUE);

		// Load library Dompdf
		$this->load->library('dompdf_lib');
		$dompdf = new Dompdf\Dompdf();
		$dompdf->loadHtml($html);
		$dompdf->setPaper('A4', 'landscape');
		$dompdf->render();

		// Output PDF
		$filename = 'Certificate_' . str_replace(' ', '_', $module['name']) . '_' . $user['id'] . '.pdf';
		$dompdf->stream($filename, ['Attachment' => 1]);
		exit;
	}
}
