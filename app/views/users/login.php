<?php require APPROOT.'/views/inc/header.php'; ?>

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card text-bg-dark card-body mt-5 formcard">
            
            <h2>Login Page</h2>
            <p style="color: gray;border-bottom:1px solid lightgray;padding-bottom:2%;">Please fill in your credentials to log in</p>
            <form method="POST" action="<?= URLROOT; ?>/users/login">
                <div class="form-group mb-4 ">
                    <label for="email">Email: <sup>*</sup></label>
                    <input type="email" name="email" id="email" class="form-control inputField form-control-lg <?= (!empty($data['email_err'])) ? 'is-invalid' : '' ?>" value="<?= $data['email'] ?>" >
                    <span class="invalid-feedback"><?= $data['email_err'] ?></span>
                </div>
                <div class="form-group mb-4">
                    <label for="password">Password: <sup>*</sup></label>
                    <input type="password" name="password" id="password" class="form-control inputField form-control-lg <?= (!empty($data['password_err'])) ? 'is-invalid' : '' ?>" value="<?= $data['password'] ?>" >
                    <span class="invalid-feedback"><?= $data['password_err'] ?></span>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="login" class="btn btn-warning btn-block" >
                    </div>
                    <div class="col">
                        <a href="<?= URLROOT; ?>/users/register" class="btn btn-dark btn-block">no account? Register</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= flash('register_success');  ?>
<?php require APPROOT.'/views/inc/footer.php'; ?>