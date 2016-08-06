<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Event'), ['action' => 'edit', $event->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Event'), ['action' => 'delete', $event->id], ['confirm' => __('Are you sure you want to delete # {0}?', $event->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Managers'), ['controller' => 'Managers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Manager'), ['controller' => 'Managers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Invited Users'), ['controller' => 'InvitedUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invited User'), ['controller' => 'InvitedUsers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="events view large-9 medium-8 columns content">
    <h3><?= h($event->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= h($event->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($event->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Short Description') ?></th>
            <td><?= h($event->short_description) ?></td>
        </tr>
        <tr>
            <th><?= __('Manager') ?></th>
            <td><?= $event->has('manager') ? $this->Html->link($event->manager->id, ['controller' => 'Managers', 'action' => 'view', $event->manager->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Invited User Count') ?></th>
            <td><?= $this->Number->format($event->invited_user_count) ?></td>
        </tr>
        <tr>
            <th><?= __('Start Time') ?></th>
            <td><?= h($event->start_time) ?></td>
        </tr>
        <tr>
            <th><?= __('End Time') ?></th>
            <td><?= h($event->end_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($event->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($event->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('On Invitation Only') ?></th>
            <td><?= $event->on_invitation_only ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Long Description') ?></h4>
        <?= $this->Text->autoParagraph(h($event->long_description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Invited Users') ?></h4>
        <?php if (!empty($event->invited_users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Fullname') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Accepted') ?></th>
                <th><?= __('Event Id') ?></th>
                <th><?= __('Manager Id') ?></th>
                <th><?= __('Checkedin') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($event->invited_users as $invitedUsers): ?>
            <tr>
                <td><?= h($invitedUsers->id) ?></td>
                <td><?= h($invitedUsers->fullname) ?></td>
                <td><?= h($invitedUsers->email) ?></td>
                <td><?= h($invitedUsers->accepted) ?></td>
                <td><?= h($invitedUsers->event_id) ?></td>
                <td><?= h($invitedUsers->manager_id) ?></td>
                <td><?= h($invitedUsers->checkedin) ?></td>
                <td><?= h($invitedUsers->created) ?></td>
                <td><?= h($invitedUsers->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'InvitedUsers', 'action' => 'view', $invitedUsers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'InvitedUsers', 'action' => 'edit', $invitedUsers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'InvitedUsers', 'action' => 'delete', $invitedUsers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invitedUsers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
