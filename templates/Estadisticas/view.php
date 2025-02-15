<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Estadistica $estadistica
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Estadistica'), ['action' => 'edit', $estadistica->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Estadistica'), ['action' => 'delete', $estadistica->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estadistica->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Estadisticas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Estadistica'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="estadisticas view content">
            <h3><?= h($estadistica->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Juego') ?></th>
                    <td><?= $estadistica->hasValue('juego') ? $this->Html->link($estadistica->juego->nombre, ['controller' => 'Juegos', 'action' => 'view', $estadistica->juego->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($estadistica->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Numero') ?></th>
                    <td><?= $this->Number->format($estadistica->numero) ?></td>
                </tr>
                <tr>
                    <th><?= __('Frecuencia') ?></th>
                    <td><?= $this->Number->format($estadistica->frecuencia) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>