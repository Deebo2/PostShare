<?php require APPROOT.'/views/inc/header.php'; ?>
<a class="btn btn-outline-warning back-btn mb-4" href="<?= URLROOT; ?>/posts"><i class="fa fa-backward"></i> Back</a>
<div class="blog mb-3">

<div class="card card-body bg-dark mb-3">
    <h4 class="card-title"><?= $data['post']->title; ?></h4>
    <div class="bg-dark post-info p-2 mb-3"> Written by <?= $data['user']->name ?> On <?= $data['post']->created_at; ?></div>
    <p class="card-text"><?= $data['post']->body; ?></p>
   
</div>


<?php if($data['post']->user_id == $_SESSION['user_id']): ?>
    <div class="edit-delete">
    <a class="btn btn-outline-warning back-btn" href="<?= URLROOT; ?>/posts/edit/<?= $data['post']->id; ?>">Edit</a>
    <form action="<?= URLROOT; ?>/posts/destroy/<?= $data['post']->id; ?>" method="POST">
        <input type="submit" class="btn btn-danger" value="Delete" />
    </form>
    </div>
<?php  endif;  ?>

</div>
<?= flash('post_message');  ?>
<?php require APPROOT.'/views/inc/footer.php'; ?>