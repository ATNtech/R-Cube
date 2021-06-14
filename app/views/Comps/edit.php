<form action="/comps/save" method="post">
    <div class="panel panel-default">
        <div class="panel-heading">Редактор компетенций</div>
        <div class="panel-body">
            <h4></h4>
            <div class="col-xs-12">
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-6">
                            <label for="">Короткое название</label>
                            <input class="form-control" type="text" placeholder="Короткое название" name="short_val"
                                   value="<?= $comp['short_val'] ?>">
                        </div>
                        <div class="col-xs-6">
                            <label for="">Тип</label>
                            <select class="form-control" name="type">
                                <option <?= $comp['type']==1 ? 'selected ':'' ?>value="1">Общекультурные компетенции</option>
                                <option <?= $comp['type']==2 ? 'selected ':'' ?>value="2">Общие профессиональные компетенции</option>
                                <option <?= $comp['type']==3 ? 'selected ':'' ?>value="3">Профессиональные компетенции</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-6">
                            <label for="">Год поступления</label>
                            <select class="form-control" name="course" type="text" placeholder="Год поступления">
                                <option value="0" selected>2018</option>
                                <option value="1">2017</option>
                                <option value="2">2016</option>
                            </select>
                        </div>
                        <div class="col-xs-6">
                            <label for="">Направления</label>
                            <select id="napr" name="napr[]" class="selectpicker form-control" data-size="10" title="Направления" multiple data-live-search="true"><?= $list_napr ?></select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Описание компетенции</label>
                    <textarea class="form-control" rows="4" type="text" name="val"
                              placeholder="Описание компетенции"><?= $comp['val'] ?></textarea>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <input type="hidden" name="id" value="<?= $comp['id'] ?>">
            <a href="/comps" class="btn btn-primary">Назад</a>
            <input class="btn btn-success" type="submit" value="Сохранить">
        </div>
    </div>
</form>
