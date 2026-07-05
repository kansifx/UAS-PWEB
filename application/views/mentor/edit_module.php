<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $title ?> — LEARNBASE.</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@400;500;600&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
:root { --deep-green: #0E6853; --deep-green-dark: #0a4f3f; --deep-green-light: #E7F2EF; --orange: #FF5B35; --orange-light: #FFEFEA; --charcoal: #1A1A1A; --gray: #666; --gray-soft: #8A8A8A; --bg: #F7F9F8; --line: #EAEDEC; --sidebar-w: 250px; --card-bg: #fff; }
body.dark-mode { --deep-green: #1ABC9C; --deep-green-dark: #16A085; --deep-green-light: #1A3E3A; --orange: #FF7F50; --orange-light: #3E2A20; --charcoal: #E8E8E8; --gray: #B0B0B0; --gray-soft: #888; --bg: #0F171E; --line: #1F2A33; --card-bg: #1A2530; }
body.dark-mode .sidebar, body.dark-mode .topbar, body.dark-mode .page-card { background: var(--card-bg); }
body.dark-mode .sidebar, body.dark-mode .topbar, body.dark-mode .page-card { border-color: var(--line); }
* { box-sizing: border-box; }
body { font-family: 'Inter', sans-serif; background: var(--bg); color: var(--charcoal); margin: 0; padding: 0; display: flex; min-height: 100vh; }
h1,h2,h3,h4,h5,h6 { font-family: 'Poppins', sans-serif; }
a { text-decoration: none; }
.sidebar { width: var(--sidebar-w); background: var(--card-bg); border-right: 1px solid var(--line); padding: 1.75rem 1rem; display: flex; flex-direction: column; position: fixed; top: 0; left: 0; bottom: 0; z-index: 100; }
.sidebar .brand { font-weight: 800; font-size: 1.3rem; color: var(--charcoal); padding: 0 0.5rem; margin-bottom: 2rem; display: block; }
.sidebar .brand span { color: var(--orange); }
.sidebar .brand small { font-size: 0.65rem; font-weight: 500; color: var(--gray-soft); }
.side-nav { list-style: none; padding: 0; margin: 0; flex: 1; }
.side-nav .nav-label { font-size: 0.7rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; color: var(--gray-soft); padding: 0 0.75rem; margin: 0.5rem 0 0.75rem; }
.side-nav li { margin-bottom: 0.25rem; }
.side-link { display: flex; align-items: center; gap: 0.7rem; padding: 0.65rem 0.85rem; border-radius: 12px; color: var(--gray); font-weight: 500; font-size: 0.9rem; transition: background .15s, color .15s; }
.side-link:hover { background: var(--deep-green-light); color: var(--deep-green-dark); }
.side-link.active { background: linear-gradient(135deg, var(--orange), var(--deep-green) 65%, var(--deep-green)); color: #fff; box-shadow: 0 8px 18px rgba(14,104,83,0.2); }
.main-area { margin-left: var(--sidebar-w); flex: 1; }
.topbar { background: var(--card-bg); border-bottom: 1px solid var(--line); padding: 0.9rem 2rem; display: flex; align-items: center; justify-content: space-between; }
.topbar-title { font-weight: 700; font-size: 1.15rem; color: var(--charcoal); }
.topbar-right { display: flex; align-items: center; gap: 0.75rem; }
.avatar { width: 36px; height: 36px; border-radius: 50%; background: linear-gradient(135deg, var(--orange), var(--deep-green)); display: flex; align-items: center; justify-content: center; color: #fff; font-weight: 700; font-size: 0.85rem; }

.wrap { padding: 1.75rem 2rem; max-width: 1200px; }
.page-title { font-weight: 700; font-size: 1.3rem; margin-bottom: 0.15rem; }
.page-sub { color: var(--gray-soft); font-size: 0.88rem; margin-bottom: 1.25rem; }

.alert { padding: 0.75rem 1rem; border-radius: 12px; font-size: 0.85rem; font-weight: 500; margin-bottom: 1rem; }
.alert.success { background: var(--deep-green-light); color: var(--deep-green); }
.alert.error { background: var(--orange-light); color: var(--orange); }

.page-card { background: var(--card-bg); border: 1px solid var(--line); border-radius: 16px; padding: 1.5rem; margin-bottom: 1.25rem; }
.page-card h3 { font-weight: 700; font-size: 1rem; margin: 0 0 0.25rem; }
.page-card .card-sub { font-size: 0.82rem; color: var(--gray-soft); margin-bottom: 1rem; }

.form-group { margin-bottom: 1rem; }
.form-group label { display: block; font-weight: 600; font-size: 0.85rem; margin-bottom: 0.35rem; }
.form-group input, .form-group select, .form-group textarea {
  width: 100%; padding: 0.6rem 1rem; border: 2px solid var(--line); border-radius: 10px;
  font-size: 0.88rem; font-family: 'Inter', sans-serif; color: var(--charcoal);
  background: var(--bg); transition: border-color .2s, box-shadow .2s;
}
.form-group input:focus, .form-group select:focus, .form-group textarea:focus {
  border-color: var(--deep-green); outline: none; box-shadow: 0 0 0 4px rgba(14,104,83,0.1);
}
.form-group textarea { min-height: 120px; font-family: 'JetBrains Mono', monospace; font-size: 0.82rem; line-height: 1.6; resize: vertical; }
.form-help { font-size: 0.78rem; color: var(--gray-soft); margin-top: 0.25rem; }
.form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }

.btn { display: inline-flex; align-items: center; gap: 0.3rem; padding: 0.55rem 1.25rem; border-radius: 10px; font-size: 0.85rem; font-weight: 600; border: none; cursor: pointer; transition: transform .15s; text-decoration: none; }
.btn:hover { transform: translateY(-1px); }
.btn-primary { background: linear-gradient(135deg, var(--orange), var(--deep-green) 60%, var(--deep-green)); color: #fff; }
.btn-outline { background: transparent; border: 1px solid var(--line); color: var(--gray); }
.btn-danger { background: #FFE8E8; color: #D9534F; }
.btn-sm { padding: 0.35rem 0.85rem; font-size: 0.78rem; border-radius: 8px; }

.video-list { display: flex; flex-direction: column; gap: 0.5rem; }
.video-item {
  display: flex; align-items: center; gap: 0.75rem;
  padding: 0.7rem 1rem; border-radius: 10px;
  background: var(--bg); border: 1px solid var(--line);
}
.video-item .v-num { width: 28px; height: 28px; border-radius: 50%; background: var(--deep-green-light); color: var(--deep-green); display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 0.78rem; flex-shrink: 0; }
.video-item .v-info { flex: 1; }
.video-item .v-title { font-weight: 600; font-size: 0.85rem; }
.video-item .v-url { font-size: 0.75rem; color: var(--gray-soft); word-break: break-all; }

@media (max-width: 768px) { .sidebar { width: 100%; position: relative; } .main-area { margin-left: 0; } .form-row { grid-template-columns: 1fr; } .wrap { padding: 1.25rem; } }
</style>
</head>
<body>
<script>if(localStorage.getItem("learnbase_dark_mode")==="true")document.body.classList.add("dark-mode");</script>
<aside class="sidebar">
  <a href="<?= site_url('mentor/dashboard') ?>" class="brand">LEARNBASE<span>.</span> <small>Mentor</small></a>
  <ul class="side-nav">
    <li class="nav-label">Menu</li>
    <li><a href="<?= site_url('mentor/dashboard') ?>" class="side-link"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="9"></rect><rect x="14" y="3" width="7" height="5"></rect><rect x="14" y="12" width="7" height="9"></rect><rect x="3" y="16" width="7" height="5"></rect></svg> Dashboard</a></li>
    <li><a href="<?= site_url('mentor/modules') ?>" class="side-link active"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg> Kelola Modul</a></li>
    <li><a href="<?= site_url('mentor/premium_members') ?>" class="side-link"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg> Premium Member</a></li>
    <li><a href="<?= site_url('mentor/change_password') ?>" class="side-link"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg> Ganti Password</a></li>
  </ul>
</aside>
<div class="main-area">
  <header class="topbar">
    <div class="topbar-title">✏️ <?= $module['name'] ?></div>
    <div class="topbar-right">
      <div class="avatar"><?= strtoupper(substr($nama, 0, 1)) ?></div>
      <span class="user-name"><?= $nama ?></span>
    </div>
  </header>
  <div class="wrap">
    <a href="<?= site_url('mentor/modules') ?>" class="btn btn-outline" style="margin-bottom:1rem;">← Kembali</a>

    <?php if ($this->session->flashdata('success')): ?><div class="alert success">✅ <?= $this->session->flashdata('success') ?></div><?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?><div class="alert error">⚠️ <?= $this->session->flashdata('error') ?></div><?php endif; ?>

    <form method="post" action="<?= site_url('mentor/update_module/' . $module['slug']) ?>">
      <div class="page-card">
        <h3>📝 Informasi Modul</h3>
        <div class="card-sub">Atur nama, kategori, dan metadata modul.</div>
        <div class="form-row">
          <div class="form-group">
            <label>Nama Modul</label>
            <input type="text" name="name" value="<?= $module['name'] ?>" required>
          </div>
          <div class="form-group">
            <label>Kategori</label>
            <input type="text" name="category" value="<?= $module['category'] ?>" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group">
            <label>Level</label>
            <select name="difficulty">
              <option value="beginner" <?= $module['difficulty'] === 'beginner' ? 'selected' : '' ?>>Beginner</option>
              <option value="intermediate" <?= $module['difficulty'] === 'intermediate' ? 'selected' : '' ?>>Intermediate</option>
              <option value="advanced" <?= $module['difficulty'] === 'advanced' ? 'selected' : '' ?>>Advanced</option>
            </select>
          </div>
          <div class="form-group">
            <label>Bahasa</label>
            <input type="text" name="language" value="<?= $module['language'] ?>" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group">
            <label>Warna Icon (hex)</label>
            <input type="text" name="icon_color" value="<?= $module['icon_color'] ?>" placeholder="#0E6853">
          </div>
          <div class="form-group">
            <label>Slug (read-only)</label>
            <input type="text" value="<?= $module['slug'] ?>" disabled style="opacity:0.6;">
          </div>
        </div>
      </div>

      <div class="page-card">
        <h3>📄 Konten Modul (HTML)</h3>
        <div class="card-sub">Edit konten HTML pembelajaran modul ini. Gunakan struktur yang sudah ada sebagai patokan.</div>
        <div class="form-group">
          <textarea name="content" style="min-height:400px;font-family:'JetBrains Mono',monospace;font-size:0.82rem;line-height:1.6;" required><?= htmlspecialchars($module['content']) ?></textarea>
        </div>
      </div>

      <div class="page-card">
        <h3>🏅 Sertifikat</h3>
        <div class="card-sub">Atur teks dan warna sertifikat kelulusan modul ini.</div>
        <div class="form-row">
          <div class="form-group">
            <label>Judul Sertifikat</label>
            <input type="text" name="cert_title" value="<?= $cert['title_text'] ?? 'Certificate of Completion' ?>" placeholder="Certificate of Completion">
          </div>
          <div class="form-group">
            <label>Warna Tema</label>
            <input type="text" name="cert_color" value="<?= $cert['color_theme'] ?? '#0E6853' ?>" placeholder="#0E6853">
          </div>
        </div>
        <div class="form-group">
          <label>Teks Body</label>
          <input type="text" name="cert_body" value="<?= $cert['body_text'] ?? '' ?>" placeholder="Telah menyelesaikan modul ini secara penuh">
        </div>
      </div>

      <button type="submit" class="btn btn-primary" style="margin-bottom:2rem;">💾 Simpan Perubahan Modul</button>
    </form>

    <!-- VIDEOS -->
    <div class="page-card">
      <h3>🎬 Video Pembelajaran</h3>
      <div class="card-sub">Tambahkan video YouTube yang akan tampil untuk member premium.</div>

      <form method="post" action="<?= site_url('mentor/add_video/' . $module['slug']) ?>" style="display:flex;gap:0.75rem;flex-wrap:wrap;margin-bottom:1rem;padding:1rem;background:var(--bg);border-radius:12px;">
        <div style="flex:2;min-width:180px;">
          <label style="font-size:0.78rem;font-weight:600;display:block;margin-bottom:0.25rem;">Judul Video</label>
          <input type="text" name="title" placeholder="Contoh: Pengenalan JavaScript" required style="width:100%;padding:0.5rem 0.85rem;border:2px solid var(--line);border-radius:10px;font-size:0.85rem;background:var(--card-bg);color:var(--charcoal);">
        </div>
        <div style="flex:3;min-width:220px;">
          <label style="font-size:0.78rem;font-weight:600;display:block;margin-bottom:0.25rem;">URL YouTube</label>
          <input type="url" name="youtube_url" placeholder="https://www.youtube.com/watch?v=..." required style="width:100%;padding:0.5rem 0.85rem;border:2px solid var(--line);border-radius:10px;font-size:0.85rem;background:var(--card-bg);color:var(--charcoal);">
        </div>
        <div style="display:flex;align-items:flex-end;">
          <button type="submit" class="btn btn-primary btn-sm" style="padding:0.5rem 1.2rem;">+ Tambah</button>
        </div>
      </form>

      <?php if (empty($videos)): ?>
      <p style="color:var(--gray-soft);font-size:0.9rem;">Belum ada video. Tambahkan URL YouTube di atas.</p>
      <?php else: ?>
      <div class="video-list">
        <?php foreach ($videos as $i => $v): ?>
        <div class="video-item">
          <div class="v-num"><?= $i + 1 ?></div>
          <div class="v-info">
            <div class="v-title"><?= $v['title'] ?></div>
            <div class="v-url"><?= $v['youtube_url'] ?></div>
          </div>
          <a href="<?= site_url('mentor/delete_video/' . $v['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus video ini?')">🗑️</a>
        </div>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>
    </div>
  </div>
</div>
</body>
</html>
