<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Juego $juego
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Juego'), ['action' => 'edit', $juego->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Juego'), ['action' => 'delete', $juego->id], ['confirm' => __('Are you sure you want to delete # {0}?', $juego->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Juegos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Juego'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="juegos view content">
            <h3><?= h($juego->nombre) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($juego->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($juego->id) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Descripcion') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($juego->descripcion)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Estadisticas') ?></h4>
                <?php if (!empty($juego->estadisticas)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Juego Id') ?></th>
                            <th><?= __('Numero') ?></th>
                            <th><?= __('Frecuencia') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($juego->estadisticas as $estadistica) : ?>
                        <tr>
                            <td><?= h($estadistica->id) ?></td>
                            <td><?= h($estadistica->juego_id) ?></td>
                            <td><?= h($estadistica->numero) ?></td>
                            <td><?= h($estadistica->frecuencia) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Estadisticas', 'action' => 'view', $estadistica->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Estadisticas', 'action' => 'edit', $estadistica->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Estadisticas', 'action' => 'delete', $estadistica->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estadistica->id)]) ?>
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