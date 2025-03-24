<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div id="tentang" class="our-services section mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h1 class="section-title"><?= $lang == 'id' ? $product['nama_produk_id'] : $product['nama_produk_en']; ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 align-self-center  wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
                <div class="left-image">
                    <img src="<?= base_url('assets/img/produk/' . $product['foto_produk']); ?>" alt="<?= $lang == 'id' ? $product['alt_produk_id'] : $product['alt_produk_en']; ?>" style="border-radius: 5%;">
                </div>
            </div>
            <div class="col-lg-6 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
                <div class="section-heading">
                    <p><?= $lang == 'id' ? $product['deskripsi_produk_id'] : $product['deskripsi_produk_en']; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>