<?php
/**
 * @package PPKAS_UniMAP
 * @version 1.0
 * @author Jamaludin Rajalu
 */
get_header(); ?>
<div class="home-content-wrap">
  <?php
  
    $widget_one_box         = get_option('ukmtheme_widget_one');
    $widget_three_box       = get_option('ukmtheme_widget_three');
    $widget_four_box        = get_option('ukmtheme_widget_four');
    $widget_latest_news     = get_option('ukmtheme_widget_latest_news');
    $widget_facebook        = get_option('ukmtheme_widget_facebook');
    $widget_event           = get_option('ukmtheme_widget_event');
    $widget_tabber          = get_option('ukmtheme_widget_tabber');
    $widget_slideset        = get_option('ukmtheme_widget_slideset');

    get_template_part( 'templates/widget', $widget_slideset ); ?>
    <div class="wrap">
      <?php
        /**
         * Susunan Widget di muka hadapan web
         * Boleh disusun mengikut kehendak PTJ
         * Susunan asal adalah seperti di bawah. Jangan ubah kod di atas
         * Sebarang keraguan boleh menghubungi pembangun di sambungan 6685
         */
        
        /** 1. */ get_template_part( 'templates/widget', $widget_event );
        /** 2. */ get_template_part( 'templates/widget', $widget_tabber );
        /** 3. */ get_template_part( 'templates/widget', $widget_latest_news );
        /** 4. */ get_template_part( 'templates/widget', $widget_one_box );
        /** 5. */ get_template_part( 'templates/widget', $widget_three_box );
        /** 6. */ get_template_part( 'templates/widget', $widget_four_box );
        /** 7. */ get_template_part( 'templates/widget', $widget_facebook );

        /**
         * Sekiranya anda telah menambah widget area di functions.php
         * gunakan kod <?php if (dynamic_sidebar( 'sidebar-4' )) : else : endif; ?>
         * "sidebar-4" adalah nama widget yang dicipta
         */ 
      ?>
    </div>
</div>
<?php get_footer(); ?>