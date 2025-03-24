<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div id="blog" class="our-blog section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center mb-5">
        <h2 class="section-title">
          <?= $lang == 'id' ? $meta['nama_halaman_id'] : $meta['nama_halaman_en']; ?>
        </h2>
      </div>
    </div>
    <div class="row">
      <div data-wow-duration="1s" data-wow-delay="0.25s">
        <div class="section-heading">
          <h1 align="center" class="mb-5">
            <?= $lang == 'id' ? $meta['deskripsi_halaman_id'] : $meta['deskripsi_halaman_en']; ?>
          </h1>
        </div>
      </div>
    </div>
    <div class="row">
      <!-- Artikel utama -->
      <div class="col-lg-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
        <?php foreach (array_slice($allArticle, 0, 2) as $article) : ?>
          <div class="left-image">
            <a href="<?= base_url(
                        $lang === 'id'
                          ? 'id/artikel/' . ($article['slug_kategori_id'] ?? 'kategori-tidak-ditemukan') . '/' . ($article['slug_artikel_id'] ?? 'artikel-tidak-ditemukan')
                          : 'en/article/' . ($article['slug_kategori_en'] ?? 'category-not-found') . '/' . ($article['slug_artikel_en'] ?? 'article-not-found')
                      ); ?>" style="text-decoration: none; color: inherit;">
              <img src="<?= base_url('assets/img/artikel/' . $article['foto_artikel']); ?>"
                alt="<?= $lang == 'id' ? $article['alt_artikel_id'] : $article['alt_artikel_en']; ?>">
            </a>
            <div class="info">
              <div class="inner-content">
                <ul>
                  <li><i class="fa fa-calendar"></i> <?= date('d M Y', strtotime($article['updated_at'])); ?></li>
                  <li><i class="fa fa-folder"></i> <?= $lang == 'id' ? $article['nama_kategori'] : $article['nama_kategori']; ?></li>
                </ul>
                <h4><?= $lang == 'id' ? $article['judul_artikel_id'] : $article['judul_artikel_en']; ?></h4>
                <p><?= $lang == 'id' ? $article['snippet_id'] : $article['snippet_en']; ?></p>
                <div class="main-blue-button" style="margin-top: -1%;">
                  <a href="<?= base_url(
                              $lang === 'id'
                                ? 'id/artikel/' . ($article['slug_kategori_id'] ?? 'kategori-tidak-ditemukan') . '/' . ($article['slug_artikel_id'] ?? 'artikel-tidak-ditemukan')
                                : 'en/article/' . ($article['slug_kategori_en'] ?? 'category-not-found') . '/' . ($article['slug_artikel_en'] ?? 'article-not-found')
                            ); ?>" class="btn btn-info"><?= lang('bahasa.btn'); ?></a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Artikel Terkait -->
      <div class="col-lg-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
        <h4><?= $lang == 'id' ? 'Artikel Lainnya' : 'Related Article'; ?></h4>
        <hr><br>
        <div class="right-list">
          <ul>
            <?php if (!empty($sideArticle)): ?>
              <?php foreach ($sideArticle as $article): ?>
                <li>
                  <div class="left-content align-self-center">
                    <span>
                      <i class="fa fa-calendar"></i>
                      <?= date('d M Y', strtotime($article['updated_at'])); ?>
                    </span>
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
                        alt="<?= $lang == 'id' ? $article['alt_artikel_id'] : $article['alt_artikel_en']; ?>" loading="lazy">
                    </a>
                  </div>
                </li>
              <?php endforeach; ?>
            <?php else: ?>
              <p><?= $lang == 'id' ? 'Tidak ada artikel terkait.' : 'There are no related article.'; ?></p>
            <?php endif; ?>
          </ul>
        </div>
      </div>


      <?= $this->endSection(); ?>