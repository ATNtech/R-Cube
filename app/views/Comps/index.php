<h4>Редактор компетенций</h4>
<a href="/comps/#" class="btn btn-primary">Добавить компетенцию</a>
<a href="/comps/#" class="btn btn-warning">Связь с профилями</a>
<a href="/comps/#" class="btn btn-success">Соответствие групп</a>
<a class="btn btn-warning" href="/comps/#">Распечатать отчет</a>

<h4></h4>
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home3">2018 год</a></li>
  <li><a data-toggle="tab" href="#home">2017 год</a></li>
  <li><a data-toggle="tab" href="#home2">2016 год</a></li>
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade">
    <h4></h4>
      <div class="box">
          <div class="box-body no-padding">
              <table class="table table-bordered">
                  <thead>
                  <tr>
                      <th>Коротко</th>
                      <th class="text-left">Полностью</th>
                      <th>Направления</th>
                      <th>Тип</th>
                      <th>Действие</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($comps as $item): ?>
                      <?php if ($item['course'] != 1) continue; ?>
                      <tr>
                          <td><?= $item['short_val'] ?></td>
                          <td class="text-left"><?= $item['val'] ?></td>
                          <td class="text-left"><?= $item['napr'] ?></td>
                          <td><?php switch ($item['type']) {
                                  case '1': echo 'ОК'; break;
                                  case '2': echo 'ОПК'; break;
                                  case '3': echo 'ПК'; break;
                              } ?></td>
                          <td>
                              <a class="btn btn-primary btn-xs" href="/comps/edit?id=<?= $item['id'] ?>"><span class="glyphicon glyphicon-pencil"></span></a>
                              <a class="btn btn-danger btn-xs" href="/comps/#"><span class="glyphicon glyphicon-remove"></span></a>
                          </td>
                      </tr>
                  <?php endforeach; ?>
                  </tbody>
              </table>
          </div>
      </div>

  </div>
  <div id="home2" class="tab-pane fade">
    <h4></h4>
      <div class="box">
          <div class="box-body no-padding">
              <table class="table table-bordered">
                  <thead>
                  <tr>
                      <th>Коротко</th>
                      <th class="text-left">Полностью</th>
                      <th>Направления</th>
                      <th>Тип</th>
                      <th>Действие</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($comps as $item): ?>
                      <?php if ($item['course'] != 2) continue; ?>
                      <tr>
                          <td><?= $item['short_val'] ?></td>
                          <td class="text-left"><?= $item['val'] ?></td>
                          <td class="text-left"><?= $item['napr'] ?></td>
                          <td><?php switch ($item['type']) {
                                  case '1': echo 'ОК'; break;
                                  case '2': echo 'ОПК'; break;
                                  case '3': echo 'ПК'; break;
                              } ?></td>
                          <td>
                              <a class="btn btn-primary btn-xs" href="/comps/edit?id=<?= $item['id'] ?>"><span class="glyphicon glyphicon-pencil"></span></a>
                              <a class="btn btn-danger btn-xs" href="/comps/#"><span class="glyphicon glyphicon-remove"></span></a>
                          </td>
                      </tr>
                  <?php endforeach; ?>
                  </tbody>
              </table>
          </div>
      </div>

  </div>
  <div id="home3" class="tab-pane fade in active">
    <h4></h4>

      <div class="box">
          <div class="box-body no-padding">
              <table class="table table-bordered">
                  <thead>
                  <tr>
                      <th>Коротко</th>
                      <th class="text-left">Полностью</th>
                      <th>Направления</th>
                      <th>Тип</th>
                      <th>Действие</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($comps as $item): ?>
                      <?php if ($item['course'] != 0) continue; ?>
                      <tr>
                          <td><?= $item['short_val'] ?></td>
                          <td class="text-left"><?= $item['val'] ?></td>
                          <td class="text-left"><?= $item['napr'] ?></td>
                          <td><?php switch ($item['type']) {
                                  case '1': echo 'ОК'; break;
                                  case '2': echo 'ОПК'; break;
                                  case '3': echo 'ПК'; break;
                              } ?></td>
                          <td>
                              <a class="btn btn-primary btn-xs" href="/comps/edit?id=<?= $item['id'] ?>"><span class="glyphicon glyphicon-pencil"></span></a>
                              <a class="btn btn-danger btn-xs" href="/comps/#"><span class="glyphicon glyphicon-remove"></span></a>
                          </td>
                      </tr>
                  <?php endforeach; ?>
                  </tbody>
              </table>
          </div>
      </div>

  </div>

</div>

