

<!--<link href="/libs/bootstrap-table/dist/bootstrap-table.min.css" rel="stylesheet">
<1script src="/libs/bootstrap-table/dist/bootstrap-table.min.js"></script>
<script src="/libs/bootstrap-table/dist/bootstrap-table-locale-all.min.js"></script>

<style>
    .select,
    #locale {
        width: 100%;
    }
    .like {
        margin-right: 10px;
    }
</style>

<div id="toolbar"></div>
<table
        id="table"
        data-toggle="table"
        data-toolbar=".toolbar"
        data-sortable="false"
        data-height="460"
        data-url="json/data1.json">
    <thead>
    <tr>
        <th data-field="state" data-checkbox="true">ID</th>
        <th data-field="id" data-sortable="true">ID</th>
        <th data-field="name" data-sortable="true">Item Name</th>
        <th data-field="price" data-sortable="true">Item Price</th>
    </tr>
    </thead>
</table>

<script>
    var $table = $('#table')
    var $remove = $('#remove')
    var selections = []

    function getIdSelections() {
        return $.map($table.bootstrapTable('getSelections'), function (row) {
            return row.id
        })
    }

    function responseHandler(res) {
        $.each(res.rows, function (i, row) {
            row.state = $.inArray(row.id, selections) !== -1
        })
        return res
    }

    function detailFormatter(index, row) {
        var html = []
        $.each(row, function (key, value) {
            html.push('<p><b>' + key + ':</b> ' + value + '</p>')
        })
        return html.join('')
    }

    function operateFormatter(value, row, index) {
        return [
            '<a class="like" href="javascript:void(0)" title="Like">',
            '<i class="fa fa-heart"></i>',
            '</a>  ',
            '<a class="remove" href="javascript:void(0)" title="Remove">',
            '<i class="fa fa-trash"></i>',
            '</a>'
        ].join('')
    }

    window.operateEvents = {
        'click .like': function (e, value, row, index) {
            alert('You click like action, row: ' + JSON.stringify(row))
        },
        'click .remove': function (e, value, row, index) {
            $table.bootstrapTable('remove', {
                field: 'id',
                values: [row.id]
            })
        }
    }

    function totalTextFormatter(data) {
        return 'Total'
    }

    function totalNameFormatter(data) {
        return data.length
    }

    function totalPriceFormatter(data) {
        var field = this.field
        return '$' + data.map(function (row) {
            return +row[field].substring(1)
        }).reduce(function (sum, i) {
            return sum + i
        }, 0)
    }

    function initTable() {
        $table.bootstrapTable('destroy').bootstrapTable({
            height: 750,
            locale: 'ru-RU',
            columns: [
                [{
                    field: 'state',
                    checkbox: true,
                    rowspan: 2,
                    align: 'center',
                    valign: 'middle'
                }, {
                    title: 'Item ID',
                    field: 'id',
                    rowspan: 2,
                    align: 'center',
                    valign: 'middle',
                    sortable: true,
                    footerFormatter: totalTextFormatter
                }, {
                    title: 'Item Detail',
                    colspan: 3,
                    align: 'center'
                }],
                [{
                    field: 'name',
                    title: 'Item Name',
                    sortable: true,
                    footerFormatter: totalNameFormatter,
                    align: 'center'
                }, {
                    field: 'price',
                    title: 'Item Price',
                    sortable: true,
                    align: 'center',
                    footerFormatter: totalPriceFormatter
                }, {
                    field: 'operate',
                    title: 'Item Operate',
                    align: 'center',
                    clickToSelect: false,
                    events: window.operateEvents,
                    formatter: operateFormatter
                }]
            ]
        })
        $table.on('check.bs.table uncheck.bs.table ' +
            'check-all.bs.table uncheck-all.bs.table',
            function () {
                $remove.prop('disabled', !$table.bootstrapTable('getSelections').length)

                // save your data, here just save the current page
                selections = getIdSelections()
                // push or splice the selections if you want to save all data selections
            })
        $table.on('all.bs.table', function (e, name, args) {
            console.log(name, args)
        })
        $remove.click(function () {
            var ids = getIdSelections()
            $table.bootstrapTable('remove', {
                field: 'id',
                values: ids
            })
            $remove.prop('disabled', true)
        })
    }

    $(function() {
        initTable()
    })
</script>-->


<!--<div class="row">
    <div class="col-8">
        <table class="table">
            <thead>
            <tr class="row">
                <th class="col">Должность</th>
                <th class="col">Приоритет</th>
                <th class="col">Дата</th>
                <th class="col">Статус</th>
                <td class="right-hide"></td>
            </tr>
            </thead>
            <tbody>
            <tr class="row row-item selected">
                <td class="col">Java Разработчик</td>
                <td class="col">Высокий</td>
                <td class="col" class="text-sm">12.12.2020<br>26.12.2020</td>
                <td class="col">Открытая</td>
                <td class="right-hide"></td>
            </tr>
            <?php /*for ($i = 0; $i < 10; $i++): */?>
                <tr class="row row-item">
                    <td class="col">Java Разработчик</td>
                    <td class="col">Высокий</td>
                    <td class="col text-sm">12.12.2020<br>26.12.2020</td>
                    <td class="col">Открытая</td>
                    <td class="right-hide"></td>
                </tr>
            <?php /*endfor; */?>
            </tbody>
        </table>
    </div>
    <div class="col-4 d-flex flex-column">

    </div>
</div>



<?php /*$this->getPart('inc/widgets/circles') */?>

<div class="content2" style="width:300px;">
    <div class="item l-t"></div>
    <div class="item l-t"></div>
    <div class="item l-t"><?php /*$this->getPart('inc/widgets/todo_list') */?></div>
    <div class="item selected l-t"><?php /*$this->getPart('inc/widgets/todo_list') */?></div>
    <div class="clearfix"></div>
</div>

<style>

</style>-->
