<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="icon" href="/favicon.ico">
    <meta name="theme-color" content="#563d7c">
    <script src="https://kit.fontawesome.com/4098fb5e0f.js" crossorigin="anonymous"></script>
    <!-- Custom styles for this template -->
    <link href="/style.css?r=2" rel="stylesheet">
    <link href="/media.css?r=2" rel="stylesheet">
    <title>HANTY</title>
    <style>
        #script-warning {
            display: none;
            background: #eee;
            border-bottom: 1px solid #ddd;
            padding: 0 10px;
            line-height: 40px;
            text-align: center;
            font-weight: bold;
            font-size: 12px;
            color: red;
        }

        #loading {
            display: none;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        #calendar1 {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 10px;
        }

        #external-events {
            position: absolute;
            left: 20px;
            top: 20px;
            width: 150px;
            padding: 0 10px;
            border: 1px solid #ccc;
            background: #eee;
            text-align: left;
        }

        #external-events h4 {
            font-size: 16px;
            margin-top: 0;
            padding-top: 1em;
        }

        #external-events .fc-event {
            margin: 3px 0;
            cursor: move;
        }

        #external-events p {
            margin: 1.5em 0;
            font-size: 11px;
            color: #666;
        }

        #external-events p input {
            margin: 0;
            vertical-align: middle;
        }

        #calendar-wrap {
            margin-left: 200px;
            position: relative;
        }
    </style>

</head>
<?php
$menu = [
    // 'index' => "fa fa-list-alt",
    'page' => "fa fa-briefcase",
    'index' => "fa fa-paperclip",
    'page3' => "fa fa-list",
    'page4' => "fa fa-puzzle-piece",
    'page5' => "fa fa-check-circle",
    'page6' => "fa fa-dot-circle",
    'page7' => "far fa-dot-circle",
    'page8' => "fas fa-terminal",
];

$badges = [
    'page' => '+1',
    'index' => '+512',
    'page3' => '<img src="/img/s1.svg" alt="">',
    'page4' => null,
    'page5' => null,
    'page6' => '00:10:00',
    'page7' => null,
    'page8' => null,
]
?>

<body>
<nav class="navbar navbar-light bg-white p-0" style="z-index: 100;">
    <a class="logo" href="/"><img src="/logo.png" alt="" width="300"></a>
    <form class="search-form form-inline">
        <div class="input-group">
            <div class="input-group-prepend">
                    <span class="input-group-text" style="padding: 4px;">
                        <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                           style="color: white;text-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25);font-size: 22px;"><i
                                    class="fa fa-chevron-circle-down"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                            <a class="dropdown-item" href="#">Java разработчик</a>
                            <a class="dropdown-item" href="#">Java разработчик</a>
                            <a class="dropdown-item" href="#">Java разработчик</a>
                            <a class="dropdown-item" href="#">Java разработчик</a>
                        </div>
                    </span>
            </div>
            <input class="form-control mr-sm-2" type="text" value="Java разработчик">
        </div>
        <button class="btn btn-primary my-2 my-sm-0" type="submit" style="margin-left: -50px;width: 140px;z-index:3">
            Вперед
        </button>
    </form>

    <div class="ml-auto">
        <a type="button" class="nav_top calendar" data-toggle="modal" data-target="#calendar" href="#calendar"><img
                    src="/img/calendar_top.png" alt="">&nbsp;<span class="d-none d-lg-inline-block">Календарь</span></a>
        <a type="button" class="nav_top plus" href="#"><img src="/img/plus.png" alt="">&nbsp;</a>
        <a type="button" class="nav_top msg" href="#"><img src="/img/msg.png" alt="">&nbsp;</a>

        <img class="d-none d-lg-inline-block ml-3" height="80" src="/img/nav_top.png" alt="">
    </div>
</nav>

<div class="wrapper">
    <div class="sidebar">
        <ul>
            <?php foreach ($menu as $url => $item) : ?>
                <li class="">
                    <a class="d-flex justify-content-between w-100 <?= $url == $this->route['action'] ? 'active' : '' ?>"
                       href="<?= $url == 'index' ? '/' : $url ?>">
                        <i class="<?= $item ?>"></i>
                        <!-- <small class="float-right" style="font-size: .4em;"><? //=$badges[$url]?></small> -->
                    </a>
                </li>
            <?php endforeach; ?>
            <li><a href="https://bbb.sanchozzz.beget.tech" target="_blank"><i class="far fa-play-circle"></i></a></li>
            <li><img style="margin-left: -40px" src="/img/Avatar.png" alt=""></li>
            <li><a href="#" data-toggle="modal" data-target="#config" class="text-gradient btn-config"><i
                            class="fa fa-cog"></i></a></li>
            <li><a href="/user/logout"><img src="/img/exit.svg" alt="" style="width:1.2em"></a></li>
        </ul>
    </div>
    <div class="container-fluid content pt-3">
        <?= $content ?>
    </div>
</div>

<div class="modal fade" id="calendar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content" style="background: none;border: none;">
            <div class="modal-body">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="/calendar/" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="config" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="display: block;text-align: center;padding: 1em;">
            <img src="/img/edit.png" class="img-fluid" alt="">
        </div>
    </div>
