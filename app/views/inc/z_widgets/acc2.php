<div class="accordion" id="accordion<?= $id ?>">

    <div class="card">
        <div class="card-header" type="button" aria-expanded="false" data-toggle="collapse" data-target="#t<?= $id ?>1">
            <div class="row">
                <div class="col-6">
                    <div>На работу на велосипеде</div>
                </div>
                <div class="col-3"><i class="fa fa-thumbs-up fa-2x text-success"></i> 100</div>
                <div class="col-3"><i class="fa fa-thumbs-down fa-2x text-orange"></i> 20</div>
            </div>
        </div>

        <div id="t<?= $id ?>1" class="collapse" data-parent="#accordion<?=$id?>">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="task px-3 py-5 mb-3 rounded" style="background: #EAF9FF;"><b>Задача:</b><br>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tempus at lectus eu efficitur. Morbi eget purus quis arcu placerat laoreet eleifend vitae magna. Vestibulum ultrices, purus id euismod elementum, justo libero lobortis eros, at laoreet odio libero non sem. Mauris ac tempor metus. Donec imperdiet magna eu elit scelerisque tincidunt quis non velit. Maecenas sit amet rutrum est. Ut eu faucibus nisi.
                        </div>

                        <div class="btn btn-lg btn-block bg-green rounded mt-auto py-3">
                            Проголосовать ЗА
                        </div>
                    </div>
                    <div class="col-6 d-flex flex-column">
                        <img src="/img/cat.png" class="img-fluid" alt="">

                        <div class="btn btn-lg btn-block bg-orange rounded mt-auto py-3">
                            Проголосовать ПРОТИВ
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
                </div>
                <div class="col-3"><i class="fa fa-thumbs-up fa-2x text-success"></i> 76</div>
                <div class="col-3"><i class="fa fa-thumbs-down fa-2x text-orange"></i> 44</div>
            </div>
        </div>

        <div id="t<?= $id ?>2" class="collapse" data-parent="#accordion<?=$id?>">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="task px-3 py-5 mb-3 rounded" style="background: #EAF9FF;"><b>Задача:</b><br>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tempus at lectus eu efficitur. Morbi eget purus quis arcu placerat laoreet eleifend vitae magna. Vestibulum ultrices, purus id euismod elementum, justo libero lobortis eros, at laoreet odio libero non sem. Mauris ac tempor metus. Donec imperdiet magna eu elit scelerisque tincidunt quis non velit. Maecenas sit amet rutrum est. Ut eu faucibus nisi.
                        </div>

                        <div class="btn btn-lg btn-block bg-green rounded mt-auto py-3">
                            Проголосовать ЗА
                        </div>
                    </div>
                    <div class="col-6 d-flex flex-column">
                        <img src="/img/cat.png" class="img-fluid" alt="">

                        <div class="btn btn-lg btn-block bg-orange rounded mt-auto py-3">
                            Проголосовать ПРОТИВ
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
                    <div>Помощь животным в питомниках</div>
                </div>
                <div class="col-3"><i class="fa fa-thumbs-up fa-2x text-success"></i> 83</div>
                <div class="col-3"><i class="fa fa-thumbs-down fa-2x text-orange"></i> 2</div>
            </div>
        </div>

        <div id="t<?= $id ?>3" class="collapse show" data-parent="#accordion<?=$id?>">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="task px-3 py-5 mb-3 rounded" style="background: #EAF9FF;"><b>Задача:</b><br>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tempus at lectus eu efficitur. Morbi eget purus quis arcu placerat laoreet eleifend vitae magna. Vestibulum ultrices, purus id euismod elementum, justo libero lobortis eros, at laoreet odio libero non sem. Mauris ac tempor metus. Donec imperdiet magna eu elit scelerisque tincidunt quis non velit. Maecenas sit amet rutrum est. Ut eu faucibus nisi.
                        </div>

                        <div class="btn btn-lg btn-block bg-green rounded mt-auto py-3">
                            Проголосовать ЗА
                        </div>
                    </div>
                    <div class="col-6 d-flex flex-column">
                        <img src="/img/cat.png" class="img-fluid" alt="">

                        <div class="btn btn-lg btn-block bg-orange rounded mt-auto py-3">
                            Проголосовать ПРОТИВ
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>