<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $validity->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $validity->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Validities'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Blacklisted Users'), ['controller' => 'BlacklistedUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Blacklisted User'), ['controller' => 'BlacklistedUsers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clubs'), ['controller' => 'Clubs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Club'), ['controller' => 'Clubs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="validities form large-9 medium-8 columns content">
    <?= $this->Form->create($validity) ?>
    <fieldset>
        <legend><?= __('Edit Validity') ?></legend>
        <?php
            echo $this->Form->input('blacklisted_user_id', ['options' => $blacklistedUsers]);
            echo $this->Form->input('club_id', ['options' => $clubs]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
