<?php $this->layout('layout', ['title' => 'Accueil !']) ?>

<?php $this->start('main_content') ?>

	<h1>Acceuil</h1>

	<a href="<?= $this->url('login') ?>">Se connecter</a>


<?php $this->stop('main_content') ?>