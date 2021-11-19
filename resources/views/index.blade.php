@extends('layouts.appps')
@section('title','index')

@section('content')
 <!-- Hero Start -->
<div class="#home">
   <div class="container-fluid">
      <div class="row align-items-center">
         <div class="col-md-6">
            <h2>Sistem Infromasi</h2>
            <h2><span>Kerja Praktek</span> PENS</h2>
            <p>SIKAP PENS merupakan portal berita mengenai Keja Praktek khusus bagi mahasiswa pens</p>
            <!-- <a class="btn" href="">Download Now</a> -->
         </div>
         <div class="col-md-6">
            <img src="{{asset ('agency/img/hero.png')}}" alt="Image">
         </div>
      </div>
   </div>
</div>
<!-- Hero End -->


<!-- About Start -->
<div class="#about">
   <div class="container-fluid">
      <div class="row align-items-center">
         <div class="col-md-6">
            <div id="video-section">
               <div class="youtube-player" data-id="jssO8-5qmag"></div>

               <script>
                  document.addEventListener("DOMContentLoaded",
                     function() {
                        var div, n,
                           v = document.getElementsByClassName("youtube-player");
                        for (n = 0; n < v.length; n++) {
                           div = document.createElement("div");
                           div.setAttribute("data-id", v[n].dataset.id);
                           div.innerHTML = labnolThumb(v[n].dataset.id);
                           div.onclick = labnolIframe;
                           v[n].appendChild(div);
                        }
                     });

                  function labnolThumb(id) {
                     var thumb = '<img src="{{asset ('agency/img/poster.jpg')}}">',
                        play = '<div class="play"></div>';
                     return thumb.replace("ID", id) + play;
                  }

                  function labnolIframe() {
                     var iframe = document.createElement("iframe");
                     var embed = "https://www.youtube.com/embed/ID?autoplay=1";
                     iframe.setAttribute("src", embed.replace("ID", this.dataset.id));
                     iframe.setAttribute("frameborder", "0");
                     iframe.setAttribute("allowfullscreen", "1");
                     this.parentNode.replaceChild(iframe, this);
                  }
               </script>
            </div>
         </div>
         <div class="col-md-6">
            <h2 class="section-title">Learn About Us</h2>
            <p>
               Kerja Praktek (KP) merupakan salah satu mata kuliah yang wajib ditempuh oleh setiap mahasiswa PENS. Kegiatan KP dilaksanakan dengan tujuan untuk memberikan wawasan dan pengalaman kerja kepada mahasiswa secara langsung di dunia industri sehingga mahasiswa mendapat kesempatan untuk melihat relevansi keilmuan yang dipelajari serta dapat mengimplementasikan keilmuan/pengetahuan yang dimilki pada permasalahan di dunia kerja
            </p>
            <a class="btn" href="">Learn More</a>
         </div>
      </div>
   </div>
