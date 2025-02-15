<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Apuesta $apuesta
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Apuesta'), ['action' => 'edit', $apuesta->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Apuesta'), ['action' => 'delete', $apuesta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $apuesta->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Apuestas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Apuesta'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="apuestas view content">
            <h3><?= h($apuesta->numero_carton) ?></h3>
            <table>
                <tr>
                    <th><?= __('Numero Carton') ?></th>
                    <td><?= h($apuesta->numero_carton) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($apuesta->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha') ?></th>
                    <td><?= h($apuesta->fecha->format('d/m/Y')) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Numeros Apostados') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($apuesta->numeros_apostados)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Sorteos') ?></h4>
                <?php if (!empty($apuesta->sorteos)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Numero Sorteo') ?></th>
                            <th><?= __('Fecha Sorteo') ?></th>
                            <th><?= __('Juego Id') ?></th>
                            <th><?= __('Numeros Sorteados') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($apuesta->sorteos as $sorteo) : ?>
                        <tr>
                            <td><?= h($sorteo->id) ?></td>
                            <td><?= h($sorteo->numero_sorteo) ?></td>
                            <td><?= h($sorteo->fecha_sorteo->format('d/m/Y')) ?></td>
                            <td><?= h($sorteo->juego_id) ?></td>
                            <td><?= h($sorteo->numeros_sorteados) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Sorteos', 'action' => 'view', $sorteo->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Sorteos', 'action' => 'edit', $sorteo->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sorteos', 'action' => 'delete', $sorteo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sorteo->id)]) ?>
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