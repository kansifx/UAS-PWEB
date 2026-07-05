<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<style>
@page { margin: 0; }
body {
  margin: 0; padding: 0;
  font-family: 'Georgia', 'Times New Roman', serif;
  background: #f5f0e8;
  width: 297mm; height: 210mm;
  display: flex; align-items: center; justify-content: center;
}
.certificate-border {
  width: 267mm; height: 180mm;
  border: 3px solid <?= $cert['color_theme'] ?>;
  border-radius: 20px;
  background: #fffdf7;
  position: relative;
  overflow: hidden;
  display: flex; flex-direction: column; align-items: center; justify-content: center;
  padding: 20mm;
  text-align: center;
}
.certificate-border::before {
  content: '';
  position: absolute;
  top: 15mm; left: 15mm; right: 15mm; bottom: 15mm;
  border: 1px solid <?= $cert['color_theme'] ?>;
  border-radius: 12px;
  pointer-events: none;
}
.cert-icon {
  font-size: 48px; margin-bottom: 8px;
}
.cert-title {
  font-family: 'Georgia', serif; font-size: 32px; font-weight: bold;
  color: <?= $cert['color_theme'] ?>; letter-spacing: 2px;
  text-transform: uppercase; margin-bottom: 12px;
}
.cert-awarded {
  font-size: 14px; color: #888; margin-bottom: 6px;
  font-style: italic;
}
.cert-recipient {
  font-family: 'Georgia', serif; font-size: 36px; font-weight: bold;
  color: #1a1a1a; margin-bottom: 10px;
}
.cert-body {
  font-size: 16px; color: #555; max-width: 400px;
  line-height: 1.6; margin-bottom: 10px;
}
.cert-module-name {
  font-family: 'Georgia', serif; font-size: 24px; font-weight: bold;
  color: <?= $cert['color_theme'] ?>; margin-bottom: 14px;
}
.cert-date {
  font-size: 13px; color: #999; margin-bottom: 20px;
}
.cert-footer {
  font-size: 12px; color: #bbb;
  border-top: 1px solid #eee; padding-top: 12px; width: 60%;
  margin-top: auto;
}
</style>
</head>
<body>
<div class="certificate-border">
  <div class="cert-icon">��</div>
  <div class="cert-title"><?= $cert['title_text'] ?></div>
  <div class="cert-awarded">This certificate is awarded to</div>
  <div class="cert-recipient"><?= $user['nama'] ?></div>
  <div class="cert-body"><?= $cert['body_text'] ?></div>
  <div class="cert-module-name">"<?= $module['name'] ?>"</div>
  <div class="cert-date">Completed on <?= $date ?></div>
  <div class="cert-footer">
    LEARNBASE. — E-Learning Platform
  </div>
</div>
</body>
</html>
