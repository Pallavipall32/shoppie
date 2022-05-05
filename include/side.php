<div class="list-group mt-3">
    <div class="list-group-item list-group-item-action active">categories</div>
    <?php
    $callingcat = calling("category");
    foreach ($callingcat as $cat) {
        $id = $cat['cat_id'];
        $title = $cat['cat_title'];
        echo "<a href='index.php?cat=$id' class='list-group-item list-group-item-action'>$title</a>";
    }
    ?>

</div>