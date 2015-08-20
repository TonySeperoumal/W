<?php $this->layout('layout', ['title' => 'Inscription d\'un nouvel admin !']) ?>

<?php $this->start('main_content') ?>
	<h2>Ajouter un administrateur</h2>
	<br />
	<p>Veuilez renseigner ci-dessous les informations de connexions du nouvel administrateur</p>
	<br />
	<form action="" method="POST" novalidate>
		<div class="form-row">
			<label for="username">Pseudo</label>
			<input type="text" id="username" name="username" value="<?= (!empty($_POST['username'])) ? $_POST['username'] : '' ?>" >
			<div class="error"><?php ?></div>
		</div>
		<br />
		<div class="form-row">
			<label for="email">Email</label>
			<input type="email" id="email" name="email" value="<?= (!empty($_POST['email'])) ? $_POST['email'] : '' ?>">
			<div class="error"><?php ?></div>
		</div>
		<br />
		<div class="form-row">
			<label for="password">Mot de passe</label>
			<input type="password" id="password" name="password" value="" >
			<div class="error"><?php ?></div>
		</div>
		<br />
		<div class="form-row">
			<label for="confirmPassword">Confirmer mot de passe</label>
			<input type="password" id="confirmPassword" name="confirmPassword" value="">
			<div class="error"><?php ?></div>
		</div>
		<br />
		<button >Valider</button>
		<div><? echo $error ?></div>

	</form>

<?php $this->stop('main_content') ?>