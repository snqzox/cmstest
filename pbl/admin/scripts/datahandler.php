<?php
session_start();

function data_handler($page,$dbaction,$dataid){


  
  require_once('config.php');
  
  $res = connect();
  $page_name=$page;
  $action = $dbaction;
  
  $title_set = isset($_POST['title']) ? $_POST['title'] : '';
  $subtitle_set = isset($_POST['subtitle']) ? $_POST['subtitle'] : '';
  $content_set = isset($_POST['content']) ? $_POST['content'] : '';
  $id_set = isset($_POST['id']) ? $_POST['id'] : '';
  $subject_set = isset($_POST['subject']) ? $_POST['subject'] : '';
  $client_set = isset($_POST['client']) ? $_POST['client'] : '';
  $price_set = isset($_POST['price']) ? $_POST['price'] : '';
  $costs_set= isset($_POST['costs']) ? $_POST['costs'] : '';
  $pd_set = isset($_POST['pd']) ? $_POST['pd'] : '';
  $investition_set = isset($_POST['investition']) ? $_POST['investition'] : '';
  $email_set = isset($_POST['email']) ? $_POST['email'] : '';
  $mobile_set = isset($_POST['mobile']) ? $_POST['mobile'] : '';
  $company_set = isset($_POST['company']) ? $_POST['company'] : '';
  $address_set = isset($_POST['address']) ? $_POST['address'] : '';
  $psc_city_set = isset($_POST['psc_city']) ? $_POST['psc_city'] : '';
  $ic_set = isset($_POST['ic']) ? $_POST['ic'] : '';
  $dic_set = isset($_POST['dic']) ? $_POST['dic'] : '';
  

  $page_name = $page;
  $title=test_input($title_set);
  $subtitle=test_input($subtitle_set);
  $content=test_input($content_set);
  $id=test_input($id_set);
  $subject=test_input($subject_set);
  $client=test_input($client_set);
  $price=test_input($price_set);
  $costs=test_input($costs_set);
  $pd=test_input($pd_set);
  $investition=test_input($investition_set);
  
  $email=test_input($email_set);
  $mobile=test_input($mobile_set);
  $company=test_input($company_set);
  $address=test_input($address_set);
  $ic=test_input($ic_set);
  $dic=test_input($dic_set);
  $psc_city=test_input($psc_city_set);




  switch($page_name){

      case "article":

        if (strcmp($action, "update") == 0){
        
          $sql = "UPDATE articles SET title='$title', content='$content' WHERE ID='$id'";  
          $result = mysqli_query($res,$sql) or die("Unable to update article");
          fileupload($id);
          header('Location: http://localhost/cmstest/pbl/admin/page-articles.php');

          return $result;
        }
          else if (strcmp($action, "select") == 0){
              if ($dataid != ''){
                    
                      $sql = "SELECT * FROM articles WHERE ID = '$dataid'" or die ("Unable to join tables!");
            }
            else {
              
                      $sql = "SELECT * FROM articles" or die ("Unable to join tables!");
            }    

            $result = mysqli_query($res,$sql) or die ("Unable to get data for editation!");
            
            return $result;
            }
              else if (strcmp($action, "delete") == 0){
               deleteAttachments($dataid);               
                $sql = "DELETE FROM articles WHERE ID = '$dataid'" or die ("Unable to delete attachments!");
                $result = mysqli_query($res,$sql) or die ("Unable to delete attachments!");
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
      
      case "page_about":

        if (strcmp($action, "update") == 0){
              $sql = "UPDATE pageabout SET title='$title', subtitle='$subtitle', content='$content' WHERE ID=5";
              $result = mysqli_query($res,$sql) or die ("Unable to LOAD data!");
              header('Location: http://localhost/cmstest/pbl/admin/page-about.php');
              return $result;
        }        
        break;
     
      case "page_references":

        if (strcmp($action, "update") == 0){
              $sql = "UPDATE  pagereferences SET title='$title', subtitle='$subtitle' WHERE ID=5";
              $result = mysqli_query($res,$sql) or die ("Unable to LOAD data!");
              header('Location: http://localhost/cmstest/pbl/admin/page-references.php');
              return $result;
        }
            else if (strcmp($action, "select") == 0){
              $sql = "SELECT * FROM pagereferences WHERE ID=5";
              $result = mysqli_query($res,$sql) or die ("Unable to LOAD data!");
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

      case "subsidies":

           if (strcmp($action, "select") == 0){
          
                      if ($dataid != ''){
                              
                                $sql = "SELECT * FROM subsidies WHERE ID = '$dataid'" or die ("Unable to join tables!");
                      }
                      else {
                        
                                $sql = "SELECT * FROM subsidies" or die ("Unable to join tables!");
                      }  

                       $result = mysqli_query($res,$sql) or die ("Unable to SELECT subsidies records!");
                        return $result;
                    }    
            
            else if (strcmp($action, "update") == 0){
           
                $sql = "UPDATE subsidies SET title='$title', subject='$subject', client='$client', price='$price', content='$content'  WHERE ID= $id";
                $result = mysqli_query($res,$sql) or die ("Unable to UPDATE page services!");
                header('Location: http://localhost/cmstest/pbl/admin/page-references.php');
                return $result;
            }     
                 else if (strcmp($action, "create") == 0){
               
                    $sql = "INSERT INTO subsidies (title, subject, client, price, content, page_id) VALUES ('$title', '$subject', '$client', '$price', '$content', 5)";
                    $result = mysqli_query($res,$sql) or die ("Unable to UPDATE subsidies!");
                    header('Location: http://localhost/cmstest/pbl/admin/page-references.php');
                    return $result;
                }
                      else if (strcmp($action, "delete") == 0){
                     
                          $sql = "DELETE FROM subsidies WHERE ID = '$dataid'" or die ("Unable to delete attachments!");
                          $result = mysqli_query($res,$sql) or die ("Unable to UPDATE subsidies!");
                         // header('Location: http://localhost/cmstest/pbl/admin/page-references.php');
                          return $result;
                      }

          break;
      
      case "activities":

           if (strcmp($action, "select") == 0){
          
                if ($dataid != ''){
                              
                                $sql = "SELECT * FROM activities WHERE ID = '$dataid'" or die ("Unable to join tables!");
                      }
                      else {
                        
                                $sql = "SELECT * FROM activities" or die ("Unable to select from activities!");
                      }




              $result = mysqli_query($res,$sql) or die ("Unable to SELECT activities records!");
              return $result;
          }    
            
              else if (strcmp($action, "update") == 0){
             
                  $sql = "UPDATE activities SET title='$title',client='$client',investition='$investition',content='$content' WHERE ID=$id";
                  $result = mysqli_query($res,$sql) or die ("Unable to UPDATE activities!");
                  header('Location: http://localhost/cmstest/pbl/admin/page-references.php');
                  return $result;
              }

                 else if (strcmp($action, "delete") == 0){
                 
                      $sql = "DELETE FROM activities WHERE ID = '$dataid'" or die ("Unable to delete activity!");
                      $result = mysqli_query($res,$sql) or die ("Unable to delete activity!");
                     // header('Location: http://localhost/cmstest/pbl/admin/page-references.php');
                      return $result;
                  } 
                     else if (strcmp($action, "create") == 0){
               
                    $sql = "INSERT INTO activities (title, client, investition, content, page_id) VALUES ('$title', '$client', '$investition', '$content', 5)";
                    $result = mysqli_query($res,$sql) or die ("Unable to UPDATE activvities!");
                    header('Location: http://localhost/cmstest/pbl/admin/page-references.php');
                    return $result;
                }
          break;
      
     case "studios":

           if (strcmp($action, "select") == 0){
          
                    if ($dataid != ''){
                              
                                $sql = "SELECT * FROM studios WHERE ID = '$dataid'" or die ("Unable to join tables!");
                      }
                      else {
                        
                                $sql = "SELECT * FROM studios" or die ("Unable select from studios!");
                      }  


              $result = mysqli_query($res,$sql) or die ("Unable to SELECT studios records!");
              return $result;
          }    
            
            else if (strcmp($action, "update") == 0){
           
                $sql = "UPDATE studios SET title='$title', client='$client', costs='$costs', pd='$pd', content='$content'  WHERE ID=$id";
                $result = mysqli_query($res,$sql) or die ("Unable to UPDATE page services!");
                header('Location: http://localhost/cmstest/pbl/admin/page-references.php');
                return $result;
          }     


           else if (strcmp($action, "delete") == 0){
           
                $sql = "DELETE FROM studios WHERE ID = '$dataid'" or die ("Unable to delete activity!");
                $result = mysqli_query($res,$sql) or die ("Unable to delete activity!");
               // header('Location: http://localhost/cmstest/pbl/admin/page-references.php');
                return $result;
            } 

                else if (strcmp($action, "create") == 0){
               
                    $sql = "INSERT INTO studios (title, client, costs, PD,content, page_id) VALUES ('$title', '$client', '$costs', '$pd', '$content', 5)";
                    $result = mysqli_query($res,$sql) or die ("Unable to UPDATE studios!");
                    header('Location: http://localhost/cmstest/pbl/admin/page-references.php');
                    return $result;
                }

          break;

      case "defaultrefs":

           if (strcmp($action, "select") == 0){
          
             if ($dataid != ''){
                              
                                $sql = "SELECT * FROM defaultrefs WHERE ID = '$dataid'" or die ("Unable to join tables!");
                      }
                      else {
                        
                                $sql = "SELECT * FROM defaultrefs" or die ("Unable select from studios!");
                      }  



              $result = mysqli_query($res,$sql) or die ("Unable to SELECT defaultrefs records!");
              return $result;
          }    
            
            else if (strcmp($action, "update") == 0){
           
                $sql = "UPDATE defaultrefs SET title='$title',subtitle='$subtitle',content='$content' WHERE ID=$id";
                $result = mysqli_query($res,$sql) or die ("Unable to UPDATE page services!");
                header('Location: http://localhost/cmstest/pbl/admin/page-references.php');
                return $result;
          }       
              else if (strcmp($action, "delete") == 0){
             
                  $sql = "DELETE FROM defaultrefs WHERE ID = '$dataid'" or die ("Unable to delete reference!");
                  $result = mysqli_query($res,$sql) or die ("Unable to delete reference!");
                 // header('Location: http://localhost/cmstest/pbl/admin/page-references.php');
                  return $result;
              } 
                   else if (strcmp($action, "create") == 0){
                 
                      $sql = "INSERT INTO defaultrefs (title, subtitle, content, page_id) VALUES ('$title', '$subtitle', '$content', 5)";
                      $result = mysqli_query($res,$sql) or die ("Unable to UPDATE studios!");
                      header('Location: http://localhost/cmstest/pbl/admin/page-references.php');
                      return $result;
                  }   


          break;

      case "contact":

           if (strcmp($action, "select") == 0){
          
              $sql = "SELECT * FROM contact";
              $result = mysqli_query($res,$sql) or die ("Unable to SELECT page services content!");
              return $result;
          }    
            
            else if (strcmp($action, "update") == 0){
           
                $sql = "UPDATE contact SET email='$email',mobile='$mobile',company='$company',address='$address',psc_city='$psc_city',ic='$ic',dic='$dic' WHERE ID=5";
                $result = mysqli_query($res,$sql) or die ("Unable to UPDATE page contact!");
                header('Location: http://localhost/cmstest/pbl/admin/page-contact.php');
                return $result;
          }        
          break;

      case "attachments":

           if (strcmp($action, "select") == 0){

              $sql = "SELECT * FROM attachments WHERE article_id = '$dataid'";
              $result = mysqli_query($res,$sql) or die ("Unable to UPLOAD attachments!");
              return $result;
              
              }    
               else if (strcmp($action, "delete") == 0){
                    
                    $art = getArtIDfromAttach($dataid);
                    $title = getObjectTitle('attachments',$dataid);
                   /* $id_art = $dataiad;
                    $articleID = getArtIDfromAttach($id_art);     */   
                    //$articleID = 87;
                    echo 'http://localhost/cmstest/pbl/admin/article-edit.php?edit=' . $art . ' <br>IDDEEE:' . $dataid ;
                    $sql = "DELETE FROM attachments WHERE ID = '$dataid'";
                    $result = mysqli_query($res,$sql) or die ("Unable to UPLOAD attachments!");
                    unlink("uploads/" . $title);
                    header('Location: http://localhost/cmstest/pbl/admin/article-edit.php?edit=' . $art);
                    
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
      $path = "uploads/". $name;
      //limit file size on 3 MB
      $size = $_FILES['files']['size'][$i];

    if ($_FILES['files']['error'][$i] === UPLOAD_ERR_OK) {

      
    if($size > 3000000){  

              $error='Size of file ' . $name . ' must be less than 3MB ';
              $_SESSION["error_message"] = $error; 
              //die($error . 'Click <a href="http://localhost/cmstest/pbl/admin/article-edit.php?edit=' . $article_id . '">here</a> to go back.');      
              
              header('Location: http://localhost/cmstest/pbl/admin/article-edit.php?edit=' . $article_id);
              die();
      }
        else {
              
              $sql = "INSERT INTO attachments (title, whole_path, article_id,size,type) VALUES ('$name','$path','$article_id','$size','TYP')" or die ('Unable to abs(number)ttachments!');
              $result = mysqli_query($res,$sql) or die ("Unable to UPLOAD attachments!");
              //die ('File ' . $name . ' was sucessfully uploaded!<br> TOTAL:' . $total . '<br>i = '.$i);
              $file_tmp =$_FILES['files']['tmp_name'][$i];
              move_uploaded_file($file_tmp,"uploads/".$name);
              $_SESSION["error_message"] = ''; 
              //die();
        }     
       // echo 'File ' . $name . ' has less than 5MB (server settings)!<br> TOTAL:' . $total . '<br>i = '. $i . '<br>SIZE :' . $size . '<br>ERROR: ' . $error . ' <br><br>';


    } 

      else if ($_FILES['files']['error'][$i] === UPLOAD_ERR_INI_SIZE){

             $error='ERROR Size of file ' . $name . ' must be less than 3MB ';
             $_SESSION["error_message"] = $error; 
       
             header('Location: http://localhost/cmstest/pbl/admin/article-edit.php?edit=' . $article_id);
             die();

      }
        else {
             
           //  echo "Attachments must be smaller than 4 MB. <br>Upload failed with error code " . $_FILES['files']['error'][$i] . '<br> TOTAL:' . $total;

      // die("Attachments must be smaller than 4 MB. <br>Upload failed with error code " . $_FILES['files']['error'][$i] . '<br> TOTAL:' . $total);
       }
   }
}

function getArtIDfromAttach ($attach_id){

  require_once('config.php'); 
  $res  = connect();


  $sql = "SELECT article_id FROM attachments WHERE ID = '$attach_id'";
  $result = mysqli_query($res,$sql) or die ("Unable select article id");

  while ($row = mysqli_fetch_array($result)){


    $article_id2 = $row['article_id'];

    return $article_id2;
  }


}

//pass function table name and record ID to get record title
function getObjectTitle($table_name,$attach_id){

  echo "<br>TABLEEE:". $table_name ."<br> and ID:". $attach_id;

  require_once('config.php'); 
  $res  = connect();

  $sql = "SELECT title FROM $table_name WHERE ID = '$attach_id'";

   $result = mysqli_query($res,$sql) or die ("Unable get attachments title!");

   

  while ($row = mysqli_fetch_array($result)){


    $article_title = $row['title'];

    return $article_title;
  }

}

//function deletes attachments once an article is erased
function deleteAttachments($article_id){

  require_once('config.php'); 
  $res  = connect();

  $sql = "SELECT title FROM attachments WHERE article_id = '$article_id'";

  $result = mysqli_query($res,$sql) or die ("Unable select article id");

  while ($row = mysqli_fetch_array($result)){   


    $article_title = $row['title'];
    unlink("uploads/" . $article_title);

    
  } 
}