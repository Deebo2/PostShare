<?php require APPROOT.'/views/inc/header.php'; ?>
<div class="blog">
<div class="row mb-4">
    <div class="col-md-10">
        <h1 class="post-page">Posts</h1>
    </div>
    <div class="col-md-2 mt-2">
        <a class="btn btn-primary" href="<?= URLROOT; ?>/posts/add">
            <i class="fa fa-pencil"></i>Add Post
        </a>
    </div>
</div>
<?php foreach($data['posts'] as $post): ?>
<div class="card card-body bg-dark mb-3">
    <h4 class="card-title"><?= $post->title; ?></h4>
    <div class="bg-dark post-info p-2 mb-3">Written by <?= $post->name; ?> On <?= $post->postCreated_at; ?></div>
    <p class="card-text"><?= $post->body; ?></p>
    <a class="btn btn-outline-warning" href="<?= URLROOT; ?>/posts/show/<?= $post->postId; ?>">More</a>
</div>

<?php endforeach; ?>
</div>
<?= flash('post_message');  ?>
<?php require APPROOT.'/views/inc/footer.php'; ?>