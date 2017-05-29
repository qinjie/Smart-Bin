<?php
/* @var $this yii\web\View */

use app\models\Project;

$this->title = 'Smart Bins';
?>
<div class="site-index">
    <!--    <div class="jumbotron">-->
    <!--        <h1>Congratulations!</h1>-->
    <!---->
    <!--        <p class="lead">You have successfully created your Yii-powered application.</p>-->
    <!---->
    <!--        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>-->
    <!--    </div>-->
    <!---->
    <!--    <p>List of Projects</p>-->

    <div class="body-content">

        <?php
        $projects = Project::findAll(['status' => 1]);
        foreach ($projects as $project) {
            ?>

            <div class="row">
                <div class="col-lg-4">
                    <h2><?= $project->label ?></h2>

                    <p><?= $project->remark ?></p>

                    <p><a class="btn btn-default" href=<?= "project/" . $project->id ?> >Find Out &raquo;</a></p>
                </div>
                <!--            <div class="col-lg-4">-->
                <!--                <h2>Heading</h2>-->
                <!---->
                <!--                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore-->
                <!--                    et-->
                <!--                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut-->
                <!--                    aliquip-->
                <!--                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum-->
                <!--                    dolore eu-->
                <!--                    fugiat nulla pariatur.</p>-->
                <!---->
                <!--                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>-->
                <!--            </div>-->
            </div>
        <?php } ?>
    </div>
</div>
