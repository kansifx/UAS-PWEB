<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mentor Dashboard — LEARNBASE.</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<style>
:root {
  --deep-green: #0E6853; --deep-green-dark: #0a4f3f; --deep-green-light: #E7F2EF;
  --orange: #FF5B35; --orange-light: #FFEFEA; --charcoal: #1A1A1A;
  --gray: #666; --gray-soft: #8A8A8A; --bg: #F7F9F8; --line: #EAEDEC;
  --sidebar-w: 250px; --card-bg: #fff;
}
body.dark-mode {
  --deep-green: #1ABC9C; --deep-green-dark: #16A085; --deep-green-light: #1A3E3A;
  --orange: #FF7F50; --orange-light: #3E2A20; --charcoal: #E8E8E8;
  --gray: #B0B0B0; --gray-soft: #888; --bg: #0F171E; --line: #1F2A33;
  --card-bg: #1A2530;
}
body.dark-mode .sidebar, body.dark-mode .topbar, body.dark-mode .stat-card { background: var(--card-bg); }
body.dark-mode .sidebar, body.dark-mode .topbar, body.dark-mode .stat-card { border-color: var(--line); }
* { box-sizing: border-box; }
body { font-family: 'Inter', sans-serif; background: var(--bg); color: var(--charcoal); margin: 0; padding: 0; display: flex; min-height: 100vh; overflow-x: hidden; }
h1,h2,h3,h4,h5,h6 { font-family: 'Poppins', sans-serif; }
a { text-decoration: none; }

