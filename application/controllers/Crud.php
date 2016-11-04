<?php

class Crud extends Application {
	public function index()	{
	$result = '';
        $this->data['userrole'] = $this->session->userdata('userrole');
        if ($this->data['userrole'] == NULL) {
            $this->data['userrole'] = '?';
        }
        elseif($this->data['userrole'] == 'admin') {
        	$result = 'Hello, Admin';
        }
        elseif($this->data['userrole'] == 'user') {
        	$result = 'Must be an admin';
        }
        $this->data['content'] = $result;
	    $this->render();	}
        
        
}

