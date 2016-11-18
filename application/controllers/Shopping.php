<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Shopping extends Application
{

    function __construct() {
            parent::__construct();
    }

    public function index() {
        // What is the user up to?
        if ($this->session->has_userdata('order'))
            $this->keep_shopping();
        else $this->summarize();
    }

    public function summarize() {
        $this->data['pagebody'] = 'summary';
        $this->render('template');  // use the default template
    }
    
    public function keep_shopping() {
        $order = new Order($this->session->userdata('order'));
        $stuff = $order->receipt();
        $this->data['receipt'] = $this->parsedown->parse($stuff);
    }
    
    public function neworder() {
        // create a new order if needed
        if (! $this->session->has_userdata('order')) {
            $order = new Order();
            $this->session->set_userdata('order', (array) $order);
        }

        $this->keep_shopping();
    }    
    
    public function cancel() {
        // Drop any order in progress
        if ($this->session->has_userdata('order')) {
            $this->session->unset_userdata('order');
        }

        $this->index();
    } 

    public function add($what) {
        $order = new Order($this->session->userdata('order'));
        $order->additem($what);
        $this->keep_shopping();
        $this->session->set_userdata('order',(array)$order);
    }


}
