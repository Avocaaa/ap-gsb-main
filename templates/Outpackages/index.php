<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Outpackage> $outpackages
 */
?>
<div class="outpackages index content">
    <?= $this->Html->link(__('Nouveau colis sortant'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Colis sortants') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('ID') ?></th>
                    <th><?= $this->Paginator->sort('Date') ?></th>
                    <th><?= $this->Paginator->sort('Prix') ?></th>
                    <th><?= $this->Paginator->sort('Titre') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($outpackages as $outpackage): ?>
                <tr>
                    <td><?= $this->Number->format($outpackage->id) ?></td>
                    <td><?= h($outpackage->date) ?></td>
                    <td><?= $this->Number->format($outpackage->price) ?></td>
                    <td><?= h($outpackage->title) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Voir'), ['action' => 'view', $outpackage->id]) ?>
                        <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $outpackage->id]) ?>
                        <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $outpackage->id], ['confirm' => __('Êtes-vous sûr de vouloir supprimer le colis # {0}?', $outpackage->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('premier')) ?>
            <?= $this->Paginator->prev('< ' . __('précédent')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('suivant') . ' >') ?>
            <?= $this->Paginator->last(__('dernier') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} sur {{pages}}, affichage de {{current}} enregistrement(s) sur un total de {{count}}')) ?></p>
    </div>
</div>
