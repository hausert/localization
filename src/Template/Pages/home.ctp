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
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;
$this->layout = false;
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>árbol de localizaciones</title>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('home.css') ?>
    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">
</head>
<body class="home">

<header class="row">
    <div class="header-title">
        <h1>Servicio REST :: árbol de localizaciones</h1>
        <p>
            El servicio REST cuenta de 4 servicios 3 para gestionar las entidades y uno para consultar el arbol de localizaciones. El servicio devuelve tanto en json como en xml
        </p>
    </div>
</header>

<div class="row">
<div class="row">
    <div class="columns large-6">
        <h4 class="more">Métodos</h4>
        <ul>
            <li>GET :: consulta de locaciones</li>
            <li>POST :: inserción nuevas locaciones</li>
            <li>PUT :: actualizaciónes de locaciones</li>
            <li>DELETE :: borrar locaciones</li>
        </ul>
    </div>
    <div class="columns large-6">
        <h4 class="more">Headers</h4>
        <ul>
            <li> X-CSRF-Token:2f09107895ab1adf4c28c5e430f0e7943a465ac967b33ae6fc6a7bf234075de47bf12f28b93ad872665c1727a0ad0a3b1e44f61c4cdbfa11abc7976166b8e693</li>
            <li>Content-Type:application/x-www-form-urlencoded</li>
            <li>Token:glocalization </li>
        </ul>
    </div>
    <hr />
</div>



<div class="row">
    <div class="columns large-6">
        <h4 class="more">País</h4>
        <ul>
            <li>/country.json  ( GET | POST )</li>
            <li>/country/country_id.json ( GET | PUT | DELETE ) </li>
        </ul>
        <h3>acl - token</h3>
        <ul>
            <li>GET   :: ucountry,glocalization</li>
            <li>POST  :: ucountry</li>
            <li>PUT   :: ucountry</li>
            <li>DELETE :: ucountry</li>
        </ul>
    </div>

    <div class="columns large-6">
        <h4 class="more">Provincia/Estado/Condado</h4>
        <ul>
            <li>/state.json  ( GET | POST )</li>
            <li>/state/state_id.json ( GET | PUT | DELETE ) </li>
        </ul>
        <h3>acl - token</h3>
        <ul>
            <li>GET   :: ustate,glocalization</li>
            <li>POST  :: ustate</li>
            <li>PUT   :: ustate</li>
            <li>DELETE :: ustate</li>
        </ul>
    </div>
    <hr />
</div>

<div class="row">
    <div class="columns large-6">
        <h4 class="more">Ciudad</h4>
        <ul>
            <li>/city.json  ( GET | POST )</li>
            <li>/city/city_id.json ( GET | PUT | DELETE ) </li>
        </ul>
      <h3>acl - token</h3>
        <ul>
            <li>GET   :: ucity,glocalization</li>
            <li>POST  :: ucity</li>
            <li>PUT   :: ucity</li>
            <li>DELETE :: ucity</li>
        </ul>
    </div>
    <div class="columns large-6">
        <h4 class="more">árbol locaciones</h4>
        <ul>
            <li>/localizationtree.json  ( GET )</li>
        </ul>
        <h3>acl - token</h3>
        <ul>
            <li>GET   :: glocalization</li>
        </ul>
    </div>
    <hr />
</div>
</body>
</html>
