<style>
    .table > tbody > tr > td {
        border-top: none;
        padding: 5px;
    }
</style>

<form action="/comps/profsave" method="post">
    <div class="panel panel-default">
        <div class="panel-heading">Редактор сопоставлений предметов</div>
        <div class="panel-body">
            <h4></h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 66%;">Дисциплина</th>
                        <th style="width: 33%;">Дисциплина в тесте</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($discs2 as $k => $disc2): ?>
                <tr>
                    <td style="text-align: left;"><?= $disc2 ?></td>
                    <td style="text-align: left;">
                        <select name="" class="selectpicker">
                            <option value="" disabled <?= !in_array($disc2, $discs) ? 'selected' : '' ?> style="display: none">Ничего не выбрано</option>
                            <?php foreach ($discs as $disc): ?>
                                <option <?= $disc == $disc2 ? 'selected' : '' ?>><?= $disc ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <hr>
        </div>
        <div class="panel-footer">
            <a href="/comps/profile" class="btn btn-primary">Назад</a>
            <input class="btn btn-success" type="submit" value="Сохранить">
        </div>
    </div>
</form>
