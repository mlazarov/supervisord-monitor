<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller {
	public function Index()	{

		$mute = $this->input->get('mute');
		if($this->input->get('mute') == 1){
			$mute_time = time()+600;
			setcookie('mute',$mute_time,$mute_time,'/');
			Redirect();
		}
		if($this->input->get('mute')==-1){
			setcookie('mute',0,time()-1,'/');
			Redirect();
		}

		$data['muted'] = $this->input->cookie('mute');

		$this->load->helper('date');
		$servers = $this->config->item('supervisor_servers');
		foreach($servers as $name=>$config){
			$data['list'][$name] = $this->_request($name,'getAllProcessInfo');
		}
		$data['cfg'] = $servers;
		$this->load->view('welcome',$data);
	}
}

