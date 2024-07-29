<?php
  require 'controller/category_actions.php';
  require 'controller/post_actions.php';

  include 'layout/header.php';
?>
    <!-- start main section -->
    <main>
        <div class="container">
          <!-- Top Theread search and button -->
          <div class="col mb-3 d-flex justify-content-between">
            <!-- Start Post Modal -->
             <?php include 'layout/post-modal.php';?>
             <a href="" class="btn btn-primary create-btn d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#createDiscussion"><i class='bx bx-plus'></i><span>New Discussion</span></a>
             <!-- End Post modal -->
              
            <form action="" class="row g-2">
              <div class="col-auto">
                <select name="" id="" class="form-select rounded-pill">
                  <option value="General" selected>All</option>
                  <?php foreach ($categories as $category) { 
                      echo "<option value=".$category['id'].">".$category['title']."</option>";
                  } ?>
                </select>
              </div>
              <div class="col-auto">
                <input type="text" class="form-control rounded-pill" placeholder="Begin your search" name="" id="">
              </div>
            </form>

          </div>

            <div class="row">
                <!-- Nav -->
                <div class="col-md-2 align-self-start category">
                 <?php include 'layout/nav-menu.php';?>
                </div>

                <div class="col-md-10">

                  <!-- Posts -->
                  <?php foreach ($posts as $post) { ?>
                    <div class="col thread">
                      <?php
                              $time = new DateTime($post['created_at']);
                              $now = new DateTime();
                              $interval = $time->diff($now,true);

                              $user = $conn->prepare("SELECT name FROM users WHERE id=:userId");
                              $user->execute([':userId' => $post['userId']]);
                              $username = $user->fetch();
                              
                          ?>
                            <a href="discuss.php?thread=<?= $post['title'] ?>" class="text-dark">
                              <div class="card mb-3">
                                <div class="card-body">
                                  <div class="col mb-2 d-flex profile">
                                    <img src="images/tz-logo.png" class="d-flex justify-content-start img-fluid border rounded-pill" alt="...">
                                    <div class="col mx-2">
                                    <span><h3 class="text-dark fs-5 m-0"><?= strtolower($username['name']) ?></h3></span>
                                    <p class="card-text"><small class="text-muted">
                                      <?php
                                        $time = new DateTime($post['created_at']);
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
                                    <div class="col d-flex justify-content-end">
                                      <p class="card-text"><small class="text-muted me-3">Views</small></p>
                                      <p class="card-text"><small class="text-muted me-3"><?= $post['totalReplies'] ?> Replies</small></p>
                                    </div>
                                  </div>
                                    <div class="col d-flex justify-content-between">
                                      <h5 class="card-title fw-bold"><?= mb_strimwidth($post['title'], 0, 40, "...")?></h5>
                                      
                                    </div>
                                  <p class="card-text m-0"><?= mb_strimwidth(nl2br(str_replace(array("\r","\n","<br>"), "", $post['content'])), 0, 155, "...");?></p>
                                </div>
                              </div>
                            </a>
                          </div>
                        <?php }?>
                </div>
            </div>
        </div>
    </main>
    <!-- end main section -->

    <!-- start footer section -->
    <?php include 'layout/footer.php';?>
    <!-- end footer section -->