<div class="card" style="width: 740px">
    <div class="card-body mb-4">
        <div class="text-center">
            <div class="lead text-bold h4">Календарь</div>
            <div class="lead text-success text-bold h4 mb-4">Август 2020 <i class="fa fa-info-circle text-primary"></i></div>
        </div>

        <div class="row no-gutters">
            <div class="col-8 flex-nowrap" style="font-size: large;">
                <div class="d-flex flex-row align-items-center mb-4">
                    <?php foreach(['пн','вт','ср','чт','пт','сб','вс'] as $i):?>
                        <div class="badge bg-gray badge-rounded mr-2"><?= $i ?></div>
                    <?php endforeach; ?>
                </div>

                <div class="d-flex flex-row align-items-center mb-2">
                    <?php for($i=27;$i<=31;$i++):?>
                        <div class="badge bg-light badge-rounded mr-2"><?= $i ?></div>
                    <?php endfor; ?>
                    <div class="badge bg-orange badge-rounded mr-2">1</div>
                    <div class="badge bg-gray badge-rounded mr-2">2</div>
                </div>
                <div class="d-flex flex-row align-items-center mb-2">
                    <?php for($i=3;$i<=6;$i++):?>
                        <div class="badge bg-green badge-rounded mr-2"><?= $i ?></div>
                    <?php endfor; ?>
                    <?php for($i=7;$i<=9;$i++):?>
                        <div class="badge bg-info badge-rounded mr-2"><?= $i ?></div>
                    <?php endfor; ?>
                </div>
                <div class="d-flex flex-row align-items-center mb-2">
                    <?php for($i=10;$i<=16;$i++):?>
                        <div class="badge bg-info badge-rounded mr-2"><?= $i ?></div>
                    <?php endfor; ?>
                </div>
                <div class="d-flex flex-row align-items-center mb-2">
                    <?php for($i=17;$i<=20;$i++):?>
                        <div class="badge bg-info badge-rounded mr-2"><?= $i ?></div>
                    <?php endfor; ?>
                    <div class="badge bg-gray badge-rounded mr-2">21</div>
                    <?php for($i=22;$i<=23;$i++):?>
                        <div class="badge bg-gray badge-rounded mr-2"><?= $i ?></div>
                    <?php endfor; ?>
                </div>
                <div class="d-flex flex-row align-items-center mb-2">
                    <?php for($i=24;$i<=28;$i++):?>
                        <div class="badge bg-green badge-rounded mr-2"><?= $i ?></div>
                    <?php endfor; ?>
                    <?php for($i=29;$i<=30;$i++):?>
                        <div class="badge bg-gray badge-rounded mr-2"><?= $i ?></div>
                    <?php endfor; ?>
                </div>
                <div class="d-flex flex-row align-items-center mb-2">
                    <div class="badge bg-green badge-rounded mr-2">31</div>
                    <?php for($i=1;$i<=6;$i++):?>
                        <div class="badge bg-gray badge-rounded mr-2"><?= $i ?></div>
                    <?php endfor; ?>
                </div>
            </div>
            <div class="col-4 d-flex">
                <div class="rounded text-bold mt-auto px-3" style="font-size: 1.1em;background: #EAF9FF;padding-top: 3em;padding-bottom: 3em;">
                    В этом месяце:
                    <br>
                    <br>
                    <span class="text-bold text-success h4">11</span> рабочих дней <br>
                    <span class="text-bold text-success h4">3</span> совещания
                    завершение <span class="text-bold text-success h4">1</span> проекта
                    <br><br><br>

                    До отпуска <span class="text-bold text-success h4">5</span> дней!
                </div>
            </div>
        </div>
    </div>

    <div class="card-body px-5">
        <div class="text-center">
            <div class="lead text-bold h4">Текущая неделя</div>
            <div class="lead text-success text-bold h4 mb-4">31. понедельник, 27 июля 2020 — воскресенье, 2 августа 2020</div>
        </div>

        <div class="row no-gutters text-center">
            <div class="col-12 flex-nowrap mb-4 d-flex align-items-center flex-column" style="font-size: large;">
                <div class="d-flex flex-row align-items-center mb-4">
                    <?php foreach(['пн','вт','ср','чт','пт','сб','вс'] as $i):?>
                        <div class="badge bg-gray badge-rounded mr-2"><?= $i ?></div>
                    <?php endforeach; ?>
                </div>

                <div class="d-flex flex-row align-items-center mb-2">
                    <?php for($i=27;$i<=31;$i++):?>
                        <div class="badge bg-green badge-rounded mr-2"><?= $i ?></div>
                    <?php endfor; ?>
                    <div class="badge bg-orange badge-rounded mr-2">1</div>
                    <div class="badge bg-gray badge-rounded mr-2">2</div>
                </div>
            </div>
            <div class="col-12 mt-4 text-left">
                <div class="lead text-bold h4 text-center mb-3">На ближайшие 10 дней:</div>

                <p class="text-success">Сегодня (01.08.20) - выходной день</p>
                <p>03.08.20 - Совещание</p>
                <p>06.08.20 - Дедлайн по проекту “Редизайн сайта”</p>
                <p>07.08.20 - Отпуск до 20.08.20</p>
            </div>
        </div>
    </div>
</div>