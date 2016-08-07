<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Blacklisted User'), ['action' => 'edit', $blacklistedUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Blacklisted User'), ['action' => 'delete', $blacklistedUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blacklistedUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Blacklisted Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Blacklisted User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Validities'), ['controller' => 'Validities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Validity'), ['controller' => 'Validities', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="blacklistedUsers view large-9 medium-8 columns content">
    <h3><?= h($blacklistedUser->fullname) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Picture Path') ?></th>
            <td><?= h($blacklistedUser->picture_path) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($blacklistedUser->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Reason') ?></th>
            <td><?= h($blacklistedUser->reason) ?></td>
        </tr>
        <tr>
            <th><?= __('Birthdate') ?></th>
            <td><?= h($blacklistedUser->birthdate) ?></td>
        </tr>
        <tr>
            <th><?= __('Valid From') ?></th>
            <td><?= h($blacklistedUser->valid_from) ?></td>
        </tr>
        <tr>
            <th><?= __('Valid Until') ?></th>
            <td><?= h($blacklistedUser->valid_until) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($blacklistedUser->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($blacklistedUser->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Validities') ?></h4>
        <?php if (!empty($blacklistedUser->validities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Club') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($blacklistedUser->validities as $validities): ?>
            <tr>
                <td><?= h($validities->club->full_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Validities', 'action' => 'view', $validities->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Validities', 'action' => 'edit', $validities->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Validities', 'action' => 'delete', $validities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $validities->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
	<?php else:?>
	 <?= $this->Html->link(__('Click here to set: this person may not access any club'), ['controller' => 'Validities', 'action' => 'addAll', $blacklistedUser->id]);?>
        <?php endif; ?>
    </div>
</div>
