<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Invited User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Managers'), ['controller' => 'Managers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Manager'), ['controller' => 'Managers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="invitedUsers index large-9 medium-8 columns content">
    <h3><?= __('Invited Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('fullname') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('accepted') ?></th>
                <th><?= $this->Paginator->sort('event_id') ?></th>
                <th><?= $this->Paginator->sort('manager_id') ?></th>
                <th><?= $this->Paginator->sort('checkedin') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($invitedUsers as $invitedUser): ?>
            <tr>
                <td><?= h($invitedUser->id) ?></td>
                <td><?= h($invitedUser->fullname) ?></td>
                <td><?= $this->Number->format($invitedUser->email) ?></td>
                <td><?= h($invitedUser->accepted) ?></td>
                <td><?= $invitedUser->has('event') ? $this->Html->link($invitedUser->event->name, ['controller' => 'Events', 'action' => 'view', $invitedUser->event->id]) : '' ?></td>
                <td><?= $invitedUser->has('manager') ? $this->Html->link($invitedUser->manager->fullname, ['controller' => 'Managers', 'action' => 'view', $invitedUser->manager->id]) : '' ?></td>
                <td><?= h($invitedUser->checkedin) ?></td>
                <td><?= h($invitedUser->created) ?></td>
                <td><?= h($invitedUser->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $invitedUser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $invitedUser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $invitedUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invitedUser->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
