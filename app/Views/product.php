<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div id="produk" class="our-portfolio section mb-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center mb-5">
        <h2 class="section-title"><?= $lang == 'id' ? $meta['nama_halaman_id'] : $meta['nama_halaman_en']; ?></h2>
      </div>
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading  wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
            <h1><?= $lang == 'id' ? $meta['deskripsi_halaman_id'] : $meta['deskripsi_halaman_en']; ?></h1>
          </div>
        </div>
      </div>
      <div class="row">
        <?php foreach ($product as $p) : ?>
          <div class="col-lg-3 col-sm-6">
            <a href="<?= base_url($lang == 'id'
                        ? 'id/produk/' . $p['slug_id']
                        : 'en/product/' . $p['slug_en']); ?>"
              style="text-decoration: none; color: inherit;">
              <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="hidden-content">
                  <h4><?= $lang == 'id' ? $p['nama_produk_id'] : $p['nama_produk_en']; ?></h4>
                  <p><?= implode(' ', array_slice(explode(' ', ($lang == 'id' ? $p['deskripsi_produk_id'] : $p['deskripsi_produk_en'])), 0, 5)) . '...'; ?></p>
                </div>
                <div class="showed-content">
                  <img src="<?= base_url('assets/img/produk/' . $p['foto_produk']); ?>"
                    alt="<?= $lang == 'id' ? $p['alt_produk_id'] : $p['alt_produk_en']; ?>">
                </div>
              </div>
            </a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<?= $this->endSection(); ?>