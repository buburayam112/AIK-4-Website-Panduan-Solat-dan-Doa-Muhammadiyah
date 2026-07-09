<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;
use App\Models\Gerakan;
use App\Models\Bacaan;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Bersihkan data lama
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Kategori::truncate();
        Gerakan::truncate();
        Bacaan::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 1. Buat Kategori Utama
        $dewasa = Kategori::create(['nama' => 'Dewasa']);
        $anak   = Kategori::create(['nama' => 'Anak-anak']);

        // ==========================================
        // 1. TAKBIRATUL IHRAM
        // ==========================================
        $g1 = Gerakan::create([
            'id_kategori' => $dewasa->id,
            'nama'        => 'Takbiratul Ihram',
            'urutan'      => 1,
            'deskripsi'   => 'Mengangkat kedua tangan sejajar dengan bahu atau telinga seraya mengucapkan takbir.',
            'video_url'   => 'assets/videos/takbir.mp4',
            'gambar_url'  => null,
        ]);
        Bacaan::create([
            'id_gerakan' => $g1->id, 'urutan' => 1,
            'teks_arab'  => 'اللهُ أَكْبَرُ',
            'teks_latin' => 'Allāhu akbar',
            'terjemahan' => 'Allah Maha Besar.',
            'sumber'     => 'HPT Muhammadiyah',
            'audio_url'  => 'assets/audios/takbir.mp3', 
        ]);

        // ==========================================
        // 2. MEMBACA AL-FATIHAH & SURAH PENDEK
        // ==========================================
        $g2 = Gerakan::create([
            'id_kategori' => $dewasa->id,
            'nama'        => 'Membaca Al-Fatihah',
            'urutan'      => 2,
            'deskripsi'   => 'Bersedekap di dada kemudian membaca Surat Al-Fatihah (setelah itu dapat dilanjutkan dengan surat Al-Quran lainnya).',
            'video_url'   => 'assets/videos/alfatihah.mp4',
            'gambar_url'  => null,
        ]);
        Bacaan::create([
            'id_gerakan' => $g2->id, 'urutan' => 1,
            'teks_arab'  => 'بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ. الْحَمْدُ لِلَّهِ رَبِّ الْعَالَمِينَ. الرَّحْمَٰنِ الرَّحِيمِ. مَالِكِ يَوْمِ الدِّينِ. إِيَّاكَ نَعْبُدُ وَإِيَّاكَ نَسْتَعِينُ. اِهْدِنَا الصِّرَاطَ الْمُسْتَقِيمَ. صِرَاطَ الَّذِينَ أَنْعَمْتَ عَلَيْهِمْ غَيْرِ الْمَغْضُوبِ عَلَيْهِمْ وَلَا الضَّالِّينَ',
            'teks_latin' => 'Bismillaahir-rahmaanir-rahiim. Alhamdulillaahi rabbil-\'aalamiin. Ar-rahmaanir-rahiim. Maaliki yaumid-diin. Iyyaaka na\'budu wa iyyaaka nasta\'iin. Ihdinash-shiraathal-mustaqiim. Shiraathal-ladziina an\'amta \'alaihim ghairil-maghdhuubi \'alaihim wa ladh-dhaalliin.',
            'terjemahan' => 'Dengan menyebut nama Allah Yang Maha Pemurah lagi Maha Penyayang. Segala puji bagi Allah, Tuhan semesta alam. Maha Pemurah lagi Maha Penyayang. Yang menguasai di Hari Pembalasan. Hanya Engkaulah yang kami sembah, dan hanya kepada Engkaulah kami meminta pertolongan. Tunjukilah kami jalan yang lurus. (yaitu) Jalan orang-orang yang telah Engkau beri nikmat kepada mereka; bukan (jalan) mereka yang dimurkai dan bukan (pula jalan) mereka yang sesat.',
            'sumber'     => 'QS. Al-Fatihah: 1-7',
            'audio_url'  => 'assets/audios/alfatihah.mp3',
        ]);

        // ==========================================
        // 3. RUKUK
        // ==========================================
        $g3 = Gerakan::create([
            'id_kategori' => $dewasa->id,
            'nama'        => 'Rukuk',
            'urutan'      => 3,
            'deskripsi'   => 'Membungkukkan badan, meletakkan kedua telapak tangan di atas lutut, dan meratakan tulang punggung.',
            'video_url'   => 'assets/videos/rukuk.mp4',
            'gambar_url'  => null,
        ]);
        Bacaan::create([
            'id_gerakan' => $g3->id, 'urutan' => 1,
            'teks_arab'  => 'سُبْحَانَكَ اللَّهُمَّ رَبَّنَا وَبِحَمْدِكَ اللَّهُمَّ اغْفِرْ لِي',
            'teks_latin' => 'Subhaanaka allahumma rabbanaa wa bihamdika allahummaghfir lii',
            'terjemahan' => 'Maha Suci Engkau, ya Allah, Tuhan kami, dan dengan memuji-Mu, ya Allah, ampunilah aku.',
            'sumber'     => 'HPT Muhammadiyah (HR. Bukhari)',
            'audio_url'  => 'assets/audios/rukuk.mp3',
        ]);

        // ==========================================
        // 4. I'TIDAL
        // ==========================================
        $g4 = Gerakan::create([
            'id_kategori' => $dewasa->id,
            'nama'        => 'I\'tidal',
            'urutan'      => 4,
            'deskripsi'   => 'Bangkit tegak berdiri dari rukuk seraya mengangkat kedua tangan sejajar telinga/bahu.',
            'video_url'   => 'assets/videos/itidal.mp4',
            'gambar_url'  => null,
        ]);
        Bacaan::create([
            'id_gerakan' => $g4->id, 'urutan' => 1,
            'teks_arab'  => 'رَبَّنَا وَلَكَ الْحَمْدُ حَمْدًا كَثِيرًا طَيِّبًا مُبَارَكًا فِيهِ',
            'teks_latin' => 'Rabbanaa wa lakal hamdu hamdan katsiiran thayyiban mubaarakan fiihi',
            'terjemahan' => 'Ya Tuhan kami, bagi-Mu segala puji, pujian yang banyak, baik, dan diberkahi di dalamnya.',
            'sumber'     => 'HR. Bukhari',
            'audio_url'  => 'assets/audios/itidal.mp3',
        ]);

        // ==========================================
        // 5. SUJUD PERTAMA
        // ==========================================
        $g5 = Gerakan::create([
            'id_kategori' => $dewasa->id,
            'nama'        => 'Sujud Pertama',
            'urutan'      => 5,
            'deskripsi'   => 'Meletakkan dahi, hidung, kedua telapak tangan, kedua lutut, dan ujung jari kaki di lantai.',
            'video_url'   => 'assets/videos/sujud1.mp4',
            'gambar_url'  => null,
        ]);
        Bacaan::create([
            'id_gerakan' => $g5->id, 'urutan' => 1,
            'teks_arab'  => 'سُبْحَانَكَ اللَّهُمَّ رَبَّنَا وَبِحَمْدِكَ اللَّهُمَّ اغْفِرْ لِي',
            'teks_latin' => 'Subhaanaka allahumma rabbanaa wa bihamdika allahummaghfir lii',
            'terjemahan' => 'Maha Suci Engkau, ya Allah, Tuhan kami, dan dengan memuji-Mu, ya Allah, ampunilah aku.',
            'sumber'     => 'HPT Muhammadiyah',
            'audio_url'  => 'assets/audios/sujud1.mp3',
        ]);

        // ==========================================
        // 6. DUDUK DI ANTARA DUA SUJUD
        // ==========================================
        $g6 = Gerakan::create([
            'id_kategori' => $dewasa->id,
            'nama'        => 'Duduk di Antara Dua Sujud',
            'urutan'      => 6,
            'deskripsi'   => 'Bangun dari sujud pertama dan duduk tenang secara iftirasy sebelum melakukan sujud kedua.',
            'video_url'   => 'assets/videos/sujud2.mp4',
            'gambar_url'  => null,
        ]);
        Bacaan::create([
            'id_gerakan' => $g6->id, 'urutan' => 1,
            'teks_arab'  => 'اللَّهُمَّ اغْفِرْ لِي وَارْحَمْنِي وَاجْبُرْنِي وَاهْدِني وَارْزُقْنِي',
            'teks_latin' => 'Allahummaghfir lii warhamnii wajburnii wahdinii warzuqnii',
            'terjemahan' => 'Ya Allah, ampunilah aku, belas kasihanilah aku, cukupkanlah kekurangan sasaranku, tunjukilah aku, dan berilah rezeki kepadaku.',
            'sumber'     => 'HR. Tirmidzi',
            'audio_url'  => 'assets/audios/dudukdiantaraduasujud.mp3',
        ]);

        // ==========================================
        // 7. TASYAHUD AWAL
        // ==========================================
        $g7 = Gerakan::create([
            'id_kategori' => $dewasa->id,
            'nama'        => 'Tasyahud Awal',
            'urutan'      => 7,
            'deskripsi'   => 'Duduk pada rakaat kedua dengan posisi iftirasy dan mengacungkan jari telunjuk tangan kanan.',
            'video_url'   => 'assets/videos/tasyahudawal.mp4',
            'gambar_url'  => null,
        ]);
        Bacaan::create([
            'id_gerakan' => $g7->id, 'urutan' => 1,
            'teks_arab'  => 'التَّحِيَّاتُ لِلَّهِ وَالصَّلَوَاتُ وَالطَّيِّبَاتُ، السَّلَامُ عَلَيْكَ أَيُّهَا النَّبِيُّ وَرَحْمَةُ اللَّهِ وَبَرَكَاتُهُ، السَّلَامُ عَلَيْنَا وَعَلَى عِبَادِ اللَّهِ الصَّالِحِينَ. أَشْهَدُ أَنْ لَا إِلَهَ إِلَّا اللَّهُ وَأَشْهَدُ أَنَّ مُحَمَّدًا عَبْدُهُ وَرَسُولُهُ',
            'teks_latin' => 'At-tahiyyaatu lillaahi wash-shalawaatu wath-thayyibaat. As-salaamu \'alaika ayyuhan-nabiyyu wa rahmatullaahi wa barakaatuh. As-salaamu \'alainaa wa \'alaa \'ibaadillaahish-shaalihiin. Asyhadu an laa ilaaha illallaah, wa asyhadu anna Muhammadan \'abduhu wa rasuuluh.',
            'terjemahan' => 'Segala penghormatan, shalawat, dan kebaikan adalah milik Allah. Semoga keselamatan, rahmat Allah, dan berkah-Nya dilimpahkan kepadamu, wahai Nabi. Semoga keselamatan dilimpahkan kepada kami dan hamba-hamba Allah yang saleh. Aku bersaksi bahwa tidak ada tuhan selain Allah, dan aku bersaksi bahwa Muhammad adalah hamba dan utusan-Nya.',
            'sumber'     => 'HPT Muhammadiyah',
            'audio_url'  => 'assets/audios/tasyahudawal.mp3',
        ]);

        // ==========================================
        // 8. TASYAHUD AKHIR & SALAM
        // ==========================================
        $g8 = Gerakan::create([
            'id_kategori' => $dewasa->id,
            'nama'        => 'Tasyahud Akhir & Salam',
            'urutan'      => 8,
            'deskripsi'   => 'Duduk tawarruk pada rakaat terakhir, membaca tasyahud akhir, doa perlindungan, kemudian salam menengok ke kanan dan kiri.',
            'video_url'   => 'assets/videos/tasyahudakhir.mp4',
            'gambar_url'  => null,
        ]);
        Bacaan::create([
            'id_gerakan' => $g8->id, 'urutan' => 1,
            'teks_arab'  => 'التَّحِيَّاتُ لِلَّهِ وَالصَّلَوَاتُ وَالطَّيِّبَاتُ... (membaca tasyahud awal) ... اللَّهُمَّ صَلِّ عَلَى مُحَمَّدٍ وَعَلَى آلِ مُحَمَّدٍ، كَمَا صَلَّيْتَ عَلَى إِبْرَاهِيمَ وَآلِ إِبْرَاهِيمَ، وَبَارِكْ عَلَى مُحَمَّدٍ وَعَلَى آلِ مُحَمَّدٍ، كَمَا بَارَكْتَ عَلَى إِبْرَاهِيمَ وَآلِ إِبْرَاهِيمَ، إِنَّكَ حَمِيدٌ مَجِيدٌ. اللَّهُمَّ إِنِّي أَعُوذُ بِكَ مِنْ عَذَابِ جَهَنَّمَ، وَمِنْ عَذَابِ الْقَبْرِ، وَمِنْ فِتْنَةِ الْمَحْيَا وَالْمَمَاتِ، وَمِنْ شَرِّ فِتْنَةِ الْمَسِيحِ الدَّجَّالِ. السَّلَامُ عَلَيْكُمْ وَرَحْمَةُ اللهِ',
            'teks_latin' => 'At-tahiyyaatu lillaahi... (membaca tasyahud awal) ... Allahumma shalli \'alaa Muhammad wa \'alaa aali Muhammad, kamaa shallaita \'alaa Ibraahiim wa aali Ibraahiim. Wa baarik \'alaa Muhammad wa \'alaa aali Muhammad, kamaa baarakta \'alaa Ibraahiim wa aali Ibraahiim. Innaka hamiidum-majiid. Allahumma inni a\'udzubika min \'adzabi jahannam, wa min \'adzabil-qabr, wa min fitnatil-mahyaa wal-mamaat, wa min syarri fitnatil-masiihid-dajjaal. As-salaamu \'alaikum wa rahmatullaah.',
            'terjemahan' => 'Segala penghormatan... (membaca tasyahud awal) ... Ya Allah, limpahkanlah rahmat kepada Muhammad dan keluarga Muhammad, sebagaimana Engkau telah melimpahkan rahmat kepada Ibrahim dan keluarga Ibrahim. Dan berkahilah Muhammad dan keluarga Muhammad, sebagaimana Engkau telah memberkahi Ibrahim dan keluarga Ibrahim. Sesungguhnya Engkau Maha Terpuji lagi Maha Mulia. Ya Allah, sesungguhnya aku berlindung kepada-Mu dari azab Jahannam, dari azab kubur, dari fitnah kehidupan dan kematian, serta dari keburukan fitnah Dajjal. Semoga keselamatan dan rahmat Allah dilimpahkan kepadamu.',
            'sumber'     => 'HPT Muhammadiyah',
            'audio_url'  => 'assets/audios/tasyahudakhirr.mp3',
        ]);
        // ... (KODE GERAKAN 8 DEWASA SEBELUMNYA) ...

        // ==========================================
        // 9. DUPLIKASI OTOMATIS UNTUK MODE ANAK
        // ==========================================
        // Mengambil seluruh data gerakan dari Kategori Dewasa
        $semuaGerakanDewasa = Gerakan::where('id_kategori', $dewasa->id)->get();

        foreach ($semuaGerakanDewasa as $gd) {
            // Salin (copy) gerakan, lalu ubah id_kategori-nya menjadi milik Anak
            $gerakanAnak = $gd->replicate();
            $gerakanAnak->id_kategori = $anak->id;
            // Ubah sedikit deskripsinya agar lebih santai (opsional)
            $gerakanAnak->deskripsi = "Ayo perhatikan gerakan ini: " . $gd->deskripsi;
            $gerakanAnak->save();

            // Ambil bacaan dari gerakan dewasa tersebut, lalu salin juga
            $bacaanDewasa = Bacaan::where('id_gerakan', $gd->id)->get();
            foreach ($bacaanDewasa as $bd) {
                $bacaanAnak = $bd->replicate();
                $bacaanAnak->id_gerakan = $gerakanAnak->id;
                $bacaanAnak->save();
            }
        }
    }
}