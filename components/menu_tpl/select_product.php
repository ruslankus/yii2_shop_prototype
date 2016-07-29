<?php

$selected = ($category['id'] == $this->model->category_id)? 'selected' : '';

//$disable = ($category['id'] == $this->model->id)? 'disabled' : '';

?>

<option value="<?= $category['id']?>" <?= $selected?>  >
    <?= $tab . $category['name']?>
</option>
<?php if(isset($category['childs'])):?>
    <?= $this->getMenuHtml($category['childs'], $tab . " - "); ?>
<?php endif;?>
