<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_general extends Model {
    public $id;
    public $username;
    public $password;
    public $email;
    public $role;
    public $status;
    public $image;

    public function register( $username, $password, $email, $name, $street, $city, $phone, $grade_dicipline, $type=null)
    {   
        $query_1="";
        $query_2="";
        if($type==null){
            $query_1 = "INSERT INTO user_general (username,password,email,role) 
                    values ('$username','$password', '$email', 4)";
            $query_2 = "INSERT INTO user_details_student (id, name, phone, grade) 
                    values (LAST_INSERT_ID(),'$name','$phone','$grade_dicipline')";
        }else if($type='teacher'){
            $query_1 = "INSERT INTO user_general (username,password,email,role,status) 
                    values ('$username','$password', '$email', 3,3)";
            $query_2 = "INSERT INTO user_details_teacher (id, name, phone, dicipline) 
                    values (LAST_INSERT_ID(),'$name','$phone','$grade_dicipline')";
        }
        $query_3 = "INSERT INTO user_address (id,street,city) 
            values (LAST_INSERT_ID(),'$street','$city')";
        return $this->transaction($query_1,$query_2,$query_3);
    }
    public function detail($id = null,$type = null){
            $query;
            $this->db->select('*');
            $this->db->from('user_general');
            if($type == 'teacher'){
                $this->db->join('user_details_teacher','user_general.id=user_details_teacher.id','left');
            }else if($type='student'){
                $this->db->join('user_details_teacher','user_general.id=user_details_student.id','left');
            }
            if($id!=null){
                $this->db->where('user_general.id',$id);
            }
            $query = $this->db->get();
            return $id==null? $query->result() : $query->row();
    }
}
