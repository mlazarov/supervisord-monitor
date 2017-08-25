<?php


// Dashboard columns. 2 or 3
$config['supervisor_cols'] = 2;

// Refresh Dashboard every x seconds. 0 to disable
$config['refresh'] = 10;

// Enable or disable Alarm Sound
$config['enable_alarm'] = true;

// Show hostname after server name
$config['show_host'] = false;

$config['sqlite_db_path'] = '../sqlite.db';
$config['sqlite_db_table'] = 'servers';

$servers = array();
$sqlite_db = new PDO('sqlite:' . $config['sqlite_db_path']);
foreach ($sqlite_db->query('select * from ' . $config['sqlite_db_table']) as $server) {
    $servers[$server['name']] = array(
		'url' => 'http://' . $server['ip'] . '/RPC2',
		'port' => $server['port'],
		'username' => $server['username'],
		'password' => $server['password']
    );
}
$config['supervisor_servers'] = $servers;

// Set timeout connecting to remote supervisord RPC2 interface
$config['timeout'] = 3;

// Path to Redmine new issue url
$config['redmine_url'] = 'http://redmine.url/path_to_new_issue_url';

// Default Redmine assigne ID
$config['redmine_assigne_id'] = '69';
