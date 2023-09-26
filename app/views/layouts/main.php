<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use webvimark\modules\UserManagement\components\AuthHelper;
use webvimark\modules\UserManagement\components\GhostMenu;
use webvimark\modules\UserManagement\components\GhostHtml;
use yii\bootstrap4\Breadcrumbs as Bootstrap4Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\NavBar;
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
    //   'brandLabel' => Yii::$app->name,
    //   'brandUrl' => Yii::$app->homeUrl,
    //   'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
    // ]);
    // echo GhostMenu::widget([
    //   'options' => ['class' => 'navbar-nav'],
    //   'items' => [
    //     ['label' => 'Biodata', 'url' => ['/biodata-pegawai/index'], 'linkOptions' => ['class' => 'nav-link']],
    //     [
    //       'options' => ['class' => 'nav-item dropdown'],
    //       'label' => 'Frontend routes',
    //       'items' => [
    //         ['label' => 'Login', 'url' => ['/user-management/auth/login']],
    //         ['label' => 'Logout', 'url' => ['/user-management/auth/logout']],
    //         ['label' => 'Registration', 'url' => ['/user-management/auth/registration']],
    //         ['label' => 'Change own password', 'url' => ['/user-management/auth/change-own-password']],
    //         ['label' => 'Password recovery', 'url' => ['/user-management/auth/password-recovery']],
    //         ['label' => 'E-mail confirmation', 'url' => ['/user-management/auth/confirm-email']],
    //       ],
    //     ],
    //   ],
    // ]);
    // echo Nav::widget([
    //     'options' => ['class' => 'navbar-nav'],
    //     'items' => [
    //         ['label' => 'Simpeg', 'url' => ['/site/index']],
    //         ['label' => 'Home', 'url' => ['/site/index']],
    //         ['label' => 'Biodata ', 'url' => ['/site/index']],

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
    // die;
    if (true) :
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
              <?= Html::a('Simpeg', ['/site/index'], ['class' => 'nav-link']) ?>
              <?= Html::a('Home', ['/site/index'], ['class' => 'nav-link']) ?>
              <?php if (!Yii::$app->user->isGuest) : ?>
                <?= GhostHtml::a('Biodata Pegawai', ['/biodata-pegawai/index'], ['class' => 'nav-link']) ?>

                <ul class="navbar-nav">
                  <li class="nav-item dropdown">
                    <?= GhostHtml::a('Riwayat', ['/riwayat-keluarga/index'], ['class' => 'nav-link dropdown-toggle', 'data-toggle' => 'dropdown', 'aria-expanded' => 'false', 'role' => 'button']) ?>

                    <div class="dropdown-menu" aria-labelledby="dropdownStart">
                      <?= GhostHtml::a('Riwayat Keluarga', ['/riwayat-keluarga/index'], ['class' => 'dropdown-item']) ?>
                      <?= GhostHtml::a('Riwayat Pendidikan', ['/riwayat-pendidikan/index'], ['class' => 'dropdown-item']) ?>
                    </div>
                  </li>
                </ul>



                <li class="nav-item dropdown">
                  <?= GhostHtml::a('Master', ['/master-jenis-kelamin/index'], ['class' => 'nav-link dropdown-toggle', 'data-toggle' => 'dropdown', 'aria-expanded' => 'false', 'role' => 'button']) ?>
                  <div class="dropdown-menu">
                    <?= GhostHtml::a('Master Jenis Kelamin', ['/master-jenis-kelamin/index'], ['class' => 'dropdown-item']) ?>
                    <?= GhostHtml::a('Master Agama', ['/master-agama/index'], ['class' => 'dropdown-item']) ?>
                    <?= GhostHtml::a('Master Hubungan Keluarga', ['/master-hubungan-keluarga/index'], ['class' => 'dropdown-item']) ?>
                    <?= GhostHtml::a('Master Pendidikan Formal', ['/master-pendidikan-formal/index'], ['class' => 'dropdown-item']) ?>
                    <?= GhostHtml::a('Master Status Perkawinan', ['/master-status-perkawinan/index'], ['class' => 'dropdown-item']) ?>
                    <?= GhostHtml::a('Jenis Pegawai', ['/jenis-pegawai/index'], ['class' => 'dropdown-item']) ?>
                    <?= GhostHtml::a('Unit Kerja', ['/unit-kerja/index'], ['class' => 'dropdown-item']) ?>
                  </div>
                </li>
                </ul>


                <li class="nav-item dropdown">
                  <?= GhostHtml::a('Laporan', ['/laporan/rekap-per-jenis-kelamin-pegawai'], ['class' => 'nav-link dropdown-toggle', 'data-toggle' => 'dropdown', 'aria-expanded' => 'false', 'role' => 'button']) ?>
                  <div class="dropdown-menu">
                    <?= GhostHtml::a('Rekap Jenis Kelamin dan Pegawai', ['/laporan/rekap-per-jenis-kelamin-pegawai'], ['class' => 'dropdown-item']) ?>
                    <?= GhostHtml::a('Rekap Nama Unit, Jenis Kelamin dan Total', ['/laporan/rekap-per-nama-unit-jenis-kelamin-total'], ['class' => 'dropdown-item']) ?>
                    <?= GhostHtml::a('Rekap Nama Unit, Jumlah Pegawai', ['/laporan/rekap-per-nama-unit-pegawai'], ['class' => 'dropdown-item']) ?>
                  </div>
                </li>
                </ul>

                <?= GhostHtml::a('User', ['/user/index'], ['class' => 'nav-link']) ?>
              <?php endif; ?>

              <?php
              if (Yii::$app->user->isGuest) {
                echo Html::a('Login', ['/auth/login'], ['class' => 'nav-link']);
              } else
                echo Html::a('Logout (' . Yii::$app->user->identity->username . ')', ['/auth/logout'], ['class' => 'nav-link']);
              ?>
            </div>
      </nav>
    <?php endif; ?>
  </header>

  <main id="main" class="flex-shrink-0" role="main">
    <div class="container">
      <?php

      // echo '<pre>';
      // print_r(Yii::$app->session->get(AuthHelper::SESSION_PREFIX_ROUTES, []));
      // echo '</pre>';
      // die;
      ?>
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