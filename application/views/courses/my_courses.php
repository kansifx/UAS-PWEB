<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Courses — LEARNBASE.</title>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    :root {
      --deep-green: #0E6853;
      --deep-green-dark: #0a4f3f;
      --deep-green-light: #E7F2EF;
      --orange: #FF5B35;
      --orange-light: #FFEFEA;
      --charcoal: #1A1A1A;
      --gray: #666666;
      --gray-soft: #8A8A8A;
      --bg: #F7F9F8;
      --line: #EAEDEC;
      --border-light: #e8edec;
      --sidebar-w: 264px;
    body.dark-mode {
      --deep-green: #1ABC9C;
      --deep-green-dark: #16A085;
      --deep-green-light: #1A3E3A;
      --orange: #FF7F50;
      --orange-light: #3E2A20;
      --charcoal: #E8E8E8;
      --gray: #B0B0B0;
      --gray-soft: #888;
      --bg: #0F171E;
      --line: #1F2A33;
      --border-light: #1F2A33;
      --card-bg: #1A2530;
    }
    body.dark-mode .sidebar,
    body.dark-mode .top-header,
    body.dark-mode .profile-dropdown,
    body.dark-mode .mc-card,
    body.dark-mode .site-footer { background: var(--card-bg); }
    body.dark-mode .mc-card,
    body.dark-mode .top-header,
    body.dark-mode .sidebar,
    body.dark-mode .site-footer { border-color: var(--line); }
    body.dark-mode .search-box input { background: #0F171E; border-color: var(--line); color: var(--text-primary); }
    body.dark-mode .icon-btn { background: var(--card-bg); border-color: var(--line); }
    body.dark-mode .dash-bg-shapes .bg-circle.c1 { background: radial-gradient(circle, rgba(26,188,156,0.08) 0%, transparent 70%); }
    body.dark-mode .mc-card-continue { background: linear-gradient(135deg, #1A3E3A, var(--card-bg) 70%); }
    body.dark-mode .status-chip { color: #000; }
    body.dark-mode .status-chip.active { color: #fff; }
    body.dark-mode .mc-btn-start { color: #000; }
    }

    /* ===== Sidebar collapse state ===== */
    body.sidebar-collapsed .sidebar {
      transform: translateX(calc(var(--sidebar-w) * -1));
    }
    body.sidebar-collapsed .main-area {
      margin-left: 0;
    }
    body.sidebar-collapsed .sidebar-toggle-collapse svg {
      transform: rotate(180deg);
    }

    * { box-sizing: border-box; }

    html { overflow-x: clip; }
    body {
      font-family: 'Inter', sans-serif;
      color: var(--charcoal);
      background-color: var(--bg);
      overflow-x: clip;
      position: relative;
    }

    /* ===== DECORATIVE BACKGROUND ===== */
    .dash-bg-shapes {
      position: fixed;
      inset: 0;
      z-index: 0;
      pointer-events: none;
      overflow: hidden;
    }

    .dash-bg-shapes .bg-circle { position: absolute; border-radius: 50%; }
    .dash-bg-shapes .bg-circle.c1 {
      width: 520px; height: 520px;
      background: radial-gradient(circle, rgba(14,104,83,0.05) 0%, transparent 70%);
      top: -200px; right: -120px;
    }
    .dash-bg-shapes .bg-circle.c2 {
      width: 380px; height: 380px;
      background: radial-gradient(circle, rgba(255,91,53,0.04) 0%, transparent 70%);
      bottom: -150px; left: -100px;
    }
    .dash-bg-shapes .bg-dots {
      position: absolute;
      inset: 0;
      opacity: 0.25;
      background-image: radial-gradient(var(--border-light) 1px, transparent 1px);
      background-size: 32px 32px;
    }

    h1, h2, h3, h4, h5, h6, .brand-logo { font-family: 'Poppins', sans-serif; }
    a { text-decoration: none; }

    /* ===================== SIDEBAR ===================== */
    .sidebar {
      position: fixed;
      top: 0; left: 0; bottom: 0;
      width: var(--sidebar-w);
      background: #FFFFFF;
      border-right: 1px solid var(--line);
      padding: 1.75rem 1.25rem;
      display: flex;
      flex-direction: column;
      transition: transform 0.25s ease;
      z-index: 1050;
    }

    .sidebar .brand-logo {
      font-weight: 800;
      font-size: 1.35rem;
      color: var(--charcoal);
      letter-spacing: -0.5px;
      padding: 0 0.5rem;
      margin-bottom: 2.25rem;
      display: inline-block;
    }

    .sidebar .brand-logo span { color: var(--orange); }

    .side-nav { list-style: none; padding: 0; margin: 0; flex: 1; }

    .side-nav .nav-label {
      font-size: 0.72rem;
      font-weight: 600;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      color: var(--gray-soft);
      padding: 0 0.75rem;
      margin: 0.25rem 0 0.75rem;
    }

    .side-nav li { margin-bottom: 0.3rem; }

    .side-link {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      padding: 0.7rem 0.9rem;
      border-radius: 12px;
      color: var(--gray);
      font-weight: 500;
      font-size: 0.95rem;
      transition: background-color 0.15s ease, color 0.15s ease;
    }

    .side-link svg { flex-shrink: 0; opacity: 0.85; }
    .side-link:hover { background-color: var(--deep-green-light); color: var(--deep-green-dark); }

    .side-link.active {
      background: linear-gradient(135deg, var(--orange), var(--deep-green) 65%, var(--deep-green));
      color: #fff;
      box-shadow: 0 10px 22px rgba(14,104,83,0.25);
    }

    .side-link.active svg { opacity: 1; }

    .sidebar-footer { border-top: 1px solid var(--line); padding-top: 1rem; margin-top: 1rem; }

    .upgrade-card { background: var(--deep-green-light); border-radius: 16px; padding: 1rem; text-align: center; }

    .upgrade-card p {
      font-size: 0.8rem;
      color: var(--deep-green-dark);
      margin-bottom: 0.7rem;
      font-weight: 500;
      line-height: 1.4;
    }

    .btn-upgrade {
      background: linear-gradient(135deg, var(--orange), var(--deep-green) 60%, var(--deep-green));
      color: #fff;
      font-weight: 600;
      font-size: 0.82rem;
      padding: 0.5rem 1rem;
      border-radius: 50px;
      border: none;
      display: inline-block;
    }

    /* ===================== MAIN AREA ===================== */
    .main-area { margin-left: var(--sidebar-w); min-height: 100vh; position: relative; z-index: 1; background: transparent; }

    .sidebar-backdrop {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(0,0,0,0.35);
      z-index: 1040;
    }
    .sidebar-backdrop.show { display: block; }

    /* ===================== TOP HEADER ===================== */
    .top-header {
      position: sticky;
      top: 0;
      z-index: 1030;
      background: #FFFFFF;
      border-bottom: 1px solid var(--line);
      padding: 1rem 2rem;
      display: flex;
      align-items: center;
      gap: 1.25rem;
    }

    .sidebar-toggle { display: none; background: none; border: none; padding: 0.4rem; color: var(--charcoal); }

    .sidebar-toggle-collapse {
      background: none;
      border: none;
      padding: 0.4rem;
      color: var(--gray-soft);
      display: inline-flex;
      align-items: center;
      transition: color 0.15s ease;
    }
    .sidebar-toggle-collapse:hover { color: var(--deep-green); }
    .sidebar-toggle-collapse svg { transition: transform 0.25s ease; }

    .search-box { position: relative; flex: 1; max-width: 420px; }

    .search-box svg { position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: var(--gray-soft); }

    .search-box input {
      width: 100%;
      background: var(--bg);
      border: 2px solid var(--line);
      border-radius: 12px;
      padding: 0.62rem 1rem 0.62rem 2.6rem;
      font-size: 0.9rem;
      color: var(--charcoal);
      outline: none;
      transition: border-color 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
    }

    .search-box input:focus {
      border-color: var(--deep-green);
      background: #fff;
      box-shadow: 0 0 0 4px rgba(14,104,83,0.1);
    }

    .header-right { margin-left: auto; display: flex; align-items: center; gap: 1.1rem; }

    .icon-btn {
      position: relative;
      width: 42px; height: 42px;
      border-radius: 50%;
      background: var(--bg);
      border: 1px solid var(--line);
      display: flex; align-items: center; justify-content: center;
      color: var(--charcoal);
      transition: background-color 0.15s ease;
    }

    .icon-btn:hover { background: var(--deep-green-light); }

    .icon-btn .dot-badge {
      position: absolute; top: 9px; right: 10px;
      width: 8px; height: 8px; border-radius: 50%;
      background: var(--orange); border: 2px solid #fff;
    }

    .profile-wrap { position: relative; }

    .profile-chip {
      display: flex; align-items: center; gap: 0.65rem;
      padding-left: 1rem;
      border-left: 1px solid var(--line);
      cursor: pointer;
      user-select: none;
    }

    .profile-avatar {
      width: 42px; height: 42px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--orange), var(--deep-green) 65%, var(--deep-green));
      display: flex; align-items: center; justify-content: center;
      color: #fff; font-weight: 700;
      font-family: 'Poppins', sans-serif;
      font-size: 0.95rem;
    }

    .profile-chip .name { font-weight: 600; font-size: 0.88rem; color: var(--charcoal); line-height: 1.2; }
    .profile-chip .role { font-size: 0.75rem; color: var(--gray-soft); }

    .profile-dropdown {
      position: absolute;
      top: calc(100% + 10px);
      right: 0;
      min-width: 210px;
      background: #fff;
      border: 1px solid var(--line);
      border-radius: 14px;
      box-shadow: 0 16px 32px rgba(0,0,0,0.1);
      padding: 0.5rem;
      display: none;
      z-index: 1060;
    }

    .profile-dropdown.open { display: block; }

    .profile-dropdown-item {
      width: 100%;
      display: flex;
      align-items: center;
      gap: 0.6rem;
      background: none;
      border: none;
      text-align: left;
      padding: 0.6rem 0.7rem;
      border-radius: 10px;
      font-size: 0.85rem;
      font-weight: 500;
      color: var(--charcoal);
      transition: background-color 0.15s ease;
    }

    .profile-dropdown-item:hover { background: var(--deep-green-light); color: var(--deep-green-dark); }
    .profile-dropdown-item.danger { color: var(--orange); }
    .profile-dropdown-item.danger:hover { background: var(--orange-light); }

    .profile-dropdown-divider { height: 1px; background: var(--line); margin: 0.4rem 0.2rem; }

    /* ===================== CONTENT ===================== */
    .content-wrap { padding: 2rem; }

    /* Page header */
    .mc-header { margin-bottom: 1.75rem; }

    .mc-title {
      font-weight: 700;
      font-size: 1.6rem;
      color: var(--charcoal);
      margin-bottom: 0.35rem;
    }

    .mc-subtitle { font-size: 0.92rem; color: var(--gray-soft); margin-bottom: 0.5rem; }

    /* Status filter chips */
    .status-chips {
      display: flex;
      flex-wrap: wrap;
      gap: 0.5rem;
      margin-bottom: 1.5rem;
    }

    .status-chip {
      background: #fff;
      border: 1px solid var(--line);
      border-radius: 50px;
      padding: 0.5rem 1.1rem;
      font-size: 0.83rem;
      font-weight: 600;
      color: var(--gray);
      cursor: pointer;
      transition: background-color 0.15s ease, color 0.15s ease, border-color 0.15s ease;
    }

    .status-chip:hover { border-color: var(--deep-green); color: var(--deep-green-dark); }
    .status-chip.active {
      background: var(--deep-green);
      border-color: var(--deep-green);
      color: #fff;
    }

    /* ===== Featured Continue Card di dalam list ===== */
    .mc-card-continue {
      background: linear-gradient(135deg, var(--deep-green-light), #fff 70%);
      border: 2px solid var(--deep-green);
      position: relative;
    }

    .mc-card-continue-badge {
      position: absolute;
      top: -12px;
      left: 1.5rem;
      background: var(--deep-green);
      color: #fff;
      font-size: 0.7rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.06em;
      padding: 0.3rem 1rem;
      border-radius: 50px;
    }

    .mc-card-continue .mc-btn-resume {
      padding: 0.6rem 1.4rem;
      font-size: 0.9rem;
    }

    /* Course list */
    .course-list { display: flex; flex-direction: column; gap: 1rem; }

    .mc-card {
      background: #fff;
      border: 1px solid var(--line);
      border-radius: 20px;
      padding: 1.4rem 1.5rem;
      display: flex;
      align-items: center;
      gap: 1.5rem;
      transition: box-shadow 0.2s ease, transform 0.2s ease;
    }

    .mc-card:hover {
      box-shadow: 0 12px 28px rgba(0,0,0,0.06);
      transform: translateY(-2px);
    }

    .mc-card-icon {
      width: 56px;
      height: 56px;
      min-width: 56px;
      border-radius: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .mc-card-icon i[class*="devicon"] { line-height: 1; display: block; }

    .mc-card-body { flex: 1; min-width: 0; }

    .mc-card-top {
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      gap: 0.75rem;
      margin-bottom: 0.3rem;
    }

    .mc-card-type {
      font-size: 0.72rem;
      font-weight: 600;
      color: var(--deep-green);
      text-transform: uppercase;
      letter-spacing: 0.04em;
      margin-bottom: 0.25rem;
    }

    .mc-card-name {
      font-weight: 700;
      font-size: 1.05rem;
      color: var(--charcoal);
      line-height: 1.35;
      margin-bottom: 0.15rem;
    }

    .mc-card-instructor {
      font-size: 0.82rem;
      color: var(--gray-soft);
      margin-bottom: 0.7rem;
    }

    .mc-card-progress {
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .mc-progress-track {
      flex: 1;
      height: 6px;
      background: var(--bg);
      border-radius: 50px;
      overflow: hidden;
      max-width: 260px;
    }

    .mc-progress-fill {
      height: 100%;
      border-radius: 50px;
      background: linear-gradient(90deg, var(--orange), var(--deep-green));
      transition: width 0.4s ease;
    }

    .mc-progress-text {
      font-size: 0.78rem;
      font-weight: 600;
      color: var(--deep-green-dark);
      white-space: nowrap;
      min-width: 64px;
    }

    .mc-card-status {
      display: flex;
      flex-direction: column;
      align-items: flex-end;
      gap: 0.5rem;
      min-width: 100px;
    }

    .mc-badge {
      font-size: 0.72rem;
      font-weight: 600;
      padding: 0.3rem 0.75rem;
      border-radius: 50px;
      display: inline-block;
      text-align: center;
    }

    .mc-badge.in-progress { background: var(--deep-green-light); color: var(--deep-green); }
    .mc-badge.completed { background: var(--deep-green); color: #fff; }
    .mc-badge.not-started { background: var(--bg); color: var(--gray-soft); }

    .mc-btn-resume {
      background: linear-gradient(135deg, var(--orange), var(--deep-green) 60%, var(--deep-green));
      color: #fff;
      font-weight: 600;
      font-size: 0.8rem;
      padding: 0.45rem 1rem;
      border-radius: 50px;
      border: none;
      display: inline-flex;
      align-items: center;
      gap: 0.4rem;
      transition: transform 0.2s ease;
    }

    .mc-btn-resume:hover { transform: translateY(-1px); color: #fff; }

    .mc-btn-start {
      background: var(--deep-green);
      color: #fff;
      font-weight: 600;
      font-size: 0.8rem;
      padding: 0.45rem 1rem;
      border-radius: 50px;
      border: none;
      display: inline-flex;
      align-items: center;
      gap: 0.4rem;
      transition: transform 0.2s ease;
    }

    .mc-btn-start:hover { transform: translateY(-1px); color: #fff; }

    .mc-btn-done {
      background: var(--deep-green-light);
      color: var(--deep-green-dark);
      font-weight: 600;
      font-size: 0.8rem;
      padding: 0.45rem 1rem;
      border-radius: 50px;
      border: none;
      display: inline-flex;
      align-items: center;
      gap: 0.4rem;
      pointer-events: none;
    }

    /* Empty state */
    .mc-empty {
      display: none;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      background: #fff;
      border: 1px dashed var(--line);
      border-radius: 20px;
      padding: 3.5rem 1.5rem;
      text-align: center;
    }

    .mc-empty.visible { display: flex; }

    .mc-empty-icon { font-size: 2.8rem; margin-bottom: 0.8rem; }
    .mc-empty-title {
      font-weight: 700;
      font-size: 1.15rem;
      color: var(--charcoal);
      margin-bottom: 0.3rem;
    }
    .mc-empty-text { font-size: 0.88rem; color: var(--gray-soft); max-width: 340px; margin-bottom: 1.2rem; }

    .btn-empty-cta {
      background: linear-gradient(135deg, var(--orange), var(--deep-green) 60%, var(--deep-green));
      color: #fff;
      font-weight: 600;
      padding: 0.65rem 1.5rem;
      border-radius: 50px;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      transition: transform 0.2s ease;
    }

    .btn-empty-cta:hover { transform: translateY(-2px); color: #fff; }

    /* ===================== FOOTER ===================== */
    .site-footer {
      margin-top: 2.5rem;
      padding: 2rem;
      border-top: 1px solid var(--line);
    }

    .footer-inner {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      gap: 1.5rem;
      margin-bottom: 1rem;
    }

    .footer-brand {
      display: flex;
      align-items: center;
      gap: 0.6rem;
      font-family: 'Poppins', sans-serif;
      font-weight: 700;
      font-size: 1rem;
      color: var(--charcoal);
      margin-bottom: 0.5rem;
    }

    .brand-mark {
      background: linear-gradient(135deg, var(--orange), var(--deep-green) 65%, var(--deep-green));
      color: #fff;
      display: flex; align-items: center; justify-content: center;
      border-radius: 9px;
      font-family: 'Poppins', sans-serif;
    }

    .footer-tagline { font-size: 0.85rem; color: var(--gray-soft); max-width: 320px; }

    .footer-links, .footer-bottom-links { display: flex; flex-wrap: wrap; gap: 1.1rem; }

    .footer-link { font-size: 0.85rem; color: var(--gray); font-weight: 500; }
    .footer-link:hover { color: var(--deep-green); }

    .footer-social { display: flex; gap: 0.6rem; }

    .footer-social-icon {
      width: 36px; height: 36px;
      border-radius: 50%;
      background: var(--bg);
      border: 1px solid var(--line);
      display: flex; align-items: center; justify-content: center;
      color: var(--charcoal);
      font-size: 0.9rem;
    }

    .footer-social-icon:hover { background: var(--deep-green-light); color: var(--deep-green-dark); }

    .footer-divider { border-color: var(--line); margin: 1rem 0; }

    .footer-bottom {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      gap: 0.75rem;
      font-size: 0.8rem;
      color: var(--gray-soft);
    }

    /* ===================== RESPONSIVE ===================== */
    @media (max-width: 991.98px) {
      .sidebar { transform: translateX(-100%); box-shadow: 0 0 40px rgba(0,0,0,0.15); }
      .sidebar.show { transform: translateX(0); }
      .main-area { margin-left: 0; }
      .sidebar-toggle { display: inline-flex; align-items: center; }
      .mc-card { flex-wrap: wrap; }
      .mc-card-status { flex-direction: row; min-width: 0; width: 100%; justify-content: flex-end; }
    }

    @media (max-width: 575.98px) {
      .content-wrap { padding: 1.25rem; }
      .top-header { padding: 0.85rem 1.25rem; }
      .profile-chip .name, .profile-chip .role { display: none; }
      .search-box { max-width: none; }
      .mc-card { padding: 1.1rem; gap: 1rem; }
      .mc-card-icon { width: 44px; height: 44px; min-width: 44px; font-size: 0.75rem; }
      .mc-card-progress { flex-direction: column; align-items: flex-start; gap: 0.3rem; }
      .mc-progress-track { max-width: none; width: 100%; }
    }
  </style>
  <script>
    let activeFilter = 'all';
  </script>
</head>

<body>
  <script>if(localStorage.getItem("learnbase_dark_mode")==="true")document.body.classList.add("dark-mode");</script>

  <div class="dash-bg-shapes">
    <div class="bg-circle c1"></div>
    <div class="bg-circle c2"></div>
    <div class="bg-dots"></div>
  </div>

  <div class="sidebar-backdrop" id="sidebarBackdrop"></div>

  <!-- ===================== SIDEBAR ===================== -->
  <aside class="sidebar" id="sidebar">
    <a href="<?= site_url('dashboard') ?>" class="brand-logo">LEARNBASE<span>.</span></a>

    <ul class="side-nav">
      <li class="nav-label">Menu</li>
      <li>
        <a href="<?= site_url('dashboard') ?>" class="side-link">
          <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="9"></rect><rect x="14" y="3" width="7" height="5"></rect><rect x="14" y="12" width="7" height="9"></rect><rect x="3" y="16" width="7" height="5"></rect></svg>
          Dashboard
        </a>
      </li>
      <li>
        <a href="<?= site_url('library') ?>" class="side-link">
          <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
          Library
        </a>
      </li>
      <li>
        <a href="#" class="side-link active">
          <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
          My Courses
        </a>
      </li>
      <li>
        <a href="<?= site_url('courses/completed') ?>" class="side-link">
          <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l2.9 6.3 6.9.7-5.2 4.7 1.6 6.8L12 17l-6.2 3.5 1.6-6.8-5.2-4.7 6.9-.7z"></path></svg>
          Completed Courses
        </a>
      </li>
      <?php if ($membership === 'premium'): ?>
      <li>
        <a href="<?= site_url('chat') ?>" class="side-link">
          <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
          Live Chat Mentor
        </a>
      </li>
      <?php endif; ?>
    </ul>

    <div class="sidebar-footer">
      <?php if ($membership !== 'premium'): ?>
      <div class="upgrade-card">
        <p>Unlock all 100+ courses with Learnbase Pro.</p>
        <a href="<?= site_url('pricing') ?>" class="btn-upgrade">Upgrade to Pro</a>
      </div>
      <?php else: ?>
      <div class="upgrade-card" style="background:linear-gradient(135deg,var(--deep-green),#12806A);color:#fff;">
        <p style="color:rgba(255,255,255,.9);">⭐ Kamu sudah member Premium!</p>
      </div>
      <?php endif; ?>
      <a href="'<?= site_url('auth/logout') ?>'" class="side-link" style="margin-top:0.6rem;color:var(--orange);">
        <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
        Keluar
      </a>
    </div>
  </aside>

  <!-- ===================== MAIN AREA ===================== -->
  <div class="main-area">

    <!-- TOP HEADER -->
    <header class="top-header">
      <button class="sidebar-toggle" id="sidebarToggle" aria-label="Toggle menu">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
      </button>
      <button class="sidebar-toggle-collapse" id="sidebarCollapse" aria-label="Toggle sidebar">
        <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="3" x2="9" y2="21"></line></svg>
      </button>

      <div class="search-box">
        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
        <input type="text" placeholder="Cari kursus..." id="searchInput">
      </div>

      <div class="header-right">
        <button class="icon-btn" aria-label="Notifikasi">
          <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
          <span class="dot-badge"></span>
        </button>

        <div class="profile-wrap">
          <div class="profile-chip" id="profileAvatarChip">
            <div class="profile-avatar" id="profileAvatar"><?= strtoupper(substr($nama, 0, 1)) ?></div>
            <div>
              <div class="name" id="profileName"><?= $nama ?></div>
              <div class="role">Frontend Path</div>
            </div>
          </div>
          <div class="profile-dropdown" id="profileDropdown">
            <a href="<?= site_url('profile') ?>" class="profile-dropdown-item">My Profile</a>
            <a href="<?= site_url('settings') ?>" class="profile-dropdown-item">Account Settings</a>
            <div class="profile-dropdown-divider"></div>
            <a href="<?= site_url('library?tab=favorites') ?>" class="profile-dropdown-item">Favorite Modules</a>
            <div class="profile-dropdown-divider"></div>
            <a href="<?= site_url('auth/logout') ?>" class="profile-dropdown-item danger">Logout</a>
          </div>
        </div>
      </div>
    </header>

    <!-- CONTENT -->
    <div class="content-wrap">

      <!-- PAGE HEADER -->
      <div class="mc-header">
        <h1 class="mc-title">My Courses</h1>
        <p class="mc-subtitle">Semua modul yang sedang dan sudah kamu pelajari.</p>
      </div>

      <!-- Status filter chips -->
      <div style="margin-bottom:1rem;">
        <div class="status-chips" id="statusChips">
          <button class="status-chip active" data-filter="all">All</button>
          <button class="status-chip" data-filter="in-progress">In Progress</button>
          <button class="status-chip" data-filter="completed" style="display:none;">Completed</button>
          <button class="status-chip" data-filter="not-started">Not Started</button>
        </div>
      </div>

      <!-- COURSE LIST -->
      <div class="course-list" id="courseList">

        <?php
        $devicons = [
          'javascript' => 'devicon-javascript-plain', 'php' => 'devicon-php-plain',
          'python' => 'devicon-python-plain', 'java' => 'devicon-java-plain',
          'cpp' => 'devicon-cplusplus-plain', 'c' => 'devicon-c-plain',
          'csharp' => 'devicon-csharp-plain', 'go' => 'devicon-go-plain',
          'ruby' => 'devicon-ruby-plain', 'rust' => 'devicon-rust-plain',
          'typescript' => 'devicon-typescript-plain', 'sqlite' => 'devicon-sqlite-plain'
        ];

        $has_progress = false;
        // Mapping slug ke short code untuk lookup progress
        $slug_lang_map = [
          'javascript' => 'js', 'php' => 'php', 'python' => 'py', 'java' => 'java',
          'cpp' => 'cpp', 'c' => 'c', 'csharp' => 'cs', 'go' => 'go',
          'ruby' => 'ruby', 'rust' => 'rust', 'typescript' => 'ts', 'sqlite' => 'sql'
        ];
        foreach ($modules as $m):
          $slug = $m['slug'];
          $lang_code = $slug_lang_map[$slug] ?? $slug;
          $topics = $progress[$lang_code] ?? [];
          $total = $topic_counts[$slug] ?? 12;
          $done = count($topics);
          $pct = $total > 0 ? round(($done / $total) * 100) : 0;
          $status = $done == 0 ? 'not-started' : ($done >= $total ? 'completed' : 'in-progress');
          $is_continue = ($status == 'in-progress' && !$has_progress);
          if ($is_continue) $has_progress = true;
        ?>
          <div class="mc-card <?= $is_continue ? 'mc-card-continue' : '' ?>" data-lang="<?= $slug ?>" data-status="<?= $status ?>">
            <?php if ($is_continue): ?>
              <div class="mc-card-continue-badge">Lanjutkan Belajar</div>
            <?php endif; ?>
            <div class="mc-card-icon">
              <i class="<?= $devicons[$slug] ?? 'devicon-devicon-plain' ?> colored" style="font-size:30px;"></i>
            </div>
            <div class="mc-card-body">
              <div class="mc-card-top">
                <div>
                  <div class="mc-card-type"><?= $m['category'] ?></div>
                  <div class="mc-card-name"><?= $m['name'] ?></div>
                </div>
              </div>
              <div class="mc-card-progress">
                <div class="mc-progress-track">
                  <div class="mc-progress-fill" style="width:<?= $pct ?>%;"></div>
                </div>
                <span class="mc-progress-text"><?= $pct ?>% (<?= $done ?>/<?= $total ?> topik)</span>
              </div>
            </div>
            <div class="mc-card-status">
              <span class="mc-badge <?= $status ?>"><?= ucfirst(str_replace('-', ' ', $status)) ?></span>
              <?php if ($status == 'not-started'): ?>
                <a href="<?= site_url('modul/belajar/' . $slug) ?>" class="mc-btn-start">Mulai</a>
              <?php else: ?>
                <a href="<?= site_url('modul/belajar/' . $slug) ?>" class="mc-btn-resume">
                  Resume
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </a>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>

      </div>

      <!-- Empty state -->
      <div class="mc-empty" id="mcEmpty">
        <div class="mc-empty-icon">📚</div>
        <div class="mc-empty-title">Belum ada kursus</div>
        <div class="mc-empty-text">Kamu belum mengambil modul apapun. Mulai dari Library dan progresmu akan muncul di sini.</div>
        <a href="<?= site_url('library') ?>" class="btn-empty-cta">
          Jelajahi Library
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
        </a>
      </div>

      <!-- ===== FOOTER ===== -->
      <footer class="site-footer">
        <div class="footer-inner">
          <div>
            <a href="#" class="footer-brand">
              <div class="brand-mark" style="width:28px;height:28px;font-size:12px;">LB</div>
              LearnBase
            </a>
            <p class="footer-tagline">Platform belajar coding interaktif dengan 12 modul bahasa pemrograman.</p>
          </div>
          <div class="footer-links">
            <a href="#" class="footer-link">About</a>
            <a href="#" class="footer-link">Terms</a>
            <a href="#" class="footer-link">Privacy</a>
            <a href="#" class="footer-link">Contact</a>
            <a href="#" class="footer-link">FAQ</a>
          </div>
          <div class="footer-social">
            <a href="#" class="footer-social-icon" title="GitHub">&#x1F5A5;</a>
            <a href="#" class="footer-social-icon" title="Twitter / X">&#x1D54F;</a>
            <a href="#" class="footer-social-icon" title="YouTube">&#x25B6;</a>
            <a href="#" class="footer-social-icon" title="Discord">&#x1F4AC;</a>
          </div>
        </div>
        <hr class="footer-divider">
        <div class="footer-bottom">
          <span>&copy; 2026 LearnBase. All rights reserved.</span>
          <div class="footer-bottom-links">
            <a href="#" class="footer-link">Cookie Policy</a>
            <a href="#" class="footer-link">Accessibility</a>
          </div>
        </div>
      </footer>

    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
  <script>

    // ===== Filter =====
    function filterCards() {
      const cards = document.querySelectorAll('.mc-card');
      let visible = 0;

      cards.forEach(card => {
        const status = card.dataset.status;
        const matches = activeFilter === 'all' || status === activeFilter;
        card.style.display = matches ? '' : 'none';
        if (matches) visible++;
      });

      const emptyEl = document.getElementById('mcEmpty');
      if (visible === 0) {
        emptyEl.querySelector('.mc-empty-title').textContent = 'Tidak ada kursus';
        emptyEl.querySelector('.mc-empty-text').textContent = `Tidak ada kursus dengan status "${activeFilter.replace('-', ' ')}".`;
        emptyEl.querySelector('.btn-empty-cta').style.display = 'none';
        emptyEl.classList.add('visible');
      } else {
        emptyEl.classList.remove('visible');
      }
    }

    // ===== Status chips =====
    document.querySelectorAll('.status-chip').forEach(chip => {
      chip.addEventListener('click', function() {
        document.querySelectorAll('.status-chip').forEach(c => c.classList.remove('active'));
        this.classList.add('active');
        activeFilter = this.dataset.filter;
        filterCards();
      });
    });

    // ===== Search =====
    document.getElementById('searchInput').addEventListener('input', function() {
      const q = this.value.toLowerCase().trim();
      document.querySelectorAll('.mc-card').forEach(card => {
        const name = card.querySelector('.mc-card-name').textContent.toLowerCase();
        const type = card.querySelector('.mc-card-type').textContent.toLowerCase();
        const matches = !q || name.includes(q) || type.includes(q);
        card.style.display = matches ? '' : 'none';
      });
    });

    // ===== Profile dropdown =====
    const avatarChip = document.getElementById('profileAvatarChip');
    const dropdown = document.getElementById('profileDropdown');

    if (avatarChip) {
      avatarChip.addEventListener('click', function(e) {
        e.stopPropagation();
        dropdown.classList.toggle('open');
      });

      document.addEventListener('click', function() {
        dropdown.classList.remove('open');
      });

      dropdown.addEventListener('click', function(e) {
        e.stopPropagation();
      });

    }

    // ===== Sidebar toggle (mobile) =====
    const sidebar = document.getElementById('sidebar');
    const toggle = document.getElementById('sidebarToggle');
    const backdrop = document.getElementById('sidebarBackdrop');

    function closeSidebar() {
      sidebar.classList.remove('show');
      backdrop.classList.remove('show');
    }

    if (toggle) {
      toggle.addEventListener('click', () => {
        sidebar.classList.toggle('show');
        backdrop.classList.toggle('show');
      });
    }

    if (backdrop) {
      backdrop.addEventListener('click', closeSidebar);
    }
    // ===== Sidebar collapse toggle (desktop) =====
    const collapseBtn = document.getElementById('sidebarCollapse');
    const savedState = localStorage.getItem('learnbase_sidebar_collapsed');

    if (savedState === 'true') {
      document.body.classList.add('sidebar-collapsed');
    }

    if (collapseBtn) {
      collapseBtn.addEventListener('click', () => {
        document.body.classList.toggle('sidebar-collapsed');
        localStorage.setItem('learnbase_sidebar_collapsed', document.body.classList.contains('sidebar-collapsed'));
      });
    }
    // ===== Initial load =====
    filterCards();
  </script>

</body>
</html>
