<style>
    .table > tbody > tr > td {
        border-top: none;
        padding: 0;
    }
</style>
<form action="/comps/classsave" method="post">
    <div class="panel panel-default">
        <div class="panel-heading">Редактор соответствия групп</div>
        <div class="panel-body">
            <h4></h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 50%;">Группа</th>
                        <th style="width: 50%;">Группа в AD</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="text-align: left;"><input class="form-control" name="classedu" value="<?= $classad['classedu'] ?>" /></td>
                    <td style="text-align: left;"><input class="form-control" name="classad" value="<?= $classad['classad'] ?>" /></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="panel-footer">
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
            <a href="/comps/class" class="btn btn-primary">Назад</a>
            <input class="btn btn-success" type="submit" value="Сохранить">
        </div>
    </div>
</form>
