<?php
class News extends CI_Controller {

  var $appid = "wxdd5d2f57bbdebb7a";
  var $secret = "85b87f15d5085b21e5aada4d59aba5c2";
  var $access_token = "";
  var $refresh_token = "";
  var $openid = "";

  public function __construct()
  {
    parent::__construct();
    $this->load->model('news_model');
  }

  public function index()
  {
    $data['news'] = $this->news_model->get_news();
    #echo $data['news']['id'];
    echo "hello";
  }

  public function view($slug)
  {
    $data['news_item'] = $this->news_model->get_news($slug);
  }

  public function weixinjieru()
  {
    $echoStr = $_GET["echostr"];

    echo $echoStr;

  }

  public function check()
  {
    #Header("Location:http://211.155.92.192/huodong");
    var_dump($_GET);
    $code = "";
    if (array_key_exists("code",$_GET))
      $code = $_GET["code"];
    $this->get_token_by_code($code);

    #jump
    $jump_base_url = "Location:http://211.155.92.192/";
    Header($jump_base_url."pages/test2?openid=".$this->openid); 
    #Header("Location:http://211.155.92.192/huodong");  
  }

  private function get_token_by_code($code)
  {
    #print_r($this->appid);
    #print_r($this->secret);
    #$code = "";
    #if (array_key_exists("code",$_GET))
    #  $code = $_GET["code"];
    #$code = "006a510bfc74c2cfc43880f2ffd6f2f1";
    $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$this->appid."&secret=".$this->secret."&code=".$code."&grant_type=authorization_code";
    #print_r($url);
    $re=file_get_contents($url);
    #print_r($re);
    $result = json_decode($re,true);
    $this->access_token = $result['access_token'];
    $this->refresh_token = $result['refresh_token'];
    $this->openid = $result['openid'];
    #print_r($this->openid);
  }
}
