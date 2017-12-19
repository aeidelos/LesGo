<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_role'))
{
    function get_role($id)
    {
        $this->load->model('Define_role');
        $role = $this->model->Define_role->find(array('id'=>id),'single');
        return $role->role;
    }   
}