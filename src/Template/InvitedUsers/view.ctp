<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Invited User'), ['action' => 'edit', $invitedUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Invited User'), ['action' => 'delete', $invitedUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invitedUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Invited Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invited User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Managers'), ['controller' => 'Managers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Manager'), ['controller' => 'Managers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="invitedUsers view large-9 medium-8 columns content">
    <h3><?= h($invitedUser->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= h($invitedUser->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Fullname') ?></th>
            <td><?= h($invitedUser->fullname) ?></td>
        </tr>
        <tr>
            <th><?= __('Event') ?></th>
            <td><?= $invitedUser->has('event') ? $this->Html->link($invitedUser->event->name, ['controller' => 'Events', 'action' => 'view', $invitedUser->event->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Manager') ?></th>
            <td><?= $invitedUser->has('manager') ? $this->Html->link($invitedUser->manager->fullname, ['controller' => 'Managers', 'action' => 'view', $invitedUser->manager->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= $this->Number->format($invitedUser->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Accepted') ?></th>
            <td><?= h($invitedUser->accepted) ?></td>
        </tr>
        <tr>
            <th><?= __('Checkedin') ?></th>
            <td><?= h($invitedUser->checkedin) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($invitedUser->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($invitedUser->modified) ?></td>
        </tr>
    </table>
</div>
