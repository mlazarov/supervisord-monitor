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
}
