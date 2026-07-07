# LEARNBASE - E-Learning Platform Pemrograman

**LearnBase** adalah platform e-learning berbasis web yang dirancang untuk membantu siapa saja mempelajari 12 bahasa pemrograman populer secara interaktif. Dibangun dengan **CodeIgniter 3** (PHP) dan **MySQL**, platform ini menyediakan kurikulum terstruktur, live code editor, chatbot AI, chat mentor, hingga sertifikat penyelesaian - cocok untuk pemula maupun profesional yang ingin naik level.

---

## Fitur Utama

### Pengguna (User)
| Fitur | Deskripsi |
|-------|-----------|
| **Landing Page** | Halaman depan dengan hero, fitur, testimoni, pricing, dan contact |
| **Autentikasi** | Login, registrasi, dan logout dengan role-based session (user / admin / instructor) |
| **Dashboard** | Statistik belajar (streak, jam belajar, modul selesai), modul rekomendasi |
| **Library Kursus** | Menampilkan 12 modul bahasa pemrograman dengan tingkat kesulitan |
| **Detail Modul** | Informasi lengkap per modul: materi, daftar topik, video pembelajaran |
| **Belajar Interaktif** | Konten materi per topik dengan navigasi antar-topik dan progress otomatis |
| **Progress Tracking** | Progress tersimpan per topik per bahasa, bisa dilanjutkan kapan saja |
| **Live Code Editor** | Editor kode online yang mendukung **12 bahasa pemrograman** dengan eksekusi langsung atau simulasi |
| **Chatbot AI** | Tanya jawab seputar coding dengan AI (Grok API + fallback Gemini API) - *Premium only* |
| **Chat Mentor** | Live chat dengan instruktur - *Premium only* |
| **Sertifikat PDF** | Generate sertifikat penyelesaian otomatis dalam PDF (via Dompdf) |
| **Profile** | Statistik lengkap: modul completed, jam belajar, streak, daftar sertifikat |
| **Settings** | Update akun, ganti password, hapus akun |

### Premium Membership
- Upgrade ke **Pro Plan (Rp149K/bulan)** melalui sistem pembayaran simulasi
- Akses penuh ke **Chatbot AI** dan **Chat Mentor**
- Prioritas dalam pembelajaran

### Admin Panel
| Fitur | Deskripsi |
|-------|-----------|
| Dashboard Admin | Ringkasan data: total user, mentor, modul, transaksi |
| Kelola Mentor | CRUD akun instructor + pencarian |
| Kelola Member | Lihat daftar user, detail progress per user, hapus member |
| Kelola Transaksi | Lihat semua transaksi pembayaran premium + pencarian |
| Grant Premium | Toggle membership user (free <-> premium) |

### Mentor / Instructor Panel
| Fitur | Deskripsi |
|-------|-----------|
| Dashboard Mentor | Statistik: total modul, premium member, progress, video |
| Kelola Modul | CRUD modul (nama, kategori, tingkat kesulitan, konten) |
| Kelola Video | Tambah/hapus/urutkan video YouTube per modul |
| Kelola Sertifikat | Atur judul, body, dan warna tema sertifikat per modul |
| Lihat Progress Premium Member | Detail progress kursus member premium |
| Live Chat | Chat dengan premium member secara real-time |
| Ganti Password | Ubah password akun mentor |

---

## Tech Stack

| Lapisan | Teknologi |
|---------|-----------|
| **Backend** | PHP 7.4+ - CodeIgniter 3 (MVC) |
| **Database** | MySQL (via `mysqli` driver) |
| **Frontend** | Bootstrap 5.3, Font Awesome 6, Devicon, AOS (Animate On Scroll) |
| **PDF Generator** | Dompdf |
| **AI Chatbot** | Grok API (xAI) + Gemini API (Google) - *fallback* |
| **Code Execution** | Node.js, Python 3, PHP CLI, Java, GCC/G++, Go, Ruby, Rust, SQLite3 |

### Bahasa Pemrograman yang Tersedia
| # | Bahasa | Short Code | Kategori |
|---|--------|-----------|----------|
| 1 | JavaScript | `js` | Web |
| 2 | TypeScript | `ts` | Web |
| 3 | Python | `py` | Data & Backend |
| 4 | PHP | `php` | Backend |
| 5 | Java | `java` | Enterprise |
| 6 | C++ | `cpp` | System |
| 7 | C | `c` | System |
| 8 | C# | `cs` | Game & Desktop |
| 9 | Go | `go` | Backend & Cloud |
| 10 | Ruby | `ruby` | Web |
| 11 | Rust | `rust` | Performance |
| 12 | SQLite | `sql` | Database |

