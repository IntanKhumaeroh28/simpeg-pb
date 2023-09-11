<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use webvimark\modules\UserManagement\components\GhostHtml;
use webvimark\modules\UserManagement\components\GhostMenu;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php $this->registerCsrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
  <?php $this->beginBody() ?>

  <header>
    <?php
    // NavBar::begin([
    //     'brandLabel' => Yii::$app->name,
    //     'brandUrl' => Yii::$app->homeUrl,
    //     'options' => [
    //         'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
    //     ],
    // ]);
    // echo GhostMenu::widget([
    //     'encodeLabels'=>false,
    //     'activateParents'=>true,
    //     'items' => [
    //         // [
    //         //     'label' => 'Backend routes',
    //         //     // 'items'=>UserManagementModule::menuItems()
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
    //         Yii::$app->user->isGuest ? (
    //             ['label' => 'Login', 'url' => ['/site/login']]
    //         ) : (
    //             '<li>'
    //             . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
    //             . Html::submitButton(
    //                 'Logout (' . Yii::$app->user->identity->username . ')',
    //                 ['class' => 'btn btn-link logout']
    //             )
    //             . Html::endForm()
    //             . '</li>'
    //         )
    //     ],
    // ]);
    //NavBar::end();
    ?>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top ">
      <div class="container">
        <a class="navbar-brand" href="#">Simpeg</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <!-- <a class="nav-link active" aria-current="page" href="#">Home</a> -->
            <?= Html::a('Home', ['/site/index'], ['class' => 'nav-link']) ?>
            <?= Html::a('Master Agama', ['/master-agama'], ['class' => 'nav-link']) ?>
            <?= Html::a('Riwayat Pendidikan', ['/riwayat-pendidikan'], ['class' => 'nav-link']) ?>
            <?= Html::a('Master Pendidikan Formal', ['/master-pendidikan-formal'], ['class' => 'nav-link']) ?>

            <?php
            if (Yii::$app->user->isGuest) {
              echo Html::a('Login', ['/auth/login'], ['class' => 'nav-link']);
            } else
              echo Html::a('Logout', ['/auth/logout'], ['class' => 'nav-link']);
            ?>
          </div>

          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                Master
              </a>
              <div class="dropdown-menu">
                <?= Html::a('Master Jenis Kelamin', ['/master-jenis-kelamin'], ['class' => 'dropdown-item']) ?>
                <?= Html::a('Master Agama', ['/master-agama'], ['class' => 'dropdown-item']) ?>
                <?= Html::a('Master Status Perkawinan', ['/master-status-perkawinan'], ['class' => 'dropdown-item']) ?>
                <?= Html::a('Jenis Pegawai', ['/jenis-pegawai'], ['class' => 'dropdown-item']) ?>
                <?= Html::a('Unit Kerja', ['/unit-kerja'], ['class' => 'dropdown-item']) ?>
              </div>
            </li>
          </ul>
        </div>
    </nav>
  </header>

  <main role="main" class="flex-shrink-0">
    <div class="container">
      <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
      ]) ?>
      <?= Alert::widget() ?>
      <?= $content ?>
    </div>
  </main>

  <footer class="footer mt-auto py-3 text-muted">
    <div class="container">
      <p class="float-left">&copy; My Company <?= date('Y') ?></p>
      <p class="float-right"><?= Yii::powered() ?></p>
    </div>
  </footer>

  <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>