<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Apuesta> $apuestas
 */
?>
<div class="apuestas index content">
    <?= $this->Html->link(__('New Apuesta'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Apuestas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('fecha') ?></th>
                    <th><?= $this->Paginator->sort('numero_carton') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($apuestas as $apuesta): ?>
                <tr>
                    <td><?= $this->Number->format($apuesta->id) ?></td>
                    <td><?= h($apuesta->fecha->format('d/m/Y')) ?></td>
                    <td><?= h($apuesta->numero_carton) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $apuesta->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $apuesta->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $apuesta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $apuesta->id)]) ?>
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