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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $juego->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $juego->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Juegos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="juegos form content">
            <?= $this->Form->create($juego) ?>
            <fieldset>
                <legend><?= __('Edit Juego') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('descripcion');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
