<div class="swiper-slide" data-title="<?php echo get_the_title(); ?>">
        <?php
            $vlue = $this->term;
            $parentslug = $this->parent_slug;
            $termparent = get_term($vlue->parent, 'categoria');
            $term_meta =  get_term_meta ( $vlue->parent, 'showcase-taxonomy-image-id', true );
            $meta_taxonomy = get_term_meta ( $vlue->term_id, 'showcase-taxonomy-image-id', true );
            $imageparent = wp_get_attachment_url ( $term_meta, 'large' );
            $imagetaxonomy = wp_get_attachment_url ( $meta_taxonomy, 'large' );
            $linkparent = get_term_link($parentslug, 'categoria');
        ?>
    <div class="showcase__item_container">
        <figure style="">
            <?php echo wp_get_attachment_image ( $term_meta, 'vitrine' ); ?>
        </figure>
        <article>
            <i class="icon" style="content: url('<?php echo $imagetaxonomy; ?>'); "></i>
            <h2><a href="<?php echo $linkparent; ?>"><?php echo $vlue->name; ?></a></h2>
            <div class="showcase__content">
            <?php echo nl2br($vlue->description); ?>
            </div>
        </article>
    </div>
</div>