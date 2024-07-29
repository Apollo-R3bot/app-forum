<?php
  require 'controller/category_actions.php';
  require 'controller/post_actions.php';

  include 'layout/header.php';
?>
    <!-- start main section -->
    <main>
        <div class="container">
          <!-- Start Post Modal -->
          <div class="col-md-2">
            <?php include 'layout/post-modal.php';?>
             <a href="" class="btn btn-primary create-btn d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#createDiscussion"><i class='bx bx-plus'></i><span>New Discussion</span></a>
            </div>
            <!-- End Post modal -->
            <div class="row">
              <!-- Nav -->
              <div class="col-md-2 align-self-start category">
                 <?php include 'layout/nav-menu.php';?>
              </div>
              <div class="col-md-10">
                 <!-- Channels -->
                  <div class="row">
                  <?php foreach ($categories as $category) { ?>
                    <div class="col-md-6">
                      <div class="col thread">
                        <a href="index.php?category=<?= $post['title'];?>">
                          <div class="card mb-3">
                            <div class="row g-0">
                              <div class="col-md">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col d-flex justify-content-between">
                                      <h5 class="card-title"><?= $category['title'];?></h5>
                                      <div class="col d-flex justify-content-end">
                                        <p class="card-text"><small class="text-muted me-3">235 Conversations</small></p>
                                      </div>
                                    </div>
                                  </div>
                                  <p class="card-text m-0 text-dark"><?= mb_strimwidth(nl2br(str_replace(array("\r","\n","<br>"), "", $category['description'])), 0, 125, "...");?></p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                  <?php }?>
                  </div>
                  <!-- End Channels -->
                </div>
            </div>
        </div>
    </main>
    <!-- end main section -->

    <!-- start footer section -->
    <?php include 'layout/footer.php';?>
    <!-- end footer section -->