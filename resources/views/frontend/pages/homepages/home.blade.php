@extends('frontend.layouts.master')
@section('content')
<div class="top-wrapper">
    <div class="bg-overlay">
        <div class="home-header">
            <div class="header-wrapper">
                <div class="row">
                    <div class="col-md-2">
                        {{ HTML::image('assets/images/logoFinal2.png', 'logo', array('height' => '100')) }}
                    </div>
                    <div class="col-md-4 col-md-offset-6">
                        <ul class="list-unstyled">
                            <li><a href="">TENTANG KAMI</a></li>
                            <li><a href="">FITUR</a></li>
                            <li><a href="{{ URL::to('auth/login') }}">LOGIN</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="home-headline">
            <h1 class="wow slideInLeft">COLLABORATE THROUGH THE CLOUD</h1>
            <h4 class="wow slideInRight" data-wow-delay="1s">- Kerjakan tugas kuliahmu bersama teman dimanapun -</h4>
            <a href="#" class="wow fadeIn" data-wow-delay="2s">MULAI SEKARANG</a>
        </div>
    </div>
</div>

<div class="about">
    <h1>TENTANG KAMI</h1>
    <p class="wow fadeIn"><strong>Collaborative Learning</strong> merupakan layanan pembelajaran jarak jauh berbasis pada sistem perkuliahan di <strong>STMIK STIKOM Bali</strong>.<br>
        Sistem ini terintegrasi dengan Google Drive sebagai penyedia layanan penyimpanan awan dan Google Docs sebagai penyedia layanan <i>real time collaboration</i>
        .<br>Layanan ini bertujuan untuk memudahkan mahasiswa di <strong>STMIK STIKOM Bali</strong> untuk melakukan kerja kelompok tanpa harus bertemu dan juga
        memudahkan dosen untuk memeriksa tugas dari mahasiswa
    </p>
</div>
<hr>

<div class="feature">
    <div class="bg-overlay">
        <h1>FITUR</h1>
        <div class="row">
            <div class="col-md-6 wow slideInLeft">
                {{HTML::image('assets/images/google2.png')}}
            </div>
            <div class="col-md-6 wow slideInRight">
                <h3 >Kolaborasi secara langsung</h3>
                <p>Collaborative Learning terintegrasi dengan Google Docs sebagai layanan untuk berkolaborasi
                    membuat tugas kuliah. Dengan fitur <i>real time collaboration</i>-nya, mahasiswa dapat mengerjakan
                    tugas kelompok dalam waktu bersamaan pada satu dokumen.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="feature feature-plain">
    <div class="row">
        <div class="col-md-6 wow slideInLeft">
            <h3>Integrasi dengan Google Drive</h3>
            <p>Sebagai media penyimpanan awan, Google Drive juga disematkan pada sistem Collaborative Learning.
                Dengan menggunakan Google Drive API, mahasiswa dan dosen dapat menyimpan dokumen tugas dan materi
                perkuliahan dengan aman pada <i>personal storage</i>-nya masing-masing
            </p>
        </div>
        <div class="col-md-6 wow slideInRight">
            {{HTML::image('assets/images/google1.jpg')}}
        </div>
    </div>
</div>

<div class="ready">
    <div class="bg-overlay">
        <h1 class="wow slideInUp">Anda tertarik?</h1>
        <a href="#" class="wow fadeIn" data-wow-delay="1s">MULAI SEKARANG</a>
    </div>
</div>
<div class="footer">
    Copyright &copy; 2015. <a href="">Collab</a>
</div>
@stop