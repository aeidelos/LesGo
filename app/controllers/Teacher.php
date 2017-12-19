<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends Controller {
    
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('teacher')==null && $this->uri->segment(2)!='login' && 
                    $this->uri->segment(2)!='logout'){
            redirect('/teacher/login');
        }
    }    
    public function index()
    {
                $this->load->model('User_general');
                $data = array();
                $data['page'] = null;
                $data['layout'] = array('user'=>'','course'=>'','report'=>'','');
                $data['site_title'] = "Les:GO - Area Pengajar";
                $data['teacher'] = $this->unserialize($this->session->userdata('teacher'));
                $this->load->view('teacher/layout/header',$data);
                $this->load->view('teacher/page/dashboard',$data);
                $this->load->view('teacher/layout/footer',$data);
    }
    public function logout()
    {
        $this->session->unset_userdata('teacher');
		redirect('/teacher/login');
    }
    public function login()
    {
        if($this->session->userdata('teacher')!=null){
            redirect('/teacher/index');
        }else{
            if($this->input->post('submit')!=null){
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $remember = $this->input->post('remember');
                $this->load->model('User_general');
                $user = array('username'=>$username,'password'=>$password, 'role'=>3);
                $result = $this->model->User_general->find($user);
                if($result !=null){
                    $this->session->set_userdata('teacher',serialize($result));
                    redirect('/teacher/index');
                }else{
                    $data = array();
                    $data['page'] = null;
                    $data['site_title'] = "Les:GO - Area Pengajar Login";
                    $data['login'] = "Login Gagal, Silahkan Coba Kembali";
                    $this->load->view('teacher/layout/header',$data);
                    $this->load->view('teacher/page/login',$data);
                    $this->load->view('teacher/layout/footer',$data);
                }
            }else{
                $data = array();
                $data['page'] = null;
                $data['site_title'] = "Les:GO - Area Pengajar Login";
                $data['login'] = null;
                $this->load->view('teacher/layout/header',$data);
                $this->load->view('teacher/page/login',$data);
                $this->load->view('teacher/layout/footer',$data);
            }
        }
    }
    public function course($add=null,$id=null){
        if($add!=null && $add!="null"){
            if($add=="add"){
                $this->load->model('User_general');
                $data = array();
                $data['page'] = null;
                $data['layout'] = array('user'=>'','course'=>'','report'=>'','');
                $data['site_title'] = "Les:GO - Area Pengajar";
                $data['teacher'] = $this->unserialize($this->session->userdata('teacher'));
                $this->load->view('teacher/layout/header',$data);
                $this->load->view('teacher/page/course_add',$data);
                $this->load->view('teacher/layout/footer',$data);
            }else if($add=="save" && $id==null){
                if($this->input->post('submit')!=null){
                $this->load->model('User_general');
                $teacher = $this->unserialize($this->session->userdata('teacher'));
                $this->load->model('Course_general');
                $this->model->Course_general->course_name = $this->input->post('course_name');
                echo $this->input->post('course_name');
                $this->model->Course_general->grade = $this->input->post('grade');
                $this->model->Course_general->details = $this->input->post('details');
                $this->model->Course_general->requirement = $this->input->post('requirement');
                $this->model->Course_general->vision = $this->input->post('vision');
                $this->model->Course_general->teacher = $teacher->id;
                $image_id = $this->model->Course_general->findLastId();
                $course_image = 'course_image';
                $this->Course_general->image = $this->uploadImage("course",$course_image,$image_id);
                }
                  if($this->Course_general->save()){
                      redirect('/teacher/course');
                  }else{
                      echo "Error in Saving";
                  }
                  redirect('/teacher/course','refresh');
                 
            }else if($add=="edit" && $id!=null){
                $this->load->model('User_general');
                $this->load->model('Course_general');
                $data = array();
                $data['page'] = null;
                $data['layout'] = array('user'=>'','course'=>'','report'=>'','');
                $data['site_title'] = "Les:GO - Area Pengajar";
                $data['teacher'] = $this->unserialize($this->session->userdata('teacher'));
                $data['course'] = $this->model->Course_general->find(array('teacher'=>$data['teacher']->id,'id' => $id),'single');
                $this->load->view('teacher/layout/header',$data);
                $this->load->view('teacher/page/course_edit',$data);
                $this->load->view('teacher/layout/footer',$data);
            }else if($add=="save" && $id!=null){
                if($this->input->post('submit')!=null){
                $this->load->model('User_general');
                $teacher = $this->unserialize($this->session->userdata('teacher'));
                $this->load->model('Course_general');
                $this->model->Course_general->id = $id;
                $this->model->Course_general->course_name = $this->input->post('course_name');
                echo $this->input->post('course_name');
                $this->model->Course_general->grade = $this->input->post('grade');
                $this->model->Course_general->details = $this->input->post('details');
                $this->model->Course_general->requirement = $this->input->post('requirement');
                $this->model->Course_general->vision = $this->input->post('vision');
                $this->model->Course_general->teacher = $teacher->id;
                $image_id = $this->model->Course_general->findLastId();
                $course_image = 'course_image';
                $this->Course_general->image = $this->uploadImage("course",$course_image,$image_id);
                }
                  if($this->Course_general->save()){
                      redirect('/teacher/course');
                  }else{
                      echo "Error in Saving";
                  }
                  redirect('/teacher/course','refresh');
            }
        }else if(($add==null || $add=="null" )&& $id == null){
                $this->load->model('User_general');
                $this->load->model('Course_general');
                $data = array();
                $data['page'] = null;
                $data['layout'] = array('user'=>'','course'=>'','report'=>'','');
                $data['site_title'] = "Les:GO - Area Pengajar";
                $data['teacher'] = $this->unserialize($this->session->userdata('teacher'));
                $data['courses'] = $this->model->Course_general->find(array('teacher'=>$data['teacher']->id));
                $this->load->view('teacher/layout/header',$data);
                $this->load->view('teacher/page/course_list',$data);
                $this->load->view('teacher/layout/footer',$data);
        }else if($add=="null" && $id != null){   
                $this->load->model('User_general');
                $this->load->model('Course_general');
                $this->load->model('Course_subcourse');
                $data = array();
                $data['page'] = null;
                $data['layout'] = array('user'=>'','course'=>'','report'=>'','');
                $data['site_title'] = "Les:GO - Area Pengajar";
                $data['teacher'] = $this->unserialize($this->session->userdata('teacher'));
                $data['course'] = $this->model->Course_general->find(array('teacher'=>$data['teacher']->id,'id' => $id),'single');
                $data['subcourses'] = $this->model->Course_subcourse->find(array('course_id'=>$id));
                $this->load->view('teacher/layout/header',$data);
                $this->load->view('teacher/page/course_detail',$data);
                $this->load->view('teacher/layout/footer',$data);
        }
    }

    public function subcourse($type, $id=null, $id_subcourse=null){
        if($type=="null" || $type==null){
            if($id!=null){
                $this->load->model('User_general');
                $this->load->model('Course_general');
                $data = array();
                $data['page'] = null;
                $data['layout'] = array('user'=>'','course'=>'','report'=>'','');
                $data['site_title'] = "Les:GO - Area Pengajar";
                $data['teacher'] = $this->unserialize($this->session->userdata('teacher'));
                $data['course'] = $this->model->Course_general->find(array('teacher'=>$data['teacher']->id,'id' => $id),'single');
                $this->load->view('teacher/layout/header',$data);
                $this->load->view('teacher/page/sub_course_add',$data);
                $this->load->view('teacher/layout/footer',$data);
            }
        }else if($type=="save"){
            if($id!=null && $id_subcourse==null){
                if($this->input->post('submit')!=null){
                $this->load->model('Course_subcourse');
                $this->model->Course_subcourse->course_id = $id;
                $this->model->Course_subcourse->subcourse_name = $this->input->post('subcourse_name');
                $this->model->Course_subcourse->reference = $this->input->post('reference');
                $video_id = $this->model->Course_subcourse->findLastId();
                $course_video = 'course_video';
                $this->Course_subcourse->content = $this->uploadVideo($course_video,$video_id);
              }
                  if($this->Course_subcourse->save()){
                      redirect('/teacher/course/null/'.$id);
                  }else{
                      echo "Error in Saving";
                }
            }
        }else if($type=="delete-confirm"){
            if($id!=null && $id_subcourse!=null){
                $this->load->model('User_general');
                $this->load->model('Course_general');
                $this->load->model('Course_subcourse');
                $data = array();
                $data['page'] = null;
                $data['layout'] = array('user'=>'','course'=>'','report'=>'','');
                $data['site_title'] = "Les:GO - Area Pengajar";
                $data['teacher'] = $this->unserialize($this->session->userdata('teacher'));
                $data['course'] = $this->model->Course_general->find(array('teacher'=>$data['teacher']->id,'id' => $id),'single');
                $data['subcourse'] = $this->model->Course_subcourse->find(array('id'=>$id_subcourse, 'course_id'=>$id),'single');
                $this->load->view('teacher/layout/header',$data);
                $this->load->view('teacher/page/sub_course_delete',$data);
                $this->load->view('teacher/layout/footer',$data);
            }
        }else if($type="delete"){
                $this->load->model('Course_subcourse');
                $this->model->Course_subcourse->remove(array('course_id'=>$id,'id'=>$id_subcourse));
                redirect('/teacher/course/null/'.$id);
        }
    }
    
    public function user($type=null){
        if($type==null){
                $this->load->model('User_general');
                $this->load->model('User_details');
                $this->load->model('User_address');
                $data = array();
                $data['page'] = null;
                $data['layout'] = array('user'=>'','course'=>'','report'=>'','');
                $data['site_title'] = "Les:GO - Area Pengajar";
                $data['user'] = $this->unserialize($this->session->userdata('teacher'));
                $data['details'] = $this->model->User_details->find(array('id'=>$data['user']->id),'single');
                $data['address'] = $this->model->User_address->find(array('id'=>$data['user']->id),'single');
                $this->load->view('teacher/layout/header',$data);
                $this->load->view('teacher/page/edit_profile',$data);
                $this->load->view('teacher/layout/footer',$data);
        }else if($type=="save"){
                    if($this->input->post('submit')!=null){
                    $this->load->model('User_general'); 
                    $user =   $this->unserialize($this->session->userdata('teacher'));
                    $this->load->model('User_details');
                    $user_details = $this->model->User_details->find(array('id'=>$user->id),'single');
                    $user_details->name = $this->input->post('name');
                    $user_details->phone = $this->input->post('phone');
                    $user_details->school = $this->input->post('school');
                    $image = 'profile_image';
                    $user->image = $this->uploadImage('user',$image,$user->id);
                        if($this->model->User_details->save($user_details) && $this->model->User_general->save($user)){
                        redirect('/teacher/');
                        } 
                    }

        }else if($type=="password"){
                   if($this->input->post('submit')!=null){
                    $this->load->model('User_general');
                    $user =  $this->unserialize($this->session->userdata('teacher'));
                    $newpassword = $this->input->post('newpassword');
                    $confirmpassword = $this->input->post('confirmpassword');
                    $currentpassword = $this->input->post('currentpassword');
                    if($newpassword == $confirmpassword){
                        if($currentpassword == $user->password){
                            $user->password = $newpassword;
                            $this->model->User_general->save($user);
                            redirect('/teacher/');
                        }
                    }
                   }
                }
    }

}