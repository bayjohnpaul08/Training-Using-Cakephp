<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Manufacturer $manufacturer
 */
?>

<div class="jumbotron">
<div class="container">
<div class="pull-right">
    <?= $this->Html->link(__('List Manufacturers'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
    <?= $this->Html->link(__('New Manufacturers'), ['action' => 'add'], ['class' => 'btn btn-warning']) ?>
</div>    
<br><br><br><br> 
<h4>Details</h4>
<br> 
    <table class="table table-bordered">
            <tr>
                <th scope="row"><?= __('Name') ?></th>
                <td><?= h($manufacturer->name) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= $this->Number->format($manufacturer->id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Created') ?></th>
                <td><?= h($manufacturer->created) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Modified') ?></th>
                <td><?= h($manufacturer->modified) ?></td>
            </tr>
            <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><img src="<?= h($manufacturer->image) ?>" class="img-thumbnail" style="max-width:20%;"></td>

        </tr>
        </table>
        
            

        <br>
        <div class="pull-left">
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $manufacturer->id], ['class' => 'btn btn-success']) ?>
            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $manufacturer->id], ['class' => 'btn btn-danger']) ?>
        </div>

        <br><br><br>
        <div class="related">
        <h4><?= __('Related Products') ?></h4>
        <br>
        <?php if (!empty($manufacturer->products)): ?>
        <table class="table table-bordered">
            <tr>
                <th scope="col" class="text-center"><?= __('Id') ?></th>
                <th scope="col" class="text-center"><?= __('Product Name') ?></th>
                <th scope="col" class="text-center"><?= __('Price') ?></th>
                <th scope="col" class="text-center"><?= __('Created') ?></th>
                <th scope="col" class="text-center"><?= __('Modified') ?></th>
                <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($manufacturer->products as $products): ?>
            <tr>
                <td scope="col" class="text-center"><?= h($products->id) ?></td>
                <td scope="col" class="text-center"><?= h($products->product_name) ?></td>
                <td scope="col" class="text-center"><?= h($products->price) ?></td>
                <td scope="col" class="text-center"><?= h($products->created) ?></td>
                <td scope="col" class="text-center"><?= h($products->modified) ?></td>
                <td class="actions text-center">
                    <?= $this->Html->link(__('View'), ['controller' => 'Products', 'action' => 'view', $products->id], ['class' => 'btn btn-primary']) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Products', 'action' => 'edit', $products->id], ['class' => 'btn btn-success']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Products', 'action' => 'delete', $products->id], ['class' => 'btn btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?', $products->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
        

             
</div>
    
  </div>

    
</div>
    


 <nav class="large-3 medium-4 columns" id="actions-sidebar">
                
            </nav>