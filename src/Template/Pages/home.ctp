<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
</head>
<body class="home">
	<div id="content">
		<h1>LDMR: Lasst die Menschen rein</h1>
		<p>LDMR means in German <i>Let the people in</i>. It is a web based application meant to manage guest lists for private events.</p>
		<?php if ($this->request->session()->read('Auth.User.id')): ?>
		<ul>
		<li><?= $this->Html->link(__('Private Parties'), ['controller'=>'Events','action' => 'index']) ?></li>
		<?php if ($this->request->session()->read('Auth.User.role') != "event_manager"): ?>
		<li><?= $this->Html->link(__('Blacklisted People'), ['controller'=>'BlacklistedUsers','action' => 'search']) ?></li>
		<?php endif ?>
		</ul>
		<?php else: ?>
		<p>To continue, please <?= $this->Html->link(__('Login'), ['controller'=>'Managers','action' => 'login']) ?></p>
		<?php endif; ?>
	</div>
	<footer>For comments or problems, see the <a href="https://github.com/bedo2991/ldmr/" target="_blank">repository on Github</a>.</footer>
</body>
</html>
