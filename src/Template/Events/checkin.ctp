<!--
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
-->
<div id="checkin_success">The guest has been checked in. (<a href="#" onclick="rollbackLastCheckIn()">Cancel</a>)</div>

<div class="events view large-12 medium-12 columns content">
    <h4><?= h($event->name) ?></h4>
    <div class="related">
        <?php if (!empty($event->invited_users)): ?>

	<?php
        $options = [
    'ajax' => [
        'url' => Cake\Routing\Router::url(['controller'=>'InvitedUsers', 'action' => 'event', $event->id]),
		//"dataSrc" => "InvitedUsers"
    ],
    //'data' => $data,
    //'deferLoading' => $data->count(), // https://datatables.net/reference/option/deferLoading
    'columns' => [
        [
            'name' => 'InvitedUsers.id',
            'data' => 'id',
            'visible' => false,
            'searchable' => false,
        ],
        [
            'title' => __('Full Name'),
            'name' => 'InvitedUsers.fullname',
            'data' => 'fullname'
        ],
		[
			'title' => __('Action'),
			'searchable' => false,
			'sortable' => false,
			'name' => 'InvitedUsers.id',
			'data' => 'id',
		    'render' => $this->DataTables->callback('dt.render.checkinbutton'),
		]
    ],
    'order' => [1, 'asc'], // order by username
];
echo $this->DataTables->table('to-be-checked-table', $options, ['class' => 'table table-striped']); ?>
        <?php endif; ?>
    </div>
    <details>
      <summary><?= __('See more details') ?></summary>
	<table class="vertical-table">
        <tr>
            <th><?= __('Manager') ?></th>
            <td><?= $event->has('manager') ? $this->Html->link($event->manager->fullname, ['controller' => 'Managers', 'action' => 'view', $event->manager->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Checked In/Invited') ?></th>
            <td><span id="checked_in_counter"><?= $this->Number->format($alreadyCheckedIn). "</span> / " .$this->Number->format($event->invited_user_count) ?></td>
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
            <th><?= __('On Invitation Only') ?></th>
            <td><?= $event->on_invitation_only ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</details>
</div>
<script>
	var lastSuccessfulCheckInID = null;
	$('input[type=search]').attr('autocomplete', 'off').attr('autocapitalize', 'off').attr('spellcheck', 'off');

function rollbackLastCheckIn(){
	if(lastSuccessfulCheckInID!=null)
	{
	$.ajax({
            type: 'POST',
            url: '<?=$this->Url->build([
			"controller" => "InvitedUsers",
			"action" => "uncheck",
			]).DS?>' + lastSuccessfulCheckInID,
			dataType: 'json',
            success: function(status){
                    console.debug(status);
        			$('#checked_in_counter').html(($('#checked_in_counter').html()*1) - 1);
		},
            error: function(xhr,textStatus,error){
                alert(error);

        } });
	}
	else
	{
		alert("Error: I could not cancel the last check in.");
	}
}

function sendRequest(id)
	{
        $.ajax({
            type: 'POST',
            url: "<?=$this->Url->build([
			"controller" => "InvitedUsers",
			"action" => "check",
			]).DS?>" + id,
			dataType: 'json',
            success: function(status){
                    console.debug(status);
					lastSuccessfulCheckInID = id;
          $('input[type=search]').val("").change();
					$('a#check_in_'+id).parent().parent().remove()
    			$('#checked_in_counter').html(($('#checked_in_counter').html()*1) + 1);
					$("#checkin_success").show().delay(6000).fadeOut();
          window.scrollTo(0,0);
		},
            error: function(xhr,textStatus,error){
                alert(error);

        } });
	}

setTimeout(function(){$('input[type=search]')[0].focus()},1000);
</script>
