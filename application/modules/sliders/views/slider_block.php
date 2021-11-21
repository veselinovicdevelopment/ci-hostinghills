

    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

        <div class="carousel-inner slider-inner" >
            <?php foreach ($slider as $key => $row) { ?>

                <div class="item <?=($key == 0) ? 'active' : '';?>">
                    <div class = "row slider-v-center">
                        <div class = "col-md-6 slider-text">
                            <h1><?=$row->title?></h1>
                            <h3><?=$row->description?></h3>
                            <!--<h1>Hi, Mariya </h1><br>-->
                            <!--<h2>-->
                            <!--    I hope you contact me. <br> -->
                            <!--    This is the only way I can tell you. <br>-->
                            <!--    From Ruslan-->
                            <!--    <p>(sorry for doing this)</p>-->
                            <!--</h2>-->
                        </div>
                        <div class = "col-md-6" style = "height:40vh;display: flex; align-items: center">
                            <img src="<?=base_url()?>resource/uploads/<?=$row->image?>"/>
                        </div>
                    </div>
                </div>
            <?php }  ?>

        </div>
<!--        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">-->
<!--            <span class="glyphicon glyphicon-chevron-left"></span></a><a class="right carousel-control"-->
<!--                                                                         href="#carousel-example-generic" data-slide="next"><span class="glyphicon glyphicon-chevron-right">-->
<!--                        </span></a>-->
    </div>




        
 