---

## Instalasi

### Prasyarat
- **XAMPP** / WAMP / LAMP (PHP 7.4+, MySQL, Apache)
- **Composer**
- Optional: Node.js, Python, Java JDK, GCC, Go, Ruby, Rust, SQLite3 (untuk menjalankan kode dari live code editor)

### Langkah Instalasi

1. **Clone repositori**
   ```bash
   git clone https://github.com/username/UAS-PWEB.git
   cd UAS-PWEB
   ```

2. **Install dependencies Composer**
   ```bash
   composer install
   ```

3. **Setup database**
   - Buat database MySQL baru (contoh: `uaspweb`)
   - Import file SQL (jika tersedia) atau jalankan migration
   - Atau buat tabel secara manual - lihat skema di bawah

4. **Konfigurasi database**
   - Buka `application/config/database.php`
   - Sesuaikan `hostname`, `username`, `password`, `database`

5. **Konfigurasi Chatbot AI** (opsional)
   - Buka `application/config/chatbot.php`
   - Set `grok_api_key` dan/atau `gemini_api_key`

6. **Jalankan**
   - Letakkan folder di `C:\xampp\htdocs\` (XAMPP) atau `htdocs` lainnya
   - Akses `http://localhost/UAS-PWEB/`

---

## Struktur Database

### Tabel `auth`
| Kolom | Tipe | Keterangan |
|-------|------|-----------|
| `id` | INT (PK) | Auto increment |
| `nama` | VARCHAR(255) | Nama lengkap |
| `email` | VARCHAR(255) | Email unik |
| `password` | VARCHAR(255) | Password ter-hash |
| `role` | ENUM('user','admin','instructor') | Role pengguna |
| `membership` | ENUM('free','premium') | Status membership |
| `created_at` | DATETIME | Waktu daftar |

### Tabel `modules`
| Kolom | Tipe | Keterangan |
|-------|------|-----------|
| `id` | INT (PK) | Auto increment |
| `slug` | VARCHAR(100) | Slug unik (contoh: `javascript`) |
| `name` | VARCHAR(255) | Nama modul |
| `category` | VARCHAR(100) | Kategori (contoh: `Web Development`) |
| `difficulty` | ENUM('beginner','intermediate','advanced') | Tingkat kesulitan |
| `language` | VARCHAR(100) | Bahasa pemrograman |
| `icon_color` | VARCHAR(50) | Warna ikon (contoh: `--js`) |
| `content` | LONGTEXT | Konten materi (HTML dengan atribut `data-topic`) |

### Tabel `progress`
| Kolom | Tipe | Keterangan |
|-------|------|-----------|
| `id` | INT (PK) | Auto increment |
| `user_id` | INT (FK) | ID user |
| `language` | VARCHAR(50) | Short code bahasa (contoh: `js`, `py`) |
| `completed_topics` | TEXT (JSON) | Array topic ID yang sudah selesai |
| `created_at` | DATETIME | Waktu mulai |
| `updated_at` | DATETIME | Update terakhir |

### Tabel `chat_messages`
| Kolom | Tipe | Keterangan |
|-------|------|-----------|
| `id` | INT (PK) | Auto increment |
| `sender_id` | INT | ID pengirim |
| `sender_role` | ENUM('user','instructor') | Role pengirim |
| `receiver_id` | INT | ID penerima |
| `message` | TEXT | Isi pesan |
| `is_read` | TINYINT(1) | Status dibaca |
| `deleted_by_sender` | TINYINT(1) | Soft delete pengirim |
| `deleted_by_receiver` | TINYINT(1) | Soft delete penerima |
| `created_at` | DATETIME | Waktu kirim |

### Tabel `transactions`
| Kolom | Tipe | Keterangan |
|-------|------|-----------|
| `id` | INT (PK) | Auto increment |
| `user_id` | INT (FK) | ID user |
| `amount` | DECIMAL(12,2) | Jumlah pembayaran |
| `payment_method` | VARCHAR(100) | Metode pembayaran |
| `status` | ENUM('completed','failed') | Status transaksi |
| `created_at` | DATETIME | Waktu transaksi |

