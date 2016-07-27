<?php

$selected = ($category['id'] == $this->model->parent_id)? 'selected' : '';

$disable = ($category['id'] == $this->model->id)? 'disabled' : '';

?>

<option value="<?= $category['id']?>" <?= $selected?> <?= $disable?> >
    <?= $tab . $category['name']?>
</option>
<?php if(isset($category['childs'])):?>
        <?= $this->getMenuHtml($category['childs'], $tab . " - "); ?>
<?php endif;?>