</div>
<!-- About End -->
<!-- Story Start -->
<div class="#story">
    <div class="container-fluid">
        <div class="section-header">
            <h2>PROCEDURE BEFORE PRACTICAL WORK</h2>
            <p>Menjadi pedoman bagi pihak-pihak terkait di Politeknik Elektronika Negeri Surabaya(PENS) dalam melakukan prosedur sebelum Kerja Praktek bagi mahasiswa</p>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="story-container">
                    <div class="story-end">
                        <p>Start</p>
                    </div>
                    <div class="story-continue">

                        <div class="row story-right">
                            <div class="col-md-6">
                                <p class="story-date">

                                </p>
                            </div>
                            <div class="col-md-6">
                                <div class="story-box">
                                    <div class="story-icon">
                                        <i class="fa fa-book"></i>
                                    </div>
                                    <div class="story-text">
                                        <h3>step one</h3>
                                        <p>Mahasiswa mencari tempat Kerja Praktek</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row story-left">
                            <div class="col-md-6 d-md-none d-block">
                                <p class="story-date"></p>
                            </div>
                            <div class="col-md-6">
                                <div class="story-box">
                                    <div class="story-icon d-md-none d-block">
                                        <i class="fa fa-business-time"></i>
                                    </div>
                                    <div class="story-text">
                                        <h3>step two</h3>
                                        <p>Mahasiswa membuat proposal dan surat pengantar KP untuk diajukan pada koordinator KP</p>
                                    </div>
                                    <div class="story-icon d-md-block d-none">
                                        <i class="fa fa-briefcase"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 d-md-block d-none">
                                <p class="story-date"></p>
                            </div>
                        </div>

                        <div class="row story-right">
                            <div class="col-md-6">
                                <p class="story-date"></p>
                            </div>
                            <div class="col-md-6">
                                <div class="story-box">
                                    <div class="story-icon">
                                        <i class="fa fa-business-time"></i>
                                    </div>
                                    <div class="story-text">
                                        <h3>step three</h3>
                                        <p>Koordinator KP memverifikasi proposal dan surat pengantar KP untuk di ttd KaProdi dan KaDep</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row story-left">
                            <div class="col-md-6 d-md-none d-block">
                                <p class="story-date"></p>
                            </div>
                            <div class="col-md-6">
                                <div class="story-box">
                                    <div class="story-icon d-md-none d-block">
                                        <i class="fa fa-cogs"></i>
                                    </div>
                                    <div class="story-text">
                                        <h3>step four</h3>
                                        <p>Mahasiswa mengirim proposal dan surat pengantar ke tempat KP atau via email</p>
                                    </div>
                                    <div class="story-icon d-md-block d-none">
                                        <i class="fa fa-cogs"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 d-md-block d-none">
                                <p class="story-date"></p>
                            </div>
                        </div>

                        <div class="row story-right">
                            <div class="col-md-6">
                                <p class="story-date"></p>
                            </div>
                            <div class="col-md-6">
                                <div class="story-box">
                                    <div class="story-icon">
                                        <i class="fa fa-running"></i>
                                    </div>
                                    <div class="story-text">
                                        <h3>step five</h3>
                                        <p>Mahasiswa menunggu konfirmasi dari tempat KP, sambil mengisikan data KP di http://mis.pens.ac.id bagian Kerja Praktek</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="story-year">
                                    <p>loading</p>
                                </div>
                            </div>
                        </div>

                        <div class="row story-left">
                            <div class="col-md-6 d-md-none d-block">
                                <p class="story-date"></p>
                            </div>
                            <div class="col-md-6">
                                <div class="story-box">
                                    <div class="story-icon d-md-none d-block">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <div class="story-text">
                                        <h3>step six</h3>
                                        <p>Mendapat konfirmasi diterima/tidak diterima dari tempat KP </p>
                                    </div>
                                    <div class="story-icon d-md-block d-none">
                                        <i class="fa fa-info"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 d-md-block d-none">
                                <p class="story-date"></p>
                            </div>
                        </div>
                        <div class="row story-right">
                            <div class="col-md-6">
                                <p class="story-date"></p>
                            </div>
                            <div class="col-md-6">
                                <div class="story-box">
                                    <div class="story-icon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <div class="story-text">
                                        <h3>step seven</h3>
                                        <p>Melaporkan dan mengkonfirmasi bahwa telah diterima ke koordinator KP untuk diupdate datanya di http://mis.pens.ac.id </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="story-start">
                        <p>finish</p>
                    </div>
                    <div class="story-launch">
                        <div class="story-box">
                            <div class="story-text">
                                <h3>Mahasiswa Melaksanakan KP dengan waktu yang ditentukan</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Story End -->


