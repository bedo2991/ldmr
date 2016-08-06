<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Managers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Clubs'), ['controller' => 'Clubs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Club'), ['controller' => 'Clubs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Invited Users'), ['controller' => 'InvitedUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Invited User'), ['controller' => 'InvitedUsers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="managers form large-9 medium-8 columns content">
    <?= $this->Form->create($manager) ?>
    <fieldset>
        <legend><?= __('Add Manager') ?></legend>
        <?php
            echo $this->Form->input('fullname');
            echo $this->Form->input('username');
            echo $this->Form->input('password');
	    echo $this->Form->input('email');
            echo $this->Form->input('role', [
            'options' => ['admin' => __('Admin'), 'entrance' => __('Entrance shift'), 'event_manager' => __('Event Manager')]
		]);
            echo $this->Form->input('club_id', ['options' => $clubs]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
