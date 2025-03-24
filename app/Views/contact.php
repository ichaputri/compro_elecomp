<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div id="contact" class="contact-us section" style="margin-top: 5%;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h2 class="section-title-kontak"><?= $lang == 'id' ? $meta['nama_halaman_id'] : $meta['nama_halaman_en']; ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 align-self-center wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
                <div class="section-heading">
                    <h1><?= $lang == 'id' ? $meta['deskripsi_halaman_id'] : $meta['deskripsi_halaman_en']; ?></h1>
                    <div class="phone-info">
                        <h4><?= $lang == 'id' ? $kontak['deskripsi_kontak_id'] : $kontak['deskripsi_kontak_en']; ?></a></span></h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.2410172250497!2d112.66326097368533!3d-7.974024292051046!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6298db1e5b70b%3A0xaf3552a89f1cc9f0!2sELECOMP%20INDONESIA!5e0!3m2!1sid!2sid!4v1741667188646!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection();