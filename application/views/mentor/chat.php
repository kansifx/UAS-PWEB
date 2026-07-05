<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Live Chat — LEARNBASE.</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<style>
:root { --deep-green: #0E6853; --deep-green-dark: #0a4f3f; --deep-green-light: #E7F2EF; --orange: #FF5B35; --orange-light: #FFEFEA; --charcoal: #1A1A1A; --gray: #666; --gray-soft: #8A8A8A; --bg: #F7F9F8; --line: #EAEDEC; --sidebar-w: 250px; --card-bg: #fff; --msg-sent: #E7F2EF; --msg-recv: #fff; }
body.dark-mode { --deep-green: #1ABC9C; --deep-green-dark: #16A085; --deep-green-light: #1A3E3A; --orange: #FF7F50; --orange-light: #3E2A20; --charcoal: #E8E8E8; --gray: #B0B0B0; --gray-soft: #888; --bg: #0F171E; --line: #1F2A33; --card-bg: #1A2530; --msg-sent: #1A3E3A; --msg-recv: #0F171E; }
body.dark-mode .sidebar, body.dark-mode .topbar, body.dark-mode .chat-layout { background: var(--card-bg); }
body.dark-mode .sidebar, body.dark-mode .topbar, body.dark-mode .chat-layout { border-color: var(--line); }
* { box-sizing: border-box; }
body { font-family: 'Inter', sans-serif; background: var(--bg); color: var(--charcoal); margin: 0; padding: 0; display: flex; height: 100vh; overflow: hidden; }
h1,h2,h3,h4,h5,h6 { font-family: 'Poppins', sans-serif; }
a { text-decoration: none; }

.sidebar { width: var(--sidebar-w); background: var(--card-bg); border-right: 1px solid var(--line); padding: 1.75rem 1rem; display: flex; flex-direction: column; flex-shrink: 0; }
.sidebar .brand { font-weight: 800; font-size: 1.3rem; color: var(--charcoal); padding: 0 0.5rem; margin-bottom: 2rem; display: block; }
.sidebar .brand span { color: var(--orange); }
.sidebar .brand small { font-size: 0.65rem; font-weight: 500; color: var(--gray-soft); }
.side-nav { list-style: none; padding: 0; margin: 0; flex: 1; }
.side-nav .nav-label { font-size: 0.7rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; color: var(--gray-soft); padding: 0 0.75rem; margin: 0.5rem 0 0.75rem; }
.side-nav li { margin-bottom: 0.25rem; }
.side-link { display: flex; align-items: center; gap: 0.7rem; padding: 0.65rem 0.85rem; border-radius: 12px; color: var(--gray); font-weight: 500; font-size: 0.9rem; transition: background .15s, color .15s; }
.side-link:hover { background: var(--deep-green-light); color: var(--deep-green-dark); }
.side-link.active { background: linear-gradient(135deg, var(--orange), var(--deep-green) 65%, var(--deep-green)); color: #fff; box-shadow: 0 8px 18px rgba(14,104,83,0.2); }

.main-area { flex: 1; display: flex; flex-direction: column; min-width: 0; }
.topbar { background: var(--card-bg); border-bottom: 1px solid var(--line); padding: 0.9rem 2rem; display: flex; align-items: center; justify-content: space-between; flex-shrink: 0; }
.topbar-title { font-weight: 700; font-size: 1.15rem; }
.topbar-right { display: flex; align-items: center; gap: 0.75rem; }
.avatar { width: 36px; height: 36px; border-radius: 50%; background: linear-gradient(135deg, var(--orange), var(--deep-green)); display: flex; align-items: center; justify-content: center; color: #fff; font-weight: 700; font-size: 0.85rem; }

.chat-layout { display: flex; flex: 1; overflow: hidden; }

.contact-list { width: 280px; border-right: 1px solid var(--line); background: var(--card-bg); display: flex; flex-direction: column; overflow-y: auto; flex-shrink: 0; }
.contact-item { display: flex; align-items: center; gap: 0.7rem; padding: 0.9rem 1rem; border-bottom: 1px solid var(--bg); cursor: pointer; transition: background .1s; }
.contact-item:hover { background: var(--deep-green-light); }
.contact-item.active { background: var(--deep-green-light); border-left: 3px solid var(--deep-green); }
.contact-avatar { width: 40px; height: 40px; border-radius: 50%; background: linear-gradient(135deg, var(--orange), var(--deep-green)); display: flex; align-items: center; justify-content: center; color: #fff; font-weight: 700; font-size: 0.85rem; flex-shrink: 0; }
.contact-info { flex: 1; min-width: 0; }
.contact-name { font-weight: 600; font-size: 0.85rem; }
.contact-preview { font-size: 0.75rem; color: var(--gray-soft); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
.contact-time { font-size: 0.65rem; color: var(--gray-soft); white-space: nowrap; }
.contact-unread { background: var(--orange); color: #fff; border-radius: 50px; padding: 0.1rem 0.5rem; font-size: 0.65rem; font-weight: 700; min-width: 20px; text-align: center; }

.chat-area { flex: 1; display: flex; flex-direction: column; background: var(--bg); }
.chat-header { padding: 0.9rem 1.25rem; border-bottom: 1px solid var(--line); background: var(--card-bg); display: none; align-items: center; gap: 0.75rem; flex-shrink: 0; }
.chat-header .name { font-weight: 700; font-size: 0.95rem; }
.chat-messages { flex: 1; overflow-y: auto; padding: 1rem 1.25rem; display: none; flex-direction: column; gap: 0.5rem; }
.msg-row { display: flex; margin-bottom: 0.25rem; }
.msg-row.sent { justify-content: flex-end; }
.msg-row.received { justify-content: flex-start; }
.msg-bubble { max-width: 70%; padding: 0.6rem 1rem; border-radius: 16px; font-size: 0.88rem; line-height: 1.5; word-wrap: break-word; }
.msg-row.sent .msg-bubble { background: var(--msg-sent); border-bottom-right-radius: 4px; }
.msg-row.received .msg-bubble { background: var(--msg-recv); border: 1px solid var(--line); border-bottom-left-radius: 4px; }
.msg-time { font-size: 0.62rem; color: var(--gray-soft); margin-top: 0.2rem; }
.msg-time .msg-delete { color: #D9534F; margin-left: 0.5rem; cursor: pointer; opacity: 0; transition: opacity .15s; }
.msg-row:hover .msg-time .msg-delete { opacity: 1; }
.msg-role { font-size: 0.62rem; font-weight: 600; color: var(--deep-green); margin-bottom: 0.15rem; }
.chat-input-area { padding: 0.85rem 1.25rem; border-top: 1px solid var(--line); background: var(--card-bg); display: flex; gap: 0.5rem; flex-shrink: 0; }
.chat-input-area input { flex: 1; padding: 0.65rem 1rem; border: 2px solid var(--line); border-radius: 12px; font-size: 0.88rem; background: var(--bg); color: var(--charcoal); outline: none; }
.chat-input-area input:focus { border-color: var(--deep-green); }
.chat-input-area button { padding: 0.65rem 1.25rem; border-radius: 12px; border: none; background: linear-gradient(135deg, var(--orange), var(--deep-green)); color: #fff; font-weight: 600; font-size: 0.85rem; cursor: pointer; }
.empty-chat { flex: 1; display: flex; align-items: center; justify-content: center; color: var(--gray-soft); font-size: 0.95rem; text-align: center; padding: 2rem; }
.empty-chat .big { font-size: 3rem; margin-bottom: 0.5rem; }

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
    <li><a href="<?= site_url('mentor/premium_members') ?>" class="side-link"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg> Premium Member</a></li>
    <li><a href="<?= site_url('mentor/chat') ?>" class="side-link active"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg> Live Chat</a></li>
    <li><a href="<?= site_url('mentor/change_password') ?>" class="side-link"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg> Ganti Password</a></li>
  </ul>
  <div style="border-top:1px solid var(--line);padding-top:0.75rem;">
    <a href="<?= site_url('auth/logout') ?>" class="side-link" style="color:var(--charcoal);"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> Logout</a>
  </div>
</aside>

<div class="main-area">
  <header class="topbar">
    <div class="topbar-title">Live Chat</div>
    <div class="topbar-right">
      <div class="avatar"><?= strtoupper(substr($nama, 0, 1)) ?></div>
      <span class="user-name"><?= $nama ?></span>
    </div>
  </header>

  <div class="chat-layout">
    <div class="contact-list" id="contactList">
      <div style="padding:0.85rem 1rem;font-weight:600;font-size:0.85rem;border-bottom:1px solid var(--line);">Premium Member</div>
      <div id="contactsContainer">
        <?php foreach ($members as $m): ?>
        <div class="contact-item <?= $selected_id == $m['id'] ? 'active' : '' ?>" onclick="selectMember(<?= $m['id'] ?>)" data-id="<?= $m['id'] ?>">
          <div class="contact-avatar"><?= strtoupper(substr($m['nama'], 0, 1)) ?></div>
          <div class="contact-info">
            <div class="contact-name"><?= $m['nama'] ?></div>
            <div class="contact-preview"><?= $m['last_message'] ? substr($m['last_message'], 0, 40) . (strlen($m['last_message']) > 40 ? '...' : '') : 'Klik untuk chat' ?></div>
          </div>
          <div style="text-align:right;flex-shrink:0;">
            <?php if ($m['last_time']): ?><div class="contact-time"><?= date('H:i', strtotime($m['last_time'])) ?></div><?php endif; ?>
            <?php if (isset($m['unread']) && $m['unread'] > 0): ?><div class="contact-unread"><?= $m['unread'] ?></div><?php endif; ?>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="chat-area" id="chatArea">
      <div class="chat-header" id="chatHeader" style="display:none;">
        <div class="contact-avatar" style="width:36px;height:36px;font-size:0.8rem;" id="chatHeaderAvatar"></div>
        <div><div class="name" id="chatHeaderName"></div></div>
      </div>
      <div id="emptyChat" style="flex:1;display:flex;align-items:center;justify-content:center;color:var(--gray-soft);text-align:center;padding:2rem;">
        <div><div class="big" style="font-size:3rem;margin-bottom:0.5rem;">��</div><p>Pilih member premium untuk memulai chat</p></div>
      </div>
      <div class="chat-messages" id="chatMessages" style="display:none;"></div>
      <div class="chat-input-area">
        <input type="text" id="msgInput" placeholder="<?= $selected_id > 0 ? 'Ketik pesan...' : 'Pilih member dulu...' ?>" autocomplete="off">
        <button id="sendBtn">Kirim</button>
      </div>
    </div>
  </div>
</div>

<script>
let SELECTED_ID = <?= $selected_id > 0 ? $selected_id : 'null' ?>;
let pollTimer = null;
const sendBtn = document.getElementById('sendBtn');
const msgInput = document.getElementById('msgInput');

<?php if ($selected_id > 0): ?>
// Auto-load on page load
document.getElementById('chatHeader').style.display = 'flex';
document.getElementById('emptyChat').style.display = 'none';
document.getElementById('chatMessages').style.display = 'flex';
loadMessages();
pollTimer = setInterval(loadMessages, 3000);
<?php endif; ?>

function selectMember(id) {
  SELECTED_ID = id;
  msgInput.placeholder = 'Ketik pesan...';
  msgInput.disabled = false;
  document.getElementById('chatHeader').style.display = 'flex';
  document.getElementById('emptyChat').style.display = 'none';
  document.getElementById('chatMessages').style.display = 'flex';
  document.querySelectorAll('.contact-item').forEach(el => el.classList.remove('active'));
  document.querySelector(`.contact-item[data-id="${id}"]`)?.classList.add('active');
  loadMessages();
  if (pollTimer) clearInterval(pollTimer);
  pollTimer = setInterval(loadMessages, 3000);
}

function loadMessages() {
  if (!SELECTED_ID) return;
  fetch('<?= site_url('mentor/chat_api_messages/') ?>' + SELECTED_ID)
    .then(r => r.json())
    .then(data => {
      if (data.error) { console.error(data.error); return; }
      document.getElementById('chatHeaderAvatar').textContent = data.member.nama.charAt(0).toUpperCase();
      document.getElementById('chatHeaderName').textContent = data.member.nama;
      const container = document.getElementById('chatMessages');
      container.innerHTML = '';
      data.messages.forEach(msg => {
        const isMentor = msg.sender_role === 'instructor';
        const row = document.createElement('div');
        row.className = 'msg-row ' + (isMentor ? 'sent' : 'received');
        let deleteBtn = isMentor ? '<span class="msg-delete" onclick="deleteMsg(' + msg.id + ')">✕</span>' : '';
        row.innerHTML = '<div class="msg-bubble">' + (isMentor ? '' : '<div class="msg-role">' + data.member.nama + '</div>') + msg.message + '<div class="msg-time">' + new Date(msg.created_at).toLocaleTimeString('id-ID',{hour:'2-digit',minute:'2-digit'}) + deleteBtn + '</div></div>';
        container.appendChild(row);
      });
      container.scrollTop = container.scrollHeight;
    })
    .catch(e => console.error('Load error:', e));
}

function sendMessage() {
  if (!SELECTED_ID) { alert('Pilih member dulu!'); return; }
  const msg = msgInput.value.trim();
  if (!msg) return;
  const formData = new FormData();
  formData.append('receiver_id', SELECTED_ID);
  formData.append('message', msg);
  fetch('<?= site_url('mentor/chat_api_send') ?>', { method: 'POST', body: formData })
    .then(r => r.json())
    .then(data => {
      if (data.success) { msgInput.value = ''; loadMessages(); }
      else { alert('Gagal: ' + (data.error || 'unknown')); }
    })
    .catch(e => { console.error('Send error:', e); alert('Gagal kirim'); });
}

function deleteMsg(id) {
  if (!confirm('Hapus pesan ini?')) return;
  fetch('<?= site_url('mentor/chat_api_delete/') ?>' + id)
    .then(r => r.json())
    .then(data => { if (data.success) loadMessages(); });
}

sendBtn.addEventListener('click', sendMessage);
msgInput.addEventListener('keydown', function(e) { if (e.key === 'Enter') sendMessage(); });
</script>
</body>
</html>
