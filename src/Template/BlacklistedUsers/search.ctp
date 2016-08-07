<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Blacklisted User'), ['action' => 'edit', $blacklistedUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Blacklisted User'), ['action' => 'delete', $blacklistedUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blacklistedUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Blacklisted Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Blacklisted User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Validities'), ['controller' => 'Validities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Validity'), ['controller' => 'Validities', 'action' => 'add']) ?> </li>
    </ul>
</nav>-->
<div class="blacklistedUsers view large-9 medium-8 columns content">
    <h3><?= __('Entrance Check') ?></h3>
	<b>Over 18 before: <span id="old18"></span></b>
	<hr>
	<h4>Blacklist</h4>
	<input id="blacklisted"/>
</div>
<script>

function get18(){
	var d = new Date();
	d.setYear(d.getYear()-18)
	return  ('0' + d.getDate()).slice(-2) + '/'
             + ('0' + (d.getMonth()+1)).slice(-2) + '/'
             + d.getFullYear();
}

$('#old18').html(get18());


var options = {

	data: [
		<?php foreach ($blacklistedUsers as $bu): ?>
		{"fn": "<?=$bu->fullname?>", "link": "<?=$this->Url->build([
    "controller" => "BlacklistedUsers",
    "action" => "view",
    $bu->id
]); ?>"},
		<?php if ($bu->fullname != $bu->basic): ?>
		 {"fn": "<?=$bu->basic?>", "link": "<?=$this->Url->build([
    "controller" => "BlacklistedUsers",
    "action" => "view",
    $bu->id
]); ?>"},
		<?php endif; ?>
		 
            <?php endforeach; ?>
		
		],
  
  getValue: "fn",
  placeholder: "Name or Surname",

  list: {	
    match: {
      enabled: true
    }
  },
		
	template: {
        type: "links",
        fields: {
            link: "link"
        }
    },

  theme: "bootstrap"
};

$("#blacklisted").easyAutocomplete(options);
$('#blacklisted').focusout( function(){$('#blacklisted').val("")} )
</script>

