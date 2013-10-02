<?php
class Control extends MY_Controller{
	function Start($server,$worker){
		$this->_request($server,'startProcess',array($worker,1));
		Redirect('/');
	}
	function Stop($server,$worker){
		$this->_request($server,'stopProcess',array($worker,1));
		Redirect('/');
	}
	function Clear($server,$worker){
		$this->_request($server,'clearProcessLogs',array($worker));
                Redirect('/');
	}
}
