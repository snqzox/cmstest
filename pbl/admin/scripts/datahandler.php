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
          header('Location: http://localhost/cmstest/pbl/admin/page-articles.php');
        
          return $result;
        }
          else if (strcmp($action, "select") == 0){
            
            $sql = "SELECT * FROM articles WHERE id = '$dataid'" or die ("Unable to join tables!");
            $result = mysqli_query($res,$sql) or die ("Unable to get data for editation!");
            
            return $result;
            }
              else if (strcmp($action, "delete") == 0){
                $sql = "DELETE FROM articles WHERE ID = '$dataid'" or die ("Unable to delete articles!");
                $result = mysqli_query($res,$sql) or die ("Unable to get data for editation!");
            
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
    
      case "articles_attach":

        if (strcmp($action, "select") == 0){
              $sql = "SELECT attachments.id attId, attachments.title attTitle, attachments.article_id attArticle,articles.id artId,articles.title artTitle,articles.subservice_id artSubSer FROM articles LEFT JOIN attachments ON articles.id=attachments.article_id WHERE articles.subservice_id = '$dataid'";
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
  }
}