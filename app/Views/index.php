<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-6 align-self-center">
            <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
              <?php foreach ($slider as $index => $slide): ?>
                <div class="carousel-item <?= $index === 0 ? 'active' : ''; ?>">
                  <h1>
                    <?= ($lang == 'id') ? $slide['caption_slider_id'] : $slide['caption_slider_en']; ?>
                  </h1>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
              <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <?php foreach ($slider as $index => $slide): ?>
                    <div class="carousel-item <?= ($index === 0) ? 'active' : ''; ?>">
                      <img src="<?= base_url('assets/img/slider/' . $slide['foto_slider']) ?>" class="d-block w-100" alt="<?= ($lang == 'id') ? $slide['alt_foto_slider_id'] : $slide['alt_foto_slider_en']; ?>" <?= $index + 1 ?>">
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Tombol Navigasi -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

    </div>
  </div>

  <div id="tentang" class="our-services section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center mb-5">
          <h2 class="section-title"><?= $lang == 'id' ? $aboutMeta['nama_halaman_id'] : $aboutMeta['nama_halaman_en']; ?></h2>
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
            <h2><?= $lang == 'id' ? $aboutMeta['deskripsi_halaman_id'] : $aboutMeta['deskripsi_halaman_en']; ?></h2>
            <p><?= $lang == 'id' ? $profil['deskripsi_perusahaan_id'] : $profil['deskripsi_perusahaan_en']; ?></p>
          </div>
          <div class="main-blue-button-about">
            <a href="<?= base_url($lang == 'id' ? 'id/tentang' : 'en/about') ?>" class="button-text button-bg"><?= lang('bahasa.btn'); ?></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="produk" class="our-portfolio section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center mb-5">
          <h2 class="section-title"><?= $lang == 'id' ? $productMeta['nama_halaman_id'] : $productMeta['nama_halaman_en']; ?></h2>
        </div>
        <div class="row">
          <div class="col-lg-6 offset-lg-3">
            <div class="section-heading  wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
              <h2><?= $lang == 'id' ? $productMeta['deskripsi_halaman_id'] : $productMeta['deskripsi_halaman_en']; ?></h2>
            </div>
          </div>
        </div>
        <div class="row">
          <?php foreach ((array_slice($product, 0, 4)) as $p) : ?>
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
          <div class="main-blue-button" align="center">
            <a href="<?= base_url($lang == 'id' ? 'id/produk' : 'en/product') ?>"><?= lang('bahasa.btnAll'); ?></a>
          </div>
        </div>
      </div>
    </div>

    <div id="aktivitas" class="about-us section">
      <div class="row">
        <div class="col-lg-12 text-center mb-5">
          <h2 class="section-title-kontak"><?= $lang == 'id' ? $aktivitasMeta['nama_halaman_id'] : $aktivitasMeta['nama_halaman_en']; ?></h2>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading  wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
            <p align="center" style="color: white; margin-bottom:2%">See What Our Agency Offers What We Provide</p>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="left-image wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
              <img src="/assets/img/about-left-image.png" alt="person graphic">
            </div>
          </div>
          <div class="col-lg-8 align-self-center">
            <div class="services">
              <div class="row">
                <?php foreach (array_chunk(array_slice($aktivitas, 0, 4), 2) as $aktivitas_row) : ?>
                  <div class="row">
                    <?php foreach ($aktivitas_row as $aktivitas) : ?>
                      <div class="col-md-6">
                        <a href="<?= base_url(
                                    $lang == 'id'
                                      ? 'id/aktivitas/' . (!empty($aktivitas['slug_kategori_id']) ? $aktivitas['slug_kategori_id'] : 'kategori-tidak-ditemukan') . '/' . (!empty($aktivitas['slug_aktivitas_id']) ? $aktivitas['slug_aktivitas_id'] : 'aktivitas-tidak-ditemukan')
                                      : 'en/activity/' . (!empty($aktivitas['slug_kategori_en']) ? $aktivitas['slug_kategori_en'] : 'category-not-found') . '/' . (!empty($aktivitas['slug_aktivitas_en']) ? $aktivitas['slug_aktivitas_en'] : 'activity-not-found')
                                  ); ?>" style="text-decoration: none; color: inherit;">
                          <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
                            <div class="icon">
                              <img src="<?= base_url('assets/img/aktivitas/' . $aktivitas["foto_aktivitas"]) ?>"
                                alt="<?= $lang == 'id' ? $aktivitas['alt_aktivitas_id'] : $aktivitas['alt_aktivitas_en']; ?>"
                                style="border-radius: 15%;">

                            </div>
                            <div class="right-text">
                              <h4><?= $lang == 'id' ? $aktivitas['judul_aktivitas_id'] : $aktivitas['judul_aktivitas_en']; ?></h4>
                              <p><?= $lang == 'id' ? $aktivitas['snippet_id'] : $aktivitas['snippet_en']; ?></p>
                            </div>
                          </div>
                        </a>
                      </div>
                    <?php endforeach; ?>
                  </div>
                <?php endforeach; ?>
              </div>


              <div class="col-lg-12">
                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="1.1s">
                  <div class="main-blue-button" style="margin-top: 10px; margin-left: 330px;">
                    <a href="<?= base_url($lang == 'id' ? 'id/aktivitas' : 'en/activity') ?>"><?= lang('bahasa.btnAll'); ?></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div id="blog" class="our-blog section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center mb-5">
          <h2 class="section-title">
            <?= $lang == 'id' ? $articleMeta['nama_halaman_id'] : $articleMeta['nama_halaman_en']; ?>
          </h2>
        </div>
      </div>
      <div class="row">
        <div data-wow-duration="1s" data-wow-delay="0.25s">
          <div class="section-heading">
            <p align="center" class="mb-5">
              <?= $lang == 'id' ? $articleMeta['deskripsi_halaman_id'] : $articleMeta['deskripsi_halaman_en']; ?>
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- Artikel utama -->
        <div class="col-lg-7 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
          <div class="left-image">
            <a href="<?= base_url(
                        $lang === 'id'
                          ? 'id/artikel/' . ($article[0]['slug_kategori_id'] ?? 'kategori-tidak-ditemukan') . '/' . ($article[0]['slug_artikel_id'] ?? 'artikel-tidak-ditemukan')
                          : 'en/article/' . ($article[0]['slug_kategori_en'] ?? 'category-not-found') . '/' . ($article[0]['slug_artikel_en'] ?? 'article-not-found')
                      ); ?>" style="text-decoration: none; color: inherit;">
              <img src="<?= base_url('assets/img/artikel/' . $article[0]['foto_artikel']); ?>"
                alt="<?= $lang == 'id' ? $article[0]['alt_artikel_id'] : $article[0]['alt_artikel_en']; ?>">
            </a>
            <div class="info">
              <div class="inner-content">
                <ul>
                  <li><i class="fa fa-calendar"></i> <?= date('d M Y', strtotime($article[0]['updated_at'])); ?></li>
                  <li><i class="fa fa-folder"></i> <?= $lang == 'id' ? $article[0]['nama_kategori'] : $article[0]['nama_kategori']; ?></li>
                </ul>
                <a href="#">
                  <h4><?= $lang == 'id' ? $article[0]['judul_artikel_id'] : $article[0]['judul_artikel_en']; ?></h4>
                </a>
                <p><?= $lang == 'id' ? $article[0]['snippet_id'] : $article[0]['snippet_en']; ?></p>
                <div class="main-blue-button" style="margin-top: -1%;">
                  <a href="<?= base_url(
                              $lang === 'id'
                                ? 'id/artikel/' . ($article['slug_kategori_id'] ?? 'kategori-tidak-ditemukan') . '/' . ($article['slug_artikel_id'] ?? 'artikel-tidak-ditemukan')
                                : 'en/article/' . ($article['slug_kategori_en'] ?? 'category-not-found') . '/' . ($article['slug_artikel_en'] ?? 'article-not-found')
                            ); ?>" class="btn btn-info"> <?= lang('bahasa.btn'); ?></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Artikel terkait -->
        <div class="col-lg-5 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
          <h4>Artikel Terkait</h4>
          <hr>
          <div class="right-list">
            <ul>
              <?php if (!empty($sideArtikel)): ?>
                <?php foreach (array_slice($sideArtikel, 0, 4) as $article): ?>
                  <li>
                    <div class="left-content align-self-center">
                      <span><i class="fa fa-calendar"></i> <?= date('d M Y', strtotime($article['updated_at'])); ?></span>
                      <a href="<?= base_url($lang == 'id'
                                  ? 'id/artikel/' . $article['slug_kategori_id'] . '/' . $article['slug_artikel_id']
                                  : 'en/article/' . $article['slug_kategori_en'] . '/' . $article['slug_artikel_en']); ?>">
                        <h4><?= $lang == 'id' ? $article['judul_artikel_id'] : $article['judul_artikel_en']; ?></h4>
                      </a>
                      <p><?= implode(' ', array_slice(explode(' ', $lang == 'id' ? $article['snippet_id'] : $article['snippet_en']), 0, 7)) . '...'; ?></p>
                    </div>
                    <div class="right-image">
                      <a href="<?= base_url($lang == 'id'
                                  ? 'id/artikel/' . $article['slug_kategori_id'] . '/' . $article['slug_artikel_id']
                                  : 'en/article/' . $article['slug_kategori_en'] . '/' . $article['slug_artikel_en']); ?>">
                        <img src="<?= base_url('assets/img/artikel/' . $article['foto_artikel']); ?>"
                          alt="<?= $lang == 'id' ? $article['alt_artikel_id'] : $article['alt_artikel_en']; ?>" loading="lazy" style="width: 80%;">
                      </a>
                    </div>
                    </a>
                  </li>
                <?php endforeach; ?>
              <?php else: ?>
                <p>Tidak ada artikel terkait.</p>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div id="contact" class="contact-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center mb-5">
          <h2 class="section-title-kontak"><?= $lang == 'id' ? $contactMeta['nama_halaman_id'] : $contactMeta['nama_halaman_en']; ?></h2>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 align-self-center wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <div class="section-heading">
            <h2><?= $lang == 'id' ? $contactMeta['deskripsi_halaman_id'] : $contactMeta['deskripsi_halaman_en']; ?> <div class="main-blue-button-kontak" align="center">
            <a href="<?= base_url($lang == 'id' ? 'id/kontak' : 'en/contact') ?>"><?= lang('bahasa.btnAll'); ?></a>
              </div>
            </h2>
          </div>
        </div>
        <div class="col-lg-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.2410172250497!2d112.66326097368533!3d-7.974024292051046!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6298db1e5b70b%3A0xaf3552a89f1cc9f0!2sELECOMP%20INDONESIA!5e0!3m2!1sid!2sid!4v1741667188646!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </div>

  <?= $this->endSection(); ?>