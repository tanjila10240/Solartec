
    <section>
        <div class="container-fluid content_part">
            <div class="row">
                <div class="col-md-2 sidebar_part">
                    <div class="user_part">
                        <img class="" src="uploads/<?= $_SESSION['user_image']?>" alt="avatar"/>
                        <h5><?= $_SESSION['name']; ?></h5>
                        <p><i class="fas fa-circle"></i> Online</p>
                    </div>
                    <div class="menu">
                        <ul>
                            <li><a href="index.php"><i class="fas fa-home"></i> Dashboard</a></li>
                            <?php if($_SESSION['role']=='1'){ ?>
                            <li><a href="all-user.php"><i class="fas fa-user-circle"></i> Users</a></li>
                            <?php  } ?>
                            <?php if($_SESSION['role']<=2){ ?>
                            <li><a href="all-banner.php"><i class="fas fa-images"></i> Banner</a></li>
                            <li><a href="all-service.php"><i class="fa fa-wrench"></i> Service</a></li>
                            <li><a href="all-team.php"><i class="fa fa-users"></i>Our Team</a></li>
                             <?php  } ?>
                            <li><a href="all-message.php"><i class="fas fa-comments"></i> Contact Message</a></li>
                            <li><a href="#"><i class="fas fa-globe"></i>Live Site</a></li>
                            
                            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-10 content">
                    <div class="row">
                        <div class="col-md-12 breadcumb_part">
                            <div class="bread">
                                <ul>
                                    <li><a href=""><i class="fas fa-home"></i>Home</a></li>
                                    <li><a href=""><i class="fas fa-angle-double-right"></i>Dashboard</a></li>                             
                                </ul>
                            </div>
                        </div>
                    </div>