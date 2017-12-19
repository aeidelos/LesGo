<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Course_subcourse extends Model {
    public $id;
    public $course_id;
    public $subcourse_name;
    public $content;
    public $reference;

    public function getSpecificSubcourse($course,$progress){
        if($progress==NULL){
            $progress=0;
        }
        $query = $this->db->query("SELECT * FROM course_subcourse WHERE course_id = $course order by id asc LIMIT $progress,1");
        return $query->row();
        
    }
}
