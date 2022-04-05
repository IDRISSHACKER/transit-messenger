<div class="demandes">
    <table class="table" border="1px">
        <thead>
            <tr>
                <td>Destinataire</td>
                <td>Contenue</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach (getAllMail() as $email) {
            ?>
                <tr class="">
                    <td><?= $email["email"] ?></td>
                    <td><?= short($email["msg"], 40) ?></td>
                    <td>
                        <div class="row">
                            <a href="index.php?page=removeEmail&role=admin&mailId=<?= $email['id'] ?>" class="btn btn-danger">Retirer</a>
                            <div class="btn-more">
                                <button class="more">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </button>
                                <div class="more-menu">
                                    <ul>
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