<?php require APPROOT.'/views/inc/header.php'; ?>
<a class="btn btn-outline-warning back-btn" href="<?= URLROOT; ?>/posts/show/<?= $data['id']; ?>"><i class="fa fa-backward"></i> Back</a>
        <div class="card text-bg-dark card-body mt-5 formcard">
            
            <h2>Edit Post</h2>
            <p style="color: gray;border-bottom:1px solid lightgray;padding-bottom:2%;">Please fill in all the fields</p>
            <form method="POST" action="<?= URLROOT; ?>/posts/edit/<?= $data['id']; ?>">
                <div class="form-group mb-4 ">
                    <label for="title">Title: <sup>*</sup></label>
                    <input type="text" name="title" id="title" class="form-control inputField form-control-lg <?= (!empty($data['title_err'])) ? 'is-invalid' : '' ?>" value="<?= $data['title'] ?>" >
                    <span class="invalid-feedback"><?= $data['title_err'] ?></span>
                </div>
                <div class="form-group mb-4">
                    <label for="body">Description: <sup>*</sup></label>
                    <textarea name="body" id="body" class="form-control inputField form-control-lg <?= (!empty($data['body_err'])) ? 'is-invalid' : '' ?>"><?= $data['body'] ?></textarea>
                    <span class="invalid-feedback"><?= $data['body_err'] ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-warning" value='Edit'/>
                </div>
            </form>
        </div>

<?php require APPROOT.'/views/inc/footer.php'; ?>