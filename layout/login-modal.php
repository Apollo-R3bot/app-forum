<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="createDiscussionLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content p-4 text-white">
      <form action="controller/auth.php" method="POST">
      <div class="modal-header">
        <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="fw-bold text-center fs-2">Log in</p>
        <form action="" method="post" class="g-0">
          <div class="col mb-3">
            <label for="email">Email</label>
            <input type="text" name="email" id="" class="form-control shadow-none border-0 border-bottom text-white" placeholder="Enter email">
          </div>
          <div class="col mb-3">
            <label for="password">Password</label>
            <input type="password" name="password" id="" class="form-control shadow-none border-0 border-bottom text-white" placeholder="Enter password">
          </div>
          <div class="col mb-3">
            <button type="submit" class="btn btn-primary w-100" name="login">Log in</button>
          </div>
        </form>
      </div>
      <div class="modal-footer d-flex justify-content-between">
        <a href="" type="" class="text-secondary" data-bs-dismiss="modal">Forget your password.?</a>
        <a href="" type="submit" class="text-primary" name="savePost">Sign up</a>
      </div>
      </form>
    </div>
  </div>
</div>