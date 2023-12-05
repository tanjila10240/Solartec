<?php 


require_once('functions/function.php');
needLogged();
if($_SESSION['role']=='1'){
get_header();
get_sidebar();

if(!empty($_POST)){
  $title=$_POST['title'];
  $details=$_POST['details'];
  $icon=$_POST['icon'];
  $image=$_FILES['pik'];
  $imageName='';

   if($image['name']!=''){
   $imageName='service'.time().'_'.rand(100000,1000000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);

  }
$insert="INSERT INTO services(service_title,service_details,service_icon,service_image)
VALUES('$title','$details','$icon','$imageName')";

  if(!empty($title)){
    if(mysqli_query($con,$insert)){
       move_uploaded_file($image['tmp_name'],'uploads/'.$imageName);
         echo "Service upload success.";

       }else{
      echo "Service upload failed.";
    }

   }else{
    echo "Please enter service title";
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
                            <i class="fab fa-gg-circle"></i>Add Service information
                        </div>  
                        <div class="col-md-4 card_button_part">
                            <a href="all-service.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Service</a>
                        </div>  
                    </div>
                  </div>
                  <div class="card-body">
                      <div class="row mb-3">
                        <label class="col-sm-3 col-form-label col_form_label">Service Tite<span class="req_star">*</span>:</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control form_control" id="" name="title">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-3 col-form-label col_form_label">Service Details:</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control form_control" id="" name="details">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-3 col-form-label col_form_label">Service Icon:</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control form_control" id="" name="icon">
                        </div>
                      </div> 
                      <div class="row mb-3">
                        <label class="col-sm-3 col-form-label col_form_label">Service Image:</label>
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