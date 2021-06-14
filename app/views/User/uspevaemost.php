<?php if (isset($_GET['qwe'])):?>

    <div class="chart">
        <canvas id="barChart" style="height: 230px; width: 787px;" height="230" width="787"></canvas>
    </div>

    <script>
        var areaChartData2 = {
            labels  : ['January', 'February', 'March'],
            datasets: [
                {
                    label               : 'Electronics',
                    fillColor           : 'rgba(210, 214, 222, 1)',
                    strokeColor         : 'rgba(210, 214, 222, 1)',
                    pointColor          : 'rgba(210, 214, 222, 1)',
                    pointStrokeColor    : '#c1c7d1',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data                : [65, 80,  59]
                }
            ]
        }
        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
        var barChart                         = new Chart(barChartCanvas)
        var barChartData                     = areaChartData2
        barChartData.datasets[0].fillColor   = '#e47e1a'
        barChartData.datasets[0].strokeColor = '#edb220'
        barChartData.datasets[0].pointColor  = '#00a65a'
        var barChartOptions                  = {
            //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
            scaleBeginAtZero        : true,
            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines      : true,
            //String - Colour of the grid lines
            scaleGridLineColor      : 'rgba(0,0,0,.05)',
            //Number - Width of the grid lines
            scaleGridLineWidth      : 1,
            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines  : true,
            //Boolean - If there is a stroke on each bar
            barShowStroke           : true,
            //Number - Pixel width of the bar stroke
            barStrokeWidth          : 2,
            //Number - Spacing between each of the X value sets
            barValueSpacing         : 5,
            //Number - Spacing between data sets within X values
            barDatasetSpacing       : 1,
            //String - A legend template
            legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
            //Boolean - whether to make the chart responsive
            responsive              : true,
            maintainAspectRatio     : true
        }

        barChartOptions.datasetFill = false
        barChart.Bar(barChartData, barChartOptions)
    </script>

<?php else: ?>
    <script type="text/javascript" src="/libs/jquery-connections/jquery.connections.js"></script>
    <script>
        for (let i=1; i<7; i++) {
            $(`.l${i} .c1`).connections({ to: `.l${i} .c2`, class: 'fast'})
            // $(`.l${i} .c2`).connections({ to: `.l${i} .c3`, class: 'fast'})
            $(`.l${i} .c3`).connections({ to: `.l${i} .c4`, class: 'fast'})
            // $(`.l${i} .c4`).connections({ to: `.l${i} .c5`, class: 'fast'})
            $(`.l${i} .c5`).connections({ to: `.l${i} .c6`, class: 'fast'})
            // $(`.l${i} .c6`).connections({ to: `.l${i} .c7`, class: 'fast'})
            $(`.l${i} .c7`).connections({ to: `.l${i} .c8`, class: 'fast'})
        }
        $(`.l1 .c4`).connections({ to: `.l2 .c3`, class: 'fast'})
        $(`.l3 .c1`).connections({ to: `.l1 .c5`, class: 'fast'})
        $(`.l3 .c1`).connections({ to: `.l4 .c7`, class: 'fast'})
    </script>
    <style>
        #discs td {
            padding: 5px;
            /*border: 1px solid red;*/
            min-width: 100px;
            min-height: 130px;
        }
        #discs td:not(:first-child) {
            text-align: center;
        }
        #discs td span{
            position: relative;
            display: inline-block;
            min-width: 10px;
            font-size: 12px;
            font-weight: 700;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            background-color: #777;
            border-radius: 10px;
            padding: .5em 1em;
            margin-bottom: 1em;
            margin-top: 1em;
            z-index: 2;
        }
        #discs td span i{
            top: 30%;
            width: 1px;
            position: absolute;
            left: 0;
        }
        #discs td span i.r{
            left: inherit;
            right: 0;
        }
        .w-100 {
            width: 100%;
        }
        .fast {
            border: 3px solid #051;
            opacity: 0.5;
            z-index: 1;
            /*border-radius: 100%;*/
            pointer-events: none;
        }

    </style>
<!--<div class="table-responsive" style="width: 100%; overflow-x: auto">-->
<div class="box box-solid">
    <div class="box-body">
        <a style="padding: 1em 2em;" class="badge">ПО ПРОМЕЖУТОЧНОЙ АТТЕСТАЦИИ</a>
        <a style="padding: 1em 2em;" class="badge bg-green">ПО ОСВОЕНИЮ КОМПЕТЕНЦИЙ</a>

        <table id="discs" style="width: 100%; min-width: 600px">
            <tr class="l1">
                <td colspan="2"><span class="c1 bg-green w-100">ИНФОРМАТИКА</span></td>
                <td><span class="bg-orange"><i class="c2"></i>ПРОГРАММИРОВАНИЕ <i class="c3 r"></i></span></td>
                <td><span><i class="c4"></i>ТЕХНОЛОГИИ ПРОГРАММИРОВАНИЯ <i class="c6 r"></i></span></td>
                <td><span class="c5">ПРОЕКТИРОВАНИЕ АСОиУ</span></td>
            </tr>
            <tr class="l2">
                <td><span class="c1">МИКРОПРОЦЕССОРНАЯ ТЕХНИКА</span></td>
                <td></td>
                <td><span class="bg-yellow"><i class="c2"></i>УПРАВЛЕНИЕ ДАННЫМИ <i class="c3 r"></i></span></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="l3">
                <td><span>ОРГАНИЗАЦИЯ ЭВМ</span></td>
                <td></td>
                <td></td>
                <td></td>
                <td><span><i class="c1"></i>ТЕХНОЛОГИИ РАЗРАБОТКИ ПО</span></td>
            </tr>
            <tr class="l4">
                <td><span>ВЫСШАЯ МАТЕМАТИКА <i class="c1 r"></i></span></td>
                <td><span><i class="c2"></i>ДИСКРЕТНАЯ ОПТИМИЗАЦИЯ <i class="c3 r"></i></span></td>
                <td><span class="bg-orange"><i class="c4"></i>ВЫЧИСЛИТЕЛЬНАЯ МАТЕМАТИКА <i class="c6 r"></i></span><br><span class="bg-orange"><i class="c4"></i>ТЕОРИЯ ВЕРОЯТНОСТИ <i class="c6 r"></span></td>
                <td><span><i class="c5"></i>МОДЕЛИРОВАНИЕ <i class="c7 r"></i></span></td>
                <td rowspan="2" style="vertical-align: bottom;"><div style="border: 1px grey solid; border-radius: 20px; padding: 1em;">
                        <b>ИТОГИ</b><br>
                        <i>ВЫ ОСВОИЛИ 10 ИЗ 20 ДИСЦИПЛИН <br>
                            СРЕДНИЙ БАЛЛ 3,8 <br>
                            ЭТО ХУЖЕ, ЧЕМ У 90% СТУДЕНТОВ</i>
                    </div></td>
            </tr>
            <tr class="l5">
                <td><span>ИНЖЕНЕРНАЯ ГРАФИКА <i class="c1"></i></span></td>
                <td><span class="bg-green"><i class="c2"></i>КОМПЬЮТЕРНАЯ ГРАФИКА</span></td>
                <td><span class="bg-green">3D МОДЕЛИРОВАНИЕ <i class="c4 r"></i></span></td>
                <td><span><i class="c3"></i>HCI</span></td>
