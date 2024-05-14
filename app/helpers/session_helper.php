<?php 
    session_start();
    //Flash message helper
    function flash($name,$message = '',$class = 'alert alert-success'){
        if(!empty($name)){
            //in case you use flash function as a setter(in the controller side)
            if(!empty($message)){
                //initialize session vars
                if(!empty($_SESSION[$name])){
                    unset($_SESSION[$name]);
                }
                if(!empty($_SESSION[$name.'_class'])){
                    unset($_SESSION[$name.'_class']);
                }
                //set session vars
                $_SESSION[$name] = $message;
                $_SESSION[$name.'_class'] = $class;
             }elseif(empty($message) && !empty($_SESSION[$name]) && !empty($_SESSION[$name.'_class'])){
                 //in case use flash function as a gitter(in the view)
                 echo '<div class="'.$_SESSION[$name.'_class'].'" id="msg-flash" >'.$_SESSION[$name].'</div>';
                 //unset session vars
                 unset($_SESSION[$name]);
                 unset($_SESSION[$name.'_class']);
             }
        }
    }
  function isAuth(){
        if(isset($_SESSION['user_id'])){
            return true;
        }else{
            return false;
        }
    }