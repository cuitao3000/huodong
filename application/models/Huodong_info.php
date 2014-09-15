<?php
class Huodong_info extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }

  public function get_all(){
    $sql = "select * from huodong_info limit 10000";
    $query = $this->db->query($sql);
    
    return $query;
  }

  public function get_by_id($id) 
  {
    $sql = "select * from huodong_info where id=?";
    $query = $this->db->query($sql,array($id));

    return $query;
  }

  public function update($huodong)
  {
    $where = "id = ".$huodong['id'];
    $sql = $this->db->update_string('huodong_info',$huodong,$where);
    print_r($sql);

    $query = $this->db->query($sql);
    return $query;
  }

  public function insert($huodong)
  {
    $sql = $this->db->insert_string('huodong_info',$huodong);
    print_r($sql);

    $query = $this->db->query($sql);

    return $query;
  }
}
