<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sorteo $sorteo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Sorteo'), ['action' => 'edit', $sorteo->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Sorteo'), ['action' => 'delete', $sorteo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sorteo->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Sorteos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Sorteo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="sorteos view content">
            <h3><?= h($sorteo->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Juego') ?></th>
                    <td><?= $sorteo->hasValue('juego') ? $this->Html->link($sorteo->juego->nombre, ['controller' => 'Juegos', 'action' => 'view', $sorteo->juego->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($sorteo->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Numero Sorteo') ?></th>
                    <td><?= $this->Number->format($sorteo->numero_sorteo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Sorteo') ?></th>
                    <td><?= h($sorteo->fecha_sorteo) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Numeros Sorteados') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($sorteo->numeros_sorteados)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Apuestas') ?></h4>
                <?php if (!empty($sorteo->apuestas)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Fecha') ?></th>
                            <th><?= __('Numero Carton') ?></th>
                            <th><?= __('Numeros Apostados') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($sorteo->apuestas as $apuesta) : ?>
                        <tr>
                            <td><?= h($apuesta->id) ?></td>
                            <td><?= h($apuesta->fecha->format('d/m/Y')) ?></td>
                            <td><?= h($apuesta->numero_carton) ?></td>
                            <td><?= h($apuesta->numeros_apostados) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Apuestas', 'action' => 'view', $apuesta->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Apuestas', 'action' => 'edit', $apuesta->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Apuestas', 'action' => 'delete', $apuesta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $apuesta->id)]) ?>
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