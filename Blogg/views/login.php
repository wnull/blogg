<?php require_once 'shared/header.php' ?>

    <!-- content -->
    <div class="content">
        <div class="container">
            <div class="load_more">
                <div class="row">

                    <div class="col-lg-8 col-lg-offset-2">

                        <h1>Login</h1>

                        <?php if (!empty($this->msgError)): ?>
                            <div class="alert alert-danger"><?=$this->msgError?></div>
                        <?php var_dump($_POST)?>

                        <?php endif ?>

                        <?php if (!empty($this->msgSuccess)): ?>
                            <div class="alert alert-success"><?=$this->msgSuccess?></div>
                        <?php endif ?>


                            <form method="post" action="" role="form">

                                <div class="messages"></div>

                                <div class="controls">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="username"> For testing purposes, username is : admin </label><br/>
                                                <input id="username" type="text" name="username" class="form-control" placeholder="Enter your username." required="required" data-error="Username is required.">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="submit" name="add_submit" class="btn btn-success btn-send" value="Login">
                                        </div>
                                    </div>

                            </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- content -->

<?php require_once 'shared/footer.php' ?>
