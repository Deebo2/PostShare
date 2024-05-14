<?php 
 class Posts extends Controller{
    private $postModel;
    private $userModel;
    public function __construct()
    {
        if(!isAuth()){
            redirect('users/login');
        }
        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');
    }
    public function index(){
        $posts=$this->postModel->getPosts();
        $data =[
            'posts' => $posts
        ];
        $this->view('posts/index',$data);
    }
    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //get the POST variable && sanitize it
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data=[
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'title_err' => '',
                'body_err' => ''
            ];
            //Validation
            if(empty($data['title'])){
                $data['title_err'] = 'Please enter the title';
            }
            if(empty($data['body'])){
                $data['body_err'] = 'Please enter the description';
            }
            //check for errors
            if(empty($data['title_err']) && empty($data['body_err'])){
                //Validated successfully
                if($this->postModel->addPost($data)){
                    flash('post_message','Post created successfully');
                    redirect('posts');
                }else{
                    die('something went wrong');
                }
            }else{
                //there is an error
                $this->view('posts/add',$data);
            }
        }else{
            $data = [
                'title' => '',
                'body' => ''
            ];
            $this->view('posts/add',$data);
        }
       
    }
    public function show($id){
        $post = $this->postModel->getPostById($id);
        $user = $this->userModel->getUserById($post->user_id);
        $data=[
            'post' => $post,
            'user' => $user
        ];
        $this->view('posts/show',$data);
    }
    public function edit($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //get the POST variable && sanitize it
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data=[
                'id' =>$id,
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'title_err' => '',
                'body_err' => ''
            ];
            //Validation
            if(empty($data['title'])){
                $data['title_err'] = 'Please enter the title';
            }
            if(empty($data['body'])){
                $data['body_err'] = 'Please enter the description';
            }
            //check for errors
            if(empty($data['title_err']) && empty($data['body_err'])){
                //Validated successfully
                if($this->postModel->updatePost($data)){
                    flash('post_message','Post Updated successfully');
                    redirect('posts/show/'.$id);
                }else{
                    die('something went wrong');
                }
            }else{
                //there is an error
                $this->view('posts/edit',$data);
            }
        }else{
            $post = $this->postModel->getPostById($id);
            if($post->user_id != $_SESSION['user_id']){
                redirect('posts');
            }
            $data = [
                'id' => $id,
                'title' => $post->title,
                'body' => $post->body
            ];
            $this->view('posts/edit',$data);
        }
       
    }
    public function destroy($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $post = $this->postModel->getPostById($id);
        if($post->user_id != $_SESSION['user_id']){
            redirect('posts');
        }
        if($this->postModel->destroyPost($id)){
            flash('post_message','Post deleted successfully');
            redirect('posts');
        }
      }
    }
 }