<!--                <td></td>-->
            </tr>
            <tr class="l6">
                <td><span class="c1">ФИЗИКА</span> <span style="margin-left: 2em;"><i class="c2"></i>ЭЛЕКТРОНИКА <i class="c3 r"></i></span></td>
                <td></td>
                <td></td>
                <td><span><i class="c4"></i>РОБОТОТЕХНИКА И КИБЕРНЕТИКА</span></td>
                <td><p class="badge bg-green" style="cursor:pointer;">ВЫБРАТЬ ЭЛЕКТИВНЫЕ КУРСЫ</p></td>
            </tr>
        </table>
    </div>
</div>

<!--</div>-->
<?php
$oop = ['ИНФОРМАТИКА', 'ОСНОВЫ МАШИННОГО ОБУЧЕНИЯ', 'ГЛУБОКОЕ ОБУЧЕНИЕ', 'ПРОГРАММИРОВАНИЕ', 'РАЗРАБОТКА ПРОГРАММНОГО ОБЕСПЕЧЕНИЯ',];
$badges = [
    '<span class="badge bg-green">ИТ</span> <span class="badge">online</span>',
    '<span class="badge bg-green">АВТОМАТИЗАЦИЯ</span> <span class="badge bg-green">ИТ</span>',
    '<span class="badge bg-green">НЕЙРОННЫЕ СЕТИ</span> <span class="badge bg-green">ИТ</span>',
    '<span class="badge bg-green">ПРОГРАММИРОВАНИЕ</span> <span class="badge bg-green">ИТ</span> <span class="badge">online</span>',
    '<span class="badge bg-green">РАЗРАБОТКА ПО</span> <span class="badge bg-green">ПРОГРАММИРОВАНИЕ</span>',

];

