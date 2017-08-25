<?php
class Control extends MY_Controller{
	function Start($server,$worker){
		$this->_request($server,'startProcess',array($worker,1));
		Redirect('/');
	}
	function Startall($server){
		$this->_request($server,'startAllProcesses',array(1));
		Redirect('/');
	}
	function Stop($server,$worker){
		$this->_request($server,'stopProcess',array($worker,1));
		Redirect('/');
	}
	function Stopall($server){
		$this->_request($server,'stopAllProcesses',array(1));
		Redirect('/');
	}
	function Restart($server,$worker){
		$this->_request($server,'stopProcess',array($worker,1));
		sleep(2);
		$this->_request($server,'startProcess',array($worker,1));
		Redirect('/');
	}
	function Restartall($server){
		$this->_request($server,'stopAllProcesses',array(1));
		sleep(2);
		$this->_request($server,'startAllProcesses',array(1));
		Redirect('/');
	}
	function Clear($server,$worker){
		$this->_request($server,'clearProcessLogs',array($worker));
		Redirect('/');
	}
	function AddServer() {
		try {
			$name = $_POST['name'];
			$ip = $_POST['ip'];
			$port = $_POST['port'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$sqlite_db = new PDO('sqlite:' . $this->config->item('sqlite_db_path'));
			$sqlite_db->exec("insert into " . $this->config->item('sqlite_db_table') . " values ('$name', '$ip', '$port', '$username', '$password')");
			Redirect('/');
		} catch (Exception $e) {
			echo json_encode("add server error");
		}
	}
	function DelServer($server) {
		try {
			$sqlite_db = new PDO('sqlite:' . $this->config->item('sqlite_db_path'));
			$sqlite_db->exec("delete from " . $this->config->item('sqlite_db_table') . " where name='$server'");
			Redirect('/');
		} catch (Exception $e) {
			echo json_encode("delete server error");
		}
	}
}
