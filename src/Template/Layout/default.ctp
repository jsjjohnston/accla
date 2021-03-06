<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->script('jquery.min.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
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
                <li class="name">
                    <?php 
                        $session = $this->request->session();
                        $user = $session->read('Auth.User');
                        if(!empty($user)) {
                            //echo 'Hi ', $user['user_name'];
                            echo $this->Html->link('Hi ' . $user['user_name'], ['controller'=> 'Users','action' => 'view', $user['id']]);
                        }
                    ?>
                </li>
                <li>
                    <?php 
                        $session = $this->request->session();
                        $user = $session->read('Auth.User');
                        if(!empty($user)) {
                            echo $this->Html->link('Logout', ['controller'=> 'Users','action' => 'logout']);
                        }
                        else
                        {
                            echo $this->Html->link('Login', ['controller'=> 'Users','action' => 'login']);
                        }    
                        ?>
                </li>
            </ul>
        </div>
    </nav>
    <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= !empty($session->read('Auth.User')) ? $this->Html->link(__('New Recipe'), ['controller' => 'Recipe', 'action' => 'add']) : '' ?></li>
        <li><?= !empty($session->read('Auth.User')) ? $this->Html->link(__('View My Recipes'), ['controller' => 'Recipe', 'action' => 'viewMy']) : ''?></li>
        <li><?= $this->Html->link(__('View All Recipes'), ['controller' => 'Recipe', 'action' => 'index']) ?></li>

        <?php
            $user = $session->read('Auth.User');
            if(!empty($user) && $user['role'] == 'Admin' ) {
               echo '<li>'; 
               echo $this->Html->link(__('View Admin Page'), ['controller' => 'Users', 'action' => 'admin']) ;
               echo '</li>';
            }
        ?>
    </ul>
</nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
