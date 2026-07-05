<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $title ?> — LEARNBASE.</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<style>
:root { --deep-green: #0E6853; --deep-green-dark: #0a4f3f; --deep-green-light: #E7F2EF; --orange: #FF5B35; --orange-light: #FFEFEA; --charcoal: #1A1A1A; --gray: #666; --gray-soft: #8A8A8A; --bg: #F7F9F8; --line: #EAEDEC; --sidebar-w: 250px; --card-bg: #fff; }
body.dark-mode { --deep-green: #1ABC9C; --deep-green-dark: #16A085; --deep-green-light: #1A3E3A; --orange: #FF7F50; --orange-light: #3E2A20; --charcoal: #E8E8E8; --gray: #B0B0B0; --gray-soft: #888; --bg: #0F171E; --line: #1F2A33; --card-bg: #1A2530; }
body.dark-mode .sidebar, body.dark-mode .topbar, body.dark-mode .page-card, body.dark-mode .card-stat { background: var(--card-bg); }
body.dark-mode .sidebar, body.dark-mode .topbar, body.dark-mode .page-card, body.dark-mode .card-stat { border-color: var(--line); }
body.dark-mode td { border-bottom-color: var(--line); }
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
.topbar-title { font-weight: 700; font-size: 1.15rem; }
.topbar-right { display: flex; align-items: center; gap: 0.75rem; }
.avatar { width: 36px; height: 36px; border-radius: 50%; background: linear-gradient(135deg, var(--orange), var(--deep-green)); display: flex; align-items: center; justify-content: center; color: #fff; font-weight: 700; font-size: 0.85rem; }
.wrap { padding: 1.75rem 2rem; }

.profile-header { display: flex; align-items: center; gap: 1.25rem; background: var(--card-bg); border: 1px solid var(--line); border-radius: 18px; padding: 1.5rem 2rem; margin-bottom: 1.25rem; }
.profile-avatar-lg { width: 56px; height: 56px; border-radius: 50%; background: linear-gradient(135deg, var(--orange), var(--deep-green)); display: flex; align-items: center; justify-content: center; color: #fff; font-weight: 700; font-size: 1.3rem; flex-shrink: 0; }
.profile-info h2 { font-weight: 700; font-size: 1.2rem; margin: 0 0 0.15rem; }
.profile-info .email { color: var(--gray-soft); font-size: 0.85rem; }
.badge { display: inline-block; font-size: 0.7rem; font-weight: 600; padding: 0.2rem 0.65rem; border-radius: 50px; }
.badge.premium { background: #FFF3D6; color: #B8862A; }

.stats-mini { display: grid; grid-template-columns: repeat(auto-fit, minmax(130px,1fr)); gap: 0.75rem; margin-bottom: 1.25rem; }
.card-stat { background: var(--card-bg); border: 1px solid var(--line); border-radius: 14px; padding: 1rem; text-align: center; }
.card-stat .num { font-family: 'Poppins', sans-serif; font-weight: 700; font-size: 1.4rem; color: var(--deep-green); }
.card-stat .lbl { font-size: 0.75rem; color: var(--gray-soft); margin-top: 0.15rem; }

.page-card { background: var(--card-bg); border: 1px solid var(--line); border-radius: 16px; padding: 1.4rem; margin-bottom: 1rem; }
.page-card h3 { font-weight: 700; font-size: 0.95rem; margin: 0 0 0.75rem; }

.progress-module { display: flex; align-items: center; gap: 0.75rem; padding: 0.75rem 1rem; border-radius: 10px; background: var(--bg); border: 1px solid var(--line); margin-bottom: 0.4rem; }
.progress-module .name { flex: 1; font-weight: 600; font-size: 0.85rem; }
.progress-track-mini { width: 100px; height: 5px; background: var(--line); border-radius: 50px; overflow: hidden; }
.progress-fill-mini { height: 100%; background: linear-gradient(90deg, var(--orange), var(--deep-green)); }
.progress-module .pct { font-size: 0.8rem; font-weight: 600; color: var(--deep-green-dark); min-width: 40px; text-align: right; }
.progress-module .sbadge { font-size: 0.68rem; font-weight: 600; padding: 0.15rem 0.55rem; border-radius: 50px; }
.sbadge.completed { background: var(--deep-green-light); color: var(--deep-green); }
.sbadge.in-progress { background: var(--orange-light); color: var(--orange); }
.sbadge.not-started { background: var(--bg); color: var(--gray-soft); }

.btn-sm { display: inline-flex; align-items: center; gap: 0.3rem; padding: 0.35rem 0.85rem; border-radius: 8px; font-size: 0.78rem; font-weight: 600; border: none; cursor: pointer; text-decoration: none; }
.btn-sm.outline { background: transparent; border: 1px solid var(--line); color: var(--gray); }
@media (max-width: 768px) { .sidebar { width: 100%; position: relative; } .main-area { margin-left: 0; } }
</style>
</head>
<body>
<script>if(localStorage.getItem("learnbase_dark_mode")==="true")document.body.classList.add("dark-mode");</script>
<aside class="sidebar">
  <a href="<?= site_url('mentor/dashboard') ?>" class="brand">LEARNBASE<span>.</span> <small>Mentor</small></a>
  <ul class="side-nav">
    <li class="nav-label">Menu</li>
    <li><a href="<?= site_url('mentor/dashboard') ?>" class="side-link"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="9"></rect><rect x="14" y="3" width="7" height="5"></rect><rect x="14" y="12" width="7" height="9"></rect><rect x="3" y="16" width="7" height="5"></rect></svg> Dashboard</a></li>
    <li><a href="<?= site_url('mentor/modules') ?>" class="side-link"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg> Kelola Modul</a></li>
    <li><a href="<?= site_url('mentor/premium_members') ?>" class="side-link active"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg> Premium Member</a></li>
    <li><a href="<?= site_url('mentor/change_password') ?>" class="side-link"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg> Ganti Password</a></li>
  </ul>
</aside>
<div class="main-area">
  <header class="topbar">
    <div class="topbar-title">Detail Premium Member</div>
    <div class="topbar-right">
      <div class="avatar"><?= strtoupper(substr($nama, 0, 1)) ?></div>
      <span class="user-name"><?= $nama ?></span>
    </div>
  </header>
  <div class="wrap">
    <a href="<?= site_url('mentor/premium_members') ?>" class="btn-sm outline" style="margin-bottom:1rem;">← Kembali</a>

    <div class="profile-header">
      <div class="profile-avatar-lg"><?= strtoupper(substr($user['nama'], 0, 1)) ?></div>
      <div class="profile-info">
        <h2><?= $user['nama'] ?></h2>
        <div class="email"><?= $user['email'] ?> · <span class="badge premium">Premium</span> · Bergabung <?= date('d M Y', strtotime($user['created_at'])) ?></div>
      </div>
    </div>

    <div class="stats-mini">
      <div class="card-stat"><div class="num"><?= $completed_count ?></div><div class="lbl">Completed</div></div>
      <div class="card-stat"><div class="num"><?= $in_progress_count ?></div><div class="lbl">In Progress</div></div>
      <div class="card-stat"><div class="num"><?= $learning_hours ?></div><div class="lbl">Jam Belajar</div></div>
    </div>

    <div class="page-card">
      <h3> Progress Belajar</h3>
      <?php $has = false; foreach ($course_progress as $cp) { if ($cp['done'] > 0) { $has = true; break; } } ?>
      <?php if (!$has): ?><p style="color:var(--gray-soft);font-size:0.88rem;">Member ini belum memulai modul apapun.</p><?php endif; ?>
      <?php foreach ($course_progress as $cp): if ($cp['done'] == 0) continue; ?>
      <div class="progress-module">
        <div class="name"><?= $cp['module']['name'] ?></div>
        <div class="progress-track-mini"><div class="progress-fill-mini" style="width:<?= $cp['pct'] ?>%;"></div></div>
        <span class="pct"><?= $cp['pct'] ?>%</span>
        <span class="sbadge <?= $cp['status'] ?>"><?= $cp['status'] === 'completed' ? 'Selesai' : 'Progres' ?></span>
      </div>
      <?php endforeach; ?>
    </div>

    <div class="page-card">
      <h3> Semua Modul</h3>
      <?php foreach ($course_progress as $cp): ?>
      <div class="progress-module">
        <div class="name"><?= $cp['module']['name'] ?></div>
        <div class="progress-track-mini"><div class="progress-fill-mini" style="width:<?= $cp['pct'] ?>%;"></div></div>
        <span class="pct"><?= $cp['pct'] ?>% (<?= $cp['done'] ?>/<?= $cp['total'] ?>)</span>
        <span class="sbadge <?= $cp['status'] ?>"><?= str_replace('-', ' ', ucfirst($cp['status'])) ?></span>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
</body>
</html>
