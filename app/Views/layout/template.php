<?php
// Ambil bahasa yang disimpan di session
$lang = session()->get('lang') ?? 'id'; // Default ke 'id' jika tidak ada di session

$current_url = uri_string();

// Ambil query string (misalnya ?keyword=sukses)
$query_string = $_SERVER['QUERY_STRING'] ?? ''; // Pastikan tidak ada error jika query string kosong

// Simpan segmen bahasa saat ini
$segments = explode('/', $current_url);
$lang_segment = $segments[0] ?? ''; // Ambil segmen pertama dari URL

// Pastikan hanya 'en' atau 'id' yang dianggap sebagai segmen bahasa
if ($lang_segment !== 'en' && $lang_segment !== 'id') {
    $lang_segment = 'id'; // Default ke 'id' jika segmen bahasa tidak ada
}

// Definisikan tautan untuk setiap halaman berdasarkan bahasa
$homeLink    = ($lang_segment === 'en') ? '/' : '/';
$aboutLink   = ($lang_segment === 'en') ? 'about' : 'tentang';
$contactLink = ($lang_segment === 'en') ? 'contact' : 'kontak';
$articleLink = ($lang_segment === 'en') ? 'article' : 'artikel';
$activityLink = ($lang_segment === 'en') ? 'activity' : 'aktivitas';
$productLink = ($lang_segment === 'en') ? 'product' : 'produk';

// Ambil bagian dari URL tanpa segmen bahasa
array_shift($segments); // Hapus segmen bahasa dari array
$url_without_lang = implode('/', $segments); // Gabungkan kembali sisa URL

// Tentukan bahasa yang ingin digunakan
$new_lang = ($lang_segment === 'en') ? 'id' : 'en';

// Mapping penggantian segmen dalam URL berdasarkan bahasa yang aktif
$replace_map = [
    'tentang' => 'about',
    'kontak' => 'contact',
    'artikel' => 'article',
    'aktivitas' => 'activity',
    'produk' => 'product',
];

foreach ($replace_map as $id => $en) {
    if ($lang_segment === 'en') {
        // Jika bahasa saat ini 'en', ubah ke 'id'
        $url_without_lang = str_replace($en, $id, $url_without_lang);
    } else {
        // Jika bahasa saat ini 'id', ubah ke 'en'
        $url_without_lang = str_replace($id, $en, $url_without_lang);
    }
}

// Buat URL yang bersih
$clean_url = ($url_without_lang !== '') ? "$new_lang/$url_without_lang" : $new_lang;

// Gabungkan query string jika ada
if (!empty($query_string)) {
    $clean_url .= '?' . $query_string;
}

// Tautan Bahasa Inggris & Indonesia
$english_url = base_url($clean_url);
$indonesia_url = base_url($clean_url);

// Tautan Kategori Artikel untuk Navbar
$categoryLinks = [];
if (!empty($categories)) {
    foreach ($categories as $cat) {
        $slug = ($lang === 'id') ? $cat['slug_kategori_id'] : $cat['slug_kategori_en'];
        $name = ($lang === 'id') ? $cat['nama_kategori_id'] : $cat['nama_kategori_en'];
        $categoryLinks[] = [
            'url' => base_url("$lang/$articleLink/$slug"),
            'name' => $name
        ];
    }
}

