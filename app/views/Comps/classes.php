<h4>Соответствие групп</h4>
<a href="/comps" class="btn btn-primary">Назад</a>
<a href="/comps/classedit" class="btn btn-success">Создать</a>
<h4></h4>

<table class="table table-bordered">
    <thead>
    <tr>
        <th>Группа</th>
        <th>Группа в AD</th>
        <th>Действие</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($classad as $item): ?>
        <tr>
            <td><?= $item['classedu'] ?></td>
            <td><?= $item['classad'] ?></td>
            <td>
                <a class="btn btn-primary btn-xs" href="/comps/classedit?id=<?= $item['id'] ?>"><span class="glyphicon glyphicon-pencil"></span></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
