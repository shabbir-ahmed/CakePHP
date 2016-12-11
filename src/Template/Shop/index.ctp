
<div class="container">
	<h2>Shop</h2>
	<div class="btn btn-primary">
	<?= 
		$this->Html->link('Add New', array('controller'=>'shop','action'=>'insert'));
	?>
	</div>
	<div class="table-responsive">
	 <table class="table">
		<thead>
			<tr>
				<th>Product ID</th>
				<th>Product Name</th>
				<th>Domain Name</th>
				<th>Phone</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($data as $row) 
				{
					?>
					<tr>
						<td><?= $row->id ?></td>
						<td><?= $row->prductname ?></td>
						<td><?= $row->domainname ?></td>
						<td><?= $row->phone ?></td>
						<td>
							<img src="img/uploads/<?= $row->file ?>" class="img-responsive">
						</td>
						<td>
						<div class="btn btn-primary">
						<?= 
							$this->Html->link('Edit', array('controller'=>'shop','action'=>'edit'.'/'.$row->id));
						?></div> |
						<div class="btn btn-primary">
						<?=
							$this->Html->link('Delete', array('controller'=>'shop','action'=>'delete'.'/'.$row->id));
						?>
						</div>
							
						</td>
					</tr>
					<?php
				}
			?>
		</tbody>
	</table>
	</div>
	<div class="pagination pagination-large">
		<ul class="pagination">
			
		</ul>
	</div>

	<nav aria-label="Page navigation">
	  	<ul class="pagination">
		    <li>
		      	<?= $this->Paginator->prev('<< Previous') ?>
				<?= $this->Paginator->next('Next >>') ?>
				<?= $this->Paginator->counter() ?>
		    </li>
	  	</ul>
	</nav>
</div>