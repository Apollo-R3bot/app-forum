<?php
  require 'controller/category_actions.php';
  require 'controller/post_actions.php';

  include 'layout/header.php';
?>
    <!-- start main section -->
    <main>
        <div class="container">
            <div class="row">
                <!-- Nav -->
                 <?php include 'layout/nav-menu.php';?>

                <div class="col-md-10">
                  <!-- Top Theread search and button -->
                  <div class="col mb-3 d-flex justify-content-between">
                    
                    <form action="">
                      <input type="text" class="form-control rounded-pill" name="" id="">
                    </form>
                    <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createDiscussion">New Discussion</a>

                   <!-- Modal -->
                    <div class="modal fade" id="createDiscussion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="createDiscussionLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <form action="controller/post_actions.php" method="POST">
                          <div class="modal-header">
                            <div class="col-md-9">
                              <input type="text" class="form-control focus shadow-none border-0 fw-bolder" name="title" placeholder="Add a title">
                            </div>
                            <div class="col-md-3">
                              <select class="form-select shadow-none rounded-pill" name="category" required>
                                <option selected>Select category..</option>
                                <?php foreach ($categories as $category) { 
                                    echo "<option value=".$category['id'].">".$category['title']."</option>";
                                } ?>
                              </select>
                            </div>

                            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                          </div>
                          <div class="modal-body">
                              <input id="x" type="hidden" name="body">
                              <trix-editor input="x" placeholder="What's on your mind?" class="shadow-none border-0" required></trix-editor>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" name="savePost">Post</button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>

                  </div>
                  <?php foreach ($posts as $post) { ?>
                    <div class="col thread">
                      <?php
                              $time = new DateTime($post['created_at']);
                              $now = new DateTime();
                              $interval = $time->diff($now,true);
                              
                          ?>
                            <a href="discuss.php">
                              <div class="card mb-3">
                                <div class="row g-0">
                                  <div class="col-md-1 p-2 text-center">
                                    <img src="images/tz-logo.png" width="60" height="60" class="d-flex justify-content-start img-fluid border rounded-pill" alt="...">
                                    <!-- <p>Apollo</p> -->
                                  </div>
                                  <div class="col-md">
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="col d-flex justify-content-between">
                                          <h5 class="card-title"><?= $post['title'];?></h5>
                                          <div class="col d-flex justify-content-end">
                                            <p class="card-text"><small class="text-muted me-3">Views</small></p>
                                            <p class="card-text"><small class="text-muted me-3">Replies</small></p>
                                            <span class="btn btn-outline-warning rounded-pill px-2   fs-6">Success</span>
                                          </div>
                                        </div>
                                      </div>
                                      <p class="card-text m-0 text-dark"><?= str_replace("\n", "", $post['content']);?></p>
                                      <p class="card-text m-0"><small class="text-muted">
                                        <?php
                                        if ($interval->y) echo "Posted " .$interval->y . ' years ago';
                                        elseif ($interval->m) echo "Posted " .$interval->m . ' months ago';
                                        elseif ($interval->d) echo "Posted " .$interval->d . ' days ago';
                                        elseif ($interval->h) echo "Posted " .$interval->h . ' hours ago';
                                        elseif ($interval->i) echo "Posted " .$interval->i . ' minutes ago';
                                        else echo "Posted now";
                                        ?></small></p>
                                    </div>
                                  </div>
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