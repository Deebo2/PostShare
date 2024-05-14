<nav class="p-3 text-bg-dark mb-3 w-full">
 
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <!-- <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a> -->
        <strong style="color:#d1d11f;margin-right:1%;"><?= SITENAME; ?></strong>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="<?= URLROOT; ?>" class="nav-link px-2 text-white">Home</a></li>
          <li><a href="<?= URLROOT; ?>/pages/about" class="nav-link px-2 text-white">About</a></li>
          <!-- <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
          <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li> -->
          
        </ul>


        <div class="text-end">
          <?php if(isset($_SESSION['user_id'])): ?>
            <strong>Welcome : <?= $_SESSION['user_name']; ?></strong>
            <button type="button" class="btn btn-warning"><a href="<?= URLROOT; ?>/users/logout" class="nav-link text-white">Logout</a></button>
          <?php else: ?>
            <button type="button" class="btn  me-2"><a href="<?= URLROOT; ?>/users/login" class="nav-link text-white">Login</a></button>
          <button type="button" class="btn btn-warning"><a href="<?= URLROOT; ?>/users/register" class="nav-link text-white">Register</a></button>
          <?php endif; ?>
          
        </div>
      </div>
 
</nav>
