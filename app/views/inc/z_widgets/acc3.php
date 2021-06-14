<div class="accordion" id="accordion<?= $id ?>">

    <div class="card">
        <div class="card-header" type="button" aria-expanded="false" data-toggle="collapse" data-target="#t<?= $id ?>1">
            <div class="row">
                <div class="col-6">
                    <div>На работу на велосипеде <span class="h2 text-success">PRO</span></div>
                    <div class="rating text-success pr-3">
                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                    </div>
                </div>
                <div class="col-3"><img src="/img/d.svg" alt=""> 0</div>
                <div class="col-3"><img src="/img/c.svg" alt=""> 500</div>
            </div>
        </div>

        <div id="t<?= $id ?>1" class="collapse" data-parent="#accordion<?=$id?>">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="task px-3 py-5 mb-3 rounded" style="background: #EAF9FF;"><b>Задача:</b><br>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tempus at lectus eu efficitur. Morbi eget purus quis arcu placerat laoreet eleifend vitae magna. Vestibulum ultrices, purus id euismod elementum, justo libero lobortis eros, at laoreet odio libero non sem. Mauris ac tempor metus. Donec imperdiet magna eu elit scelerisque tincidunt quis non velit. Maecenas sit amet rutrum est. Ut eu faucibus nisi.
                            <img src="/img/cat.png" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-6 d-flex flex-column">
                        <div class="row mb-3 align-items-center">
                            <div class="col-4 text-bold">
                                Кейсхолдер
                            </div>
                            <div class="col-2">
                                <?php $this->getPart('inc/widgets/user') ?>
                            </div>
                            <div class="col-6">
                                <div>Петров Денис</div>
                                <small>Программист</small>
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col-4 text-bold">
                                Автор квеста
                            </div>
                            <div class="col-2">
                                <?php $this->getPart('inc/widgets/user') ?>
                            </div>
                            <div class="col-6">
                                <div>Фарленков Егор</div>
                                <small>HR</small>
                            </div>
                        </div>

                        <div class="btn btn-lg btn-block bg-green rounded mt-auto py-3">
                            Принять участие
                        </div>
                        
                        <div class="btn btn-lg btn-block bg-orange rounded py-3">
                            Отклонить
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
                    <div>Без опозданий целый месяц</div>
                    <div class="rating text-success pr-3">
                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star text-muted"></i>
                    </div>
                </div>
                <div class="col-3"><img src="/img/d.svg" alt=""> 1</div>
                <div class="col-3"><img src="/img/c.svg" alt=""> 100</div>
            </div>
        </div>

        <div id="t<?= $id ?>2" class="collapse" data-parent="#accordion<?=$id?>">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="task px-3 py-5 mb-3 rounded" style="background: #EAF9FF;"><b>Задача:</b><br>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tempus at lectus eu efficitur. Morbi eget purus quis arcu placerat laoreet eleifend vitae magna. Vestibulum ultrices, purus id euismod elementum, justo libero lobortis eros, at laoreet odio libero non sem. Mauris ac tempor metus. Donec imperdiet magna eu elit scelerisque tincidunt quis non velit. Maecenas sit amet rutrum est. Ut eu faucibus nisi.
                            <img src="/img/cat.png" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-6 d-flex flex-column">
                        <div class="row mb-3 align-items-center">
                            <div class="col-4 text-bold">
                                Кейсхолдер
                            </div>
                            <div class="col-2">
                                <?php $this->getPart('inc/widgets/user') ?>
                            </div>
                            <div class="col-6">
                                <div>Петров Денис</div>
                                <small>Программист</small>
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col-4 text-bold">
                                Автор квеста
                            </div>
                            <div class="col-2">
                                <?php $this->getPart('inc/widgets/user') ?>
                            </div>
                            <div class="col-6">
                                <div>Фарленков Егор</div>
                                <small>HR</small>
                            </div>
                        </div>

                        <div class="btn btn-lg btn-block bg-green rounded mt-auto py-3">
                            Принять участие
                        </div>

                        <div class="btn btn-lg btn-block bg-orange rounded py-3">
                            Отклонить
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
                    <div>Помощь животным в питомниках <span class="h2 text-success">PRO</span></div>
                    <div class="rating text-success pr-3">
                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                    </div>
                </div>
                <div class="col-3"><img src="/img/d.svg" alt=""> 3</div>
                <div class="col-3"><img src="/img/c.svg" alt=""> 400</div>
            </div>
        </div>

        <div id="t<?= $id ?>3" class="collapse" data-parent="#accordion<?=$id?>">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="task px-3 py-5 mb-3 rounded" style="background: #EAF9FF;"><b>Задача:</b><br>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tempus at lectus eu efficitur. Morbi eget purus quis arcu placerat laoreet eleifend vitae magna. Vestibulum ultrices, purus id euismod elementum, justo libero lobortis eros, at laoreet odio libero non sem. Mauris ac tempor metus. Donec imperdiet magna eu elit scelerisque tincidunt quis non velit. Maecenas sit amet rutrum est. Ut eu faucibus nisi.
                            <img src="/img/cat.png" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-6 d-flex flex-column">
                        <div class="row mb-3 align-items-center">
                            <div class="col-4 text-bold">
                                Кейсхолдер
                            </div>
                            <div class="col-2">
                                <?php $this->getPart('inc/widgets/user') ?>
                            </div>
                            <div class="col-6">
                                <div>Петров Денис</div>
                                <small>Программист</small>
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col-4 text-bold">
                                Автор квеста
                            </div>
                            <div class="col-2">
                                <?php $this->getPart('inc/widgets/user') ?>
                            </div>
                            <div class="col-6">
                                <div>Фарленков Егор</div>
                                <small>HR</small>
                            </div>
                        </div>

                        <div class="btn btn-lg btn-block bg-green rounded mt-auto py-3">
                            Принять участие
                        </div>

                        <div class="btn btn-lg btn-block bg-orange rounded py-3">
                            Отклонить
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>