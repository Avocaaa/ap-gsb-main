<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Outpackage $outpackage
 * @var string[]|\Cake\Collection\CollectionInterface $sheets
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Supprimer'),
                ['action' => 'delete', $outpackage->id],
                ['confirm' => __('Êtes-vous sûr de vouloir supprimer le colis # {0}?', $outpackage->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Liste des colis sortants'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="outpackages form content">
            <?= $this->Form->create($outpackage) ?>
            <fieldset>
                <legend><?= __('Modifier le colis sortant') ?></legend>
                <?php
                    echo $this->Form->control('date', ['label' => 'Date']);
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
