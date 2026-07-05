<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Progress extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model');
	}

	public function save()
	{
		// Cek login
		if (!$this->session->userdata('user_id')) {
			$this->output->set_status_header(401);
			echo json_encode(['error' => 'Unauthorized']);
			return;
		}

		$input = json_decode(file_get_contents('php://input'), true);
		$language = $input['language'] ?? '';
		$topic_id = $input['topic_id'] ?? '';

		if (empty($language) || empty($topic_id)) {
			$this->output->set_status_header(400);
			echo json_encode(['error' => 'Invalid data']);
			return;
		}

		$user_id = $this->session->userdata('user_id');

		// Cek apakah sudah ada row untuk user + language ini
		$existing = $this->db->get_where('progress', [
			'user_id' => $user_id,
			'language' => $language
		])->row_array();

		if ($existing) {
			// Update — tambahkan topic jika belum ada
			$completed = json_decode($existing['completed_topics'] ?? '[]', true);
			if (!in_array($topic_id, $completed)) {
				$completed[] = $topic_id;
			}
			$this->db->where('id', $existing['id'])
				->update('progress', [
					'completed_topics' => json_encode($completed)
				]);
		} else {
			// Insert baru
			$this->db->insert('progress', [
				'user_id' => $user_id,
				'language' => $language,
				'completed_topics' => json_encode([$topic_id])
			]);
		}

		echo json_encode(['success' => true]);
	}

	public function get($language = '')
	{
		if (!$this->session->userdata('user_id')) {
			$this->output->set_status_header(401);
			echo json_encode(['error' => 'Unauthorized']);
			return;
		}

		if (empty($language)) {
			$language = $this->input->get('language');
		}

		$row = $this->db->get_where('progress', [
			'user_id' => $this->session->userdata('user_id'),
			'language' => $language
		])->row_array();

		$completed = [];
		if ($row && !empty($row['completed_topics'])) {
			$completed = json_decode($row['completed_topics'], true) ?? [];
		}

		echo json_encode(['completed_topics' => $completed]);
	}

	public function summary()
	{
		if (!$this->session->userdata('user_id')) {
			redirect('auth/login');
			return;
		}

		$user_id = $this->session->userdata('user_id');
		$modules = $this->Module_model->get_all();
		$progress = $this->db->get_where('progress', ['user_id' => $user_id])->result_array();

		$data = [];
		foreach ($progress as $p) {
			$data[$p['language']] = json_decode($p['completed_topics'], true) ?? [];
		}

		$summary = [];
		foreach ($modules as $m) {
			$slug = $m['slug'];
			$topics = $data[$slug] ?? [];
			$summary[$slug] = [
				'name' => $m['name'],
				'completed' => count($topics),
				'topics' => $topics
			];
		}

		echo json_encode($summary);
	}
}
