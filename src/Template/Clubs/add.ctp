<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Clubs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Managers'), ['controller' => 'Managers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Manager'), ['controller' => 'Managers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Validities'), ['controller' => 'Validities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Validity'), ['controller' => 'Validities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="clubs form large-9 medium-8 columns content">
    <?= $this->Form->create($club) ?>
    <fieldset>
        <legend><?= __('Add Club') ?></legend>
        <?php
            echo $this->Form->input('short_name');
            echo $this->Form->input('full_name');
            echo $this->Form->input('address');
            echo $this->Form->input('city');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
