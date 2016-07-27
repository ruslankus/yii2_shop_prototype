<?php
    use app\assets\AdminAsset;
    use app\modules\admin\components\MenuAdminWidget;
    use yii\helpers\Html;

    AdminAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>Bootstrap Agency Template</title>

    <?php $this->head() ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php $this->beginBody() ?>


<?= MenuAdminWidget::widget();?>


<section id="main" class="container">

    <?php if(Yii::$app->session->hasFlash('success')):?>
    <div class="row">
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?= Yii::$app->session->getFlash('success'); ?>
        </div>
    </div>

    <?php endif; ?>

    <?php if(Yii::$app->session->hasFlash('error')):?>
    <div class="row">
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?= Yii::$app->session->getFlash('error'); ?>
        </div>
    </div>
    <?php endif; ?>

    <div class="row">


       <?= $content; ?>



    </div>
</section> <!-- /main -->


<footer class="text-center">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <p style="padding: 80px">Copyright © MyWebsite. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>
<!-- / FOOTER -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.js"></script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>