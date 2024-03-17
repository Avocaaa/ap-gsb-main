<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Sheet> $sheets
 * 
 * 
 *
 */


$identity = $this->getRequest()->getAttribute('identity');
$identity = $identity ?? [];
$iduser = $identity["id"]

?>
<div class="sheets index content">

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('état_id') ?></th>
                    <th><?= $this->Paginator->sort('créer') ?></th>
                    <th><?= $this->Paginator->sort('modifier') ?></th>
                    <th class="display-flex"><?= $this->Paginator->sort('sheetvalidated', 'Validation') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sheets as $sheet): ?>
                    <tr>
                        <td><?= $this->Number->format($sheet->id) ?></td>
                        
                        <td><?= $sheet->has('state') ? $this->Html->link($sheet->state->state, ['controller' => 'Sheets', 'action' => 'edit', $sheet->id]) : '' ?></td>

                        <td><?= h($sheet->created) ?></td>
                        <td><?= h($sheet->modified) ?></td>
                        <td class="display-flex"><?php if($sheet->sheetvalidated == 1){echo "<div class='tag success'>Validé</div>";}else{echo "<div class='tag error'>Non validé</div>";} ?></td>
                        <td class="actions">
                            <?php if($sheet->state->id > 1){echo $this->Html->link(__('Voir'), ['action' => 'comptableview', $sheet->id]);}elseif($sheet->state->id == 1){echo $this->Html->link(__('Voir'), ['action' => 'comptableview', $sheet->id]);}else{echo $this->Html->link(__('Modifier'), ['action' => 'clientview', $sheet->id]);}  ?>
                            
                            <!-- $this->Form->postLink(__('Delete'), ['action' => 'delete', $sheet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sheet->id)]) -->
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
        <p><?= $this->Paginator->counter(__('Page {{page}} de {{pages}}, affichage de {{current}} enregistrement(s) sur {{count}} au total')) ?></p>
    </div>
</div>
