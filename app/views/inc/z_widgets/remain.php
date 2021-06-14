<div class="card">
<!--    <div class="card-header">-->
<!--        <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">-->
<!--            Осталось сделать-->
<!--        </a>-->
<!--    </div>-->
    <div class="card-body ">
<!--        <div class="collapse" id="collapseExample">-->
            <?php
            foreach (scandir('/home/s/sanchozzz/gazprombank.sanchozzz.beget.tech/public_html/public/_widgets') as $file) {
                if (
                    strpos($file,'.jpg') !== false ||
                    strpos($file,'.png') !== false
                ) echo '<img class="img-fluid" src="/_widgets/'.$file.'">';
            }
            ?>
<!--        </div>-->
    </div>
</div>
