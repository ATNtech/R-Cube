<?php 
$id = isset($id) ? $id : '';
?>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-6 d-block d-lg-flex flex-column pr-4">
                <div class="row mb-3 d-block d-lg-flex h-100">
                    <?php if(!isset($noimage)):?>
                    <div class="col">
                        <img class="img-fluid" src="<?=isset($img)?$img:'/img/user0.svg'?>" width="100%" alt="">
                    </div>
                    <?php endif; ?>
                    <div class="col-auto mb-3 d-flex flex-column">
                        <div class="h4 text-bold">Иван Петрович Демидов-Табакан <a href="#"><i class="fa fa-cog float-right ml-5"></i></a></div>
                        <div class="mb-2">Дизайнер, Гринатом, команда стратапа UP г. Москва</div>

                        <?php if(isset($buttons)): ?>
                            <div class="flex-row mt-auto">
                            <a class="btn text-white bg-purple py-2" href="#">HCI</a>
                            <a class="btn text-white bg-purple py-2" href="#">Figma</a>
                            <a class="btn text-white bg-purple py-2" href="#">Photoshop</a>
                            <a class="btn bg-success py-2" href="#">SQL</a>
                            <a class="btn bg-success py-2" href="#">HTML/CSS</a>
                            <a class="btn bg-success py-2" href="#">JS</a>
                            <a class="btn bg-success py-2" href="#">Front-end</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div id="myCanvasContainer<?=$id?>">
                    <canvas width="600" height="200" id="myCanvas<?=$id?>">
                        <p>Anything in here will be replaced on browsers that support the canvas element</p>
                        <ul>
                            <li><a class="btn bg-primary py-2" href="#">Дизайнер</a></li>
                            <li><a class="btn bg-primary py-2" href="#">SEO</a></li>
                            <li><a class="btn bg-primary py-2" href="#">Верстальщик</a></li>
                            <li><a class="btn bg-primary py-2" href="#">python</a></li>
                            <li><a class="btn bg-primary py-2" href="#">SMM</a></li>
                            <li><a class="btn bg-primary py-2" href="#">product manager</a></li>
                        </ul>
                    </canvas>
                </div>
            </div>
        </div>
    </div>
</div>