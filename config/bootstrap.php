<?php

/**
 *   
 */
session_start();

/**
 * Encrypte le site en UTF-8 
 */
header('Content-Type: text/html; charset=utf-8');

/**
 * Require les chemins de base
 */
require __DIR__ . '/paths.php';

/**
 * Require l'autoloader de composer
 */
require   dirname(__DIR__).DS . 'vendor/autoload.php';



