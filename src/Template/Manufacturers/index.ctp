<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Manufacturer[]|\Cake\Collection\CollectionInterface $manufacturers
 */
?>

<div class="jumbotron">


 <!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Manufacturer'), ['action' => 'add']) ?></li>
    </ul>
</nav>  -->
     <h4><?= __('MANUFACTURERS') ?></h3>
     
     <div class="pull-right">
        <?= $this->Html->link(__('New Manufacturer'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
        <?= $this->Html->link(__('List of Products'), ['controller' => 'products', 'action' => 'index'], ['class' => 'btn btn-warning']) ?>
     </div>
    
    <br><br><br>
    <table class="table table-hover">
        <thead>
            <tr>
                <!-- <th scope="col"><?= $this->Paginator->sort('id') ?></th>  -->
                <th scope="col" class="text-center"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col" class="text-center"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="text-center"><?= $this->Paginator->sort('modified') ?></th> 
                <th scope="col" class="text-center actions"><?= __('Actions')?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($manufacturers as $manufacturer): ?>
            <tr>
                 <!-- <td><?= $this->Number->format($manufacturer->id) ?></td>  -->
                <td scope="col" class="text-center"><?= ($manufacturer->name) ?></td>
                <td scope="col" class="text-center"><?= ($manufacturer->created) ?></td>
                <td scope="col" class="text-center"><?= ($manufacturer->modified) ?></td> 
                <td class="actions text-center">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $manufacturer->id], ['class' => 'btn btn-primary']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $manufacturer->id], ['class' => 'btn btn-success']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $manufacturer->id], ['class' => 'btn btn-danger']) ?>
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
