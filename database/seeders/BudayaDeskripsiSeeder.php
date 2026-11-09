<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BudayaDeskripsiSeeder extends Seeder
{
    public function run(): void
    {
        $budayaData = [
            // ==================== ACEH ====================
            [
                'nama' => 'Rumah Krong Bade',
                'deskripsi' => "Rumah Krong Bade (Rumoh Aceh) adalah rumah adat tradisional Aceh yang berbentuk panggung dengan ketinggian sekitar 2,5–3 meter dari tanah. Struktur panggung ini dirancang untuk menghindari banjir dan serangan binatang buas. Secara filosofis, rumah ini mencerminkan keyakinan terhadap Tuhan YME dan adaptasi terhadap alam, dengan jumlah tangga yang selalu ganjil sebagai simbol religiusitas masyarakat Aceh.\n\nRumah ini telah ada sejak masa Raja Sultan Iskandar Muda dan dibangun tanpa menggunakan paku, namun mampu bertahan hingga ratusan tahun. Setiap bagian ruang memiliki fungsi masing-masing, mencerminkan penghargaan terhadap privasi, kebersihan, dan kerendahan hati.\n\nSumber:\n- INews: https://www.inews.id\n- RMOL Aceh: https://www.rmolaceh.id\n- Traveloka: https://www.traveloka.com"
            ],
            [
                'nama' => 'Tari Seudati',
                'deskripsi' => "Tari Seudati adalah tarian tradisional Aceh yang sarat dengan nilai-nilai Islami. Nama \"Seudati\" diyakini berasal dari kata \"syahadatin\" (persaksian), mencerminkan pengakuan terhadap Tuhan dan Rasulullah. Tarian ini berakar dari Tari Ratoh, kesenian masyarakat pesisir Aceh, dan telah menjadi bagian penting kehidupan masyarakat sejak zaman kerajaan Aceh pada abad ke-16.\n\nAwalnya, Seudati merupakan tari perang (Tribal War Dance) yang syairnya membangkitkan semangat pemuda Aceh untuk menegakkan ajaran Islam dan melawan penjajahan. Kini, tarian ini sering ditampilkan sebagai ungkapan syukur dan doa bersama.\n\nSumber:\n- RRI: https://rri.co.id\n- Kemendikdasmen: https://repositori.kemendikdasmen.go.id"
            ],
            [
                'nama' => 'Tari Likok Pulo',
                'deskripsi' => "Tari Likok Pulo adalah tarian tradisional dari Pulo Aceh, Aceh Besar, yang diciptakan sekitar tahun 1845 oleh seorang ulama Arab bernama Syech Ahmad Badrun. Tarian ini awalnya berfungsi sebagai media dakwah untuk menyempurnakan ajaran Islam di ujung utara Pulau Sumatera.\n\nGerakan tari Likok Pulo banyak dipengaruhi oleh kondisi geografis Pulo Aceh yang terdiri dari lautan luas, gelombang, angin, pepohonan, dan pegunungan. Tarian ini biasanya dibawakan oleh 12 penari laki-laki dan menjadi media pembelajaran ajaran agama yang efektif bagi masyarakat setempat.\n\nSumber:\n- RRI: https://rri.co.id\n- Wikipedia: https://id.wikipedia.org"
            ],
            [
                'nama' => 'Rencong',
                'deskripsi' => "Rencong adalah senjata tradisional khas Aceh yang berbentuk mirip huruf \"L\" atau kaligrafi Arab. Senjata ini memiliki makna filosofis yang mendalam, yaitu melambangkan \"Bismillah\" (Dengan menyebut nama Allah). Rencong bukan sekadar senjata, melainkan simbol keberanian, kehormatan, dan identitas masyarakat Aceh.\n\nPada masa perang Aceh melawan Belanda, rencong digunakan sebagai senjata utama para pejuang. Kini, rencong menjadi bagian dari busana adat dan benda pusaka yang diwariskan secara turun-temurun.\n\nSumber:\n- Wikipedia: https://id.wikipedia.org/wiki/Rencong"
            ],
            [
                'nama' => 'Kupiah Meukeutop',
                'deskripsi' => "Kupiah Meukeutop adalah kopiah tradisional Aceh yang memiliki bentuk khas dengan tiga tingkat melambangkan tiga alam: alam bawah, alam tengah, dan alam atas. Kupiah ini biasanya dikenakan oleh pria Aceh pada acara-acara adat dan keagamaan.\n\nDalam budaya Aceh, kupiah meukeutop bukan hanya penutup kepala, tetapi juga simbol identitas, kehormatan, dan kedewasaan seorang pria. Pemakaiannya sering dikaitkan dengan status sosial dan peran dalam masyarakat.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Kupiah+Meukeutop+Aceh"
            ],
            [
                'nama' => 'Peusijuek',
                'deskripsi' => "Peusijuek adalah tradisi adat Aceh berupa upacara penyucian diri atau pemberian restu menggunakan air, beras, dan daun dedingin. Tradisi ini dilakukan pada berbagai acara penting seperti pernikahan, kelahiran, pindah rumah, dan penyambutan tamu kehormatan.\n\nSecara filosofis, peusijuek melambangkan harapan agar seseorang selalu dilimpahi berkah, keselamatan, dan kesejukan hati. Prosesi ini sarat dengan nilai-nilai religius dan sosial yang mempererat hubungan kekeluargaan dan masyarakat.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Peusijuek+Aceh"
            ],
            [
                'nama' => 'Tari Ranup Lampuan',
                'deskripsi' => "Tari Ranup Lampuan adalah tarian penyambutan tamu khas Aceh yang menyuguhkan sirih dalam puan sebagai tanda kehormatan. Tarian ini diyakini telah ada sejak zaman Kesultanan Aceh pada abad ke-16, meskipun versi modernnya diciptakan oleh Yusrizar pada tahun 1959.\n\nTarian ini dibawakan oleh 7–8 penari wanita dan pria yang mengenakan busana adat Aceh, diiringi musik tradisional. Ranup Lampuan menjadi simbol keramahan dan pemuliaan tamu (pemulia jamee) dalam budaya masyarakat Aceh.\n\nSumber:\n- RRI: https://rri.co.id\n- Kemendikbud: https://repositori.kemendikbud.go.id"
            ],
            [
                'nama' => 'Serune Kalee',
                'deskripsi' => "Serune Kalee adalah alat musik tiup tradisional khas Aceh yang bentuknya menyerupai seruling dengan ujung melebar seperti corong. Alat musik ini terbuat dari kayu, kuningan, dan tembaga, dengan panjang sekitar 50 cm dan tujuh lubang nada.\n\nSerune Kalee biasanya dimainkan sebagai instrumen utama dalam pertunjukan musik tradisi dan mengiringi upacara perkawinan adat Aceh. Alat musik ini telah lama berkembang dan dihayati oleh masyarakat Aceh, terutama di daerah Pidie dan Aceh Utara.\n\nSumber:\n- RRI: https://rri.co.id\n- Pemerintah Aceh: https://www.acehprov.go.id"
            ],
            [
                'nama' => 'Sikin Panyang',
                'deskripsi' => "Sikin Panyang adalah pedang tradisional Aceh yang digunakan pada masa Perang Aceh melawan Belanda (1873–1900). Senjata ini memiliki bilah lurus dengan satu sisi tajam dan panjang sekitar 70–80 cm, sering dilengkapi dengan sarung dan dibawa dalam sabuk.\n\nPada tahun-tahun awal perang, banyak Sikin Panyang dibuat, terutama sebelum tahun 1879 ketika belum ada perlucutan senjata penduduk. Penyebarannya terbatas di Aceh dan Gayo, dan kini menjadi benda bersejarah yang dikoleksi museum.\n\nSumber:\n- Wikipedia: https://id.wikipedia.org/wiki/Sikin_panyang"
            ],

            // ==================== SUMATERA UTARA ====================
            [
                'nama' => 'Rumah Adat Bolon',
                'deskripsi' => "Rumah Adat Bolon adalah rumah adat suku Batak, khususnya Batak Simalungun dan Batak Toba, yang memiliki nilai sejarah dan filosofi mendalam. Rumah ini berfungsi sebagai pusat kegiatan adat dan sosial, bukan sekadar tempat tinggal. Dahulu, rumah Bolon ditinggali oleh para raja di Sumatera Utara, dengan sekitar 13 kerajaan yang silih berganti menempatinya.\n\nSalah satu rumah Bolon yang terkenal adalah Rumah Bolon Raja Sibandang yang berusia lebih dari 300 tahun dan warna catnya konon dicampur dengan darah manusia. Rumah ini menjadi simbol identitas masyarakat Batak di Sumatera Utara.\n\nSumber:\n- Kompas: https://lipsus.kompas.com\n- Garuda: https://garuda.kemdiktisaintek.go.id\n- MNC Trijaya: https://www.mnctrijaya.com"
            ],
            [
                'nama' => 'Rumah Siwaluh Jabu',
                'deskripsi' => "Rumah Siwaluh Jabu adalah rumah adat suku Batak Karo yang dihuni oleh delapan keluarga. Nama \"Siwaluh Jabu\" berarti \"delapan rumah\" dalam bahasa Karo. Rumah ini bukan sekadar tempat tinggal, melainkan simbol kearifan lokal yang menggambarkan hubungan harmonis antara manusia, alam, dan Sang Pencipta.\n\nSetiap elemen dalam Siwaluh Jabu mengandung makna filosofis yang mendalam. Masyarakat Karo percaya bahwa membangun rumah adat bukan hanya menciptakan tempat bagi roh-roh leluhur, tetapi juga mencerminkan hirarki sosial, nilai gotong royong, dan kosmologi kolektif. Bagian kolong rumah melambangkan dunia bawah, bagian utama melambangkan dunia tengah, dan atap melambangkan dunia langit.\n\nSumber:\n- RRI: https://rri.co.id\n- Museum Nasional: https://museumnasional.iheritage-virtual.id\n- Garuda: https://garuda.kemdiktisaintek.go.id"
            ],
            [
                'nama' => 'Tari Tor-Tor',
                'deskripsi' => "Tari Tor-Tor adalah tarian adat suku Batak Toba yang dianggap sakral. Tarian ini biasanya ditampilkan dalam upacara adat seperti pernikahan, kelahiran, dan kematian, diiringi oleh musik tradisional Batak yang disebut Gondang.\n\nDalam kepercayaan Batak, Tari Tor-Tor bukan sekadar hiburan, melainkan sarana komunikasi dengan leluhur dan roh-roh halus. Setiap gerakan memiliki makna dan penghormatan tersendiri bagi para tetua adat. Tarian ini mencerminkan nilai-nilai kebersamaan, penghormatan, dan koneksi spiritual masyarakat Batak.\n\nSumber:\n- Wikipedia: https://id.wikipedia.org/wiki/Tortor\n- Indonesia Kaya: https://indonesiakaya.com"
            ],
            [
                'nama' => 'Tari Serampang Dua Belas',
                'deskripsi' => "Tari Serampang Dua Belas adalah tarian tradisional khas Melayu Deli dari Kabupaten Serdang Bedagai, Sumatera Utara. Tarian ini menceritakan perjalanan cinta sepasang kekasih dari awal pertemuan hingga jenjang pernikahan melalui 12 tahapan gerakan yang berurutan.\n\nTarian ini diciptakan oleh Guru Sauti dan mulai disempurnakan pada tahun 1949. Angka dua belas merujuk pada ragam gerakan tari yang masing-masing memiliki arti tersendiri, menggambarkan proses pencarian jodoh dalam budaya Melayu. Tarian ini menjadi tari pergaulan yang mengandung pesan tentang kisah anak muda dalam mencari pasangan hidup.\n\nSumber:\n- RRI: https://rri.co.id\n- Kemendikbud: https://slims.kemdikbud.go.id"
            ],
            [
                'nama' => 'Ulos',
                'deskripsi' => "Ulos adalah kain tenun tradisional khas suku Batak yang memiliki nilai sakral dan makna filosofis yang sangat tinggi. Kain ini bukan hanya digunakan sebagai pakaian, tetapi juga menjadi simbol restu, kasih sayang, dan perlindungan.\n\nProses pembuatan Ulos sangat rumit dan memakan waktu berbulan-bulan, melibatkan teknik tenun tradisional yang diwariskan dari generasi ke generasi. Terdapat berbagai jenis Ulos dengan motif dan warna berbeda, masing-masing digunakan untuk acara adat tertentu seperti pernikahan atau duka cita.\n\nSumber:\n- Wikipedia: https://id.wikipedia.org/wiki/Ulos\n- Indonesia Travel: https://indonesia.travel"
            ],
            [
                'nama' => 'Piso Surit',
                'deskripsi' => "Piso Surit adalah senjata tradisional khas suku Batak Karo di Sumatera Utara yang dominan digunakan oleh penduduk dataran tinggi Karo. Pisau ini memiliki bentuk panjang dengan gagang bercabang dua dan umumnya digunakan untuk melawan kolonial Belanda pada masa penjajahan.\n\nSelain sebagai senjata, Piso Surit juga menjadi inspirasi bagi lagu daerah berjudul sama yang diciptakan oleh komponis Djaga Sembiring Depari sekitar tahun 1960. Lagu dan tarian Piso Surit sering ditampilkan untuk menyambut tamu kehormatan, melambangkan keberanian dan kehormatan masyarakat Karo.\n\nSumber:\n- Wikipedia: https://id.m.wikipedia.org/wiki/Piso_Surit_(senjata)\n- Kompas: https://www.kompas.com\n- Indonesia Kaya: https://indonesiakaya.com"
            ],
            [
                'nama' => 'Gondang',
                'deskripsi' => "Gondang adalah ansambel musik tradisional Batak yang terdiri dari berbagai instrumen seperti gendang, gong, dan serunai. Musik ini memiliki peran penting dalam upacara adat Batak, terutama sebagai pengiring Tari Tortor dan sarana komunikasi dengan leluhur.\n\nDalam kepercayaan masyarakat Batak, Gondang dianggap sakral dan hanya dimainkan pada acara-acara tertentu. Irama Gondang yang khas mampu membangkitkan semangat dan emosi, menciptakan suasana yang khidmat dan penuh makna spiritual.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Gondang+Batak"
            ],
            [
                'nama' => 'Omo Sebua',
                'deskripsi' => "Omo Sebua adalah rumah adat besar suku Nias yang dihuni oleh raja beserta keluarga dan keturunannya. Rumah ini didesain khusus untuk melindungi penghuninya dari serangan pada saat perang suku pada zaman dahulu, dan diketahui tahan terhadap guncangan gempa bumi.\n\nDahulu, setiap desa di Nias Selatan memiliki satu Omo Sebua. Kini, hanya empat Omo Sebua yang masih berdiri, salah satunya di Desa Hilinawalö Mazinö. Rumah ini memiliki ukuran sekitar 300 m² dengan tinggi mencapai 22 meter, menjadikannya salah satu warisan budaya materi yang penting di Sumatera Utara.\n\nSumber:\n- Wikipedia: https://id.wikipedia.org/wiki/Omo_Sebua\n- Detik: https://www.detik.com\n- Garuda: https://garuda.kemdiktisaintek.go.id"
            ],
            [
                'nama' => 'Tari Maena',
                'deskripsi' => "Tari Maena adalah tarian komunal tradisional suku Nias yang berakar kuat dalam budaya masyarakat Nias, Sumatera Utara. Tarian ini bukan sekadar serangkaian gerakan, melainkan ekspresi kebersamaan dan kegembiraan yang dilakukan secara turun-temurun.\n\nTari Maena memiliki gerakan yang sederhana dengan empat posisi gerakan yang mudah dipelajari, sehingga hampir semua orang Nias mampu melakukannya. Tarian ini mengandung nilai-nilai filosofis berupa kebersamaan, persatuan dalam gerak dan syair, relasi sosial yang harmonis, serta sukacita kolektif.\n\nSumber:\n- RRI: https://rri.co.id\n- Garuda: https://garuda.kemdiktisaintek.go.id"
            ],
            [
                'nama' => 'Gordang Sambilan',
                'deskripsi' => "Gordang Sambilan adalah alat musik tradisional milik suku Mandailing Natal, Sumatera Utara. Sesuai namanya, alat musik ini terdiri dari sembilan gendang dengan ukuran dan nada yang berbeda-beda, menghasilkan perpaduan bunyi yang khas dan kuat.\n\nGordang Sambilan dibuat dari kayu yang dibentuk menjadi tabung resonansi, kemudian salah satu sisinya ditutup menggunakan kulit sapi. Pada masa lalu, alat musik ini digunakan dalam upacara-upacara sakral seperti Paturuan Sibaso untuk memanggil roh nenek moyang, dan diyakini sebagai alat musik milik raja-raja Mandailing secara turun-temurun.\n\nSumber:\n- RRI: https://rri.co.id\n- Kemendikdasmen: https://repositori.kemendikdasmen.go.id"
            ],
            [
                'nama' => 'Piso Tumbuk Lada',
                'deskripsi' => "Piso Tumbuk Lada adalah senjata tradisional khas suku Karo dan Melayu Sumatera Timur yang secara sejarahnya berasal dari masa Kerajaan Aru. Pisau ini berbentuk kecil dan umumnya terbuat dari logam kuningan yang bersifat racun, digunakan untuk pertarungan jarak dekat.\n\nDalam tradisi Karo, Piso Tumbuk Lada melambangkan nilai tanggung jawab, pelaksanaan tugas sesuai sistem kekerabatan, dan nilai pembelaan diri. Bahan besinya terdiri dari lima negeri (Kerajaan) yang dilebur menjadi satu, kemudian ditempa menjadi pisau. Kini, senjata ini banyak digunakan sebagai barang hiasan dan benda pusaka.\n\nSumber:\n- Wikipedia: https://id.m.wikipedia.org/wiki/Tumbuk_Lada\n- Tribun Medan: https://medan.tribunnews.com"
            ],

            // ==================== SUMATERA BARAT ====================
            [
                'nama' => 'Rumah Gadang',
                'deskripsi' => "Rumah Gadang adalah rumah adat tradisional masyarakat Minangkabau di Sumatera Barat. Arsitekturnya sangat unik dengan atap melengkung menyerupai tanduk kerbau (gonjong) dan bangunan yang didirikan di atas tiang kayu. Rumah ini bukan sekadar tempat tinggal, melainkan pusat kehidupan sosial dan adat keluarga matrilineal Minangkabau.\n\nSetiap ukiran dan ornamen pada dindingnya memiliki makna filosofis mendalam tentang alam dan kehidupan. Rumah Gadang juga menjadi simbol identitas, kebersamaan, dan kehormatan bagi kaum perempuan Minangkabau.\n\nSumber:\n- Wikipedia: https://id.wikipedia.org/wiki/Rumah_Gadang\n- Indonesia Kaya: https://indonesiakaya.com"
            ],
            [
                'nama' => 'Tari Piring',
                'deskripsi' => "Tari Piring adalah seni tari tradisional Minangkabau yang sangat populer. Para penari membawa piring di telapak tangan mereka dan menari dengan gerakan yang lincah, cepat, dan penuh energi, seringkali diiringi musik talempong dan saluang.\n\nTari ini awalnya merupakan bagian dari upacara adat untuk memohon keselamatan dan hasil panen yang melimpah kepada para dewa. Seiring waktu, Tari Piring bertransformasi menjadi pertunjukan seni yang memukau wisatawan dengan atraksi menabrakkan piring tanpa melukai tangan penarinya.\n\nSumber:\n- Wikipedia: https://id.wikipedia.org/wiki/Tari_Piring\n- Kemendikbud: https://kebudayaan.kemdikbud.go.id"
            ],
            [
                'nama' => 'Tari Payung',
                'deskripsi' => "Tari Payung adalah tarian tradisional Minangkabau yang melambangkan kasih sayang dan perlindungan. Para penari, biasanya berpasangan, menari dengan payung sebagai properti utama, menggambarkan seorang pria yang melindungi kekasihnya.\n\nTarian ini sering ditampilkan dalam acara pernikahan dan penyambutan tamu. Gerakannya yang lembut dan gemulai mencerminkan keanggunan budaya Minangkabau serta nilai-nilai cinta dan kesetiaan.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Tari+Payung+Minangkabau"
            ],
            [
                'nama' => 'Tari Indang',
                'deskripsi' => "Tari Indang adalah tarian tradisional Minangkabau yang bernuansa Islami, sering disebut juga sebagai Tari Dindin Badindin. Tarian ini biasanya dibawakan oleh sekelompok pria dengan gerakan duduk dan berdiri sambil menepuk rebana, diiringi syair-syair pujian kepada Nabi Muhammad SAW.\n\nTari Indang berkembang sebagai media dakwah Islam di Sumatera Barat. Gerakannya yang dinamis dan kompak mencerminkan kebersamaan serta semangat keagamaan masyarakat Minangkabau.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Tari+Indang+Minangkabau"
            ],
            [
                'nama' => 'Saluang',
                'deskripsi' => "Saluang adalah alat musik tiup tradisional khas Minangkabau yang terbuat dari bambu. Alat musik ini memiliki suara yang khas dan sering dimainkan dalam berbagai acara adat, terutama untuk mengiringi nyanyian dendang dan pertunjukan seni tradisional.\n\nSaluang biasanya dimainkan secara solo atau bersama alat musik lain seperti talempong dan rabab. Keunikan Saluang terletak pada teknik memainkannya yang membutuhkan pernapasan khusus, menciptakan melodi yang merdu dan penuh perasaan.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Saluang+Minangkabau"
            ],
            [
                'nama' => 'Karih',
                'deskripsi' => "Karih adalah senjata tradisional khas Minangkabau yang berbentuk keris dengan bilah berlekuk. Senjata ini memiliki nilai filosofis yang tinggi dalam budaya Minangkabau, melambangkan keberanian, keadilan, dan kearifan.\n\nKarih sering digunakan dalam pertunjukan pencak silat dan menjadi bagian dari busana adat pria Minangkabau. Senjata ini juga dianggap sebagai benda pusaka yang diwariskan secara turun-temurun dan memiliki nilai spiritual bagi pemiliknya.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Karih+Minangkabau"
            ],
            [
                'nama' => 'Songket Pandai Sikek',
                'deskripsi' => "Songket Pandai Sikek adalah kain tenun tradisional khas Minangkabau yang berasal dari Nagari Pandai Sikek, Kabupaten Tanah Datar, Sumatera Barat. Kain ini dikenal dengan motif dan warna yang khas, serta proses pembuatannya yang rumit dan memakan waktu.\n\nSongket Pandai Sikek memiliki nilai budaya dan ekonomi yang tinggi, sering digunakan dalam acara adat seperti pernikahan dan upacara tradisional. Kain ini menjadi simbol kebanggaan dan identitas masyarakat Minangkabau.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Songket+Pandai+Sikek"
            ],
            [
                'nama' => 'Tari Randai',
                'deskripsi' => "Randai adalah seni pertunjukan tradisional Minangkabau yang menggabungkan tradisi bakaba (bercerita), dendang (nyanyian), dan silek (silat). Randai diperkirakan telah berkembang sejak awal abad ke-20 dan tumbuh dari perguruan silat di Sumatera Barat.\n\nDalam pertunjukannya, para pemain membentuk lingkaran sambil menari dan menyanyikan cerita rakyat. Randai berfungsi sebagai media penyampaian pesan moral dan hiburan bagi masyarakat Minangkabau, serta menjadi sarana komunikasi penting pada masa lalu.\n\nSumber:\n- RRI: https://rri.co.id\n- Kemendikdasmen: https://devdapobas.kemendikdasmen.go.id"
            ],
            [
                'nama' => 'Talempong',
                'deskripsi' => "Talempong adalah alat musik pukul tradisional Minangkabau yang terbuat dari perunggu atau kuningan. Alat musik ini terdiri dari beberapa buah talempong dengan nada berbeda yang disusun berderet, dan dimainkan dengan cara dipukul menggunakan pemukul kayu.\n\nTalempong diperkirakan telah ada sejak zaman megalitikum dan merupakan salah satu warisan budaya takbenda Minangkabau yang penting. Alat musik ini sering dimainkan dalam berbagai acara adat, pertunjukan seni, dan festival budaya.\n\nSumber:\n- RRI: https://rri.co.id\n- Kompas: https://www.kompas.com"
            ],
            [
                'nama' => 'Rabab',
                'deskripsi' => "Rabab adalah alat musik gesek tradisional khas Minangkabau yang terbuat dari tempurung kelapa. Bentuknya menyerupai biola, dimainkan dengan cara digesek menggunakan busur, dan biasanya memiliki dua hingga tiga senar.\n\nRabab sering digunakan untuk mengiringi nyanyian kaba (cerita rakyat) dan pertunjukan seni tradisional Minangkabau. Alat musik ini memiliki peran penting dalam melestarikan tradisi lisan dan sastra Minangkabau.\n\nSumber:\n- RRI: https://rri.co.id\n- Wikipedia: https://id.m.wikipedia.org/wiki/Rabab"
            ],
            [
                'nama' => 'Kerambit',
                'deskripsi' => "Kerambit adalah pisau genggam kecil berbentuk melengkung yang berasal dari Minangkabau, Sumatera Barat. Senjata ini diperkirakan telah ada sejak abad ke-11 dan bentuknya terinspirasi dari cakar harimau Sumatra (Harimau Campo).\n\nAwalnya, kerambit digunakan sebagai alat pertanian untuk memotong akar dan membersihkan batang, sebelum akhirnya menjadi senjata dalam seni bela diri pencak silat. Dalam budaya Minangkabau, kerambit erat kaitannya dengan falsafah \"Alam takambang jadi guru\", dan kini telah mendunia sebagai salah satu senjata tradisional Indonesia yang ikonik.\n\nSumber:\n- RRI: https://rri.co.id\n- Tempo: https://www.tempo.co\n- Wikipedia: https://id.wikipedia.org/wiki/Kerambit"
            ],

            // ==================== RIAU & KEPULAUAN RIAU ====================
            [
                'nama' => 'Rumah Selaso Jatuh Kembar',
                'deskripsi' => "Rumah Selaso Jatuh Kembar adalah rumah adat khas Provinsi Riau yang berbentuk balai pertemuan adat. Rumah ini tidak difungsikan sebagai tempat tinggal pribadi, melainkan sebagai tempat musyawarah, penobatan kepala adat, dan berbagai upacara adat lokal.\n\nArsitektur rumah ini mengarah ke sungai, mengingat sungai menjadi sarana transportasi penting bagi masyarakat tradisional Riau. Bangunan ini berbentuk panggung dengan tinggi sekitar 1–2,5 meter dan biasanya berjumlah genap. Kini, fungsi balai adat ini banyak yang telah digantikan oleh masjid.\n\nSumber:\n- Wikipedia: https://id.wikipedia.org/wiki/Rumah_adat_Selaso_Jatuh_Kembar\n- Kompas: https://www.kompas.com"
            ],
            [
                'nama' => 'Tari Zapin',
                'deskripsi' => "Tari Zapin adalah tarian tradisional Melayu Riau yang berasal dari pengaruh budaya Timur Tengah, khususnya Arab, yang masuk ke wilayah Melayu melalui jalur perdagangan dan penyebaran agama Islam sekitar abad ke-16. Kata \"zapin\" berasal dari bahasa Arab \"zafn\" yang berarti gerakan kaki cepat.\n\nGerakan Tari Zapin dikenal anggun, sopan, dan penuh makna, mencerminkan nilai kesantunan, kebersamaan, serta unsur budaya Islam yang berpadu harmonis dengan tradisi Melayu. Tarian ini menjadi simbol kelembutan dan kesopanan masyarakat Melayu Riau.\n\nSumber:\n- RRI: https://rri.co.id\n- Antara: https://www.antaranews.com"
            ],
            [
                'nama' => 'Tari Makan Sirih',
                'deskripsi' => "Tari Makan Sirih adalah tarian penyambutan tamu dalam budaya Melayu Riau yang mengejawantahkan tradisi menyuguhkan sirih kepada tamu sebagai bentuk penghormatan. Tradisi ini telah berlangsung sejak zaman Kesultanan Melayu, dan pada pertengahan abad ke-20 diwujudkan dalam bentuk tarian.\n\nTarian ini diciptakan pada tahun 1957 oleh Datuk O.K. Nizami Jamil bersama Alm. Johan Syarifuddin, dan pertama kali ditampilkan pada upacara penyambutan Kongres Pemuda. Kini, Tari Makan Sirih menjadi tari persembahan resmi dalam berbagai acara adat dan kenegaraan di Riau.\n\nSumber:\n- RRI: https://rri.co.id\n- Kompas: https://www.kompas.com\n- Detik: https://www.detik.com"
            ],
            [
                'nama' => 'Gambus',
                'deskripsi' => "Gambus adalah alat musik petik tradisional Melayu Riau yang berasal dari pengaruh budaya Timur Tengah. Alat musik ini masuk ke Nusantara bersamaan dengan penyebaran agama Islam dan kemudian beradaptasi dengan budaya lokal, terutama di wilayah pesisir Riau seperti Pulau Bengkalis dan Pulau Penyengat.\n\nPada masa awal, gambus dimainkan secara tunggal untuk mengiringi lagu-lagu yang dinyanyikan sendiri oleh pemainnya. Di Riau, terdapat varian gambus selodang yang digunakan untuk mengiringi Tari Zapin. Alat musik ini menjadi bagian penting dari warisan musik Melayu yang tetap bergema hingga kini.\n\nSumber:\n- RRI: https://rri.co.id\n- Wikipedia: https://id.m.wikipedia.org/wiki/Gambus"
            ],
            [
                'nama' => 'Calempong',
                'deskripsi' => "Calempong adalah musik tradisional masyarakat Melayu Riau yang berkembang di Kabupaten Kuantan Singingi (Kuansing) dan Kampar. Alat musik ini terbuat dari logam yang disusun berderet dan dimainkan secara berkelompok, menghasilkan irama khas yang sering dimainkan dalam berbagai kegiatan adat.\n\nDalam ansambel Calempong, terdapat beberapa instrumen seperti Calempong (Talempong) sebagai instrumen utama, Gondang (Gendang) sebagai pengatur ritme, Oguang (Gong) yang menghasilkan bunyi penanda, dan Barabano (Rebana) yang menambah semarak. Musik ini menjadi identitas budaya lokal dan sering ditampilkan dalam acara Pacu Jalur dan perayaan hari besar.\n\nSumber:\n- RRI: https://rri.co.id\n- Garuda: https://garuda.kemdikbud.go.id"
            ],
            [
                'nama' => 'Tenun Siak',
                'deskripsi' => "Tenun Siak adalah kain tenun tradisional Melayu Riau yang mulai berkembang pada masa pemerintahan Sultan Sayid Ali sekitar tahun 1864. Keterampilan menenun diperkenalkan oleh Wan Siti binti Wan Karim, seorang penenun yang didatangkan dari Terengganu, Malaysia.\n\nPada awalnya, kain ini hanya dipakai oleh lingkungan Kerajaan Siak Sri Indrapura. Seiring perkembangan zaman, tenun Siak mulai keluar dari wilayah kerajaan dan masyarakat banyak yang belajar menenun. Tenun Siak telah masuk dalam Warisan Budaya Takbenda Indonesia dan menjadi kebanggaan masyarakat Riau.\n\nSumber:\n- RRI: https://rri.co.id\n- Kemenpar: https://jadesta.kemenpar.go.id"
            ],
            [
                'nama' => 'Tari Cindai',
                'deskripsi' => "Tari Cindai adalah salah satu tarian Melayu modern yang diiringi oleh lagu Cindai yang dipopulerkan oleh Siti Nurhaliza. Tarian ini terinspirasi dari kain cindai, sejenis tekstil warisan masyarakat Melayu yang memiliki nilai sejarah dan budaya yang tinggi.\n\nKain cindai menjadi unsur penting dalam adat dan budaya Melayu, baik dalam majlis perayaan, pakaian penari, maupun sebagai hadiah hantaran utama di Riau. Tari Cindai menggabungkan gerakan tari Melayu klasik dengan sentuhan modern, menciptakan pertunjukan yang indah dan memukau.\n\nSumber:\n- InfoPublik: https://infopublik.id\n- Khalifah Gayong: https://khalifahgayong.wordpress.com"
            ],
            [
                'nama' => 'Rumah Panggung Melayu',
                'deskripsi' => "Rumah Panggung Melayu adalah rumah tradisional masyarakat Melayu Riau yang berbentuk panggung, dibangun di atas tiang kayu dengan ketinggian tertentu. Rumah ini dirancang untuk menghindari serangan binatang buas dan bahaya banjir yang bisa datang kapan saja.\n\nSalah satu variannya adalah Rumah Lontiok dari Kampar yang atapnya melengkung ke atas menyerupai haluan perahu, sebagai simbol penghormatan kepada Yang Maha Kuasa. Rumah panggung Melayu mencerminkan kearifan lokal masyarakat dalam beradaptasi dengan lingkungan alam Riau yang memiliki banyak sungai.\n\nSumber:\n- RRI: https://rri.co.id\n- Kompas: https://www.kompas.com"
            ],
            [
                'nama' => 'Tari Melemang',
                'deskripsi' => "Tari Melemang adalah tarian tradisional dari Desa Penaga, Kecamatan Teluk Bintan, Kepulauan Riau. Tarian ini telah ada sejak abad ke-12 pada masa Kerajaan Melayu di Bintan yang dipimpin Ratu Mayang Mengurai, dan awalnya difungsikan untuk upacara-upacara kerajaan serta bagian dari penobatan raja.\n\nPada masa kerajaan, tari Melemang hanya dipentaskan di dalam istana sebagai hiburan rutin bagi raja dan keluarganya. Tarian ini dibawakan oleh penari putri dan menjadi simbol keagungan serta kejayaan kerajaan Melayu Bintan.\n\nSumber:\n- Journal ISI: https://journal.isi.ac.id\n- Repository UIR: https://repository.uir.ac.id"
            ],
            [
                'nama' => 'Tari Lenggang',
                'deskripsi' => "Tari Lenggang adalah tarian tradisional Melayu Kepulauan Riau yang menggambarkan kelembutan dan keanggunan perempuan Melayu. Tarian ini biasanya dibawakan oleh penari wanita dengan gerakan yang lembut dan penuh pesona, mencerminkan sikap sopan santun dan keramahan masyarakat Melayu.\n\nTari Lenggang sering ditampilkan dalam acara-acara adat, penyambutan tamu, dan festival budaya. Tarian ini menjadi bagian dari kekayaan seni pertunjukan Melayu yang diwariskan secara turun-temurun di Kepulauan Riau.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Tari+Lenggang+Kepulauan+Riau"
            ],
            [
                'nama' => 'Baju Kurung Melayu',
                'deskripsi' => "Baju Kurung Melayu adalah pakaian adat tradisional perempuan Melayu yang telah ada sejak zaman kerajaan-kerajaan Melayu, termasuk Kerajaan Siak Sri Indrapura. Pada masa kerajaan, baju kurung labuh dikenakan oleh istri raja dan anggota keluarga kerajaan.\n\nBaju kurung Melayu memiliki potongan longgar dan panjang, melambangkan kesopanan dan keanggunan perempuan Melayu. Hingga kini, baju kurung tetap menjadi pakaian adat yang dikenakan dalam upacara pernikahan dan acara-acara resmi di Riau dan Kepulauan Riau.\n\nSumber:\n- Antara: https://www.antaranews.com\n- RRI: https://rri.co.id"
            ],
            [
                'nama' => 'Rumah Lontiok',
                'deskripsi' => "Rumah Lontiok adalah rumah adat khas Melayu Kampar, Riau, yang berbentuk rumah panggung dengan atap melengkung ke atas menyerupai haluan perahu tradisional. Nama \"Lontiok\" berasal dari dialek Kampar yang berarti lentik, merujuk pada bentuk atapnya.\n\nRumah ini diperkirakan telah ada sejak ratusan tahun lalu, seiring berkembangnya peradaban masyarakat Melayu di Kampar. Bentuk atapnya yang melengkung ke atas merupakan simbol penghormatan kepada Yang Maha Kuasa dan mencerminkan hubungan erat masyarakat Kampar dengan sungai dan lingkungan tempat tinggalnya.\n\nSumber:\n- RRI: https://rri.co.id\n- Disparbud Kampar: https://disparbud.kamparkab.go.id\n- Indonesia Travel: https://www.indonesia.travel"
            ],
            [
                'nama' => 'Tari Persembahan',
                'deskripsi' => "Tari Persembahan adalah tari penyambutan tamu agung dalam budaya Melayu Riau. Tarian ini berawal dari Tari Makan Sirih yang digarap oleh Datuk O.K. Nizami Jamil bersama Alm. Johan Syarifuddin pada tahun 1957 dan pertama kali ditampilkan pada upacara penyambutan Kongres Pemuda.\n\nTari Persembahan merupakan simbol penghormatan dan keramahtamahan masyarakat Riau terhadap tamu yang datang. Tarian ini sering dipentaskan dalam acara-acara resmi kenegaraan dan menjadi salah satu ikon budaya Melayu Riau.\n\nSumber:\n- RRI: https://rri.co.id\n- Kompas: https://www.kompas.com"
            ],
            [
                'nama' => 'Kompang',
                'deskripsi' => "Kompang adalah alat musik perkusi tradisional Melayu Riau yang berasal dari pengaruh budaya Timur Tengah. Alat musik ini dipercaya masuk ke Nusantara bersamaan dengan penyebaran agama Islam, dibawa oleh para pedagang dan ulama Arab sekitar abad ke-13.\n\nKompang terbuat dari kayu dan kulit kambing, dimainkan dengan cara dipukul. Di Riau, kesenian kompang masih berfungsi dan diwariskan melalui grup-grup musik kompang tradisional, terutama di daerah Bengkalis. Musik kompang sering ditampilkan dalam bentuk nyanyian yang bernafaskan Islam.\n\nSumber:\n- RRI: https://rri.co.id\n- Mediaindonesia: https://mediaindonesia.com"
            ],
            [
                'nama' => 'Baju Melayu Riau',
                'deskripsi' => "Baju Melayu Riau adalah pakaian adat tradisional pria Melayu Riau yang terdiri dari baju lengan panjang, celana panjang, dan kain samping. Salah satu gaya yang paling dikenal adalah Teluk Belanga, yang diyakini dirancang oleh para pembantu Sultan Abu Bakar dari Johor, Malaysia.\n\nCatatan Tiongkok menunjukkan bahwa pada abad ke-13, masyarakat Melayu mulai mengenakan penutup tubuh bagian bawah. Seiring waktu, baju Melayu Riau berkembang menjadi pakaian adat yang anggun dan penuh makna, dikenakan dalam berbagai upacara adat dan acara resmi.\n\nSumber:\n- Antara: https://www.antaranews.com\n- RRI: https://rri.co.id"
            ],
            [
                'nama' => 'Tari Tandak',
                'deskripsi' => "Tari Tandak adalah tarian tradisional Melayu Riau yang berfungsi sebagai media silaturahmi antara pemuda dan pemudi. Tarian ini biasanya ditampilkan pada malam hari, dengan para peserta membentuk lingkaran sambil berpegangan pundak dan menari bersama.\n\nTujuan utama Tari Tandak adalah untuk mempertemukan pemuda dan pemudi dari kampung yang berbeda, menjalin ikatan persahabatan, dan menjadi simbol persatuan masyarakat Riau. Tarian ini diperkirakan telah ada sejak abad ke-16 dan masih dilestarikan hingga kini.\n\nSumber:\n- Kompas: https://www.kompas.com\n- Kemendikbud: https://repositori.kemdikbud.go.id"
            ],
            [
                'nama' => 'Gendang Nobat',
                'deskripsi' => "Gendang Nobat adalah ansambel musik kerajaan Melayu yang telah ada sejak abad ke-15. Gendang Nobat berfungsi sebagai simbol kedaulatan raja dan hanya dimainkan pada acara-acara penting kerajaan, seperti pertabalan sultan.\n\nDi Kerajaan Lingga-Riau, komposisi peralatan musik nobat terdiri dari gendang Nekara dan Gendang Panjang. Musik Nobat melambangkan keagungan dan kebesaran kerajaan Melayu, serta menjadi warisan budaya yang dijaga hingga kini.\n\nSumber:\n- Disbud Kepri: https://disbud.kepriprov.go.id\n- Oxford Academic: https://academic.oup.com"
            ],
            [
                'nama' => 'Baju Kebaya Labuh',
                'deskripsi' => "Kebaya Labuh adalah pakaian adat tradisional perempuan Melayu Kepulauan Riau yang telah menjadi bagian dari budaya Melayu sejak zaman Kerajaan Lingga-Riau. Dahulu, kebaya labuh lebih banyak dikenakan oleh perempuan bangsawan dan kalangan elit kerajaan.\n\nKebaya labuh memiliki potongan panjang dan longgar, melambangkan keanggunan dan kesopanan perempuan Melayu. Pada masa lalu, bahan untuk kebaya labuh menggunakan kain tenun tangan, namun kini dapat menggunakan kain yang lebih ringan seperti sutra. Pakaian ini sering dikenakan dalam upacara adat dan acara resmi.\n\nSumber:\n- RRI: https://rri.co.id\n- Wikipedia: https://id.wikipedia.org/wiki/Kebaya_Labuh_dan_Teluk_Balangga\n- Kompas: https://lifestyle.kompas.com"
            ],

            // ==================== JAMBI ====================
            [
                'nama' => 'Rumah Panggung Kajang Leko',
                'deskripsi' => "Rumah Panggung Kajang Leko adalah rumah adat Jambi yang ditetapkan sebagai identitas Jambi pada periode 1970-an. Penetapan ini bermula dari sayembara yang dilakukan Gubernur Jambi saat itu. Rumah Kajang Leko berasal dari arsitektur masyarakat bermarga Bathin dan berbentuk panggung persegi panjang berukuran 12 x 9 meter dengan 30 tiang.\n\nSecara historis, rumah ini telah melalui evolusi seiring perubahan periode, namun tetap menjaga struktur dan makna filosofisnya. Nilai historisnya mencerminkan cara manusia beradaptasi dengan lingkungan dan kondisi geografis Jambi, terutama untuk melindungi penghuninya dari banjir dan serangan hewan buas.\n\nSumber:\n- Kompas: https://regional.kompas.com\n- Detik: https://www.detik.com\n- RRI: https://rri.co.id"
            ],
            [
                'nama' => 'Tari Sekapur Sirih',
                'deskripsi' => "Tari Sekapur Sirih adalah tarian penyambutan tamu agung khas Jambi yang diciptakan oleh Firdaus Chatab pada tahun 1962. Tarian ini melambangkan keterbukaan dan keramahan masyarakat Jambi terhadap tamu yang datang.\n\nPada tahun 1967, tarian ini ditata ulang oleh OK Hendrik BBA dan difungsikan sebagai tarian selamat datang untuk menyambut para tamu terhormat, seperti presiden dan menteri, yang berkunjung ke Jambi. Tari Sekapur Sirih menjadi salah satu ikon budaya Provinsi Jambi.\n\nSumber:\n- RRI: https://rri.co.id\n- Wikipedia: https://id.wikipedia.org/wiki/Tari_Sekapur_Sirih"
            ],
            [
                'nama' => 'Tari Selaras Pinang Masak',
                'deskripsi' => "Tari Selaras Pinang Masak adalah tarian khas Melayu Jambi yang namanya diambil dari nama legendaris Puteri Selaras Pinang Masak, yang konon memerintah Jambi pada zaman dahulu kala. Tarian ini menggambarkan sosok putri penguasa Jambi yang anggun dan berwibawa.\n\nTarian ini merupakan perpaduan antara silat, aerobik, dan kungfu, mencerminkan kekayaan budaya Jambi yang dipengaruhi berbagai tradisi. Tari Selaras Pinang Masak sering ditampilkan dalam festival budaya dan acara-acara adat di Jambi.\n\nSumber:\n- Budaya Indonesia: https://budaya-indonesia.org\n- Jurnal ISBI: https://jurnal.isbi.ac.id"
            ],
            [
                'nama' => 'Angso Duo',
                'deskripsi' => "Angso Duo adalah motif batik khas Jambi yang terkait erat dengan legenda berdirinya Kota Jambi. Kisahnya mengisahkan Puteri Mayang Mangurai dan Orang Kayo Hitam yang mengikuti sepasang angsa menyusuri Sungai Batanghari untuk mencari tempat tinggal, hingga akhirnya menemukan kawasan yang kemudian dikenal sebagai \"Tanah Pilih\".\n\nMotif sepasang angsa ini telah ada sejak abad ke-14 dan menjadi salah satu motif batik paling populer di Jambi. Angso Duo melambangkan petunjuk, harapan, dan sejarah berdirinya peradaban Jambi.\n\nSumber:\n- RRI: https://rri.co.id\n- iWareBatik: https://www.iwarebatik.org"
            ],
            [
                'nama' => 'Batik Jambi',
                'deskripsi' => "Batik Jambi adalah warisan budaya Melayu Jambi yang mulai berkembang pada abad ke-19 melalui jaringan perdagangan Melayu, Tionghoa, dan Arab. Tradisi membatik di Jambi pertama kali diperkenalkan oleh Haji Muhibat pada tahun 1875.\n\nMotif Batik Jambi terinspirasi dari budaya Melayu, tumbuhan, hewan, dan lingkungan sekitar. Beberapa motif yang terkenal antara lain Angso Duo, Durian Pecah, Kapal Sanggat, Tampuk Manggis, dan Bungo Keladi. Pada masa lalu, penggunaan Batik Jambi merupakan hak eksklusif kalangan keluarga istana atau bangsawan.\n\nSumber:\n- RRI: https://rri.co.id\n- Wikipedia: https://id.wikipedia.org/wiki/Batik_Jambi\n- Kemenperin: https://kemenperin.go.id"
            ],
            [
                'nama' => 'Tari Rangguk',
                'deskripsi' => "Tari Rangguk adalah tarian tradisional dari Kabupaten Kerinci, Jambi, yang diciptakan oleh seorang ulama setempat setelah pulang menunaikan ibadah haji. Awalnya, tari ini digunakan untuk berdakwah menyebarkan agama Islam dan hanya dilakukan oleh kaum pria pada sore hari di depan rumah.\n\nKata \"Rangguk\" berarti mengangguk, dan gerakan mengangguk-angguk dalam tarian ini merupakan simbol ucapan selamat datang. Sejak tahun 1950-an, tari Rangguk mulai dipentaskan oleh kaum wanita dan sering ditampilkan dalam acara Kenduri Sko, penyambutan tamu kehormatan, serta berbagai kegiatan budaya.\n\nSumber:\n- Kompas: https://www.kompas.com\n- Wikipedia: https://id.wikipedia.org/wiki/Rangguk_Kumun"
            ],
            [
                'nama' => 'Serunai Jambi',
                'deskripsi' => "Serunai Jambi adalah alat musik tiup tradisional yang terbuat dari bambu atau kayu, mirip dengan seruling. Alat musik ini memiliki nada yang lembut dan sering digunakan dalam musik tradisional Jambi untuk mengiringi acara adat, upacara, dan pertunjukan seni.\n\nDi Jambi, terdapat juga alat musik serupa yang disebut Puput Kayu, sejenis serunai yang dilengkapi lidah-lidah sebagai alat bantu tiup dengan tujuh lubang nada. Serunai diperkirakan berasal dari budaya Arab dan Gujarat yang dibawa melalui jalur perdagangan di masa silam.\n\nSumber:\n- Harian Haluan: https://www.harianhaluan.com\n- Prezi: https://prezi.com"
            ],
            [
                'nama' => 'Keris Siginjai',
                'deskripsi' => "Keris Siginjai adalah pusaka sakral Kerajaan Jambi yang menjadi tanda pangkat kerajaan. Barang siapa memegang Keris Siginjai, dialah yang diakui sebagai Raja Negeri Jambi. Keris ini sangat dihormati karena dianggap sakti dan berasal dari Kerajaan Majapahit.\n\nDalam sejarahnya, Orang Kayo Hitam berhasil merebut keris ini dan dilantik menjadi raja Jambi. Keris Siginjai kemudian menjadi simbol kepahlawanan rakyat Jambi dalam melawan penjajah. Pada masa pemerintahan Hindia-Belanda, pusaka ini dibawa ke Batavia, dan sejak November 1904 disimpan di museum. Kini, Keris Siginjai menjadi lambang Provinsi Jambi.\n\nSumber:\n- RRI: https://rri.co.id\n- Detik: https://www.detik.com\n- Kompas: https://www.kompas.com"
            ],

            // ==================== SUMATERA SELATAN ====================
            [
                'nama' => 'Rumah Limas',
                'deskripsi' => "Rumah Limas adalah rumah adat tradisional Sumatera Selatan, khususnya masyarakat Palembang. Rumah ini berbentuk panggung dan dibangun karena pada masa lalu daerah Sumatera Selatan, terutama Palembang, merupakan wilayah rawa-rawa, sehingga rumah panggung dianggap lebih aman dari banjir dan hewan buas.\n\nSalah satu Rumah Limas yang masih berdiri hingga kini adalah rumah peninggalan Pangeran Syarif Abdurrahman Al Habsi dari tahun 1830, yang kini berada di halaman belakang Museum Balaputera Dewa. Rumah Limas memiliki nilai sejarah dan budaya yang tinggi, mencerminkan akulturasi budaya masyarakat Sumatera Selatan dengan pengaruh Islam yang kuat pada ornamennya.\n\nSumber:\n- RRI: https://rri.co.id\n- Garuda: https://garuda.kemdiktisaintek.go.id"
            ],
            [
                'nama' => 'Rumah Rakit',
                'deskripsi' => "Rumah Rakit adalah rumah adat berbentuk rumah apung yang berasal dari Sumatera Selatan, diperkirakan sudah ada sejak zaman Kerajaan Sriwijaya. Rumah ini dibangun di atas rakit dan mengapung di sepanjang pinggiran Sungai Musi, Sungai Ogan, dan Sungai Komering.\n\nKeberadaan rumah rakit awalnya dikarenakan adanya peraturan dari Kesultanan Palembang yang mengharuskan para pendatang untuk menetap di atas air. Rumah rakit pernah mengalami masa keemasan dan menjadi hunian bagi masyarakat keturunan Tionghoa serta pedagang asing dari Eropa dan Asia. Kini, rumah rakit menjadi salah satu warisan budaya tertua di Sumatera Selatan.\n\nSumber:\n- Wikipedia: https://id.wikipedia.org/wiki/Rumah_Rakit\n- Garuda: https://garuda.kemdiktisaintek.go.id"
            ],
            [
                'nama' => 'Kain Songket',
                'deskripsi' => "Kain Songket Palembang adalah kain tenun tradisional yang diperkirakan telah ada sejak abad ke-7 Masehi dan menjadi bagian integral dari kehidupan masyarakat Palembang. Songket memiliki peran penting dalam upacara adat, pernikahan, dan acara keagamaan.\n\nSongket Palembang dikenal dengan proses pembuatannya yang rumit dan penggunaan benang emas asli pada masa lalu, sehingga kain ini sangat mahal dan hanya dikenakan oleh perempuan bangsawan. Kini, songket tetap menjadi simbol kemakmuran dan kebanggaan masyarakat Palembang, serta menjadi salah satu warisan budaya takbenda Indonesia.\n\nSumber:\n- RRI: https://rri.co.id\n- J-STAGE: https://www.jstage.jst.go.jp"
            ],
            [
                'nama' => 'Kain Jumputan',
                'deskripsi' => "Kain Jumputan adalah kain khas Palembang yang sejarahnya tidak terlepas dari perkembangan perdagangan dan pengaruh budaya dari India dan Tiongkok. Kain ini telah ada sejak masa Kesultanan Palembang dan digunakan sebagai busana adat serta simbol status sosial.\n\nSejarah kain jumputan bermula dari keberadaan kain Patola Sutra yang diperkenalkan oleh pedagang Gujarat sejak zaman Kerajaan Sriwijaya. Pada abad ke-16, budaya Jawa juga masuk ke Keraton Palembang, membuat kain jumputan semakin banyak digunakan. Kini, jumputan menjadi bagian dari identitas budaya masyarakat Palembang.\n\nSumber:\n- RRI: https://rri.co.id\n- Kompas: https://www.kompas.com\n- Detik: https://www.detik.com"
            ],
            [
                'nama' => 'Tari Gending Sriwijaya',
                'deskripsi' => "Tari Gending Sriwijaya adalah tari penyambutan tamu agung dari Sumatera Selatan yang mulai ditampilkan pada tanggal 2 Agustus 1945, pada masa penjajahan Jepang. Tarian ini diciptakan sebagai tari sambut untuk menyambut tamu yang berkunjung ke Palembang, dan hingga kini masih digunakan untuk menyambut tamu negara dan pejabat pemerintah.\n\nMakna tarian Gending Sriwijaya mencerminkan penghormatan mendalam kepada tamu serta nilai kesopanan masyarakat Palembang. Setiap gerakan melambangkan ketulusan, keseimbangan, dan keharmonisan dalam hubungan antarmanusia serta dengan Tuhan. Tarian ini merupakan warisan budaya kolosal peninggalan Kerajaan Sriwijaya.\n\nSumber:\n- RRI: https://rri.co.id\n- Garuda: https://garuda.kemdiktisaintek.go.id\n- Indonesia Kaya: https://indonesiakaya.com"
            ],
            [
                'nama' => 'Tari Tanggai',
                'deskripsi' => "Tari Tanggai adalah tarian tradisional asal Palembang, Sumatera Selatan, yang pertama kali diciptakan oleh Elly Rudy, salah satu penari Gending Sriwijaya. Tarian ini diciptakan sebagai tari penyambutan tamu pada acara pernikahan.\n\nPada zaman dahulu, Tari Tanggai bertujuan sebagai tari persembahan pengantar sesajian. Pada abad ke-17, Kesultanan Palembang Darussalam mengharamkan gadis atau perempuan menari, sehingga seluruh pertunjukan diperankan oleh laki-laki. Memasuki tahun 1920, Tari Tanggai digunakan untuk mencari jodoh oleh para orangtua di Palembang. Kini, Tari Tanggai digunakan untuk menyambut tamu agung dan acara resepsi pernikahan.\n\nSumber:\n- Kompas: https://www.kompas.com\n- Wikipedia: https://id.m.wikipedia.org/wiki/Tari_tanggai\n- INews: https://www.inews.id"
            ],
            [
                'nama' => 'Tari Putri Bekhusek',
                'deskripsi' => "Tari Putri Bekhusek adalah tarian adat yang berasal dari Suku Ogan Komering Ulu (OKU), Sumatera Selatan. Nama \"Bekhusek\" berarti bermain, sehingga tarian ini menggambarkan seorang putri yang sedang bermain. Tarian ini sangat populer di Kabupaten OKU dan melambangkan kemakmuran daerah Sumatera Selatan.\n\nTari Putri Bekhusek merupakan salah satu budaya hasil perkembangan peradaban Suku Ogan dan sering ditampilkan dalam berbagai acara adat dan festival budaya. Tarian ini juga menjadi promosi bagi kain songket khas daerah Sumatera Selatan.\n\nSumber:\n- Kompas: https://www.kompas.com\n- Budaya Indonesia: https://budaya-indonesia.org"
            ],
            [
                'nama' => 'Keris Palembang',
                'deskripsi' => "Keris Palembang adalah senjata tradisional khas Palembang yang dahulu digunakan sebagai senjata sekaligus simbol jabatan pada masa kesultanan. Keris ini memiliki pengaruh dari tiga budaya besar, yaitu Jawa, Cirebon, dan Melayu, dengan anatomi yang khas dan berbeda dari keris Jawa.\n\nTradisi Keris Palembang diduga dimulai sejak masa setelah Kerajaan Sriwijaya runtuh, yang mulanya dibawa oleh para priyayi dari Kabupaten Demak, Jawa Tengah. Saat berdirinya Kesultanan Palembang Darussalam pada abad ke-17, fungsi keris yang digunakan untuk perang bergeser menjadi tanda kekuasaan sultan. Kini, keris Palembang menjadi benda seni dan kebudayaan yang sarat nilai sejarah.\n\nSumber:\n- RRI: https://rri.co.id\n- Antara: https://www.antaranews.com\n- Kompas: https://www.kompas.id"
            ],
            [
                'nama' => 'Tari Kebagh',
                'deskripsi' => "Tari Kebagh adalah tarian tradisional dari daerah Besemah, Kota Pagar Alam, Sumatera Selatan, yang telah menjadi warisan budaya nasional. Tarian ini menjadi Tari Sambut Kota Pagar Alam yang wajib ditampilkan saat penyambutan tamu agung atau tamu pemerintah kota.\n\nTari Kebagh berasal dari tari bidadari dengan jumlah penari 3, 5, atau 7 orang (ganjil). Fungsi tari ini meliputi upacara Negak Bubungan (selamatan rumah), upacara pemotongan hewan kerbau dalam acara bersih desa, dan penyambutan tamu terhormat. Tari Kebagh menjadi simbol kebanggaan lokal yang merefleksikan keunikan budaya suku Besemah.\n\nSumber:\n- Giwang Sumsel: https://giwang.sumselprov.go.id\n- Eprints UNY: https://eprints.uny.ac.id"
            ],
            [
                'nama' => 'Tari Kipas Serumpun',
                'deskripsi' => "Tari Kipas Serumpun adalah tari kreasi yang berasal dari Kabupaten Banyuasin, Sumatera Selatan. Tarian ini menceritakan tentang jalinan kasih persahabatan dan semangat gotong royong antar masyarakat, ditarikan oleh delapan orang penari perempuan.\n\nTari Kipas Serumpun mengandung makna tentang pentingnya sikap gotong royong antar sesama manusia, dan sering ditampilkan dalam acara-acara adat serta festival budaya. Tarian ini menjadi simbol kebersamaan dan kerukunan masyarakat Banyuasin.\n\nSumber:\n- Giwang Sumsel: https://giwang.sumselprov.go.id\n- Indonesia Kaya: https://indonesiakaya.com\n- Indonesia Travel: https://www.indonesia.travel"
            ],
            [
                'nama' => 'Aesan Gede',
                'deskripsi' => "Aesan Gede adalah pakaian adat tradisional perempuan Palembang, Sumatera Selatan, yang melambangkan kebesaran dan kemewahan. Aesan berarti hiasan atau pakaian, dan gede berarti pembesar, sehingga Aesan Gede berarti pakaian hiasan pembesar atau pakaian kebesaran.\n\nPakaian ini didominasi oleh warna merah dan benang berwarna emas dengan bahan tenunan kain songket. Aesan Gede dikenakan untuk resepsi pernikahan di Palembang dan merupakan lambang kesabaran serta budi pekerti luhur masyarakat Palembang. Pakaian ini juga sering dikenakan oleh penari Gending Sriwijaya.\n\nSumber:\n- Harian Haluan: https://www.harianhaluan.com\n- Detik: https://www.detik.com\n- Kompas: https://www.kompas.com"
            ],
            [
                'nama' => 'Rebana Rudat',
                'deskripsi' => "Rebana Rudat adalah kesenian tradisional Sumatera Selatan yang menggabungkan musik rebana dengan tarian. Tari Rudat berasal dari Sumatera Selatan dan dikembangkan di Kampung Rebang, dengan jumlah penari sekitar 20–30 orang. Musik iringannya berisi dzikir yang berasal dari Kitab Al-Barzanji, yaitu Syarafal Anam, menggunakan alat musik rebana/terbangan.\n\nDalam prosesi pernikahan adat Palembang, para pemuda memainkan rebana yang disebut terbangan sambil membawakan lagu-lagu pujian Islami. Dua pemuda terdepan melakukan tarian rudat yang berasal dari gerakan pencak silat, menciptakan pertunjukan yang energik dan penuh makna religius.\n\nSumber:\n- Unila: https://digilib.unila.ac.id\n- Penamas Kemenag: https://penamas.kemenag.go.id"
            ],
            [
                'nama' => 'Tari Kedidi',
                'deskripsi' => "Tari Kedidi adalah tarian tradisional yang terinspirasi dari burung Kedidi, burung berbulu putih dengan paruh seperti bebek dan ekor yang lucu. Tarian ini pada dasarnya bersifat pelipur lara dan berkembang menjadi hiburan bagi anak muda mudi, biasanya dibawakan oleh empat atau lima orang saat bulan purnama tanggal 13, 14, dan 15 setiap bulan.\n\nMusik iringan Tari Kedidi mengadopsi dari kesenian Dambus, terutama alat musik yang digunakan. Tarian ini juga mengandung unsur pencak kedidi, perpaduan antara olahraga dan kesenian, serta menjadi bagian dari kekayaan budaya Sumatera Selatan.\n\nSumber:\n- Kemendikbud: https://repositori.kemdikbud.go.id\n- Repository UNJ: https://repository.unj.ac.id"
            ],

            // ==================== BANGKA BELITUNG ====================
            [
                'nama' => 'Rumah Rakit Belitung',
                'deskripsi' => "Rumah Rakit Belitung adalah rumah adat tradisional Bangka Belitung yang berbentuk rumah apung, dibangun di atas air. Rumah ini pertama kali dibuat oleh orang Tionghoa pada masa Kesultanan Palembang, ketika warga asing tidak diperbolehkan membangun rumah di daratan. Rumah rakit pada dasarnya adalah rumah Melayu yang beradaptasi dengan lingkungan perairan.\n\nRumah rakit diperkirakan sudah ada sejak zaman Kerajaan Sriwijaya dan menjadi salah satu bangunan tertua di Sumatera Bagian Selatan. Keberadaan sungai sebagai mata pencaharian dan sumber air menjadi alasan utama pembangunan rumah rakit, yang hingga kini masih dapat ditemui di pinggiran sungai Musi.\n\nSumber:\n- Kompas: https://www.kompas.com\n- Detik: https://www.detik.com\n- Wikipedia: https://id.wikipedia.org/wiki/Rumah_tradisional_Bangka"
            ],
            [
                'nama' => 'Tari Campak',
                'deskripsi' => "Tari Campak adalah tarian tradisional dari Bangka Belitung yang menggambarkan keceriaan bujang dan dayang di Kepulauan Bangka Belitung. Tarian ini mulai dikenal sekitar abad ke-18 dan berasal dari masyarakat Melayu yang menempati pulau-pulau di Bangka Belitung.\n\nMenurut sejarah, nama Tari Campak berasal dari nama seorang nenek bernama Nek Campak yang datang dari Riau dan membawa tarian ini melalui Pulau Seliu. Tari Campak mengalami perubahan pada masa penjajahan Portugis, terlihat dari ragam tari yang menggunakan akordion dan pakaian penari perempuan yang lekat dengan gaya Eropa. Tarian ini menjadi identitas budaya masyarakat Bangka Belitung.\n\nSumber:\n- RRI: https://rri.co.id\n- Wikipedia: https://id.wikipedia.org/wiki/Tari_Campak\n- Kompas: https://regional.kompas.com"
            ],
            [
                'nama' => 'Tari Sepen',
                'deskripsi' => "Tari Sepen adalah tari tradisional Belitung yang menggambarkan pergaulan di masyarakat Belitung. Tarian ini lahir dari upacara marastaun, yaitu upacara keselamatan saat usai panen padi, dan mengandung unsur-unsur pencak silat dalam gerakannya.\n\nSekitar tahun 1980-an, seorang seniman bernama Domra mengembangkan kesenian besepen menjadi tari Sepen yang dikenal oleh masyarakat Belitung hingga saat ini. Tari Sepen biasanya ditampilkan sebagai tarian selamat datang pada acara penyambutan tamu besar, dan menjadi simbol pergaulan serta hiburan bagi masyarakat Belitung.\n\nSumber:\n- Garuda: https://garuda.kemdiktisaintek.go.id\n- Kompas: https://lipsus.kompas.com\n- Antara: https://babel.antaranews.com"
            ],
            [
                'nama' => 'Dambus',
                'deskripsi' => "Dambus adalah alat musik tradisional dari Provinsi Kepulauan Bangka Belitung. Alat musik ini dibuat dari kayu Jelutung dan memiliki konsep dasar permainan yang menghasilkan komposisi sederhana. Dambus umumnya dimainkan dalam ansambel yang melibatkan beberapa instrumen, termasuk tawak-tawak yang bunyinya mirip kentongan di Pulau Jawa.\n\nKesenian Dambus merupakan bagian dari identitas budaya masyarakat Bangka Belitung dan sering ditampilkan dalam berbagai hajatan serta festival budaya. Alat musik ini tetap memiliki tempat istimewa dalam kehidupan masyarakat Bangka Belitung.\n\nSumber:\n- RRI: https://rri.co.id\n- Antara: https://www.antaranews.com"
            ],
            [
                'nama' => 'Kain Cual',
                'deskripsi' => "Kain Cual adalah kain tradisional khas Provinsi Kepulauan Bangka Belitung yang telah dikenal sejak abad ke-17, khususnya di Kota Muntok dan sekitarnya. Kain ini awalnya lebih dikenal sebagai Limar Muntok, yaitu kain tenun ikat yang berasal dari Muntok.\n\nPada masa lalu, kain Cual hanya dipakai oleh lingkungan raja dan kerabatnya, dengan warna kuning sebagai simbol pakaian raja. Kain Cual pertama kali diperkenalkan oleh kakek buyut pendiri toko Kain Cual Ishadi di Pangkal Pinang. Kini, kain Cual menjadi warisan budaya yang membanggakan masyarakat Bangka Belitung.\n\nSumber:\n- RRI: https://rri.co.id\n- Wikipedia: https://id.wikipedia.org/wiki/Batik_Cual\n- Indonesia Kaya: https://indonesiakaya.com"
            ],
            [
                'nama' => 'Kopiah Resam',
                'deskripsi' => "Kopiah Resam atau Songkok Resam adalah kerajinan tradisional khas Bangka Belitung yang terbuat dari tanaman resam, sejenis paku-pakuan yang tumbuh subur di wilayah Bangka. Keberadaan kopiah resam di Desa Kacung dan Dendang sudah ada sejak tahun 1800-an.\n\nKopiah resam merupakan kriya kebanggaan masyarakat Bangka Belitung dan telah diakui secara nasional sebagai Warisan Budaya Takbenda. Kerajinan ini dibuat secara handmade dengan bahan baku tanaman resam yang sudah mati, dan menjadi salah satu kekayaan budaya nusantara yang masih lestari hingga saat ini.\n\nSumber:\n- Antara: https://www.antaranews.com\n- RRI: https://rri.co.id"
            ],
            [
                'nama' => 'Paksian',
                'deskripsi' => "Paksian adalah busana pengantin khas Kota Pangkalpinang, Kepulauan Bangka Belitung. Pakaian untuk mempelai wanita adalah baju kurung merah yang terbuat dari bahan sutra atau beludru, yang pada masa awal disebut Baju Seting. Kain yang dipakai adalah kain besusur, kain lasem, atau kain cual, dengan mahkota di bagian kepala yang dinamakan Paksian.\n\nPaksian melambangkan keagungan dan kesakralan serta menjadi mahkota sang pengantin. Filosofi yang terkandung dalam Paksian mencerminkan nilai-nilai budaya dan keagamaan masyarakat Bangka Belitung. Pakaian adat ini pernah dikenakan oleh Presiden Joko Widodo dalam Pidato Kenegaraan.\n\nSumber:\n- Detik: https://www.detik.com\n- Antara: https://babel.antaranews.com\n- Tribun: https://cirebon.tribunnews.com"
            ],
            [
                'nama' => 'Parang Bangka',
                'deskripsi' => "Parang Bangka (Parang Badau) adalah senjata tradisional khas Bangka Belitung yang menurut sejarah pada abad ke-13 dibuat oleh seorang empu pandai besi dari Kerajaan Majapahit yang datang ke Kerajaan Badau untuk mengajari warga setempat cara membuat senjata.\n\nDi bawah kepemimpinan raja bergelar Ronggo Udo, masyarakat Badau membuat senjata magis ini untuk melawan kolonialisme Belanda di Bangka Belitung. Parang Badau juga digunakan sebagai senjata perkelahian jarak dekat karena bebannya yang relatif berat, dan dipercaya memiliki kekuatan magis. Karena bentuknya yang melengkung, masyarakat sering menyebutnya parang bengkok.\n\nSumber:\n- Wikipedia: https://id.wikipedia.org/wiki/Parang_Bangka\n- Detik: https://www.detik.com\n- INews: https://www.inews.id"
            ],
            [
                'nama' => 'Tari Gandai',
                'deskripsi' => "Tari Gandai adalah tarian khas orang Mukomuko dan Pekal di Kabupaten Mukomuko, Bengkulu. Tarian ini berhubungan dengan legenda Malin Deman dan Puti Bungsu, dan gerakan-gerakan tarinya merefleksikan kisah cinta keduanya. Malin Deman diyakini sebagai nenek moyang suku bangsa Pekal yang menciptakan tari Gandai beserta alat musik pengiringnya, yaitu gendang (odap) dan serunai (sonai).\n\nAwalnya, Gandai berfungsi sebagai bagian dari tradisi adat dan sarana sosial masyarakat. Kini, Gandai berfungsi sebagai sarana hiburan, pertunjukan, dan pendidikan, serta menjadi media pelestarian nilai budaya dan identitas masyarakat Pekal di Bengkulu Utara. Tarian ini biasanya ditampilkan pada acara perkawinan (bimbang) dari pukul 20.00 hingga 04.00 WIB.\n\nSumber:\n- Garuda: https://garuda.kemdiktisaintek.go.id\n- Wikipedia: https://id.m.wikipedia.org/wiki/Tari_Gandai"
            ],
            [
                'nama' => 'Tari Bedana',
                'deskripsi' => "Tari Bedana adalah tarian tradisional masyarakat Lampung yang dibawa oleh orang Arab sekitar tahun 1930 dan kemudian diajarkan kepada Ma'ruf, Amang, dan Abdullah sebelum menyebar ke berbagai wilayah Lampung. Tarian ini berkembang seiring dengan masuknya agama Islam di daerah Lampung.\n\nPada awal mulanya, Tari Bedana dilakukan oleh dua laki-laki berpasangan dan berkelompok, dan dimainkan saat salah seorang anggota keluarga ada yang khatam Al-Quran. Kini, Tari Bedana menjadi tarian muda-mudi Lampung yang dibawakan dalam acara adat dan acara tidak resmi sebagai ungkapan rasa gembira, serta mencerminkan tata kehidupan masyarakat Lampung.\n\nSumber:\n- RRI: https://rri.co.id\n- Wikipedia: https://id.wikipedia.org/wiki/Tari_Bedana\n- Kompas: https://www.kompas.com"
            ],
            [
                'nama' => 'Bende',
                'deskripsi' => "Bende adalah alat musik tradisional khas Lampung yang termasuk dalam jenis alat musik idiofon. Bende memiliki suara khas yang dihasilkan ketika alat musik ini dipukul, dan terbuat dari tembaga atau perunggu.\n\nDahulu, bende berfungsi seperti kentongan, yaitu untuk memberi tanda atau peringatan ketika hendak memberikan informasi kepada masyarakat. Kini, bende dimainkan dalam acara-acara adat seperti pernikahan, upacara adat, dan acara keagamaan, serta menjadi bagian dari ansambel musik tradisional Lampung.\n\nSumber:\n- RRI: https://rri.co.id\n- Kompas: https://lipsus.kompas.com\n- INews: https://www.inews.id"
            ],

            // ==================== BENGKULU ====================
            [
                'nama' => 'Rumah Bubungan Lima',
                'deskripsi' => "Rumah Bubungan Lima adalah rumah adat khas Provinsi Bengkulu. Nama Bubungan Lima merujuk pada atapnya yang berbentuk limas bertingkat lima, melambangkan strata sosial dan adat istiadat masyarakat Rejang. Pada masa lalu, rumah ini banyak dihuni oleh kalangan bangsawan dan keluarga kerajaan, dan kini lebih sering dimanfaatkan sebagai tempat pelaksanaan upacara adat.\n\nRumah Bubungan Lima berfungsi sebagai pusat kegiatan adat, musyawarah, dan upacara penting bagi masyarakat Rejang dan Melayu Bengkulu. Rumah panggung ini dirancang menggunakan tiang-tiang kayu besar untuk perlindungan dari banjir dan hewan buas, dan diperkirakan sudah ada di Bengkulu sejak tahun 1916-an.\n\nSumber:\n- RRI: https://rri.co.id\n- Wikipedia: https://id.wikipedia.org/wiki/Rumah_Bubungan_Lima\n- Kompas: https://www.kompas.com"
            ],
            [
                'nama' => 'Tari Andun',
                'deskripsi' => "Tari Andun adalah tari rakyat yang berasal dari Bengkulu bagian Selatan, terutama di kalangan suku Serawai, Besemah, dan Semende. Menurut sejarahnya, tari Andun muncul berdasarkan kisah pernikahan di Kerajaan Dang Tuanku Limau, dan ditampilkan untuk pertama kalinya sebagai wujud syukur karena putrinya telah selamat dari sebuah penculikan.\n\nZaman dahulu, tari ini biasanya digunakan sebagai sarana mencari jodoh setelah selesai panen padi. Namun, sejak tahun 1970-an, tari Andun mulai jarang ditampilkan. Keberadaan tari Andun di Seluma sudah ada sejak zaman nenek moyang sekitar tahun 1913, dan menjadi bagian dari tradisi masyarakat Bengkulu.\n\nSumber:\n- RRI: https://rri.co.id\n- Wikipedia: https://id.wikipedia.org/wiki/Tari_Andun"
            ],
            [
                'nama' => 'Tari Bidadari Teminang Anak',
                'deskripsi' => "Tari Bidadari Teminang Anak adalah tarian tradisional dari Kabupaten Rejang Lebong, Bengkulu. Tarian ini menceritakan tentang seorang bidadari yang turun dari langit menuju bumi untuk mengangkat seorang anak, dengan makna berkah yang datang dari langit untuk manusia di bumi.\n\nTarian ini biasanya dipentaskan pada berbagai kegiatan untuk menyambut tamu agung, tamu kenegaraan, upacara hajatan, dan perkawinan. Tari Bidadari Teminang Anak ditarikan secara kelompok dengan jumlah penari 8 hingga 16 orang yang terdiri dari laki-laki dan perempuan, mengenakan busana berupa selendang dan pakaian adat khas Bengkulu.\n\nSumber:\n- Wikipedia: https://id.m.wikipedia.org/wiki/Tari_Bidadari_Teminang_Anak\n- Kompas: https://www.kompas.com"
            ],
            [
                'nama' => 'Kain Besurek',
                'deskripsi' => "Kain Besurek adalah kain batik khas Bengkulu yang mulai berkembang pada masa kedatangan pedagang dan ulama dari Timur Tengah, terutama saat pengaruh Islam mulai menyebar ke wilayah pesisir Sumatra pada abad ke-17 hingga 18. Motifnya didominasi oleh kaligrafi huruf Arab gundul, serta dimodifikasi dengan simbol daerah Bengkulu seperti bunga rafflesia.\n\nBesurek merupakan bahasa Melayu dialek Bengkulu yang artinya bersurat atau tulisan. Kain ini diperkenalkan oleh pedagang Arab dan pekerja asal India pada abad ke-17 kepada masyarakat di Bengkulu. Kain Besurek merupakan warisan tradisional masyarakat Melayu Bengkulu yang mendapat pengaruh kuat dari kebudayaan Islam.\n\nSumber:\n- RRI: https://rri.co.id\n- Kemenpar: https://kemenpar.go.id\n- Museum Nasional: https://www.museumnasional.or.id"
            ],
            [
                'nama' => 'Keris Bengkulu',
                'deskripsi' => "Keris Bengkulu adalah senjata tradisional Bengkulu yang secara khusus digunakan oleh para kepala adat dan hulubalang (panglima adat) pada masa lampau. Keris ini memiliki panjang sekitar 13 jari dan bentuknya lurus, serta dianggap keramat dan pemberani bagi pemilik atau pemegangnya.\n\nSalah satu jenis keris Bengkulu yang terkenal adalah Keris Rambai Ayam, yang secara historis digunakan oleh para pemimpin suku atau pejuang Bengkulu saat menghadapi konflik dan pertempuran di masa penjajahan. Selain sebagai senjata fisik, keris ini juga digunakan dalam upacara adat dan dianggap memiliki nilai spiritual yang tinggi.\n\nSumber:\n- Wikipedia: https://id.wikipedia.org/wiki/Rambai_Ayam\n- Kompas: https://www.kompas.com\n- Detik: https://www.detik.com"
            ],
            [
                'nama' => 'Doll',
                'deskripsi' => "Dol adalah alat musik tradisional khas Bengkulu yang terbuat dari bagian terbawah (bonggol) pohon kelapa. Alat musik ini memiliki suara yang khas seperti bedug atau bass, namun bunyinya tidak sama dengan alat musik perkusi pada umumnya. Dol merupakan bagian dari kesenian Kota Bengkulu yang masih dipertahankan hingga kini.\n\nProses pembuatan dol diawali dengan pengolahan batang kelapa yang dibentuk selama sekitar dua hingga tiga hari. Instrumen ini tidak hanya menjadi pengiring ritual Tabot, tetapi juga tampil dalam berbagai festival budaya dan pertunjukan seni. Bunyi dol yang khas dengan dentuman kerasnya menjadi identitas musikal masyarakat Bengkulu.\n\nSumber:\n- RRI: https://rri.co.id\n- Detik: https://www.detik.com\n- Indonesia Kaya: https://indonesiakaya.com"
            ],
            [
                'nama' => 'Redap',
                'deskripsi' => "Redap adalah alat musik tradisional Bengkulu yang mirip dengan rebana, terbuat dari kulit kambing atau sapi yang dipadukan dengan rotan dan kayu. Alat musik ini sering digunakan dalam kesenian Sarafal Anam, yaitu kesenian yang mengalunkan ayat-ayat suci Al-Qur'an dan pujian kepada Nabi Muhammad SAW.\n\nRedap juga digunakan sebagai musik pengiring Tari Andun, berfungsi sebagai pengatur tempo irama yang dipadukan dengan irama dari musik kelintang. Alat musik ini biasanya dimainkan dengan cara dipukul, dan menjadi bagian penting dari tradisi musik Islam di Bengkulu.\n\nSumber:\n- Repository UINFAS: https://repository.uinfasbengkulu.ac.id\n- Detik: https://www.detik.com"
            ],
            [
                'nama' => 'Kuduk',
                'deskripsi' => "Kuduk adalah salah satu senjata tradisional Bengkulu selain keris, badik, dan rudus. Senjata ini memiliki bentuk khas dan digunakan oleh masyarakat Bengkulu pada masa lampau untuk berbagai keperluan, termasuk pertahanan diri dan upacara adat.\n\nDalam budaya Bengkulu, kuduk dianggap sebagai salah satu senjata yang memiliki nilai sejarah dan budaya. Meskipun informasi tentang kuduk tidak sebanyak keris, senjata ini tetap menjadi bagian dari warisan budaya Bengkulu yang perlu dilestarikan dan dikenali oleh generasi muda.\n\nSumber:\n- Budaya Indonesia: https://budaya-indonesia.org\n- Detik: https://www.detik.com"
            ]
        ];

        foreach ($budayaData as $data) {
            DB::table('budayas')
                ->where('nama', 'like', '%' . $data['nama'] . '%')
                ->update([
                    'deskripsi' => $data['deskripsi']
                ]);
        }
    }
}