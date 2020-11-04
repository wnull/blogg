<?php require_once 'shared/header.php' ?>

<!-- content -->
<div class="container">
    <h1>Posts</h1>


    <div class="row">

				<?php if (empty($this->post)): ?>
					<li>
						<div class="l_g">
							<div class="col-md-12 praesent">
								<div class="l_g_r">
									<div class="dapibus">
										<h2>No blog posts found</h2>
                                    </div>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</li>
				<?php else: ?>
					<?php foreach ($this->post as $post): ?>

                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                               <div class="card-body">
                                   <p class="card-text"><b>Title:</b><br> <?=$post['title']?></p>

                                   <p class="card-text"><b>Short desc:</b><br> <?=$post['small_desc']?></p>
                                   <p class="card-text"><b>Author:</b><br> <?=$post['author']?></p>


                                   <div class="d-flex justify-content-between align-items-center">

                                        <div class="btn-group">
                                            <a type="button" href="<?=ROOT_URL?>?action=post&id=<?=$post['id']?>"
                                               class="btn btn-sm btn-outline-secondary">View</a>


                                            <?php if(!empty($_SESSION['active'])) : ?>

                                               <a type="button" href="<?=ROOT_URL?>?action=edit&id=<?=$post['id']?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                                            <?php endif ?>
                                        </div>


                                        <small class="text-muted"><?=$post['date']?></small>
                                    </div>
                                </div>
                            </div>
                        </div>



					<?php endforeach ?>
				<?php endif ?>

	 </div>

</div>

<!-- content -->	

<?php require_once 'shared/footer.php' ?>