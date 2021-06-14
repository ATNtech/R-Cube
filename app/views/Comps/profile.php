<h4>Редактор связи профиль - компетенция</h4>
<a href="/comps" class="btn btn-primary">Назад</a>

<h4></h4>
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home3">2018 год</a></li>
  <li><a data-toggle="tab" href="#home">2017 год</a></li>
  <li><a data-toggle="tab" href="#home2">2016 год</a></li>
</ul>

<div class="tab-content">
    <div id="home" class="tab-pane fade">
        <h4></h4>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Направление</th>
            <th>Профиль</th>
            <th>Группа</th>
            <th>Компетенции</th>
            <th>Действие</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($profs as $item): ?>
    <?php if ($item['course'] != 1) continue; ?>
        <tr>
            <td class="text-left"><?= $item['napr'] ?></td>
            <td class="text-left"><?= $item['prof'] ?></td>
            <td><?= $item['class'] ?></td>
            <td class="text-left"><?= $item['comps'] ?></td>
            <td>
                <a class="btn btn-primary btn-xs" href="/comps/profedit?id=<?= $item['id'] ?>"><span class="glyphicon glyphicon-pencil"></span></a>
<!--                <a class="btn btn-danger btn-xs" href="/comps/delete?id=--><?//= $item['id'] ?><!--"><span class="glyphicon glyphicon-remove"></span></a>-->
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
    </div>
    <div id="home2" class="tab-pane fade">
        <h4></h4>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Направление</th>
            <th>Профиль</th>
            <th>Группа</th>
            <th>Компетенции</th>
            <th>Действие</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($profs as $item): ?>
    <?php if ($item['course'] != 2) continue; ?>
        <tr>
            <td class="text-left"><?= $item['napr'] ?></td>
            <td class="text-left"><?= $item['prof'] ?></td>
            <td><?= $item['class'] ?></td>
            <td class="text-left"><?= $item['comps'] ?></td>
            <td>
                <a class="btn btn-primary btn-xs" href="/comps/profedit?id=<?= $item['id'] ?>"><span class="glyphicon glyphicon-pencil"></span></a>
<!--                <a class="btn btn-danger btn-xs" href="/comps/delete?id=--><?//= $item['id'] ?><!--"><span class="glyphicon glyphicon-remove"></span></a>-->
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
    </div>
    <div id="home3" class="tab-pane fade in active">
        <h4></h4>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Направление</th>
            <th>Профиль</th>
            <th>Группа</th>
            <th>Компетенции</th>
            <th>Действие</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($profs as $item): ?>
    <?php if ($item['course'] != 0) continue; ?>
    <?php if (empty($item['class'])) continue; ?>
        <tr>
            <td class="text-left"><?= $item['napr'] ?></td>
            <td class="text-left"><?= $item['prof'] ?></td>
            <td><?= $item['class'] ?></td>
            <td class="text-left"><?= $item['comps'] ?></td>
            <td>
                <a class="btn btn-primary btn-xs" href="/comps/profedit?id=<?= $item['id'] ?>"><span class="glyphicon glyphicon-pencil"></span></a>
<!--                <a class="btn btn-danger btn-xs" href="/comps/delete?id=--><?//= $item['id'] ?><!--"><span class="glyphicon glyphicon-remove"></span></a>-->
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
    </div>
</div>