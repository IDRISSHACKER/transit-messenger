<div class="message">
    <section>
        <div class="row">
            <div class="col-sm">
                <img class="illus" src="../../asset/illustration/message.svg" alt="">
            </div>
            <div class="col-sm">
                <form action="#" method="post" class="form" autocomplete="off">
                    <?php if ($errMsg) { ?>
                        <div class="alert alert-danger"><?= @$errMsg ?></div>
                    <?php } ?>
                    <div class="banner-title">
                        Formulaire de demande d'un service
                    </div>
                    <div class="form-group">
                        <div class="form-group-title">
                            Informations personnelles
                        </div>
                        <div class="form-control">
                            <label for="email">Votre adresse email</label>
                            <input type="email" name="email" id="email">
                        </div>
                        <div class="form-control">
                            <label for="tel">Votre numero de téléphone</label>
                            <input type="tel" name="tel" id="tel">
                        </div>
                        <div class="form-control">
                            <label for="nom">Votre nom</label>
                            <input type="text" name="nom" id="nom">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group-title">
                            Information sur la transaction
                        </div>
                        <div class="form-control">
                            <label for="">Que type de transaction souhaitez vous effectuer:</label>
                            <div class="none">
                                <input type="checkbox" checked="on" name="export" id="export">
                            </div>
                            <div class="choices">
                                <div class="row">
                                    <div class="col-sm">
                                        <label for="export">
                                            <div class="choice choice-active">
                                                <div class="img">
                                                    <img src="../../asset/icon/upload.svg" alt="">
                                                </div>
                                                <div class="title">Exporter</div>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="col-sm">
                                        <label for="export">
                                            <div class="choice">
                                                <div class="img">
                                                    <img src="../../asset/icon/download.svg" alt="">
                                                </div>
                                                <div class="title">Importer</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-lg" name="demande">Soumettre ma demande</button>
                </form>
                <br />
                <br />
            </div>
        </div>
    </section>
</div>