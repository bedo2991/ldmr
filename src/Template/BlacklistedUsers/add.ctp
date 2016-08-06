<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Blacklisted Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Validities'), ['controller' => 'Validities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Validity'), ['controller' => 'Validities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="blacklistedUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($blacklistedUser) ?>
    <fieldset>
        <legend><?= __('Add Blacklisted User') ?></legend>
        <?php
            echo $this->Form->input('fullname');
            echo $this->Form->input('birthdate', ['empty' => true]);
            echo $this->Form->input('picture_path');
            echo $this->Form->input('description');
            echo $this->Form->input('reason');
            echo $this->Form->input('valid_from');
            echo $this->Form->input('valid_until', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