### Tabel `certificates`
| Kolom | Tipe | Keterangan |
|-------|------|-----------|
| `id` | INT (PK) | Auto increment |
| `module_slug` | VARCHAR(100) | Slug modul |
| `title_text` | VARCHAR(255) | Judul sertifikat |
| `body_text` | TEXT | Body teks sertifikat |
| `color_theme` | VARCHAR(50) | Warna tema (hex) |

### Tabel `user_certificates`
| Kolom | Tipe | Keterangan |
|-------|------|-----------|
| `id` | INT (PK) | Auto increment |
| `user_id` | INT (FK) | ID user |
| `module_slug` | VARCHAR(100) | Slug modul |

### Tabel `module_videos`
| Kolom | Tipe | Keterangan |
|-------|------|-----------|
| `id` | INT (PK) | Auto increment |
| `module_slug` | VARCHAR(100) | Slug modul |
| `title` | VARCHAR(255) | Judul video |
| `youtube_url` | VARCHAR(500) | URL YouTube |
| `sort_order` | INT | Urutan tampilan |

---

## Alur Aplikasi

## Live Code Editor

Code editor online mendukung eksekusi kode untuk 12 bahasa pemrograman. Jika runtime terinstal di server, kode akan dikompilasi/dijalankan secara native. Jika tidak, tersedia **mode simulasi** yang menangani syntax dasar (print, echo, console.log, dll).

| Bahasa | Runtime Native | Simulasi |
|--------|---------------|----------|
| JavaScript / TypeScript | Node.js | Ya |
| Python | Python 3 | Ya |
| PHP | PHP CLI | Ya |
| Java | javac + java | - |
| C / C++ | GCC / G++ | Ya |
| C# | - | Ya |
| Go | Go | - |
| Ruby | Ruby | - |
| Rust | Rustc | - |
| SQLite | SQLite3 | - |

---

## Chatbot AI

Chatbot tersedia untuk **premium member**, didukung oleh:
- **Grok API** (xAI) - *primary*
- **Gemini API** (Google) - *fallback* jika Grok gagal

Konfigurasikan di `application/config/chatbot.php`:
```php
$config['grok_api_key']   = 'your-grok-api-key';
$config['grok_api_url']   = 'https://api.x.ai/v1/chat/completions';
$config['grok_model']     = 'grok-2-latest';
$config['gemini_api_key'] = 'your-gemini-api-key';
$config['gemini_api_url'] = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent';
```

---

## Screenshots

| Halaman | Deskripsi |
|---------|-----------|
| Landing Page | Hero, features, languages, pricing, testimonials, contact, footer |
| Login / Register | Form autentikasi dengan validasi |
| Dashboard User | Statistik belajar, modul rekomendasi, streak |
| Library Kursus | Grid 12 bahasa pemrograman dengan level kesulitan |
| Detail Modul | Informasi lengkap, daftar topik, video pembelajaran |
| Belajar | Konten interaktif per topik dengan navigasi & progress |
| Code Editor | Editor kode multi-bahasa dengan output real-time |
| Chat Mentor | Live chat (user <-> instructor) |
| Chatbot AI | Asisten coding AI (premium) |
| Profile | Statistik lengkap user |
| Settings | Pengaturan akun, ganti password |
| Admin Dashboard | Statistik platform |
| Admin Manage Mentor | CRUD mentor |
| Admin Manage Member | Daftar & detail progress member |
| Admin Transactions | Daftar transaksi premium |
| Mentor Dashboard | Statistik untuk instructor |
| Mentor Edit Module | Editor konten, video, sertifikat |
| Mentor Chat | Chat dengan premium member |
| Certificate | PDF sertifikat penyelesaian |

---

## Role System

| Role | Akses |
|------|-------|
| **Guest** (belum login) | Landing page, Login, Register |
| **User** (free) | Dashboard, Library, Learning, Code Editor, Profile, Settings, My Courses |
| **User** (premium) | Semua akses free + Chatbot AI, Chat Mentor, prioritas fitur |
| **Instructor** | Dashboard mentor, Kelola modul & video, Lihat progress premium member, Chat member |
| **Admin** | Dashboard admin, Kelola mentor, Kelola member, Lihat transaksi, Grant premium |

---

## Lisensi

Proyek ini dibuat untuk tujuan **Ujian Akhir Semester (UAS) - Pemrograman Web**.

---

## Kontak

- **Alamat**: Jl. Pejanggik No. 12, Mataram, NTB, Indonesia
- **Telepon**: +62 812-3456-7890
- **Email**: hello@devskill.com
