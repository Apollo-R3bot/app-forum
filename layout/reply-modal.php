<div class="modal fade" id="replyToPost" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="createDiscussionLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="controller/post_actions.php" method="POST">
      <div class="modal-header">
        <input type="hidden" name="post" value="<?= $posts['id'];?>">
        <input type="hidden" name="post_content" value="<?= $posts['title'];?>">

        <label for="reply">Reply to <text class="text-primary">POST</text></label>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input id="x" type="hidden" name="content">
        <trix-editor input="x"></trix-editor>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" name="saveReply">Post</button>
      </div>
      </form>
    </div>
  </div>
</div>