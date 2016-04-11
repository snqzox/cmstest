<?php

function data_handler($page,$dbaction,$dataid){
  
  require_once('config.php'); 
  
  $res = connect();
  $page_name=$page;
  $action = $dbaction;
  
  $title_set = isset($_POST['title']) ? $_POST['title'] : '';
  $subtitle_set = isset($_POST['subtitle']) ? $_POST['subtitle'] : '';
  $content_set = isset($_POST['content']) ? $_POST['content'] : '';
  $id_set = isset($_POST['id']) ? $_POST['id'] : '';
  

  $page_name = $page;
  $title=test_input($title_set);
  $subtitle=test_input($subtitle_set);
  $content=test_input($content_set);
  $id=test_input($id_set);

  switch($page_name){

      case "article":

        if (strcmp($action, "update") == 0){
        
          $sql = "UPDATE articles SET title='$title', content='$content' WHERE ID='$id'";  
          $result = mysqli_query($res,$sql) or die("Unable to update article");
         // fileupload($id);
          header('Location: http://localhost/cmstest/pbl/admin/page-articles.php');

          return $result;
        }
          else if (strcmp($action, "select") == 0){
              if ($dataid != ''){
                    
                      $sql = "SELECT * FROM articles WHERE id = '$dataid'" or die ("Unable to join tables!");
            }
            else {
              
                      $sql = "SELECT * FROM articles" or die ("Unable to join tables!");
            }    

            $result = mysqli_query($res,$sql) or die ("Unable to get data for editation!");
            
            return $result;
            }
              else if (strcmp($action, "delete") == 0){
                
                $sql = "DELETE FROM articles WHERE ID = '$dataid'" or die ("Unable to delete articles!");
                $result = mysqli_query($res,$sql) or die ("Unable to get data for editation!");
            
                return $result;
              }
                 else if (strcmp($action, "create") == 0){
                
                    $sql = "INSERT INTO articles (title, content, subservice_id) VALUES ('$title', '$content', '$dataid')";  
                    $result = mysqli_query($res,$sql) or die("Unable to create record");
                    header('Location: http://localhost/cmstest/pbl/admin/page-articles.php'); 
                    
                    return $result;
                  }
              break;

      case "page_main":

        if (strcmp($action, "update") == 0){
              $sql = "UPDATE pagemain SET title='$title', subtitle='$subtitle' WHERE ID=5";
              $result = mysqli_query($res,$sql) or die ("Unable to LOAD data!");
              header('Location: http://localhost/cmstest/pbl/admin/page-main.php');
              return $result;
        }        
        break;
    
      case "service":

        if (strcmp($action, "select") == 0){  
             
              if ($dataid != ''){
           
                  $sql = "SELECT * FROM services WHERE ID = '$dataid'";
              }
               else {
           
                  $sql = "SELECT * FROM services";
               } 
             
              $result = mysqli_query($res,$sql) or die ("Unable to LOAD data!");
             
              return $result;
        }  
          else  if (strcmp($action, "update") == 0){
             
                $sql = "UPDATE services SET title='$title', subtitle='$subtitle', content = '$content' WHERE ID= '$id'";
                $result = mysqli_query($res,$sql) or die ("Unable to UPDATE service!");
                header('Location: http://localhost/cmstest/pbl/admin/page-services.php');
                return $result;
          
          }        
        break;
    
      case "articles_sub":

        if (strcmp($action, "select") == 0){
              $sql = "SELECT * FROM articles WHERE subservice_id = '$dataid' ";
              $result = mysqli_query($res,$sql) or die ("Unable to LOAD data!");
              return $result;
        }          
         break;
      
      case "page_services":

           if (strcmp($action, "select") == 0){
          
              $sql = "SELECT * FROM pageservices";
              $result = mysqli_query($res,$sql) or die ("Unable to SELECT page services content!");
              return $result;
          }    
            
            else if (strcmp($action, "update") == 0){
           
                $sql = "UPDATE pageservices SET title='$title' WHERE ID=5";
                $result = mysqli_query($res,$sql) or die ("Unable to UPDATE page services!");
                header('Location: http://localhost/cmstest/pbl/admin/page-services.php');
                return $result;
          }        
          break;
      
      case "attachments":

           if (strcmp($action, "select") == 0){
        
              $sql = "SELECT * FROM attachments WHERE article_id = '$dataid'";
              $result = mysqli_query($res,$sql) or die ("Unable to UPLOAD attachments!");
              return $result;
              
              }    
                    
         
           break;
  }
}

function fileupload($article_id){

    require_once('config.php'); 

    $res  = connect();
    $total = count($_FILES['files']['name']);

    for ($i=0; $i < $total; $i++){

      $name = $_FILES['files']['name'][$i];
      $path = "../uploads/". $name;
      //limit file size on 3 MB

    if ($_FILES['files']['error'][$i] === UPLOAD_ERR_OK) {
      
      $size = $_FILES['files']['size'][$i];


    if($size > 4000000){  

              $error='Size of file ' . $name . ' must be less than 4MB ';
              die($error . 'Click <a href="http://localhost/cmstest/pbl/admin/article-edit.php?edit=' . $article_id . '">here</a> to go back.');
              break;
         
      }
        else {
              
              $sql = "INSERT INTO attachments (title, whole_path, article_id,size) VALUES ('$name','$path','$article_id','$size')" or die ('Unable to upload attachments!');
              $result = mysqli_query($res,$sql) or die ("Unable to UPLOAD attachments!");
              echo 'File ' . $name . ' was sucessfully uploaded!<br>';
        } 


    } else {
       die("Attachments must be smaller than 4 MB. <br>Upload failed with error code " . $_FILES['files']['error'][$i]);
    }
   }
}
