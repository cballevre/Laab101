<?php

/**
 * Redirection de la page d'accueil
 */
Router::connect('', array('controller' => 'pages', 'action' => 'landing'));

/*
 * Redirection de la librairie
 */
Router::connect('library/', array('controller' => 'courses', 'action' => 'index'));



