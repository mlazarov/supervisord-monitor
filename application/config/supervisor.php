<?php

// Dashboard columns. 2 or 3
$config['supervisor_cols'] = 2;

// Refresh Dashboard every x seconds. 0 to disable
$config['refresh'] = 10;

// Enable or disable Alarm Sound
$config['enable_alarm'] = false;

// Show hostname after server name
$config['show_host'] = false;

$config['supervisor_servers'] = array(
	'box' => array(
		'url' => 'http://127.0.0.1/RPC2',
		'port' => '9001'
        ),
);

// Set timeout connecting to remote supervisord RPC2 interface
$config['timeout'] = 3;

// Path to Redmine new issue url
$config['redmine_url'] = 'http://redmine.url/path_to_new_issue_url';

// Default Redmine assigne ID
$config['redmine_assigne_id'] = '69';
