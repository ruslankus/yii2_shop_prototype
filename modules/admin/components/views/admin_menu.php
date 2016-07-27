<?php
    use yii\helpers\Url;
?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a class="navbar-brand" href="#">Brand</a> </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav">

                <li class="active">
                    <a href="<?= Url::to(['/admin/orders'])?>">Orders</a>
                </li>


                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"  aria-expanded="false">Categories<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?= Url::to(['/admin/categories'])?>">Categories index</a></li>
                        <li><a href="#">Add category</a></li>
                    </ul>
                </li>



                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"  aria-expanded="false">Product menu<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Categories</a></li>
                        <li><a href="#">Product list</a></li>
                    </ul>
                </li>

                <li><a href="#">Testimonials</a></li
                >
                <li><a href="#">Users</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Settings list <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Main setting</a></li>
                        <li><a href="#">Languages</a></li>
                        <li><a href="#">Labels</a></li>
                    </ul>
                </li>
                <li><a href="#">Link</a> </li>
            </ul>


            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <?php $user =  Yii::$app->user->getIdentity(); ?>
                         Hello&nbsp;<?= $user->username ?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?= Url::to(['/admin/logout'])?>">Logout</a> </li>

                        <li class="divider"></li>
                        <li><a href="#">Separated link</a> </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>