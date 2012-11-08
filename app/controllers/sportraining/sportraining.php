<?php
require_once("lib/controller.php"); // BaseController


class SportrainingController extends BaseController
{
	function __construct()
	{
		$this->session_set("controller", "sportraining");
	}

	// Views
	public function index()
	{
		
		$this->render_view("index", NULL);
        
	}
	
	public function documentation()
	{
		
		include("static/documentation.php");
        
	}
	
	public function auth()
	{
		
		include("lib/auth.php");
        
	}
	
		public function delete_user()
	{
		
		include("lib/delete_user.php");
        
	}
	
	public function moncompte()
	{
		
		$this->render_view("moncompte", NULL);
		
	}
	
	public function deconnexion()
	{
		
		include("lib/deconnexion.php");
        
	}
	
	public function connexion()
	{
		
		$this->render_view("connexion", NULL);
		
	}
	
	public function adduser()
	{
		
		$this->render_view("adduser", NULL);
		
	}
	
	public function adduserfct()
	{
		
		include("lib/adduserfct.php");
        
	}

	public function addseance($task, $date)
	{
		
	
		
	}
	
		public function addtraining()
	{
		
		$this->render_view("addtraining", NULL);
		
	}
	
			public function addtraining_tot()
	{
		
		$this->render_view("addtraining_tot", NULL);
		
	}
	
	public function addtrainingfct()
	{
		
		include("lib/addtrainingfct.php");
        
	}
	
		public function calendrier($year, $month, $day)
	{
		$params[0] = $year;
		$params[1] = $month;
		$params[2] = $day;
		$this->render_view("calendrier",$params);
		
	}
		public function stats()
	{
		
		$this->render_view("stats", NULL);
		
	}
}

?>
