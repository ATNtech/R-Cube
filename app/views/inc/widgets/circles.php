<div class="col-12">

    <div class="circle circle-2">
        <div class="circles-context">
            <div><i class="mr-2 fa fa-plus"></i> Резюме</div>
            <div><i class="mr-2 fa fa-list-alt"></i> Тестирование</div>
            <div><i class="mr-2 far fa-smile"></i> Видеовизитка</div>
            <div><i class="mr-2 fa fa-bullhorn"></i> Собеседование</div>
        </div>
        <div class="circles-percent"><span id="circles-count">0</span>%</div>

    </div>
</div>

<script>
    let CHART2 = document.createElementSvgCircles();
    document.querySelector('.circle-2').appendChild(CHART2);

    CHART2.add([
        {
            radius: 50,
            width: 2,
            percent: 0,
            name : 'val-1',
            color:'#AF231F'
        },
        {
            radius: 40,
            width: 2,
            percent: 0,
            name : 'val-2',
            color:'#675C70'
        },
        {
            radius: 30,
            width: 2,
            percent: 0,
            name : 'val-3',
            color:'#09A0D2'
        },
        {
            radius: 20,
            width: 2,
            percent: 0,
            name : 'val-4',
            color:'#CCF3F9'
        }
    ]);

    (function(){
        CHART2.get('val-1').delay(1000).update({percent: 75}, 1500);
        CHART2.get('val-2').delay(800).update({percent: 65}, 1500);
        CHART2.get('val-3').delay(400).update({percent: 75}, 1500);
        CHART2.get('val-4').update({percent: 75}, 1500);
    })()

    let numAnim = new CountUp("circles-count", 0, 95);
    if (!numAnim.error) {
        numAnim.start();
    } else {
        console.error(numAnim.error);
    }
</script>
<style>
    .circle{
        float: left;
        margin: 50px auto;
        position: relative;
        max-width: 300px;
        max-height: 300px;
    }
    .circles-context{
        position: absolute;
        top: -13px;
        line-height: 30px;
        text-align: right;
        font-size: 15px;
    }
    .circles-percent {
        height: 54px;
        width: 100px;
        position: absolute;
        left: 50%;
        margin-left: -50px;
        top: 50%;
        margin-top: -27px;
        text-align: center;
        font-size: 35px;
        font-weight: bold;
        background: -webkit-linear-gradient(90deg, #C5251F 0%, #00C2FF 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
</style>