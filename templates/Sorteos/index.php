<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Sorteo> $sorteos
 */
?>
<div class="sorteos index content">
    <?= $this->Html->link(__('New Sorteo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Sorteos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('numero_sorteo') ?></th>
                    <th><?= $this->Paginator->sort('fecha_sorteo') ?></th>
                    <th><?= $this->Paginator->sort('juego_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sorteos as $sorteo): ?>
                <tr>
                    <td><?= $this->Number->format($sorteo->id) ?></td>
                    <td><?= $this->Number->format($sorteo->numero_sorteo) ?></td>
                    <td><?= h($sorteo->fecha_sorteo) ?></td>
                    <td><?= $sorteo->hasValue('juego') ? $this->Html->link($sorteo->juego->nombre, ['controller' => 'Juegos', 'action' => 'view', $sorteo->juego->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $sorteo->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sorteo->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sorteo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sorteo->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>