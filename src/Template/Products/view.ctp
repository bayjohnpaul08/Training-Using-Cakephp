<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<div class="jumbotron">
    <div class="pull-right">
        <?= $this->Html->link(__('List Products'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
        <?= $this->Html->link(__('New Product'), ['action' => 'add'], ['class' => 'btn btn-warning']) ?>    
    </div>
    <br><br><br>
    <h4>Details</h4>
    <br>
    <table class="table table-hover">
        <tr>
            <th scope="row"><?= __('Product Name') ?></th>
            <td><?= h($product->product_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Manufacturer') ?></th>
            <td><?= $product->has('manufacturer') ? $this->Html->link($product->manufacturer->name, ['controller' => 'Manufacturers', 'action' => 'view', $product->manufacturer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($product->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($product->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($product->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($product->modified) ?></td>
        </tr>
        <th scope="row"><?= __('Image') ?></th>
            <td><img src="<?= h($product->image) ?>" class="img-thumbnail" style="max-width:20%;"></td>
        </tr>
    </table>

    <div>
        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id], ['class' => 'btn btn-success']) ?>
        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], ['class' => 'btn btn-danger']) ?>
    </div>
</div>

<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        
        
        <li><?= $this->Html->link(__('List Manufacturers'), ['controller' => 'Manufacturers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Manufacturer'), ['controller' => 'Manufacturers', 'action' => 'add']) ?> </li>
    </ul>
</nav> -->
