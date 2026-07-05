<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Code Editor — LEARNBASE.</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<style>
:root { --deep-green: #0E6853; --deep-green-dark: #0a4f3f; --deep-green-light: #E7F2EF; --orange: #FF5B35; --orange-light: #FFEFEA; --charcoal: #1A1A1A; --gray: #666; --gray-soft: #8A8A8A; --bg: #F7F9F8; --line: #EAEDEC; --sidebar-w: 264px; --card-bg: #fff; }
body.dark-mode { --deep-green: #1ABC9C; --deep-green-dark: #16A085; --deep-green-light: #1A3E3A; --orange: #FF7F50; --orange-light: #3E2A20; --charcoal: #E8E8E8; --gray: #B0B0B0; --gray-soft: #888; --bg: #0F171E; --line: #1F2A33; --card-bg: #1A2530; }
body.dark-mode .sidebar, body.dark-mode .top-header, body.dark-mode .profile-dropdown { background: var(--card-bg); }
body.dark-mode .sidebar, body.dark-mode .top-header { border-color: var(--line); }
* { box-sizing: border-box; }
body { font-family: 'Inter', sans-serif; background: var(--bg); color: var(--charcoal); margin: 0; padding: 0; display: flex; height: 100vh; overflow: hidden; }
h1,h2,h3,h4,h5,h6 { font-family: 'Poppins', sans-serif; }
a { text-decoration: none; }

.sidebar { position: fixed; top: 0; left: 0; bottom: 0; width: var(--sidebar-w); background: var(--card-bg); border-right: 1px solid var(--line); padding: 1.75rem 1.25rem; display: flex; flex-direction: column; z-index: 1050; transition: transform .25s ease; }
.sidebar .brand-logo { font-weight: 800; font-size: 1.35rem; color: var(--charcoal); padding: 0 0.5rem; margin-bottom: 2.25rem; display: block; }
.sidebar .brand-logo span { color: var(--orange); }
.side-nav { list-style: none; padding: 0; margin: 0; flex: 1; }
.side-nav .nav-label { font-size: 0.72rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; color: var(--gray-soft); padding: 0 0.75rem; margin: 0.25rem 0 0.75rem; }
.side-nav li { margin-bottom: 0.3rem; }
.side-link { display: flex; align-items: center; gap: 0.75rem; padding: 0.7rem 0.9rem; border-radius: 12px; color: var(--gray); font-weight: 500; font-size: 0.95rem; transition: background .15s, color .15s; }
.side-link:hover { background: var(--deep-green-light); color: var(--deep-green-dark); }
.side-link.active { background: linear-gradient(135deg, var(--orange), var(--deep-green) 65%, var(--deep-green)); color: #fff; box-shadow: 0 8px 18px rgba(14,104,83,0.2); }
.sidebar-backdrop { z-index: 1040; position: fixed; display: none; inset: 0; background: rgba(0,0,0,0.35); }
.sidebar-backdrop.show { display: block; }

.main-area { margin-left: var(--sidebar-w); flex: 1; display: flex; flex-direction: column; min-width: 0; }
.top-header { background: var(--card-bg); border-bottom: 1px solid var(--line); padding: 0.8rem 1.5rem; display: flex; align-items: center; gap: 1rem; flex-shrink: 0; }
.sidebar-toggle { display: none; background: none; border: none; padding: .4rem; color: var(--charcoal); cursor: pointer; }
.header-right { margin-left: auto; display: flex; align-items: center; gap: .75rem; }
.profile-avatar { width: 36px; height: 36px; border-radius: 50%; background: linear-gradient(135deg, var(--orange), var(--deep-green)); display: flex; align-items: center; justify-content: center; color: #fff; font-weight: 700; font-size: .85rem; }
select#lang-select { background: var(--bg); border: 2px solid var(--line); border-radius: 10px; padding: .4rem .8rem; font-size: .85rem; color: var(--charcoal); outline: none; font-family: 'Inter', sans-serif; }
select#lang-select:focus { border-color: var(--deep-green); }
#run-btn { background: linear-gradient(135deg, var(--orange), var(--deep-green)); color: #fff; border: none; padding: .45rem 1.2rem; border-radius: 10px; font-size: .85rem; font-weight: 600; cursor: pointer; transition: transform .15s; font-family: 'Inter', sans-serif; }
#run-btn:hover { transform: translateY(-1px); }
#run-btn:disabled { opacity: .6; cursor: not-allowed; transform: none; }

.editor-wrap { flex: 1; display: flex; flex-direction: column; min-height: 0; }
#editor-container { flex: 2; min-height: 0; }
#output-wrap { flex: 1; min-height: 120px; background: #1e1e1e; border-top: 2px solid #333; display: flex; flex-direction: column; }
#output-header { padding: 6px 14px; font-size: 12px; color: #999; border-bottom: 1px solid #333; display: flex; justify-content: space-between; align-items: center; }
#output-header .clear-btn { background: none; border: none; color: #666; cursor: pointer; font-size: 12px; }
#output-header .clear-btn:hover { color: #ccc; }
#output { flex: 1; overflow-y: auto; padding: 10px 14px; font-family: 'Consolas', 'JetBrains Mono', monospace; font-size: 13px; white-space: pre-wrap; }
.output-text { color: #d4d4d4; }
.error-text { color: #f48771; }

@media (max-width: 768px) { .sidebar { width: 100%; position: relative; } .main-area { margin-left: 0; } }
</style>
</head>
<body>
<script>if(localStorage.getItem("learnbase_dark_mode")==="true")document.body.classList.add("dark-mode");</script>

<div class="sidebar-backdrop" id="sidebarBackdrop"></div>

<aside class="sidebar" id="sidebar">
  <a href="<?= site_url('dashboard') ?>" class="brand-logo">LEARNBASE<span>.</span></a>
  <ul class="side-nav">
    <li class="nav-label">Menu</li>
    <li><a href="<?= site_url('dashboard') ?>" class="side-link"><svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="9"></rect><rect x="14" y="3" width="7" height="5"></rect><rect x="14" y="12" width="7" height="9"></rect><rect x="3" y="16" width="7" height="5"></rect></svg> Dashboard</a></li>
    <li><a href="<?= site_url('library') ?>" class="side-link"><svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg> Library</a></li>
    <li><a href="<?= site_url('codeeditor') ?>" class="side-link active"><svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg> Code Editor</a></li>
  </ul>
  <div class="sidebar-footer">
    <a href="<?= site_url('auth/logout') ?>" class="side-link" style="color:var(--orange);"><svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> Keluar</a>
  </div>
</aside>

<div class="main-area">
  <header class="top-header">
    <button class="sidebar-toggle" id="sidebarToggle"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></button>
    <span style="font-weight:700;font-size:1rem;">Code Editor</span>
    <select id="lang-select">
      <option value="python">Python</option>
      <option value="javascript" selected>JavaScript (Node.js)</option>
      <option value="typescript">TypeScript</option>
      <option value="php">PHP</option>
      <option value="java">Java</option>
      <option value="cpp">C++</option>
      <option value="c">C</option>
      <option value="csharp">C#</option>
      <option value="go">Go</option>
      <option value="ruby">Ruby</option>
      <option value="rust">Rust</option>
      <option value="sql">SQL (SQLite)</option>
    </select>
    <button id="run-btn">▶ Run</button>
    <div class="header-right"><div class="profile-avatar"><?= strtoupper(substr($nama, 0, 1)) ?></div></div>
  </header>

  <div class="editor-wrap">
    <div id="editor-container"></div>
    <div id="output-wrap">
      <div id="output-header">
        <span>OUTPUT</span>
        <button class="clear-btn" id="clear-output">✕ clear</button>
      </div>
      <div id="output">Klik "Run" atau tekan Ctrl+Enter untuk menjalankan kode...</div>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.45.0/min/vs/loader.min.js"></script>
<script>
const SAMPLE_CODE = {
  python: '# Tulis kode Python di sini\nprint("Hello dari LearnBase!")\n\nfor i in range(5):\n    print(i * i)',
  javascript: '// Tulis kode JavaScript di sini\nconsole.log("Hello dari LearnBase!");\n\nfor (let i = 0; i < 5; i++) {\n  console.log(i * i);\n}',
  typescript: '// Tulis kode TypeScript di sini\nconst greet = (name: string): string => `Hello, ${name}!`;\nconsole.log(greet("LearnBase"));',
  php: '<?php\n// Tulis kode PHP di sini\necho "Hello dari LearnBase!\\n";\n\nfor ($i = 0; $i < 5; $i++) {\n    echo $i * $i . "\\n";\n}',
  java: 'public class Main {\n    public static void main(String[] args) {\n        System.out.println("Hello dari LearnBase!");\n        for (int i = 0; i < 5; i++) {\n            System.out.println(i * i);\n        }\n    }\n}',
  cpp: '#include <iostream>\nusing namespace std;\n\nint main() {\n    cout << "Hello dari LearnBase!" << endl;\n    for (int i = 0; i < 5; i++) {\n        cout << i * i << endl;\n    }\n    return 0;\n}',
  c: '#include <stdio.h>\n\nint main() {\n    printf("Hello dari LearnBase!\\n");\n    for (int i = 0; i < 5; i++) {\n        printf("%d\\n", i * i);\n    }\n    return 0;\n}',
  csharp: 'using System;\n\nclass Program {\n    static void Main() {\n        Console.WriteLine("Hello dari LearnBase!");\n        for (int i = 0; i < 5; i++) {\n            Console.WriteLine(i * i);\n        }\n    }\n}',
  go: 'package main\n\nimport "fmt"\n\nfunc main() {\n    fmt.Println("Hello dari LearnBase!")\n    for i := 0; i < 5; i++ {\n        fmt.Println(i * i)\n    }\n}',
  ruby: '# Tulis kode Ruby di sini\nputs "Hello dari LearnBase!"\n\n(0..4).each do |i|\n  puts i * i\nend',
  rust: 'fn main() {\n    println!("Hello dari LearnBase!");\n    for i in 0..5 {\n        println!("{}", i * i);\n    }\n}',
  sql: '-- Tulis query SQL di sini\nCREATE TABLE users (id INTEGER, name TEXT);\nINSERT INTO users VALUES (1, "Andi"), (2, "Budi");\nSELECT * FROM users;',
};

const MONACO_LANG = {
  python:'python', javascript:'javascript', typescript:'typescript', php:'php',
  java:'java', cpp:'cpp', c:'c', csharp:'csharp', go:'go', ruby:'ruby',
  rust:'rust', sql:'sql',
};

const langSelect = document.getElementById('lang-select');
const runBtn = document.getElementById('run-btn');
const outputEl = document.getElementById('output');
let editor;

require.config({ paths: { vs: 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.45.0/min/vs' } });
require(['vs/editor/editor.main'], function () {
  editor = monaco.editor.create(document.getElementById('editor-container'), {
    value: SAMPLE_CODE.javascript,
    language: 'javascript',
    theme: 'vs-dark',
    fontSize: 14,
    minimap: { enabled: true },
    automaticLayout: true,
  });

  editor.addCommand(monaco.KeyMod.CtrlCmd | monaco.KeyCode.Enter, runCode);

  langSelect.addEventListener('change', () => {
    const lang = langSelect.value;
    monaco.editor.setModelLanguage(editor.getModel(), MONACO_LANG[lang]);
    if (!editor.getValue().trim() || confirm('Ganti bahasa? Kode akan berubah ke sample code.')) {
      editor.setValue(SAMPLE_CODE[lang]);
    }
  });
});

function runJavaScriptInBrowser(code) {
  const lines = [];
  const fakeConsole = {
    log: (...args) => lines.push(args.map(a => typeof a === 'object' ? JSON.stringify(a, null, 2) : String(a)).join(' ')),
    error: (...args) => lines.push('❌ ' + args.join(' ')),
    warn: (...args) => lines.push('<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align:middle;margin-right:3px;"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>' + args.join(' ')),
    info: (...args) => lines.push('<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align:middle;margin-right:3px;"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>' + args.join(' ')),
  };

  try {
    const fn = new Function('console', code);
    const result = fn(fakeConsole);

    let html = '';
    if (lines.length > 0) {
      html += '<span class="output-text">' + escapeHtml(lines.join('\n')) + '</span>';
    }
    if (result !== undefined) {
      html += '<span class="output-text" style="color:#888;">=> ' + escapeHtml(String(result)) + '</span>';
    }
    if (!html) {
      html = '<span class="output-text">(tidak ada output — kode berjalan tanpa console.log)</span>';
    }
    outputEl.innerHTML = html;
  } catch (err) {
    outputEl.innerHTML = '<span class="error-text">' + escapeHtml(err.toString()) + '</span>';
  }
}

async function runCode() {
  const code = editor.getValue();
  const language = langSelect.value;
  runBtn.disabled = true;
  runBtn.textContent = '⏳ Running...';
  outputEl.innerHTML = '<span class="output-text">Menjalankan...</span>';

  // JavaScript & TypeScript jalan langsung di browser
  if (language === 'javascript') {
    runJavaScriptInBrowser(code);
    runBtn.disabled = false;
    runBtn.textContent = '▶ Run (Ctrl+Enter)';
    return;
  }

  if (language === 'typescript') {
    // Transpile TS ke JS dulu di browser, lalu jalanin
    try {
      const tsCode = code;
      // Fallback sederhana: hapus type annotations
      let jsCode = tsCode
        .replace(/:\s*\w+(?:<[^>]*>)?(?:\s*\|\s*\w+(?:<[^>]*>)?)*\s*(?==|$)/g, '')
        .replace(/:\s*\([^)]*\)\s*=>/g, ' =>')
        .replace(/as\s+\w+/g, '')
        .replace(/interface\s+\w+\s*{[^}]*}/g, '')
        .replace(/type\s+\w+\s*=.*/g, '');
      runJavaScriptInBrowser(jsCode);
    } catch (err) {
      outputEl.innerHTML = '<span class="error-text">' + escapeHtml(err.toString()) + '</span>';
    }
    runBtn.disabled = false;
    runBtn.textContent = '▶ Run (Ctrl+Enter)';
    return;
  }

  // Bahasa lain: kirim ke backend
  try {
    const res = await fetch('<?= site_url('codeeditor/run') ?>', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ code, language })
    });
    const data = await res.json();

    let html = '';
    if (data.output) html += '<span class="output-text">' + escapeHtml(data.output) + '</span>';
    if (data.error) html += '<span class="error-text">' + escapeHtml(data.error) + '</span>';
    if (!data.output && !data.error) html = '<span class="output-text">(tidak ada output)</span>';
    outputEl.innerHTML = html;
  } catch (err) {
    outputEl.innerHTML = '<span class="error-text">Gagal: ' + err.message + '</span>';
  } finally {
    runBtn.disabled = false;
    runBtn.textContent = '▶ Run (Ctrl+Enter)';
  }
}

function escapeHtml(str) {
  const div = document.createElement('div');
  div.textContent = str;
  return div.innerHTML;
}

runBtn.addEventListener('click', runCode);
document.getElementById('clear-output').addEventListener('click', () => {
  outputEl.innerHTML = '<span class="output-text">Output dibersihkan.</span>';
});

// Sidebar toggle
document.getElementById('sidebarToggle').addEventListener('click', () => {
  document.getElementById('sidebar').classList.toggle('show');
  document.getElementById('sidebarBackdrop').classList.toggle('show');
});
document.getElementById('sidebarBackdrop').addEventListener('click', () => {
  document.getElementById('sidebar').classList.remove('show');
  document.getElementById('sidebarBackdrop').classList.remove('show');
});
</script>
</body>
</html>
