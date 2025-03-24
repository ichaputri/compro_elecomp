<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div id="tentang" class="our-services section mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h2 class="section-title"><?= lang('bahasa.Tentang'); ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 align-self-center  wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
                <div class="left-image">
                    <img src="<?= base_url('assets/img/profil/' . $profil['foto_perusahaan']); ?>" alt="<?= $lang == 'id' ? $profil['alt_foto_perusahaan_id'] : $profil['alt_foto_perusahaan_en']; ?>">
                </div>
            </div>
            <div class="col-lg-6 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
                <div class="section-heading">
                    <h1><?= $lang == 'id' ? $meta['deskripsi_halaman_id'] : $meta['deskripsi_halaman_en']; ?></h1>
                    <p><?= $lang == 'id' ? $profil['deskripsi_perusahaan_id'] : $profil['deskripsi_perusahaan_en']; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>