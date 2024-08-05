-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Agu 2023 pada 05.57
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `traf`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `favorit`
--

CREATE TABLE `favorit` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `favorit`
--

INSERT INTO `favorit` (`id`, `id_user`, `id_post`) VALUES
(3, 25, 92),
(4, 25, 21),
(5, 26, 40),
(6, 26, 12),
(7, 26, 94),
(8, 26, 17),
(9, 25, 12),
(14, 25, 35),
(15, 25, 20),
(22, 25, 53),
(25, 23, 53);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(8) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `jam_login` datetime NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `username`, `email`, `password`, `level`, `status`, `jam_login`, `gambar`) VALUES
(6, 'admin', NULL, 'yLLs19CpuFS38uXfXgX5jbZw6b0UGSSGg2qqRdZTXHc=', 2, 'Berhasil', '2023-04-28 07:50:39', 'default.png'),
(22, 'adam12', 'adam123@gmail.com', '$2y$10$aPjvNFUVDz4KlafWtpaAzO3CdpNq/5ZatvTtk55uUL9QkiRPl0OoS', 1, 'Berhasil', '2023-07-15 13:23:39', '5048a8ee5347385cedb3fe036d7512a9.jpg'),
(23, 'adam1234', 'adam@mail.com', 'CCEPvOO9vOhLJPMXd6fvpPWkDVGshI36cILYQlu/fwQ=', 1, 'Berhasil', '2023-07-23 14:26:51', '6d71a4d2db142f5df6d6136ec8636a9a.jpeg'),
(24, 'rizkybro', 'rizky@gmail.com', 'T26Vqh4U5BmGh9wWDjlpX2+0I6mWFBuvZwYsv+hqNXA=', 1, 'Berhasil', '2023-07-26 07:59:06', 'default.png'),
(25, 'Marno', 'moreno@gmail.com', 'RnuSy/o8BKlNpa5ckaFwdegpVZg/nHbv8yMOWnPudt4=', 1, 'Berhasil', '2023-07-30 13:06:29', '5aa451925ddeac25988a5ded7351bd67.jpeg'),
(26, 'Teuku Risyadi', 'teukurisyad96@gmail.com', 'CVS44A1U1TZuYByN8ABP1vHhQsY6HyAv+zW/ImgUZFY=', 1, 'Berhasil', '2023-07-30 17:04:03', 'default.png'),
(27, 'kiki', 'kiki@gmail.com', 'McqbuiSN78qERMyaUDDOpcJS8TYI9qqxvKxMYQxn310=', 1, 'Berhasil', '2023-08-02 07:45:22', 'default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
--

CREATE TABLE `post` (
  `id` int(8) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `link_url` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `kategori` enum('','Populer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`id`, `nama`, `link_url`, `gambar`, `deskripsi`, `kategori`) VALUES
(5, 'BlackBox AI', 'https://useblackbox.io', 'fe79ed6ec069ca88f1677882f443e49a.png', 'Anda dapat membuat kode 10 kali lebih cepat dengan BlackBox AI, pembantu pengkodean bertenaga AI. Anda dapat menggunakan alat bantu seperti pelengkapan otomatis kode dan ekstraksi kode untuk mengubah pertanyaan apa pun menjadi kode.\r\n', 'Populer'),
(6, 'Hacker AI', 'https://hacker-ai.ai', 'a4eed25e4dfc308425064482e66754f5.png', 'AI yang mencari pelanggaran keamanan aplikasi Anda. Berguna untuk pemrogram dan mereka yang bekerja di keamanan siber. Kerentanan kode sumber ditemukan oleh AI peretas. Gratis dengan hadirnya API freemium.', ''),
(7, 'DeepL', 'https://deepl.com', '7e979f6771bb2fbcdad60d169b00fa12.png', 'Terjemahan mesin yang paling akurat dan kompleks yang tersedia disebut DeepL. Dengan memadukan teknologi AI yang canggih dan akurasi terjemahan yang tak tertandingi, mesin ini hampir 3 kali lebih akurat daripada saingan terdekatnya.', 'Populer'),
(8, 'Uberduck', 'https://uberduck.ai', 'cebf9117b64fc494f475814fbd97d72b.png', 'Dengan menggunakan alat ini, pelanggan dapat menghasilkan audio sulih suara dengan lebih dari 5.000 suara ekspresif serta klon suara yang dipersonalisasi. Selain itu, platform ini menyediakan API untuk membuat aplikasi audio dan rap yang diproduksi oleh AI. Ada daftar tunggu untuk mendaftar ke platform Uberbots yang akan datang serta studi kasus untuk menunjukkan bagaimana platform ini dapat digunakan untuk membuat media yang disesuaikan.', 'Populer'),
(9, 'Removebg ', 'https://Remove.bg', '95872d542ce1b0e62f35a9092d7c2193.png', 'Dengan satu klik, latar belakang 100% secara otomatis dihapus dalam 5 detik. Dengan bantuan kecerdasan remove.bg, Anda dapat mengurangi waktu pengeditan dan meningkatkan kenikmatan.', 'Populer'),
(10, 'NightCafe Studio', 'https://creator.nightcafe.studio', 'a9ef1acfdf798f7afed925093faa9047.png', 'Generator Seni AI. Ciptakan karya seni yang luar biasa dengan menggunakan kekuatan Kecerdasan Buatan.', ''),
(11, 'Starry AI', 'https://starryai.com', '9a5843e7d62815967eaf76163946940f.png', 'Starry AI mengubah teks menjadi gambar karya seni AI seperti aplikasi lain dalam daftar ini. Tetapi tidak seperti yang lainnya, aplikasi ini menawarkan kontrol terperinci atas aspek-aspek tertentu yang membuat hasilnya jauh lebih personal.', ''),
(12, 'Adobe Podcast', 'https://podcast.adobe.com', '65d9aadbcbcefc4376d994b6eb70db29.png', 'Memberi Anda dua alat bantu gratis yang praktis untuk meningkatkan audio dalam proyek Anda. Meningkatkan suara dengan menghilangkan semua kebisingan dan gema sekitar. Membuka potensi mikrofon Anda untuk menghasilkan suara berkualitas tinggi dengan Mic Check. Produk utama, yang ada dalam daftar tunggu, memberikan janji untuk menawarkan perekaman dan pengeditan audio online yang didukung oleh AI.', 'Populer'),
(13, 'Voicemod', 'htttps://voicemod.net', 'f4d4a23df59d5bf08741c8c6629cd811.png', 'Aplikasi pengubah suara yang menyenangkan dan menyeramkan, GRATIS. Pengubah suara dan moderator dengan efek yang mengubah suara Anda menjadi feminin atau robotik.', ''),
(14, 'Tome', 'https://beta.tome.app', '5890ea99091873a9f94586f4d88fa865.png', 'Mendongeng generatif telah tiba di masa depan. Dengan gaya mendongeng yang didukung AI dari Tome, Anda dapat menampilkan karya terbaik Anda.', ''),
(15, 'Excel Formula Bot', 'https://excelformulabot.com', '6c2b4f806a45186989176d0d9e5b00ed.png', 'Dengan menggunakan AI, ubah instruksi teks Anda menjadi rumus Excel dengan cepat. Berhenti membuang-buang waktu membuat formula di Excel. Temukan potensi penuh dari Google Sheets dan pembuat rumus AI Excel untuk mengatasi masalah dengan cepat.', ''),
(16, 'Soundful', 'https://soundful.com', '060658b20f21be825d1b847f892456a8.png', 'Hanya dengan mengklik satu tombol, Soundful memungkinkan pembuat konten menghasilkan musik yang bebas royalti. Anda tidak akan percaya musik Soundful diproduksi dengan kecerdasan buatan karena kualitasnya yang unggul.', ''),
(17, 'Canva Text to Image', 'https://canva.com/your-apps/text-to-image', '2d3f82069cb258c84779009a7dd4504e.png', 'Canva AI dapat menghasilkan gambar dengan menerjemahkan imajinasi pengguna melalui deskripsi tulisan menjadi gambar digital. Hanya dengan mendeskripsikan warna, bentuk, dan gaya gambarnya, Canva AI dapat menghasilkan gambar dalam satu klik.', ''),
(18, 'Supermeme', 'https://supermeme.ai', '66bf30471cb8da944548cae0b555cdd8.png', 'Kamu hanya perlu memasukkan kriteria apa saja yang ingin ada pada gambarmu. Kemudian aplikasi ini akan mentransformasikannya ke dalam bentuk gambar. Dengan demikian, sang seniman pun tak perlu repot memikirkan konsep dan warna karena semuanya telah diambilalih oleh AI.', ''),
(19, 'Midjourney', 'https://midjourney.com', '87b496f958ed256913f784fd2fdb4118.png', 'Midjourney merupakan generator teks ke gambar yang baru-baru ini menjadi viral karena membuat foto manusia jadi tampak sangat realistis. Situs web AI ini juga dapat membuat gambar berdasarkan deskripsi apapun yang Anda berikan.', ''),
(20, 'Character AI', 'https://beta.character.ai', '6ab9ab4d215eb51002ed69e813b82780.png', 'Character.ai merupakan platform chatbot yang memungkinkan Anda berbicara dengan versi digital dari tokoh terkenal, baik itu tokoh nyata maupun fiksi dan berkomunikasi dengan mereka secara bebas melalui percakapan terbuka. Platform ini sendiri dibuat oleh mantan peneliti Google, Daniel De Freitas dan Noam Shazeer dan diluncurkan untuk publik pada September 2022. Tidak seperti ChatGPT, platform ini lebih bertujuan untuk menghibur pengguna.', ''),
(21, 'Autodraw', 'https://autodraw.com', '7083355a23f6ec29ac49ec5e1742cc14.png', 'AutoDraw dapat mengubah gambar orat-oret Anda yang sembarangan menjadi gambar yang lebih baik dengan menawarkan saran gambar yang mirip dengan yang telah digambarkan.', 'Populer'),
(22, 'AI Dungeon', 'https://aidungeon.io', 'fe5f0e8ebb94e5b618557516cef5dbbc.png', 'AI Dungeon adalah game petualangan role playing game (RPG) berbasis teks. Tidak seperti gim petualangan teks biasa yang menggunakan konten yang sudah ditulis sebelumnya, AI Dungeon menggunakan teknologi AI untuk menghasilkan alur cerita terbuka tanpa batas secara cepat dan efektif. Game ini tentunya dapat memberi Anda pengalaman yang benar-benar unik dan dinamis setiap kali bermain.', ''),
(24, 'Copy.ai', 'https://www.copy.ai', '9eff09d3dc610e786e8d0e3489e22e4a.png', 'Copy.ai merupakan generator konten tertulis berbasis AI yang bisa menghasilkan konten dalam hitungan detik. Konten yang disajikan pun beragam, mulai dari konten blog, email, copywriting media sosial, copywriting eCommerce, maupun website.', ''),
(25, 'Magic Eraser', 'https://magicstudio.com', 'f6379be5d0007def4583d5fa33ed08fd.png', 'Dalam beberapa detik, hapus elemen yang tidak diinginkan dari foto. Unggah gambar yang ingin Anda koreksi, lalu tandai area yang harus dipotong.', ''),
(26, 'Quillbot', 'https://quillbot.com', '530921cdfde76e2fd1c56037568b81c8.png', 'sebuah website AI yang dapat membantu kamu dalam melakukan koreksi pada tulisan yang sudah kamu buat. Tersedia beberapa fitur berguna yang ada di website ini, seperti paraphraser, grammar checker, plagiarism checker, co-writer, summarizer, citation generator, hingga translator.\r\n', ''),
(27, 'Compose AI', 'https://compose.ai', '7fbe1d26a0b1281e286fab957681c6f4.png', 'Anda dapat menggunakan AI untuk mengotomatiskan tulisan Anda dengan Compose, ekstensi Chrome gratis. Saatnya menyesuaikan permainan; kita seharusnya tidak mengetik selama 40% hari ini.\r\n', ''),
(28, 'SlidesAI', 'https://slidesai.io', '1768da7568d1cff35d0639c0da9cec69.png', 'Ucapkan selamat tinggal pada produksi slide manual yang melelahkan dengan menggunakan AI untuk membuat presentasi dalam hitungan detik. Biarkan AI membuat garis besar dan konten presentasi atas nama Anda. Dengan aplikasi ini, Anda dapat dengan cepat dan mudah menghasilkan slide yang menarik dan menarik dari teks apa pun. menggunakan Google Slide. Microsoft Powerpoint akan datang.\r\n', 'Populer'),
(29, 'Designs AI ', 'https://designs.ai', 'dbe3233b43a95e74eaf3e6ca49fe6529.png', 'Designs.ai dibangun dengan misi memberdayakan imajinasi melalui kecerdasan buatan. Designs.ai adalah platform online yang menggunakan teknologi AI eksklusif untuk membuat desain dapat diakses oleh semua orang. Artinya, bahkan tanpa pengalaman desain, Anda akan dapat membuat portofolio pemasaran yang menakjubkan dalam waktu kurang dari 2 menit dengan bantuan antarmuka yang mudah digunakan dan alat bertenaga AI.\r\n', ''),
(30, 'Photor AI', 'https://photor.io', '13cab54d9c7368f3baac2ea6ed75d05b.png', 'Photor AI adalah alat yang menganalisis dan memilih foto terbaik untuk penggunaan pribadi atau profesional di situs web seperti Linkedin, jejaring sosial, dan aplikasi kencan menggunakan pengenalan gambar mutakhir dan teknologi pembelajaran mesin. Ini membantu dalam membuat kesan pertama sebaik mungkin tentang Anda.', ''),
(33, 'AI Social Bio', 'https://aisocialbio.com', '9b4da5272227d93b615025287ff11b09.png', 'AI yang menghasilkan bio untuk jejaring sosial Anda.', ''),
(34, 'TwitterBio', 'https://twitterbio.com', 'd9dc1ffd554ea8f7fc303d6e2527d61d.png', 'Buat bio Twitter dalam hitungan detik. Anda dapat membuat otobiografi singkat tentang diri Anda atau menggunakan biografi Anda saat ini sebagai contoh untuk AI. Pilih antara nada profesional, informal, atau lucu.', ''),
(35, 'Booom', 'https://Booom.ai', '34f0d0d429832b856fbf039a6de7c3be.png', 'Buat game trivia seru yang bisa Anda mainkan berdasarkan topik yang Anda masukan. Anda memiliki pilihan untuk bermain sendiri atau dengan teman-teman.', ''),
(39, 'Chai', 'https://chai-research.com', 'c5cbed1b2a7dd2e47ecbbe2aa35cead6.png', 'Aplikasi untuk ponsel Anda yang memungkinkan Anda membuat dan mendistribusikan chatbot AI ke ribuan pengguna. Bicaralah dengan AI.', ''),
(40, 'AskNow', 'https://asknow.ai', 'aa2a9dbbeb103e191df5718a54911a15.png', 'Anda dapat mengajukan pertanyaan apa pun kepada orang-orang terkenal dan mendapatkan respons yang diringkas AI dengan referensi. termasuk orang-orang seperti Paul Graham, Serena Williams, Naval Ravikant, Elon Musk, dll.', ''),
(44, 'AskThee', 'https://askthee.vercel.app', '60961248c0975d9c301657ccac9cde30.png', 'Ajukan pertanyaan kepada seorang filsuf, seniman, atau ilmuwan. Saat ini termasuk tokoh-tokoh seperti Aristoteles, Asimov, Carl Sagan, dll.', ''),
(46, 'Pixelhunter', 'https://pixelhunter.io', 'f5acf3b6881f5521708cb4e0689162a5.png', 'Memangkas setiap gambar dengan tangan bisa melelahkan. Untuk mengenali objek dan memotong gambar secara otomatis dan cerdas, Pixelhunter memanfaatkan API Intelijen Uploadcare yang luar biasa.', ''),
(47, 'Vana Portrait', 'https://portrait.vana.com', '604de85aff2670452c0731a5a83d22b0.png', 'Studio seni generatif “oePortrait” oleh Vana dapat menghasilkan potret diri Anda dalam gaya yang tak terbatas karena Anda adalah sebuah karya seni.', 'Populer'),
(48, 'LanguageTool', 'https://languagetool.org', '97a1ffebc388ca59ab55230645c40928.png', 'LanguageTool memberikan analisis penulisan menyeluruh dari semua dokumen potensial selain mengoreksi kesalahan ejaan. Gaya bahasa disesuaikan selain pilihan kata, tata bahasa, dan ejaan. Ini fasih dalam lebih dari 30 bahasa dan dialek, dengan bahasa Inggris, Spanyol, Jerman, Prancis, Belanda, dan Portugis sebagai bahasa utamanya. Enam varian standar tersedia dalam terjemahan bahasa Inggris. Selain mengoreksi, LanguageTool juga menyediakan fitur rephrasing berbasis AI. Dengan ini, Anda dapat menulis ulang kalimat secara keseluruhan untuk membuatnya lebih jelas, lebih pendek, atau lebih profesional.', ''),
(53, 'chatgpt', 'openai.com', '6434c98eb5416.png', 'Mengoptimalkan Model Bahasa untuk Dialog dengan ChatGPT. ChatGPT dapat merespons pertanyaan tindak lanjut, mengakui kesalahan, menyanggah asumsi yang tidak berdasar, dan menolak permintaan yang tidak tepat berkat gaya dialog.', 'Populer'),
(54, 'RestorePhotos', 'https://restorephotos.io', '643e0c3c3c914.png', 'Pemulihan foto bertenaga AI untuk semua foto vintage. Punya foto potret yang kedaluwarsa dan buram? Agar ingatan seperti itu terus berlanjut, biarkan AI kita menghidupkannya kembali. Pulihkan gambar Anda hari ini secara gratis.', ''),
(55, 'Hello History', 'https://hellohistory.ai', '643e0c73de319.png', 'Anda akan dapat berbicara secara mendalam dengan beberapa orang bersejarah yang penting dan menarik. Jangan menganggap pembicaraan terlalu serius karena dibuat oleh AI. Karena setiap percakapan berbeda, Anda tidak pernah bisa memprediksi ke mana arahnya.', ''),
(56, 'Dream Interpreter', 'https://dreaminterpreter.ai', '643e0ca7475c5.png', 'Seorang juru bahasa mimpi berbasis GPT-3. Minta untuk menganalisis impian Anda, itu akan melakukannya sambil memberi Anda pilihan untuk menyetujui atau tidak menyetujui interpretasi.', 'Populer'),
(57, 'IdeasAI', 'https://ideasai.com', '643e0ce1485ec.png', 'Tanpa campur tangan manusia, GPT-3 OpenAI, model pembelajaran mendalam yang cerdas secara artifisial, menghasilkan semua ide di halaman ini. Model ini dilatih oleh Anda dan lebih dari 1.457.521 orang lain yang menyukai atau tidak menyetujui gagasan.', ''),
(58, 'FILM', 'https://replicate.com', '643e0d101a32f.png', 'Interpolasi Frame untuk Gerak Adegan Besar dalam Film. Dalam upaya menghasilkan animasi, frame dibentuk dengan menginterpolasi dua gambar yang ada.', ''),
(59, 'Genmo AI', 'https://alpha.genmo.ai', '643e0d4691396.png', 'Genmo menggunakan AI untuk membuat video nyata. Anda juga dapat melihat video yang diproduksi komunitas.', ''),
(60, 'PowerMode AI', 'https://powermodeai.com', '643e0d7c8b903.png', 'Salah satu pendiri AI Anda, PowerMode, akan membantu Anda dengan ide dan pitching startup.', ''),
(61, 'Present AI', 'https://powerpresent.ai/', '643e0dacb2bb3.png', 'Menggunakan AI, buat presentasi yang menakjubkan dengan cepat. menyediakan pilihan gaya artistik, seperti Low Poly, Cyberpunk, Surealisme, Anime, Realisme, Desain Memphis, Fantasi, dan Kartun. memungkinkan pengguna untuk membuat presentasi dengan menambahkan teks mereka sendiri.', ''),
(62, 'MagicSlides', 'https://magicslides.app', '643e0ddb70918.png', 'Dengan template yang dapat diedit, Anda dapat dengan cepat dan mudah membuat presentasi yang mengesankan. Cukup pilih judul Anda dan jumlah slide.', 'Populer'),
(63, 'Motionit', 'https://motionit.ai', '643e0e092890e.png', 'Buat slide dan film yang menarik dengan kecerdasan buatan untuk berbagai kegunaan, seperti pitch deck startup, presentasi konferensi, dan banyak lagi.', 'Populer'),
(64, 'Steve AI', 'https://steve.ai', '643e0e392ff67.png', 'Steve AI adalah tool berbasis AI yang memungkinkan siapa saja untuk membuat video dan animasi dengan mudah. Tool ini dirancang untuk menghemat waktu bagi pembuat video, pemasar, tenaga penjualan, dan siapapun yang ingin membuat video dengan lebih cepat daripada menggunakan software edit video profesional.', 'Populer'),
(65, 'Synthesia', 'https://synthesia.io', '643e0e8653891.png', 'Synthesia merupakan tool pembuatan video berbasis kecerdasan buatan (AI). Tool ini cocok digunakan untuk perusahaan yang ingin membuat video untuk pelatihan, cara, atau pemasaran tanpa harus repot menyiapkan perlengkapan.', 'Populer'),
(66, 'Grammarly', 'app.grammarly.com', '643e0ed423c50.jpg', 'Grammarly hadir sebagai sebuah website yang dapat membantu penggunanya memeriksa tata bahasa, ejaan, dan gaya penulisan dalam bahasa Inggris. Grammarly memeriksa teks dengan menggunakan teknologi AI dan memberikan saran perbaikan untuk membantu pengguna menulis dengan lebih baik', 'Populer'),
(67, 'Frase', 'https://frase.io', '643e0f0b2fa5b.png', 'Frase dapat melakukan penelitian tentang topik serta menghasilkan konten tentang topik tersebut. Tool berbasis AI ini menawarkan lebih dari 13 template gratis untuk halaman landing dan posting blog, dan masing-masing dilengkapi dengan kemampuan optimasi SEO. Frase juga memiliki beberapa alat untuk meningkatkan konten yang sudah ada, termasuk kemampuan pencarian kata kunci, optimasi konten, dan indeks semantik laten. Tujuannya adalah untuk menyederhanakan seluruh alur kerja konten SEO, mulai dari penelitian kata kunci hingga analisis konten.', ''),
(68, 'Pictory', 'https://pictory.ai', '643e10108c1d2.png', 'Pictory.ai adalah website yang menggunakan kecerdasan buatan manusia untuk dapat merubah sebuah teks. platfom ini memungkinkan para pengguna untuk membuat konten visualnya dengan cepat dan mudah tanpa harus memiliki kemampuan desain grafis atau video yang rumit', ''),
(69, 'Giftastic AI ', 'https://giftastic.ai', '6447982c79acf.png', 'Giftastic.ai adalah mesin rekomendasi hadiah yang dipersonalisasi yang membuat rekomendasi untuk hadiah unik dan perhatian yang akan disukai dan dihargai oleh orang yang Anda beli berdasarkan sifat khusus mereka.', ''),
(70, 'Pinegraph', 'https://pinegraph.com', '644799934d5df.png', 'Buat seni menggunakan Pinegraph. Gunakan Pinecasso AI untuk mewujudkan fantasi Anda hanya dengan mendeskripsikan apa yang Anda inginkan, dan Pinecasso akan mengurus sisanya.\r\n', ''),
(71, 'Copysmith', 'https://copysmith.ai', '644799b06b1a8.png', 'Alat copywriting AI pilihan untuk agensi & tim di ruang eCommerce. meningkatkan pendapatan ke tingkat rekor. Daftar sekarang untuk uji coba gratis Anda.', ''),
(72, 'SketchPro AI ', 'https://sketchpro.ai', '64479a263d99c.png', 'Untuk menerima sketsa Anda, unggah gambar, deskripsikan gambar, dan tambahkan tag ke gambar', ''),
(73, 'Txt2SQL AI ', 'https://www.text2sql.ai/', '14306a32af8a7fde9e09002c3836ccad.png', 'Text2SQL.AI menggunakan model OpenAI GPT-3 Codex yang dapat menerjemahkan perintah bahasa Inggris ke pertanyaan SQL, dan pertanyaan SQL ke teks bahasa Inggris. Saat ini merupakan alat Pemrosesan Bahasa Alami paling canggih yang tersedia, dan ini adalah model yang sama persis dengan yang digunakan oleh Github Copilot.', ''),
(74, 'Newswriter.ai ', 'https://newswriter.ai', '64479a4ad05de.png', 'Anda dapat menulis rilis berita yang menawan dan menarik perhatian dengan cepat menggunakan Newswriter.ai, alat pembuat rilis pers bertenaga AI. Penulis berita menawarkan dua layanan: membuat siaran pers dari awal atau mengedit yang sudah ada menggunakan teknologi GPT-3 OpenAI. Dengan mengirimkan cerita Anda ke Google Berita dan lebih dari 500 situs web lainnya, Anda dapat menggunakan alat pemasaran berita Newsworthy untuk meningkatkan jumlah orang yang melihatnya.', ''),
(75, 'Quick Reply ', 'https://quickreply.cfd', '64479a9f77f58.png', 'Algoritme tingkat lanjut digunakan oleh QuickReply untuk membuat dan mengevaluasi pesan masuk, memberikan respons yang sesuai dan disesuaikan dalam hitungan detik, serta menghemat waktu dan tenaga Anda.', ''),
(76, 'Midjourney Splitter ', 'https://mjsplitter.com', '64479ac40a247.png', 'Bagi Midjourney Grid Anda menjadi foto individual menggunakan MJSplitter. Anda memiliki dua opsi untuk memasukkan gambar: mengunggahnya atau menempelkan tautan. Anda dapat mengunduh foto dan menyimpannya sebagai JPEG di komputer Anda setelah dipisah. Selain itu, Anda juga dapat memposting foto Anda di media sosial.\r\n', ''),
(77, 'Hippocratic AI ', 'https://hippocratic-medical-questions.herokuapp.com/', '64479ae741d93.png', 'Mesin pencari informasi medis peer-review gratis. Statpearls digunakan sebagai sumber data. Itu diunduh melalui FTP sesuai dengan pedoman penggunaan.', ''),
(78, 'Paint By Text ', 'https://paintbytext.chat', '64479af952dfb.png', 'Dengan memasukkan objek yang ingin Anda tambahkan atau hapus dari gambar, Anda dapat dengan cepat mengubah foto dengan alat ini.', ''),
(79, 'Maverick', 'https://trymaverick.com', '64479b09b5605.png', 'Gunakan film yang disesuaikan secara otomatis untuk menjalin hubungan yang langgeng dengan audiens Anda. Kami di Maverick menggunakan AI dan Deep Tech untuk membuat ratusan film unik yang disesuaikan untuk berbagai organisasi, termasuk perusahaan e-niaga, toko online, layanan kesehatan, dan lainnya. Maverick akan membuat ratusan film unik yang dipersonalisasi menggunakan rekaman Anda, di mana Anda menyapa setiap penonton dengan namanya. Jadi mengapa Anda masih menunggu? Tingkatkan konversi Anda dengan mengirimkan video otomatis yang disesuaikan ke konsumen Anda.', ''),
(80, 'CrowdView', 'https://crowdview.ai', '64479b1ad9a0f.png', 'Reddit, HackerNews, dan forum serta komunitas lainnya dicari oleh mesin pencari AI.', ''),
(81, 'Lablab.ai ', 'https://lablab.ai', '64479b2ef2f7c.png', 'Community of Makers, membangun dengan Kecerdasan Buatan canggih yang canggih. Lablab.ai menyelenggarakan Hackathon reguler yang mengajarkan cara membuat dan menggunakan berbagai teknologi AI.\r\n', ''),
(82, 'Teach Anything ', 'https://teach-anything.com', '64479b412b14c.png', 'Temukan solusi untuk pertanyaan tentang subjek apa pun dengan cepat. Anda harus merumuskan pertanyaan mereka dan memutuskan bahasa dan tingkat kesulitan. Mereka kemudian akan menerima resolusi.', ''),
(83, 'Glow AI ', 'https://glowai.xyz', '64479b546dad5.png', 'Memperkenalkan Glow AI, solusi perawatan kulit khusus Anda. Aplikasi web kami membuat rejimen perawatan kulit yang dipersonalisasi berdasarkan jenis kulit dan batas pengeluaran Anda.', ''),
(84, 'Gen Z Translator ', 'https://m64.in', '64479b6493333.png', 'Eksperimen AI menghibur yang mengubah teks apa pun menjadi istilah Gen Z. Teknologi tersebut akan dapat mengenali kata dan frasa tertentu dalam teks asli dan kemudian menukarnya dengan istilah slang yang sesuai. Saya kira saya mengubah 2000+ kalimat menjadi tweet.', ''),
(85, 'Runwayml', 'https://runwayml.com/', '44ac8831c4242fefa8386df9ad243e50.png', 'Runway adalah sebuah paket perangkat lunak kreatif yang revolusioner yang memungkinkan pengguna untuk membuat apa saja yang mereka inginkan dengan bantuan kecerdasan buatan sebagai kolaborator. Dalam Runway, segala yang dibutuhkan untuk mewujudkan ide kreatif bisa ditemukan. Dengan fitur-fitur terbaru yang tersedia di dalamnya, pengguna dapat memvisualisasikan dan mewujudkan ide-ide mereka menjadi karya yang indah dan orisinal. Dengan bantuan kecerdasan buatan, Runway memberikan kemampuan baru yang tak terbatas dalam hal kreativitas, memberikan pengalaman yang unik dan menyenangkan bagi para penggunanya.', ''),
(86, 'StockGPT', 'https://askstockgpt.com', '64479bd1a5d2e.png', 'Mesin pencari bertenaga AI yang disebut StockGPT dilatih menggunakan transkrip dari setiap panggilan pendapatan triwulanan Tesla sejak Q2 2011.\r\n', ''),
(87, 'PromptLayer', 'https://promptlayer.com', '64479be2a85dc.png', 'Platform pertama yang memungkinkan Anda melacak dan mengelola rekayasa prompt GPT disebut PromptLayer. PromptLayer berfungsi sebagai perantara antara program Anda dan pustaka Python untuk OpenAI. Semua kueri API OpenAI Anda direkam oleh PromptLayer, memungkinkan Anda untuk mencari dan menelusuri riwayat permintaan di dasbor PromptLayer.', ''),
(88, 'PatentPal', ' https://patentpal.com', '64479bf182f17.png', 'Generasi cerdas untuk kekayaan intelektual. Dalam aplikasi paten Anda, otomatiskan penulisan mekanis.', ''),
(89, 'PromptStacks', 'https://www.promptstacks.com/', '64479c003d7e1.png', 'Untuk membebaskan waktu Anda agar fokus pada tugas-tugas penting, mereka menyediakan berbagai permintaan tervalidasi gratis yang dikurasi untuk model bahasa besar seperti ChatGPT dan disediakan melalui rekayasa cepat. Ada komunitas yang terhubung dengannya di mana Anda dapat bergabung dengan perselisihan mereka, mengirimkan petunjuknya, atau melihat petunjuk yang paling populer.', ''),
(90, 'Bookabout', 'https://bookabout.io', '64479c0f57441.png', 'mesin pencari buku dengan AI. Daripada hanya mencari kata kunci, cari konsep bukunya.', ''),
(91, 'Pop2Piano', 'https://sweetcocoa.github.io/pop2piano_samples/', '64479c1cbae47.png', 'memainkan penutup piano dari lagu apa pun yang Anda pilih dengan suara pop. Ubah lagu dan gaya sampul piano dengan memilih item dari daftar.', ''),
(92, 'AI Cards ', 'https://designstripe.com/ai-cards/', '64479c2c1d818.png', 'Kartu liburan buatan AI. Anda dapat mengetikkan nama perusahaan Anda, acara, suara yang ingin Anda buat untuk pesan Anda, dan deskripsi gambar yang ditampilkan.', ''),
(93, 'Ebsynth', 'https://ebsynth.com', '64479c9d2da62.png', 'Dengan hanya beberapa kerangka kunci yang dirancang, Anda dapat menganimasikan rekaman yang sudah ada menggunakan program shareware gratis EbSynth. Ini sangat ideal untuk animasi yang digambar dengan tangan, yang sangat sulit untuk dianimasikan.', ''),
(94, 'Better Synonyms ', 'https://bettersynonyms.com', '64479caf28fcc.png', 'metode praktis untuk menemukan sinonim superior untuk kata-kata dalam konteks tertentu. Ini memungkinkan Anda untuk mencari sinonim yang akan mengalir lebih lancar ke dalam sebuah kalimat dan membuatnya lebih mudah untuk mengomunikasikan makna yang dimaksudkan.', ''),
(95, 'Latent Labs ', 'https://latentlabs.art', '64479cc2b5a26.png', 'Berdasarkan permintaan teks Anda, buat dunia 3D yang dapat Anda jelajahi. Memiliki dukungan untuk berbagai versi Difusi Stabil dan Komunitas Perselisihan yang dapat Anda ikuti.', ''),
(96, 'Duino Code Generator ', 'https://duinocodegenerator.com', '64479cd52045c.png', 'Dengan satu klik sederhana, secara otomatis menghasilkan kode untuk papan yang kompatibel dengan Arduino. Agar Anda dapat menghabiskan lebih banyak waktu untuk mengutak-atik, biarkan AI melakukan tugas yang membosankan!', ''),
(97, 'Summate', 'https://summate.it', '64479ce48351f.png', 'Alat AI eksperimental untuk meringkas artikel dari web. Situs web menggunakan OpenAI untuk ringkasan artikel dan RSS Teks Lengkap untuk ekstraksi artikel.', ''),
(98, 'Skim It ', 'https://skimit.ai', '64479cf88085a.png', 'Terima ringkasan AI dari cerita apa pun di email Anda. Cukup kirimkan email kepada mereka di go@skimit.ai, dan mereka akan merespons dengan ringkasan dalam waktu sekitar 10 menit. Selain itu, mereka menawarkan kepada Anda draf artikel LinkedIn dan tweet yang dapat dibagikan.', ''),
(99, 'Lexii.ai ', 'https://lexii.ai', '64479d0a82502.png', 'Helper pencarian AI Lexii.ai memberikan tanggapan dan kutipan untuk sumber. Teknologi pemrosesan bahasa alami modern, GPT-3, mendukungnya. Anda bisa mendapatkan informasi akurat dan terkini tentang subjek apa pun dari Lexii.', ''),
(100, 'PlayArti', 'https://playarti.com', '64479d1911ea2.png', 'Cukup klik tiga tombol untuk memilih karakter, latar, dan aktivitas untuk membuat karya seni.', ''),
(101, 'Steno', 'https://steno.ai', '64479d2a29a3a.png', 'Podcast favorit Anda, sepenuhnya ditranskripsi Pelajari, gunakan sebagai sumber, dan ikuti saat Anda membaca.\r\n', ''),
(102, 'Helicone', 'https://helicone.ai', '64479d3b6580e.png', 'Pemantauan GPT-3 menjadi lebih mudah hanya dengan satu baris kode. Untuk menggunakan, gantikan SDK dengan url dasar. Valyr akan menerima kunci OpenAI Anda satu kali. Dasbor akan menampilkan permintaan.', ''),
(103, 'Kinetix', 'https://www.kinetix.tech/create', 'a2ab189aa5ad99cf99ca8e1481e4f309.png', 'Dengan bantuan keajaiban kecerdasan buatan (AI), kini pengguna dapat menciptakan emoticon kustom sesuai dengan keinginan mereka. Tak hanya itu, pengguna juga dapat mengubah video menjadi animasi 3D dengan menggunakan AI. Selain itu, dengan tersedianya beragam animasi di dalam perpustakaan yang disediakan, pengguna dapat mengkombinasikan beberapa animasi untuk menciptakan emoticon yang unik dan orisinal. Pengguna juga dapat dengan mudah membuat NFT emoticon dengan bantuan fitur-fitur yang ada di dalam perangkat lunak tersebut. Dengan begitu, proses pembuatan emoticon kini menjadi lebih mudah dan praktis berkat kemampuan AI yang terintegrasi di dalam perangkat lunak tersebut.', ''),
(104, 'Watermark Remover', 'https://www.watermarkremover.io/', '3e6b89d541f7bd26f9490f3c598ca3d5.png', 'Dengan menggunakan alat penghapus watermark yang kami sediakan secara gratis, pengguna dapat dengan mudah dan cepat menghilangkan watermark transparan yang ada pada gambar mereka hanya dalam beberapa detik. Alat penghapus watermark ini mampu menghapus watermark secara menyeluruh dari gambar, sehingga gambar dapat dipakai kembali tanpa harus menghilangkan watermark secara manual atau membuat watermark baru. Alat penghapus watermark ini dirancang untuk memberikan kemudahan bagi pengguna yang ingin mengedit gambar mereka tanpa harus terganggu oleh watermark yang mengganggu tampilan gambar tersebut. Dengan menggunakan alat penghapus watermark yang tersedia, pengguna dapat menghemat waktu dan usaha dalam menghapus watermark dari gambar mereka, memungkinkan mereka untuk fokus pada pengembangan kreativitas dan kualitas gambar.', ''),
(105, 'Liner.ai ', 'https://liner.ai', '64479d71dbee9.png', 'Liner adalah aplikasi gratis yang memudahkan untuk melatih model ML. Ini menggunakan data pelatihan Anda dan memberi Anda model pembelajaran mesin yang intuitif. Tidak diperlukan pengetahuan pengkodean atau pembelajaran mesin.', ''),
(106, 'YouTube Summarized ', 'https://youtubesummarized.com', '64479d8277b8f.png', 'Dengan kunci OpenAI Anda, Anda dapat menggunakan ekstensi Chrome ini untuk meringkas video YouTube dengan durasi berapa pun. Sangat bagus untuk membuat catatan atau meringkas video tanpa benar-benar menontonnya.', ''),
(107, 'Gifts Genie ', 'https://gen.gifts', '566f7f1a37bb617d29b3f2553e1edcb4.png', 'Alat inspirasi hadiah ulang tahun yang digerakkan oleh AI disebut Genie. Berikan generator ide hadiah beberapa detail tentang penerima sehingga Anda tidak perlu bersusah payah memikirkan hadiah yang ideal. Itu mencoba membuat pemberian hadiah tidak terlalu membuat stres.', ''),
(108, 'Ponzu', 'https://ponzu.gg', '64479da26bdc2.png', 'Menambahkan tekstur yang dibuat oleh AI ke objek 3D. Tekstur buatan AI digunakan untuk membumbui aset 3D.', ''),
(109, 'Vacation & Travel Chat (GPT) ', 'https://usevacay.com', '64479db5231ef.png', 'Asisten AI dapat membuat rencana perjalanan yang dipersonalisasi untuk Anda, memberikan inspirasi perjalanan, dan bahkan membuat rekomendasi hotel, restoran, dan objek wisata lokal.', ''),
(110, 'DiffusionBee', ' https://diffusionbee.com', '64479dc34b444.png', 'Pendekatan paling sederhana untuk menggunakan Difusi Stabil untuk membuat seni AI di PC Anda.', ''),
(111, 'Unscreen', 'https://www.unscreen.com/', 'a431902f728fff68eef0218006ff3e00.png', 'Unscreen merupakan sebuah aplikasi yang dirancang untuk memudahkan pengguna dalam menghapus latar belakang video dengan cepat dan mudah. Aplikasi ini memanfaatkan teknologi canggih yang dapat secara otomatis mengenali latar belakang pada video dan menghapusnya secara otomatis, tanpa memerlukan keahlian khusus dalam pengeditan video. Pengguna dapat menggunakan Unscreen untuk mengedit video mereka dengan cepat dan mudah tanpa harus membuang waktu untuk menghapus latar belakang secara manual. Selain itu, Unscreen juga menyediakan berbagai fitur lainnya seperti pengeditan warna, penyesuaian kualitas video, dan lain sebagainya untuk memperbaiki kualitas video yang dihasilkan. Dengan menggunakan aplikasi Unscreen, pengguna dapat menghemat waktu dan usaha dalam mengedit video mereka, sehingga mereka dapat fokus pada pengembangan kreativitas dan kualitas video.', ''),
(112, 'Humata', 'https://www.humata.ai/', 'a13eff2caec192eddb09f5577d2f41d1.png', 'Dengan Humata, pengguna dapat memperoleh jawaban yang mudah dipahami secara instan terkait dengan pertanyaan-pertanyaan sulit yang terkait dengan file yang sedang mereka kerjakan. Humata memanfaatkan teknologi canggih untuk menganalisis file yang dimaksud dan menghasilkan jawaban yang akurat dan mudah dimengerti oleh pengguna. Fitur-fitur yang tersedia di dalam Humata memungkinkan pengguna untuk mencari jawaban atas pertanyaan-pertanyaan yang berkaitan dengan file tersebut dengan mudah dan efektif. Dengan demikian, pengguna dapat menghemat waktu dan usaha dalam mencari jawaban yang diinginkan terkait dengan file yang mereka kerjakan.', 'Populer'),
(113, 'Jrnylist', 'https://jrnylist.com', '64479df44fd59.png', 'Prompt Bantuan Pertengahan Perjalanan. – Pilih dari berbagai pertanyaan yang diatur ke dalam kategori seperti Seni & Ilustrasi atau Aset & UI. Anda juga dapat mengirimkan permintaan Anda sendiri.', ''),
(114, 'Uizard', 'https://uizard.io/', '92480152ad949416eadd60c213250dd3.png', 'Uizard merupakan sebuah aplikasi yang memudahkan pengguna dalam membuat antarmuka pengguna (user interface) hanya dengan menggunakan gambar. Aplikasi ini memanfaatkan teknologi canggih untuk mengkonversi gambar yang diunggah oleh pengguna menjadi antarmuka pengguna yang fungsional dan interaktif. Dengan demikian, pengguna dapat membuat desain antarmuka pengguna yang menarik dan estetis dengan mudah tanpa harus memiliki keahlian dalam pemrograman. Uizard menyediakan fitur-fitur yang lengkap dan mudah digunakan oleh pengguna untuk membuat desain antarmuka pengguna yang tepat sesuai dengan kebutuhan dan preferensi mereka. Dengan aplikasi ini, pembuatan antarmuka pengguna menjadi lebih cepat, mudah, dan efisien, memungkinkan pengguna untuk fokus pada pengembangan produk dan layanan mereka.', ''),
(115, 'Cron AI ', 'https://cron-ai.vercel.app', '64479e153084d.png', 'Buat tugas cron hanya dengan menyatakan seberapa sering Anda ingin mereka mengeksekusi.', ''),
(116, 'Extrapolate', 'https://extrapolate.app', '64479e24e3a0a.png', 'Pengguna dapat mengunggah foto ke Ekstrapolasi untuk melihat seperti apa tampilannya di masa mendatang. Lebih dari 5.000 gambar telah diproduksi.', ''),
(117, 'NeuroSpell', 'https://neurospell.com', '64479e3499661.png', 'Pemeriksa tata bahasa dan ejaan otomatis berdasarkan pembelajaran mendalam disebut NeuroSpell. tersedia dalam lebih dari 30 bahasa yang berbeda. Semua bahasa memiliki dictaphone (Speech-to-Text). Dapat dilatih untuk koreksi kesalahan tertentu, kosakata dalam domain, dan penyusunan kata. Pengoptimalan biaya manusia dalam putaran adalah salah satu karakteristik tambahan. meningkatkan atau meningkatkan aliran teks. Dukungan Penulisan. Pengayaan input alur kerja pelanggan dan proofreading RPA Peningkatan ucapan-ke-teks. OCR memperbaiki kesalahan.', ''),
(118, 'SuperReply', 'https://superreply.co', '64479e45a3221.png', 'Dengan alat respons email bertenaga AI, Superreply menangani semua penulisan respons email yang membosankan. Memilih email pencocokan terbaik semudah mencocokkan nada suara.', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `favorit`
--
ALTER TABLE `favorit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_post` (`id_post`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `favorit`
--
ALTER TABLE `favorit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `post`
--
ALTER TABLE `post`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `favorit`
--
ALTER TABLE `favorit`
  ADD CONSTRAINT `favorit_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `login` (`id`),
  ADD CONSTRAINT `favorit_ibfk_2` FOREIGN KEY (`id_post`) REFERENCES `post` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
