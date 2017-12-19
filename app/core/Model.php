<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require "system/core/Model.php";
class Model extends CI_Model {

	public function __construct(){
			parent::__construct();
	}
	public function find($parameter = null, $return = 'multi', $limit = PHP_INT_MAX){
		$table = strtolower(get_class($this));
		$result;
		if(is_array($parameter) && $parameter!=null){
			$result = $this->db->get_where($table,$parameter,$limit);
		}else if(!is_array($parameter) && $parameter!=null){
			$result = $this->db->get_where($table,$parameter,$limit);
		}else{
			$result = $this->db->get($table,$limit);
		}
		return $return == 'multi' ? $result->result($table) : $result->row();
	}
	public function remove($parameter=null){
		$table = strtolower(get_class($this));
		$this->db->delete($table, $parameter); 
		return true;
	}
	public function save($object = null){
		$table = strtolower(get_class($this));
		$result;
		if($object!=null){
			if($object->id==null){
				$this->db->insert($table,$object);
				$result = true;
				return true;
			}else{
				$this->db->where('id',$object->id);
				$this->db->update($table,$object);
			return true;
			}
		}else{
			if($this->id==null){
				$this->db->insert($table,$this);
				$result = true;
				return true;
			}else{
				$this->db->where('id',$this->id);
				$this->db->update($table,$this);
			return true;
			}
		}
	}
	public function transaction(...$query){
		$this->db->trans_begin();
		foreach($query as $q){
			$this->db->query($q);
		}
		return $this->db->trans_complete();
	}
	public function executeQuery($query,$return = 'multi'){
		$result = $this->db->query($query);
		return $return == 'multi' ? $result->result() : $result->row();
	}
	public function findLastId(){
		$table = strtolower(get_class($this));
		$result;
		$this->db->select_max('id');
		$query = $this->db->get($table);
		$result = $query->row();
		$id_max = $query->num_rows() == 0 ? 1 : ((int)$result->id + 1);
		return $id_max;
	}
	public function count($parameter=null){
		$table = strtolower(get_class($this));
		$result;
		$this->db->select('id');
		if($parameter!=null){
			$this->db->where($parameter);
		}
		$this->db->from($table);
		$query = $this->db->count_all_results() ;
		return $query;
	}
}
