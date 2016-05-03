<?php
ini_set('session.save_path', '../tmp');
session_start();
define("HOST", "http://localhost/cmstest/pbl/admin/");

if(!$_SESSION['logged']){
    header("location: login.php");
    exit();
}

function data_handler($page,$dbaction,$dataid,$attachParent){


/*while ($row = $result->fetch_assoc()) {
    // do something with $row
}
*/
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

$title_set_escaped = mysqli_real_escape_string($res, $title_set);
$subtitle_set_escaped = mysqli_real_escape_string($res, $subtitle_set);
$content_set_escaped = mysqli_real_escape_string($res, $content_set);
$id_set_escaped = mysqli_real_escape_string($res, $id_set);
$subject_set_escaped = mysqli_real_escape_string($res, $subject_set);
$client_set_escaped = mysqli_real_escape_string($res, $client_set);
$price_set_escaped = mysqli_real_escape_string($res, $price_set);
$costs_set_escaped = mysqli_real_escape_string($res, $costs_set);
$pd_set_escaped = mysqli_real_escape_string($res, $pd_set);
$investition_set_escaped = mysqli_real_escape_string($res, $investition_set);
$email_set_escaped = mysqli_real_escape_string($res, $email_set);
$mobile_set_escaped = mysqli_real_escape_string($res, $mobile_set);
$company_set_escaped = mysqli_real_escape_string($res, $company_set);
$address_set_escaped = mysqli_real_escape_string($res, $address_set);
$psc_city_set_escaped = mysqli_real_escape_string($res, $psc_city_set);
$ic_set_escaped = mysqli_real_escape_string($res, $ic_set);
$dic_set_escaped = mysqli_real_escape_string($res, $dic_set);





$page_name = $page;
$title=test_input($title_set_escaped);
$subtitle=test_input($subtitle_set_escaped);
$content=test_input($content_set_escaped);
$id=test_input($id_set_escaped);
$subject=test_input($subject_set_escaped);
$client=test_input($client_set_escaped);
$price=test_input($price_set_escaped);
$costs=test_input($costs_set_escaped);
$pd=test_input($pd_set_escaped);
$investition=test_input($investition_set_escaped);


$email=test_input($email_set_escaped);
$mobile=test_input($mobile_set_escaped);
$company=test_input($company_set_escaped);
$address=test_input($address_set_escaped);
$ic=test_input($ic_set_escaped);
$dic=test_input($dic_set_escaped);
$psc_city=test_input($psc_city_set_escaped);




switch($page_name){

  case "article":

      if (strcmp($action, "update") == 0){
      
        $stmt = $res->prepare('UPDATE articles SET title=?, content=? WHERE ID=?');
        $stmt->bind_param('ssi', $title, $content, $id);
        $stmt->execute();
        $result = $stmt->get_result();
        fileupload($id,'article_id');
        header('Location: ' . HOST . 'article-detail.php?edit=' . $id);

      }
        
        else if (strcmp($action, "select") == 0){

            if ($dataid != ''){
                
                $stmt = $res->prepare('SELECT * FROM articles WHERE ID = ?');
                $stmt->bind_param('i', $dataid);
                $stmt->execute();
                $result = $stmt->get_result();
            }

              else {
            
                  $sql = "SELECT * FROM articles" or die ("Unable to join tables!");
                  $result = mysqli_query($res,$sql) or die ("Unable to get data for editation!");
               }    
                    
        }
         
         else if (strcmp($action, "delete") == 0){
        
             deleteAttachments($dataid,'article_id');               
             
             $stmt = $res->prepare('DELETE FROM articles WHERE ID = ?');
             $stmt->bind_param('i', $dataid);
             $stmt->execute();
             $result = $stmt->get_result();
                    
          }
          
            else if (strcmp($action, "create") == 0){
                
               $stmt = $res->prepare( 'INSERT INTO articles (title, content, subservice_id) VALUES (?,?,?)' );
               $stmt->bind_param('ssi', $title, $content, $dataid);
               $stmt->execute();
               $result = $stmt->get_result();
               fileupload('article','article_id');
               header('Location: ' . HOST . 'page-articles.php');         
                 
             }
   
    return $result;    
    break;

  case "page_main":

      if (strcmp($action, "update") == 0){
                        
          $stmt = $res->prepare( 'UPDATE pageMain SET title=?, subtitle=? WHERE ID=5' );
          $stmt->bind_param('ss', $title, $subtitle);
          $stmt->execute();
          $result = $stmt->get_result();

          header('Location: ' . HOST . 'page-main.php');           
          
       }        
      
      return $result;
      break;
  
  case "page_about":

      if (strcmp($action, "update") == 0){
                   
          $stmt = $res->prepare( 'UPDATE pageAbout SET title=?, subtitle=?, content=? WHERE ID=5' );
          $stmt->bind_param('sss', $title, $subtitle, $content);
          $stmt->execute();
          $result = $stmt->get_result();
          header('Location: ' . HOST . 'page-about.php');

      }        
    
      return $result;
      break;
 
  case "page_references":

      if (strcmp($action, "update") == 0){
               
          $stmt = $res->prepare( 'UPDATE pageReferences SET title=?, subtitle=? WHERE ID=5' );
          $stmt->bind_param('ss', $title, $subtitle);
          $stmt->execute();
          $result = $stmt->get_result();
          header('Location: ' . HOST . 'page-references.php');
   

      }
          
        else if (strcmp($action, "select") == 0){
          
           $sql = "SELECT * FROM pageReferences WHERE ID=5";
           $result = mysqli_query($res,$sql) or die ("Unable to LOAD data!");
          
         } 
      
      return $result;  
      break;
   
  case "service":

      if (strcmp($action, "select") == 0){  
           
            if ($dataid != ''){
         
                $stmt = $res->prepare( 'SELECT * FROM services WHERE ID = ?' );
                $stmt->bind_param('i', $dataid);
                $stmt->execute();
                $result = $stmt->get_result();
            
             }
             
               else {
           
                  $sql = "SELECT * FROM services";
                  $result = mysqli_query($res,$sql) or die ("Unable to LOAD data!");
                         
               } 
           
           
       }  
        
          else if (strcmp($action, "update") == 0){
             
             $stmt = $res->prepare( 'UPDATE services SET title=?, subtitle=?, content = ?  WHERE ID= ?' );
             $stmt->bind_param('sssi', $title, $subtitle, $content,$id);
             $stmt->execute();
             $result = $stmt->get_result();
             header('Location: ' . HOST . 'page-services.php');

        
           }  
    
      return $result;      
      break;

  case "articles_sub":

      if (strcmp($action, "select") == 0){

          $stmt = $res->prepare('SELECT * FROM articles WHERE subservice_id = ? ');
          $stmt -> bind_param('i',$dataid);
          $stmt -> execute();
          $result = $stmt -> get_result();
          
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
                   
            $stmt = $res->prepare('UPDATE pageServices SET title=? WHERE ID=5 ');
            $stmt -> bind_param('s',$title);
            $stmt -> execute();
            $result = $stmt -> get_result();
            header('Location: ' . HOST . 'page-services.php');

            return $result;

        }        

 break;

  case "subsidies":

      if (strcmp($action, "select") == 0){
      
          if ($dataid != ''){
                              
              $stmt = $res->prepare('SELECT * FROM subsidies WHERE ID = ?');
              $stmt -> bind_param('i',$dataid);
              $stmt -> execute();
              $result = $stmt -> get_result();

           }
          
            else {
            
                $sql = "SELECT * FROM subsidies" or die ("Unable to join tables!");
                $result = mysqli_query($res,$sql) or die ("Unable to SELECT subsidies records!");
                
             }  

        
        }    
        
          else if (strcmp($action, "update") == 0){
       
              $stmt = $res->prepare('UPDATE subsidies SET title=?, subject=?, client=?, price=?, content=?  WHERE ID= ?');
              $stmt -> bind_param('sssssi',$title, $subject, $client, $price, $content, $id);
              $stmt -> execute();
              $result = $stmt -> get_result();

              header('Location: ' . HOST . 'page-references.php');
              
          }

            else if (strcmp($action, "create") == 0){
                           
                $stmt = $res->prepare( 'INSERT INTO subsidies (title, subject, client, price, content, page_id) VALUES (?, ?, ?, ?, ?, 5)' );
                $stmt -> bind_param('sssss',$title, $subject, $client, $price, $content);
                $stmt -> execute();
                $result = $stmt -> get_result();

                header('Location: ' . HOST . 'page-references.php');
               
              
               }
                
                  else if (strcmp($action, "delete") == 0){
                                         
                      $stmt = $res->prepare('DELETE FROM subsidies WHERE ID = ?');
                      $stmt -> bind_param('i',$dataid);
                      $stmt -> execute();
                      $result = $stmt -> get_result();

                     // header('Location: ' . HOST . 'page-references.php');
                  
                   }

    return $result;
    break;
  
  case "activities":

       if (strcmp($action, "select") == 0){
      
            if ($dataid != ''){
                                            
                $stmt = $res->prepare('SELECT * FROM activities WHERE ID = ?');
                $stmt -> bind_param('i',$dataid);
                $stmt -> execute();
                $result = $stmt -> get_result(); 
           
             }
              
              else {
                    
                  $sql = "SELECT * FROM activities" or die ("Unable to select from activities!");
                  $result = mysqli_query($res,$sql) or die ("Unable to SELECT activities records!");          
               
               }

      
      }    
        
        else if (strcmp($action, "update") == 0){
                
            $stmt = $res->prepare('UPDATE activities SET title=?, client=?, investition=?, content=? WHERE ID = ?');
            $stmt -> bind_param('ssssi', $title, $client,$investition, $content, $id);
            $stmt -> execute();
            $result = $stmt -> get_result(); 

            header('Location: ' . HOST . 'page-references.php');
          
         }

            else if (strcmp($action, "delete") == 0){
                               
                $stmt = $res->prepare('DELETE FROM activities WHERE ID = ?');
                $stmt -> bind_param('i',$dataid);
                $stmt -> execute();
                $result = $stmt -> get_result(); 

             
              } 
                 
                else if (strcmp($action, "create") == 0){
           
                    $stmt = $res->prepare('INSERT INTO activities (title, client, investition, content, page_id) VALUES (?, ?, ?, ?, 5)');
                    $stmt -> bind_param('ssss', $title, $client,$investition, $content);
                    $stmt -> execute();
                    $result = $stmt -> get_result(); 

                    header('Location: ' . HOST . 'page-references.php');
                    

                 }   
      
      return $result;
      break;
  
 case "studios":

       if (strcmp($action, "select") == 0){
      
                if ($dataid != ''){
                                                
                      $stmt = $res->prepare('SELECT * FROM studios WHERE ID = ?');
                      $stmt -> bind_param('i',$dataid);
                      $stmt -> execute();
                      $result = $stmt -> get_result(); 
                 }
                  
                  else {
                    
                        $sql = "SELECT * FROM studios" or die ("Unable select from studios!");
                        $result = mysqli_query($res,$sql) or die ("Unable to SELECT studios records!");
                            
                   }  

        }    
        
         else if (strcmp($action, "update") == 0){
       
            fileupload($id,'studio_id');
          
            $stmt = $res->prepare( 'UPDATE studios SET title=?, client=?, costs=?, pd=?, content=? WHERE ID= ?' );
            $stmt -> bind_param('sssssi', $title, $client, $costs, $pd, $content, $id);
            $stmt -> execute();
            $result = $stmt -> get_result(); 

            header('Location: ' . HOST . 'reference-detail-studios.php?edit=' . $id);
         }     

           else if (strcmp($action, "delete") == 0){
            
              deleteAttachments($dataid, 'studio_id');               
              $stmt = $res->prepare('DELETE FROM studios WHERE ID = ?');
              $stmt -> bind_param('i',$dataid);
              $stmt -> execute();
              $result = $stmt -> get_result(); 

           // header('Location: ' . HOST . 'page-references.php');
            } 

             else if (strcmp($action, "create") == 0){
                
                 $stmt = $res->prepare( 'INSERT INTO studios (title, client, costs, PD,content, page_id) VALUES (?, ?, ?, ?, ?, 5)' );
                 $stmt -> bind_param('sssss', $title, $client, $costs, $pd, $content);
                 $stmt -> execute();
                 $result = $stmt -> get_result(); 
                 fileupload('studio','studio_id');
                 header('Location: ' . HOST . 'page-references.php');

             }

      return $result;
      break;

  case "defaultRefs":

       if (strcmp($action, "select") == 0){
      
         if ($dataid != ''){
                                         
              $stmt = $res->prepare('SELECT * FROM defaultRefs WHERE ID = ?');
              $stmt -> bind_param('i',$dataid);
              $stmt -> execute();
              $result = $stmt -> get_result(); 

          }
            else {
              
                $sql = "SELECT * FROM defaultRefs" or die ("Unable select from studios!");
                $result = mysqli_query($res,$sql) or die ("Unable to SELECT defaultRefs records!");

            }  

      }    
        
        else if (strcmp($action, "update") == 0){
                  
            $stmt = $res->prepare('UPDATE defaultRefs SET title=?,subtitle=?,content=? WHERE ID=?');
            $stmt -> bind_param('sssi',$title, $subtitle, $content, $id);
            $stmt -> execute();
            $result = $stmt -> get_result(); 
            header('Location: ' . HOST . 'page-references.php');

         }       
        
           else if (strcmp($action, "delete") == 0){
              
              $stmt = $res->prepare('DELETE FROM defaultRefs WHERE ID = ?');
              $stmt -> bind_param('i',$dataid);
              $stmt -> execute();
              $result = $stmt -> get_result(); 
                       
            } 
           
              else if (strcmp($action, "create") == 0){
                       
                  $stmt = $res->prepare( 'INSERT INTO defaultRefs (title, subtitle, content, page_id) VALUES (?, ?, ?, 5)' );
                  $stmt -> bind_param('sss',$title, $subtitle, $content);
                  $stmt -> execute();
                  $result = $stmt -> get_result(); 

                  header('Location: ' . HOST . 'page-references.php');
                        
               }   

      return $result;
      break;

  case "contact":

      if (strcmp($action, "select") == 0){
      
          $sql = "SELECT * FROM contact";
          $result = mysqli_query($res,$sql) or die ("Unable to SELECT page services content!");
                 
       }    
        
          else if (strcmp($action, "update") == 0){
                       
              $stmt = $res->prepare( 'UPDATE contact SET email=?, mobile=?, company=?, address=? ,psc_city=?, ic=?, dic=? WHERE ID=5' );
              $stmt -> bind_param('sssssss',$email, $mobile, $company, $address, $psc_city, $ic, $dic);
              $stmt -> execute();
              $result = $stmt -> get_result(); 
              header('Location: ' . HOST . 'page-contact.php');

           }        
      
      return $result;
      break;

  case "attachments":

       if (strcmp($action, "select") == 0){

          $stmt = $res->prepare( 'SELECT * FROM attachments WHERE ' . $attachParent . ' = ?' );
          $stmt -> bind_param('i',$dataid);
          $stmt -> execute();
          $result = $stmt -> get_result(); 
          
          }    
       
            else if (strcmp($action, "delete") == 0){
                
                $art = getArtIDfromAttach($dataid);
                $title = getAttachName('attachments',$dataid);           
                
                unlink("uploads/" . $title);

                if (file_exists('uploads/thumb/'. $title)) {
                 
                  unlink("uploads/thumb/" . $title);
                
                }

                $stmt = $res->prepare( 'DELETE FROM attachments WHERE ID = ?' );
                $stmt -> bind_param('i',$dataid);
                $stmt -> execute();
                $result = $stmt -> get_result(); 

                if (strcmp($attachParent, "article_id") == 0 ) {

                    header('Location: ' . HOST . 'article-detail.php?edit=' . $art);

                }

                  else if (strcmp($attachParent, "studio_id") == 0 ){
                
                    header('Location: ' . HOST . 'reference-detail-studios.php?edit=' . $art);

                  }
                
                
             }  

             else if(strcmp($action, "update") == 0) {

                for ($counter=0; $counter<count($_POST['id_attach']); $counter++){

                    $title_attachment = $_POST['title_attach'][$counter];
                    $id_attach = $_POST['id_attach'][$counter];
                    $stmt = $res->prepare( 'UPDATE attachments SET title=? WHERE ID = ?' );
                    $stmt -> bind_param('si',$title_attachment, $id_attach);
                    $stmt -> execute();
                    $result = $stmt -> get_result(); 

                }                  

             }  
     
      return $result;
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

                        $sql = "INSERT INTO attachments (name, whole_path, $parentID, size, type, uploadtime, thumb) VALUES ('$name', '$path','$article_id','$size','$type','$uploadTime','$thumbName')" or die ('Unable to abs(number)ttachments!');
                        $result = mysqli_query($res,$sql) or die ("Unable to UPLOAD attachments! Size of file ok and ARTICLE ID IS " . $article_id. "______" );

                  }
                    else {

                      $_SESSION["error_message"] = 'Error occured while uploading file. Please refresh the page and try agin.'; 

                  }

                }
      }     

        else if ($_FILES['files']['error'][$i] === UPLOAD_ERR_INI_SIZE || 
                 $_FILES['files']['error'][$i] === UPLOAD_ERR_FORM_SIZE){

             $error='ERROR Size of file ' . $name . ' must be less than 3MB ';
             $_SESSION["error_message"] = $error;    
             header("Refresh:0");
             exit();

         } 
        
          else if ($_FILES['files']['error'][$i] === UPLOAD_ERR_NO_FILE) {
                
          }

           else {

               $error='ERROR: File upload completed with errors. Please refresh your browser and try again. ';
               $_SESSION["error_message"] = $error;      
               header('Location: ' . HOST . 'article-detail.php?edit=' . $article_id);
               exit();
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