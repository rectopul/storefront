<div class="container-fluid dicas pb-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 dicas__title text-center mt-5">
                <h1><?php echo get_theme_mod('dicastext'); ?></h1>
                <small><?php echo get_theme_mod('dicassubtext'); ?></small>
            </div>
        </div>
        <div class="row dicas__content mt-4">
            <?php
                $dicas = get_theme_rmb_array('sobretext');
                //var_dump($dicas);
                foreach ($dicas as $valdicas) { ?>
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="dicas__item">
                            <figure><?php echo '<img src="'.$valdicas[full]->url.'"/>'; ?></figure>
                            <article>
                            <?php echo $valdicas[content]; ?>
                            </article>
                        </div>
                    </div><?php
                }
            ?>            
        </div>
    </div>
</div>

<div class="container-fluid processo bg-black pt-5 pb-5">
    <div class="container mt-4 mb-4">
        <div class="row">
            <div class="col-12 processo__title text-center">
                <h1><?php echo get_theme_mod('process__title'); ?></h1>
            </div>
        </div>

        <div class="row mt-5 processo__container d-flex justify-content-between">
            <?php
                $dicas = get_theme_rmb_array('process_images');
                $count = 0;
                //var_dump($dicas);
                foreach ($dicas as $valdicas) { $count++;?>
                    <div class="processo__col">
                        <div class="processo__item">
                            <figure><?php echo '<img src="'.$valdicas['full']->url.'"/>'; ?></figure>
                            <div class="count"><span><i><?php echo $count == 5 ? $count.'($)' : $count;?></i></span></div>
                            <article>
                            <?php echo $valdicas['content']; ?>
                            </article>
                        </div>
                    </div><?php
                }
            ?>   
        </div>
    </div>
</div>
<!-- Números da empresa -->
<div class="container-fluid numpartner">
    <div class="container">
        <div class="row numpartner__container">
            <!-- Numbers One -->
            <div class="col-12 col-sm-12 col-md-4 numpartner__item">
                <div class="numpartner__item-container nmone">
                    <?php echo get_theme_mod('numberone'); ?>
                </div>
                <div class="numpartner__item-container nmonetxt">
                    <div class="numpartner__icon-1"></div>
                    <?php echo get_theme_mod('numberone__text'); ?>
                </div>
            </div>
            <!-- Numbers Two -->
            <div class="col-12 col-sm-12 col-md-4 numpartner__item">
                <div class="numpartner__item-container nmtwo">
                    <?php echo get_theme_mod('numbertwo'); ?>
                </div>
                <div class="numpartner__item-container nmtwotxt">
                    <div class="numpartner__icon-2"></div>
                    <?php echo get_theme_mod('numbertwo__text'); ?>
                </div>
            </div>
            <!-- Numbers Three -->
            <div class="col-12 col-sm-12 col-md-4 numpartner__item">
                <div class="numpartner__item-container nmthree">
                    <?php echo get_theme_mod('numberthree'); ?>
                </div>
                <div class="numpartner__item-container nmthreetxt">
                    <div class="numpartner__icon-3"></div>
                    <?php echo get_theme_mod('numberthree__text'); ?>
                </div>
            </div>
        </div>
    </div>
</div>