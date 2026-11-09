<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KulinerDeskripsiSeeder extends Seeder
{
    public function run(): void
    {
        $kulinerData = [
            // ==================== ACEH ====================
            [
                'nama' => 'Mie Aceh',
                'deskripsi' => "Mie Aceh adalah kuliner khas Aceh yang lahir dari perpaduan budaya Tionghoa, India, dan Melayu. Mie berasal dari pengaruh Tionghoa, sementara kuah kari yang kaya rempah merupakan pengaruh masakan India. Pada abad ke-19, mie diperkenalkan oleh koloni Belanda dan pedagang Tionghoa, lalu diolah dengan cita rasa lokal Aceh yang kuat.\n\nMie Aceh tersedia dalam dua varian utama: goreng dan kuah, dengan pilihan daging sapi, kambing, atau seafood. Penggunaan daging sapi dan kambing mencerminkan nilai-nilai Islam yang dianut masyarakat Aceh.\n\nSumber:\n- Wikipedia: https://id.wikipedia.org/wiki/Mi_aceh\n- Good News From Indonesia: https://www.goodnewsfromindonesia.id\n- RRI: https://rri.co.id"
            ],
            [
                'nama' => 'Sate Matang',
                'deskripsi' => "Sate Matang adalah sate khas Aceh yang berasal dari daerah Matang, Kabupaten Bireuen. Sate ini terbuat dari daging sapi atau kambing yang dipotong kecil-kecil, ditusuk, lalu dibakar. Yang membedakan Sate Matang adalah bumbu kacangnya yang kental dan kaya rempah, serta disajikan dengan kuah gulai yang terpisah.\n\nSate Matang biasanya disantap dengan lontong atau nasi, dan menjadi salah satu kuliner malam favorit di Aceh.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Sate+Matang+Aceh"
            ],
            [
                'nama' => 'Ayam Tangkap',
                'deskripsi' => "Ayam Tangkap adalah hidangan khas Aceh yang unik. Ayam dimasak dengan bumbu rempah, lalu digoreng hingga kering. Ciri khasnya adalah taburan daun-daun rempah seperti daun kari, daun pandan, dan daun temurui (daun kari Aceh) yang digoreng garing bersama ayam.\n\nHidangan ini disebut \"tangkap\" karena dahulu ayam yang dimasak harus ditangkap terlebih dahulu sebelum digoreng. Ayam Tangkap biasanya disajikan dengan nasi hangat dan sambal.\n\nSumber:\n- RRI: https://rri.co.id\n- Forum Rakyat: https://forumrakyat.co.id"
            ],
            [
                'nama' => 'Kuah Beulangong',
                'deskripsi' => "Kuah Beulangong adalah gulai khas Aceh yang dimasak dalam kuali besar bernama \"beulangong\" untuk menampung lebih dari 200 porsi. Hidangan ini biasanya disajikan pada acara-acara besar seperti Maulid Nabi, pernikahan, dan Tahun Baru Islam.\n\nKuah Beulangong terbuat dari daging sapi atau kambing yang dimasak dengan santan dan rempah-rempah khas Aceh. Rasanya kaya dan menggugah selera, mencerminkan tradisi gotong royong dan kebersamaan masyarakat Aceh.\n\nSumber:\n- Forum Rakyat: https://forumrakyat.co.id\n- Talenta Conference Series USU: https://talentaconfseries.usu.ac.id"
            ],
            [
                'nama' => 'Sie Reuboh',
                'deskripsi' => "Sie Reuboh adalah makanan tradisional khas Aceh Besar yang terbuat dari olahan daging dan lemak sapi yang dimasak dengan bumbu rempah serta asam cuka aren. Hidangan ini telah ada sejak ratusan tahun dan pada abad ke-16 merupakan makanan kesukaan para raja-raja di Aceh.\n\nPada masa perang melawan Belanda (1873-1942), Sie Reuboh menjadi bekal para pejuang kemerdekaan yang bersembunyi di gunung. Kini, Sie Reuboh biasanya dimasak pada perayaan besar di daerah Aceh Besar.\n\nSumber:\n- Repository UIN Ar-Raniry: https://repository.ar-raniry.ac.id\n- IDN Times: https://www.idntimes.com"
            ],
            [
                'nama' => 'Keumamah',
                'deskripsi' => "Keumamah adalah kuliner khas Aceh yang terbuat dari ikan kayu (ikan tongkol atau tuna yang dikeringkan). Ikan ini direbus, kemudian dijemur hingga kering dan keras seperti kayu, sehingga bisa disimpan dalam waktu lama.\n\nKeumamah biasanya dimasak menjadi gulai atau tumis dengan bumbu rempah yang kuat. Hidangan ini telah diwariskan secara turun-temurun dan menjadi salah satu ikon kuliner Aceh yang tahan lama, cocok untuk bekal para nelayan dan pejuang pada masa lalu.\n\nSumber:\n- Journal Unigha: https://journal.unigha.ac.id\n- Pencarian Berita: https://www.google.com/search?q=Keumamah+Aceh"
            ],
            [
                'nama' => 'Asam Keueung',
                'deskripsi' => "Asam Keueung adalah masakan khas Aceh yang memiliki cita rasa asam dan pedas yang kuat. Hidangan ini terbuat dari ikan (biasanya ikan tongkol atau tuna) yang dimasak dengan bumbu asam (dari asam jawa atau belimbing wuluh) dan cabai.\n\nNama \"Keueung\" berasal dari bahasa Aceh yang berarti \"asam\". Asam Keueung biasanya disajikan dengan nasi hangat dan menjadi hidangan rumahan yang populer karena kesegaran rasanya.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Asam+Keueung+Aceh"
            ],
            [
                'nama' => 'Gulai Pliek U',
                'deskripsi' => "Gulai Pliek U adalah gulai khas Aceh yang menggunakan bumbu dasar unik bernama Pliek U (Patarana), yaitu hasil fermentasi kelapa tua selama tiga tahap. Pliek U memberikan rasa gurih dan aroma khas yang tidak ditemukan pada masakan daerah lain.\n\nGulai ini biasanya berisi ikan, sayuran, atau daging, dan dimasak dengan santan serta rempah-rempah. Gulai Pliek U merupakan salah satu warisan kuliner Aceh yang kaya akan cita rasa tradisional.\n\nSumber:\n- MGES Journals: https://mgesjournals.com\n- Pencarian Berita: https://www.google.com/search?q=Gulai+Pliek+U+Aceh"
            ],
            [
                'nama' => 'Gulai Itik',
                'deskripsi' => "Gulai Itik adalah hidangan khas Aceh yang terbuat dari daging bebek (itik) yang dimasak dalam kuah gulai kaya rempah. Daging itik yang empuk dan berlemak dipadukan dengan santan dan bumbu khas Aceh menghasilkan rasa yang gurih dan lezat.\n\nGulai Itik sering disajikan pada acara-acara keluarga atau perayaan tertentu, dan menjadi salah satu variasi gulai yang digemari di Aceh.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Gulai+Itik+Aceh"
            ],
            [
                'nama' => 'Gulai Kambing Aceh',
                'deskripsi' => "Gulai Kambing Aceh adalah hidangan gulai daging kambing yang dimasak dengan rempah-rempah khas Aceh. Kuahnya kental dan kaya rasa, dengan aroma rempah yang kuat seperti kapulaga, cengkeh, dan kayu manis.\n\nHidangan ini sering muncul pada acara-acara adat dan keagamaan, serta menjadi salah satu sajian favorit bagi pecinta daging kambing.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Gulai+Kambing+Aceh"
            ],
            [
                'nama' => 'Timphan',
                'deskripsi' => "Timphan adalah kue tradisional khas Aceh yang terbuat dari campuran tepung beras, pisang, dan kelapa, kemudian dibungkus dengan daun pisang dan dikukus. Kue ini memiliki tekstur lembut dan rasa manis yang alami dari pisang.\n\nTimphan sering disajikan pada acara-acara adat dan hari raya, dan menjadi salah satu jajanan pasar yang digemari di Aceh.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Timphan+Aceh"
            ],
            [
                'nama' => 'Meuseukat',
                'deskripsi' => "Meuseukat adalah kue tradisional khas Aceh yang terbuat dari bahan dasar tepung beras, gula, dan kelapa. Kue ini memiliki tekstur yang lembut dan kenyal, dengan rasa manis yang legit.\n\nMeuseukat sering disajikan sebagai hidangan penutup pada acara-acara adat dan keagamaan di Aceh.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Meuseukat+Aceh"
            ],
            [
                'nama' => 'Bada Reuteuk',
                'deskripsi' => "Bada Reuteuk adalah camilan khas Aceh yang terbuat dari ikan kecil (bada) yang digoreng garing dan dicampur dengan bumbu rempah. Camilan ini memiliki rasa gurih dan renyah, cocok disantap sebagai teman makan nasi atau sekadar camilan.\n\nBada Reuteuk sering dijual di pasar-pasar tradisional dan menjadi oleh-oleh khas dari Aceh.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Bada+Reuteuk+Aceh"
            ],
            [
                'nama' => 'Keukarah',
                'deskripsi' => "Keukarah adalah kue tradisional Aceh yang memiliki bentuk unik menyerupai sarang burung atau jaring. Kue ini terbuat dari tepung beras, santan, dan telur, kemudian digoreng dengan cetakan khusus hingga renyah.\n\nKeukarah sering disajikan pada acara-acara adat dan hari raya, dan menjadi salah satu kue kering khas Aceh yang memiliki nilai seni tinggi.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Keukarah+Aceh"
            ],
            [
                'nama' => 'Kue Adee',
                'deskripsi' => "Kue Adee adalah kue tradisional khas Aceh yang terbuat dari tepung beras, gula, dan kelapa. Kue ini memiliki tekstur yang lembut dan rasa manis yang khas.\n\nKue Adee sering disajikan pada acara-acara adat dan keagamaan, serta menjadi salah satu jajanan tradisional yang masih dilestarikan hingga kini.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Kue+Adee+Aceh"
            ],
            [
                'nama' => 'Pulut Dara',
                'deskripsi' => "Pulut Dara adalah kue tradisional Aceh yang terbuat dari ketan (pulut) yang dimasak dengan gula dan kelapa. Kue ini memiliki tekstur kenyal dan rasa manis yang legit.\n\nPulut Dara sering disajikan pada acara-acara adat pernikahan dan menjadi simbol harapan akan kebahagiaan dan kesuburan.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Pulut+Dara+Aceh"
            ],
            [
                'nama' => 'Apam Aceh',
                'deskripsi' => "Apam Aceh adalah kue tradisional khas Aceh yang terbuat dari tepung beras, santan, dan gula. Kue ini memiliki tekstur yang lembut dan rasa manis yang gurih.\n\nApam Aceh sering disajikan sebagai camilan pada acara-acara keluarga dan hari raya.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Apam+Aceh"
            ],
            [
                'nama' => 'Roti Cane',
                'deskripsi' => "Roti Cane adalah roti khas Aceh yang memiliki tekstur lembut dan rasa manis. Roti ini biasanya disajikan dengan kuah kari atau gulai, sehingga menciptakan perpaduan rasa yang unik antara roti dan kuah yang kaya rempah.\n\nRoti Cane sering menjadi menu sarapan atau camilan di Aceh.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Roti+Cane+Aceh"
            ],
            [
                'nama' => 'Mie Caluk',
                'deskripsi' => "Mie Caluk adalah mie khas Aceh yang disajikan dengan kuah kental dan bumbu rempah yang kuat. Mie ini biasanya berisi daging sapi atau ayam, serta dilengkapi dengan sayuran.\n\nMie Caluk memiliki cita rasa yang khas dan menjadi salah satu variasi mie yang digemari di Aceh.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Mie+Caluk+Aceh"
            ],
            [
                'nama' => 'Mie Kepiting',
                'deskripsi' => "Mie Kepiting adalah hidangan mie khas Aceh yang menggunakan daging kepiting segar sebagai bahan utamanya. Mie ini disajikan dengan kuah kental yang kaya rempah, menciptakan rasa gurih dan lezat.\n\nMie Kepiting menjadi salah satu kuliner istimewa di Aceh, terutama bagi pecinta seafood.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Mie+Kepiting+Aceh"
            ],
            [
                'nama' => 'Nasi Gurih Aceh',
                'deskripsi' => "Nasi Gurih Aceh adalah nasi yang dimasak dengan santan dan rempah-rempah, sehingga memiliki aroma dan rasa yang gurih. Nasi ini biasanya disajikan dengan lauk-pauk seperti ayam goreng, ikan, dan sambal.\n\nNasi Gurih Aceh sering menjadi hidangan pada acara-acara adat dan menjadi salah satu ikon kuliner Aceh.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Nasi+Gurih+Aceh"
            ],
            [
                'nama' => 'Bubu Kayu',
                'deskripsi' => "Bubu Kayu adalah kue tradisional Aceh yang terbuat dari tepung beras, gula, dan kelapa. Kue ini memiliki bentuk yang unik dan rasa yang manis.\n\nBubu Kayu sering disajikan pada acara-acara adat dan hari raya.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Bubu+Kayu+Aceh"
            ],
            [
                'nama' => 'Kanji Rumbi',
                'deskripsi' => "Kanji Rumbi adalah bubur khas Aceh yang terbuat dari beras, sayuran, dan rempah-rempah. Bubur ini biasanya disajikan pada bulan Ramadan sebagai menu berbuka puasa.\n\nKanji Rumbi memiliki rasa yang gurih dan hangat, serta menjadi salah satu hidangan tradisional yang dinantikan saat Ramadan.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Kanji+Rumbi+Aceh"
            ],
            [
                'nama' => 'Kue Bhoi',
                'deskripsi' => "Kue Bhoi adalah kue tradisional khas Aceh yang terbuat dari tepung beras, gula, dan kelapa. Kue ini memiliki tekstur yang lembut dan rasa manis.\n\nKue Bhoi sering disajikan pada acara-acara adat dan menjadi salah satu jajanan tradisional Aceh.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Kue+Bhoi+Aceh"
            ],
            [
                'nama' => 'Sate Gule',
                'deskripsi' => "Sate Gule adalah sate khas Aceh yang disajikan dengan kuah gulai. Sate ini terbuat dari daging sapi atau kambing yang dibakar, kemudian disiram dengan kuah gulai yang kaya rempah.\n\nSate Gule menjadi salah satu variasi sate yang unik dan menggugah selera di Aceh.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Sate+Gule+Aceh"
            ],
            [
                'nama' => 'Ikan Bakar Aceh',
                'deskripsi' => "Ikan Bakar Aceh adalah hidangan ikan yang dibakar dengan bumbu rempah khas Aceh. Ikan yang digunakan biasanya ikan segar dari laut, dan bumbunya meresap hingga ke dalam daging.\n\nIkan Bakar Aceh sering disajikan dengan sambal dan nasi hangat, menjadi hidangan favorit di warung-warung makan di Aceh.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Ikan+Bakar+Aceh"
            ],
            [
                'nama' => 'Gulai Tikungan',
                'deskripsi' => "Gulai Tikungan adalah gulai khas Aceh yang memiliki cita rasa unik. Nama \"Tikungan\" merujuk pada proses memasaknya yang menggunakan teknik khusus, atau mungkin terkait dengan lokasi asal gulai ini.\n\nGulai ini biasanya berisi ikan atau daging, dan dimasak dengan santan serta rempah-rempah pilihan.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Gulai+Tikungan+Aceh"
            ],
            [
                'nama' => 'Sie Kameng',
                'deskripsi' => "Sie Kameng adalah sebutan untuk olahan daging kambing dalam bahasa Aceh. Hidangan ini biasanya dimasak menjadi gulai atau tumis dengan bumbu rempah yang kuat.\n\nSie Kameng sering disajikan pada acara-acara adat dan keagamaan di Aceh.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Sie+Kameng+Aceh"
            ],
            [
                'nama' => 'Kue Pidie',
                'deskripsi' => "Kue Pidie adalah kue tradisional khas Aceh yang berasal dari Kabupaten Pidie. Kue ini terbuat dari tepung beras, gula, dan kelapa, dengan tekstur yang lembut dan rasa manis.\n\nKue Pidie menjadi salah satu jajanan tradisional yang populer di Aceh.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Kue+Pidie+Aceh"
            ],
            [
                'nama' => 'Halua Masam',
                'deskripsi' => "Halua Masam adalah manisan khas Aceh yang terbuat dari buah-buahan yang diasamkan atau difermentasi. Rasanya manis dan asam, menciptakan sensasi segar di mulut.\n\nHalua Masam sering disajikan sebagai camilan atau hidangan penutup.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Halua+Masam+Aceh"
            ],
            [
                'nama' => 'Kue Seupet',
                'deskripsi' => "Kue Seupet adalah kue tradisional Aceh yang terbuat dari tepung beras, gula, dan kelapa. Kue ini memiliki bentuk yang unik dan rasa yang manis.\n\nKue Seupet sering disajikan pada acara-acara adat dan hari raya.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Kue+Seupet+Aceh"
            ],
            [
                'nama' => 'Boh Punai',
                'deskripsi' => "Boh Punai adalah kue tradisional khas Aceh yang terbuat dari tepung beras, gula, dan kelapa. Kue ini memiliki tekstur yang lembut dan rasa manis.\n\nBoh Punai sering disajikan pada acara-acara adat dan menjadi salah satu jajanan tradisional Aceh.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Boh+Punai+Aceh"
            ],
            [
                'nama' => 'Bu Peuk',
                'deskripsi' => "Bu Peuk adalah kue tradisional Aceh yang terbuat dari tepung beras, gula, dan kelapa. Kue ini memiliki bentuk yang unik dan rasa yang manis.\n\nBu Peuk sering disajikan pada acara-acara adat dan hari raya.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Bu+Peuk+Aceh"
            ],
            [
                'nama' => 'Gulee Masam Keueng',
                'deskripsi' => "Gulee Masam Keueng adalah gulai khas Aceh yang memiliki rasa asam dan pedas yang kuat. Hidangan ini terbuat dari ikan atau daging yang dimasak dengan bumbu asam dan cabai.\n\nGulee Masam Keueng menjadi salah satu hidangan yang menggugah selera karena perpaduan rasa asam dan pedasnya.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Gulee+Masam+Keueng+Aceh"
            ],
            [
                'nama' => 'Asam Padeh',
                'deskripsi' => "Asam Padeh adalah masakan khas Aceh yang memiliki cita rasa asam dan pedas. Hidangan ini terbuat dari ikan atau daging yang dimasak dengan bumbu asam (dari asam jawa atau belimbing wuluh) dan cabai.\n\nAsam Padeh sering disajikan dengan nasi hangat dan menjadi hidangan rumahan yang populer.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Asam+Padeh+Aceh"
            ],
            [
                'nama' => 'Pukat Ikan',
                'deskripsi' => "Pukat Ikan adalah hidangan khas Aceh yang terbuat dari ikan yang dimasak dengan bumbu rempah dan santan. Nama \"Pukat\" mungkin merujuk pada cara memasaknya atau alat yang digunakan.\n\nPukat Ikan menjadi salah satu variasi olahan ikan yang digemari di Aceh.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Pukat+Ikan+Aceh"
            ],
            [
                'nama' => 'Sate Beulangong',
                'deskripsi' => "Sate Beulangong adalah sate khas Aceh yang disajikan dalam kuali besar (beulangong). Sate ini terbuat dari daging sapi atau kambing yang dibakar, kemudian disiram dengan kuah gulai yang kaya rempah.\n\nSate Beulangong sering disajikan pada acara-acara besar dan menjadi hidangan yang menggugah selera.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Sate+Beulangong+Aceh"
            ],
            [
                'nama' => 'Eungkot Keumamah',
                'deskripsi' => "Eungkot Keumamah adalah sebutan lain untuk Keumamah, yaitu kuliner khas Aceh yang terbuat dari ikan kayu (ikan tongkol atau tuna yang dikeringkan). Ikan ini dimasak menjadi gulai atau tumis dengan bumbu rempah yang kuat.\n\nEungkot Keumamah telah diwariskan secara turun-temurun dan menjadi salah satu ikon kuliner Aceh.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Eungkot+Keumamah+Aceh"
            ],
            [
                'nama' => 'Timphan Labu',
                'deskripsi' => "Timphan Labu adalah variasi Timphan, kue tradisional Aceh yang terbuat dari tepung beras, pisang, dan kelapa, dengan tambahan labu. Kue ini dibungkus daun pisang dan dikukus, memiliki tekstur lembut dan rasa manis yang alami.\n\nTimphan Labu sering disajikan pada acara-acara adat dan hari raya.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Timphan+Labu+Aceh"
            ],
            [
                'nama' => 'Bungong Keupula',
                'deskripsi' => "Bungong Keupula adalah kue tradisional khas Aceh yang berbentuk bunga (bungong). Kue ini terbuat dari tepung beras, gula, dan kelapa, dengan tekstur yang lembut dan rasa manis.\n\nBungong Keupula sering disajikan pada acara-acara adat dan menjadi salah satu jajanan tradisional Aceh.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Bungong+Keupula+Aceh"
            ],
            [
                'nama' => 'Pisang Goreng Aceh',
                'deskripsi' => "Pisang Goreng Aceh adalah camilan khas Aceh yang terbuat dari pisang yang digoreng dengan adonan tepung. Pisang Goreng Aceh memiliki tekstur renyah di luar dan lembut di dalam.\n\nCamilan ini sering dijual di pasar-pasar tradisional dan menjadi teman minum teh atau kopi.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Pisang+Goreng+Aceh"
            ],
            [
                'nama' => 'Kue Karah',
                'deskripsi' => "Kue Karah adalah kue tradisional Aceh yang terbuat dari tepung beras, gula, dan kelapa. Kue ini memiliki tekstur yang renyah dan rasa manis.\n\nKue Karah sering disajikan pada acara-acara adat dan hari raya.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Kue+Karah+Aceh"
            ],
            [
                'nama' => 'Sate Meuraksa',
                'deskripsi' => "Sate Meuraksa adalah sate khas Aceh yang terbuat dari daging sapi atau kambing yang dibakar dengan bumbu rempah. Sate ini memiliki cita rasa yang khas dan menggugah selera.\n\nSate Meuraksa sering disajikan pada acara-acara adat dan menjadi salah satu kuliner favorit di Aceh.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Sate+Meuraksa+Aceh"
            ],
            [
                'nama' => 'Nasi Biryani Aceh',
                'deskripsi' => "Nasi Biryani Aceh adalah hidangan nasi yang dimasak dengan rempah-rempah khas Aceh dan pengaruh budaya India. Nasi ini biasanya disajikan dengan daging kambing atau ayam, serta dilengkapi dengan acar dan kerupuk.\n\nNasi Biryani Aceh menjadi salah satu hidangan istimewa pada acara-acara adat dan keagamaan.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Nasi+Biryani+Aceh"
            ],
            [
                'nama' => 'Kuwah Beulangong',
                'deskripsi' => "Kuwah Beulangong adalah variasi penulisan dari Kuah Beulangong, gulai khas Aceh yang dimasak dalam kuali besar (beulangong). Hidangan ini biasanya disajikan pada acara-acara besar seperti Maulid Nabi dan pernikahan.\n\nKuwah Beulangong terbuat dari daging sapi atau kambing yang dimasak dengan santan dan rempah-rempah khas Aceh.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Kuwah+Beulangong+Aceh"
            ],
            [
                'nama' => 'Gulee Itek',
                'deskripsi' => "Gulee Itek adalah sebutan dalam bahasa Aceh untuk Gulai Itik, hidangan khas Aceh yang terbuat dari daging bebek yang dimasak dalam kuah gulai kaya rempah. Daging bebek yang empuk dipadukan dengan santan dan bumbu khas Aceh.\n\nGulee Itek sering disajikan pada acara-acara keluarga atau perayaan tertentu.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Gulee+Itek+Aceh"
            ],
            [
                'nama' => 'Bakso Aceh',
                'deskripsi' => "Bakso Aceh adalah bakso khas Aceh yang terbuat dari daging sapi giling yang kenyal dan disajikan dengan kuah kaldu yang gurih. Bakso Aceh biasanya dilengkapi dengan mie, bihun, atau nasi.\n\nBakso Aceh menjadi salah satu kuliner favorit di Aceh, terutama saat cuaca dingin atau sebagai makanan malam.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Bakso+Aceh"
            ],
            [
                'nama' => 'Gulai Kemah',
                'deskripsi' => "Gulai Kemah adalah gulai khas Aceh yang terbuat dari ikan atau daging yang dimasak dengan santan dan rempah-rempah. Nama \"Kemah\" mungkin merujuk pada daerah asal atau cara memasaknya.\n\nGulai Kemah menjadi salah satu variasi gulai yang digemari di Aceh.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Gulai+Kemah+Aceh"
            ],
            [
                'nama' => 'Kue Bungkus',
                'deskripsi' => "Kue Bungkus adalah kue tradisional Aceh yang terbuat dari tepung beras, gula, dan kelapa, kemudian dibungkus dengan daun pisang. Kue ini memiliki tekstur lembut dan rasa manis.\n\nKue Bungkus sering disajikan pada acara-acara adat dan hari raya.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Kue+Bungkus+Aceh"
            ],
            [
                'nama' => 'Kue Bungong Keupula',
                'deskripsi' => "Kue Bungong Keupula adalah variasi lain dari kue tradisional Aceh yang berbentuk bunga. Kue ini terbuat dari tepung beras, gula, dan kelapa, dengan tekstur lembut dan rasa manis.\n\nKue Bungong Keupula sering disajikan pada acara-acara adat dan menjadi salah satu jajanan tradisional Aceh.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Kue+Bungong+Keupula+Aceh"
            ],
            // ==================== SUMATERA UTARA ====================
            [
                'nama' => 'Bika Ambon',
                'deskripsi' => "Bika Ambon adalah kue khas Sumatera Utara, khususnya Medan, yang terbuat dari campuran tepung kanji, gula, santan, dan telur. Meskipun namanya \"Ambon\", kue ini tidak berasal dari Ambon, melainkan dari Medan. Teksturnya kenyal dan berpori, dengan rasa manis yang legit.\n\nBika Ambon sering disajikan sebagai oleh-oleh khas Medan dan menjadi salah satu kue tradisional yang populer di Indonesia.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Bika+Ambon+Medan"
            ],
            [
                'nama' => 'Ikan Mas Arsik',
                'deskripsi' => "Ikan Mas Arsik adalah hidangan khas Batak Toba yang terbuat dari ikan mas yang dimasak dengan bumbu andaliman, kunyit, dan asam cikala. Ikan ini dimasak hingga kuahnya menyusut dan bumbunya meresap.\n\nArsik memiliki makna filosofis bagi masyarakat Batak, yaitu harapan akan kehidupan yang panjang dan keturunan yang banyak. Hidangan ini sering disajikan pada acara-acara adat Batak.\n\nSumber:\n- JICNusantara: https://jicnusantara.com\n- Pencarian Berita: https://www.google.com/search?q=Ikan+Mas+Arsik+Batak"
            ],
            [
                'nama' => 'Mie Gomak',
                'deskripsi' => "Mie Gomak adalah mie khas Batak Toba yang berasal dari kawasan sekitar Danau Toba. Nama \"Gomak\" berasal dari bahasa Batak yang berarti \"diremas\" atau \"diambil\", merujuk pada cara menyajikan mie yang diremas dengan tangan.\n\nMie Gomak biasanya disajikan dengan kuah kental berbumbu andaliman dan santan, serta dilengkapi dengan sayuran. Mie ini menjadi simbol identitas budaya masyarakat Batak yang tetap bertahan hingga kini.\n\nSumber:\n- OJS PNB: https://ojs2.pnb.ac.id\n- Jurnal HST: https://oaj.jurnalhst.com\n- Negeri Kami: https://negerikami.id"
            ],
            [
                'nama' => 'Saksang',
                'deskripsi' => "Saksang adalah hidangan khas Batak yang terbuat dari daging babi atau anjing yang dimasak dengan darah dan rempah-rempah. Hidangan ini memiliki rasa yang kuat dan sering disajikan pada acara-acara adat Batak.\n\nSaksang memiliki makna simbolis dalam budaya Batak, yaitu sebagai simbol keberanian dan kejantanan. Namun, seiring waktu, hidangan ini juga tersedia dalam versi halal dengan menggunakan daging sapi atau ayam.\n\nSumber:\n- Zenodo: https://zenodo.org\n- Pencarian Berita: https://www.google.com/search?q=Saksang+Batak"
            ],
            [
                'nama' => 'Naniura',
                'deskripsi' => "Naniura adalah hidangan khas Batak Toba yang terbuat dari ikan mas mentah yang diasamkan dengan jeruk nipis dan bumbu rempah. Hidangan ini mirip dengan sashimi Jepang, namun dengan cita rasa Batak yang kuat.\n\nSecara historis, Naniura merupakan hidangan yang diperuntukkan bagi raja dan tamu agung. Kini, Naniura menjadi salah satu kuliner khas Batak yang sering disajikan pada acara-acara adat.\n\nSumber:\n- Zenodo: https://zenodo.org\n- Pencarian Berita: https://www.google.com/search?q=Naniura+Batak"
            ],
            [
                'nama' => 'Dali Ni Horbo',
                'deskripsi' => "Dali Ni Horbo adalah hidangan khas Batak yang terbuat dari susu kerbau yang difermentasi. Hidangan ini memiliki tekstur lembut dan rasa yang unik, sering disajikan sebagai lauk atau camilan.\n\nDali Ni Horbo merupakan salah satu warisan kuliner Batak yang masih dilestarikan hingga kini.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Dali+Ni+Horbo+Batak"
            ],
            [
                'nama' => 'Napinadar',
                'deskripsi' => "Napinadar adalah hidangan khas Batak Toba yang terbuat dari daging ayam yang dimasak dengan darah dan rempah-rempah. Hidangan ini memiliki rasa yang kuat dan sering disajikan pada acara-acara adat Batak.\n\nNapinadar memiliki kemiripan dengan Saksang, namun menggunakan daging ayam sebagai bahan utamanya.\n\nSumber:\n- Zenodo: https://zenodo.org\n- Journal Unpas: https://journal.unpas.ac.id"
            ],
            [
                'nama' => 'Babi Panggang Karo',
                'deskripsi' => "Babi Panggang Karo adalah hidangan khas suku Batak Karo yang terbuat dari daging babi yang dipanggang dengan bumbu rempah. Hidangan ini sering disajikan pada acara-acara adat Karo.\n\nBabi Panggang Karo memiliki cita rasa yang khas dan menjadi salah satu kuliner ikonik dari Sumatera Utara.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Babi+Panggang+Karo"
            ],
            [
                'nama' => 'Lontong Medan',
                'deskripsi' => "Lontong Medan adalah hidangan khas Medan yang terdiri dari lontong (beras yang dibungkus daun pisang dan dikukus) yang disajikan dengan kuah sayur, mie, dan lauk-pauk seperti telur, tahu, dan tempe.\n\nLontong Medan menjadi salah satu menu sarapan favorit di Medan.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Lontong+Medan"
            ],
            [
                'nama' => 'Soto Medan',
                'deskripsi' => "Soto Medan adalah soto khas Medan yang memiliki kuah kental dan kaya rempah, terbuat dari santan dan kaldu daging sapi atau ayam. Soto ini biasanya berisi daging, kentang, dan sayuran.\n\nSoto Medan menjadi salah satu kuliner favorit di Medan, terutama saat sarapan.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Soto+Medan"
            ],
            [
                'nama' => 'Gulai Kambing Medan',
                'deskripsi' => "Gulai Kambing Medan adalah gulai daging kambing yang dimasak dengan rempah-rempah khas Medan. Kuahnya kental dan gurih, dengan aroma rempah yang kuat.\n\nGulai Kambing Medan sering disajikan pada acara-acara adat dan keagamaan.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Gulai+Kambing+Medan"
            ],
            [
                'nama' => 'Mie Sop Medan',
                'deskripsi' => "Mie Sop Medan adalah mie khas Medan yang disajikan dengan kuah sop yang gurih dan kaya rempah. Mie ini biasanya berisi daging sapi, ayam, atau kambing, serta dilengkapi dengan sayuran.\n\nMie Sop Medan menjadi salah satu kuliner favorit di Medan.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Mie+Sop+Medan"
            ],
            [
                'nama' => 'Bihun Bebek',
                'deskripsi' => "Bihun Bebek adalah hidangan khas Medan yang terbuat dari bihun yang disajikan dengan daging bebek yang empuk dan kuah kaldu yang gurih.\n\nBihun Bebek menjadi salah satu kuliner istimewa di Medan.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Bihun+Bebek+Medan"
            ],
            [
                'nama' => 'Roti Ketawa',
                'deskripsi' => "Roti Ketawa adalah kue kering khas Medan yang terbuat dari tepung, gula, dan telur. Kue ini memiliki bentuk yang unik dan rasa manis.\n\nRoti Ketawa sering disajikan sebagai camilan atau oleh-oleh khas Medan.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Roti+Ketawa+Medan"
            ],
            [
                'nama' => 'Ombus-ombus',
                'deskripsi' => "Ombus-ombus adalah kue tradisional khas Batak yang terbuat dari tepung beras, gula, dan kelapa. Kue ini dibungkus dengan daun pisang dan dikukus, memiliki tekstur lembut dan rasa manis.\n\nOmbus-ombus sering disajikan pada acara-acara adat Batak.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Ombus-ombus+Batak"
            ],
            [
                'nama' => 'Kue Lapet',
                'deskripsi' => "Kue Lapet adalah kue tradisional khas Batak yang terbuat dari tepung beras, gula, dan kelapa. Kue ini dibungkus dengan daun pisang dan dikukus.\n\nKue Lapet sering disajikan pada acara-acara adat Batak.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Kue+Lapet+Batak"
            ],
            [
                'nama' => 'Pohulpohul',
                'deskripsi' => "Pohulpohul adalah kue tradisional khas Batak yang terbuat dari tepung beras, gula, dan kelapa. Kue ini memiliki tekstur yang lembut dan rasa manis.\n\nPohulpohul sering disajikan pada acara-acara adat Batak.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Pohulpohul+Batak"
            ],
            [
                'nama' => 'Nasi Gurih Medan',
                'deskripsi' => "Nasi Gurih Medan adalah nasi yang dimasak dengan santan dan rempah-rempah, sehingga memiliki aroma dan rasa yang gurih. Nasi ini biasanya disajikan dengan lauk-pauk seperti ayam goreng, ikan, dan sambal.\n\nNasi Gurih Medan sering menjadi hidangan pada acara-acara adat.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Nasi+Gurih+Medan"
            ],
            [
                'nama' => 'Gule Ikan Mas',
                'deskripsi' => "Gule Ikan Mas adalah gulai ikan mas khas Sumatera Utara yang dimasak dengan santan dan rempah-rempah. Ikan mas yang digunakan biasanya ikan segar dari danau atau kolam.\n\nGule Ikan Mas sering disajikan pada acara-acara keluarga dan adat.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Gule+Ikan+Mas+Medan"
            ],
            [
                'nama' => 'Manuk Napinadar',
                'deskripsi' => "Manuk Napinadar adalah sebutan lain untuk Napinadar, hidangan khas Batak Toba yang terbuat dari daging ayam yang dimasak dengan darah dan rempah-rempah. Hidangan ini memiliki rasa yang kuat dan sering disajikan pada acara-acara adat Batak.\n\nSumber:\n- Journal Unpas: https://journal.unpas.ac.id\n- Zenodo: https://zenodo.org"
            ],
            [
                'nama' => 'Bulung Gadung',
                'deskripsi' => "Bulung Gadung adalah sayuran khas Batak yang terbuat dari daun gadung yang dimasak dengan bumbu rempah. Sayuran ini sering disajikan sebagai pendamping makan nasi.\n\nBulung Gadung menjadi salah satu kuliner tradisional Batak yang masih dilestarikan.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Bulung+Gadung+Batak"
            ],
            [
                'nama' => 'Sayur Daun Ubi Tumbuk',
                'deskripsi' => "Sayur Daun Ubi Tumbuk adalah sayuran khas Batak yang terbuat dari daun ubi (singkong) yang ditumbuk dan dimasak dengan bumbu rempah. Sayuran ini memiliki tekstur yang lembut dan rasa yang gurih.\n\nSayur Daun Ubi Tumbuk sering disajikan sebagai pendamping makan nasi.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Sayur+Daun+Ubi+Tumbuk+Batak"
            ],
            [
                'nama' => 'Sambal Andalias',
                'deskripsi' => "Sambal Andalias adalah sambal khas Batak yang terbuat dari cabai, bawang, dan bumbu rempah lainnya. Sambal ini memiliki rasa pedas yang kuat dan sering disajikan sebagai pendamping makan nasi.\n\nSambal Andalias menjadi salah satu sambal favorit di Sumatera Utara.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Sambal+Andalias+Batak"
            ],
            [
                'nama' => 'Arsik Kepala Ikan',
                'deskripsi' => "Arsik Kepala Ikan adalah variasi dari Ikan Mas Arsik yang menggunakan kepala ikan sebagai bahan utama. Hidangan ini dimasak dengan bumbu andaliman dan rempah-rempah khas Batak.\n\nArsik Kepala Ikan sering disajikan pada acara-acara adat Batak.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Arsik+Kepala+Ikan+Batak"
            ],
            [
                'nama' => 'Mie Kocok Medan',
                'deskripsi' => "Mie Kocok Medan adalah mie khas Medan yang disajikan dengan kuah kaldu sapi yang gurih dan kaya rempah. Mie ini biasanya berisi daging sapi, tauge, dan bawang goreng.\n\nMie Kocok Medan menjadi salah satu kuliner favorit di Medan.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Mie+Kocok+Medan"
            ],
            [
                'nama' => 'Kwetiau Medan',
                'deskripsi' => "Kwetiau Medan adalah kwetiau khas Medan yang digoreng dengan bumbu rempah dan disajikan dengan daging sapi, ayam, atau seafood. Kwetiau ini memiliki cita rasa yang khas dan menggugah selera.\n\nKwetiau Medan menjadi salah satu kuliner favorit di Medan.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Kwetiau+Medan"
            ],
            [
                'nama' => 'Sate Kerang Medan',
                'deskripsi' => "Sate Kerang Medan adalah sate khas Medan yang terbuat dari kerang yang ditusuk dan dibakar, kemudian disiram dengan bumbu kacang atau kuah gulai.\n\nSate Kerang Medan menjadi salah satu kuliner unik dan favorit di Medan.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Sate+Kerang+Medan"
            ],
            [
                'nama' => 'Uceng Goreng',
                'deskripsi' => "Uceng Goreng adalah camilan khas Medan yang terbuat dari uceng (sejenis ikan kecil) yang digoreng garing dan dicampur dengan bumbu rempah.\n\nUceng Goreng menjadi salah satu camilan favorit di Medan.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Uceng+Goreng+Medan"
            ],
            [
                'nama' => 'Gulai Tunjang',
                'deskripsi' => "Gulai Tunjang adalah gulai khas Sumatera Utara yang terbuat dari tunjang (kaki sapi) yang dimasak dengan santan dan rempah-rempah. Kuahnya kental dan gurih, dengan tekstur tunjang yang empuk.\n\nGulai Tunjang sering disajikan pada acara-acara adat dan keagamaan.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Gulai+Tunjang+Medan"
            ],
            [
                'nama' => 'Mie Balap',
                'deskripsi' => "Mie Balap adalah mie khas Medan yang disajikan dengan kuah kental dan bumbu rempah yang kuat. Mie ini biasanya berisi daging sapi, ayam, atau seafood.\n\nMie Balap menjadi salah satu kuliner favorit di Medan.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Mie+Balap+Medan"
            ],
            [
                'nama' => 'Lontong Sayur Medan',
                'deskripsi' => "Lontong Sayur Medan adalah hidangan khas Medan yang terdiri dari lontong yang disajikan dengan kuah sayur santan dan lauk-pauk seperti telur, tahu, dan tempe.\n\nLontong Sayur Medan menjadi salah satu menu sarapan favorit di Medan.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Lontong+Sayur+Medan"
            ],
            [
                'nama' => 'Teri Goreng',
                'deskripsi' => "Teri Goreng adalah camilan khas Medan yang terbuat dari ikan teri yang digoreng garing dan dicampur dengan bumbu rempah.\n\nTeri Goreng menjadi salah satu camilan favorit di Medan.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Teri+Goreng+Medan"
            ],
            [
                'nama' => 'Kue Putu Medan',
                'deskripsi' => "Kue Putu Medan adalah kue tradisional khas Medan yang terbuat dari tepung beras, gula merah, dan kelapa. Kue ini dikukus dan memiliki tekstur lembut dengan rasa manis.\n\nKue Putu Medan sering disajikan sebagai camilan.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Kue+Putu+Medan"
            ],
            [
                'nama' => 'Bolu Meranti',
                'deskripsi' => "Bolu Meranti adalah kue bolu khas Medan yang terkenal dengan teksturnya yang lembut dan rasa yang manis. Bolu ini sering dijadikan oleh-oleh khas Medan.\n\nBolu Meranti menjadi salah satu kue favorit di Medan.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Bolu+Meranti+Medan"
            ],
            [
                'nama' => 'Kue Talam Medan',
                'deskripsi' => "Kue Talam Medan adalah kue tradisional khas Medan yang terbuat dari tepung beras, santan, dan gula. Kue ini memiliki dua lapisan dengan tekstur yang lembut.\n\nKue Talam Medan sering disajikan sebagai camilan.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Kue+Talam+Medan"
            ],
            [
                'nama' => 'Gulai Kepala Ikan',
                'deskripsi' => "Gulai Kepala Ikan adalah gulai khas Sumatera Utara yang menggunakan kepala ikan (biasanya ikan kakap atau gurame) sebagai bahan utama. Kepala ikan dimasak dengan santan dan rempah-rempah hingga kuahnya kental dan gurih.\n\nGulai Kepala Ikan sering disajikan pada acara-acara keluarga dan adat.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Gulai+Kepala+Ikan+Medan"
            ],
            [
                'nama' => 'Martabak Medan',
                'deskripsi' => "Martabak Medan adalah martabak khas Medan yang memiliki cita rasa yang khas. Martabak ini biasanya berisi daging, telur, dan sayuran, disajikan dengan kuah kari.\n\nMartabak Medan menjadi salah satu kuliner favorit di Medan.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Martabak+Medan"
            ],
            [
                'nama' => 'Sambal Teri',
                'deskripsi' => "Sambal Teri adalah sambal khas Medan yang terbuat dari ikan teri yang digoreng dan dicampur dengan cabai dan bumbu rempah. Sambal ini memiliki rasa pedas dan gurih.\n\nSambal Teri sering disajikan sebagai pendamping makan nasi.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Sambal+Teri+Medan"
            ],
            [
                'nama' => 'Gulai Nangka',
                'deskripsi' => "Gulai Nangka adalah gulai khas Sumatera Utara yang terbuat dari nangka muda yang dimasak dengan santan dan rempah-rempah. Gulai ini memiliki rasa gurih dan tekstur nangka yang lembut.\n\nGulai Nangka sering disajikan sebagai lauk makan nasi.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Gulai+Nangka+Medan"
            ],
            [
                'nama' => 'Kue Cucur Medan',
                'deskripsi' => "Kue Cucur Medan adalah kue tradisional khas Medan yang terbuat dari tepung beras, gula merah, dan kelapa. Kue ini memiliki tekstur yang renyah di pinggir dan lembut di tengah.\n\nKue Cucur Medan sering disajikan sebagai camilan.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Kue+Cucur+Medan"
            ],
            [
                'nama' => 'Bihun Goreng Medan',
                'deskripsi' => "Bihun Goreng Medan adalah bihun yang digoreng dengan bumbu rempah dan disajikan dengan daging, sayuran, dan telur. Bihun ini memiliki cita rasa yang khas dan menggugah selera.\n\nBihun Goreng Medan menjadi salah satu kuliner favorit di Medan.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Bihun+Goreng+Medan"
            ],
            [
                'nama' => 'Kue Pancong',
                'deskripsi' => "Kue Pancong adalah kue tradisional khas Medan yang terbuat dari tepung beras, santan, dan kelapa. Kue ini memiliki bentuk yang unik dan rasa yang gurih.\n\nKue Pancong sering disajikan sebagai camilan.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Kue+Pancong+Medan"
            ],
            [
                'nama' => 'Ikan Teri Kering',
                'deskripsi' => "Ikan Teri Kering adalah camilan khas Medan yang terbuat dari ikan teri yang dikeringkan dan digoreng garing. Camilan ini memiliki rasa gurih dan renyah.\n\nIkan Teri Kering sering disajikan sebagai teman makan nasi atau camilan.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Ikan+Teri+Kering+Medan"
            ],
            [
                'nama' => 'Roti Ketawa Kecil',
                'deskripsi' => "Roti Ketawa Kecil adalah variasi dari Roti Ketawa, kue kering khas Medan yang terbuat dari tepung, gula, dan telur. Bentuknya lebih kecil dan sering disajikan sebagai camilan.\n\nRoti Ketawa Kecil menjadi salah satu oleh-oleh khas Medan.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Roti+Ketawa+Kecil+Medan"
            ],
            [
                'nama' => 'Kue Lapis Medan',
                'deskripsi' => "Kue Lapis Medan adalah kue tradisional khas Medan yang terbuat dari tepung beras, santan, dan gula. Kue ini memiliki lapisan-lapisan warna yang cantik dan tekstur yang lembut.\n\nKue Lapis Medan sering disajikan sebagai camilan.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Kue+Lapis+Medan"
            ],
            [
                'nama' => 'Pisang Goreng Medan',
                'deskripsi' => "Pisang Goreng Medan adalah camilan khas Medan yang terbuat dari pisang yang digoreng dengan adonan tepung. Pisang Goreng Medan memiliki tekstur renyah di luar dan lembut di dalam.\n\nCamilan ini sering dijual di pasar-pasar tradisional dan menjadi teman minum teh atau kopi.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Pisang+Goreng+Medan"
            ],
            [
                'nama' => 'Gulai Daun Singkong',
                'deskripsi' => "Gulai Daun Singkong adalah gulai khas Sumatera Utara yang terbuat dari daun singkong yang dimasak dengan santan dan rempah-rempah. Gulai ini memiliki rasa gurih dan tekstur daun singkong yang lembut.\n\nGulai Daun Singkong sering disajikan sebagai lauk makan nasi.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Gulai+Daun+Singkong+Medan"
            ],
            [
                'nama' => 'Sate Kerbau',
                'deskripsi' => "Sate Kerbau adalah sate khas Sumatera Utara yang terbuat dari daging kerbau yang ditusuk dan dibakar, kemudian disiram dengan bumbu kacang atau kuah gulai.\n\nSate Kerbau menjadi salah satu kuliner unik dan favorit di Sumatera Utara.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Sate+Kerbau+Medan"
            ],
            [
                'nama' => 'Kopi Sidikalang',
                'deskripsi' => "Kopi Sidikalang adalah kopi khas Sumatera Utara yang berasal dari daerah Sidikalang, Dairi. Kopi ini memiliki cita rasa yang kuat dan aroma yang khas, menjadikannya salah satu kopi terbaik di Indonesia.\n\nKopi Sidikalang sering dinikmati sebagai minuman penyegar.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Kopi+Sidikalang"
            ],
            [
                'nama' => 'Bolu Kemojo Medan',
                'deskripsi' => "Bolu Kemojo Medan adalah kue bolu khas Medan yang terbuat dari tepung, telur, dan santan. Bolu ini memiliki tekstur yang lembut dan rasa yang manis.\n\nBolu Kemojo Medan sering disajikan sebagai camilan atau oleh-oleh khas Medan.\n\nSumber:\n- Pencarian Berita: https://www.google.com/search?q=Bolu+Kemojo+Medan"
            ],
            // ==================== SUMATERA BARAT ====================
            [
                'nama' => 'Rendang',
                'deskripsi' => "Rendang adalah hidangan khas Minangkabau yang telah diakui dunia. Rendang berasal dari kata \"marandang\", yaitu proses memasak daging dengan santan dan rempah-rempah hingga kuahnya menyusut dan bumbunya meresap. Proses ini memakan waktu berjam-jam.\n\nRendang diperkirakan telah ada sejak abad ke-16 dan menjadi bekal para perantau Minang. Hidangan ini bukan sekadar makanan, melainkan simbol kebersamaan, kesabaran, dan keuletan masyarakat Minangkabau. Rendang sering disajikan pada acara-acara adat dan keagamaan.\n\nSumber:\n- Tirto: https://tirto.id\n- Tribun Batam: https://batam.tribunnews.com\n- Saribundo: https://www.saribundo.id"
            ],
            [
                'nama' => 'Sate Padang',
                'deskripsi' => "Sate Padang adalah sate khas Minangkabau yang terbuat dari daging sapi, lidah sapi, atau ayam yang ditusuk dan dibakar, kemudian disiram dengan kuah kental berbumbu rempah. Kuahnya berwarna kuning kecokelatan dan memiliki rasa yang kuat.\n\nSate Padang menjadi salah satu kuliner ikonik dari Sumatera Barat yang telah mendunia.\n\nSumber:\n- Medium: https://medium.com\n- Pencarian Berita: https://www.google.com/search?q=Sate+Padang"
            ],
            [
                'nama' => 'Dendeng Balado',
                'deskripsi' => "Dendeng Balado adalah hidangan khas Minangkabau yang terbuat dari daging sapi yang diiris tipis, dikeringkan, lalu digoreng dan dimasak dengan bumbu balado (cabai giling, bawang merah, bawang putih, dan perasan jeruk nipis).\n\nDendeng Balado memiliki rasa pedas, gurih, dan sedikit asam. Hidangan ini sering disajikan pada acara-acara adat dan menjadi lauk favorit di rumah makan Padang.\n\nSumber:\n- Bangkapos: https://bangka.tribunnews.com\n- Pencarian Berita: https://www.google.com/search?q=Dendeng+Balado"
            ],
            [
                'nama' => 'Ayam Pop',
                'deskripsi' => "Ayam Pop adalah hidangan khas Minangkabau yang relatif baru. Ayam Pop berasal dari Restoran Family Benteng Indah di Bukittinggi yang berdiri sejak 1963. Konon, hidangan ini diciptakan pada pertengahan abad ke-20 ketika bahan-bahan makanan cukup terbatas, sehingga masyarakat Minang berkreasi dengan air kelapa.\n\nAyam Pop adalah ayam yang direbus dengan air kelapa dan bumbu, lalu digoreng sebentar. Rasanya gurih dan tidak terlalu berminyak, sering disajikan dengan sambal dan daun singkong.\n\nSumber:\n- Kompasiana: https://www.kompasiana.com\n- Top Satu: https://www.topsatu.com\n- Medium: https://medium.com"
            ]
        ];

        foreach ($kulinerData as $data) {
            DB::table('kuliners')
                ->where('nama', 'like', '%' . $data['nama'] . '%')
                ->update([
                    'deskripsi' => $data['deskripsi']
                ]);
        }
    }
}