<div>
    <?php if (isset($_SESSION['is_logged_in'])): ?>
    <a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>shares/add">Share Something</a>
    <?php endif;?>

    <div class="well">
        <h3><?php echo $viewmodel['title']; ?></h3>
        <small><?php echo $viewmodel['create_date']; ?></small>
        <hr />
        <p><?php echo $viewmodel['body']; ?></p>
        <br />
        <a class="btn btn-default" href="<?php echo ROOT_PATH; ?>shares/view/<?=$viewmodel['id']?>" target="_blank">Go
        </a>
    </div>
</div>