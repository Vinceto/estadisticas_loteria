<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Apuesta $apuesta
 * @var string[]|\Cake\Collection\CollectionInterface $sorteos
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $apuesta->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $apuesta->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Apuestas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="apuestas form content">
            <?= $this->Form->create($apuesta) ?>
            <fieldset>
                <legend><?= __('Edit Apuesta') ?></legend>
                <?php
                    echo $this->Form->control('fecha');
                    echo $this->Form->control('numero_carton');
                    echo $this->Form->control('numeros_apostados');
                    echo $this->Form->control('sorteos._ids', ['options' => $sorteos]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