$disc = [
    ['r' => '<div class="fa fa-star text-success"></div> <div class="fa fa-star text-success"></div> <div class="fa fa-star text-success"></div> <div class="fa fa-star text-success"></div> <div class="fa fa-star-half-o text-success"></div>', 't' => 'ИНФОРМАТИКА', 'sub' => 'АСУ-19 АУБП-19', 'b' => '<span class="badge bg-green">ИТ</span>'],
    ['r' => '<div class="fa fa-star text-success"></div> <div class="fa fa-star text-success"></div> <div class="fa fa-star text-success"></div> <div class="fa fa-star text-success"></div> <div class="fa fa-star text-success"></div>', 't' => 'ОСНОВЫ МАШИННОГО ОБУЧЕНИЯ', 'sub' => 'ИНФм-19', 'b' => '<span class="badge bg-green">НЕЙРОННЫЕ СЕТИ</span> <span class="badge bg-green">ИТ</span>'],
    ['r' => '<div class="fa fa-star text-success"></div> <div class="fa fa-star text-success"></div> <div class="fa fa-star text-success"></div> <div class="fa fa-star text-success"></div> <div class="fa fa-star-half-o text-success"></div>', 't' => 'ТЕОРЕТИЧЕСКИЕ ОСНОВЫ ИНФОРМАТИКИ И АЛГОРИТМИЗАЦИИ', 'sub' => 'АСУ-19 АУБП-19 ГД-19-1', 'b' => '<span class="badge bg-green">ИТ</span>'],
    ['r' => '<div class="fa fa-star text-warning"></div> <div class="fa fa-star text-warning"></div> <div class="fa fa-star text-warning"></div> <div class="fa fa-star-half-o text-warning"></div> <div class="fa fa-star-o text-warning"></div>', 't' => 'АВТОМАТИЗАЦИЯ ГОРНОГО ПРОИЗВОДСТВА', 'sub' => 'ШС-17 ВД-17', 'b' => '<span class="badge bg-green">АВТОМАТИЗАЦИЯ</span> <span class="badge bg-green">ИТ</span>'],
    ['r' => '<div class="fa fa-star text-danger"></div> <div class="fa fa-star text-danger"></div> <div class="fa fa-star-half-o text-danger"></div> <div class="fa fa-star-o text-danger"></div> <div class="fa fa-star-o text-danger"></div>', 't' => 'МЕНЕДЖМЕНТ', 'sub' => 'УП-18', 'b' => '<span class="badge bg-red">МЕНЕДЖМЕНТ</span>'],
];
?>
    <div class="box box-default">
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row" style="font-size: 1.2em;">
                <div class="col-md-4">
                    <div class="chart-responsive" style="text-align: center;position: relative;">
                        <div style="position:absolute;width: 100%;top: 57px;">
                            <img src="/img/g.png" width="40" alt="">
                            <div class="text-center">ИТ</div>
                        </div>
                        <canvas id="pieChart" height="150"></canvas>
                    </div>
                    <!-- ./chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-sm-2"><b>РЕЙТИНГ ПРЕДМЕТА</b></div>
                        <div class="col-sm-1"><b>ЗАЧЕТНЫЕ ЕДИНИЦЫ</b></div>
                        <div class="col-sm-9">&nbsp;</div>
                    </div>
                    <hr>
                    <?php foreach ($oop as $k => $item): ?>
                        <div class="row">
                            <div class="col-sm-2">
                                <?php for ($i = 0; $i < 5; $i++): ?>
                                    <div class="fa fa-star text-success"></div>
                                <?php endfor; ?>
                            </div>
                            <div class="col-sm-1">4 ЗЕ</div>
                            <div class="col-sm-9"><?= $item ?> <?= $badges[$k] ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
    </div>

    <div class="box box-default">
        <!-- /.box-header -->
        <div class="box-body" style="font-size: 1.2em;">

            <?php foreach ($disc as $k => $item): ?>
                <div class="row">
                    <div class="col-sm-2">
                        <?= $item['r'] ?>
                    </div>
                    <div class="col-sm-8">
                        <span>
                            <?= $item['t'] ?> <?= $item['b'] ?>
                            <br>
                            <span class="text-primary"><?= $item['sub'] ?></span>
                        </span>
                    </div>
                </div>
                <?php if ($k!=4) echo '<hr>'?>
            <?php endforeach; ?>

            <!-- /.row -->
        </div>
        <!-- /.box-body -->
    </div>

    <img src="/img/load2/Screenshot_4.png" alt="" style="margin-bottom: 1em; margin-left: 1em;">

    <div class="row">
        <div class="col-sm-4">
            <div class="box box-primary">
                <div class="box-header with-border text-center">
                    <h3 class="box-title">Смена ФИО</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label>Введите новые данные</label>
                        <input type="text" class="form-control" placeholder="Фаилия Имя Отчество" disabled="">
                    </div>
                    <div class="form-group">
                        <label>Причина редактирования данных</label>
                        <select class="form-control" name="" id="">
                            <option value="" selected disabled>Укажите причину</option>
                            <option value="">Заключение брака</option>
                            <option value="">Расторжение брака</option>
                            <option value="">Иная</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Прикрепить файл:</label>
                        <input type="text" class="form-control" placeholder="Обзор.." disabled="">
                    </div>

                    <div class="text-center">
                        <button class="btn btn-primary">СОХРАНИТЬ</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="box box-primary">
                <div class="box-header with-border text-center">
                    <h3 class="box-title">Смена академической группы</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label>Введите новые данные</label>
                        <input type="text" class="form-control" placeholder="Академическая группа" disabled="">
                    </div>
                    <div class="form-group">
                        <label>Причина редактирования данных</label>
                        <select class="form-control" name="" id="">
                            <option value="" selected disabled>Укажите причину</option>
                            <option value="">Перевод на новый курс</option>
                            <option value="">Академический отпуск</option>
                            <option value="">Восстановление/отчисление</option>
                            <option value="">Иная</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Прикрепить файл:</label>
                        <input type="text" class="form-control" placeholder="Обзор.." disabled="">
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary">СОХРАНИТЬ</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img src="/img/load2/Screenshot_2.png" alt="" style="margin-bottom: 1em; margin-left: 1em;">

    <div class="box box-primary" style="font-size: 1.5em;">
        <div class="box-body">
            <div><span class="badge bg-green">ПО РЕГИОНУ</span> <span class="badge">ТОП-100 ПРЕДПРИЯТИЙ</span></div>
            <div class="row">
                <div class="col-sm-4">ОСНОВЫ МАШИННОГО ОБУЧЕНИЯ</div>
                <div class="col-sm-2">35 000 - 50 000</div>
                <div class="col-sm-6"><span class="badge bg-blue">ПРОГРАММИРОВАНИЕ</span> <span class="badge bg-blue">РАЗРАБОТКА ПО</span> <span class="badge bg-blue">ИТ</span></div>
            </div>
            <div class="row">
                <div class="col-sm-4">ТЕОРЕТИЧЕСКИЕ ОСНОВЫ ИНФОРМАТИКИ И АЛГОРИТМИЗАЦИИ</div>
                <div class="col-sm-2">35 000 - 50 000</div>
                <div class="col-sm-6"><span class="badge bg-blue">СЕТИ ЭВМ</span> <span class="badge bg-blue">АДМИНИСТРИРОВАНИЕ СИСТЕМ</span> <span class="badge bg-blue">ИТ</span></div>
            </div>
            <div class="row">
                <div class="col-sm-4">АВТОМАТИЗАЦИЯ ГОРНОГО ПРОИЗВОДСТВА</div>
                <div class="col-sm-2">35 000 - 50 000</div>
                <div class="col-sm-6"><span class="badge bg-blue">АНАЛИТИКА</span> <span class="badge bg-blue">Big Data</span> <span class="badge bg-blue">ML</span> <span class="badge bg-blue">ИТ</span></div>
            </div>
            <div class="row">
                <div class="col-sm-4">МЕНЕДЖМЕНТ</div>
                <div class="col-sm-2">35 000 - 50 000</div>
                <div class="col-sm-6"><span class="badge bg-blue">АНАЛИТИКА</span> <span class="badge bg-blue">ИТ</span></div>
            </div>
        </div>
    </div>

    <img src="/img/load2/Screenshot_1.png" alt="" style="margin-bottom: 1em; margin-left: 1em;">

    <div class="box box-primary" style="font-size: 1.3em;">
        <div class="box-body">
            <div><b>ТРУДОУСТРОЙСТВО</b> <img style="height: 15px; margin-top: 4px;" src="../app/views/User/5.png" alt="..." class="margin"></div>
            <div class="row">
                <div class="col-sm-3" style="padding-left: 2em;">ВСЕГО ТРУДОУСТРОЕНО</div>
                <div class="col-sm-3">
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="23" aria-valuemin="0" aria-valuemax="100" style="width: 23%">
                            <span>23%</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="progress">
                        <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="73" aria-valuemin="0" aria-valuemax="100" style="width: 73%">
                            <span>73%</span>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div><b>ПО ПРОФЕССИЯМ</b></div>
