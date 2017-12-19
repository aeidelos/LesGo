<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Course_general extends Model {
    public $id;
    public $course_name;
    public $grade;
    public $details;
    public $requirement;
    public $vision;
    public $image;
    public $status;

    public function loadCourse($type=null,$parameter=null){
        if($type=="new"){
            $query = "SELECT c.id, c.course_name, c.image,t.name as teacher_name FROM course_general c, user_details t WHERE c.teacher = t.id ORDER BY c.id DESC limit 4 ";
            return $this->executeQuery($query);
        }else if($type="search"){
            $search = explode(' ',$parameter);
            $search_alt = implode('|',$search);
             $query = "SELECT c.id, c.course_name, c.image, c.details,t.name as teacher_name, t.id as teacher_id FROM course_general c, user_details t WHERE c.teacher = t.id 
             AND c.course_name RLIKE '$search_alt' ";
            return $this->executeQuery($query);    
        }else{
            return false;
        }
    }

    public function getUserCourse($id_user){
        $query ="SELECT c.id, c.course_name, c.image FROM course_general c, action_taking_course a
        WHERE a.course_id = c.id and a.user_id = $id_user ";
        return $this->executeQuery($query);
    }
}