</div>
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" style="background: none;border: none;">
            <div class="modal-body">
                <div class="pnl2">
                    <div class="mb-4">
                        <a class="btn btn-secondary mr-3">Сохранить как черновик</a>
                        <a class="btn btn-primary mr-3" data-dismiss="modal">Создать</a>
                        <a href="#"><img src="/img/list/l1.svg" alt=""></a>
                    </div>

                    <div class="row">
                        <div class="col-7">
                            <div class="row">
                                <div class="col-6"><b>Название:</b></div>
                                <div class="col-6"><input type="text" class="form-control" value="Java разработчик">
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-6"><b>Специализации:</b></div>
                                <div class="col-6">
                                    <select class="mst form-control" multiple="multiple">
                                        <option selected>IT</option>
                                        <option selected>Программист</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-6"><b>Город:</b></div>
                                <div class="col-6"><input type="text" class="form-control" value="Москва"></div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-6"><b>Адрес:</b></div>
                                <div class="col-6"><input type="text" class="form-control" value="м.Бабушкино"></div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-6"><b>Зарплата:</b></div>
                                <div class="col-6"><input type="text" class="form-control"
                                                          value="50 000 - 70 000 рублей"></div>
                            </div>
                        </div>
                        <div class="col-5 text-center">
                            <img src="/img/video.svg" alt="" width="100">
                            <select id="ch" class="form-control mb-2">
                                <option value="NFBmlewLt8w">https://www.youtube.com/watch?v=NFBmlewLt8w</option>
                                <option value="oJPNMOisyCw">https://www.youtube.com/watch?v=oJPNMOisyCw</option>
                                <option value="OmApr4hAm1A">https://www.youtube.com/watch?v=OmApr4hAm1A</option>
                            </select>
                            <div><a href="#" id="add">Добавить видеовизитку</a></div>
                        </div>
                    </div>


                    <div class="row my-4">
                        <div class="col-4"><b>Навыки:</b></div>
                        <div class="col-8">
                            <select class="mst form-control" id="nv" multiple="multiple">
                                <option value="0" selected>JAVA SE</option>
                                <option value="1" selected>Spring Framework</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4"><b>Задачи:</b> <textarea class="form-control"></textarea></div>

                    <div class="row mb-4">
                        <div class="col-4"><b>Условия работы:</b></div>
                        <div class="col-4"><select class="form-control">
                                <option>Удаленка</option>
                                <option>Полный рабочий день</option>
                                <option>2/2</option>
                            </select></div>
                    </div>
                    <div class="mb-4"><b>Этапы воронки:</b>
                        <select class="ms form-control" multiple="multiple">
                            <option selected>Резюме</option>
                            <option>Видеорезюме</option>
                            <option selected>Tестирование</option>
                            <option selected>SoftSkills</option>
                            <option>HardSkills</option>
                            <option selected>Tестовое задание</option>
                            <option selected>Cобеседование</option>
                            <option selected>Tрудоустройство</option>
                        </select>
                        <div class="mt-4"><a href="/page4"><b>Тестовое задание:</b> <i
                                        class="fas fa-plus-circle"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="modal-content" style="background: no-repeat;border: none;display:block"> -->
        <!-- <img src="/img/modal.svg" class="img-fluid w-100" alt=""> -->
        <!-- </div> -->
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
<script src="/libs/tagsinput/jquery.tagsinput.min.js"></script>
<script src="/libs/countUp/countUp.min.js"></script>

<link rel="stylesheet" href="/libs/tagsinput/jquery.tagsinput.min.css">
<script>
    // $('body').on('click','tbody > tr.sel',function() {
    //     $('#edit').modal('toggle')
    // })
    <?php if(isset($_GET['qwe'])): ?>
    $('#calendar').modal('show')
    <?php endif; ?>

    $('tbody > tr').click(function () {
        $('tbody > tr.selected').removeClass('selected')
        $(this).addClass('selected')
    })
</script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(".ms").select2({
        theme: "classic",
        language: "rus"
    })
    $(".mst").select2({
        theme: "classic",
        tags: true,
        language: "rus",
        tokenSeparators: [',']
    })
</script>
<style>
    .ms ~ .select2-container--classic .select2-selection--multiple .select2-selection__choice {
        background-color: #5A8FCC !important;
    }

    .mst ~ .select2-container--classic .select2-selection--multiple .select2-selection__choice {
        background-color: #D93632 !important;
    }

    .select2-container--classic .select2-selection--multiple .select2-selection__choice {
        border-radius: 10px;
        color: white;
    }

    .select2-container--classic .select2-selection--multiple .select2-selection__choice__display {
        padding-left: 5px;
        padding-right: 2px;
    }

    .select2-container--classic .select2-selection--multiple .select2-selection__choice__remove {
        float: right;
        color: white;
    }

    .select2-container--classic .select2-selection--multiple {
        border: none;
    }
</style>

<script>
    $('#add').click(function () {
        $.get('/profile?id=' + $('#ch').val(), function (res) {
            var sel = [];
            var l = $('#nv').val().length;
            JSON.parse(res).forEach(function (val, i, arr) {
                var id = l + i - 1;
                var data = {id: id, text: val};
                // var newOption = new Option(data.text, data.id, false, false);
                // $('#nv').append(newOption);

                if ($('#nv').find("option[value='" + data.id + "']").length) {
                    // $('#nv').val(data.id).trigger('change');
                } else {
                    sel.push(i)
                    var newOption = new Option(data.text, data.id, true, true);
                    $('#nv').append(newOption);
                }
            })

            $('#nv').trigger('change');
        })
    })

    $('.dropdown-menu a').click(function () {
        if ($('table').length) {
            $('table').addClass('blur')
            setTimeout(() => $('table').removeClass('blur'), 1000);
        }
    })
</script>
<?php foreach ($scripts as $script) {
    echo $script;
} ?>
</body>

</html>