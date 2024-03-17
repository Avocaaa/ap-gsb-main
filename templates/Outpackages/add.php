<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Outpackage $outpackage
 * @var \Cake\Collection\CollectionInterface|string[] $sheets
 */
?>
<div class="row">
    <aside class="column">
        
    </aside>
    <div class="column-responsive column-80">
        <div class="outpackages form content">
            <?= $this->Form->create($outpackage) ?>
            <fieldset>
                <legend><?= __('Ajouter un colis sortant') ?></legend>
                <?php
                    
                    echo $this->Form->control('price', ['label' => 'Prix']);
                    echo $this->Form->control('title', ['label' => 'Titre']);
                    echo $this->Form->control('body', ['label' => 'Description']);
                    echo $this->Form->control('sheets._ids', [
                        'options' => [$this->request->getParam('pass.0') => $this->request->getParam('pass.0')],
                        'empty' => true,
                        'value' => $this->request->getParam('pass.0'),
                        'label' => 'Fiches associées'
                    ]);
                    
                    

                ?>
            </fieldset>
            <?= $this->Form->button(__('Soumettre')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
