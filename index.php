<?php
    
    //Default load
	require __dir__."/config.php";
    require __dir__.'/libs/Smarty.class.php';


    $url = isset($_SERVER['PATH_INFO']) ? explode("/",ltrim($_SERVER['PATH_INFO'],'/')) : "/";

   
    if($url=="/"){ //Loading Default controller

        if(file_exists(__dir__."/controller/".DEFAULT_CONTROLLER."_controller.php")){

            require __dir__."/controller/".DEFAULT_CONTROLLER."_controller.php";
            $controller_name = DEFAULT_CONTROLLER."Controller";
            $cntl= new $controller_name();
            $cntl->index();
        }else{
            header('HTTP/1.1 404 Not Found');
            die("$controller_name - Controller not found");
        }
         
    }else{
    	
    	$controller_name=$url["0"];
        $method_name=isset($url["1"])? $url["1"] : '';


    	if(file_exists(__dir__."/controller/".$controller_name."_controller.php")){

    		require __dir__."/controller/".$controller_name."_controller.php";
    		$cntl = $controller_name."Controller";
    		$obj1 = new $cntl();

            if($method_name!=''){
                if(method_exists($obj1,$method_name)){
                    $obj1->$method_name();
                }else{
                    header('HTTP/1.1 404 Not Found');
                    die("$method_name method- Not available");
                }
            }else{
                $obj1->index();
            }


    	}else{
    		header('HTTP/1.1 404 Not Found');
    		die("$controller_name - Controller not found");
    	}	

    }

?>