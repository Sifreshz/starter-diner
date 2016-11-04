<?php

class Crud extends Application {
	public function index()	{
	$msg = '';
        $this->data['userrole'] = $this->session->userdata('userrole');
        if ($this->data['userrole'] == NULL) {
            $this->data['userrole'] = '?';
        }
        elseif($this->data['userrole'] == 'admin') {
        	$result = '';
        }
        elseif($this->data['userrole'] == 'user') {
        	$result = '';
        }
        $this->data['content'] = $result;
	    $this->render();	}
        
        
}

