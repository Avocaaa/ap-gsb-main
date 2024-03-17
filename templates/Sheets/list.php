<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Sheet> $sheets
 */

$identity = $this->getRequest()->getAttribute('identity');
$identity = $identity ?? [];
$iduser = $identity["id"];

?>
<div class="sheets index content">
    <?= $this->Html->link(__('Nouvelle fiche'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Fiches') ?></h3>
    <div class="table-responsive">
        <table>
            <?= $identity['username'] ?>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('Numéro') ?></th>
                    <th><?= $this->Paginator->sort('Etat') ?></th>
                    <th><?= $this->Paginator->sort('Date et heure de création') ?></th>
                    <th><?= $this->Paginator->sort('Derniéres modifications') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sheets as $sheet): ?>
                    <tr>
                        <td><?= $this->Number->format($sheet->id) ?></td>
                        <td><?= $sheet->has('state') ? h($sheet->state->state) : '' ?></td>
                        <?= h($sheet->sheetvalidated) ?>
                        <td><?= h($sheet->created) ?></td>
                        <td><?= h($sheet->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('Voir'), ['action' => 'clientview', $sheet->id]) ?>
                            <?= $this->Html->link(__('Modifier'), ['action' => 'clientview', $sheet->id]) ?>
                            <?= $this->Html->link(__('Supprimer'), ['action' => 'clientview', $sheet->id]) ?>
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
        <p><?= $this->Paginator->counter(__('Page {{page}} de {{pages}}, affichage de {{current}} enregistrement(s) sur un total de {{count}}')) ?></p>
    </div>
</div>
