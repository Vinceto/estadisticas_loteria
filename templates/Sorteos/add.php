<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sorteo $sorteo
 * @var \Cake\Collection\CollectionInterface|string[] $juegos
 * @var \Cake\Collection\CollectionInterface|string[] $apuestas
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Sorteos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="sorteos form content">
            <?= $this->Form->create($sorteo) ?>
            <fieldset>
                <legend><?= __('Add Sorteo') ?></legend>
                <?php
                    echo $this->Form->control('numero_sorteo');
                    echo $this->Form->control('fecha_sorteo');
                    echo $this->Form->control('juego_id', ['options' => $juegos]);
                    echo $this->Form->control('numeros_sorteados');
                    echo $this->Form->control('apuestas._ids', ['options' => $apuestas]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