<!--            <div><span class="badge bg-green">ПО РЕГИОНУ</span> <span class="badge">ТОП-100 ПРЕДПРИЯТИЙ</span></div>-->
            <div class="row">
                <div class="col-sm-4" style="padding-left: 2em;">ОСНОВЫ МАШИННОГО ОБУЧЕНИЯ</div>
                <div class="col-sm-2">
                    <div class="progress">
                        <div class="progress-bar progress-bar-light-blue" role="progressbar" aria-valuenow="23" aria-valuemin="0" aria-valuemax="100" style="width: 23%">
                            <span>23%</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6"><span class="badge bg-green">ПРОГРАММИРОВАНИЕ</span> <span class="badge bg-green">РАЗРАБОТКА ПО</span> <span class="badge bg-green">ИТ</span></div>
            </div>
            <div class="row">
                <div class="col-sm-4" style="padding-left: 2em;">ТЕОРЕТИЧЕСКИЕ ОСНОВЫ ИНФОРМАТИКИ И АЛГОРИТМИЗАЦИИ</div>
                <div class="col-sm-2">
                    <div class="progress">
                        <div class="progress-bar progress-bar-light-blue" role="progressbar" aria-valuenow="11" aria-valuemin="0" aria-valuemax="100" style="width: 11%">
                            <span>11%</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6"><span class="badge bg-green">СЕТИ ЭВМ</span> <span class="badge bg-green">АДМИНИСТРИРОВАНИЕ СИСТЕМ</span> <span class="badge bg-green">ИТ</span></div>
            </div>
            <div class="row">
                <div class="col-sm-4" style="padding-left: 2em;">АВТОМАТИЗАЦИЯ ГОРНОГО ПРОИЗВОДСТВА</div>
                <div class="col-sm-2">
                    <div class="progress">
                        <div class="progress-bar progress-bar-light-blue" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                            <span>50%</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6"><span class="badge bg-green">АНАЛИТИКА</span> <span class="badge bg-green">Big Data</span> <span class="badge bg-green">ML</span> <span class="badge bg-green">ИТ</span></div>
            </div>
            <div class="row">
                <div class="col-sm-4" style="padding-left: 2em;">МЕНЕДЖМЕНТ</div>
                <div class="col-sm-2">
                    <div class="progress">
                        <div class="progress-bar progress-bar-light-blue" role="progressbar" aria-valuenow="16" aria-valuemin="0" aria-valuemax="100" style="width: 16%">
                            <span>16%</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6"><span class="badge bg-green">АНАЛИТИКА</span> <span class="badge bg-green">ИТ</span></div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-4" style="padding-left: 2em;">CРЕДНЯЯ ЗП ПО ВЫПУСКНИКАМ</div>
                <div class="col-sm-2">35 500</div>
                <div class="col-sm-6">
                    <span class="badge bg-green">АНАЛИТИКА</span>
                    <span class="badge bg-green">ИТ</span>
                    <span class="badge bg-green">Big Data</span>
                    <span class="badge bg-green">РАЗРАБОТКА ПО</span>
                    <span class="badge bg-green">АДМИНИСТРИРОВАНИЕ СИСТЕМ</span>
                    <span class="badge bg-green">ПРОГРАММИРОВАНИЕ</span> <span class="badge bg-green">СЕТИ ЭВМ</span>
                </div>
            </div>
        </div>
    </div>



    <div id="wrapper-2">
        <div id="root-left">
            <div class="branch-inverse l1">
                <div class="entry-inverse"><span class="label-inverse">Parent 1</span>
                    <div class="branch-inverse l2">
                        <div class="entry-inverse"><span class="label-inverse">Grand Parent 1</span>
                            <div class="branch-inverse l3">
                                <div class="entry-inverse sole"><span class="label-inverse">Grand Grand Parent 1</span></div>
                            </div>
                        </div>
                        <div class="entry-inverse"><span class="label-inverse">Grand Parent 2</span></div>
                    </div>
                </div>
                <div class="entry-inverse"><span class="label-inverse">Parent 2</span>
                    <div class="branch-inverse l2">
                        <div class="entry-inverse sole"><span class="label-inverse">Grand Parent 1</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="main-root"><span class="label">Root</span></div>
        <div id="root-right">
            <!-- <span class="label">Root</span> -->
            <div class="branch l1">
                <div class="entry"><span class="label">Child 1</span>
                    <div class="branch l2">
                        <div class="entry"><span class="label">Grand Child 1</span></div>
                        <div class="entry"><span class="label">Grand Child 2</span></div>
                    </div>
                </div>
                <div class="entry"><span class="label">Child 2</span>
                    <div class="branch l2">
                        <div class="entry"><span class="label">Grand Child 1</span></div>
                        <div class="entry"><span class="label">Grand Child 2</span>
                            <div class="branch l3">
                                <div class="entry sole"><span class="label">Grand G Child 1</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php //new \fw\widgets\menu\Menu()?>

    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Different Width</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-xs-6">
                    <label>ФИО</label>
                    <input type="text" class="form-control" placeholder="Васильева Екатерина Вадимовна" disabled="">
                </div>
                <div class="col-xs-6">
                    <label>Транслитерация фамилии и имени</label>
                    <input type="text" class="form-control" placeholder="Vasilieva Ekaterina" disabled="">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-2">
                    <label>Группа</label>
                    <input type="text" class="form-control" placeholder="МИА11" disabled="">
                </div>
                <div class="col-xs-3">
                    <label>Номер зачетной книжки</label>
                    <input type="text" class="form-control" placeholder="1997266" disabled="">
                </div>
                <div class="col-xs-1">
                    <label>Курс</label>
                    <input type="text" class="form-control" placeholder="4" disabled="">
                </div>
                <div class="col-xs-3">
                    <label>Факультет</label>
                    <input type="text" class="form-control" placeholder="Маг." disabled="">
                </div>
                <div class="col-xs-3">
                    <label>Год поступления</label>
                    <input type="text" class="form-control" placeholder="2019" disabled="">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-5">
                    <label>E-mail</label>
                    <input type="text" class="form-control" placeholder="notrealemail@gmail.com" disabled="">
                </div>
                <div class="col-xs-3">
                    <label>Номер телефона</label>
                    <input type="text" class="form-control" placeholder="+7(962)1922917" disabled="">
                </div>
                <div class="col-xs-4">
                    <label>Дата последней авторизации</label>
                    <input type="text" class="form-control" placeholder="22.06.2020" disabled="">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-3">
                    <label>Дата рождения</label>
                    <input type="text" class="form-control" placeholder="28 апреля 1997 г." disabled="">
                </div>
                <div class="col-xs-3">
                    <label>Гражданство</label>
                    <input type="text" class="form-control" placeholder="Россия" disabled="">
                </div>
                <div class="col-xs-3">
                    <label>Статус оплаты</label>
                    <input type="text" class="form-control" placeholder="Оплачено" disabled="">
                </div>
                <div class="col-xs-3">
                    <label>Ин. язык</label>
                    <input type="text" class="form-control" placeholder="Английский" disabled="">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-5">
                    <label>Индивидуальная учебная траектория</label>
                    <input type="text" class="form-control" placeholder="12312312312.plx" disabled="">
                </div>
                <div class="col-xs-4">
                    <label>Научный руководитель</label>
                    <input type="text" class="form-control" placeholder="Иванов И.А." disabled="">
                </div>
                <div class="col-xs-3">
                    <label>Процент прогулов</label>
                    <input type="text" class="form-control" placeholder="3% или 12 часов" disabled="">
                </div>
            </div>
        </div>
    </div>

    <img src="/img/load2/Screenshot_3.png" alt="" style="margin-bottom: 1em; margin-left: 1em;">

