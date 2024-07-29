<div class="modal fade" id="createDiscussion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="createDiscussionLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="controller/post_actions.php" method="POST">
      <div class="modal-header">
        <div class="col-md-9">
          <input type="text" class="form-control focus shadow-none border-0 fw-bolder" name="title" placeholder="Add a title" required>
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
          <input id="x" type="hidden" name="body" require>
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