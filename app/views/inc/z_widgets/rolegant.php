<div class="card">
    <div class="card-body">
        <div class="d-flex flex-row align-items-center">
            <div class="ml-auto"><?php $this->getPart('inc/widgets/user-icon') ?></div>
            <div class="mx-3"><?php $this->getPart('inc/widgets/user-icon3') ?></div>
            <div class="mx-3"><?php $this->getPart('inc/widgets/user-icon') ?></div>
            <div class="mx-3"><?php $this->getPart('inc/widgets/user-icon') ?></div>
            <div class="mx-3"><?php $this->getPart('inc/widgets/user-icon') ?></div>
            <div class="mr-auto"><?php $this->getPart('inc/widgets/user-icon2') ?></div>
        </div>
    </div>

    <div class="card-body text-center">
        <div class="chart mx-auto" style="width: 800px">
            <canvas id="stackedBarChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
        </div>
    </div>

    <div class="card-body">
        <div class="chart-wrapper">

            <div class="row">
                <div class="col-2">
                    <ul class="chart-left text-nowrap">
                        <li><div class="lead">Архитектура</div><small class="text-success">Фамилия Имя <img class="img-fluid ml-2" src="/img/user.png" alt="" width="24"></small></li>
                        <li><div class="lead">Движок</div><small class="text-success">Фамилия Имя <img class="img-fluid ml-2" src="/img/user.png" alt="" width="24"></small></li>
                        <li><div class="lead">БД</div><small class="text-success">Фамилия Имя <img class="img-fluid ml-2" src="/img/user.png" alt="" width="24"></small></li>
                        <li><small class="text-success">Фамилия Имя <img class="img-fluid ml-2" src="/img/user.png" alt="" width="24"></small><div class="lead"> </div></li>
                        <li><div class="lead">Интерфейс</div><small class="text-success">Фамилия Имя <img class="img-fluid ml-2" src="/img/user.png" alt="" width="24"></small></li>
                        <li><div class="lead">Заказчик</div><small class="text-success">Фамилия Имя <img class="img-fluid ml-2" src="/img/user.png" alt="" width="24"></small></li>
                        <li><div class="lead">Workflow</div><small class="text-success">Фамилия Имя <img class="img-fluid ml-2" src="/img/user.png" alt="" width="24"></small></li>
                    </ul>
                </div>
                <div class="col-10">
                    <ul class="chart-values">
                        <li data-value="sun"> </li>
                        <li data-value="mon"> </li>
                        <li data-value="tue"> </li>
                        <li data-value="wed"> </li>
                        <li data-value="thu"> </li>
                        <li data-value="fri" class="bold"> </li>
                        <li data-value="sat"> </li>
                    </ul>
                    <ul class="chart-bars">
                        <li data-duration="sun-mon" data-value="100" data-color="#08A652">100%</li><!--tue½-wed-->
                        <li data-duration="sun-thu" data-value="100" data-color="#FF8A22">100%</li><!--wed-sat-->
                        <li data-duration="tue-thu" data-value="100" data-color="#54B3E3">100%</li><!--sun-tue-->
                        <li data-duration="wed-sat" data-value="200" data-color="#08A652">50%</li><!--tue½-thu-->
                        <li data-duration="tue-sat" data-value="220" data-color="#FEBE00">60%</li><!--mon-tue½-->
                        <li data-duration="sun-thu" data-value="100" data-color="#54B3E3">В процессе</li><!--wed-wed-->
                        <li data-duration="sun-thu" data-value="100" data-color="#5F6877">В процессе</li><!--thu-fri½-->
                        <!--                <li data-duration="mon½-wed½" data-color="#59a627">Task</li>-->
                        <!--                <li data-duration="fri-sat" data-color="#4464a1">Task</li>-->
                    </ul>
                </div>
            </div>



        </div>
    </div>
</div>

<script>
    function createChart(e) {
        const days = document.querySelectorAll(".chart-values li");
        const tasks = document.querySelectorAll(".chart-bars li");
        const daysArray = [...days];

        tasks.forEach(el => {
            const duration = el.dataset.duration.split("-");
            const startDay = duration[0];
            const endDay = duration[1];
            let left = 0,
                width = 0;

            let backgroundColor = el.dataset.color;

            if (startDay.endsWith("½")) {
                const filteredArray = daysArray.filter(day => day.dataset.value == startDay.slice(0, -1));
                // const filteredArray = daysArray.filter(day => day.textContent == startDay.slice(0, -1));
                left = filteredArray[0].offsetLeft + filteredArray[0].offsetWidth / 2;
            } else {
                const filteredArray = daysArray.filter(day => day.dataset.value == startDay);
                // const filteredArray = daysArray.filter(day => day.textContent == startDay);
                left = filteredArray[0].offsetLeft;
            }

            if (endDay.endsWith("½")) {
                const filteredArray = daysArray.filter(day => day.dataset.value == endDay.slice(0, -1));
                // const filteredArray = daysArray.filter(day => day.textContent == endDay.slice(0, -1));
                width = filteredArray[0].offsetLeft + filteredArray[0].offsetWidth / 2 - left;
            } else if(endDay == 'sat') {
                const filteredArray = daysArray.filter(day => day.dataset.value == endDay);
                width = filteredArray[0].offsetLeft + filteredArray[0].offsetWidth - left;
                const filteredArray2 = daysArray.filter(day => day.dataset.value == 'thu');
                var width2 = filteredArray2[0].offsetLeft + filteredArray2[0].offsetWidth - left;
                backgroundColor = shadeColor(backgroundColor, 15);//'#C4C4C4';
                var label = el.textContent;
                el.textContent = '';
                var inner = document.createElement('div');
                inner.innerHTML = label;
                inner.style.backgroundColor = el.dataset.color
                inner.style.width = `${width2}px`;
                el.appendChild(inner)
                el.style.padding = `0`;
                // const filteredArray = daysArray.filter(day => day.textContent == endDay);
            } else {
                const filteredArray = daysArray.filter(day => day.dataset.value == endDay);
                // const filteredArray = daysArray.filter(day => day.textContent == endDay);
                width = filteredArray[0].offsetLeft + filteredArray[0].offsetWidth - left;
            }

            // apply css
            el.style.left = `${left}px`;
            el.style.width = `${width}px`;
            if (e.type == "load") {
                el.style.backgroundColor = backgroundColor;
                el.style.opacity = 1;
            }
        });
    }

    window.addEventListener("load", createChart);
    window.addEventListener("resize", createChart);

    function shadeColor(color, percent) {

        var R = parseInt(color.substring(1,3),16);
        var G = parseInt(color.substring(3,5),16);
        var B = parseInt(color.substring(5,7),16);

        R = parseInt(R * (100 + percent) / 100);
        G = parseInt(G * (100 + percent) / 100);
        B = parseInt(B * (100 + percent) / 100);

        R = (R<255)?R:255;
        G = (G<255)?G:255;
        B = (B<255)?B:255;

        var RR = ((R.toString(16).length==1)?"0"+R.toString(16):R.toString(16));
        var GG = ((G.toString(16).length==1)?"0"+G.toString(16):G.toString(16));
        var BB = ((B.toString(16).length==1)?"0"+B.toString(16):B.toString(16));

        return "#"+RR+GG+BB;
    }
</script>

