<div class="card" style="width: 600px;">
    <div class="card-body">
        <h3 class="mb-3">Рандомный челлендж</h3>

        <div class="row rounded mb-3 bg-light no-gutters p-3 lead">
            <div class="rating col-12 text-muted text-center mb-4">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>

            <div class="diamonds col-4 text-right">
                <i class="fa fa-gem text-green"></i>
                000
            </div>

            <div class="moneys col-4 text-center">
                <i class="fa fa-coins text-green"></i>
                000
            </div>

            <div class="moneys col-4 text-left text-green lead">
                PRO
            </div>
        </div>

        <div class="task px-3 py-5 mb-3 rounded" style="background: #EAF9FF;">Задача:</div>

        <div class="row mb-3 align-items-center">
            <div class="col-5 text-bold">
                Автор задачи
            </div>
            <div class="col-2">
                <?php $this->getPart('inc/widgets/user') ?>
            </div>
            <div class="col-5">
                <div>Фамилия Имя Отчество</div>
                <small>Должность</small></span>
            </div>
        </div>

        <div class="row mb-3 align-items-center">
            <div class="col-5 text-bold">
                Ответственное лицо
            </div>
            <div class="col-2">
                <?php $this->getPart('inc/widgets/user') ?>
            </div>
            <div class="col-5">
                <div>Фамилия Имя Отчество</div>
                <small>Должность</small></span>
            </div>
        </div>

        <div class="btn btn-lg btn-block py-3 rounded bg-green mb-3">
            Принять участие
        </div>

        <div class="btn btn-primary btn-lg btn-block py-3 rounded bg-orange" style="color:white!important;border-color:#fd7e14!important">
            Отклонить
        </div>

    </div>
</div>

