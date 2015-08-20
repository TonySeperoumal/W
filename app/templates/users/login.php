<?php $this->layout('layout', ['title' => 'Connexion !']) ?>

<?php $this->start('main_content') ?>


	<form action="" method="POST">
		<div class="form-row">
			<label for="username">Pseudo</label>
			<input type="text" id="username" name="username" value="">
			<div class="error"><?php ?></div>
		</div>
		<br />
		<div class="form-row">
			<label for="password">Mot de passe</label>
			<input type="password" id="password" name="password" value="">
			<div class="error"><?php ?></div>
		</div>
		<br />
		<button >Valider</button>
	</form>
<?php $this->stop('main_content') ?>

