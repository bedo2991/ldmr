<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Event'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Managers'), ['controller' => 'Managers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Manager'), ['controller' => 'Managers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Invited Users'), ['controller' => 'InvitedUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Invited User'), ['controller' => 'InvitedUsers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="events index large-9 medium-8 columns content">
    <h3><?= __('Events') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('short_description') ?></th>
                <th><?= $this->Paginator->sort('on_invitation_only') ?></th>
                <th><?= $this->Paginator->sort('invited_user_count') ?></th>
                <th><?= $this->Paginator->sort('start_time') ?></th>
                <th><?= $this->Paginator->sort('end_time') ?></th>
                <th><?= $this->Paginator->sort('manager_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($events as $event): ?>
            <tr>
                <td><?= h($event->id) ?></td>
                <td><?= h($event->name) ?></td>
                <td><?= h($event->short_description) ?></td>
                <td><?= h($event->on_invitation_only) ?></td>
                <td><?= $this->Number->format($event->invited_user_count) ?></td>
                <td><?= h($event->start_time) ?></td>
                <td><?= h($event->end_time) ?></td>
                <td><?= $event->has('manager') ? $this->Html->link($event->manager->fullname, ['controller' => 'Managers', 'action' => 'view', $event->manager->id]) : '' ?></td>
                <td><?= h($event->created) ?></td>
                <td><?= h($event->modified) ?></td>
                <td class="actions">
		<?php if (in_array($this->request->session()->read('Auth.User.role'), ['admin','entrance'])) : ?>
		    <?= $this->Html->link(__('Checkin'), ['action' => 'checkin', $event->id]) ?>
		<?php endif; ?>
                    <?= $this->Html->link(__('View'), ['action' => 'view', $event->id]) ?>
		<?php if ($this->request->session()->read('Auth.User.role') ==='admin' || ($this->request->session()->read('Auth.User.role') === 'event_manager' && $this->request->session()->read('Auth.User.id') === $event->manager->id)) : ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $event->id]) ?>
		<?php endif; ?>
		<?php if ($this->request->session()->read('Auth.User.role') ==='admin' ) : ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $event->id], ['confirm' => __('Are you sure you want to delete # {0}?', $event->id)]) ?>
		<?php endif; ?>
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
