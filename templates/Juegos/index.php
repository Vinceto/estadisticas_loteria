<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Juego> $juegos
 */
?>
<div class="juegos index content">
    <?= $this->Html->link(__('New Juego'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Juegos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($juegos as $juego): ?>
                <tr>
                    <td><?= $this->Number->format($juego->id) ?></td>
                    <td><?= h($juego->nombre) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $juego->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $juego->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $juego->id], ['confirm' => __('Are you sure you want to delete # {0}?', $juego->id)]) ?>
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