 <?php get_header();
/**
* Template Name: Accueil
*/
?>

 <header class="header header--landing">
   <div class="hero__wrapper hero__wrapper--landing">
     <svg id="hero__svg"
          data-name="Layer 1"
          xmlns="http://www.w3.org/2000/svg"
          width="225.35"
          height="107.44"
          viewBox="0 0 225.35 107.44">
       <defs>
         <style>
           .a5c57509-6a33-4c2e-b6ca-3549a3d7cfe2 {
             font-size: 47px;
             fill: none;
             stroke: #f2cc85;
             stroke-miterlimit: 10;
             stroke-width: 0.5px;
             font-family: Roboto-Bold, Roboto;
             font-weight: 700;
             letter-spacing: -0.01em;
           }

           .b201cd21-0796-4c98-84f5-a75813c50852 {
             letter-spacing: -0.02em;
           }

           .a9e29917-9577-4711-b359-eb6be2650150 {
             letter-spacing: -0.01em;
           }

           .a17e34df-9d4a-41fa-b3e0-a8afd0bc3adf {
             letter-spacing: -0.03em;
           }

           .ad0e53bd-3ca9-4a6f-8083-a52c0ab3cf03 {
             letter-spacing: -0.01em;
           }
         </style>
       </defs>
       <text class="a5c57509-6a33-4c2e-b6ca-3549a3d7cfe2 path"
             transform="translate(6.48 40.46)">
         D
         <tspan class="b201cd21-0796-4c98-84f5-a75813c50852 path"
                x="29.98"
                y="0">
           ev
         </tspan>
         <tspan class="a9e29917-9577-4711-b359-eb6be2650150 path"
                x="77.41"
                y="0">
           eloper
         </tspan>
         <tspan x="7.09"
                y="54">f</tspan>
         <tspan class="a17e34df-9d4a-41fa-b3e0-a8afd0bc3adf path"
                x="23.37"
                y="54">
           r
         </tspan>
         <tspan class="ad0e53bd-3ca9-4a6f-8083-a52c0ab3cf03 path"
                x="39.13"
                y="54">
           ont-end
         </tspan>
       </text>
     </svg>
     <div class="hero__content">
       <h1
           aria-level="1">
         <span class="hero__title"><?= get_field('pf_headerTitle')?></span>
         <span class="hero__subtitle"><?= get_field('pf_headerFunction')?></span>
       </h1>
     </div>
     <div class="hero__scroll">
       <div class="hero__animation"></div>
       <a href="#projects"
          class="link hero__link">Scroll</a>
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
               aria-level="2">Navigation principale</h2>
           <ul class="nav__list"
               >
             <?php foreach (pf_get_menu('main', 'nav__link') as $i => $link):
             
              ?>
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
 <main>
   <section class="projects">
     <h2 id="projects"
         class="sro"
         aria-level="2"><?= get_field('pf_projectSectionTitle')?>
     </h2>
     <?php
    $query = new WP_Query(['post_type' => 'project', 'order' =>'ASC', 'orderby'=> 'date']);
    if ($query->have_posts()): $allPosts = $query->get_posts();
    foreach ($allPosts as $post):
    ?>
     <section class="card"
              itemscope
              itemtype="https://schema.org/CreativeWork">
       <div class="container">
         <div class="card__header">
           <div class="card__head">
             <h3 class="card__title"
                 aria-level="3"
                 itemprop="name"> <?php the_title() ?>
             </h3>

             <span class="sro">Projet numéro</span><span class="card__number card__number--main">
               <?= pf_number_formatting(get_post_meta($post->ID, 'pf_number')[0]) ?>
               <!-- put display none on this span if desktop view #TODO-->
               <span aria-hidden="true"
                     tabindex="-1"
                     class="card__number card__number--positioned card__number--mobile"><?= pf_number_formatting(get_post_meta($post->ID, 'pf_number')[0]) ?></span>
             </span>
           </div>
           <figure class="card__figure">
             <!-- hide element from vocal navigation and keyboard nav -->
             <div aria-hidden="true"
                  tabindex="-1"
                  class="card__head card__head--over">
               <span tabindex="-1"
                     class="card__title"><?php the_title() ?></span>
               <span tabindex="-1"
                     class="sro">Projet numéro</span>
               <span tabindex="-1"
                     class="card__number card__number--main card__number--desktop"> <?= pf_number_formatting(get_post_meta($post->ID, 'pf_number')[0]) ?>
                 <!-- put display none on this span if mobile view #TODO-->
                 <span tabindex="-1"
                       class="card__number card__number--positioned"> <?= pf_number_formatting(get_post_meta($post->ID, 'pf_number')[0]) ?></span>
               </span>
             </div>
             <?php $img = pf_get_image_data("pf_illuImage", 'medium_large');?>
             <img srcset="<?=$img->srcset?>"
                  src="<?= $img->src ?>"
                  alt="<?=$img->alt?>"
                  class="card__image"
                  width="<?= $img->width ?>"
                  height="<?= $img->height ?>" />
           </figure>
         </div>
         <div class="card__body">
           <p class="card__content"
              itemprop="abstract">
             <?= get_field('pf_shortDescription'); ?>
           </p>
           <a href="<?= the_permalink()?>"
              class="card__link link__underscore link"><?= get_field("pf_link") ?>
             <span class="sro"><?= $post->post_title ?></span></a>
         </div>
       </div>
     </section>
     <?php  endforeach; endif; wp_reset_query()//terminate the old wp qwery for using using another one?>
   </section>
   <?php get_footer();
