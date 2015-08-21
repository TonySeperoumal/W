<?php $this->layout('layout', ['title' => 'Connexion !']) ?>

<?php $this->start('main_content') ?>
	<h2>Connexion</h2>

	<form action="" method="POST" novalidate>
		<div class="form-row">
			<label for="username">Pseudo</label>
			<input type="text" id="username" name="username" value="">
			
		</div>
		<br />
		<div class="form-row">
			<label for="password">Mot de passe</label>
			<input type="password" id="password" name="password" value="">
			
		</div>
		<br />
		<button >Valider</button>
		<div><?= $error ?></div>
	</form>
<?php $this->stop('main_content') ?>

