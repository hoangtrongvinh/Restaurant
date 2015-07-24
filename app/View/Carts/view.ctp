<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li><?php echo $this->Html->link('Home', '/'); ?>
            </li>
            <li class="active">Cart</li>
        </ol>
    </div>
</div>

<?php echo $this->Form->create('Cart', array('url' => array('action' => 'update'))); ?>
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
                <?php $total = 0; ?>
                <?php foreach ($foods as $food): ?>
                <?php if (!empty($food['Food']) && isset($food['Food']['id'])) : ?>
                    <tr>
                        <td><?php echo (isset($food['Food']['name'])) ? $food['Food']['name'] : ''; ?></td>
                        <?php $price = (isset($food['Food']['price'])) ? $food['Food']['price'] : 0; ?>
                        <td>$<?php echo $price ?>
                        </td>
                        <td><div class="col-xs-3">
                                <?php echo $this->Form->hidden('food_id.', array('value' => $food['Food']['id'])); ?>
                                <?php echo $this->Form->input('count.', array('type' => 'number', 'label' => false,
                                    'class' => 'form-control input-sm', 'value' => $food['Food']['count']));
                                ?>
                            </div></td>
                        <td><?php
                            echo $this->Html->link(
                                    $this->Html->image("icon-remove.gif", array("alt" => "Remove")), array(
                                'controller' => 'carts',
                                'action' => 'delete', $food['Food']['id']), array('title' => 'Remove item', 'id' => '7_0', 'class' => 'remove', 'escape' => false)
                            );
                            ?></td>
                        <td>$<?php echo $count * $price; ?>
                        </td>

                    </tr>
                    <?php $total = $total + ($count * $price); ?>
                    <?php endif; ?>
                <?php endforeach; ?>

                <tr class="success">
                    <td colspan=3></td>
                    <td>$<?php echo $total; ?>
                    </td>
                </tr>
            </tbody>
        </table>

        <p class="text-right">
<?php echo $this->Form->submit('Update', array('class' => 'btn btn-warning', 'div' => false)); ?>
            <a class="btn btn-success"
               onclick="alert('Implement a payment module for buyer to make a payment.');">CheckOut</a>
        </p>

    </div>
</div>
<?php echo $this->Form->end();
?>

