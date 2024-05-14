<?php require APPROOT.'/views/inc/header.php'; ?>

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body text-bg-dark mt-5 formcard">
            <h2>Create An Account</h2>
            <p style="color: gray;border-bottom:1px solid lightgray;padding-bottom:2%;">Please fill out this form to register with us</p>
            <form method="POST" action="<?= URLROOT; ?>/users/register">
                <div class="form-group mb-4 mt-8">
                    <label for="name">Name: <sup>*</sup></label>
                    <input type="text" name="name" id="name" class="form-control inputField form-control-lg <?= (!empty($data['name_err'])) ? 'is-invalid' : '' ?>" value="<?= $data['name'] ?>" >
                    <span class="invalid-feedback"><?= $data['name_err'] ?></span>
                </div>
                <div class="form-group mb-4">
                    <label for="email">Email: <sup>*</sup></label>
                    <input type="email" name="email" id="email" class="form-control inputField form-control-lg <?= (!empty($data['email_err'])) ? 'is-invalid' : '' ?>" value="<?= $data['email'] ?>" >
                    <span class="invalid-feedback"><?= $data['email_err'] ?></span>
                </div>
                <div class="form-group mb-4">
                    <label for="password">Password: <sup>*</sup></label>
                    <input type="password" name="password" id="password" class="form-control inputField form-control-lg <?= (!empty($data['password_err'])) ? 'is-invalid' : '' ?>" value="<?= $data['password'] ?>" >
                    <span class="invalid-feedback"><?= $data['password_err'] ?></span>
                </div>
                <div class="form-group mb-4">
                    <label for="confirm_password">Confirm Password: <sup>*</sup></label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control inputField form-control-lg <?= (!empty($data['confirm_password_err'])) ? 'is-invalid' : '' ?>" value="<?= $data['confirm_password'] ?>" >
                    <span class="invalid-feedback"><?= $data['confirm_password_err'] ?></span>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Register" class="btn btn-warning  btn-block" >
                    </div>
                    <div class="col">
                        <a href="<?= URLROOT; ?>/users/login" class="btn btn-dark btn-block">Have an account? Login</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php require APPROOT.'/views/inc/footer.php'; ?>