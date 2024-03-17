<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Outpackage $outpackage
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Modifier le colis sortant'), ['action' => 'edit', $outpackage->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Supprimer le colis sortant'), ['action' => 'delete', $outpackage->id], ['confirm' => __('Êtes-vous sûr de vouloir supprimer le colis # {0}?', $outpackage->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Liste des colis sortants'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nouveau colis sortant'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="outpackages view content">
            <h3><?= h($outpackage->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Titre') ?></th>
                    <td><?= h($outpackage->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('ID') ?></th>
                    <td><?= $this->Number->format($outpackage->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Prix') ?></th>
                    <td><?= $this->Number->format($outpackage->price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($outpackage->date) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($outpackage->body)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Fiches associées') ?></h4>
                <?php if (!empty($outpackage->sheets)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Numero id') ?></th>
                            <th><?= __('utilisateur') ?></th>
                            <th><?= __('état') ?></th>
                            <th><?= __('Fiche validée') ?></th>
                            <th><?= __('Créée') ?></th>
                            <th><?= __('Modifiée') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($outpackage->sheets as $sheets) : ?>
                        <tr>
                            <td><?= h($sheets->id) ?></td>
                            <td><?= h($sheets->user_id) ?></td>
                            <td><?= h($sheets->state_id) ?></td>
                            <td><?= h($sheets->sheetvalidated) ?></td>
                            <td><?= h($sheets->created) ?></td>
                            <td><?= h($sheets->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Voir'), ['controller' => 'Sheets', 'action' => 'view', $sheets->id]) ?>
                                <?= $this->Html->link(__('Modifier'), ['controller' => 'Sheets', 'action' => 'edit', $sheets->id]) ?>
                                <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Sheets', 'action' => 'delete', $sheets->id], ['confirm' => __('Êtes-vous sûr de vouloir supprimer la fiche # {0}?', $sheets->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
