<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Blacklisted User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Validities'), ['controller' => 'Validities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Validity'), ['controller' => 'Validities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="blacklistedUsers index large-9 medium-8 columns content">
    <h3><?= __('Blacklisted Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('fullname') ?></th>
                <th><?= $this->Paginator->sort('birthdate') ?></th>
                <th><?= $this->Paginator->sort('picture_path') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('reason') ?></th>
                <th><?= $this->Paginator->sort('valid_from') ?></th>
                <th><?= $this->Paginator->sort('valid_until') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($blacklistedUsers as $blacklistedUser): ?>
            <tr>
                <td><?= h($blacklistedUser->id) ?></td>
                <td><?= h($blacklistedUser->fullname) ?></td>
                <td><?= h($blacklistedUser->birthdate) ?></td>
                <td><?= h($blacklistedUser->picture_path) ?></td>
                <td><?= h($blacklistedUser->description) ?></td>
                <td><?= h($blacklistedUser->reason) ?></td>
                <td><?= h($blacklistedUser->valid_from) ?></td>
                <td><?= h($blacklistedUser->valid_until) ?></td>
                <td><?= h($blacklistedUser->created) ?></td>
                <td><?= h($blacklistedUser->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $blacklistedUser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $blacklistedUser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $blacklistedUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blacklistedUser->id)]) ?>
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
