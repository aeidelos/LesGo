<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends Controller {

	public function index()
	{
		$data = array();
		$this->load->Model('Course_general');
		$data['page'] = null;
		$data['site_title'] = 'Les Go Group';
		$data['navbar'] = 'default';
		$data['user'] = unserialize($this->session->userdata('user'));
		$data['details'] = unserialize($this->session->userdata('details'));
		$data['info'] = $this->session->flashdata('info');
		$data['new_courses'] = $this->model->Course_general->loadCourse('new');
		$this->load->view('public/layout/header',$data);
		$this->load->view('public/page/homepage',$data);
		$this->load->view('public/layout/footer',$data);

	}
	public function course($id=null, $type=null){
		if($id!=null && $id!="null"){
			$this->load->model('User_general');
			$this->load->model('Action_taking_course');
			if($this->session->userdata('user')!=null){
			$user = unserialize($this->session->userdata('user'));
			$take_course = $this->model->Action_taking_course->find(array('course_id'=>$id,'user_id'=>$user->id),'single');
				if($take_course!=null && $type!="next" && $type!="mine"){
					$type="enrolled";
				}
			}
			if($type==null){
                $this->load->model('Course_general');
                $this->load->model('User_details');
                $data = array();
                $data['page'] = null;
				$data['navbar'] = 'default';
                $data['layout'] = array('user'=>'','course'=>'','report'=>'','');
                $data['site_title'] = "Les:GO - Detail Kursus";
                $data['user'] = unserialize($this->session->userdata('user'));
				$data['details'] = unserialize($this->session->userdata('details'));
                $data['course'] = $this->model->Course_general->find(array('id' => $id),'single');
				$data['teacher'] = $this->model->User_general->find(array('id'=>$data['course']->teacher),'single');
				$data['teacher_details'] = $this->model->User_details->find(array('id'=>$data['course']->teacher),'single');
                $this->load->view('public/layout/header',$data);
                $this->load->view('public/page/course_detail',$data);
                $this->load->view('public/layout/footer',$data);
			}else if($type=="enroll"){
				$user = unserialize($this->session->userdata('user'));
				$this->model->Action_taking_course->user_id=$user->id;
				$this->model->Action_taking_course->course_id = $id;
				$this->model->Action_taking_course->save();
				redirect("/base/course/$id");
			}else if($type=="enrolled"){
				$this->load->model('Course_general');
				$this->load->model('Course_subcourse');
                $this->load->model('User_details');
                $data = array();
                $data['page'] = null;
				$data['navbar'] = 'default';
                $data['layout'] = array('user'=>'','course'=>'','report'=>'','');
                $data['site_title'] = "Les:GO - Detail Kursus";
                $data['user'] = unserialize($this->session->userdata('user'));
				$data['details'] = unserialize($this->session->userdata('details'));
                $data['course'] = $this->model->Course_general->find(array('id' => $id),'single');
				$subcourse = $this->model->Course_subcourse->getSpecificSubcourse($id,$take_course->progress);
				$progress_value= $this->model->Course_subcourse->count(array('course_id'=>$id));
				$data['progress'] = ((double)$take_course->progress/$progress_value)*100;
				$data['subcourse'] = $subcourse;
				$data['teacher'] = $this->model->User_general->find(array('id'=>$data['course']->teacher),'single');
                $this->load->view('public/layout/header',$data);
                $this->load->view('public/page/course_enrolled',$data);
                $this->load->view('public/layout/footer',$data);
			}else if($type=="next"){
				$this->load->model('Course_general');
				$take_course->progress++;
				$this->model->Action_taking_course->save($take_course);
				redirect("/base/course/$id/");
			}
		}else{
			if($id=="null"){
				if($type="mine"){
				$data = array();
				$this->load->Model('User_general');
				$this->load->Model('Course_general');
				$data['page'] = null;
				$data['site_title'] = 'Les Go Group';
				$data['navbar'] = 'default';
				$data['details'] = unserialize($this->session->userdata('details'));
				$data['user'] = unserialize($this->session->userdata('user'));
				$data['courses'] = $this->model->Course_general->getUserCourse($data['user']->id);
				$data['info'] = $this->session->flashdata('info');
				$this->load->view('public/layout/header',$data);
				$this->load->view('public/page/course_mine',$data);
				$this->load->view('public/layout/footer',$data);
				}
			}else{
				redirect('/');
			}
			
		}
	}
	public function search()
	{
		$parameter = $this->getQueryStringParams();
		$search = $parameter['search'];
		$search = $this->input->get('search');
		if($search!='') {
		$data = array();
		$this->load->Model('Course_general');
		$data['page'] = null;
		$data['search'] = $search;
		$data['site_title'] = 'Les Go Group';
		$data['navbar'] = 'default';
		$data['user'] = unserialize($this->session->userdata('user'));
		$data['details'] = unserialize($this->session->userdata('details'));
		$data['info'] = $this->session->flashdata('info');
		$data['courses'] = $this->model->Course_general->loadCourse('search',$search);
		$this->load->view('public/layout/header',$data);
		$this->load->view('public/page/search',$data);
		$this->load->view('public/layout/footer',$data);
		}else{
			// to be defined
		}
	}
	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$remember = $this->input->post('remember');
		$this->load->model('User_general');
		$this->load->model('User_details');
		$user = array('username'=>$username,'password'=>$password, 'status'=>1);
		$result = $this->model->User_general->find($user,'single');
		$details = $this->model->User_details->find(array('id'=>$result->id),'single');
		if($result !=null){
			$this->session->set_userdata('user',serialize($result));
			$this->session->set_userdata('details',serialize($details));
			redirect('/base/index');
		}else{
			$info = array('type'=>'warning','title'=>'Login Gagal','content'=>'Silahkan periksa kembali username dan password');
			$this->session->set_flashdata('info',$info);
			redirect('base/index');
		}

	}
	public function register($type = null)
	{
		if($type == null){
				if($this->input->post('submit')==null){
					$data = array();
					$data['page'] = null;
					$data['site_title'] = "Les:GO - Daftar";
					$data['navbar'] = "default";
					$this->load->view('public/layout/header',$data);
					$this->load->view('public/page/register');
					$this->load->view('public/layout/footer',$data);
				}else{
					$username = $this->input->post('username');
					$password = $this->input->post('password');
					$email = $this->input->post('email');
					$city = $this->input->post('city');
					$street = $this->input->post('street');
					$name = $this->input->post('name');
					$grade = $this->input->post('grade');
					$phone = $this->input->post('phone');
					$this->load->model('User_general');
					if ($this->model->User_general->register($username,$password,$email,$name,$street,$city,$phone,$grade)){
						$info = array('type'=>'success', 'title'=>'Register berhasil', 'content'=>'Silahkan login untuk melanjutkan');
						$this->session->set_flashdata('info',$info);
						redirect('/base/index');
					}
				}
		}else if($type == "teacher"){
				if($this->input->post('submit')==null){
					$this->load->view('base/teacher_register');
				}else{
					$username = $this->input->post('username');
					$password = $this->input->post('password');
					$email = $this->input->post('email');
					$city = $this->input->post('city');
					$street = $this->input->post('street');
					$name = $this->input->post('name');
					$dicipline = $this->input->post('dicipline');
					$phone = $this->input->post('phone');
					$this->load->model('User_general');
					if ($this->model->User_general->register($username,$password,$email,$name,$street,$city,$phone,$dicipline,'teacher')){
						$info = array('type'=>'success', 'title'=>'Permohonan berhasil', 'content'=>'Silahkan tunggu pemeriksaan dan konfirmasi ke email anda dari kami kurang lebih 2x24 jam');
						$this->session->set_flashdata('info',$info);
						redirect('/base/index');
					}
				}
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('user');
		redirect('/base/index');
	}
	public function user($type=null, $id = null){
		if($type==null || $type=="view"){
		$data = array();
		$this->load->Model('User_general');
		$this->load->Model('User_details');
		$this->load->Model('User_address');
		$this->load->Model('Course_general');
		$data['page'] = null;
		$data['site_title'] = 'Les Go Group';
		$data['navbar'] = 'default';
		if($id==null){
			$data['user'] = unserialize($this->session->userdata('user'));
			$data['details'] = unserialize($this->session->userdata('details'));
			$data['owner'] = $data['user']->id;
			$data['address'] = $this->model->User_address->find(array('id'=>$data['user']->id),'single');
	    }else if($id!=null){
			$data['user'] = $this->model->User_general->find(array('id'=>$id),'single');
			$data['details'] = $this->model->User_details->find(array('id'=>$id),'single');
			$data['address'] = $this->model->User_address->find(array('id'=>$id),'single');
			$data['owner'] = null;
			if($data['user']->role==3){
				$data['courses'] = $this->model->Course_general->find(array('teacher'=>$data['user']->id));
			}
		}
		$data['info'] = $this->session->flashdata('info');
		$this->load->view('public/layout/header',$data);
		$this->load->view('public/page/profil',$data);
		$this->load->view('public/layout/footer',$data);
		}else if($type=="edit"){
		$data = array();
		$this->load->Model('User_general');
		$this->load->Model('User_details');
		$this->load->Model('User_address');
		$data['page'] = null;
		$data['site_title'] = 'Les Go Group';
		$data['navbar'] = 'default';
		$data['user'] = unserialize($this->session->userdata('user'));
		$data['details'] = unserialize($this->session->userdata('details'));
		$data['address'] = $this->model->User_address->find(array('id'=>$data['user']->id),'single');
		$this->load->view('public/layout/header',$data);
		$this->load->view('public/page/edit_profile',$data);
		$this->load->view('public/layout/footer',$data);
		}else if($type=="save"){
		if($this->input->post('submit')!=null){ 
                    $this->load->model('User_general'); 
                    $user = unserialize($this->session->userdata('user'));
                    $this->load->model('User_details');
                    $user_details = $this->model->User_details->find(array('id'=>$user->id),'single');
                    $user_details->name = $this->input->post('name');
                    $user_details->phone = $this->input->post('phone');
                    $user_details->grade = $this->input->post('grade');
                    $image = 'profile_image';
                    $user->image = $this->uploadImage('user',$image,$user->id);
                    if($this->model->User_details->save($user_details) && $this->model->User_general->save($user)){
                        exit();
						redirect('/base/user');
                        } 
                    }
					redirect('/base/user');
		}else if($type=="password"){
		        if($this->input->post('submit')!=null){
                    $this->load->model('User_general');
                    $user =  unserialize($this->session->userdata('user'));
                    $newpassword = $this->input->post('newpassword');
                    $confirmpassword = $this->input->post('confirmpassword');
                    $currentpassword = $this->input->post('currentpassword');
                    if($newpassword == $confirmpassword){
                        if($currentpassword == $user->password){
                            $user->password = $newpassword;
                            $this->model->User_general->save($user);
                            redirect('/base/user');
                        }
                    }
                }
		}
		
	}
}
