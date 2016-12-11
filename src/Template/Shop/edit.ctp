<div class="container">
	<h2>Edit</h2>

	<?php 
		echo $this->Form->create(null,['url'=>['controller'=>'Shop', 'action'=>'update']]); 
	?>
		<input type="hidden" name="id" value="<?= $row->id ?>">
		<div class="form-group">
		    <label for="product">Product Name</label>
		    <input type="text" class="form-control" value="<?= $row->prductname ?>" name="prductname" placeholder="Name">
		</div>

		<div class="form-group">
		    <label for="domain">Domain Name</label>
		    <input type="text" name="domainname" class="form-control" value="<?= $row->domainname ?>" placeholder="Domain Name">
		</div>

		<div class="form-group">
		    <label for="Phone">Phone</label>
		    <input type="text" name="phone" value="<?= $row->phone ?>" class="form-control" placeholder="Phone">
		</div>
		<button type="submit" class="btn btn-default">Update</button>
	<?php
		echo $this->Form->end();
	?>