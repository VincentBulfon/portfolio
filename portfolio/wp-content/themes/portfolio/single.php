<?php

/**
 * Template Name: Project
 */
get_header();
?>



<header class="header header--project">
  <div class="hero__wrapper hero__wrapper--project">
    <div class="container">
      <div class="card__header card__header--project">
        <div class="card__head">

          <h1 class="card__title"
              role="heading"
              aria-level="1"><?= the_title(); ?>
          </h1>
          <span class="sro">Projet numéro</span><span class="card__number card__number--main"><?= pf_number_formatting(get_post_meta($post->ID, 'pf_number')[0]) ?>
            <!-- put display none on this span if desktop view #TODO-->
            <span aria-hidden="true"
                  tabindex="-1"
                  class="card__number card__number--project  card__number--positioned card__number--mobile"> <?= pf_number_formatting(get_post_meta($post->ID, 'pf_number')[0]) ?></span></span>

        </div>
        <figure class="card__figure card__figure--heading">
          <!-- hide element from vocal navigation and keyboard nav -->
          <div aria-hidden="true"
               tabindex="-1"
               class="card__head card__head--over">
            <span tabindex="-1"
                  class="card__title"><?= the_title(); ?></span>
            <span tabindex="-1"
                  class="sro">Projet numéro</span><span tabindex="-1"
                  class="card__number card__number--main card__number--desktop"> <?= pf_number_formatting(get_post_meta($post->ID, 'pf_number')[0]) ?>
              <!-- put display none on this span if mobile view #TODO-->
              <span tabindex="-1"
                    class="card__number card__number--positioned"><?= pf_number_formatting(get_post_meta($post->ID, 'pf_number')[0]) ?></span>
            </span> </div>
          <?php $img = pf_get_image_data("pf_illuImage", 'medium_large');?>
          <img srcset="<?=$img->srcset?>"
               src="<?= $img->src ?>"
               alt="<?=$img->alt?>"
               class="card__image card__image--project"
               width="<?= $img->width ?>"
               height="<?= $img->height ?>" />
        </figure>
      </div>
    </div>
  </div>
  <div class="header__wrapper">
    <div class="header__container"
         itemscope
         itemtype="https://schema.org/Person">
      <a href="<?= home_url();?>"
         class="main__link link">
        <span itemprop="name">Vincent Bulfon</span>
      </a>
      <div>
        <input type="checkbox"
               id="menu" />
        <label for="menu"
               class="menu__label">
          <span class="sro menu__icon">Afficher la navigation</span>
        </label>
        <nav class="nav" role="navigation">
          <h2 class="sro"
              role="heading"
              aria-level="2">Navigation principale</h2>
          <ul class="nav__list"
              >
            <?php foreach (pf_get_menu('main', 'nav__link') as $i => $link): ?>
            <li class="nav__item">
              <a href="<?= $link->url; ?>"
                 <?php if ($link->target):?>target="<?= $link->target; ?>"<?php endif; ?>
                <?php if ($link->current):?>aria-current="page"<?php endif; ?>
                class=" nav__link link__underscore link <?= implode(' ', $link->classes);?>"><?= $link->label; ?></a>
            </li>
            <?php endforeach; ?>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</header>
<main itemscope
      itemtype="https://schema.org/CreativeWork">
  <section class="about">
    <div class="container about__container">
      <h2 class="about__title"
          role="heading"
          aria-level="2">
        Mettons le projet <span class="sro"
              itemprop="name"><?= the_title();?></span> dans
        son contexte
      </h2>
      <figure class="about__figure">

        <?php $img = pf_get_image_data("pf_projectImage", 'medium_large');?>
        <img srcset="<?=$img->srcset?>"
             src="<?= $img->src ?>"
             alt="<?=$img->alt?>"
             class="card__image card__image--project"
             width="<?= $img->width ?>"
             height="<?= $img->height ?>" />
      </figure>
      <div class="about__wrap">
        <p class="about__content"
           itemprop="description">
          <?= get_field('pf_projectContext') ?>
        </p>
        <div class="about__links">
          <?php if (have_rows('pf_project_links')): while (have_rows('pf_project_links')): the_row()  ?>
          <a href="<?= get_sub_field('pf_link_url'); ?>"
             class="about__link link__underscore link"><?= get_sub_field('pf_link_name'); ?>
            <span class="sro">
              <?= the_title() ?>
            </span>
          </a>
          <?php endwhile; endif; ?>
        </div>
      </div>
    </div>
  </section>
  <section class="guide">
    <div class="guide__contain">
      <h2 class="guide__title"
          role="heading"
          aria-level="2">Guide de style</h2>
      <div class="guide__font">
        <h3 class="guide__subtitle"
            role="heading"
            aria-level="3">Typo utilisées</h3>
        <!-- repeat these two lines for all font type in wp-->
        <!--to do create a class with the name of the font used and import in style.php for creating a wp css file generated on the go with wp-->
        <?php if (have_rows('pf_fonts')) : ?>
        <?php while (have_rows('pf_fonts')) : the_row(); ?>
        <div class="guide__container">
          <span class="guide__fonttitle <?=pf_createClassName(get_sub_field('pf_font_name'), false) ?>
          "><?= get_sub_field('pf_font_name'); ?></span>
          <p
             class="guide__fontexemple <?=pf_createClassName(get_sub_field('pf_font_name'), false) ?>">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Inventore quos quod commodi, quam et voluptas tempora quo
            repellendus velit officia veniam eius aperiam dolor!
          </p>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
      </div>
      <div class="guide__colors">
        <h3 class="guide__subtitle guide__subtitle--offset"
            role="heading"
            aria-level="3">
          Couleurs utilisées
        </h3>
        <?php if (have_rows('pf_projectColors')) : ?>
        <?php while (have_rows('pf_projectColors')) : the_row(); ?>
        <span
              class="color <?=pf_createClassName(get_sub_field('pf_color'), false) ?>"><?= get_sub_field('pf_color') ?></span>
        <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <?php get_footer();
