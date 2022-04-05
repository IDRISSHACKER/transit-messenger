<div class="demandes">
    <table class="table" border="1px">
        <thead>
            <tr>
                <td>Destinateur</td>
                <td>Type de transaction</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach (getAllDemande() as $demande) { ?>
                <tr class="<?= $demande['readed'] == '0' ? "new" : "" ?> ">
                    <td><?= $demande["email"] ?></td>
                    <td><?= $demande["subjet"] ?></td>
                    <td>
                        <div class="row">
                            <a href="index.php?page=write&role=admin&demandeId=<?= $demande['id'] ?>" class="btn btn-danger">Repondre</a>
                            <div class="btn-more">
                                <button class="more">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </button>
                                <div class="more-menu">
                                    <ul>
                                        <li>
                                            <form action="#" method="POST">
                                                <input name=" id_demande" class="none" type="text" value="<?= $demande['id'] ?>" />
                                                <button type="submit" name="deleteDemande" href="" class="btn btn-secondary">Suprimer</button>
                                            </form>
                                        </li>
                                        <li>
                                            <form action="#" method="POST">
                                                <input name=" id_demande" class="none" type="text" value="<?= $demande['id'] ?>" />
                                                <button type="submit" name="read" href="" class="btn btn-secondary">Dejas Traité</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>