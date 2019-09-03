<?php

class homeController{

	function __construct(){
		
	}

	function index(){
		echo "loading the index";
	}

	function test1(){
	
		$smarty = new Smarty;
 
		$smarty->assign("page_title", "Hello PHPGang!!");
		$smarty->assign("page_content", "This is PHPGang Smarty template demo content");
		 
		$smarty->display('./view/sample.tpl');
	}

	function test2(){
	
		$smarty = new Smarty;
 
		$smarty->assign("page_title", "Hello PHPGang!!");
		$smarty->assign("page_content", "This is PHPGang Smarty template demo content");
		 
		$smarty->display('./view/test2.tpl');
	}

}

?>