// Tautan Kategori Aktivitas untuk Navbar
$kategoriAktivitasLinks = [];
if (!empty($categoriesAktivitas)) {
    foreach ($categoriesAktivitas as $cat) {
        $slug = ($lang === 'id') ? $cat['slug_kategori_id'] : $cat['slug_kategori_en'];
        $name = ($lang === 'id') ? $cat['nama_kategori_id'] : $cat['nama_kategori_en'];
        $kategoriAktivitasLinks[] = [
            'url' => base_url("$lang/$activityLink/$slug"),
            'name' => $name
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="<?= session()->get('lang') ?? 'id'; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if (isset($metaCategory)): ?>
        <title><?= $lang == 'id' ? $metaCategory['title_id'] : $metaCategory['title_en']; ?></title>
        <meta name="description" content="<?= $lang == 'id' ? $metaCategory['meta_desc_id'] : $metaCategory['meta_desc_en']; ?>">
    <?php else: ?>
        <title><?= $lang == 'id' ? $meta['title_id'] : $meta['title_en']; ?></title>
        <meta name="description" content="<?= $lang == 'id' ? $meta['meta_desc_id'] : $meta['meta_desc_en']; ?>">
    <?php endif; ?>
    <link rel="canonical" href="<?= isset($canonical) && !empty($canonical) ? $canonical : base_url() ?>">

    <link href=" <?= base_url('furnetic.ico'); ?>" rel="icon">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="<?= base_url('assets/css/fontawesome.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/templatemo-space-dynamic.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/animated.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/owl.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-white d-flex align-items-center justify-content-between">
                <!-- Logo dan Hamburger dalam Satu Baris -->
                <div class="d-flex align-items-center w-100">
                    <!-- Logo -->
                    <a class="navbar-brand" href="<?= base_url($lang . '/') ?>">
                        <img src="<?= base_url('assets/img/profil/' . $profil['logo_perusahaan']); ?>"
                            style="width: 40%; margin-top:1%" alt="<?= $profil['nama_perusahaan']; ?>">
                    </a>

                    <!-- Toggle Button for Mobile -->
                    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>

                <!-- Navbar Links -->
                <div class="collapse navbar-collapse bg-white" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item me-3">
                            <a href="<?= base_url($lang . '/') ?>" class="nav-link <?= isset($data['activeMenu']) && $data['activeMenu'] === 'home' ? 'active' : '' ?>">
                                <?= lang('bahasa.Beranda'); ?>
                            </a>
                        </li>
                        <li class="nav-item me-3">
                            <a href="<?= base_url($lang . '/' . $aboutLink) ?>" class="nav-link <?= isset($data['activeMenu']) && $data['activeMenu'] === 'about' ? 'active' : '' ?>">
                                <?= lang('bahasa.Tentang'); ?>
                            </a>
                        </li>
                        <li class="nav-item me-3">
                            <a href="<?= base_url($lang . '/' . $productLink) ?>" class="nav-link <?= isset($activeMenu) && $activeMenu === 'product' ? 'active' : '' ?>">
                                <?= lang('bahasa.Produk'); ?>
                            </a>
                        </li>

                        <!-- Dropdown Aktivitas -->
                        <li class="nav-item dropdown me-3">
                            <a href="#" class="nav-link <?= isset($data['activeMenu']) && $data['activeMenu'] === 'activity' ? 'active' : '' ?>" id="activityDropdown" role="button" data-bs-toggle="dropdown">
                                <?= lang('bahasa.Aktivitas'); ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= base_url($lang . '/' . $activityLink) ?>">
                                        <?= $lang == 'id' ? 'Semua Aktivitas' : 'All Activity'; ?></a></li>
                                <?php foreach ($kategoriAktivitasLinks as $kategoriAktivitasLink): ?>
                                    <li><a class="dropdown-item" href="<?= $kategoriAktivitasLink['url']; ?>">
                                            <?= $kategoriAktivitasLink['name']; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>

                        <!-- Dropdown Artikel -->
                        <li class="nav-item dropdown me-3">
                            <a class="nav-link <?= isset($data['activeMenu']) && $data['activeMenu'] === 'article' ? 'active' : '' ?>" href="#" id="articleDropdown" role="button" data-bs-toggle="dropdown">
                                <?= lang('bahasa.Artikel'); ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= base_url($lang . '/' . $articleLink) ?>">
                                        <?= $lang == 'id' ? 'Semua Artikel' : 'All Articles'; ?></a></li>
                                <?php foreach ($categoryLinks as $categoryLink): ?>
                                    <li><a class="dropdown-item" href="<?= $categoryLink['url']; ?>">
                                            <?= $categoryLink['name']; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>

                        <li class="nav-item me-3">
                            <a href="<?= base_url($lang . '/' . $contactLink) ?>" class="nav-link <?= isset($data['activeMenu']) && $data['activeMenu'] === 'contact' ? 'active' : '' ?>">
                                <?= lang('bahasa.Kontak'); ?>
                            </a>
                        </li>

                        <!-- Language Switcher -->
                        <li class="nav-item dropdown me-3">
                            <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown">
                                <?= ($lang === 'en') ? 'English' : 'Indonesia'; ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item <?= $lang === 'id' ? 'active disabled' : ''; ?>" href="<?= $indonesia_url; ?>">
                                        <img src="<?= base_url('assets/img/logo/indonesia.jpg') ?>" style="width: 20px;" alt=""> Indonesia</a>
                                </li>
                                <li><a class="dropdown-item <?= $lang === 'en' ? 'active disabled' : ''; ?>" href="<?= $english_url; ?>">
                                        <img src="<?= base_url('assets/img/logo/english.jpg') ?>" style="width: 20px;" alt=""> English</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <div class="main-red-button">
                                <a href="http://wa.me/6281331337926">Kontak Kami</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

        </div>
    </header>
    <!-- ***** Header Area End ***** -->
    <div class="main-content">
        <?= $this->renderSection('content'); ?>
    </div>

    <footer>
        <div class="footer-container">
            <!-- Logo di Sebelah Kiri -->
            <div class="footer-column">
                <img src="<?= base_url('assets/img/profil/' . $profil['logo_perusahaan']); ?>"
                    alt="<?= $lang == 'id' ? $profil['alt_logo_perusahaan_id'] : $profil['alt_logo_perusahaan_en']; ?>"
                    style="width: 200px;">
            </div>

            <div class="footer-column" style="margin-left: 5%;">
                <h3><?= lang('bahasa.headerLink'); ?></h3>
                <ul>
                    <li><a href="<?= base_url($lang . '/' . $homeLink) ?>" class="<?= isset($data['activeMenu']) && $data['activeMenu'] === 'home' ? 'active' : '' ?>"><?= lang('bahasa.Beranda'); ?></a></li>
                    <li><a href="<?= base_url($lang . '/' . $aboutLink) ?>" class="<?= isset($data['activeMenu']) && $data['activeMenu'] === 'about' ? 'active' : '' ?>"><?= lang('bahasa.Tentang'); ?></a></li>
                    <li><a href="<?= base_url($lang . '/' . $articleLink) ?>" class="<?= isset($data['activeMenu']) && $data['activeMenu'] === 'article' ? 'active' : '' ?>"><?= lang('bahasa.Artikel'); ?></a></li>
                    <li><a href="<?= base_url($lang . '/' . $productLink) ?>" class="<?= isset($activeMenu) && $activeMenu === 'product' ? 'active' : '' ?>"><?= lang('bahasa.Produk'); ?></a></li>
                    <li><a href="<?= base_url($lang . '/' . $contactLink) ?>" class="<?= isset($data['activeMenu']) && $data['activeMenu'] === 'contact' ? 'active' : '' ?>"><?= lang('bahasa.Kontak'); ?></a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h3><?= lang('bahasa.headerService'); ?></h3>
                <ul>
                    <?php if (!empty($kategori_teratas) && is_array($kategori_teratas)): ?>
                        <?php foreach ($kategori_teratas as $kategori): ?>
                            <li>
                                <a href="<?= base_url("id/artikel/" . $kategori['slug_kategori_id']) ?>">
                                    <?= $kategori['nama_kategori_id']; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li>No categories available</li>
                    <?php endif; ?>
                </ul>
            </div>

            <div class="footer-column">
                <h3><?= lang('bahasa.sosmedLink'); ?></h3>
                <ul>
                    <?php if (!empty($sosmed) && is_array($sosmed)): ?>
                        <?php foreach ($sosmed as $s): ?>
                            <li>
                                <a href="<?= $s['link_sosmed']; ?>" target="_blank">
                                    <img src="<?= base_url('assets/img/logo/' . $s['logo_sosmed']); ?>" alt="<?= $s['nama_sosmed']; ?>" style="width: 20px; height: 20px; margin-right: 5px;">
                                    <?= $s['nama_sosmed']; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li>No social media available</li>
                    <?php endif; ?>
                </ul>
            </div>

            <!-- Marketplace dalam footer-container agar sejajar -->
            <div class="footer-column">
                <h3><?= lang('bahasa.marketplaceLink'); ?></h3>
                <ul>
                    <?php if (!empty($marketplace) && is_array($marketplace)): ?>
                        <?php foreach ($marketplace as $s): ?>
                            <li>
                                <a href="<?= $s['link_marketplace']; ?>" target="_blank">
                                    <img src="<?= base_url('assets/img/logo/' . $s['logo_marketplace']); ?>" alt="<?= $s['nama_marketplace']; ?>" style="width: 20px; height: 20px; margin-right: 5px;">
                                    <?= $s['nama_marketplace']; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li>No marketplace available</li>
                    <?php endif; ?>
                </ul>
            </div>

        </div>

        <div class="container" style="text-align: center;">
            <div class="row">
                <div class="col-lg-12">
                    <p>© Copyright 2021 Space Dynamic Co. All Rights Reserved.
                        <br>Design: <a rel="nofollow" href="https://templatemo.com">TemplateMo</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>


    <!-- Scripts -->
    <script src="<?= base_url('vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/owl-carousel.js'); ?>"></script>
    <script src="<?= base_url('assets/js/animation.js'); ?>"></script>
    <script src="<?= base_url('assets/js/imagesloaded.js'); ?>"></script>
    <script src="<?= base_url('assets/js/templatemo-custom.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var navbarToggler = document.querySelector(".navbar-toggler");
            var navbarMenu = document.querySelector("#navbarNav");

            document.addEventListener("click", function(event) {
                var isClickInsideMenu = navbarMenu.contains(event.target);
                var isClickOnToggler = navbarToggler.contains(event.target);

                // Jika mengklik di luar menu dan hamburger, tutup menu
                if (!isClickInsideMenu && !isClickOnToggler) {
                    var bsCollapse = new bootstrap.Collapse(navbarMenu, {
                        toggle: false
                    });
                    bsCollapse.hide();
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            var navLinks = document.querySelectorAll(".nav-link");
            var navbarMenu = document.querySelector("#navbarNav");

            navLinks.forEach(function(link) {
                link.addEventListener("click", function() {
                    var bsCollapse = new bootstrap.Collapse(navbarMenu, {
                        toggle: false
                    });
                    bsCollapse.hide();
                });
            });
        });
    </script>


</body>

</html>