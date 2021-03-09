<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $products
 */
?>
<div class="jumbotron">
    <h4><?= __('PRODUCTS') ?></h4>
    <div class="pull-right">
        <?= $this->Html->link(__('New Product'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?></li>
        <?= $this->Html->link(__('List of Manufacturers'), ['controller' => 'Manufacturers', 'action' => 'index'], ['class' => 'btn btn-warning']) ?>
    </div>
    <br><br><br>
    <table class="table table-hover">
        <thead>
            <tr>
                <!-- <th scope="col"><?= $this->Paginator->sort('id') ?></th> -->
                <th scope="col" class="text-center"><?= $this->Paginator->sort('product_name') ?></th>
                <th scope="col" class="text-center"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col" class="text-center"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="text-center"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="text-center"><?= $this->Paginator->sort('manufacturers_id') ?></th>
                <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <!-- <td><?= $this->Number->format($product->id) ?></td> -->
                <td scope="col" class="text-center"><?= h($product->product_name) ?></td>
                <td scope="col" class="text-center"><?= $this->Number->format($product->price) ?></td>
                <td scope="col" class="text-center"><?= h($product->created) ?></td>
                <td scope="col" class="text-center"><?= h($product->modified) ?></td>
                <td scope="col" class="text-center"><?= $product->has('manufacturer') ? $this->Html->link($product->manufacturer->name, ['controller' => 'Manufacturers', 'action' => 'view', $product->manufacturer->id]) : '' ?></td>
                <td class="actions text-center">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $product->id], ['class' => 'btn btn-primary']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id], ['class' => 'btn btn-success']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], ['class' => 'btn btn-danger']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="text-center">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous'), ['class' => 'page-link']) ?>
            <?= $this->Paginator->numbers() ?>
             <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
    </div> 
</div>


<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Manufacturers'), ['controller' => 'Manufacturers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Manufacturer'), ['controller' => 'Manufacturers', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
