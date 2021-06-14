<div class="accordion" id="accordion<?= $id ?>">

    <div class="card">
        <div class="card-header" type="button" aria-expanded="false" data-toggle="collapse" data-target="#t<?= $id ?>1">
            <div class="row">
                <div class="col-6">
                    <div>Разработать логотип <span class="h2 text-success">PRO</span></div>
                    <div class="rating text-success pr-3">
                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                    </div>
                </div>
                <div class="col-3"><img src="/img/d.svg" alt=""> 1</div>
                <div class="col-3"><img src="/img/c.svg" alt=""> 350</div>
            </div>
        </div>

        <div id="t<?= $id ?>1" class="collapse" data-parent="#accordion<?=$id?>">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="task px-3 py-5 mb-3 rounded" style="background: #EAF9FF;"><b>Задача:</b><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tempus at lectus eu efficitur. </div>

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
    </div>
    <div class="card">
        <div class="card-header" type="button" aria-expanded="false" data-toggle="collapse" data-target="#t<?= $id ?>2">
            <div class="row">
                <div class="col-6">
                    <div>Сверстать главную страницу</div>
                    <div class="rating text-success pr-3">
                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star text-muted"></i>
                    </div>
                </div>
                <div class="col-3"><img src="/img/d.svg" alt=""> 0</div>
                <div class="col-3"><img src="/img/c.svg" alt=""> 200</div>
            </div>
        </div>

        <div id="t<?= $id ?>2" class="collapse" data-parent="#accordion<?=$id?>">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="task px-3 py-5 mb-3 rounded" style="background: #EAF9FF;"><b>Задача:</b><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tempus at lectus eu efficitur. </div>

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
    </div>
    <div class="card">
        <div class="card-header" type="button" aria-expanded="true" data-toggle="collapse" data-target="#t<?= $id ?>3">
            <div class="row">
                <div class="col-6">
                    <div>Сделать редизайн сайта  <span class="h2 text-success">PRO</span></div>
                    <div class="rating text-success pr-3">
                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star text-muted"></i>
                    </div>
                </div>
                <div class="col-3"><img src="/img/d.svg" alt=""> 0</div>
                <div class="col-3"><img src="/img/c.svg" alt=""> 400</div>
            </div>
        </div>

        <div id="t<?= $id ?>3" class="collapse show" data-parent="#accordion<?=$id?>">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="task px-3 py-5 mb-3 rounded" style="background: #EAF9FF;"><b>Задача:</b><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tempus at lectus eu efficitur. </div>

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
    </div>
</div>