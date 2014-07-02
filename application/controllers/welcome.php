<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller {
	public function Index()	{
		$this->load->helper('date');
		$servers = $this->config->item('supervisor_servers');
		foreach($servers as $name=>$config){
			$data['list'][$name] = $this->_request($name,'getAllProcessInfo');
		}
		$data['cfg'] = $servers;
		$this->load->view('welcome',$data);
	}
	public function getAll(){
		$this->xmlrpc->method('supervisor.getAllProcessInfo');
		$this->xmlrpc->send_request();
		print_r($this->xmlrpc->display_response());
	}
}

