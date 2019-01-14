<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
    function __construct() 
    {
	     parent::__construct();
	     
        // load session library
        $this->load->library('session');
        
        // load user model
        $this->load->model('UserModel','user');
                
        // load helpers
        $this->load->helper('url');
        
    }
	 
    /*
    *	function to list user
    */
    public function userListing($offset = 0) 
    {
    	  $this->load->library('pagination');
    	  $limit = 20;
    	  $config['uri_segment']      = 3;
        $config['base_url']         = base_url().'index.php/user/userlisting/';
        $config['total_rows']       = $this->user->countUsers();
        $config['per_page']         = $limit;
        $config['full_tag_open']    = '<ul class="pagination tmarg10 float-right">';
        $config['full_tag_close']   = '</ul>';
        $config['num_tag_open']     = '<li class="page-item">';
        $config['num_tag_close']    = '</li>';
        $config['cur_tag_open']     = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close']    = '</a></li>';
        $config['next_tag_open']    = '<li class="page-item">';
        $config['next_tagl_close']  = '</a></li>';
        $config['prev_tag_open']    = '<li class="page-item">';
        $config['prev_tagl_close']  = '</li>';
        $config['first_tag_open']   = '<li class="page-item disabled">';
        $config['first_tagl_close'] = '</li>';
        $config['last_tag_open']    = '<li class="page-item">';
        $config['last_tagl_close']  = '</a></li>';
        $config['attributes']       = array('class' => 'page-link');
        
        $this->pagination->initialize($config);
		
		  // get user data from user model		
        $user['userData']           = $this->user->getUsers($offset,$limit);
        
        // load user listing page
        $templateData['header']     = array('title' => 'user list');
        $templateData['breadcrumb'] = array('breadcrumb' => array('User list' => ''));
        $templateData['body']       = $user;
        $this->_loadTemplate('user_listing',$templateData);        
    }
    
    /*
    * function to add user
    */     
    public function addUser() 
    {
    	  // Load form helper
        $this->load->helper(array('form'));

        // Load form validation library
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger err" role="alert">', '</div>');
	
        // Set validation rule for name field in the form
        $this->form_validation->set_rules('name', 'Name', 'required|trim|regex_match[/^[a-zA-Z ]+$/]|min_length[2]|max_length[30]'); 
        $this->form_validation->set_rules('country', 'Country', 'required|trim|regex_match[/^[a-zA-Z ]+$/]|max_length[20]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[70]');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required|is_natural|max_length[15]');
        $this->form_validation->set_rules('about', 'About you', 'required|max_length[1000]');
        $this->form_validation->set_rules('birthday', 'Birthday', 'required|callback_checkDate');
 
        
        if ($this->form_validation->run() == FALSE) {
            // load login page
           $templateData['header']     = array('title' => 'Add User');
           $templateData['body']       = array();
           $templateData['breadcrumb'] = array('breadcrumb' => array('User list' => 'user/userlisting','Add User' => ''));
           $this->_loadTemplate('add_user', $templateData); 
        } else {
        	   // save form data
        	   $this->user->addUser($this->input->post(NULL, true));
        	   
            $this->session->set_flashdata('userMsg', '<div class="alert alert-success tmarg10">User Added</div>');
            redirect('/user/userListing');
            		
        } 
    }
    
     /*
    * function to edit user
    */     
    public function editUser($id, $offset = '') 
    {
    	  $userData = $this->user->fetchUserData($id);
        if(empty($userData)){
            redirect('user/userlisting');
        }	
        
    	  // Load form helper
        $this->load->helper(array('form'));

        // Load form validation library
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger err" role="alert">', '</div>');
	
        // Set validation rule for name field in the form
        $this->form_validation->set_rules('name', 'Name', 'required|trim|regex_match[/^[a-zA-Z ]+$/]|min_length[2]|max_length[30]'); 
        $this->form_validation->set_rules('country', 'Country', 'required|trim|regex_match[/^[a-zA-Z ]+$/]|max_length[20]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[70]');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required|is_natural|max_length[15]');
        $this->form_validation->set_rules('about', 'About you', 'required|max_length[1000]');
        $this->form_validation->set_rules('birthday', 'Birthday', 'required|callback_checkDate');
 
        
        if ($this->form_validation->run() == FALSE) {
            // load login page
           if(count($this->input->post()) > 0) {
             $userData = $this->input->post();            
           } 
           $templateData['header']     = array('title' => 'Edit User');
           $templateData['body']       = array('userData' => $userData);
           $templateData['breadcrumb'] = array('breadcrumb' => array('User list' => 'user/userlisting','Edit User' => ''));
           $this->_loadTemplate('edit_user', $templateData); 
        } else {
        	   // save form data
        	   $this->user->editUser($id, $this->input->post(NULL, true));
        	   
            $this->session->set_flashdata('userMsg', '<div class="alert alert-success tmarg10">User Updated</div>');
            redirect('/user/userListing/'.$offset);
            		
        } 
    }    
    
    /* 
    * function to load template
    */
    private function _loadTemplate($templateName,$data) 
    {
        $this->load->view('header',$data['header']);
        $navbarData = array();
        $this->load->view('navbar', $navbarData);
        $this->load->view('breadcrumb', $data['breadcrumb']);
        $this->load->view($templateName, $data['body']);
        $this->load->view('footer');		    
    }
    
    /* 
    *check date in yyyy-mm-dd format
    */ 
    public function checkDate($date)
    {
        $format = 'Y-m-d';
        $d = DateTime::createFromFormat($format, $date);
        if($d && $d->format($format) === $date){
            return true;	
        } else {
            $this->form_validation->set_message('checkDate', 'Invalid date');
            return false;
        }	
    }
}    