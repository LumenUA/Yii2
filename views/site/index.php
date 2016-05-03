<h1>Главная страница</h1>
<div>
		<?php foreach ($model as $key): ?>
		<p>
		<?=$key->username?><br><?php echo $key->post ?>
		</p>
		<?php endforeach ?>
</div>