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
            <!-- Aktivitas utama -->
            <div class="col-lg-8 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                <div class="left-image">
                    <img src="<?= base_url('assets/img/aktivitas/' . $aktivitas['foto_aktivitas']); ?>"
                        alt="<?= $lang == 'id' ? $aktivitas['alt_aktivitas_id'] : $aktivitas['alt_aktivitas_en']; ?>">
                    <div class="info">
                        <div class="inner-content">
                            <ul>
                                <li><i class="fa fa-calendar"></i> <?= date('d M Y', strtotime($aktivitas['updated_at'])); ?></li>
                                <li><i class="fa fa-folder"></i> <?= $lang == 'id' ? $aktivitas['nama_kategori_id'] : $aktivitas['nama_kategori_en']; ?></li>
                            </ul>
                            <h1 style="font-size: larger; font-weight:bold; margin:3% 0;" ><?= $lang == 'id' ? $aktivitas['judul_aktivitas_id'] : $aktivitas['judul_aktivitas_en']; ?></h1>
                            <p><?= $lang == 'id' ? $aktivitas['deskripsi_aktivitas_id'] : $aktivitas['deskripsi_aktivitas_en']; ?> Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae distinctio laboriosam soluta nulla incidunt ullam sunt qui voluptas nesciunt perferendis quibusdam praesentium quos odit magnam, assumenda doloremque. Accusamus, fugiat? Aperiam! Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis eos nulla reiciendis? Consequatur quis, itaque et odit maiores, culpa aut perferendis atque nulla numquam hic maxime repudiandae beatae, non asperiores! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt nihil molestiae eveniet ullam accusantium voluptas perferendis illo dolores, exercitationem veritatis ipsam aliquam nisi placeat tempore quisquam laborum dolorum velit dolor? Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse incidunt earum eum dolorum, iste, ea atque ratione quod alias assumenda pariatur deleniti non libero accusantium mollitia quis animi quasi voluptatibus!</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- aktivitas Terkait -->
            <div class="col-lg-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                <h4><?= $lang == 'id' ? 'Aktivitas Lainnya' : 'Related Activity'; ?></h4>
                <hr><br>
                <div class="right-list">
                    <ul>
                        <?php if (!empty($allArticle)): ?>
                            <?php foreach ($allArticle as $article): ?>
                                <li>
                                    <div class="left-content align-self-center">
                                        <span>
                                            <i class="fa fa-calendar"></i>
                                            <?= date('d M Y', strtotime($article['updated_at'])); ?>
                                        </span>
                                        <a href="<?= base_url($lang == 'id'
                                                        ? 'id/aktivitas/' . $article['slug_kategori_id'] . '/' . $article['slug_aktivitas_id']
                                                        : 'en/article/' . $article['slug_kategori_en'] . '/' . $article['slug_aktivitas_en']); ?>">
                                            <p><?= $lang == 'id' ? $article['judul_aktivitas_id'] : $article['judul_aktivitas_en']; ?></p>
                                        </a>
                                    </div>
                                    <div class="right-image">
                                        <a href="<?= base_url($lang == 'id'
                                                        ? 'id/aktivitas/' . $article['slug_kategori_id'] . '/' . $article['slug_aktivitas_id']
                                                        : 'en/article/' . $article['slug_kategori_en'] . '/' . $article['slug_aktivitas_en']); ?>">
                                            <img src="<?= base_url('assets/img/aktivitas/' . $article['foto_aktivitas']); ?>"
                                                alt="<?= $lang == 'id' ? $article['alt_aktivitas_id'] : $article['alt_aktivitas_en']; ?>" style="width:80%" loading="lazy">
                                        </a>
                                        <div class="main-blue-button">
                        <a href="<?= base_url($lang == 'id' ? 'id/aktivitas' : 'en/article') ?>"><?= lang('bahasa.btn'); ?></a>
                    </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p><?= $lang == 'id' ? 'Tidak ada aktivitas terkait.' : 'There are no related activities.'; ?></p>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>