<?php

class Pages extends Controller
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
    }

    public function index()
    {
        if(isAuth()){
            redirect('posts');
        }
        $this->view('pages/index', [
            'title' => 'welcome to SharePosts',
            'description' => 'Simple social network build on DeeboMVC php framework'
        ]);
    }

    public function about()
    {
        $this->view('pages/about', [
            'title' => 'About SharePosts ',
            'description' => 'To share posts with other users'
        ]);
    }
}
