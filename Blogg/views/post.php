<?php require_once 'shared/header.php' ?>



<div class="row-cols-12">

    <div class="card">
        <div class="card-header">
            <b>Title</b>: <?= $this->post['title']?>
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p><b>Small description</b>:<br> <?= $this->post['small_desc']?></p>
                <p><b>Full description</b>:<br> <?= $this->post['content']?></p>
                <footer class="blockquote-footer">© <?= $this->post['author'] ?></footer>
            </blockquote>
        </div>
    </div><br>
    <a href="<?= ROOT_URL ?>/?action=blogPosts" class="btn btn-primary">Back</a>

</div>

<?php require_once 'shared/footer.php' ?>