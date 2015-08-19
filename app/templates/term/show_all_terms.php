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
		<tr>
			<td><?php $this->e($term['id']) ?></td>		
			<td><?php $this->e($term['name']) ?></td>
			<td><?php $this->e($term['modifiedDate']) ?></td>
		</tr>

		<?php endforeach; ?>
	</table>
		
	
	
<?php $this->stop('main_content') ?>
