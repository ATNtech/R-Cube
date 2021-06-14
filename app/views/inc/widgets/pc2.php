<div class="col-12 col-sm-5 col-md-5">
    <img src="/images/ava.png" alt="" class="img-fluid avatar">

        <img src="/images/Socail.png" alt="" style="margin: auto;
    display: block;
    margin-top: -1em;">

</div>
<div class="col-12 col-sm-5 col-md-6">
    <h4>Тестирование</h4>
    <div id="sliders" class="mb-4"></div>
    <div class="text-center">
        <a href="#"><i class="fa fa-chevron-down"></i> подробнее</a>
    </div>
</div>
<div class="col-10 offset-1 mt-4">
    <h4 class="text-center">Тестирование</h4>
    <div>Тестирование Тестирование Тестирование Тестирование Тестирование Тестирование</div>
    <div>Тестирование Тестирование Тестирование</div>
    <div>Тестирование Тестирование Тестирование</div>
    <div>Тестирование Тестирование Тестирование</div>
    <div>Тестирование Тестирование Тестирование</div>
    <div>Тестирование Тестирование</div>
</div>
<div class="col-12 text-right">
    <a href="#"><i class="fa fa-chevron-down"></i> подробнее</a>
</div>

<script src="/libs/nouislider/nouislider.min.js"></script>
<script src="/libs/wnumb-1.2.0/wNumb.min.js"></script>
<link rel="stylesheet" href="/libs/nouislider/nouislider.min.css">
<script>
    let sliders = document.getElementById('sliders');

    [100,80,80,40,80].forEach(function (v,i) {
        let slider = document.createElement('div');
        slider.id = 'slider-'+i;
        sliders.appendChild(slider);

        noUiSlider.create(slider, {
            start: 0,
            connect: 'lower',
            animationDuration: 1600,
            tooltips: wNumb({decimals: 0}),
            range: {min: 0, max: 150}
        });
        setTimeout(function (){
            slider.noUiSlider.set(v);
        },1000+i*300)
    });
</script>
<style>

    .avatar {
        box-shadow: inset 0 4px 4px rgba(0, 0, 0, 0.25);
        border-radius: 12px;
    }
    .social {
        background: #FFFFFF;
        box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25);
        border-radius: 5px;
        padding: 1em;
    }
</style>
<style>
    .noUi-tooltip {
        color: #30527B;
        border: none;
        font-family: Proxima Nova, serif;
        font-style: normal;
        font-weight: bold;
        bottom: 80%!important;
        padding: 0;
        background: transparent;
        /*font-size: 9px;*/
        /*line-height: 11px;*/
    }
    .noUi-horizontal .noUi-handle {
        width: 16px;
        height: 16px;
        background: #12B1E3;
        border-radius: 16px;
        border: none;
        box-shadow: none;
        cursor: pointer;
        outline: none;
        right: -5px;
        top: -5px
    }
    .noUi-horizontal {
        height: 6px;
    }
    .noUi-target {
        border: none;
        margin-top: 2em;
    }
    .noUi-horizontal .noUi-handle:before,
    .noUi-horizontal .noUi-handle:after {
        content: '';
        background: transparent;
    }
    .noUi-connect {
        background: linear-gradient(90deg, #C5251F 0%, #00C2FF 100%);
    }
    .noUi-state-tap .noUi-connect,
    .noUi-state-tap .noUi-origin {
        -webkit-transition: transform 1600ms;
        transition: transform 1600ms;
    }
</style>