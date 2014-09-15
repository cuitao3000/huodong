<?php

class Pages extends CI_Controller {

  public function view($page = 'home')
  {
	$arr = array ('name'=>'cuitao','approved'=>true,'city'=>'beijing','id'=>1234,'company'=>'baidu');
	echo json_encode($arr);
  }

  public function index()
  {
#	if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
#  	{
#    		show_404();
#  	}			
	echo "hello";
  Header("Location:http://211.155.92.192/huodong");
  }

  public function test()
  {
    $url='https://api.weixin.qq.com/sns/oauth2/access_token?appid=wxdd5d2f57bbdebb7a&secret=85b87f15d5085b21e5aada4d59aba5c2&code=00581c6bc4ebcb4a90142a42a9e0218d&grant_type=authorization_code';
    $re=file_get_contents($url);
    print_r($re);
  }

  public function test2()
  {
    print_r($_GET);
  }
}

