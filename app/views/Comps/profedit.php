<style>
    .table > tbody > tr > td {
        border-top: none;
        padding: 0;
    }
</style>
<div class="alert alert-warning" role="alert">
   При назначении теста для дисциплины "Иностранный язык" необходимо выбрать все три теста (английский, немецкий и французский). У студента отобразится только один, который он выбрал.
   <hr>
   Это правило относится и для профильных дисциплин <br>(тест появится у студента при успешном прохождении базового теста с успешностью > 69%).
</div>
<form action="/comps/profsave" method="post">
    <div class="panel panel-default">
        <div class="panel-heading">Редактор связи профиль - компетенция</div>
        <div class="panel-body">
            <h4></h4>
<!--            <div class="col-xs-12">-->
<!--                <h4></h4>-->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 33%;">Дисциплина</th>
                        <th style="width: 33%;">Компетенции (Короткие названия через запятую!)</th>
                        <th>Тест</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($discs as $k => $disc): ?>
                <tr>
                    <td style="text-align: left;"><?= $disc ?></td>
                    <td style="text-align: left;"><?= $comps[$k] ?></td>
                    <td><?= $tests[$k] ?></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <hr>
            <div class="col-sm-12">
                <b>Подпись под таблицей (разделять новой строкой):</b><br>
                <textarea class="form-control" rows="7" name="att"><?= str_replace('|',"\r\n",$profs->att) ?></textarea>
                <hr>
                <div class="form-group">
                    <label for="">Название кафедры (в род. падеже):</label>
                    <textarea class="form-control" type="text" name="caftext" id="caftext"><?= $profs->caftext ?></textarea>
                </div>
                <div class="form-group">
                    <label for="">Фамилия зав. кафедры:</label>
                    <input class="form-control" type="text" name="cafname" id="cafname" value="<?= $profs->cafname ?>">
                </div>
            </div>
<!--                --><?//= $comps ?>
<!--            </div>-->
        </div>
        <div class="panel-footer">
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
            <a href="/comps/profile" class="btn btn-primary">Назад</a>
            <input class="btn btn-success" type="submit" value="Сохранить">
        </div>
    </div>
</form>
