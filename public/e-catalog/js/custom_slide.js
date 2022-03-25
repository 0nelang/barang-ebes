$(document).ready(function () {

  var titlePage = ["Cover",
    "Salam Redaksi | Daftar Isi",
    "Profil Umsida | Sejarah & Visi Umsida",
    "Ilmu komunikasi Umsida",
    "Technopreneur | Sponsor",
    "Sponsor | Begin Technopreneur ",
    "Indonesian Startup | Sponsor",
    "Startup Unicorn | Stasion",
    "SMKN 1 Purwosari | Paket Keahlian",
    "Tim Redaksi",
    "Back Cover"
  ];

  var swiper = new Swiper('.swiper-container', {
    zoom: true,
    grabCursor: true,
    centeredSlides: true,
    prevButton: '#prev',
    nextButton: '#next',
    hashnav: true,
    hashnavWatchState: true,
    keyboardControl: true,
    slidesPerView: 'auto',
    onSlideNextStart: function (swiper) {
      var pathname = window.location.hash;
      if (pathname == "#halaman1") {
        $('#title').text(titlePage[1]);
        toastr.success(titlePage[1], "", {
          "timeOut": "2000",
          "extendedTImeout": "0",
          "positionClass": "toast-top-left"
        });
        $(".copied").attr("data-clipboard-text", "SALAM REDAKSI : Hai , guys ! Salam perkenalan dari kami untuk Edisi majalah pertama ‘ININAMA MAGZ’. Kami segenap redaksi majalah 'ININAMA Magz' mengucapkan puji syukur kepada Tuhan YME atas izinnya dapat menerbitkan 'ININAMA Magz' untuk pertama kalinya. Terimakasih juga kepada guru dan teman-teman di SMKN  1 PURWOSARI atas kritikan dan saran yang dapat membangun dan  membantu menyelesaikan majalah ini. Pada edisi pertama ini kami berpartisipasi pada Madig Competition 2017 yang diselenggarakan oleh Universitas Muhammadiyah Sidoarjo dengan mengangkat tema Thecnopreneur Di Era Digital. Tentunya akan sangat bermanfaat bagi perkembangan teknologi di masa yang akan datang. Penasaran? Check This Out !!!");
      } else if (pathname == "#halaman2") {
        $('#title').text(titlePage[2]);
        toastr.success(titlePage[2], "", {
          "timeOut": "2000",
          "extendedTImeout": "0",
          "positionClass": "toast-top-left"
        });
        $(".copied").attr("data-clipboard-text", "Halaman 4 : Profil Singkat UMSIDA Universitas Muhamamdiyah Sidoarjo (UMSIDA) merupakan salah satu perguruan tinggi swasta yang ada di Jawa Timur, tepatnya di Jalan Mojopahit 666 B Sidoarjo. UMSIDA yang didirikan sejak tahun 1987  yang saat ini memiliki 11 Fakultas dengan 34 Program Studi. Rektor Universitas Muhammadiyah Sidoarjo saat ini adalah  Dr. Hidayatulloh, M.Si. UMSIDA sendiri juga memiliki motto yang dijadikan pedoman bagi perguruan tinggi tersebut adalah “UMSIDA Dari Sini Pencerahan Bersemi”. Sumber : www.umsida.ac.id. | Halaman 5 :SEJARAH UMSIDA Cikal bakal Universitas Muhammadiyah Sidoarjo dirintis sejak tahun 1984 dengan dibukanya Sekolah Tinggi Ilmu Tarbiyah (STIT) yang kemudian baru secara resmi berdiri pada tahun 1987. Pada tahun 1987 itu pula didirikan Sekolah Tinggi Ilmu Pertanian (STIPER) dan Sekolah Tinggi Teknik Informatika dan Komputer (STIMIK). Sedangkan Sekolah Tinggi Ilmu Ekonomi (STIE) dan Sekolah Tinggi Ilmu Sosial dan Ilmu Politik (STISIP) berdiri pada tahun 1994. Pada tahun 2001 semua sekolah itu telah bergabung menjadi Universitas Muhammadiyah Sidoarjo, yang sekarang memiliki lima fakultas, 14 Jurusan/Program Studi Strata 1 (S1), dua program D3 (Informatika dan Keuangan Perbankan), dua program D2 (PGTK dan Pendidikan Bahasa Arab), Program Akta IV (Konsentrasi Umum dan Agama),dan program pascasarjana. Selain itu, telah berdiri pula pusat-pusat studi untuk mendorong akselerasi riset dan pengembangan. VISI : Menjadi Perguruan Tinggi Bermutu Tingkat Nasional tahun 2020");
      } else if (pathname == "#halaman3") {
        $('#title').text(titlePage[3]);
        toastr.success(titlePage[3], "", {
          "timeOut": "2000",
          "extendedTImeout": "0",
          "positionClass": "toast-top-left"
        });
        $(".copied").attr("data-clipboard-text", "Halaman 6: ILMU KOMUNIKASI UMSIDA Fakultas Ilmu Komunikasi di Universitas Muhammadiyah Sidoarjo mencakup 2 peminatan yaitu : Public Relatios dan Broadcasting. Apa itu peminatan Public Relations ? Public Relations sangat cocok nih bagi kalian yang suka banget berbicara didepan muka umum karena yang dipelajari dan lulusannya lebih  banyak bekerja dibidang berkomunikasi kepada individu atau masyrakat , seperti yang kita kenal layaknya pekerjaan seorang Humas. Pekerjaan yang cocok untuk kalian yang berminat  mengikuti public relations yaitu menjadi Perkembangan PR Consultant, Even Organize, PR Officer, PR Executive, Head Of Communications,dan kebutuhan Public Relations di sebuah perusahaan ataupun departemen memerlukan kompetensi praktisi Humas yang mumpuni ,dll. Sedangkan untuk Broadcasting berfokus pada feature and documentary fims. Bagi kalian yang suka ngevlog atau membuat film pendek bisa mengasah bakat dengan mengikuti Broadcasting ini. Pekerjaan yang cocok untuk lulusan broadcasting yaitu : Video Journalist, TV Reporter, News Editor,News Producer,TV/Radio Consultant,dll. Fasilitas-Fasilitas yang dapat mendukung berkembangnya kreativitas mahasiswa yaitu Lab Public Relations, Lab Radio,dan Ruang Mutimedia, Adapun gedung - gedung baru yang sedang dalam proyek kotruksi yaitu pembangunan Gedung FISIP yang direncanakan membangun sebanyak 7 lantai. Serta ada bioskop mini. Pasti betah nih. CSFC 2017(Communication Short Film Competition) Communication Short Film Competition adalah kompetisi membuat film pendek yang diadakan oleh Prodi Ilmu Komunikasi Universitas Muhammadiyah Sidoarjo Tingkat Pelajar se - Jawa Timur.Kali ini CSFC mengangkat tema“ Perempuan Indonesia”.Setiap peserta memiliki batas 5 anggota dalam pembuatan filmnya, baik film fiksi maupun film pendek yang berdurasi 10 - 20 menit.Kalian berminat ? Yuk tunjukkan bakatmu disini.Pendaftaran Gratiss..Batas Pengumpulan 26 Februari 2017. Jika kalian dapat memenangkan kompetisi ini kalian bisa bawa hadiah dengan total 10 juta rupiah.Info lebih lanjut : Ig: csfc2017 Website: csfc.web.id ");
      } else if (pathname == "#halaman4") {
        $('#title').text(titlePage[4]);
        toastr.success(titlePage[4], "", {
          "timeOut": "2000",
          "extendedTImeout": "0",
          "positionClass": "toast-top-left"
        });
        $(".copied").attr("data-clipboard-text", "Halaman 8 :Apa itu Technopreneur ? Apa itu technoprenur ? Technopreneur adalah gabungan dari dua kata yaitu Technology dan Entrepreneur . Jadi Technopreneur dapat diartikan dengan bagaimana teknologi dimanfaatkan sebagai alat utama dalam pengembangan usaha. Karakteristik Technopreneur dilihat dari pengertiannya memang technopreneur merupakan pengelola usaha dengan menggunakan teknologi. Contoh aplikasi-aplikasi yang sering kita gunakan  Seperti Facebook,Twitter, Google termasuk usaha yang berbasis teknologi. Mengingat untuk meningkatkan keadaan ekonomi di Indonesia yang saat ini sedang berkembang, Kemampuan dalam teknologi dan kemampuan berwirausaha adalah solusinya di era digital ini. | Halaman 9 : Iklan ");
      } else if (pathname == "#halaman5") {
        $('#title').text(titlePage[5]);
        toastr.success(titlePage[5], "", {
          "timeOut": "2000",
          "extendedTImeout": "0",
          "positionClass": "toast-top-left"
        });
        $(".copied").attr("data-clipboard-text", "Halaman 10 : Iklan | Halaman 11 : Menjadi Technopreneur Pemula ? Why NOT ? Pengen jadi technopreneur tapi gak ada modal ? Tenang , kali ini kami memberi tips yang harus kalian perhatikan untuk menjadi seorang technopreneur pemula . 1.	Melakukan Penelitian Pasar Penelitian pasar ini bertujuan untuk mengetahui apa yang sedang dibutuhkan oleh masyarakat saat ini. Dengan ini kita bisa memecahkan persoalaan masyarakat dengan menghasilkan sebuah produk. 2.	Keunggulan Produk Produk yang kalian buat harus memiliki keunggulan dan keunikan yang berbeda dari produk lain,sehingga dapat menarik minat sang pembeli. 3.	Menentukan Target Pemasaran Sebelum dipasarkan kita harus menentukan target pemasaran ya sobat, agar tidak terjadi kesalahan harga yang berpengaruh terhadap marketing. 4.	Tes Pasar Setelah produk jadi, silahkan tes pasar untuk mengetahui tanggapan pasar sebelum dijual secara massal. 5.	Melakukan inovasi Buat inovasi-inovasi baru yang membuat produk kita semakin unggul,dnegan itu produk kita akan memiliki ciri khas tersendiri dan memberi nilai tambah bagi masyarakat. 6.	Mendaftarkan Produk Jangan lupa daftarkan produk kamu ke Ditjen Hak Kekayaan Intelektual untuk mendapatkan hak paten. Dari pendaftaran tersebut kalian dapat mengantisipasi adanya peniruan dan produk anda dapat terlindungi. Selain itu sobat, untuk menjadi seorang technopreneur kalian harus punya keberanian,sikap percaya diri, displin,tekun,kerja keras sekaligus pantang menyerah.");
      } else if (pathname == "#halaman6") {
        $('#title').text(titlePage[6]);
        toastr.success(titlePage[6], "", {
          "timeOut": "2000",
          "extendedTImeout": "0",
          "positionClass": "toast-top-left"
        });
        $(".copied").attr("data-clipboard-text", "Halaman 12 : Indonesian Startup Founders Bagaimana perkembangan bisnis startup di indoneisa? Perkembangan startup di Indonesia sangat bagus, Menurut dailysocial.net , sekarang ini terdapat setidaknya lebih dari 1500 Startup lokal yang ada di indonesia.  Lumayan banyak lah ya . Potensi pengguna internet di Indonesia semakin meningkat tiap tahunnya, tentunya dapat menjadikan lahan untuk mendirikan sebuah startup. Nah siapa saja sih orang-orang yang mendirikan sebuah startup di Indonesia . Berikut kami jabarkan beberapa Indonesian Startup Founders yang sedang naik daun. 1.	William Tanuwijaya (Pendiri Tokopedia) 2.	Achmad Zaky (Pendiri Bukalapak) 3.	Diajeng Lestari (Pendiri HijUp) 4.	Nadiem Makarim (Pendiri Go-Jek) 5.	Ferry Unardi (Pendiri Travelloka) 6.	Ken Desn Hadiwinata dan Andrew Darwis (Pendiri Kaskus) | Halaman 13 : Iklan");
      } else if (pathname == "#halaman7") {
        $('#title').text(titlePage[7]);
        toastr.success(titlePage[7], "", {
          "timeOut": "2000",
          "extendedTImeout": "0",
          "positionClass": "toast-top-left"
        });
        $(".copied").attr("data-clipboard-text", "Halaman 14 : Startup Unicorn Unicorn ? Pernah dengar ? mungkin bayangan anda unicorn adalah kuda putih yang memiliki tanduk yang diceritakan dalam dongeng kanak-kanak. That’s False!. Status Unicorn sendiri gak ada hubungannya sama gambar kartun kuda dalam cerita dongeng yang kalian maksud.  Jadi Startup Unicorn adalah perusahaan yang dihargai lebih dari $1 milyar oleh investor privat maupun publik! Kerenn wah. Nah, negeri tempat startup unicorn paling banyak adalah Amerika Serikat, dengan total 148 startup.Kedua, adalah Cina, dengan total 69 startup. Nah, Indonesia sendiri punya tiga startup unicorn, yakni GoJek, Tokopedia, Traveloka, dan Bukalapak. 1.	Gojek Gojek merupakan startup pertama asal Indonesia yang mendapatkan gelar “Unicorn”. Gojek , menjadi startup Unicorn pada tanggal 4 Agustus 2016 lalu selepas menerima pendanaan senilai $550 juta dari konsorsium 8 investor yang digawangi oleh Seqoula Capital dan Warbrug. 2.	Tokopedia Layanan online market place kini secara kseluruhan memperoleh pendan sebesar $1,347 miliar. Dan investasi terbesar dicatatkan Tokopedia pada tanggal 17 Agustus 2017 memperoleh dana sebesar $1,1 milyar dari Alibaba. Melihat dari tanggal lahirnya, Toko pedia menjadi Startup Unicorn selepas 6 tahun berdiri. 3.	Traveloka Traveloka menyandang gelar “Unicorn” selepas Expedia,layanan sejenis yang populer di luar negeri menguncurkan dana senilai $350 juta pada 27 juli 2017. Travelloka menjadi “Unicorn” tercepat selepas 5 tahun berdiri. “Traveloka jelas adalah pemimpin online travel di Indonesia dan sedang berekspansi secara agresid ke seluruh Asia Tenggara.Kerja sama ini akan saling menguntungkan kedua belah pihak dari sisi keadlian dan pemahaman lokal. ” Ujar Dara Khosrowshasi (President and CEO,Expedia, Inc) | Halaman 15 : STASION  (logo stasion) Pernah denger kata STASION ? Bukan Stasiun tempat kita nunggu kereta api loh yaa.. STASION adalah komunitas startup lokal di kota Malang. STASION sendiri memilki singkatan Startup Singo Edan. Dibangun pada tanggal 26 Maret 2011 oleh beberapa entrepreneur yang mempunyai passion dan antuasisme tinggi di dunia bisnis digital.Visi dari STASION sendiri adalah mencetak seratus perusahaan startup aktif pada tahun 2020. So, Apa aja sih kegiatan yang dilakukan dalam Startup STASION ini ? 1.	Internal MeetUp Pertemuan Rutin pleh anggota-anggota STASION setiap bulan. 2.	Public MeetUp Pertemuan rutin yang bisa diikuti oleh masyarakat umum 3.	Stasion Workshop Kegiatan workshop,Talkshow,Seminar yang terbuka untuk umum. STASION juga memiliki program kerja 2015-2020 yakni : 1.	Internal & Public MeetUp 2.	Lup,Link,and Network 3.	Hackathon 4.	Exhibition & Media 5.	Legal 6.	Service & Consulting 7.	Bootcamp & Training 8.	Koperasi & Crowdfunding M. Miftahul Huda sebagai Ketua Umum dari STASION dan Co-Founder dari Inagata Technosmith STASION juga ikut membantu mendanai sebuah startup, mau startupmu didanai ? Silahkan kunjungi link kami : http://www2.beon.co.id/infrastructure-support-stasion/ Untuk info lebih lanjut : 1.	Digital Innovation Lounge Malang. (Jl. Basuki Rachmad 7-9 Malang) 2.	Rumah Kreatif BUMN Kota Malang (Jl. Raya Langsep No.1 Malang) Facebook : Stasion- Komunitas Startup Malang Twitter : @stasionmalang Instagram : @stasionmalang E-Mail : stasionmlg@gmail.com");
      } else if (pathname == "#halaman8") {
        $('#title').text(titlePage[8]);
        toastr.success(titlePage[8], "", {
          "timeOut": "2000",
          "extendedTImeout": "0",
          "positionClass": "toast-top-left"
        });
        $(".copied").attr("data-clipboard-text", "Halaman 16 : SMKN 1 PURWOSARI Visi : Membentuk Tamatan yang Beriman dan Bertaqwa kepada Tuhan Yang Maha Esa,berbudi pekerti luhur,berdaya saing tinggi,dan berwawasan lingkungan. Sejarah Singkat SMKN 1 PURWOSARI : SMKN 1 Purwosari berdiri pada tahun 2000 terletak di desa Purwosari,tepatnya Jl. Raya Purwosari Kecamatan Purwosari,Kabupaten  Pasuruan. Secara Geografis SMK NEGERI 1 PURWOSARI terletak di wilayah barat Kabupaten Pauruan, berbatasan dengan Kabupaten Mojokerto . Dengan posisi yang strategis tersebut,sangat memungkinkan bagi SMKN 1 PURWOSARI untuk merekrut siswa dari segala penjuru, mengingat keberadaannya yang mudah dijangkau dengan kendaraan umum serta berada di jalur utama menuju ke Pasuruan,Malang,dan Surabaya. Saat ini Kepala Sekolah SMKN 1 Purwosari adalah Ir. INDRA JAYA,M. Pd. Paket Keahlian Teknik Informatika 1.	Multimedia 2.	Teknik Komputer dan Jaringan 3.	Rekayasa Perangkat Lunak Bidang Pertanian 1.	Agribisnis Tanaman Pangan dan Holtikultura 2.	Teknik Pengolahan Hasil Pertanian Teknik Pemesinan 1.	Teknik Pemesinan Bodi Otomotif 2.	Teknik Kendaraan Ringan 3.	Teknik Las Bidang Elektronika 1.	Mekatronika");
      } else if (pathname == "#halaman9") {
        $('#title').text(titlePage[9]);
        toastr.success(titlePage[9], "", {
          "timeOut": "2000",
          "extendedTImeout": "0",
          "positionClass": "toast-top-left"
        });
        $(".copied").attr("data-clipboard-text", "Halaman 18 : Kami dari TIM ETHICS. Akbar Anung Yudha Saputra sebagai pemimpin redaksi. Dzulfikri Safrilian sebagai Programmer Lelly Sumarni sebagai Illustrator Leonardo Wisanggeni sebagai Desainer Dan Dea Trisya sebagai Reporter Lalu, kenapa ya kita bisa menjadi satu tim? Waktu itu, kak Yudha sebagai pemimpin redaksi mendapat ajakan dari kakak kelas untuk mengikuti lomba MADIG Universitas Muhammadiyah Sidoarjo. Dia mengajak Dzul teman sekelasnya sebagai Programmer, Lelly sebagai Illustrator, dan Dea sebagai Reporter untuk bergabung menjadi satu tim yaitu tim ETHICS. Dia kebingungan, siapa yang akan menjadi Desainer pada saat itu. Saat kak Yudha sedang berbincang dengan kak Lelly, disitulah kak Geni mendengar percakapan mereka, lalu kak Yudha mengajak kak Geni untuk bergabung bersama di tim ETHICS. TERIMA KASIH !!");
      } else if (pathname == "#halaman10") {
        $('#title').text(titlePage[10]);
        toastr.success(titlePage[10], "", {
          "timeOut": "2000",
          "extendedTImeout": "0",
          "positionClass": "toast-top-left"
        });
      } else if (pathname == "#halaman11") {
        $('#title').text(titlePage[11]);
        toastr.success(titlePage[11], "", {
          "timeOut": "2000",
          "extendedTImeout": "0",
          "positionClass": "toast-top-left"
        });
      } else {
        $('#title').text(titlePage[0]);
        toastr.success(titlePage[0], "", {
          "timeOut": "2000",
          "extendedTImeout": "0",
          "positionClass": "toast-top-left"
        });
      };
    }
  });


  scale = 0;
  $("#zoomin").click(function () {
    if (scale < 5) {
      scale += 1;
      $(".swiper-container").css({
        'transform': 'scale(1.' + scale + ')'
      });
      $(".swiper-container").css({
        'transform': 'scale(1.' + scale + ')'
      });
      $(".swiper-container").draggable();
    }
  });

  $("#zoomout").click(function () {
    if (scale > 0) {
      scale -= 1;
      $(".swiper-container").css({
        'transform': 'scale(1.' + scale + ')'
      });
      $(".swiper-container").css({
        'transform': 'scale(1.' + scale + ')'
      });
      if (scale == 0) {
        $(".swiper-container").css({
          "top": "6vh",
          "left": "0px",
          "right": "0px"
        });
        $(".swiper-container").draggable('destroy');
      }
    }
  });
});