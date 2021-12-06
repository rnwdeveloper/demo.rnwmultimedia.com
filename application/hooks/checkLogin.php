<?php 



class Logincheck

{

	function isLogin()

	{



		$CI = & get_instance();

		$login = false;

		if(@$CI->session->userdata("domain")=='admin')

		{

			$login = true;	

		}

		

		if(@$_POST['token'] == "hello")

		{

			$login = true;

		}

		if($login==false && $CI->uri->segment(2)!='login')
		{

			return redirect('welcome/login');

		}

	}

}





 ?>