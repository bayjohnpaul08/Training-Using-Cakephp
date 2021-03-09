<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<div class="jumbotron">
    <?= $this->Form->create($product, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add Product') ?></legend>
        <div class="pull-right">
            <?= $this->Html->link(__('List Products'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
        </div>
        <br><br><br>
        <?php
            echo $this->Form->control(__('product_name'), ['class' => 'form-control']);
            echo $this->Form->control(__('price'),  ['class' => 'form-control']);
            echo $this->Form->control('manufacturers_id', ['options' => $manufacturers,  'empty' => true, 'class' => 'form-control']);
            echo $this->Form->input('file', ['type' => 'file']);
        ?>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Submit') , ['class' => 'btn btn-success']) ?>
    <?= $this->Form->end() ?>
</div>


<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li></li>
        <li><?= $this->Html->link(__('List Manufacturers'), ['controller' => 'Manufacturers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Manufacturer'), ['controller' => 'Manufacturers', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
