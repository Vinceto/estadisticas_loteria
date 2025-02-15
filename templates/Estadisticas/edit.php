<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Estadistica $estadistica
 * @var string[]|\Cake\Collection\CollectionInterface $juegos
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $estadistica->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $estadistica->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Estadisticas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="estadisticas form content">
            <?= $this->Form->create($estadistica) ?>
            <fieldset>
                <legend><?= __('Edit Estadistica') ?></legend>
                <?php
                    echo $this->Form->control('juego_id', ['options' => $juegos]);
                    echo $this->Form->control('numero');
                    echo $this->Form->control('frecuencia');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
