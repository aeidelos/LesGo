<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('admin')==null && $this->uri->segment(2)!='login' && 
                    $this->uri->segment(2)!='logout'){
            redirect('/admin/login');
        }
    }    
    public function index()
    {           
                $this->load->model('User_general');
                $data = array();
                $data['page'] = null;
                $data['layout'] = array('user'=>'','course'=>'','report'=>'','');
                $data['site_title'] = "Les:GO - Dashboard";
                $data['admin'] = $this->unserialize($this->session->userdata('admin'));
                $this->load->view('restricted/layout/header',$data);
                $this->load->view('restricted/page/dashboard',$data);
                $this->load->view('restricted/layout/footer',$data);
    }
    public function login()
    {
        if($this->session->userdata('admin')!=null){
            redirect('/admin/index');
        }else{
            if($this->input->post('submit')!=null){
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $remember = $this->input->post('remember');
                $this->load->model('User_general');
                $user = array('username'=>$username,'password'=>$password, 'role'=>0);
                $result = $this->model->User_general->find($user);
                if($result !=null){
                    $this->session->set_userdata('admin',serialize($result));
                    redirect('/admin/index');
                }else{
                    $data = array();
                    $data['page'] = null;
                    $data['site_title'] = "Les:GO - Administrator Login";
                    $data['login'] = "Login Gagal, Silahkan Coba Kembali";
                    $this->load->view('restricted/layout/header',$data);
                    $this->load->view('restricted/page/login',$data);
                    $this->load->view('restricted/layout/footer',$data);
                }
            }else{
                $data = array();
                $data['page'] = null;
                $data['site_title'] = "Les:GO - Administrator Login";
                $data['login'] = null;
                $this->load->view('restricted/layout/header',$data);
                $this->load->view('restricted/page/login',$data);
                $this->load->view('restricted/layout/footer',$data);
            }
        }
    }
    public function logout()
    {
        if($this->session->userdata('admin')!=null){
            $this->session->unset_userdata('admin');
            redirect('/admin/login');
        }else{
            echo 'u even didnt login!';
        }
    }
    public function changeStatusUser($id, $state = null)
    {
        $this->load->model('User_general');
        $user = $this->model->User_general->find(array('id'=>$id),'single');
        $user->status = $state!=null ? $state : ($user->status==1 ? 0 : 1);
        if($this->model->User_general->save($user)){
            redirect('/admin/user');
        }
    }
    public function user($type = null, $id = null ,$save = null)
    { 
        $this->load->model('Define_role');
        if($type == null && $id == null){ 
            redirect('admin/index');
        }else if($type!=null && $id == null){ 
            if($type=="student"){
                $this->load->model('User_general');
                $students = $this->model->User_general->find(array('role'=>4));
                $data = array();
                $data['page'] = null;
                $data['site_title'] = "Les:GO - Pengguna Sistem";
                $data['type'] = "Pelajar";
                $data['url'] = "student";
                $data['users'] = $students;
                $data['role'] = $this->Define_role;
                $data['admin'] = $this->unserialize($this->session->userdata('admin'));
                $this->load->view('restricted/layout/header',$data);
                $this->load->view('restricted/page/user',$data);
                $this->load->view('restricted/layout/footer',$data);
            }else if($type=="teacher"){
                $this->load->model('User_general');
                $teacher= $this->model->User_general->find(array('role'=>3));
                $data = array();
                $data['page'] = null;
                $data['site_title'] = "Les:GO - Pengguna Sistem";
                $data['type'] = "Pengajar";
                $data['url'] = "teacher";
                $data['users'] = $teacher;
                $data['role'] = $this->Define_role;
                $data['admin'] = $this->unserialize($this->session->userdata('admin'));
                $this->load->view('restricted/layout/header',$data);
                $this->load->view('restricted/page/user',$data);
                $this->load->view('restricted/layout/footer',$data);
            }else if($type=="admin"){
                $this->load->model('User_general');
                $this->load->model('Define_role');
                $admin= $this->model->User_general->find(array('role'=>0));
                $data = array();
                $data['page'] = null;
                $data['site_title'] = "Les:GO - Pengguna Sistem";
                $data['type'] = "Administrator";
                $data['url'] = "admin";
                $data['role'] = $this->Define_role;
                $data['users'] = $admin;
                $data['admin'] = $this->unserialize($this->session->userdata('admin'));
                $this->load->view('restricted/layout/header',$data);
                $this->load->view('restricted/page/user',$data);
                $this->load->view('restricted/layout/footer',$data);
            }else{
                redirect('admin/index');
            }
        }else if($type !=null && $id!=null){  
            $this->load->model('User_general');
            $user = $this->model->User_general->find(array('id'=>$id),'single');
            $admin_profile = $this->unserialize($this->session->userdata('admin'));
            if($type=='admin' && $id == $admin_profile->id && $save==null){ 
                $this->load->model('User_details');
                $user_details = $this->model->User_details->find(array('id'=>$admin_profile->id),'single');
                $this->load->model('User_address');
                $user_address = $this->model->User_address->find(array('id'=>$admin_profile->id),'single');
                $data = array();
                $data['page'] = null;
                $data['site_title'] = "Les:GO - Pengguna Sistem";
                $data['type'] = "Administrator";
                $data['user'] = $admin_profile;
                $data['details'] = $user_details;
                $data['address'] = $user_address;
                $data['admin'] = $this->unserialize($this->session->userdata('admin'));
                $this->load->view('restricted/layout/header',$data);
                $this->load->view('restricted/page/edit_profile',$data);
                $this->load->view('restricted/layout/footer',$data);
            }else if($type=='admin' && $id == $admin_profile->id && $save!=null){ 
                if($save=="profile"){
                    if($this->input->post('submit')!=null){
                    $this->load->model('User_details');
                    $user = $this->model->User_general->find(array('id'=>$id),'single');
                    $user_details = $this->model->User_details->find(array('id'=>$id),'single');
                    $user_details->name = $this->input->post('name');
                    $image = 'profile_image';
                    $user->image = $this->uploadImage('user',$image,$id);
                    if($this->model->User_details->save($user_details) && $this->model->User_general->save($user)){
                        redirect('/admin/user/'.$id);
                    } 
                    }
            }else if($save=="password"){
                   if($this->input->post('submit')!=null){
                    $this->load->model('User_general');
                    $user= $this->model->User_general->find(array('id'=>$id),'single');
                    $newpassword = $this->input->post('newpassword');
                    $confirmpassword = $this->input->post('confirmpassword');
                    $currentpassword = $this->input->post('currentpassword');
                    if($newpassword == $confirmpassword){
                        if($currentpassword == $user->password){
                            $user->password = $newpassword;
                            $this->model->User_general->save($user);
                            redirect('/admin/');
                        }
                    }
                   }
            }else if($save=="view"){
                $this->load->model('User_details');
                $user_details = $this->model->User_details->find(array('id'=>$admin_profile->id),'single');
                $this->load->model('User_address');
                $user_address = $this->model->User_address->find(array('id'=>$admin_profile->id),'single');
                $data = array();
                $data['page'] = null;
                $data['site_title'] = "Les:GO - Pengguna Sistem";
                $data['type'] = "Administrator";
                $data['user'] = $admin_profile;
                $data['details'] = $user_details;
                $data['address'] = $user_address;
                $data['admin'] = $this->unserialize($this->session->userdata('admin'));
                $this->load->view('restricted/layout/header',$data);
                $this->load->view('restricted/page/user_detail',$data);
                $this->load->view('restricted/layout/footer',$data);
                }
            }else if($type == "student"){
                $this->load->model('User_details');
                $user_details = $this->model->User_details->find(array('id'=>$user->id),'single');
                $this->load->model('User_address');
                $user_address = $this->model->User_address->find(array('id'=>$user->id),'single');
                $this->load->model('Action_taking_course');
                $course_taken = $this->model->Action_taking_course->find(array('user_id'=>$user->id));
                $data = array();
                $data['page'] = null;
                $data['site_title'] = "Les:GO - Pengguna Sistem";
                $data['type'] = "Administrator";
                $data['user'] = $user;
                $data['details'] = $user_details;
                $data['address'] = $user_address;
                $data['courses'] = $course_taken;
                $data['admin'] = $this->unserialize($this->session->userdata('admin'));
                $this->load->view('restricted/layout/header',$data);
                $this->load->view('restricted/page/user_detail',$data);
                $this->load->view('restricted/layout/footer',$data);
            }else if($type == "teacher"){ 
                $this->load->model('User_details');
                $user_details = $this->model->User_details->find(array('id'=>$user->id),'single');
                $this->load->model('User_address');
                $user_address = $this->model->User_address->find(array('id'=>$user->id),'single');
                $this->load->model('Course_general');
                $course_taken = $this->model->Course_general->find(array('teacher'=>$user->id));
                $data = array();
                $data['page'] = null;
                $data['site_title'] = "Les:GO - Pengguna Sistem";
                $data['type'] = "Administrator";
                $data['user'] = $user;
                $data['details'] = $user_details;
                $data['address'] = $user_address;
                $data['courses'] = $course_taken;
                $data['admin'] = $this->unserialize($this->session->userdata('admin'));
                $this->load->view('restricted/layout/header',$data);
                $this->load->view('restricted/page/user_detail',$data);
                $this->load->view('restricted/layout/footer',$data);
            }else{
                redirect('admin/index');
            }
        }
    }
    public function course($id = null, $action=null){
        if($id!=null){
            if($action=="view"){
                $this->load->model('User_general');
                $this->load->model('Course_general');
                $this->load->model('Course_subcourse');
                $data = array();
                $data['page'] = null;
                $data['layout'] = array('user'=>'','course'=>'','report'=>'','');
                $data['site_title'] = "Les:GO - Area Pengajar";
                $data['admin'] = $this->unserialize($this->session->userdata('admin'));
                $data['course'] = $this->model->Course_general->find(array('id' => $id),'single');
                $data['subcourses'] = $this->model->Course_subcourse->find(array('course_id'=>$id));
                $this->load->view('restricted/layout/header',$data);
                $this->load->view('restricted/page/course_detail',$data);
                $this->load->view('restricted/layout/footer',$data);
            }else if($action=="delete"){
                $this->load->model('Course_general');
                $this->model->Course_general->remove(array('id'=>$id));
                redirect('/admin/user/teacher');
            }
        }else{
            if($action==null){
                $this->load->model('User_general');
                $this->load->model('Course_general');
                $data = array();
                $data['page'] = null;
                $data['layout'] = array('user'=>'','course'=>'','report'=>'','');
                $data['site_title'] = "Les:GO - Area Pengajar";
                $data['admin'] = $this->unserialize($this->session->userdata('admin'));
                $data['courses'] = $this->model->Course_general->executeQuery(
                'SELECT c.id,c.course_name,c.image,t.id as teacher_id,d.name as teacher_name FROM course_general c,user_general t, user_details d 
                WHERE c.teacher = t.id and d.id = t.id');
                $this->load->view('restricted/layout/header',$data);
                $this->load->view('restricted/page/course_list',$data);
                $this->load->view('restricted/layout/footer',$data);
            }
        }
    }

}