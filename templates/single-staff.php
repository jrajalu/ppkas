<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Fifteen
 * @version 1.0
 * @author Jamaludin Rajalu
 */
get_header(); ?>
<div class="wrap column">
  <article class="article col-8-12">
    <?php while ( have_posts() ) : the_post(); ?>
     <h2><?php the_title(); ?></h2>
    <div class="column">
      <div class="sm-col-3-12">
          <div class="staff-photo pad-right">
            <?php
              $staff_photo = get_post_meta(get_the_ID(),'ppkas_staff_photo',true);
              if ( $staff_photo ) { ?>
              <img src="<?php echo get_post_meta(get_the_ID(),'ppkas_staff_photo',true); ?>" alt="">
              <?php }

              else { ?>
              <img src="<?php echo get_template_directory_uri(); ?>/img/placeholder_staff.svg">
              <?php }
            ?>
          </div>
      </div>

      <div class="sm-col-9-12">
        <div class="staff-detail pad-left">
          <ul>
            <li><?php echo get_the_term_list( get_the_ID(), 'position', '', ', ', '' ); ?></li>
            <li><i class="uk-icon-phone-square"></i> <?php echo get_post_meta(get_the_ID(), 'ppkas_staff_phone', true); ?></li>
            <li><i class="uk-icon-envelope-square"></i> <?php echo get_post_meta(get_the_ID(), 'ppkas_staff_email', true); ?></li>
          </ul>
        </div>
      </div>
    </div>
    <?php
      $cvLink       = get_post_meta(get_the_ID(),'ppkas_staff_cv_link',true);
      $cvDetails    = get_post_meta(get_the_ID(),'ppkas_staff_cv_details',true);
      $cvQualify    = get_post_meta(get_the_ID(),'ppkas_staff_cv_academic_qualifications',true);
      $cvProMember  = get_post_meta(get_the_ID(),'ppkas_staff_cv_current_professional_membership',true);
      $cvTeachAdmin = get_post_meta(get_the_ID(),'ppkas_staff_cv_current_teaching_and_administrative_responsibilities',true);
      $cvPrevEmp    = get_post_meta(get_the_ID(),'ppkas_staff_cv_previous_employment',true);
      $cvConfTrain  = get_post_meta(get_the_ID(),'ppkas_staff_cv_conferences_and_training',true);
      $cvResPub     = get_post_meta(get_the_ID(),'ppkas_staff_cv_research_and_publications',true);
      $cvConsult    = get_post_meta(get_the_ID(),'ppkas_staff_cv_consultancy',true);
      $cvComm       = get_post_meta(get_the_ID(),'ppkas_staff_cv_community_service',true);
      $cvRelInfo    = get_post_meta(get_the_ID(),'ppkas_staff_cv_other_relevant_information',true);

      if( $cvDetails == on ) { ?>
        <!-- academic_qualifications -->
        <div class="column pad-top">
          <div class="col-3-12 pad-right">
            Academic Qualifications:
          </div>
          <div class="col-9-12">
            <?php echo $cvQualify; ?>
          </div>
        </div>
        <!-- current_professional_membership -->
        <div class="column pad-top">
          <div class="col-3-12 pad-right">
            Current Professional Membership:
          </div>
          <div class="col-9-12">
            <?php echo $cvProMember; ?>
          </div>
        </div>
        <!-- current_teaching_and_administrative_responsibilities -->
        <div class="column pad-top">
          <div class="col-3-12 pad-right">
            Current Teaching and Administrative Responsibilities:
          </div>
          <div class="col-9-12">
            <?php echo $cvTeachAdmin; ?>
          </div>
        </div>
        <!-- previous_employment -->
        <div class="column pad-top">
          <div class="col-3-12 pad-right">
            Previous Employment:
          </div>
          <div class="col-9-12">
            <?php echo $cvPrevEmp; ?>
          </div>
        </div>
        <!-- conferences_and_training -->
        <div class="column pad-top">
          <div class="col-3-12 pad-right">
            Conferences and Training:
          </div>
          <div class="col-9-12">
            <?php echo $cvConfTrain; ?>
          </div>
        </div>
        <!-- research_and_publications -->
        <div class="column pad-top">
          <div class="col-3-12 pad-right">
            Research and Publications:
          </div>
          <div class="col-9-12">
            <?php echo $cvResPub; ?>
          </div>
        </div>
        <!-- consultancy -->
        <div class="column pad-top">
          <div class="col-3-12 pad-right">
            Research and Publications:
          </div>
          <div class="col-9-12">
            <?php echo $cvConsult; ?>
          </div>
        </div>
        <!-- community_service -->
        <div class="column pad-top">
          <div class="col-3-12 pad-right">
            Community Service:
          </div>
          <div class="col-9-12">
            <?php echo $cvComm; ?>
          </div>
        </div>
        <!-- other_relevant_information -->
        <div class="column pad-top">
          <div class="col-3-12 pad-right">
            Other Relevant Information:
          </div>
          <div class="col-9-12">
            <?php echo $cvRelInfo; ?>
          </div>
        </div>

      <?php }
      else {
        echo '';
      }
    ?>
    <?php get_template_part('templates/content','edit' ); ?>
    <?php endwhile; ?>
  </article>
  <aside class="aside col-4-12">
    <div class="uk-panel uk-panel-box">
      <?php if (dynamic_sidebar( 'sidebar-1' )) : else : ?><?php endif; ?>
    </div>
  </aside>
</div>
<?php get_footer(); ?>