<div class="col-xs-12">
    <div class="row">
        <div style="background:white;" class="col-md-6">
            <div class="row box-header ">
                <div class="col-md-9">
                    <span style="font-size: 18px;"> 00.00.00 НАЗВАНИЕ ПРЕДМЕТА</span>
                </div>
                <div class="col-md-3">
                    <img style="height: 15px; margin-top: 4px;" src="../app/views/User/5.png" alt="..." class="margin">
                </div>
            </div>
            <div style="    margin-left: -5px;margin-top: -10px;" class="row">
                <div class="col-md-9">
                    <span style="font-size: 14px;">    00 з.е. (00  пар в неделю) </spaN>
                </div>

            </div>

            <?php $chat = '<div class="box box-success direct-chat direct-chat-success"><div class="box-header with-border">
              <h3 class="box-title">Direct Chat</h3>

              <div class="box-tools pull-right">
                <span data-toggle="tooltip" title="" class="badge bg-green" data-original-title="3 New Messages">3</span>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-widget="chat-pane-toggle" data-original-title="Contacts">
                  <i class="fa fa-comments"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            
            <div class="box-body">
                <div class="direct-chat-messages">
                    <div class="direct-chat-msg">
                        <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name pull-left">Alexander Pierce</span>
                            <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                        </div>
                        <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="Message User Image">
                        <div class="direct-chat-text">
                            Is this template really for free? That\'s unbelievable!
                        </div>
                    </div>
                    <div class="direct-chat-msg right">
                        <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name pull-right">Sarah Bullock</span>
                            <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
                        </div>
                        <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="Message User Image">
                        <div class="direct-chat-text">
                            You better believe it!
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="box-footer">
              
                <div class="input-group">
                  <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-success btn-flat" data-dismiss="modal">Send</button>
                      </span>
                </div>
              
            </div>
        </div>'; ?>

            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <?= ($chat) ?>
                    </div>
                </div>
            </div>

            <script>
                $(function () {
                    $('[data-toggle="popover"]').popover()
                })
            </script>

            <div class="box">
                <div class="box-header with-border ">
                    <h3 class="box-title">Преподаватели</h3>


                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding ">
                    <ul class="users-list clearfix">
                        <li style="width: 33%;">
                            <img src="dist/img/user7-128x128.jpg" alt="User Image">
                            <a style="white-space: normal;" class="users-list-name" href="#">Фамилия Имя Отчество</a>
                            <span style="color: #548DAD;" class="users-list-date">Должность</span>
                            <span tabindex="0"  type="button" class="badge bg-green btn btn-block" data-toggle="modal" data-target=".bs-example-modal-sm">Написать</span>
                        </li>
                        <li style="width: 33%;">
                            <img src="dist/img/user4-128x128.jpg" alt="User Image">
                            <a style="white-space: normal;" class="users-list-name" href="#">Фамилия Имя Отчество</a>
                            <span style="color: #548DAD;" class="users-list-date">Должность</span>
                            <span tabindex="0"  type="button" class="badge bg-green btn btn-block" data-toggle="modal" data-target=".bs-example-modal-sm">Написать</span>
                        </li>
                        <li style="width: 33%;">
                            <img src="dist/img/user3-128x128.jpg" alt="User Image">
                            <a style="white-space: normal;" class="users-list-name" href="#">Фамилия Имя Отчество</a>
                            <span style="color: #548DAD;" class="users-list-date">Должность</span>
                            <span tabindex="0"  type="button" class="badge bg-green btn btn-block" data-toggle="modal" data-target=".bs-example-modal-sm">Написать</span>
                        </li>
                    </ul>
                    <!-- /.users-list -->

                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs nav-justified">
                            <li class="active"><a href="#taba_1" data-toggle="tab">РАСПИСАНИЕ <br>2019/2020 учебный год / 00 семестр</a></li>
                            <li><a href="#taba_2" data-toggle="tab">ПЛАН <br>2019/2020 учебный год / 00 семестр</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="taba_1">
                            <table class="table table-striped table-hover table-condensed" style="text-align: left!important;">
                                <tbody>
                                <tr><td>Тема&nbsp;1.</td><td>Понятие автоматизации. Цели и задачи автоматизации горных предприятий. Классификация автоматизированных систем.</td></tr>
                                <tr><td>Тема&nbsp;2.</td><td>Принципы построения автоматизированных систем. Этапы построения автоматизированных систем. Постановка задач и целей. Аналитический обзор существующих решений.</td></tr>
                                <tr><td>Тема&nbsp;3.</td><td>Системный анализ. Моделирование.</td></tr>
                                <tr><td>Тема&nbsp;4.</td><td>Формирование требований к системе. Техническое задание.</td></tr>
                                <tr><td>Тема&nbsp;5.</td><td>Проектирование и разработка автоматизированных систем. Проектирование БД. Интерфейсы. Тестирование.</td></tr>
                                <tr><td></td><td>Подготовка и защита контрольной работы №1</td></tr>
                                <tr><td></td><td>Подготовка к экзамену</td></tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="taba_2">
                            <table class="table table-striped table-hover table-condensed" style="text-align: left!important;">
                                <tbody>
                                <tr><td>Тема&nbsp;1.</td><td>Понятие автоматизации. Цели и задачи автоматизации горных предприятий. Классификация автоматизированных систем.</td></tr>
                                <tr><td>Тема&nbsp;2.</td><td>Принципы построения автоматизированных систем. Этапы построения автоматизированных систем. Постановка задач и целей. Аналитический обзор существующих решений.</td></tr>
                                <tr><td>Тема&nbsp;3.</td><td>Системный анализ. Моделирование.</td></tr>
                                <tr><td>Тема&nbsp;4.</td><td>Формирование требований к системе. Техническое задание.</td></tr>
                                <tr><td>Тема&nbsp;5.</td><td>Проектирование и разработка автоматизированных систем. Проектирование БД. Интерфейсы. Тестирование.</td></tr>
                                <tr><td></td><td>Подготовка и защита контрольной работы №1</td></tr>
                                <tr><td></td><td>Подготовка к экзамену</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
