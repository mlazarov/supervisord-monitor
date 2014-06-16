<?php
class MY_Controller extends CI_Controller{
	public function _request($server,$method,$request=array()){
		$servers = $this->config->item('supervisor_servers');
		if(!$servers[$server]) die("Invalid server: ".$server);
		
		$config = $servers[$server];
		
		$this->load->library('xmlrpc',array(),$server);
		$this->{$server}->initialize();
		$this->{$server}->server($config['url'],$config['port']);
		
		if (array_key_exists("username", $config) && array_key_exists("password", $config) )
			$this->{$server}->setCredentials($config['username'], $config['password']);
		
		$this->{$server}->method('supervisor.'.$method);
		$this->{$server}->request($request);
			
        if(!$this->{$server}->send_request()){
			$response['error'] = $this->{$server}->display_error();
		}else{
	                $response = $this->{$server}->display_response();
		}	
		
		return $response;
	}


}
