<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

	public function Index()	{
		$this->load->library('xmlrpc');
		$this->xmlrpc->server('http://server01.com/RPC2',9001);
		$this->xmlrpc->method('system.listMethods');
		$this->xmlrpc->send_request();
		echo "<pre>";
		print_r($this->xmlrpc->display_response());



		$this->xmlrpc->method('supervisor.readProcessStderrLog');
		$this->xmlrpc->request(array('process-name',-1000,0));
		echo $this->xmlrpc->send_request();
		print_r($this->xmlrpc->display_response());
		echo $this->xmlrpc->display_error();
		
	}
}

