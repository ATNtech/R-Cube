<div class="stat-widget">
    <div class="row">
        <div class="col-6">
            <div class="text-nowrap"><?= $t ?></div>
            <h1 id="stat-val-<?= $id ?>">0</h1>
        </div>
        <div class="col-6">

            <div class="circle-sm circle-stat-<?= $id ?>">
                <div class="circles-percent"><span id="circles-count-<?= $id ?>">0</span>%</div>
            </div>
        </div>
    </div>
</div>

<script>
    var CHART<?= $id ?> = document.createElementSvgCircles();
    document.querySelector('.circle-stat-<?= $id ?>').appendChild(CHART<?= $id ?>);

    CHART<?= $id ?>.add([
        {
            radius: 35,
            width: 2,
            percent: 0,
            name : 'val-1',
            color:'#85969D'
        }
    ]);

    (function(){
        CHART<?= $id ?>.get('val-1').update({percent: 54}, 1500);
    })()

    let numAnim_<?= $id ?> = new CountUp("circles-count-<?= $id ?>", 0, <?= $p ?>);
    let numAnim2_<?= $id ?> = new CountUp("stat-val-<?= $id ?>", 0, <?= $val ?>, 0, 2.5,{separator: ''});
    if (!numAnim_<?= $id ?>.error) { numAnim_<?= $id ?>.start(); } else { console.error(numAnim_<?= $id ?>.error); }
    if (!numAnim2_<?= $id ?>.error) { numAnim2_<?= $id ?>.start(); } else { console.error(numAnim2_<?= $id ?>.error); }
</script>
