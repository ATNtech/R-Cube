<h1 class="uppercase"><?= $id ?></h1>

<div class="card">
    <div class="card-header bg-green" type="button" data-toggle="collapse" data-target="#collapse-<?= $id ?>-1" aria-expanded="false">Задача</div>
</div>
<div id="collapse-<?= $id ?>-1" class="collapse" aria-labelledby="headingOne">
    <?php $this->getPart('inc/widgets/kb-c') ?>
</div>
<div class="card">
    <div class="card-header bg-orange" type="button" data-toggle="collapse" data-target="#collapse-<?= $id ?>-2" aria-expanded="false">Задача 2</div>
</div>
<div id="collapse-<?= $id ?>-2" class="collapse" aria-labelledby="headingTwo">
    <?php $this->getPart('inc/widgets/kb-c') ?>
</div>
<div class="card">
    <div class="card-header bg-blue" type="button" data-toggle="collapse" data-target="#collapse-<?= $id ?>-3" aria-expanded="false">Задача 3</div>
</div>
<div id="collapse-<?= $id ?>-3" class="collapse" aria-labelledby="headingThree">
    <?php $this->getPart('inc/widgets/kb-c') ?>
</div>
