<?php 


require_once('functions/function.php');
needLogged();
if($_SESSION['role']=='1'){
get_header();
get_sidebar();

if(!empty($_POST)){

  $name=$_POST['name'];
  $desig=$_POST['desig'];
  $fb=$_POST['fb'];
  $tw=$_POST['tw'];
  $ingram=$_POST['ingram'];
  $image=$_FILES['pik'];
  $imageName='';

   if($image['name']!=''){
   $imageName='team'.time().'_'.rand(100000,1000000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);

  }
$insert="INSERT INTO teams(team_name,team_designation,team_facebook,team_twitter,team_instragram,team_image)
VALUES('$name','$desig','$fb','$tw','$ingram','$imageName')";

  if(!empty($name)){
    if(mysqli_query($con,$insert)){
       move_uploaded_file($image['tmp_name'],'uploads/'.$imageName);
         echo "Our Team upload success.";

       }else{
      echo "Team upload failed.";
    }

   }else{
    echo "Please enter team name";
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
                            <i class="fab fa-gg-circle"></i>Add Team information
                        </div>  
                        <div class="col-md-4 card_button_part">
                            <a href="all-team.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Team</a>
                        </div>  
                    </div>
                  </div>
                  <div class="card-body">
                      <div class="row mb-3">
                        <label class="col-sm-3 col-form-label col_form_label">Team Name<span class="req_star">*</span>:</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control form_control" id="" name="name">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-3 col-form-label col_form_label">Team Designation:</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control form_control" id="" name="desig">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-3 col-form-label col_form_label">Team Facebook-link:</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control form_control" id="" name="fb">
                        </div>
                      </div>
                        <div class="row mb-3">
                        <label class="col-sm-3 col-form-label col_form_label">Team Fwitter-link:</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control form_control" id="" name="tw">
                        </div>
                      </div> 
                        <div class="row mb-3">
                        <label class="col-sm-3 col-form-label col_form_label">Team Instragram-link:</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control form_control" id="" name="ingram">
                        </div>
                      </div>  
                      <div class="row mb-3">
                        <label class="col-sm-3 col-form-label col_form_label">Team Image:</label>
                        <div class="col-sm-4">
                          <input type="file" class="form-control form_control" id="" name="pik">
                        </div>
                      </div>
                  </div>
                  <div class="card-footer text-center">
                    <button type="submit" class="btn btn-sm btn-dark">UPLOAD</button>
                  </div>  
                </div>
            </form>
        </div>
    </div>


<?php 
get_footer();

   }else{

  header('location: index.php');

}

 ?> 