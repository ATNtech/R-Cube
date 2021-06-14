<span class="btn btn-default">По промежуточной аттестации</span>
<span class="btn btn-default">По освоению компетенций</span>
<div id="wrapper-2">
    <!--<div id="root-left">
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
    </div>-->
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
<?php new \fw\widgets\menu\Menu()?>

12313132
<div class="form-group">
                  <label>Text Disabled</label>
                  <input type="text" class="form-control" placeholder="Enter ..." disabled="">
                </div>
                
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
            <!-- /.box-body -->
          </div>                

<style>

    #family-graph {
        width: 100%;
        height: 100%;
    }

    #wrapper-2 {
        margin-top: 50px;
        position: relative;
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