<?php 
require_once('functions/function.php');
needLogged();
if($_SESSION['role']=='1'){
get_header();
get_sidebar();


 ?>

  <div class="row">
          <div class="col-md-12">
              <div class="card mb-3">
                <div class="card-header">
                  <div class="row">
                      <div class="col-md-8 card_title_part">
                        <i class="fab fa-gg-circle"></i>All Team Information
                      </div>  
                      <div class="col-md-4 card_button_part">
                          <a href="add-team.php" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add Team</a>
                      </div>  
                  </div>
                </div>
                <div class="card-body">
                  <table class="table table-bordered table-striped table-hover custom_table">
                    <thead class="table-dark">
                      <tr>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Facebook-link</th>
                        <th>Fwitter-link</th>
                        <th>Instragram-link</th>
                        <th>Image</th> 
                        <th>Manage</th>                       
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $sel="SELECT * FROM teams ORDER BY team_id DESC";
                        $Q=mysqli_query($con,$sel);
                        while($data=mysqli_fetch_assoc($Q)){
                       ?>
                      <tr>                             
                        <td><?= $data['team_name'];?></td>
                        <td><?= $data['team_designation'];?></td>
                        <td><?= $data['team_facebook']; ?></td>
                        <td><?= $data['team_twitter']; ?> </td>
                        <td><?= $data['team_instragram']; ?></td>
                        <td>
                          <?php if($data['team_image']!=''){ ?>
                          <img height="40" class="img200"src="uploads/<?= $data['team_image']; ?>" alt="Team"/>
                          <?php }else{ ?>
                            <img height="40" src="images/carosel-3.jpg" alt="Team"/>
                          <?php }  ?>
                        </td>
                        <td>
                            <div class="btn-group btn_group_manage" role="group">
                              <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                              <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="view-team.php?vt=<?=$data['team_id']; ?>">View</a></li>
                                <li><a class="dropdown-item" href="edit-team.php?et=<?=$data['team_id']; ?>">Edit</a></li>
                                <li><a class="dropdown-item" href="delete-team.php?dt=<?=$data['team_id']; ?>">Delete</a></li>
                              </ul>
                            </div>
                        </td>
                      </tr>
                      <?php } ?>  
                    </tbody>
                  </table>
                </div>
                <div class="card-footer">
                  <div class="btn-group" role="group" aria-label="Button group">
                    <button type="button" class="btn btn-sm btn-dark">Print</button>
                    <button type="button" class="btn btn-sm btn-secondary">PDF</button>
                    <button type="button" class="btn btn-sm btn-dark">Excel</button>
                  </div>
                </div>  
              </div>
          </div>
        </div>
       </div>
    </div>
  </div>
</section>
<?php 

get_footer();

}else{

  header('location: index.php');

// echo "You have no permission visit page.";
}
 ?>
