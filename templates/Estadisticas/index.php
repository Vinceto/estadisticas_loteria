<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Estadistica> $estadisticas
 */
?>
<div class="estadisticas index content">
    <?= $this->Html->link(__('New Estadistica'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Estadisticas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('juego_id') ?></th>
                    <th><?= $this->Paginator->sort('numero') ?></th>
                    <th><?= $this->Paginator->sort('frecuencia') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($estadisticas as $estadistica): ?>
                <tr>
                    <td><?= $this->Number->format($estadistica->id) ?></td>
                    <td><?= $estadistica->hasValue('juego') ? $this->Html->link($estadistica->juego->nombre, ['controller' => 'Juegos', 'action' => 'view', $estadistica->juego->id]) : '' ?></td>
                    <td><?= $this->Number->format($estadistica->numero) ?></td>
                    <td><?= $this->Number->format($estadistica->frecuencia) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $estadistica->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $estadistica->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $estadistica->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estadistica->id)]) ?>
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