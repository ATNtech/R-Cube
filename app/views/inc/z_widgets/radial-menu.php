
<script src='js/blooming-menu.min.js'></script>
<script>
    var bloomingMenu = new BloomingMenu({
        startAngle: -100,
        endAngle: 0,
        radius: 150,
        itemsNum: 4,
        itemAnimationDelay: 0.08
    })
    bloomingMenu.render()

    // Prevents "elastic scrolling" on Safari
    document.addEventListener('touchmove', function(event) {
        'use strict'
        event.preventDefault()
    })
</script>

<script>
    $(document).ready(function () {
        $('.blooming-menu__main-content').html('<img class="img-fluid" src="/img/user-radial.svg"/>')
    })
</script>

<style>
    body .blooming-menu__container {
        left: 110px;
        bottom: 0px;
        top: auto;
        position: fixed;
        z-index: 1085;
    }

    .blooming-menu__item:nth-of-type(1) .blooming-menu__item-btn {
        background-image: url(img/um1.svg);
        background-size: 55%;
    }

    .blooming-menu__item:nth-of-type(2) .blooming-menu__item-btn {
        background-image: url(img/um2.svg);
    }

    .blooming-menu__item:nth-of-type(3) .blooming-menu__item-btn {
        background-image: url(img/um3.svg);
    }

    .blooming-menu__item:nth-of-type(4) .blooming-menu__item-btn {
        background-image: url(img/um4.svg);
        background-size: 55%;
    }

    .blooming-menu__item-btn:hover {
        box-shadow: 0 8px 17px 0 rgba(0,0,0,.2);
        opacity: 1;
        background-color: #08A652;
    }

    .blooming-menu__main-content {
        line-height: inherit;
    }

    button:focus {
        outline: none;
    }

    .blooming-menu__main {
        width: 150px;
        height: 150px;
        background: none;
    }

    .blooming-menu__container {
        width: 150px;
        height: 150px;
        box-shadow:none;
    }
    .blooming-menu__main:hover {
        box-shadow:none;
    }

    .blooming-menu__main.is-active {
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }

    .blooming-menu__item-btn-wrapper {
        background-color: #C4C4C4;
    }

    .blooming-menu__item {
        width: 60px;
        height: 60px;
        bottom: 25px;
        left: 25px;
    }

</style>