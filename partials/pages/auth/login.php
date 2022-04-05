<div class="logo">
    <img src="favicon.ico" alt="logo">
</div>
<div class="login">
    <section>
        <div class="row">
            <div class="col-sm">
                <form action="#" method="post" class="form" autocomplete="off">
                    <?php if ($errMsg) { ?>
                        <div class="alert alert-danger"><?= @$errMsg ?></div>
                    <?php } ?>
                    <div class="form-group">
                        <div class="form-group-title">
                            Se connecter à Africa Transit Messenger
                        </div>
                        <div class="form-control">
                            <label for="email"> Adresse email</label>
                            <input type="email" name="email" id="email">
                        </div>
                        <div class="form-control">
                            <label for="pwd">Mot de passe</label>
                            <input type="password" name="pwd" id="pwd">
                        </div>
                        <div class="form-control">
                            <button class="btn btn-primary btn-lg" name="login">Se connecter</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm">
                <!--<img class="illus" src="../../asset/illustration/message.svg" alt="">-->
            </div>
        </div>
    </section>
</div>