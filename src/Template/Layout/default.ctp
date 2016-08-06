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

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>



    <?= $this->fetch('meta') ?>

    <?= $this->fetch('script') ?>
	<script type="text/javascript" src='<?=$this->request->webroot."DataTables/jQuery-1.12.3/jquery-1.12.3.js"?>'></script>
	<!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs-3.3.6/dt-1.10.12/af-2.1.2/sc-1.4.2/se-1.2.0/datatables.css"/>-->
 
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs-3.3.6/dt-1.10.12/af-2.1.2/sc-1.4.2/se-1.2.0/datatables.js"></script>
	
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
	<?= $this->fetch('css') ?>
	<?= $this->Html->script('DataTables.cakephp.dataTables.js');?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
				<li><?= $this->Html->link(__('Logout'), ['controller'=>'Managers','action' => 'logout']) ?></li>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
