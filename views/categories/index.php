<div>
	<?php if(isset($_SESSION['is_logged_in'])) : ?>
	<a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>categories/add">Add Category</a>
	<?php endif; ?>

		<?php foreach($viewmodel as $item) : ?>
        <div class="well">
            <p><?php echo $item['name']; ?></p>
            <hr />
            <a class="btn btn-default" href="<?php echo ROOT_PATH; ?>categories/view/<?=$item['id']?>">Go
            </a>
            <a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>categories/delete/<?=$item['id']?>" >Delete
            </a>
        </div>
		<?php endforeach; ?>
	</div>
</div>
