<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Manufacturer $manufacturer
 */
?>
<div class="jumbotron">

        <!-- <div class="content">
            <?php echo $this->Flash->render(); ?>
                <div class="upload-form">
                    <?= $this->Form->create($manufacturer, ['type' => 'file']); ?>
                        <?php echo $this->Form->input('file', ['type' => 'file', 'class' => 'form-control'])?>
                        <?php echo $this->Form->button(__('Upload File'), ['type' => 'submit', 'class' => 'form-controlbtn btn-default']); ?>
    
                </div>
        </div> -->

         <?= $this->Form->create($manufacturer, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Add Manufacturer') ?></legend>
                
                <div class="container">
                
                <?= $this->Html->link(__('List of Manufacturers'), ['action' => 'index'], ['class' => 'btn btn-primary pull-right']) ?>
                <br><br><br>

                    <?= $this->Form->control(__('name'), ['class' => 'form-control']); ?>
                    <br>
                    
                     <?php echo $this->Form->input('file', ['type' => 'file'])?>
                    <br>
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>    

                </div>
                
            </fieldset>
        <?= $this->Form->end() ?> 
</div>

