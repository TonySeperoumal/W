<?php $this->layout('layout', ['title' => 'Tous les termes']) ?>

<?php $this->start('main_content') ?>
	<h2>Tous les termes</h2>
	<table class="table-row">
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Date de modification</th>
		</tr>
		<?php foreach ($terms as $term): ?>
		<tr>
			<td><?php echo $term['id'] ?></td>		
			<td><?php echo $term['name'] ?></td>
			<td><?php echo $term['modifiedDate'] ?></td>
		</tr>

		<?php endforeach; ?>
	</table>
		
	
	
<?php $this->stop('main_content') ?>
