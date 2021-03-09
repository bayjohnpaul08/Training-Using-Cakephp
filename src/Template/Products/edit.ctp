<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>

<div class="jumbotron">
    <div class="pull-right">
        <?= $this->Html->link(__('List of Products'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
    </div>
    <br><br><br>
    <?= $this->Form->create($product) ?>
    <fieldset>
        <legend><?= __('Edit Product') ?></legend>
        <?php
            echo $this->Form->control(__('product_name'), ['class' => 'form-control']);
            echo $this->Form->control(__('price'), ['class' => 'form-control']);
            echo $this->Form->control('manufacturers_id', ['options' => $manufacturers, 'class' => 'form-control']);
        ?>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
<!-- 
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $product->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]
            )
        ?></li>

        <li><?= $this->Html->link(__('List Manufacturers'), ['controller' => 'Manufacturers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Manufacturer'), ['controller' => 'Manufacturers', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
