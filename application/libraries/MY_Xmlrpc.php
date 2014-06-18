<?php
class MY_Xmlrpc extends CI_Xmlrpc {
	function setCredentials($username, $password) {
		$this->client->setCredentials($username, $password);
	}
	function server($url, $port=80){
		if (substr($url, 0, 4) != "http"){
			$url = "http://".$url;
		}

		$parts = parse_url($url);

		$path = ( ! isset($parts['path'])) ? '/' : $parts['path'];

		if (isset($parts['query']) && $parts['query'] != ''){
			$path .= '?'.$parts['query'];
		}

		$this->client = new MY_XML_RPC_Client($path, $parts['host'], $port);
        }

}

class MY_XML_RPC_Client extends XML_RPC_Client {
	var $username		= "";
	var $password		= "";
	
	function setCredentials($username, $password) {
		$this->username = $username;
		$this->password = $password;
	}
	
	function sendPayload($msg){
		$fp = @fsockopen($this->server, $this->port,$this->errno, $this->errstr, $this->timeout);

		if ( ! is_resource($fp)){
			error_log($this->xmlrpcstr['http_error']);
			$r = new XML_RPC_Response(0, $this->xmlrpcerr['http_error'],$this->xmlrpcstr['http_error']);
			return $r;
		}
	
		if (empty($msg->payload)){
			// $msg = XML_RPC_Messages
			$msg->createPayload();
		}

		$r = "\r\n";
		$op  = "POST {$this->path} HTTP/1.0$r";
		$op .= "Host: {$this->server}$r";
		$op .= "Content-Type: text/xml$r";
		$op .= "User-Agent: {$this->xmlrpcName}$r";
		$op .= "Content-Length: ".strlen($msg->payload). "$r";
		if ($this->username != '' && $this->password != '') {
			$op .= "Authorization: Basic ".base64_encode($this->username.':'.$this->password).$r;
		}
		
		$op .= "$r";		

		$op .= $msg->payload;


		if ( ! fputs($fp, $op, strlen($op))){
			error_log($this->xmlrpcstr['http_error']);
			$r = new XML_RPC_Response(0, $this->xmlrpcerr['http_error'], $this->xmlrpcstr['http_error']);
			return $r;
		}
		$resp = $msg->parseResponse($fp);
		fclose($fp);
		return $resp;
	}
}
