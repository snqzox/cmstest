<?php
ini_set('session.save_path', '../tmp');
session_start();
define("HOST", "http://localhost/cmstest/pbl/admin/");

if(!$_SESSION['logged']){
    header("location: login.php");
    exit();
}

function data_handler($page,$dbaction,$dataid,$attachParent){


  
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
          fileupload($id,'article_id');
          header('Location: ' . HOST . 'article-detail.php?edit=' . $id);

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
               deleteAttachments($dataid,'article_id');               
                $sql = "DELETE FROM articles WHERE ID = '$dataid'" or die ("Unable to delete attachments!");
                $result = mysqli_query($res,$sql) or die ("Unable to delete attachments!");
                return $result;
              }
                 else if (strcmp($action, "create") == 0){
                    $sql = "INSERT INTO articles (title, content, subservice_id) VALUES ('$title', '$content', '$dataid')";  
                    $result = mysqli_query($res,$sql) or die("Unable to create record");
                    fileupload('article','article_id');
                    header('Location: ' . HOST . 'page-articles.php'); 
                    
                    return $result;
                  }
              break;

      case "page_main":

        if (strcmp($action, "update") == 0){
              $sql = "UPDATE pageMain SET title='$title', subtitle='$subtitle' WHERE ID=5";
              $result = mysqli_query($res,$sql) or die ("Unable to LOAD data!");
              header('Location: ' . HOST . 'page-main.php');
              return $result;
        }        
        break;
      
      case "page_about":

        if (strcmp($action, "update") == 0){
              $sql = "UPDATE pageAbout SET title='$title', subtitle='$subtitle', content='$content' WHERE ID=5";
              $result = mysqli_query($res,$sql) or die ("Unable to LOAD data!");
              header('Location: ' . HOST . 'page-about.php');
              return $result;
        }        
        break;
     
      case "page_references":

        if (strcmp($action, "update") == 0){
              $sql = "UPDATE  pageReferences SET title='$title', subtitle='$subtitle' WHERE ID=5";
              $result = mysqli_query($res,$sql) or die ("Unable to LOAD data!");
              header('Location: ' . HOST . 'page-references.php');
              return $result;
        }
            else if (strcmp($action, "select") == 0){
              $sql = "SELECT * FROM pageReferences WHERE ID=5";
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
                header('Location: ' . HOST . 'page-services.php');
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
          
              $sql = "SELECT * FROM pageServices";
              $result = mysqli_query($res,$sql) or die ("Unable to SELECT page services content!");
              return $result;
          }    
            
            else if (strcmp($action, "update") == 0){
           
                $sql = "UPDATE pageServices SET title='$title' WHERE ID=5";
                $result = mysqli_query($res,$sql) or die ("Unable to UPDATE page services!");
                header('Location: ' . HOST . 'page-services.php');
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
                header('Location: ' . HOST . 'page-references.php');
                return $result;
            }     
                 else if (strcmp($action, "create") == 0){
               
                    $sql = "INSERT INTO subsidies (title, subject, client, price, content, page_id) VALUES ('$title', '$subject', '$client', '$price', '$content', 5)";
                    $result = mysqli_query($res,$sql) or die ("Unable to UPDATE subsidies!");
                    header('Location: ' . HOST . 'page-references.php');
                    return $result;
                }
                      else if (strcmp($action, "delete") == 0){
                     
                          $sql = "DELETE FROM subsidies WHERE ID = '$dataid'" or die ("Unable to delete attachments!");
                          $result = mysqli_query($res,$sql) or die ("Unable to UPDATE subsidies!");
                         // header('Location: ' . HOST . 'page-references.php');
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
                  header('Location: ' . HOST . 'page-references.php');
                  return $result;
              }

                 else if (strcmp($action, "delete") == 0){
                 
                      $sql = "DELETE FROM activities WHERE ID = '$dataid'" or die ("Unable to delete activity!");
                      $result = mysqli_query($res,$sql) or die ("Unable to delete activity!");
                     // header('Location: ' . HOST . 'page-references.php');
                      return $result;
                  } 
                     else if (strcmp($action, "create") == 0){
               
                    $sql = "INSERT INTO activities (title, client, investition, content, page_id) VALUES ('$title', '$client', '$investition', '$content', 5)";
                    $result = mysqli_query($res,$sql) or die ("Unable to UPDATE activvities!");
                    header('Location: ' . HOST . 'page-references.php');
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
           
                fileupload($id,'studio_id');
                $sql = "UPDATE studios SET title='$title', client='$client', costs='$costs', pd='$pd', content='$content'  WHERE ID=$id";
                $result = mysqli_query($res,$sql) or die ("Unable to UPDATE page services!");
                header('Location: ' . HOST . 'reference-detail-studios.php?edit=' . $id);
                return $result;
          }     


           else if (strcmp($action, "delete") == 0){
               deleteAttachments($dataid, 'studio_id');               
                $sql = "DELETE FROM studios WHERE ID = '$dataid'" or die ("Unable to delete activity!");
                $result = mysqli_query($res,$sql) or die ("Unable to delete activity!");


               // header('Location: ' . HOST . 'page-references.php');
                return $result;
            } 

                else if (strcmp($action, "create") == 0){
                    
                    $sql = "INSERT INTO studios (title, client, costs, PD,content, page_id) VALUES ('$title', '$client', '$costs', '$pd', '$content', 5)";
                    $result = mysqli_query($res,$sql) or die ("Unable to UPDATE studios!");
                    fileupload('studio','studio_id');
                    header('Location: ' . HOST . 'page-references.php');
                    return $result;
                }

          break;

      case "defaultRefs":

           if (strcmp($action, "select") == 0){
          
             if ($dataid != ''){
                              
                                $sql = "SELECT * FROM defaultRefs WHERE ID = '$dataid'" or die ("Unable to join tables!");
                      }
                      else {
                        
                                $sql = "SELECT * FROM defaultRefs" or die ("Unable select from studios!");
                      }  



              $result = mysqli_query($res,$sql) or die ("Unable to SELECT defaultRefs records!");
              return $result;
          }    
            
            else if (strcmp($action, "update") == 0){
           
                $sql = "UPDATE defaultRefs SET title='$title',subtitle='$subtitle',content='$content' WHERE ID=$id";
                $result = mysqli_query($res,$sql) or die ("Unable to UPDATE page services!");
                header('Location: ' . HOST . 'page-references.php');
                return $result;
          }       
              else if (strcmp($action, "delete") == 0){
             
                  $sql = "DELETE FROM defaultRefs WHERE ID = '$dataid'" or die ("Unable to delete reference!");
                  $result = mysqli_query($res,$sql) or die ("Unable to delete reference!");
                 // header('Location: ' . HOST . 'page-references.php');
                  return $result;
              } 
                   else if (strcmp($action, "create") == 0){
                 
                      $sql = "INSERT INTO defaultRefs (title, subtitle, content, page_id) VALUES ('$title', '$subtitle', '$content', 5)";
                      $result = mysqli_query($res,$sql) or die ("Unable to UPDATE studios!");
                      header('Location: ' . HOST . 'page-references.php');
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
                header('Location: ' . HOST . 'page-contact.php');
                return $result;
          }        
          break;

      case "attachments":

           if (strcmp($action, "select") == 0){

              $sql = "SELECT * FROM attachments WHERE $attachParent = '$dataid' ORDER BY uploadtime DESC";
              $result = mysqli_query($res,$sql) or die ("Unable to SELECT attachments!");
              return $result;
              
              }    
               else if (strcmp($action, "delete") == 0){
                    
                    $art = getArtIDfromAttach($dataid);
                    $title = getAttachName('attachments',$dataid);
                   
                   // echo '' . HOST . 'article-detail.php?edit=' . $art . ' <br>IDDEEE:' . $dataid ;
                    
                    
                    unlink("uploads/" . $title);
    
                    if (file_exists('uploads/thumb/'. $title)) {
                     
                      unlink("uploads/thumb/" . $title);
                    
                    }

                    $sql = "DELETE FROM attachments WHERE ID = '$dataid'";
                    $result = mysqli_query($res,$sql) or die ("Unable to DELETE attachments!");

                  
                    if (strcmp($attachParent, "article_id") == 0 ) {

                    header('Location: ' . HOST . 'article-detail.php?edit=' . $art);

                    }else if (strcmp($attachParent, "studio_id") == 0 ){
                    
                      header('Location: ' . HOST . 'reference-detail-studios.php?edit=' . $art);

                    }
                    
                    return $result;
                    
              }   else if(strcmp($action, "update") == 0) {

                    for ($counter=0; $counter<count($_POST['id_attach']); $counter++){

                         $title_attachment = $_POST['title_attach'][$counter];
                         $id_attach = $_POST['id_attach'][$counter];

                         $sql = "UPDATE attachments SET title='$title_attachment' WHERE ID = $id_attach";
                         mysqli_query($res,$sql) or die ("Unable to UPDATE attachments title!");                  
                    }                  

              }  
         
           break;
  }
}

