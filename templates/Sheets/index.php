<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Sheet> $sheets
 */
?>
<div class="sheets index content">
    <?= $this->Html->link(__('Nouvelle fiche'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Fiches') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('ID') ?></th>
                    <th><?= $this->Paginator->sort('ID utilisateur') ?></th>
                    <th><?= $this->Paginator->sort('ID état') ?></th>
                    <th><?= $this->Paginator->sort('Fiche validée') ?></th>
                    <th><?= $this->Paginator->sort('Créé') ?></th>
                    <th><?= $this->Paginator->sort('Modifié') ?></th>
                   
                    
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sheets as $sheet): ?>
                <tr>
                    <td><?= $this->Number->format($sheet->id) ?></td>
                    <td><?= $sheet->has('user') ? $this->Html->link($sheet->user->username, ['controller' => 'Users', 'action' => 'view', $sheet->user->id]) : '' ?></td>
                    <td><?= $sheet->has('state') ? $this->Html->link($sheet->state->state, ['controller' => 'States', 'action' => 'view', $sheet->state->id]) : '' ?></td>
                    <td><?= h($sheet->sheetvalidated) ?></td>
                    <td><?= h($sheet->created) ?></td>
                    <td><?= h($sheet->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Voir'), ['action' => 'viewadmin', $sheet->id]) ?>
                        <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $sheet->id]) ?>
                        <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $sheet->id], ['confirm' => __('Êtes-vous sûr de vouloir supprimer la fiche # {0}?', $sheet->id)]) ?>
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
