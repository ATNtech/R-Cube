<div class="card">
    <div class="card-body">
        <h3>Задача (наименование / заголовок)</h3>

        <div class="row rounded mb-3 bg-light no-gutters p-3 lead">
            <div class="rating col-6 text-muted text-right pr-3">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>

            <div class="col-6">
                <div class="row text-left">
                    <div class="diamonds col-2">
                        <i class="fa fa-gem text-green"></i>
                        000
                    </div>

                    <div class="moneys col">
                        <i class="fa fa-coins text-green"></i>
                        000
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="task px-3 py-5 mb-3 rounded" style="background: #EAF9FF;">Задача:</div>

                <div class="files text-white p-3 mb-3 rounded text-center" style="background: linear-gradient(90deg, rgba(234, 249, 255, 0.5) 0%, rgba(255, 255, 255, 0) 100%), #08A652;">
                    <div class="mb-3"><b>Файлы для данного проекта:</b></div>
                    <div class="row align-items-center">
                        <div class="col-6">
                            <div class="mb-2">
                                <i class="fa fa-4x fa-file-alt"></i>
                                <span>Название1</span>
                            </div>
                            <div class="btn btn-success py-0 rounded text-white">скачать</div>
                        </div>
                        <div class="col-6">
                            <div class="mb-2">
                                <i class="fa fa-4x fa-file-alt"></i>
                                <span>Название1</span>
                            </div>
                            <div class="btn btn-success py-0 rounded text-white">скачать</div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <div class="col-4 text-bold">
                        Автор задачи
                    </div>
                    <div class="col-2">
                        <?php $this->getPart('inc/widgets/user') ?>
                    </div>
                    <div class="col-6">
                        <div>Фамилия Имя Отчество</div>
                        <small>Должность</small></span>
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-4 text-bold">
                        Ответственное лицо
                    </div>
                    <div class="col-2">
                        <?php $this->getPart('inc/widgets/user') ?>
                    </div>
                    <div class="col-6">
                        <div>Фамилия Имя Отчество</div>
                        <small>Должность</small></span>
                    </div>
                </div>
            </div>
            <div class="col-6 d-flex flex-column">
                <div class="user-list row pt-3  align-items-center">
                    <?php for ($i=0;$i<6;$i++):?>
                        <div class="col-3 text-center mb-3">
                            <?php $this->getPart('inc/widgets/user') ?>
                            <div class="small">Роль в проекте</div>
                            <div class="small text-green">Фамилия <br> Имя Отчество</div>
                        </div>
                    <?php endfor; ?>
                    <div class="col-3 text-center mb-3 align-self-baseline">
                        <div class="mb-3"><a href="#"><i class="fa fa-4x fa-plus-circle text-light-blue"></i></a></div>
                        <div class="small">Добавить</div>
                    </div>
                </div>

                <div class="btn btn-lg btn-block bg-green rounded mt-auto py-3">
                    Начать
                </div>
            </div>
        </div>





    </div>
</div>

