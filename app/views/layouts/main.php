<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs as Bootstrap4Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap5\Breadcrumbs;



AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">



<head>
  <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
  <?php $this->beginBody() ?>

  <header id="header">
    <?php
    // NavBar::begin([
    //     'brandLabel' => Yii::$app->name,
    //     'brandUrl' => Yii::$app->homeUrl,
    //     'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
    // ]);
    // echo GhostMenu::widget([
    //     'encodeLabels'=>false,
    //     'activateParents'=>true,
    //     'items' => [
    //         // [
    //         //     'label' => 'Backend routes',
    //         //     'items'=>UserManagementModule::menuItems()
    //         // ],
    //         [
    //             'label' => 'Frontend routes',
    //             'items'=>[
    //                 ['label'=>'Login', 'url'=>['/user-management/auth/login']],
    //                 ['label'=>'Logout', 'url'=>['/user-management/auth/logout']],
    //                 ['label'=>'Registration', 'url'=>['/user-management/auth/registration']],
    //                 ['label'=>'Change own password', 'url'=>['/user-management/auth/change-own-password']],
    //                 ['label'=>'Password recovery', 'url'=>['/user-management/auth/password-recovery']],
    //                 ['label'=>'E-mail confirmation', 'url'=>['/user-management/auth/confirm-email']],
    //             ],
    //         ],
    //     ],
    // ]);
    // echo Nav::widget([
    //     'options' => ['class' => 'navbar-nav'],
    //     'items' => [
    //         ['label' => 'Home', 'url' => ['/site/index']],
    //         ['label' => 'About', 'url' => ['/site/about']],
    //         ['label' => 'Contact', 'url' => ['/site/contact']],
    //         Yii::$app->user->isGuest
    //             ? ['label' => 'Login', 'url' => ['/site/login']]
    //             : '<li class="nav-item">'
    //                 . Html::beginForm(['/site/logout'])
    //                 . Html::submitButton(
    //                     'Logout (' . Yii::$app->user->identity->username . ')',
    //                     ['class' => 'nav-link btn btn-link logout']
    //                 )
    //                 . Html::endForm()
    //                 . '</li>'
    //     ]
    // ]);
    // NavBar::end();
    ?>
    <nav class="navbar navbar-expand-md fixed-top">
      <style>
        .navbar {
          background: #006A4E;

          /* untuk menampilkan supaya tampilan navbar jadi gradasi

          background-image: linear-gradient(to right, darkslategray, black); */
        }

/* warna text pada navbar */
        .nav-link {
          color: white !important;
        }
      </style>
      
      <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <?= Html::a('Simpeg', ['site/index'], ['class' => 'nav-link']) ?>
            <?= Html::a('Home', ['site/index'], ['class' => 'nav-link']) ?>
            <?php if (!Yii::$app->user->isGuest) : ?>
              <?= Html::a('Biodata Pegawai', ['/biodata-pegawai/index'], ['class' => 'nav-link']) ?>

              <ul class="navbar-nav">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" role="button" id="dropdownStart" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                    Riwayat
                  </a>
                  <div class="dropdown-menu" aria-labelledby="dropdownStart">
                    <?= Html::a('Riwayat Keluarga', ['/riwayat-keluarga'], ['class' => 'dropdown-item']) ?>
                    <?= Html::a('Riwayat Pendidikan', ['/riwayat-pendidikan'], ['class' => 'dropdown-item']) ?>
                  </div>
                </li>
              </ul>



              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                  Master
                </a>
                <div class="dropdown-menu">
                  <?= Html::a('Master Jenis Kelamin', ['/master-jenis-kelamin'], ['class' => 'dropdown-item']) ?>
                  <?= Html::a('Master Agama', ['/master-agama'], ['class' => 'dropdown-item']) ?>
                  <?= Html::a('Master Hubungan Keluarga', ['/master-hubungan-keluarga'], ['class' => 'dropdown-item']) ?>
                  <?= Html::a('Master Status Perkawinan', ['/master-status-perkawinan'], ['class' => 'dropdown-item']) ?>
                  <?= Html::a('Jenis Pegawai', ['/jenis-pegawai'], ['class' => 'dropdown-item']) ?>
                  <?= Html::a('Unit Kerja', ['/unit-kerja'], ['class' => 'dropdown-item']) ?>
                </div>
              </li>
              </ul>
              <ul class="navbar-nav">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    Laporan
                  </a>
                  <div class="dropdown-menu">
                    <?= Html::a('Rekap Jenis Kelamin dan Pegawai', ['laporan/rekap_per_jenis_kelamin_pegawai'], ['class' => 'dropdown-item']) ?>
                    <?= Html::a('Rekap Nama Unit, Jenis Kelamin dan Total', ['laporan/rekap_per_nama_unit_jenis_kelamin_total'], ['class' => 'dropdown-item']) ?>
                    <?= Html::a('Rekap Nama Unit, Jumlah Pegawai', ['laporan/rekap_per_nama_unit_pegawai'], ['class' => 'dropdown-item']) ?>
                  </div>
                </li>
              </ul>
              <?= Html::a('User', ['/user'], ['class' => 'nav-link']) ?>
            <?php endif; ?>

            <?php
            if (Yii::$app->user->isGuest) {
              echo Html::a('Login', ['/auth/login'], ['class' => 'nav-link']);
            } else
              echo Html::a('Logout', ['/auth/logout'], ['class' => 'nav-link']);
            ?>
          </div>
        </div>
    </nav>
  </header>

  <main id="main" class="flex-shrink-0" role="main">
    <div class="container">
      <?php if (!empty($this->params['breadcrumbs'])) : ?>
        <?= Bootstrap4Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
      <?php endif ?>
      <?= Alert::widget() ?>
      <?= $content ?>
    </div>
  </main>

  <footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
      <div class="row text-muted">
        <div class="col-md-6 text-center text-md-start">&copy; My Company <?= date('Y') ?></div>
        <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
      </div>
    </div>
  </footer>

  <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>