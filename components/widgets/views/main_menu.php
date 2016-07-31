<ul class="nav navbar-nav collapse navbar-collapse">

    <?php foreach ($menu as $m):
        $trl = $m['trl']['0'];
    ?>

    <li>
        <a href="index.html" class=""><?= $trl['menu_text'] ?></a>
    </li>

    <?php endforeach;?>

</ul>