<!-- Team Start -->
<div class="team">
    <div class="container-fluid">
        <div class="section-header">
            <h2>Our Team</h2>
            <p></p>
        </div>
        <div class="row">
            <div class="col-sm-6 col-lg-2 ">
                <div class="team-item">
                    <div class="team-img">
                        <img src="{{asset ('agency/img/team-01.jpg')}}" alt="Team">
                    </div>
                    <div class="team-text">
                        <h3>Mr Andhik</h3>
                        <p>stakeholder </p>
                    </div>
                    <div class="team-social">
                        <a href="https://www.facebook.com/andhik.yunanto"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/andhik_ampuh/"><i class="fab fa-instagram"></i></a>
                        <a href="https://github.com/andhik1"><i class="fab fa-github"></i></a>
                        <a href="https://www.youtube.com/channel/UCM8Oo2vJtvROH1WBiHzQjGg/featured"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-2 ">
                <div class="team-item">
                    <div class="team-img">
                        <img src="{{asset ('agency/img/team-02.jpg')}}" alt="Team">
                    </div>
                    <div class="team-text">
                        <h3>Yudi</h3>
                        <p>back end dev</p>
                    </div>
                    <div class="team-social">
                        <a href="https://www.facebook.com/yudi.ispersija"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/rizqi_wahyudi.57/"><i class="fab fa-instagram"></i></a>
                        <a href="https://github.com/rizqiwahyudi"><i class="fab fa-github"></i></a>
                        <a href="https://www.youtube.com/channel/UCVSKSla8vLrpOFyN3sKAvag"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-2 ">
                <div class="team-item">
                    <div class="team-img">
                        <img src="{{asset ('agency/img/team-03.jpg')}}" alt="Team">
                    </div>
                    <div class="team-text">
                        <h3>Nasirul</h3>
                        <p>front end dev</p>
                    </div>
                    <div class="team-social">
                        <a href="https://www.facebook.com/nasirol.intelejenss/"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/mnasirulumam97/"><i class="fab fa-instagram"></i></a>
                        <a href="https://github.com/MNasirulUmam"><i class="fab fa-github"></i></a>
                        <a href="https://www.youtube.com/channel/UCVEOLv8cbsW-nf5HBXXvMgw"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-2 ">
                <div class="team-item">
                    <div class="team-img">
                        <img src="{{asset ('agency/img/team-04.jpg')}}" alt="Team">
                    </div>
                    <div class="team-text">
                        <h3>Fina</h3>
                        <p>marketing</p>
                    </div>
                    <div class="team-social">
                        <a href="https://www.facebook.com/syafiena.fina.73"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/syafina.l/"><i class="fab fa-instagram"></i></a>
                        <a href="https://github.com/syafiena/"><i class="fab fa-github"></i></a>
                        <a href="https://www.youtube.com/channel/UCdO4pRCoe6GBQeZGL851_4g"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-2 ">
                <div class="team-item">
                    <div class="team-img">
                        <img src="{{asset ('agency/img/team-05.jpg')}}" alt="Team">
                    </div>
                    <div class="team-text">
                        <h3>Dani</h3>
                        <p>UI design</p>
                    </div>
                    <div class="team-social">
                        <a href="https://www.facebook.com/ahmad.rizalramadani.7"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/rzlrmdani_/"><i class="fab fa-instagram"></i></a>
                        <a href=""><i class="fab fa-github"></i></a>
                        <a href="https://www.youtube.com/channel/UCZJ7lcPrL0hDMJwhQTZOzng"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-2 ">
                <div class="team-item">
                    <div class="team-img">
                        <img src="{{asset ('agency/img/team-06.jpg')}}" alt="Team">
                    </div>
                    <div class="team-text">
                        <h3>Wahyu</h3>
                        <p>web design</p>
                    </div>
                    <div class="team-social">
                        <a href="https://www.facebook.com/wahyuiqbal.pothrakebonagung"><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                        <a href="https://github.com/wahyusantuy/"><i class="fab fa-github"></i></a>
                        <a href="https://www.youtube.com/channel/UC9NRtkLZfzv_n8PCAmv1RNQ"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->
