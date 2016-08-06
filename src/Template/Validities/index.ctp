<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Validity'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Blacklisted Users'), ['controller' => 'BlacklistedUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Blacklisted User'), ['controller' => 'BlacklistedUsers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clubs'), ['controller' => 'Clubs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Club'), ['controller' => 'Clubs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="validities index large-9 medium-8 columns content">
    <h3><?= __('Validities') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('blacklisted_user_id') ?></th>
                <th><?= $this->Paginator->sort('club_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($validities as $validity): ?>
            <tr>
                <td><?= h($validity->id) ?></td>
                <td><?= $validity->has('blacklisted_user') ? $this->Html->link($validity->blacklisted_user->id, ['controller' => 'BlacklistedUsers', 'action' => 'view', $validity->blacklisted_user->id]) : '' ?></td>
                <td><?= $validity->has('club') ? $this->Html->link($validity->club->id, ['controller' => 'Clubs', 'action' => 'view', $validity->club->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $validity->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $validity->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $validity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $validity->id)]) ?>
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
