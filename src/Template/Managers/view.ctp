<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Manager'), ['action' => 'edit', $manager->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Manager'), ['action' => 'delete', $manager->id], ['confirm' => __('Are you sure you want to delete # {0}?', $manager->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Managers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Manager'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clubs'), ['controller' => 'Clubs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Club'), ['controller' => 'Clubs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Invited Users'), ['controller' => 'InvitedUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invited User'), ['controller' => 'InvitedUsers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="managers view large-9 medium-8 columns content">
    <h3><?= h($manager->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= h($manager->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Fullname') ?></th>
            <td><?= h($manager->fullname) ?></td>
        </tr>
        <tr>
            <th><?= __('Username') ?></th>
            <td><?= h($manager->username) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($manager->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Role') ?></th>
            <td><?= h($manager->role) ?></td>
        </tr>
        <tr>
            <th><?= __('Club') ?></th>
            <td><?= $manager->has('club') ? $this->Html->link($manager->club->id, ['controller' => 'Clubs', 'action' => 'view', $manager->club->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($manager->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($manager->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Events') ?></h4>
        <?php if (!empty($manager->events)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Short Description') ?></th>
                <th><?= __('Long Description') ?></th>
                <th><?= __('On Invitation Only') ?></th>
                <th><?= __('Invited User Count') ?></th>
                <th><?= __('Start Time') ?></th>
                <th><?= __('End Time') ?></th>
                <th><?= __('Manager Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($manager->events as $events): ?>
            <tr>
                <td><?= h($events->id) ?></td>
                <td><?= h($events->name) ?></td>
                <td><?= h($events->short_description) ?></td>
                <td><?= h($events->long_description) ?></td>
                <td><?= h($events->on_invitation_only) ?></td>
                <td><?= h($events->invited_user_count) ?></td>
                <td><?= h($events->start_time) ?></td>
                <td><?= h($events->end_time) ?></td>
                <td><?= h($events->manager_id) ?></td>
                <td><?= h($events->created) ?></td>
                <td><?= h($events->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Events', 'action' => 'view', $events->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Events', 'action' => 'edit', $events->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Events', 'action' => 'delete', $events->id], ['confirm' => __('Are you sure you want to delete # {0}?', $events->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Invited Users') ?></h4>
        <?php if (!empty($manager->invited_users)): ?>
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
            <?php foreach ($manager->invited_users as $invitedUsers): ?>
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
