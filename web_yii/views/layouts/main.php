<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use kartik\nav\NavX;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<a name="anchorTop" id="anchorTop"></a>
<?php $this->beginBody() ?>
<div class="wrap">
    <?php
    $options = [
        'brandLabel' => 'Smart Bins',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
//            'class' => 'navbar-nav navbar-right',
            'class' => 'navbar-right navbar-inverse navbar-fixed-top',
        ],
    ];
    $items = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
//            ['label' => 'Contact', 'url' => ['/site/contact']],
//            Yii::$app->user->isGuest ?
//                ['label' => 'Sign Up', 'url' => ['/site/signup']] :
//                false,
        ['label' => 'Tables', 'visible' => !Yii::$app->user->isGuest,
            'items' => [
                ['label' => 'Project',
                    'visible' => !Yii::$app->user->isGuest,
                    'items' => [
                        ['label' => 'List', 'url' => array('project/index')],
                        ['label' => 'Create', 'url' => array('project/create')],
                    ],
                ],
                ['label' => 'Project Setting',
                    'visible' => !Yii::$app->user->isGuest,
                    'items' => [
                        ['label' => 'List', 'url' => array('project-setting/index')],
                        ['label' => 'Create', 'url' => array('project-setting/create')],
                    ],
                ],
                '<li class="divider"></li>',
                ['label' => 'Node',
                    'visible' => !Yii::$app->user->isGuest,
                    'items' => [
                        ['label' => 'List', 'url' => array('node/index')],
                        ['label' => 'Create', 'url' => array('node/create')],
                    ],
                ],
                ['label' => 'Node Setting',
                    'visible' => !Yii::$app->user->isGuest,
                    'items' => [
                        ['label' => 'List', 'url' => array('node-setting/index')],
                        ['label' => 'Create', 'url' => array('node-setting/create')],
                    ],
                ],
                ['label' => 'Node Data',
                    'visible' => !Yii::$app->user->isGuest,
                    'items' => [
                        ['label' => 'List', 'url' => array('node-data/index')],
                        ['label' => 'Create', 'url' => array('node-data/create')],
                    ],
                ],
                ['label' => 'Node Ping',
                    'visible' => !Yii::$app->user->isGuest,
                    'items' => [
                        ['label' => 'List', 'url' => array('node-ping/index')],
                        ['label' => 'Create', 'url' => array('node-ping/create')],
                    ],
                ],
            ],
        ],
        Yii::$app->user->isGuest ?
            ['label' => 'Login', 'url' => ['/site/login']] :
            ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                'url' => ['/site/logout'],
                'linkOptions' => ['data-method' => 'post']
            ],
    ];

    NavBar::begin($options);
    echo NavX::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $items,
        'activateParents' => true,
        'encodeLabels' => false
    ]);
    NavBar::end();
	?>
	
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; ECE, Ngee Ann Polytechnic <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
