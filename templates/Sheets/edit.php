<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sheet $sheet
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $states
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            
            <?= $this->Html->link(__('List Sheets'), ['action' => 'comptablelist'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sheets form content">
            <?= $this->Form->create($sheet) ?>
            <fieldset>
                <legend><?= __('Edit Sheet') ?></legend>
                <?php
                    echo $this->Form->hidden('user_id', ['options' => $users, 'empty' => true]);
                    echo $this->Form->control('state_id', ['options' => $states]);
                    echo $this->Form->control('sheetvalidated');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
