<?php



/**
 * Configuration de l'url
 */
$url = $_GET['url'];

/**
 * Initialise l'application
 */
require dirname(__DIR__).'/config/bootstrap.php';


use \Kiwi\Routing\Dispatcher;


/**
 * Initialise le dispatcher
 */
$dispatcher = new Dispatcher($url);
