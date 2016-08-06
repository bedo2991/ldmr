<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Club'), ['action' => 'edit', $club->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Club'), ['action' => 'delete', $club->id], ['confirm' => __('Are you sure you want to delete # {0}?', $club->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Clubs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Club'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Managers'), ['controller' => 'Managers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Manager'), ['controller' => 'Managers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Validities'), ['controller' => 'Validities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Validity'), ['controller' => 'Validities', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="clubs view large-9 medium-8 columns content">
    <h3><?= h($club->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= h($club->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Short Name') ?></th>
            <td><?= h($club->short_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Full Name') ?></th>
            <td><?= h($club->full_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= h($club->address) ?></td>
        </tr>
        <tr>
            <th><?= __('City') ?></th>
            <td><?= h($club->city) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($club->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($club->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Managers') ?></h4>
        <?php if (!empty($club->managers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Fullname') ?></th>
                <th><?= __('Username') ?></th>
                <th><?= __('Password') ?></th>
                <th><?= __('Role') ?></th>
                <th><?= __('Club Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($club->managers as $managers): ?>
            <tr>
                <td><?= h($managers->id) ?></td>
                <td><?= h($managers->fullname) ?></td>
                <td><?= h($managers->username) ?></td>
                <td><?= h($managers->password) ?></td>
                <td><?= h($managers->role) ?></td>
                <td><?= h($managers->club_id) ?></td>
                <td><?= h($managers->created) ?></td>
                <td><?= h($managers->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Managers', 'action' => 'view', $managers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Managers', 'action' => 'edit', $managers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Managers', 'action' => 'delete', $managers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $managers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Validities') ?></h4>
        <?php if (!empty($club->validities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Blacklisted User Id') ?></th>
                <th><?= __('Club Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($club->validities as $validities): ?>
            <tr>
                <td><?= h($validities->id) ?></td>
                <td><?= h($validities->blacklisted_user_id) ?></td>
                <td><?= h($validities->club_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Validities', 'action' => 'view', $validities->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Validities', 'action' => 'edit', $validities->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Validities', 'action' => 'delete', $validities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $validities->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
