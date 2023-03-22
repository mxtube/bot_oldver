<div class="row">
    <div class="col-md-8 blog-main">
        <div class="blog-post">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-link active text-dark" id="nav-profile-tab" data-bs-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">All</a>
                    <a class="nav-link text-dark" id="nav-home-tab" data-bs-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">ToDay</a>
                    <a class="nav-link text-dark" id="nav-contact-tab" data-bs-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Users</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"><br>
                    <?php include ("models/today.php"); ?>
                </div>
                <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"><br>
                    <?php include ("models/all.php"); ?>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab"><br>
                    <?php include ("models/users.php"); ?>
                </div>
            </div>
        </div>
    </div>