function fileupload($article_id, $parentID){

    require_once('config.php'); 
    define("UPLOAD_DIR", "uploads/");

    $res  = connect();
    $total = count($_FILES['files']['name']);

    for ($i=0; $i < $total; $i++){

      $name = $_FILES['files']['name'][$i];
      $size = $_FILES['files']['size'][$i];
      $file_tmp =$_FILES['files']['tmp_name'][$i];
      $stem=substr($name,0,strpos($name,'.'));
      $extension = substr($name, strpos($name,'.'), strlen($name)-1);

     /*!only for localhost!*/
     if ($extension == ".docx"){
    
            $type = 0;          
      }  
        else {
            
            $type = $_FILES['files']['type'][$i];
        }

      if ($_FILES['files']['error'][$i] === UPLOAD_ERR_OK) {

          if($size > 3000000){  

              $error='Size of file ' . $name . ' must be less than 30MB ';
              $_SESSION["error_message"] = $error; 
              //die($error . 'Click <a href="' . HOST . 'article-detail.php?edit=' . $article_id . '">here</a> to go back.');      
              header("Refresh:0");
              //header('Location: ' . HOST . 'article-detail.php?edit=' . $article_id);
              exit();
            }
              else {
                  
                  $currentTime=time();
                  $uploadTime = date("Y-m-d-H:i:s",$currentTime);
                  $j = 0;
                  $parts = pathinfo($name);
                  $path = UPLOAD_DIR. $name;

                  while (file_exists(UPLOAD_DIR . $name)) {
                      $j++;
                      $name = $parts["filename"] . "-" . $j . "." . $parts["extension"];
                  }

                  $uploadImage = UPLOAD_DIR.$name;

                  if (move_uploaded_file($file_tmp,$uploadImage)){

                      $_SESSION["error_message"] = ''; 

                      if (strcmp($extension, ".jpg") == 0 || 
                      		strcmp($extension, ".jpeg") == 0 || 
                      		strcmp($extension, ".png") == 0 || 
                      	  	strcmp($extension, ".gif") == 0){

                      	$thumbName = createThumb($name,$extension,$uploadImage,'200','160');

                      }
                       else {

                       	$thumbName ='';
                       
                       }

                      
                      if (strcmp($article_id, 'studio') == 0){
                        
                        $article_id = getMaxObjectID('studios');
                      
                      }
                        else if (strcmp($article_id, 'article') == 0) {
                        
                            $article_id = getMaxObjectID('articles');

                        }

                  $sql = "INSERT INTO attachments (name, whole_path, " . $parentID . " ,size, type, uploadtime, thumb) VALUES ('$name', '$path','$article_id','$size','0','$uploadTime','$thumbName')" or die ('Unable to abs(number)ttachments!');
                  $result = mysqli_query($res,$sql) or die ("Unable to UPLOAD attachments! Size of file ok and ARTICLE ID IS " . $article_id. "______" );

                  }
                    else {

                      $_SESSION["error_message"] = 'Error occured while uploading file. Please refresh the page and try agin.'; 

                  }

                }
            //die ('File ' . $name . ' was sucessfully uploaded!<br> TOTAL:' . $total . '<br>i = '.$i);
      }     
        // echo 'File ' . $name . ' has less than 5MB (server settings)!<br> TOTAL:' . $total . '<br>i = '. $i . '<br>SIZE :' . $size . '<br>ERROR: ' . $error . ' <br><br>';
        else if ($_FILES['files']['error'][$i] === UPLOAD_ERR_INI_SIZE || 
                  $_FILES['files']['error'][$i] === UPLOAD_ERR_FORM_SIZE){

             $error='ERROR Size of file ' . $name . ' must be less than 3MB ';
             $_SESSION["error_message"] = $error; 
       
             header("Refresh:0");
             die();

         } 
        
          else if ($_FILES['files']['error'][$i] === UPLOAD_ERR_NO_FILE) {
                
          }

           else {

               $error='ERROR: File upload completed with errors. Please refresh your browser and try again. ';
               $_SESSION["error_message"] = $error;      
               header('Location: ' . HOST . 'article-detail.php?edit=' . $article_id);
               die();
           }
     }
 }

