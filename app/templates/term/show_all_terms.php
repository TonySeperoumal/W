<?php $this->layout('layout', ['title' => 'Tous les termes']) ?>

<?php $this->start('main_content') ?>
	<h2>Tous les termes</h2>
	<table class="table-row">
		<tr>
			<th>Id</th>
			<th>Terme</th>
			<th>Date de modification</th>
			<th>Actions</th>
		</tr>
		<?php foreach ($terms as $term): ?>
		<tr <?php if ($term['is_wotd']) echo 'class="wotd"'; ?>>
			<td><?= $this->e($term['id']); ?></td>		
			<td><?= $this->e($term['name']); ?></td>
			<td><?= $this->e($term['modifiedDate']); ?></td>
			<td><a class="btn" href="<?= $this->url('terms_delete', ['id' => $term['id']]); ?>"><i class="fa fa-trash"></i>Supprimer</a></td>
			<td><a href="<?= $this->url('edit_term', ['id' => $term['id']]); ?>"><i class="fa fa-pencil"></i>Modifier</a></td>
			<td><a href="<?= $this->url('change_wotd', ['id' => $term['id']]); ?>" title="Choisir ce terme comme MDJ"><i class="fa fa-star"></i>WOTD !</a></td>
		</tr>

		<?php endforeach; ?>
	</table>
		
	
	
<?php $this->stop('main_content') ?>
