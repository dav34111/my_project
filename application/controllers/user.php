<?php 

class User extends Controller{
	
	public function index(){
		$this->load_view('viewuser');
	}

	public function login(){
			
		if (isset($_POST['login']) && isset($_POST['pass'])) {
			$this->load_model('user_model');
			$a = $this->user_model->check($_POST['login'], $_POST['pass']);

			if( $a!=0 ){
				$data['inf'] = $this->user_model->city();
				$this->load_view('homepage', $data );
			}
			else{
				session_start();
				//$this->load_view('viewuser', array('msg'=>'<h1>Sxal Tvyalner</h1>'));
				$_SESSION['msg'] = '<h1>ERROR: TRY AGAIN</h1>';
				//header("Location:".$_SERVER['HTTP_REFERER']);
				header("Location:/Praktika11MVC");

			}
		
		}
	}

	public function add(){
		if ( isset($_POST['c_name']) && isset($_POST['c_code']) && isset($_POST['c_district']) && isset($_POST['c_polulation']) && trim($_POST['c_name'])!='' && trim($_POST['c_code'])!='' && trim($_POST['c_district'])!='' && trim($_POST['c_polulation'])!='') {
			$this->load_model('user_model');
			$this->user_model->add_info($_POST['c_name'], $_POST['c_code'], $_POST['c_district'], $_POST['c_polulation']);
		}

	}

	public function update(){
		if ( isset( $_POST['new_name'] ) ) {
			$this->load_model('user_model');
			$this->user_model->update($_POST['id'], $_POST['new_name'], $_POST['new_code'], $_POST['new_dist'], $_POST['new_pop']);
		}
	}

	public function delete(){
		if( isset($_POST['id']) ){
			$this->load_model('user_model');
			$this->user_model->remove($_POST['id']);
		}
	}

}




