<div>
    <?php if (isset($_SESSION['is_logged_in'])): ?>
    <a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>shares/add">Share Something</a>
    <?php endif;?>
    <?php foreach ($viewmodel as $item): ?>
    <div class="well">
        <h3><?php echo $item['title']; ?></h3>
        <small><?php echo $item['create_date']; ?></small>
        <hr />
        <p><?php echo $item['body']; ?></p>
        <br />
        <a class="btn btn-default" href="<?php echo ROOT_PATH; ?>shares/view/<?=$item['id']?>">Go
        </a>
        <a class="btn btn-info" href="<?php echo ROOT_PATH; ?>shares/update/<?=$item['id']?>">Update
        </a>
        <a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>shares/delete/<?=$item['id']?>" >Delete
        </a>
    </div>
    <?php endforeach;?>
</div>