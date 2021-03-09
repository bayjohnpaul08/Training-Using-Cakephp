<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Manufacturer $manufacturer
 */
?>
<div class="jumbotron">
    <div class="manufacturers form large-9 medium-8 columns content">
        <?= $this->Form->create($manufacturer) ?>
        <fieldset>
            <legend><?= __('Edit Manufacturer') ?></legend>
             <?= $this->Html->link(__('List of Manufacturers'), ['action' => 'index'], ['class' => 'btn btn-primary pull-right']) ?>
            <br><br><br>
            <?php
                echo $this->Form->control(__('name'), ['class' => 'form-control']);
            ?>
            <br>
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success pull-left']) ?>  
            
        </fieldset>
        <?= $this->Form->end() ?>
    </div>
</div>


<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $manufacturer->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $manufacturer->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Manufacturers'), ['action' => 'index']) ?></li>
    </ul>
</nav> -->