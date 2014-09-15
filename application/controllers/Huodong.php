<?php
class Huodong extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('huodong_info');
  }

  public function index()
  {
    $query =  $this->huodong_info->get_all();
    echo json_encode($query->result());
   # foreach ($query->result() as $huodong)
   # {
   #   echo $huodong->id;
   #   echo $huodong->creator_id;
   #   echo $huodong->location;
   #   echo $huodong->begin_time;
   #   echo "\n";
   #   echo json_encode($huodong);
   # }
  }

  public function get()
  {
    $id = $_GET['id'];
    #echo "id:".$id;
    $query = $this->huodong_info->get_by_id($id);
    echo json_encode($query->result());
  }

  public function add()
  {
    echo "add";
    $get = $this->input->get('a');
    echo "geted:".$get;
    $post = $this->input->post('c');
    var_dump($_POST);
    echo file_get_contents('php://input');
    echo "posted:".$post;
    $data = json_decode(file_get_contents('php://input'), true);
    print_r($data);
    print_r($data['d']);
    var_dump($data);
  }

  public function update()
  {
    $data = json_decode(file_get_contents('php://input'), true);
    $huodong = $data[0];
    print_r($huodong);
    $data1 = array("id"=>1,"creator_id"=>10);
    $this->huodong_info->update($huodong);

    echo "ok";
  }
  public function insert()
  {
    $data = json_decode(file_get_contents('php://input'), true);
    $huodong = $data[0];
    print_r($huodong);

    $this->huodong_info->insert($huodong);

    echo "ok";
  }
  public function test($aaa)
  {
    echo $aaa;
  }
  public function view($slug)
  {
    $data['news_item'] = $this->news_model->get_news($slug);
  }
}
