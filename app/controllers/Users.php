<?php 
    class Users extends Controller{
        private $userModel;
        public function __construct()
        {
            $this->userModel = $this->model('User');
            
        }
        //Register method
        public function register(){
            //check if post requerst
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Sanitize Post Data
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
                //DATA array
                $data=[
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                ];
                //Validate name
                if(empty($data['name'])){
                    $data['name_err'] = 'Please enter name';
                }
                //Validate email
                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter email';
                }else{
                    if($this->userModel->findUserByEmail($data['email'])){
                        $data['email_err'] = 'Email is already taken';
                    }
                }
                  //Validate password
                  if(empty($data['password'])){
                    $data['password_err'] = 'Please enter password';
                }elseif(strlen($data['password']) < 6){
                    $data['password_err'] = 'Password must be at least 6 characters';
                }
                 //Validate Confirm password
                 if(empty($data['confirm_password'])){
                    $data['confirm_password_err'] = 'Please confirm password';
                }elseif($data['password'] != $data['confirm_password']){
                    $data['confirm_password_err'] = 'Passwords do not match ';
                }
                //check if there are no errors
                if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                    //Validation succeded
                    //hash password
                    $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
                    //Register user to db
                    if($this->userModel->register($data)){
                    //Redirect to Login
                    flash('register_success','You are regisered successfully and you can login now .');
                    redirect('users/login');
                    }else{
                        die('Some thing went wrong with user registeration');
                    }
                }else{
                    //load view with errors 
                    $this->view('users/register',$data);
                }
                //process form request
            }else{
                //load register view && initialize date
                $data = [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                ];
                //Load view 
                $this->view('users/register',$data);
            }
        }
         //login method
         public function login(){
            //check if post requerst
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //process form request
                 //Sanitize Post Data
                 $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
                 //DATA array
                 $data=[
                     'email' => trim($_POST['email']),
                     'password' => trim($_POST['password']),
                     'email_err' => '',
                     'password_err' => ''
                 ];
                 //Validate email
                 if(empty($data['email'])){
                     $data['email_err'] = 'Please enter email';
                 }
                   //Validate password
                   if(empty($data['password'])){
                     $data['password_err'] = 'Please enter password';
                 }elseif(strlen($data['password']) < 6){
                     $data['password_err'] = 'Password must be at least 6 characters';
                 }
                 //Check if the email is valid
                 if($this->userModel->findUserByEmail($data['email'])){
                     //user found
                 }else{
                     $data['email_err'] = 'User not found';
                 }
                 //check if there are no errors
                 if(empty($data['email_err']) && empty($data['password_err'])){
                     //Validation succeded
                     //die('loged in successfully');
                     //check and set loggedin user
                     $loggedInUser = $this->userModel->login($data['email'],$data['password']);
                    if($loggedInUser){
                        //die('succss');
                        //Create the session
                        $this->createUserSession($loggedInUser);
                    }else{
                        $data['password_err']='Uncorrect password';
                        $this->view('user/login',$data);
                    }
                 }else{
                     //load view with errors 
                     $this->view('users/login',$data);
                 }
            }else{
                //load login view && initialize date
                $data = [
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => '',
                ];
                //Load view 
                $this->view('users/login',$data);
            }
        }
        public function logout(){
            unset($_SESSION['user_id']);
            unset($_SESSION['user_name']);
            unset($_SESSION['user_email']);
            session_destroy();
            redirect('users/login');
        }
        public function createUserSession($user){
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_name'] = $user->name;
            $_SESSION['user_email'] = $user->email;
            redirect('posts');
        }
       
    }