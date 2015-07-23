<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li><?php echo $this->Html->link('Home','/');?>
			</li>
			<li class="active">Cart</li>
		</ol>
	</div>
</div>

<?php echo $this->Form->create('Cart',array('url'=>array('action'=>'update')));?>
<div class="row">
	<div class="col-lg-12">
		<table class="table">
			<thead>
				<tr>
					<th>Food Name</th>
					<th>Price</th>
					<th>Quantity</th>
                                        <th>Remove</th>
					<th>Total</th>
                                        
				</tr>
			</thead>
			<tbody>
				<?php $total=0;?>
				<?php foreach ($foods as $food):?>
				<tr>
					<td><?php echo $food['Food']['name'];?></td>
					<td>$<?php echo $food['Food']['price'];?>
					</td>
					<td><div class="col-xs-3">
							<?php echo $this->Form->hidden('food_id.',array('value'=>$food['Food']['id']));?>
							<?php echo $this->Form->input('count.',array('type'=>'number', 'label'=>false,
									'class'=>'form-control input-sm', 'value'=>$food['Food']['count']));?>
						</div></td>
                                                <td><?php echo $this->Html->link(
    $this->Html->image("icon-remove.gif", array("alt" => "Remove")),
    array(
        'controller' => 'carts',
        'action' => 'delete',$food['Food']['id']),array('title'=>'Remove item','id'=>'7_0','class'=>'remove','escape'=>false)
); ?></td>
					<td>$<?php echo $count*$food['Food']['price']; ?>
					</td>
                                        
				</tr>
				<?php $total = $total + ($count*$food['Food']['price']);?>
				<?php endforeach;?>

				<tr class="success">
					<td colspan=3></td>
					<td>$<?php echo $total;?>
					</td>
				</tr>
			</tbody>
		</table>

		<p class="text-right">
			<?php echo $this->Form->submit('Update',array('class'=>'btn btn-warning','div'=>false));?>
			<a class="btn btn-success"
				onclick="alert('Implement a payment module for buyer to make a payment.');">CheckOut</a>
		</p>

	</div>
</div>
<?php echo $this->Form->end();
?>

