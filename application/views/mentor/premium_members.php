<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Premium Member — LEARNBASE.</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<style>
:root { --deep-green: #0E6853; --deep-green-dark: #0a4f3f; --deep-green-light: #E7F2EF; --orange: #FF5B35; --orange-light: #FFEFEA; --charcoal: #1A1A1A; --gray: #666; --gray-soft: #8A8A8A; --bg: #F7F9F8; --line: #EAEDEC; --sidebar-w: 250px; --card-bg: #fff; }
body.dark-mode { --deep-green: #1ABC9C; --deep-green-dark: #16A085; --deep-green-light: #1A3E3A; --orange: #FF7F50; --orange-light: #3E2A20; --charcoal: #E8E8E8; --gray: #B0B0B0; --gray-soft: #888; --bg: #0F171E; --line: #1F2A33; --card-bg: #1A2530; }
body.dark-mode .sidebar, body.dark-mode .topbar, body.dark-mode .table-wrap { background: var(--card-bg); }
body.dark-mode .sidebar, body.dark-mode .topbar, body.dark-mode .table-wrap { border-color: var(--line); }
body.dark-mode td { border-bottom-color: var(--line); }
body.dark-mode table thead th { background: var(--bg); }
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
.user-name { font-weight: 600; font-size: 0.85rem; }
.logout-btn { background: var(--orange); color: #fff; font-weight: 600; font-size: 0.8rem; padding: 0.45rem 1.1rem; border-radius: 50px; border: none; cursor: pointer; }
.wrap { padding: 1.75rem 2rem; }
.page-title { font-weight: 700; font-size: 1.4rem; margin-bottom: 0.25rem; }
.page-sub { color: var(--gray-soft); font-size: 0.9rem; margin-bottom: 1.25rem; }
.table-wrap { background: var(--card-bg); border: 1px solid var(--line); border-radius: 16px; overflow: hidden; }
table { width: 100%; border-collapse: collapse; font-size: 0.88rem; }
th { text-align: left; padding: 0.7rem 1.1rem; background: var(--bg); color: var(--gray-soft); font-weight: 600; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.04em; border-bottom: 1px solid var(--line); }
td { padding: 0.7rem 1.1rem; border-bottom: 1px solid var(--bg); color: var(--charcoal); }
tr:last-child td { border-bottom: none; }
.badge { display: inline-block; font-size: 0.7rem; font-weight: 600; padding: 0.2rem 0.65rem; border-radius: 50px; }
.badge.premium { background: #FFF3D6; color: #B8862A; }
.btn-sm { display: inline-flex; align-items: center; gap: 0.3rem; padding: 0.35rem 0.85rem; border-radius: 8px; font-size: 0.78rem; font-weight: 600; border: none; cursor: pointer; text-decoration: none; }
.btn-sm.primary { background: var(--deep-green); color: #fff; }
@media (max-width: 768px) { .sidebar { width: 100%; position: relative; } .main-area { margin-left: 0; } .wrap { padding: 1.25rem; } }
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
  <div style="border-top:1px solid var(--line);padding-top:0.75rem;">
    <a href="<?= site_url('auth/logout') ?>" class="side-link" style="color:var(--orange);"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> Logout</a>
  </div>
</aside>
<div class="main-area">
  <header class="topbar">
    <div class="topbar-title">Premium Member</div>
    <div class="topbar-right">
      <div class="avatar"><?= strtoupper(substr($nama, 0, 1)) ?></div>
      <span class="user-name"><?= $nama ?></span>
      <a href="<?= site_url('auth/logout') ?>" class="logout-btn">Logout</a>
    </div>
  </header>
  <div class="wrap">
    <h1 class="page-title"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align:middle;margin-right:8px;"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg> Premium Member</h1>
    <p class="page-sub">Pantau progres belajar member premium.</p>
    <div class="table-wrap">
      <table>
        <thead><tr><th>Nama</th><th>Email</th><th>Membership</th><th>Bergabung</th><th>Aksi</th></tr></thead>
        <tbody>
          <?php if (empty($members)): ?>
          <tr><td colspan="5" style="text-align:center;color:var(--gray-soft);padding:2rem;">Belum ada premium member.</td></tr>
          <?php else: ?>
          <?php foreach ($members as $m): ?>
          <tr>
            <td><strong><?= $m['nama'] ?></strong></td>
            <td><?= $m['email'] ?></td>
            <td><span class="badge premium">Premium</span></td>
            <td><?= date('d M Y', strtotime($m['created_at'])) ?></td>
            <td><a href="<?= site_url('mentor/premium_member_detail/' . $m['id']) ?>" class="btn-sm primary">�� Lihat Progres</a></td>
          </tr>
          <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</body>
</html>
