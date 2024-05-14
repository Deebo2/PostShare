
# BlogCMS PHP Framework

A simple PHP framework based on CMS data structure 


## Features

- Light size project
- Bootstrap 5 based for UI
- CMS structure
- Cross platform
- Scalable framework


## Installation

```bash
  install the current repo localy 
```
    
## Configuration
First of all go to app/config/config.php and update your DB credentials
```bash
// Database Params
    define('DB_HOST', 'localhost');
    define('DB_USER', 'your_user_name');
    define('DB_PASS', 'your_password');
    define('DB_NAME', 'your_database_name');
//App root
    define('APPROOT', dirname(dirname(__FILE__)));
//URL root
    define('URLROOT', 'your_app_root_url');
//Site Name
    define('SITENAME', 'your_site_name');

```
## DB
The app/libraries/Database.php class manages the connection and interactions with DB based on PDO php extention 
## Controllers
Any controller class you will create at the 
```bash
app/controllers directory
```
 needs to extends the base controller class 
 ```bash 
 app/libraries/Controller.php
  ```
Because the Base Controller class will give you controller the ability to interact with views and models

## Models
You can create a new model at the 
```bash
app/models directory
```
- which allows you to instantiate a Database object and execute CRUD functionalities throw it's methods

- At you model class you need to instantiate Database class 
```bash
class Post{
    private $db;
    public function __construct()
    {
        $this->db = new Database;

    }
```
- then you can use the Database methods 
```bash
$this->db->query('MySQL query')
$this->db->bind(':title',data['title'])
$this->db->execute()
$post = $this->db->single()
$posts = $this->db->resultSet()
```
## views
- If you want your code to be consistent add a new dirctory at the 
```bash
app/views directory
```
with your controller name in lowercase like:
```bash
contorller: Posts.php
view: posts/
```
then add your html files and include the 
```bash
app/views/inc/header.php
app/views/inc/footer.php
```
in each of your views files like so:
```bash
<?php require APPROOT.'/views/inc/header.php'; ?>
// Your html content for this page
<?php require APPROOT.'/views/inc/header.php'; ?>
```


## Screenshots

![Home page](https://github.com/Deebo2/PostShare/blob/master/images/home.jpg)
![Login page](https://github.com/Deebo2/PostShare/blob/master/images/login.jpg)
![Register page](https://github.com/Deebo2/PostShare/blob/master/images/register.jpg)
![Posts page](https://github.com/Deebo2/PostShare/blob/master/images/posts.jpg)
![Post page](https://github.com/Deebo2/PostShare/blob/master/images/post.jpg)
![edit post page](https://github.com/Deebo2/PostShare/blob/master/images/edit-post.jpg)