<!--                    <div class="row" style="font-weight:bold;">-->
<!--                        <div class="col-sm-6">РАСПИСАНИЕ <br>2019/2020 учебный год / 00 семестр</div>-->
<!--                        <div class="col-sm-6">ПЛАН <br>2019/2020 учебный год / 00 семестр</div>-->
<!--                    </div>-->

<!--                    <img src="/img/load/rasp.png" class="img-responsive" alt="">-->
                </div>
                <!-- /.box-body -->

                <!-- /.box-footer -->
            </div>
        </div>


        <div class="col-md-6">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class=""><a href="#tab_1" data-toggle="tab" aria-expanded="false">Научные работы</a></li>
                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Документация</a></li>
                    <li class="active"><a href="#tab_3" data-toggle="tab" aria-expanded="true">Информация о предмете</a></li>
                    <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Чат предмета</a></li>
                </ul>
                <div style="padding-left: 1em; padding-top: 1em;"><span class="badge bg-green">2020</span> <span class="badge">2019</span> <span class="badge">2018</span></div>
<!--                <div style="padding-left: 1em; padding-top: .5em;"><span class="badge bg-green">АВТОМАТИЗАЦИЯ</span> <span class="badge bg-green">ИТ</span></div>-->
                <div class="tab-content">
                    <div class="tab-pane " id="tab_1">

                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">

                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane active" id="tab_3">
                        <table class="table table-condensed table-bordered">
                            <tbody>
                            <tr>
                                <th>ФГОС 3++</th>
                                <td>Целью преподавания дисциплины «Автоматизация и управление горным производством» является ознакомить студентов с основными понятиями, функциями, структурой, классификацией и системными принципами автоматизированных систем управления, этапами их проектирования и разработки.</td>
                            </tr>
                            <tr>
                                <th>Задачи курса</th>
                                <td>- формирование у обучающихся основных понятий автоматизированных систем;
                                    - формирование устойчивых навыков системного анализа, моделирования, проектирования хранилищ данных, интерфейсов и автоматизированных систем в целом;
                                    - формирование у студентов совокупности профессиональных компетенций, обеспечивающих решение задач, связанных с применением информационных технологий и автоматизированных систем.</td>
                            </tr>
                            <tr><td colspan="2">В результате освоения дисциплины «Автоматизация и управление горным производством» обучающийся должен:</td></tr>
                            <tr>
                                <th>Знать</th>
                                <td>классификацию автоматизированных систем. - принципы и этапы построения автоматизированных систем; - методику проведения обзора и анализа существующих решений. - методологию концептуального и контекстного моделирования; - методологию функционального моделирования; - методологию моделирования бизнес-процессов; - методологию имитационного моделирования; - универсальный язык моделирования UML. - методологию формирования требований к системе FURPS+; - методологию формирования требований через атрибуты качества; - ГОСТ 34.602-89. - этапы проектирования и разработки автоматизированных систем; - принципы и методики проектирования баз данных, хранилищ данных и таблиц входов-выходов; - принципы проектирования HCI и интерфейсов; - основные виды тестирования систем.</td>
                            </tr>
                            <tr>
                                <th>Уметь</th>
                                <td>подбирать архитектуру автоматизированной системы под конкретные прикладные задачи. - формулировать цели и задачи автоматизации; - анализировать существующие решения. - производить концептуальное и контекстное моделирование; - производить функциональное моделирование; - моделировать бизнес-процессы; - производить имитационное моделирование. - формировать требования к автоматизированным системам; - составлять техническое задание на автоматизированные системы. - производить инфологическое проектирование; - проектирования базы данных, хранилища данных и таблицы входов-выходов; - проектировать интерфейсы; - тестировать автоматизированные системы.</td>
                            </tr>
                            <tr>
                                <th>Владеть</th>
                                <td>принципами подбора автоматизированной системы для решения прикладных задач. - методологией анализа существующих решений. - методиками и нотациями концептуального и контекстного моделирования; - методиками и нотациями функционального моделирования; - методологиками и нотациями моделирования бизнес-процессов; - методологиками и нотациями имитационного моделирования; - универсальным языком моделирования UML - методиками формирования требований к автоматизированным системам; - принципами составления технического задания на автоматизированные системы. - методологией и инструментами проектирования баз данных, хранилищ данных и таблиц входов-выходов; - методами проектирования HCI и интерфейсов; - инструментами тестирования автоматизированных систем.</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_4">
                        <?= $chat ?>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>

            <br>
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-comment-o"></i> Отзывы</h3>
                </div>
                <div class="box-body">
                    Отзыв на дисциплину "Инструментальные средства информационных систем":
                    <hr>
                    Предмет сложный, но может пригодится в жизни. Узнал много нового.
                </div>
            </div>

            <br>
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-commenting-o"></i> Отзывы студентов <img style="height: 15px; margin-top: 4px;" src="../app/views/User/5.png" alt="..." class="margin"></h3>
                </div>
                <div class="box-body">
                    Отзыв студента на преподавателя Шпигуна А.В,:
                    <hr>
                    Понятно объясняет и рассказывает интересные истории из практики. На парах не отмечает. Защитить лабы было легко. Преподаватель очень понравился.
                </div>
            </div>
            <!-- nav-tabs-custom -->
        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
 <div class="col-sm-6">
     <div class="box box-solid">
         <div class="box-body">
             <div><span class="badge bg-green" style="font-size: 1.4em;">ИНФОРМАТИКА</span></div>
             <div class="row" style="margin-bottom: 1.5em;">
                 <div class="col-sm-2"><img width="50" src="/img/Vector.png" class="img-responsive" alt=""></div>
                 <div class="col-sm-10"><div class="lead" style="margin-bottom: 0;">ЦИКЛ ЛАБОРАТОРНЫХ РАБОТ</div><a href="./#">ссылка</a></div>
             </div>
             <div class="row" style="margin-bottom: 1.5em;">
                 <div class="col-sm-2"><img width="50" src="/img/youtube%201.png" class="img-responsive" alt=""></div>
                 <div class="col-sm-10"><div class="lead" style="margin-bottom: 0;">ЦИКЛ РОЛИКОВ ПО ТЕМЕ “КОД ХЭММИНГА”</div><a href="./#">ссылка</a></div>
             </div>
             <div><span class="badge bg-green" style="font-size: 1.4em;">ТЕОРЕТИЧЕСКИЕ ОСНОВЫ ИНФОРМАТИКИ И <br> АЛГОРИТМИЗАЦИИ</span></div>
             <div class="row" style="margin-bottom: 1.5em;">
                 <div class="col-sm-2"><img width="50" src="/img/s.png" class="img-responsive" alt=""></div>
                 <div class="col-sm-10"><div class="lead" style="margin-bottom: 0;">КУРС “ТЕОРИЯ ИНФОРМАЦИИ”</div><a href="./#">ссылка</a></div>
             </div>
         </div>
     </div>
 </div>
