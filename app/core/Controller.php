<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}
	protected function getQueryStringParams() {
   	 	parse_str($_SERVER['QUERY_STRING'], $params);
  	  	return $params;
	}
	protected function executeQuery($query){
		$this->load->model('Model');
		return $this->model->Model($query);
	}
	protected function unserialize($object){
		return unserialize($object)[0];
	}
	protected function uploadImage($location,$file,$image_id){
		        $config['upload_path']          = 'assets/img/'.$location.'/';
                $config['allowed_types']        = 'jpg|png';
                $config['max_size']             = '';
                $config['max_width']            = '';
                $config['max_height']           = '';
				$config['file_name'] = $location.'_'.$image_id;
				$folder = 'assets/img/'.$location.'/';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
				$file_available = ('assets/img/'.$location.'/'.$location.'_'.$image_id.'.png');
				if(is_file($file_available)){
					unlink($file_available);
				}
				$file_available = ('assets/img/'.$location.'/'.$location.'_'.$image_id.'.jpg');
				if(is_file($file_available)){
					unlink($file_available);
				}
                if ( ! $this->upload->do_upload($file)){
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
						return false;
                }
                else{
                        $data = array('upload_data' => $this->upload->data());
						return '/'.$folder.$this->upload->data('file_name');
                }
		}
		protected function uploadVideo($file,$video_id){
				$location = "sub_course";
		        $config['upload_path']          = 'assets/video/';
				$config['allowed_types']  		= '*';
				$config['max_size'] 			= '';;
				$config['file_name'] 			= $location.'_'.$video_id;
				$folder 						= 'assets/video/';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
				$file_available = ('assets/video/'.$location.'_'.$video_id.'.mp4');
				if(is_file($file_available)){
					unlink($file_available);
				}
				$file_available = ('assets/video/'.$location.'_'.$video_id.'.mkv');
				if(is_file($file_available)){
					unlink($file_available);
				}
                if ( ! $this->upload->do_upload($file)) {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
						return false;
                }
                else{
                        $data = array('upload_data' => $this->upload->data());
						return '/'.$folder.$this->upload->data('file_name');
                }
		}
		protected function messaging($type=null, $message){
			if($type==null){
				//display inbox
			}else{
				if($type=="send"){

				}
			}
		}

	}
