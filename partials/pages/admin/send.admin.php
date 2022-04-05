<?php if ($success) { ?>
    <div class="alert alert-success"><?= @$successMsg ?></div>
<?php } ?>
<?php if ($error) { ?>
    <div class="alert alert-danger"><?= @$errorMsg ?></div>
<?php } ?>
<div class="destinataire">
    <div class="avatar">
        <img src="../../../asset/icon/userW.svg" alt="">
    </div>
    <div class="infos">
        <div class="infos-title"><?= getUser()["nom"] ?></div>
        <div class="info-content"><?= getUser()["email"] ?></div>
        <div class="info-content tag"><?= getUser()["tel"] ?></div>
    </div>
</div>
<div class="write">
    <form action="#" method="POST" class="form">
        <div class="form-area">
            <h2 class="area-label">Redigez votre message</h2>
            <br />
            <div class="none">
                <input type="text" name="receiverId" value="<?= getUser()['id'] ?>">
                <input type="text" name="receiverEmail" value="<?= getUser()['email'] ?>">
                <input type="text" name="receiverName" value="<?= getUser()['nom'] ?>">
            </div>
            <textarea rows="6" name="msg" id="" class="fieldsed"></textarea>
        </div>
        <button class="btn btn-primary btn-lg" name="sendMsg">Envoyer le message</button>
    </form>
</div>