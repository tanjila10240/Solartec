<?php 


require_once('functions/function.php');
needLogged();
if($_SESSION['role']=='1'){
get_header();
get_sidebar();

if(!empty($_POST)){
 $name=$_POST['name'];
 $phone=$_POST['phone'];
 $email=$_POST['email'];
 $username=$_POST['username'];
 $pass=md5($_POST['pass']);
 $repass=md5($_POST['repass']);
  $role=$_POST['role'];
  $slug=uniqid('U');
  $image=$_FILES['pik'];
  $imageName='';

 if($image['name']!=''){
   $imageName='user_'.time().'_'.rand(100000,1000000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);

}

 $insert="INSERT INTO uylab_users(user_name,user_phone,user_email,user_username,user_password,role_id,user_photo,user_slug)
 VALUES('$name','$phone','$email','$username','$pass','$role','$imageName','$slug')";

if(!empty($name)){
  if(!empty($email)){
    if(!empty($username)){
       if(!empty($pass)){
         if(!empty($repass)){
           if($pass===$repass){
             if(!empty($role)){
            
               if(mysqli_query($con,$insert)){ 
                move_uploaded_file($image['tmp_name'],'uploads/'.$imageName);
                echo "User registreation success.";
               }else{
              echo "Opps! User registreation failed.";
               }

              }else{
                echo "please select user role.";
              }

               }else{
             echo "Password and confirm password didn't match.";
              }
            
              }else{
           echo "please enter your password password.";
           }

           }else{
        echo "please enter your password.";
         }

        }else{
        echo "please enter your username.";
        }

      }else{
        echo "please enter your email address.";
      }
      
    }else{
      echo "please enter your name.";
    }

 }

 ?>


                    <div class="row">
                        <div class="col-md-12 ">
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="card mb-3">
                                  <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-8 card_title_part">
                                            <i class="fab fa-gg-circle"></i>User Registration
                                        </div>  
                                        <div class="col-md-4 card_button_part">
                                            <a href="all-user.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All User</a>
                                        </div>  
                                    </div>
                                  </div>
                                  <div class="card-body">
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Name<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="name">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Phone:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="phone">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Email<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="email" class="form-control form_control" id="" name="email">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Username<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="username">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Password<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="password" class="form-control form_control" id="" name="pass">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Confirm-Password<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="password" class="form-control form_control" id="" name="repass">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">User Role<span class="req_star">*</span>:</label>
                                        <div class="col-sm-4">
                                          <select class="form-control form_control" id="" name="role">
                                            <option>Select Role</option>
                                            <?php 
                                              $selr="SELECT * FROM roles ORDER BY role_id ASC";
                                              $Qr=mysqli_query($con,$selr);
                                              while($urole=mysqli_fetch_assoc($Qr)){
                                             ?>
                                            <option value="<?= $urole['role_id']; ?>"><?= $urole['role_name']; ?></option>
                                             <?php } ?> 
                                          </select>
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Photo:</label>
                                        <div class="col-sm-4">
                                          <input type="file" class="form-control form_control" id="" name="pik">
                                        </div>
                                      </div>
                                  </div>
                                  <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-sm btn-dark">REGISTRATION</button>
                                  </div>  
                                </div>
                            </form>
                        </div>
                    </div>


<?php 
get_footer();

   }else{

  header('location: index.php');

// echo "You have no permission visit page.";
}

 ?> 