.sidebar {
  width: var(--sidebar-w); background: var(--card-bg); border-right: 1px solid var(--line);
  padding: 1.75rem 1rem; display: flex; flex-direction: column;
  position: fixed; top: 0; left: 0; bottom: 0; z-index: 100;
}
.sidebar .brand { font-weight: 800; font-size: 1.3rem; color: var(--charcoal); padding: 0 0.5rem; margin-bottom: 2rem; display: block; }
.sidebar .brand span { color: var(--orange); }
.sidebar .brand small { font-size: 0.65rem; font-weight: 500; color: var(--gray-soft); }
.side-nav { list-style: none; padding: 0; margin: 0; flex: 1; }
.side-nav .nav-label { font-size: 0.7rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; color: var(--gray-soft); padding: 0 0.75rem; margin: 0.5rem 0 0.75rem; }
.side-nav li { margin-bottom: 0.25rem; }
.side-link { display: flex; align-items: center; gap: 0.7rem; padding: 0.65rem 0.85rem; border-radius: 12px; color: var(--gray); font-weight: 500; font-size: 0.9rem; transition: background .15s, color .15s; }
.side-link:hover { background: var(--deep-green-light); color: var(--deep-green-dark); }
.side-link.active { background: linear-gradient(135deg, var(--orange), var(--deep-green) 65%, var(--deep-green)); color: #fff; box-shadow: 0 8px 18px rgba(14,104,83,0.2); }

.main-area { margin-left: var(--sidebar-w); flex: 1; min-height: 100vh; }

.topbar {
  background: var(--card-bg); border-bottom: 1px solid var(--line);
  padding: 0.9rem 2rem; display: flex; align-items: center; justify-content: space-between;
  position: sticky; top: 0; z-index: 90;
}
.topbar-title { font-weight: 700; font-size: 1.15rem; color: var(--charcoal); }
.topbar-right { display: flex; align-items: center; gap: 0.75rem; }
.avatar { width: 36px; height: 36px; border-radius: 50%; background: linear-gradient(135deg, var(--orange), var(--deep-green)); display: flex; align-items: center; justify-content: center; color: #fff; font-weight: 700; font-size: 0.85rem; }
.user-name { font-weight: 600; font-size: 0.85rem; color: var(--charcoal); }
.logout-btn { background: var(--orange); color: #fff; font-weight: 600; font-size: 0.8rem; padding: 0.45rem 1.1rem; border-radius: 50px; border: none; cursor: pointer; transition: transform .15s; }
.logout-btn:hover { transform: translateY(-1px); }

.wrap { padding: 1.75rem 2rem; }
.page-title { font-weight: 700; font-size: 1.4rem; margin-bottom: 0.25rem; }
.page-sub { color: var(--gray-soft); font-size: 0.9rem; margin-bottom: 1.5rem; }

.stats { display: grid; grid-template-columns: repeat(auto-fit, minmax(170px,1fr)); gap: 1rem; margin-bottom: 2rem; }
.stat-card {
  background: var(--card-bg); border: 1px solid var(--line); border-radius: 16px;
  padding: 1.25rem 1.35rem; display: flex; align-items: center; gap: 0.9rem;
  transition: box-shadow .15s, transform .15s;
}
.stat-card:hover { box-shadow: 0 8px 16px rgba(0,0,0,0.05); transform: translateY(-2px); }
.stat-icon { width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; }
.stat-icon.green { background: var(--deep-green-light); }
.stat-icon.orange { background: var(--orange-light); }
.stat-value { font-family: 'Poppins', sans-serif; font-weight: 700; font-size: 1.4rem; line-height: 1.2; }
.stat-label { font-size: 0.75rem; color: var(--gray-soft); font-weight: 500; }

.quick-links { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px,1fr)); gap: 1rem; margin-bottom: 1.5rem; }
.qlink {
  background: var(--card-bg); border: 1px solid var(--line); border-radius: 18px;
  padding: 1.5rem; text-align: center; transition: box-shadow .2s, transform .2s;
}
.qlink:hover { box-shadow: 0 12px 28px rgba(0,0,0,0.06); transform: translateY(-2px); }
.qlink .icon { font-size: 2rem; margin-bottom: 0.5rem; }
.qlink .name { font-weight: 700; font-size: 0.95rem; margin-bottom: 0.25rem; color: var(--charcoal); }
.qlink .desc { font-size: 0.82rem; color: var(--gray-soft); line-height: 1.5; text-decoration: none; }

.info-card {
  background: linear-gradient(120deg, var(--deep-green), #12806A);
  border-radius: 18px; padding: 1.5rem 2rem; color: #fff;
  display: flex; align-items: center; gap: 1.25rem; flex-wrap: wrap;
}
.info-card h3 { font-weight: 700; margin: 0; }
.info-card p { opacity: 0.85; font-size: 0.9rem; margin: 0.3rem 0 0; }
.info-card a { color: #fff; font-weight: 600; text-decoration: underline; }

@media (max-width: 768px) {
  .sidebar { width: 100%; position: relative; }
  .main-area { margin-left: 0; }
  .wrap { padding: 1.25rem; }
}
</style>
</head>
<body>
<script>if(localStorage.getItem("learnbase_dark_mode")==="true")document.body.classList.add("dark-mode");</script>

<aside class="sidebar">
  <a href="<?= site_url('mentor/dashboard') ?>" class="brand">LEARNBASE<span>.</span> <small>Mentor</small></a>
  <ul class="side-nav">
    <li class="nav-label">Menu</li>
    <li><a href="<?= site_url('mentor/dashboard') ?>" class="side-link active">
      <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="9"></rect><rect x="14" y="3" width="7" height="5"></rect><rect x="14" y="12" width="7" height="9"></rect><rect x="3" y="16" width="7" height="5"></rect></svg>
      Dashboard</a></li>
    <li><a href="<?= site_url('mentor/modules') ?>" class="side-link">
      <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
      Kelola Modul</a></li>
    <li><a href="<?= site_url('mentor/premium_members') ?>" class="side-link">
      <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
      Premium Member</a></li>
    <li><a href="<?= site_url('mentor/change_password') ?>" class="side-link">
      <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
      Ganti Password</a></li>
    <li><a href="<?= site_url('mentor/chat') ?>" class="side-link">
      <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
      Live Chat</a></li>
  </ul>
  <div style="border-top:1px solid var(--line);padding-top:0.75rem;">
    <a href="<?= site_url('auth/logout') ?>" class="side-link" style="color:var(--orange);">
      <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
      Logout</a>
  </div>
</aside>

<div class="main-area">
  <header class="topbar">
    <div class="topbar-title">Dashboard</div>
    <div class="topbar-right">
      <div class="avatar"><?= strtoupper(substr($nama, 0, 1)) ?></div>
      <span class="user-name"><?= $nama ?></span>
      <a href="<?= site_url('auth/logout') ?>" class="logout-btn">Logout</a>
    </div>
  </header>

  <div class="wrap">
    <h1 class="page-title">Halo, <?= $nama ?>! 👋</h1>
    <p class="page-sub">Kelola modul, pantau progres premium member, dan bimbing siswa.</p>

    <div class="stats">
      <div class="stat-card">
        <div class="stat-icon green">📚</div>
        <div><div class="stat-value"><?= $total_modules ?></div><div class="stat-label">Total Modul</div></div>
      </div>
      <div class="stat-card">
        <div class="stat-icon orange">⭐</div>
        <div><div class="stat-value"><?= $total_premium ?></div><div class="stat-label">Premium Member</div></div>
      </div>
      <div class="stat-card">
        <div class="stat-icon green">📊</div>
        <div><div class="stat-value"><?= $total_progress ?></div><div class="stat-label">Progress Records</div></div>
      </div>
      <div class="stat-card">
        <div class="stat-icon orange">🎬</div>
        <div><div class="stat-value"><?= $total_videos ?></div><div class="stat-label">Video</div></div>
      </div>
    </div>

    <div class="quick-links">
      <a href="<?= site_url('mentor/modules') ?>" class="qlink">
        <div class="icon">📝</div>
        <div class="name">Kelola Modul</div>
        <div class="desc">Tambah, edit, dan hapus konten modul serta video pembelajaran</div>
      </a>
      <a href="<?= site_url('mentor/premium_members') ?>" class="qlink">
        <div class="icon">⭐</div>
        <div class="name">Premium Member</div>
        <div class="desc">Pantau progres belajar member premium</div>
      </a>
      <a href="<?= site_url('mentor/change_password') ?>" class="qlink">
        <div class="icon">🔑</div>
        <div class="name">Ganti Password</div>
        <div class="desc">Perbarui password akun mentor kamu</div>
      </a>
    </div>

    <div class="info-card">
      <div style="font-size:2.5rem;">📞</div>
      <div>
        <h3>Butuh bantuan?</h3>
        <p>Hubungi admin via WhatsApp untuk laporan kendala atau pertanyaan seputar platform.</p>
        <a href="https://wa.me/6281234567890?text=Halo%20Admin%20LearnBase,%20saya%20butuh%20bantuan" target="_blank">Klik di sini untuk chat WhatsApp Admin →</a>
      </div>
    </div>
  </div>
</div>
</body>
</html>
