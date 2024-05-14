<?php 
 //Redirect to $page
 function redirect($page){
     header('location:'. URLROOT .'/'. $page);
 }
