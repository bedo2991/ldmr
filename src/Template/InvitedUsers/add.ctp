<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Invited Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Managers'), ['controller' => 'Managers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Manager'), ['controller' => 'Managers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="invitedUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($invitedUser) ?>
    <fieldset>
        <legend><?= __('Add Invited User') ?></legend>
        <?php
            echo $this->Form->input('fullname');
            echo $this->Form->input('email');
            echo $this->Form->input('accepted', ['empty' => true]);
            echo $this->Form->input('event_id', ['options' => $events]);
            echo $this->Form->input('checkedin', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
