<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Style $style
 */
?>
<div class="style form large-9 medium-8 columns content">
    <h3><?= h('Edit Style') ?></h3>
    <?= $this->Form->create($style) ?>
    <fieldset>
        <legend><?= __('Modify Existing Style') ?></legend>
        <?php
            echo $this->Form->control('style_name');
            echo $this->Form->control('type',['options'=>['Lager'=>'Lager','Ale'=>'Ale']]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