function createThumb($fileName, $ext, $upload_image, $thumb_width, $thumb_height){
    
    $thumbnail = 'uploads/thumb/' . $fileName;
    list($width,$height) = getimagesize($upload_image);
    $thumb_height = ($thumb_width/$width) * $height;
    $thumb_create = imagecreatetruecolor($thumb_width,$thumb_height);
    
    switch($ext){
        case '.jpg':
            $source = imagecreatefromjpeg($upload_image);
            break;
        case '.jpeg':
            $source = imagecreatefromjpeg($upload_image);
            break;

        case '.png':
            $source = imagecreatefrompng($upload_image);
            break;
        case '.gif':
            $source = imagecreatefromgif($upload_image);
            break;
        default:
            $source = imagecreatefromjpeg($upload_image);
    }

    imagecopyresized($thumb_create,$source,0,0,0,0,$thumb_width,$thumb_height,$width,$height);

    switch($ext){
        case '.jpg' || '.jpeg':
            imagejpeg($thumb_create,$thumbnail,100);
            break;
        case '.png':
            imagepng($thumb_create,$thumbnail,100);
            break;

        case '.gif':
            imagegif($thumb_create,$thumbnail,100);
            break;
        default:
            imagejpeg($thumb_create,$thumbnail,100);
    }

return $fileName;

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
function getAttachName($table_name,$attach_id){

  //echo "<br>TABLEEE:". $table_name ."<br> and ID:". $attach_id;

  require_once('config.php'); 
  $res  = connect();

  $sql = "SELECT name FROM $table_name WHERE ID = '$attach_id'";

   $result = mysqli_query($res,$sql) or die ("Unable get attachments title!");

   

  while ($row = mysqli_fetch_array($result)){


    $article_title = $row['name'];

    return $article_title;
  }

}

//function deletes attachments once an article is erased
function deleteAttachments($article_id,$attachParent){

  require_once('config.php'); 
  $res  = connect();

  $sql = "SELECT name FROM attachments WHERE $attachParent = '$article_id'";

  $result = mysqli_query($res,$sql) or die ("Unable select article id");

  while ($row = mysqli_fetch_array($result)){   

    $attachment_title = $row['name'];
    unlink("uploads/" . $attachment_title);

    if (file_exists('uploads/thumb/'. $attachment_title)) {
                     
     unlink("uploads/thumb/" . $attachment_title);
                    
    }   
  } 
}

function getMaxObjectID($objectName){
  
  require_once('config.php'); 
  $res  = connect();
    
  $sql = "SELECT ID FROM $objectName";
  $result=mysqli_query($res, $sql) or die ("Unable TO GET MAX ID");

  $maxID = 0;

  while ($row = mysqli_fetch_array($result)){

    $id= $row['ID'];
    
    if ($id > $maxID){

        $maxID=$id;      
    }
  }

  return $maxID;
}
?>