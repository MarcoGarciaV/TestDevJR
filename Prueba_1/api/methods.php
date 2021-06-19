<?php
$url="https://jsonplaceholder.typicode.com/";

if($_POST){
    $type = ($_POST['type'])?$_POST['type']:null;
    if($type != null){

        if($type == 'getUsers'){
            global $url;
            $data = json_decode(file_get_contents($url."users"));
        
             $html ="   
             <div class='table-responsive'>
             <table class='table'>
             <thead>
            <tr>
              <th scope='col'>Name</th>
              <th scope='col'>Username</th>
              <th scope='col'>Email</th>
              <th scope='col'>Address</th>
              <th scope='col'>Phone</th>
              <th scope='col'>Website</th>
              <th scope='col'>Company</th>
              <th scope='col'>Ver</th>
            </tr>
          </thead>
          <tbody>";
            foreach ($data as $user){
            $html .= "
            <tr class='table-row' onclick='Show($user->id)'>
              <th>$user->name</th>
              <td>$user->username</td>
              <td>$user->email</td>
              <td>{$user->address->street}</td>
              <td>$user->phone</td>
              <td>$user->website</td>
              <td>{$user->company->name}</td>   
              <td><Button id='btnModal' onclick='Show($user->id)' name='$user->id' class='btn btn-primary'>Ver</Button></td>   
            </tr>
        
            ";
            }
            $html .= "  </tbody>
            
            </table>
            </div>";
            echo json_encode(array('status'=>200, 'data'=> $html ));
        }else if($type == 'getUsersById'){
            $user_id = ($_POST['user_id'])?$_POST['user_id']:null;
            if($user_id != null){
                global $url;
                $data = json_decode(file_get_contents($url."users/$user_id"));
                $html = " 
                <div class='modal-body'>
                <div class='container'>
                <div class='row'>
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <label for='name'>Name</label>
                            <input id='name'  class='form-control' value='$data->name' readonly type='text'/>
                        </div>
                    </div>
        
                    <div class='col-md-6'>
                    <div class='form-group'>
                            <label for='username'>Username</label>
                            <input id='username'  class='form-control' value='$data->username' readonly type='text'/>
                        </div>
                    </div>
                    <div class='col-md-6'>
                    <div class='form-group'>
                            <label for='email'>Email</label>
                            <input id='email'  class='form-control' value='$data->email' readonly type='text'/>
                        </div>
                    </div>
                    <div class='col-md-6'>
                    <div class='form-group'>
                            <label for='address'>Address</label>
                            <input id='address'  class='form-control' value='{$data->address->street}' readonly type='text'/>
                        </div>
                    </div>
                    <div class='col-md-6'>
                    <div class='form-group'>
                            <label for='phone'>Phone</label>
                            <input id='phone'  class='form-control' value='$data->phone' readonly type='text'/>
                        </div>
                    </div>
                    <div class='col-md-6'>
                    <div class='form-group'>
                            <label for='website'>Website</label>
                            <input id='website'  class='form-control' value='$data->website' readonly type='text'/>
                        </div>
                    </div>
                    <div class='col-md-6'>
                    <div class='form-group'>
                            <label for='company'>Company</label>
                            <input id='company'  class='form-control' value='{$data->company->name}' readonly type='text'/>
                        </div>
                    </div>
        
                </div>
                </div>
                </div>
                <div class='modal-footer'>
                  <a href='posts.php?us=$data->id'  class='btn btn-secondary'>Posts</button>
                  <a href='tasks.php?us=$data->id'   class='btn btn-primary'>Todos</button>
                </div>";
                
                echo json_encode(array('status'=>200, 'data'=> $html ));

            }
        }else if ($type =='getPostsByUserId'){
            $user_id = ($_POST['user_id'])?$_POST['user_id']:null;
            if($user_id != null){
                global $url;
                $data = json_decode(file_get_contents($url."users/$user_id/posts"));
                $html ="   
                <div class='table-responsive'>
                <table class='table'>
                <thead>
               <tr>
                 <th scope='col'>Title</th>
                 <th scope='col'>Body</th>
                 <th scope='col'>Comments</th>
               </tr>
             </thead>
             <tbody>";
               foreach ($data as $posts){
               $html .= "
               <tr>
                 <th>$posts->title</th>
                 <td>$posts->body</td> 
                 <td><Button id='btnModal' onclick='showComments($posts->id)' name='$posts->id' class='btn btn-primary'>Ver</Button></td>   
               </tr>
           
               ";
               }
               $html .= "  </tbody>
               
               </table>
               </div>";
                echo json_encode(array('status'=>200, 'data'=> $html ));
            }
          
        }else if($type =='getCommentsByPost'){
            
            $posts_id = ($_POST['post_id'])?$_POST['post_id']:null;
            
            if($posts_id != null){
                global $url;
              
                $data = json_decode(file_get_contents($url."post/$posts_id/comments"));
              
                $html = " 
                <div class='modal-body'>
                <div class='container'>
                <div class='row'>
                <div class='table-responsive'>
                <table class='table'>
                <thead>
               <tr>
                 <th scope='col'>Title</th>
                 <th scope='col'>Email</th>
                 <th scope='col'>Body</th>
               </tr>
             </thead>
             <tbody>";
             foreach ($data as $comments){
                $html .= "
                <tr>
                  <th>$comments->name</th>
                  <td>$comments->email</td> 
                  <td>$comments->body</td> 
                </tr>
            
                ";
                }
        
                $html .="
                </tbody>
               
                </table>
                </div>
                </div>
                </div>
                </div>";
                echo json_encode(array('status'=>200, 'data'=> $html ));
        }
    }
    else if($type =='getTasksByUser'){
        $user_id = ($_POST['user_id'])?$_POST['user_id']:null;
        if($user_id != null){
            global $url;
            $data = json_decode(file_get_contents($url."users/$user_id/todos"),true);
          
            usort($data,"sortById");
        
            $html ="   
            <div class='table-responsive'>
            <table class='table'>
            <thead>
           <tr>
             <th scope='col'>Id</th>
             <th scope='col'>Title</th>
             <th scope='col'>Completed</th>
           </tr>
         </thead>
         <tbody>";
           foreach ($data as $task){
               $completed= ($task['completed']==true)?"Yes":"Not";
               $id = $task['id'];
               $title= $task['title'];
           $html .= "
           <tr>
             <th>$id</th>
             <th>$title</th>
             <td>$completed</td> 
           </tr>
       
           ";
           }
           $html .= "  </tbody>
           
           </table>
           </div>";
            echo json_encode(array('status'=>200, 'data'=> $html ));
        }
    }
  }
    
}

function sortById($a, $b) {
  return $b['id'] - $a['id'];
}


?>