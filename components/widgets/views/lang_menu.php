<?php
 use yii\helpers\Url;
?>

<div class="btn-group">
    <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
        <?= $current_lang['name'] ?>
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
        <?php foreach ($languages as $lng):?>
            <li><a href="<?= Url::base() . "/{$lng['url']}/{$cleaned_url}"?>"><?= $lng['name']?></a></li>
        <?php endforeach;?>



    </ul>
</div>