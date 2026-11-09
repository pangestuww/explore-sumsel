<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DestinasiDeskripsiSeeder extends Seeder
{
    public function run(): void
    {
        $destinasiData = [
            [
                'nama' => 'Danau Maninjau',
                'deskripsi' => "Danau Maninjau adalah danau kaldera vulkanik di Kecamatan Tanjung Raya, Kabupaten Agam. Secara geologis, danau ini terbentuk dari letusan besar Gunung Maninjau Purba pada dua periode utama, sekitar 60.000 dan 75.000 tahun lalu. Letusan tersebut menghasilkan kaldera luas yang kemudian terisi air, dengan kedalaman mencapai sekitar 495 meter.\n\nSelain penjelasan ilmiah, masyarakat Minangkabau memiliki legenda Bujang Sambilan—kisah sembilan bersaudara yang melanggar adat hingga memicu peristiwa besar yang mengubah kawasan tersebut menjadi danau. Danau ini berada pada ketinggian sekitar 461 meter di atas permukaan laut dan memiliki luas sekitar 99,5 kilometer persegi. Jalan berkelok 44 di sekitarnya menawarkan panorama spektakuler dari ketinggian.\n\nSumber:\n- Wikipedia: https://id.wikipedia.org/wiki/Danau_Maninjau\n- Geologi ESDM: https://geologi.esdm.go.id"
            ],
            [
                'nama' => 'Danau Toba',
                'deskripsi' => "Danau Toba adalah danau vulkanik terbesar di dunia yang terbentuk dari letusan supervulkan sekitar 74.000 tahun lalu. Letusan tersebut menciptakan kaldera raksasa yang kemudian terisi air, dengan material letusan (Youngest Toba Tuff) tersebar hingga wilayah yang jauh dari Sumatera. Pulau Samosir di tengah danau terbentuk melalui pengangkatan kembali bagian dasar kaldera.\n\nDanau ini memiliki luas sekitar 1.130 kilometer persegi, panjang 100 kilometer, lebar 30 kilometer, dan kedalaman maksimum 508 meter, berada pada ketinggian 900 meter di atas permukaan laut. Pada tahun 2020, Danau Toba ditetapkan sebagai UNESCO Global Geopark. Kawasan ini juga menjadi ruang hidup masyarakat Batak dengan warisan budaya seperti rumah adat, ukiran gorga, kain ulos, dan pertunjukan Sigale-gale.\n\nSumber:\n- Wikipedia: https://id.wikipedia.org/wiki/Danau_Toba\n- UNESCO: https://www.globalgeopark.org"
            ],
            [
                'nama' => 'Bukit Gundaling',
                'deskripsi' => "Bukit Gundaling di Berastagi, Kabupaten Karo, telah menjadi tempat rekreasi sejak masa penjajahan Belanda. Dari puncaknya, pengunjung dapat menikmati panorama Kota Berastagi secara keseluruhan dengan latar Gunung Sinabung dan Gunung Sibayak. Nama \"Gundaling\" memiliki banyak versi, salah satunya berasal dari kisah sepasang kekasih yang hubungannya tak direstui, yang diyakini berasal dari frasa bahasa Inggris \"Good bye, my darling\".\n\nSelain keindahan alamnya, Bukit Gundaling juga menawarkan berbagai atraksi, seperti berkuda dan area bermain, serta menjadi lokasi favorit untuk menikmati matahari terbit dan terbenam.\n\nSumber:\n- Wikipedia: https://id.wikipedia.org/wiki/Bukit_Gundaling\n- Pemerintah Kabupaten Karo: https://weblama.karokab.go.id"
            ],
            [
                'nama' => 'Lembah Harau',
                'deskripsi' => "Lembah Harau adalah cagar alam di Kecamatan Harau, Kabupaten Lima Puluh Kota. Secara geologis, lembah ini diperkirakan terbentuk dari patahan yang turun, menciptakan lembah luas dan datar. Tebing-tebing granit yang menjulang setinggi 80–300 meter diperkirakan berusia sekitar 30–40 juta tahun dan mengandung banyak karbon organik, sisa-sisa organisme purba.\n\nKawasan ini dijuluki \"Desa Konoha\" karena keindahannya yang memukau. Di dasar lembah, terdapat persawahan hijau dan air terjun, menjadikannya destinasi favorit untuk bersantai dan berfoto.\n\nSumber:\n- Wikipedia: https://id.wikipedia.org/wiki/Lembah_Harau\n- Indonesia Travel: https://indonesia.travel"
            ],
            [
                'nama' => 'Pantai Padang',
                'deskripsi' => "Pantai Padang terletak di sepanjang pesisir Kota Padang dan berperan penting dalam sejarah perkembangan kota. Sejak era kolonial, perairan di sepanjang pantai ini, terutama Pelabuhan Muaro, menjadi urat nadi perekonomian kota. Pantai ini memiliki garis pantai yang relatif lurus dengan pasir yang terbentang luas.\n\nSaat ini, Pantai Padang telah ditata menjadi ruang publik yang populer, dilengkapi dengan berbagai fasilitas seperti tempat makan dan area bersantai, menjadikannya tempat favorit warga dan wisatawan untuk menikmati senja.\n\nSumber:\n- Wikipedia: https://id.wikipedia.org/wiki/Pantai_Padang\n- RRI: https://rri.co.id"
            ],
            [
                'nama' => 'Air Terjun Batu Dinding',
                'deskripsi' => "Air Terjun Batu Dinding merupakan objek wisata unggulan di Desa Tanjung Belit, Kabupaten Kampar, Riau. Air terjun ini memiliki keunikan berupa tujuh tingkatan yang berlatar dinding bebatuan mengkilap, sesuai dengan namanya. Kawasan ini juga dikenal sebagai Air Terjun Tanjung Belit atau Air Terjun Bertingkat dan telah lama menjadi favorit para pencinta alam.\n\nAir terjun ini berada di dalam kawasan Hutan Larangan Adat \"Imbo Batu Dinding\", yang dikelola oleh masyarakat setempat, sehingga kelestariannya tetap terjaga.\n\nSumber:\n- Wikipedia: https://id.wikipedia.org/wiki/Air_Terjun_Batu_Dinding\n- Pencarian Berita: https://www.google.com/search?q=Air+Terjun+Batu+Dinding+Kampar"
            ],
            [
                'nama' => 'Pulau Bintan',
                'deskripsi' => "Pulau Bintan adalah pulau terbesar di Kepulauan Riau dengan luas sekitar 1.655 km². Sejarahnya panjang, sejak abad ke-3 menjadi pusat perdagangan di jalur antara Cina dan India. Pulau ini juga merupakan bagian dari Kerajaan Melayu yang berpengaruh selama kurang lebih 600 tahun.\n\nDaya tarik utama Pulau Bintan adalah pantai pasir putihnya yang bersih, formasi bebatuan granit raksasa, serta resor internasional. Pulau ini sering menjadi alternatif destinasi bagi wisatawan yang ingin menikmati keindahan tropis di dekat Singapura.\n\nSumber:\n- Wikipedia: https://id.wikipedia.org/wiki/Pulau_Bintan\n- Indonesia Travel: https://indonesia.travel"
            ],
            [
                'nama' => 'Gunung Kerinci',
                'deskripsi' => "Gunung Kerinci adalah gunung tertinggi di Pulau Sumatra dan gunung berapi tertinggi di Indonesia serta Asia Tenggara, dengan ketinggian 3.805 meter di atas permukaan laut. Gunung ini bertipe stratovolcano dan masih aktif hingga saat ini, dengan letusan terakhir tercatat pada tahun 2023. Pendakian pertama tercatat pada tahun 1877.\n\nDaya tarik utamanya adalah tantangan pendakian, keanekaragaman flora dan fauna di hutan sekitarnya, serta pemandangan unik geologi \"Hort Graben Kerinci\" yang hanya bisa dinikmati dari ketinggian.\n\nSumber:\n- Wikipedia: https://id.wikipedia.org/wiki/Gunung_Kerinci\n- Badan Geologi: https://badangeologi.id"
            ],
            [
                'nama' => 'Danau Kaco',
                'deskripsi' => "Danau Kaco terletak di Taman Nasional Kerinci Seblat, Kabupaten Kerinci, Jambi. Nama \"Kaco\" berasal dari bahasa setempat yang berarti \"kaca\", merujuk pada airnya yang sangat bening dan berkilau. Danau ini menyimpan legenda tentang Raja Gagak yang menyimpan intan permata di dasar danau, yang dipercaya memancarkan cahaya saat bulan purnama.\n\nDanau ini dikelilingi oleh hutan lebat dan menjadi destinasi favorit bagi wisatawan yang mencari ketenangan dan keindahan alam yang masih asri.\n\nSumber:\n- Wikipedia: https://id.wikipedia.org/wiki/Danau_Kaco\n- Pencarian Berita: https://www.google.com/search?q=Danau+Kaco+Kerinci"
            ],
            [
                'nama' => 'Pantai Tanjung Tinggi',
                'deskripsi' => "Pantai Tanjung Tinggi di Kabupaten Belitung dikenal dengan formasi batu granit raksasa yang berusia sangat tua, diperkirakan setara dengan fosil dinosaurus. Pantai ini dulunya merupakan pelabuhan nelayan bernama Pelabuhan Bilik. Ketenarannya meledak setelah menjadi lokasi syuting film \"Laskar Pelangi\" pada tahun 2008, sehingga sering dijuluki sebagai Pantai Laskar Pelangi.\n\nMasyarakat setempat percaya bahwa batu-batu granit tersebut memiliki kekuatan magis dan berasal dari zaman megalitikum.\n\nSumber:\n- Wikipedia: https://id.wikipedia.org/wiki/Pantai_Tanjung_Tinggi\n- Indonesia Kaya: https://indonesiakaya.com"
            ],
            [
                'nama' => 'Pantai Parai Tenggiri',
                'deskripsi' => "Pantai Parai Tenggiri di Kabupaten Bangka awalnya bernama Pantai Hakok. Nama \"Parai Tenggiri\" diberikan karena pantai ini dulunya menjadi pusat kegiatan nelayan yang membawa hasil tangkapan ikan tenggiri. Nama ini konon diberikan langsung oleh Presiden pertama Indonesia, Ir. Soekarno, pada sekitar tahun 1948-1949. Pantai ini juga pernah menjadi tempat pengasingan Bung Karno.\n\nKini, pantai ini menawarkan pemandangan air laut berwarna hijau toska dengan jejeran batu granit yang indah.\n\nSumber:\n- Wikipedia: https://id.wikipedia.org/wiki/Pantai_Parai_Tenggiri\n- Indonesia Kaya: https://indonesiakaya.com"
            ],
            [
                'nama' => 'Pantai Panjang',
                'deskripsi' => "Pantai Panjang di Kota Bengkulu memiliki sejarah yang signifikan sejak era kolonial. Pada abad ke-18, kawasan ini merupakan bagian dari pos perdagangan British East India Company yang dikenal dengan Benteng Marlborough (dibangun tahun 1713). Pantai ini berbatasan langsung dengan Samudra Hindia dan memiliki garis pantai yang panjang dengan pasir putih.\n\nSaat ini, Pantai Panjang telah ditata menjadi ikon wisata kota dengan berbagai fasilitas, termasuk area kuliner dan olahraga.\n\nSumber:\n- Wikipedia: https://id.wikipedia.org/wiki/Pantai_Panjang\n- Pencarian Berita: https://www.google.com/search?q=Pantai+Panjang+Bengkulu"
            ],
            [
                'nama' => 'Taman Nasional Way Kambas',
                'deskripsi' => "Taman Nasional Way Kambas di Lampung memiliki sejarah panjang dalam upaya pelestarian gajah Sumatera. Kawasan ini awalnya ditetapkan sebagai Taman Buru oleh pemerintah Hindia Belanda pada tahun 1937. Pada tahun 1985, didirikan Pusat Latihan Gajah (PLG) —sekolah gajah pertama di Indonesia—yang kemudian menjadi Pusat Konservasi Gajah (PKG). Taman nasional ini resmi ditetapkan pada tahun 1989 dengan luas sekitar 130.000 hektar.\n\nHingga kini, Way Kambas menjadi pusat konservasi gajah Sumatera yang penting dan menjadi destinasi wisata edukasi.\n\nSumber:\n- Wikipedia: https://id.wikipedia.org/wiki/Taman_Nasional_Way_Kambas\n- Kementerian Lingkungan Hidup: https://ksdae.kehutanan.go.id"
            ],
            [
                'nama' => 'Pantai Gigi Hiu',
                'deskripsi' => "Pantai Gigi Hiu terletak di Kecamatan Kelumbayan, Kabupaten Tanggamus, Lampung. Nama pantai ini berasal dari formasi batu karang yang menjulang tinggi dan runcing, menyerupai gigi hiu. Nama ini diberikan oleh Yopie Pangkey dan rekan-rekannya. Pantai ini juga dikenal sebagai Pantai Batu Layar karena batu-batunya yang tampak seperti layar perahu.\n\nPantai ini pernah menjadi lokasi syuting film dan menjadi latar belakang salah satu banner promosi Asian Games 2018, yang semakin mengenalkannya ke wisatawan.\n\nSumber:\n- Wikipedia: https://id.wikipedia.org/wiki/Pantai_Gigi_Hiu\n- Pencarian Berita: https://www.google.com/search?q=Pantai+Gigi+Hiu+Lampung"
            ],
            [
                'nama' => 'Gunung Dempo',
                'deskripsi' => "Gunung Dempo adalah gunung berapi aktif bertipe stratovolcano di Pagar Alam, Sumatera Selatan, dengan ketinggian 3.173 mdpl. Gunung ini memiliki kompleks kawah yang luas, termasuk danau kawah di dalamnya. Sejarah letusannya tercatat sejak tahun 1818 dan telah terjadi lebih dari 18 kali peningkatan aktivitas atau letusan. Letusan terakhir yang signifikan terjadi pada tahun 1974, dan peningkatan aktivitas terakhir pada tahun 2006.\n\nGunung ini menjadi destinasi favorit pendaki karena menawarkan tantangan dan pemandangan alam yang indah, termasuk kebun teh di lerengnya.\n\nSumber:\n- Wikipedia: https://id.wikipedia.org/wiki/Gunung_Dempo\n- Badan Geologi: https://magma.esdm.go.id"
            ],
            [
                'nama' => 'Kebun Teh Pagar Alam',
                'deskripsi' => "Perkebunan teh di Pagar Alam, Sumatera Selatan, memiliki sejarah yang kaya. Pembangunannya dimulai pada 2 Mei 1929 oleh perusahaan Belanda, NV Lanbouw Maata Chapij. Pabrik teh Gunung Dempo merupakan salah satu peninggalan kolonial yang hingga kini masih beroperasi di bawah pengelolaan PTPN VII. Kebun teh ini sempat menjadi saksi bisu perjuangan bangsa Indonesia dan dinasionalisasi oleh pemerintah pada tahun 1959.\n\nSelain menghasilkan teh berkualitas, kawasan ini menawarkan pemandangan hijau yang menyejukkan dengan latar belakang Gunung Dempo.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Sejarah+Kebun+Teh+Pagar+Alam"
            ],
            [
                'nama' => 'Curup Maung',
                'deskripsi' => "Curup Maung adalah air terjun yang terletak di Desa Rinduhati, Kecamatan Gumay Ulu, Kabupaten Lahat, Sumatera Selatan. Air terjun ini baru ditemukan pada tahun 2014 dan langsung menjadi populer. Nama \"Curup Maung\" berasal dari bahasa setempat yang berarti \"air terjun harimau\", karena dahulu kawasan ini dipercaya sebagai habitat harimau liar. Air terjun ini memiliki ketinggian sekitar 200 meter dan terdiri dari dua air terjun besar serta lima air terjun kecil.\n\nKabupaten Lahat sendiri pernah meraih rekor MURI sebagai kabupaten dengan air terjun terbanyak di Indonesia.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Curup+Maung+Lahat"
            ],
            [
                'nama' => 'Air Terjun Suban',
                'deskripsi' => "Air Terjun Suban terletak di Rejang Lebong, Bengkulu, dan telah dibuka untuk umum sejak 1 November 1967. Daya tarik utamanya adalah air terjun setinggi sekitar 90 meter dengan air yang jernih dan dingin, serta sumber air panas alami di sekitarnya yang dipercaya dapat menyembuhkan penyakit. Kawasan ini juga menyimpan peninggalan sejarah Suku Rejang dari zaman Megalitikum, seperti Batu Trisakti dan Batu Menangis, yang memiliki cerita mistis dan dipercaya membawa berkah.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Air+Terjun+Suban+Rejang+Lebong"
            ],
            [
                'nama' => 'Taman Nasional Sembilang',
                'deskripsi' => "Taman Nasional Sembilang di Kabupaten Banyuasin, Sumatera Selatan, awalnya berstatus Hutan Suaka Alam pada tahun 1994 dengan luas 205.750 hektar. Kawasan ini kemudian diusulkan menjadi taman nasional pada tahun 1998 dan resmi ditetapkan pada 19 Maret 2003 dengan luas 202.896 hektar. Nama \"Sembilang\" diambil dari banyaknya ikan sembilang (Plotosus canius) yang hidup di perairan kawasan ini.\n\nTaman nasional ini memiliki ekosistem hutan rawa gambut dan mangrove yang penting, serta menjadi habitat bagi berbagai satwa liar, termasuk harimau Sumatera.\n\nSumber:\n- Wikipedia: https://id.wikipedia.org/wiki/Taman_Nasional_Sembilang\n- Kementerian Lingkungan Hidup: https://ksdae.kehutanan.go.id"
            ],
            [
                'nama' => 'Taman Bukit Sulap',
                'deskripsi' => "Taman Bukit Sulap di Kota Lubuklinggau, Sumatera Selatan, berada di kawasan hutan lindung Taman Nasional Kerinci Seblat (TNKS). Bukit ini memiliki nilai sejarah dan budaya yang kuat. Di lerengnya terdapat makam Bujang Kurap, seorang panglima Kerajaan Sriwijaya yang dianggap sakti dan dikeramatkan. Bukit Sulap juga dikenal karena sering \"menghilang\" dari pandangan saat pagi hari, yang menjadi asal-usul namanya. Kawasan ini diresmikan sebagai destinasi wisata pada tahun 2014 dan kini dilengkapi dengan inclinator (lift) untuk memudahkan pengunjung menikmati panorama kota dari ketinggian.\n\nSumber:\n- Wikipedia: https://id.wikipedia.org/wiki/Bukit_Sulap\n- Pemerintah Kota Lubuklinggau: https://ssc.lubuklinggaukota.go.id"
            ],
            [
                'nama' => 'Ngarai Sianok',
                'deskripsi' => "Ngarai Sianok adalah lembah curam di perbatasan Kota Bukittinggi dan Kabupaten Agam. Secara geologis, ngarai ini terbentuk akibat Patahan Semangko—pergerakan lempeng bumi yang menciptakan lembah dalam dengan tebing batuan terjal. Ngarai ini memiliki panjang sekitar 15 km, kedalaman 100–120 meter, dan lebar sekitar 200 meter.\n\nLanskapnya yang dramatis dengan latar Gunung Singgalang dan Gunung Marapi membuatnya dijuluki sebagai “Grand Canyon-nya Sumatra”. Di dasar ngarai mengalir Sungai Sianok yang tenang, dan kawasan ini telah menjadi daya tarik sejak zaman kolonial.\n\nSumber:\n- Wikipedia: https://id.wikipedia.org/wiki/Ngarai_Sianok\n- Wonderful Indonesia: https://wonderfulindonesia.co.id"
            ],
            [
                'nama' => 'Pulau Weh',
                'deskripsi' => "Pulau Weh di Kota Sabang, Provinsi Aceh, merupakan titik paling barat Indonesia dan dikenal dengan monumen Kilometer Nol. Secara geologis, pulau ini dulunya menyatu dengan daratan Sumatra, tetapi terpisah akibat letusan gunung berapi pada zaman Pleistosen.\n\nDalam mitologi Aceh, nama \"Weh\" berasal dari kisah Naga Sabang yang tubuhnya dilempar ke tengah laut oleh Seulawah Inong, lalu menjadi asal mula pulau ini. Pulau Weh menawarkan perpaduan wisata bahari, kekayaan bawah laut, serta jejak sejarah seperti Benteng Anoi Itam dari masa pendudukan Jepang.\n\nSumber:\n- Wikipedia: https://id.wikipedia.org/wiki/Pulau_Weh\n- Detik: https://www.detik.com"
            ],
            [
                'nama' => 'Bukit Lawang',
                'deskripsi' => "Bukit Lawang di Kabupaten Langkat merupakan titik akses utama menuju Taman Nasional Gunung Leuser. Kawasan ini menjadi rumah bagi orangutan Sumatera yang terancam punah. Sejarahnya dimulai pada 1972 ketika sebuah organisasi dari Swiss memulai pusat rehabilitasi orangutan. Pada 1980, taman nasional ini resmi didirikan dan diakui UNESCO sebagai Cagar Biosfer.\n\nSumber:\n- Wikipedia: https://id.wikipedia.org/wiki/Bukit_Lawang\n- RRI: https://rri.co.id"
            ],
            [
                'nama' => 'Jam Gadang',
                'deskripsi' => "Jam Gadang adalah menara jam setinggi 26 meter di jantung Kota Bukittinggi. Dibangun pada 20 Juni 1926 pada masa pemerintahan Hindia Belanda, menara ini merupakan hadiah dari Ratu Wilhelmina. Keunikan konstruksinya: dibangun tanpa besi dan semen, hanya menggunakan campuran kapur, putih telur, dan pasir putih. Mesin jamnya berasal dari Jerman dan hanya diproduksi dua unit di dunia—satu untuk Jam Gadang, satu untuk Big Ben di London. Atapnya telah tiga kali berganti bentuk, dari kubah Eropa, pagoda, hingga gonjong Rumah Gadang.\n\nSumber:\n- Wikipedia: https://id.wikipedia.org/wiki/Jam_Gadang\n- Antara: https://www.antaranews.com"
            ],
            [
                'nama' => 'Danau Singkarak',
                'deskripsi' => "Danau Singkarak terletak di antara Kabupaten Solok dan Kabupaten Tanah Datar. Berbeda dengan Danau Maninjau dan Danau Toba yang vulkanik, Danau Singkarak terbentuk akibat proses tektonik yang dipicu oleh Sesar Sumatera. Danau ini terkenal dengan ikan bilih yang hanya hidup di danau ini dan jarang ditemukan di tempat lain. Selain menjadi sumber pengairan pertanian, danau ini juga dimanfaatkan sebagai pembangkit listrik.\n\nSumber:\n- Wikipedia: https://id.wikipedia.org/wiki/Danau_Singkarak\n- LIPI: https://www.limnologi.lipi.go.id"
            ]
        ];

        foreach ($destinasiData as $data) {
            DB::table('destinasis')
                ->where('nama', 'like', '%' . $data['nama'] . '%')
                ->update([
                    'deskripsi' => $data['deskripsi']
                ]);
        }
    }
}