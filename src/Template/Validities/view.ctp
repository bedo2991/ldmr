<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Validity'), ['action' => 'edit', $validity->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Validity'), ['action' => 'delete', $validity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $validity->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Validities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Validity'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Blacklisted Users'), ['controller' => 'BlacklistedUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Blacklisted User'), ['controller' => 'BlacklistedUsers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clubs'), ['controller' => 'Clubs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Club'), ['controller' => 'Clubs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="validities view large-9 medium-8 columns content">
    <h3><?= h($validity->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= h($validity->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Blacklisted User') ?></th>
            <td><?= $validity->has('blacklisted_user') ? $this->Html->link($validity->blacklisted_user->id, ['controller' => 'BlacklistedUsers', 'action' => 'view', $validity->blacklisted_user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Club') ?></th>
            <td><?= $validity->has('club') ? $this->Html->link($validity->club->id, ['controller' => 'Clubs', 'action' => 'view', $validity->club->id]) : '' ?></td>
        </tr>
    </table>
</div>
