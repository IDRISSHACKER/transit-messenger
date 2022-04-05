<div class="dashboard">
    <div class="row">
        <div class="card card-primary">
            <div class="content"><?= count(getAllDemande()) - count(getDemandeReaded()) ?> </div>
            <div class="title">Demandes non traité</div>
        </div>
        <div class="card card-secondary">
            <div class="content"><?= count(getDemandeReaded()) ?></div>
            <div class="title">Demandes traité</div>
        </div>
        <div class="card">
            <div class="content"><?= count(getAllDemande()) ?></div>
            <div class="title">Toutes les demandes</div>
        </div>
    </div>
</div>