<!-- FAQs Start -->
<div class="#faqs">
   <div class="container-fluid">
      <div class="row align-items-center">
         <div class="col-md-6">
            <h2 class="section-title">Frequently Asked Questions</h2>
            <div id="accordion">
               <div class="card">
                  <div class="card-header">
                     <a class="card-link collapsed" data-toggle="collapse" href="#collapseOne" aria-expanded="true">
                        Dimana Tempat Kerja Praktek?
                     </a>
                  </div>
                  <div id="collapseOne" class="collapse show" data-parent="#accordion">
                     <div class="card-body">
                        Kerja praktek dapat dilaksanakan di Lembaga/Instansi Pemerintah maupun swasta. Instansi swasta yang dapat menjadi tempat kerja praktek harus berbadan hukum (CV/PT/FIRMA)
                     </div>
                  </div>
               </div>
               <div class="card">
                  <div class="card-header">
                     <a class="card-link" data-toggle="collapse" href="#collapseTwo">
                        Bagaimana Cara Mengusulkan Kerja Praktek?
                     </a>
                  </div>
                  <div id="collapseTwo" class="collapse" data-parent="#accordion">
                     <div class="card-body">
                        Usulan kerja praktek merupakan langkah pertama yang dilakukan bagi mahasiswa yang akan menempuh mata kuliah Kerja Praktek. Pengajuan KP masih bisa dilakukan sebelum 2 bulan pelaksanaan Kerja Praktek, jika kurang dari 2 bulan dan mahasiswa belum mendapat tempat Kerja Praktek, maka Koordinator KP mengkoordinasikan dengan Wakil Direktur Bidang 4.
                     </div>
                  </div>
               </div>
               <div class="card">
                  <div class="card-header">
                     <a class="card-link" data-toggle="collapse" href="#collapseThree">
                        Waktu Pelaksanaan dan Lama Kerja Praktek
                     </a>
                  </div>
                  <div id="collapseThree" class="collapse" data-parent="#accordion">
                     <div class="card-body">
                        Pelaksanaan Kerja Praktek dijadwalkan selama 3 bulan atau selama 11-12 minggu. Jadwal pelaksanaan KP di PENS dibagi menjadi dua periode. Periode pertama dikhususkan untuk prodi di Tingkat Diploma 4 dan periode kedua dikhususkan untuk prodi di tingkat Diploma 3
                     </div>
                  </div>
               </div>
               <div class="card">
                  <div class="card-header">
                     <a class="card-link" data-toggle="collapse" href="#collapseFour">
                        Bagaimana Ketentuan Dosen Pembimbing Kerja Praktek?
                     </a>
                  </div>
                  <div id="collapseFour" class="collapse" data-parent="#accordion">
                     <div class="card-body">
                        Pembimbing KP terdiri atas 2 yaitu pembimbing 1 berasal dari dosen di Jurusan setia mahasiswa yang ditentukan oleh kordinator KP dan pembimbing 2 (lapangan) berasal dari institusi tempat kerja praktek
                     </div>
                  </div>
               </div>
            </div>
            <!-- <a class="btn" href="">Ask more</a> -->
         </div>
         <div class="col-md-6">
            <img src="{{asset ('agency/img/faqs.jpg')}}" alt="Image">
         </div>
      </div>
   </div>
</div>
<!-- FAQs End -->
<!-- Contact Start -->
<div class="#contact">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2 class="section-title">Get In Touch</h2>
                <div class="contact-info">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3138.3260971582295!2d112.79156701405527!3d-7.2758417735167455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa10ea2ae883%3A0xbe22c55d60ef09c7!2sPoliteknik%20Elektronika%20Negeri%20Surabaya!5e1!3m2!1sen!2sbd!4v1623230227007!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>
                    <h3>Our Location:</h3>
                    <p>
                        Sepuluh Nopember Institute of Technology (ITS),<br> Kampus, Jl. Raya ITS, Keputih, Kec. Sukolilo, Kota Surabaya, <br>Jawa Timur 60111, Indonesia
                    </p>
                    <h3>Mobile <span>+012 345 6789</span></h3>
                    <h3>E-mail <span>contact@example.com</span></h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="editor-info">
                    <h2 class="section-title">Contact Person</h2>
                    <div class="editor-item">
                        <div class="editor-img">
                            <img src="{{asset ('agency/img/pens-surabaya.jpg')}}" alt="Pens Image">
                        </div>
                        <div class="editor-text">
                            <h3>PENS KAMPUS (PUSAT)</h3>
                            <a href="mailto:humas@pens.ac.id">Email Now</a>
                        </div>
                    </div>
                    <div class="editor-item">
                        <div class="editor-img">
                            <img src="{{asset ('agency/img/pens-sumenep.jpg')}}" alt="Pens Image">
                        </div>
                        <div class="editor-text">
                            <h3>PENS KAMPUS (SUMENEP)</h3>
                            <a href="mailto:humassumenep@pens.ac.id">Email Now</a>
                        </div>
                    </div>
                    <div class="editor-item">
                        <div class="editor-img">
                            <img src="{{asset ('agency/img/pens-lamongan.jpg')}}" alt="Pens Image">
                        </div>
                        <div class="editor-text">
                            <h3>PENS KAMPUS (LAMONGAN)</h3>
                            <a href="mailto:humaslamongan@pens.ac.id">Email Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
@endsection