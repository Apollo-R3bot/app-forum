    <!-- start header section -->
    <?php 
      require 'controller/post_actions.php';

      include 'layout/header.php';
    ?>
    <!-- end header section -->

    <!-- start main section -->
    <main>
        <div class="container">
            <div class="row">
                <!-- Nav -->
                <div class="col-md-2 align-self-start category">
                  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#replyToPost">
                    <i class='bx bx-reply'> Reply to Thread</i>
                  </button>
                  <?php include 'layout/nav-menu.php';?>
                </div>

                <div class="col-md-10">
                  <!-- Start Card  -->
                  <div class="card mb-3 heading">
                    <div class="card-body">
                      <div class="col d-flex justify-content-between">
                        <span class="text-dark"><?= $posts['name'] ?> started this conversation 1 day ago. 4 people have replied.</span>
                        <div class="col d-flex justify-content-end">
                        <p class="card-text"><small class="text-muted me-3">1 Views</small></p>
                        <p class="card-text"><small class="text-muted me-3"><?= count($replies) ?> Replies</small></p>
                        <p class="card-text"><small><a href="" class="btn btn-outline-warning rounded-pill py-1" style="font-size: 13px;">Laravel</a></small></p>
                        </div>
                      </div>
                    </div>
                   </div>

                    <div class="card mb-3">
                      <div class="row m-0">
                          <div class="col-md">
                            <div class="card-body p-1">
                            <div class="row mb-4">
                              <div class="col d-flex profile">
                                <img src="images/tz-logo.png" class="d-flex justify-content-start img-fluid border rounded-pill" alt="...">
                                <div class="col mx-2">
                                <span><h3 class="text-dark fs-5 m-0"><?= strtolower($posts['name']) ?></h3></span>
                                <p class="card-text"><small class="text-muted">
                                  <?php
                                    $time = new DateTime($posts['created_at']);
                                    $now = new DateTime();
                                    $interval = $time->diff($now,true);

                                    if ($interval->y) echo "Posted " .$interval->y . ' years ago';
                                    elseif ($interval->m) echo "Posted " .$interval->m . ' months ago';
                                    elseif ($interval->d) echo "Posted " .$interval->d . ' days ago';
                                    elseif ($interval->h) echo "Posted " .$interval->h . ' hours ago';
                                    elseif ($interval->i) echo "Posted " .$interval->i . ' minutes ago';
                                    else echo "Posted now";
                                  ?>
                                </small></p>
                                </div>
                              </div>
                            </div>
                            <h5 class="card-title text-dark fw-bold fs-6 p-3 mb-2 rounded " style="background: #efefef;"><?= $posts['title'];?></h5>
                            <p class="card-text text-dark lh-lg"><?= $posts['content'];?></p>
                            <div class="d-flex justify-content-end">
                              <a href="" class="btn btn-outline-secondary mx-2"><i class='bx bx-edit-alt'></i></a>
                              <a href="controller/post_actions.php?id=<?= $posts['id']?>" class="btn btn-outline-danger"><i class='bx bx-trash'></i></a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Reply -->
                    <?php 
                     foreach ($replies as $reply) {
                      $time = new DateTime($reply['created_at']);
                      $now = new DateTime();
                      $interval = $time->diff($now,true);
                      ?>
                        <div class="card mb-3 px-3">
                            <div class="card-body">
                              <div class="row mb-4">
                                <div class="col d-flex profile">
                                  <img src="images/tz-logo.png" class="d-flex justify-content-start img-fluid border rounded-pill" alt="...">
                                  <div class="col mx-2">
                                    <h3 class="text-dark fs-5 m-0"><?= strtolower($reply['name']) ?></h3>
                                    <p class="card-text"><small class="text-muted">
                                      <?php 
                                        if ($interval->y) echo "Posted " .$interval->y . ' years ago';
                                        elseif ($interval->m) echo "Posted " .$interval->m . ' months ago';
                                        elseif ($interval->d) echo "Posted " .$interval->d . ' days ago';
                                        elseif ($interval->h) echo "Posted " .$interval->h . ' hours ago';
                                        elseif ($interval->i) echo "Posted " .$interval->i . ' minutes ago';
                                        else echo "Posted now";
                                      ?>
                                    </small></p>
                                  </div>
                                </div>
                              </div>
                              <p class="card-text text-dark lh-lg"><?= $reply['body']?></p>
                              <div class="col d-flex justify-content-end">
                                <!-- <button class="btn btn-outline-secondary" type="button">
                                <i class='bx bx-reply'> Reply</i>
                                </button> -->
                                <a href="controller/post_actions.php?thread=<?= $posts['title'] ?>&reply=<?= $reply['id']?>" class="btn btn-outline-danger"><i class='bx bx-trash'></i></a>
                              </div>
                            </div>
                      </div>
                    <?php }
                    ?>

                    <!-- end reply -->
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#replyToPost">
                    <i class='bx bx-reply'> Reply to Thread</i>
                    </button>
                    <?php include 'layout/reply-modal.php';?>
                    <!-- End card -->
                </div>
              </div>
        </div>
    </main>
    <!-- end main section -->

    <!-- start footer section -->
     <?php include 'layout/footer.php';?> 