</div>


<!--    <div class="input-group">-->
<!--        <input type="text" class="form-control timepicker">-->
<!---->
<!--        <div class="input-group-addon">-->
<!--            <i class="fa fa-clock-o"></i>-->
<!--        </div>-->
<!--    </div>-->
<?php endif;?>
    <style>
        .progress, .progress>.progress-bar, .progress .progress-bar, .progress>.progress-bar .progress-bar {
            border-radius: 20px;
        }
        .content .badge {
            padding: .5em 2em;
            margin-bottom: .4em;
            border-radius: 25px;
        }

        hr {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .bg-green {
            background-color: #54c152 !important;
        }
        .bg-red {
            background-color: #F24151 !important;
        }
        .progress-bar-green, .progress-bar-success {
            background-color: #54c152;
        }
        .progress-bar-yellow, .progress-bar-warning {
            background-color: #EB9632;
        }
        .text-success {
            color: #54c152;
        }
        .text-danger {
            color: #F24151 !important
        }
        .text-primary {
            color: #548DAD !important
        }
        .text-warning {
            color: #EB9632 !important
        }

        #family-graph {
            width: 100%;
            height: 100%;
        }

        #wrapper-2 {
            margin-top: 50px;
            position: relative;
            overflow-x: auto;
        }

        #root-left {
            position: relative;
            display: table-cell;
            vertical-align: middle;
            right: -150px;
        }

        #root-right {
            position: relative;
            display: table-cell;
            vertical-align: middle;
        }

        #main-root {
            position: relative;
            display: table-cell;
            vertical-align: middle;
            min-width: 0px;
        }

        /*right tree*/
        .branch {
            position: relative;
            margin-left: 250px;
        }


        .branch:before {
            content: "";
            width: 50px;
            border-top: 2px solid magenta;
            position: absolute;
            left: -100px;
            top: 50%;
            margin-top: 1px;
        }

        .entry {
            position: relative;
            min-height: 60px;
            min-width: 150px;
        }

        .entry:before {
            content: "";
            height: 100%;
            position: absolute;
            border-left: 2px solid black;
            left: -50px;
        }

        .entry:after {
            content: "";
            width: 50px;
            border-top: 2px solid aqua;
            position: absolute;
            left: -50px;
            top: 50%;
            margin-top: 1px;
        }

        .entry:first-child:before {
            width: 10px;
            height: 50%;
            top: 50%;
            margin-top: 2px;
            border-radius: 10px 0 0 0;
        }


        .entry:first-child:after {
            height: 10px;
            border-radius: 10px 0 0 0;
        }

        .entry:last-child:before {
            width: 10px;
            height: 50%;
            border-radius: 0 0 0 10px;
        }

        .entry:last-child:after {
            height: 10px;
            border-top: none;
            border-bottom: 2px solid aqua;
            border-radius: 0 0 0 10px;
            margin-top: -10px;
        }

        .entry.sole:after {
            width: 50px;
            height: 0px;
            margin-top: 1px;
            border-radius: 0px
        }

        .entry.sole:before {
            display: none;
        }


        #wrapper-2 .label {
            display: block;
            min-width: 150px;
            padding: 5px 10px;
            line-height: 20px;
            text-align: center;
            border: 2px solid silver;
            border-radius: 5px;
            position: absolute;
            left: 0;
            top: 50%;
            margin-top: -15px;
            overflow-wrap: break-word;
            background-color: lightblue;
        }

        /* left tree  */
        .branch-inverse {
            position: relative;
            margin-right: 250px;
        }

        .branch-inverse:before {
            content: "";
            width: 50px;
            border-top: 2px solid magenta;
            position: absolute;
            right: -100px;
            top: 50%;
            margin-top: 1px;
        }

        .entry-inverse {
            position: relative;
            min-height: 60px;
            min-width: 150px;
        }

        .entry-inverse:after {
            content: "";
            width: 50px;
            border-top: 2px solid aqua;
            position: absolute;
            right: -50px;
            top: 50%;
            margin-top: 1px;
        }

        .entry-inverse:before {
            content: "";
            height: 100%;
            border-right: 2px solid black;
            position: absolute;
            right: -50px;
        }

        .entry-inverse:first-child:before {
            width: 10px;
            height: 50%;
            top: 50%;
            margin-top: 2px;
            border-radius: 0 10px 0 0;
        }


        .entry-inverse:first-child:after {
            height: 10px;
            border-radius: 0 10px 0 0;
        }

        .entry-inverse:last-child:before {
            width: 10px;
            height: 50%;
            border-radius: 0 0 10px 0;
        }

        .entry-inverse:last-child:after {
            height: 10px;
            border-top: none;
            border-bottom: 2px solid aqua;
            border-radius: 0 0 10px 0;
            margin-top: -10px;
        }

        .entry-inverse.sole:after {
            width: 50px;
            height: 0px;
            margin-top: 1px;
            border-radius: 0px;
        }

        .entry-inverse.sole:before {
            display: none;
        }


        .label-inverse {
            display: block;
            min-width: 150px;
            padding: 5px 10px;
            line-height: 20px;
            text-align: center;
            border: 2px solid silver;
            border-radius: 5px;
            position: absolute;
            right: 0;
            top: 50%;
            margin-top: -15px;
            overflow-wrap: break-word;
            background-color: lightblue;
        }
    </style>
<br>
<img src="/img/load/Screenshot_1.png" alt="" style="margin-bottom: 1em; margin-left: 1em;">
<img src="/img/load/Screenshot_2.png" alt="" style="margin-bottom: 1em; margin-left: 1em;">
<img src="/img/load/Screenshot_3.png" alt="" style="margin-bottom: 1em; margin-left: 1em;">
<img src="/img/load/Screenshot_4.png" alt="" style="margin-bottom: 1em; margin-left: 1em;">
<img src="/img/load/Screenshot_5.png" alt="" style="margin-bottom: 1em; margin-left: 1em;">
<img src="/img/load/Screenshot_6.png" alt="" style="margin-bottom: 1em; margin-left: 1em;">
<!--<img src="/img/load/Screenshot_7.png" alt="" style="margin-bottom: 1em; margin-left: 1em;">-->
<img src="/img/load/Screenshot_8.png" alt="" style="margin-bottom: 1em; margin-left: 1em;">
<!--<img src="/img/load/Screenshot_9.png" alt="" style="margin-bottom: 1em; margin-left: 1em;">-->

<script src="bower_components/chart.js/Chart.js"></script>
<script src="/js/dashboard2.js"></script>

