<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	// Mapping slug module ke short code bahasa (progress disimpan dgn short code)
	private $slug_lang_map = [
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

	private function lang_code($slug)
	{
		return $this->slug_lang_map[$slug] ?? $slug;
	}

	public function index()
	{
		if (!$this->session->userdata('user_id')) {
			redirect('auth/login');
			return;
		}

		$user_id = $this->session->userdata('user_id');
		$nama = $this->session->userdata('nama');
		$modules = $this->Module_model->get_all();
		$progress_rows = $this->db->get_where('progress', ['user_id' => $user_id])->result_array();

		// Map progress by language (short code)
		$progress_map = [];
		$total_done_topics = 0;
		$total_all_topics = 0;
		$completed_modules = 0;
		$in_progress_module = null;
		$in_progress_done = 0;
		$in_progress_total = 0;

		foreach ($progress_rows as $p) {
			$progress_map[$p['language']] = json_decode($p['completed_topics'], true) ?? [];
		}

		foreach ($modules as $m) {
			$slug = $m['slug'];
			$lang = $this->lang_code($slug);
			$topics = $progress_map[$lang] ?? [];
			$done = count($topics);

			// Count total topics from content using short code
			preg_match_all('/data-topic="' . $lang . '-(\d+)"/', $m['content'], $matches);
			$total = count(array_unique($matches[1] ?? []));
			if ($total == 0) $total = 12;

			$total_done_topics += $done;
			$total_all_topics += $total;

			if ($done > 0 && $done < $total) {
				// In progress — ambil yang pertama ditemukan sebagai "lanjutkan"
				if (!$in_progress_module) {
					$in_progress_module = $m;
					$in_progress_done = $done;
					$in_progress_total = $total;
				}
			}

			if ($done >= $total) {
				$completed_modules++;
			}
		}

		// Hitung learning hours (estimasi: 1 topik = 0.5 jam)
		$learning_hours = round(($total_done_topics * 0.5) * 2) / 2;

		// Streak: dari tabel progress.updated_at
		$streak = 0;
		if (!empty($progress_rows)) {
			$dates = [];
			foreach ($progress_rows as $p) {
				if ($p['updated_at']) {
					$dates[] = date('Y-m-d', strtotime($p['updated_at']));
				} elseif ($p['created_at']) {
					$dates[] = date('Y-m-d', strtotime($p['created_at']));
				}
			}
			$dates = array_unique($dates);
			rsort($dates);

			// Hitung streak dari hari ini ke belakang
			$streak = 0;
			$check = date('Y-m-d');
			foreach ($dates as $d) {
				if ($d == $check) {
					$streak++;
					$check = date('Y-m-d', strtotime($check . ' -1 day'));
				}
			}
		}

		// Modul rekomendasi: cari modul yang belum pernah disentuh
		// Prioritas: beginner -> intermediate -> advanced
		$levels = ['beginner', 'intermediate', 'advanced'];
		$recommended = [];
		foreach ($levels as $level) {
			if (count($recommended) >= 3) break;
			foreach ($modules as $m) {
				if (count($recommended) >= 3) break;
				if ($m['difficulty'] !== $level) continue;
				$slug = $m['slug'];
				$lang = $this->lang_code($slug);
				$topics = $progress_map[$lang] ?? [];
				if (count($topics) == 0) {
					$recommended[] = $m;
				}
			}
		}
		// Jika masih kurang, tambahkan modul yang sedang dikerjakan (belum selesai)
		if (count($recommended) < 3) {
			foreach ($modules as $m) {
				if (count($recommended) >= 3) break;
				$slug = $m['slug'];
				$lang = $this->lang_code($slug);
				$topics = $progress_map[$lang] ?? [];
				preg_match_all('/data-topic="' . $lang . '-(\d+)"/', $m['content'], $matches);
				$total = count(array_unique($matches[1] ?? []));
				if ($total == 0) $total = 12;
				$done = count($topics);
				// Sedang dikerjakan (belum selesai) dan belum masuk rekomendasi
				if ($done > 0 && $done < $total) {
					$already = false;
					foreach ($recommended as $r) { if ($r['slug'] === $slug) { $already = true; break; } }
					if (!$already) $recommended[] = $m;
				}
			}
			// Jika masih kurang, tambahkan yang sudah selesai (untuk review)
			if (count($recommended) < 3) {
				foreach ($modules as $m) {
					if (count($recommended) >= 3) break;
					$slug = $m['slug'];
					$lang = $this->lang_code($slug);
					$topics = $progress_map[$lang] ?? [];
					preg_match_all('/data-topic="' . $lang . '-(\d+)"/', $m['content'], $matches);
					$total = count(array_unique($matches[1] ?? []));
					if ($total == 0) $total = 12;
					$done = count($topics);
					if ($done >= $total) {
						$already = false;
						foreach ($recommended as $r) { if ($r['slug'] === $slug) { $already = true; break; } }
						if (!$already) $recommended[] = $m;
					}
				}
			}
		}

		$data['nama'] = $nama;
		$data['completed_modules'] = $completed_modules;
		$data['learning_hours'] = $learning_hours;
		$data['streak'] = $streak;
		$data['in_progress_module'] = $in_progress_module;
		$data['in_progress_done'] = $in_progress_done;
		$data['in_progress_total'] = $in_progress_total;
		$data['membership'] = $this->session->userdata('membership');
		$data['recommended'] = $recommended;

		$this->load->view('dashboard', $data);
	}
}
