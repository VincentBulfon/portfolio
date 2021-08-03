<?php get_header();
/**
* Template Name: Contact
*/
?>

<header class="header header--project">
  <h1 class="sro"
      role="heading"
      aria-level="1"><?php pf_get_title('|', false) ?>
  </h1>

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
        <nav class="nav">
          <h2 class="sro"
              role="heading"
              aria-level="1">Navigation principale</h2>
          <ul class="nav__list">
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
<main>

  <section class="me">
    <div class="me__container">
      <h2 class="me__title"
          role="heading"
          aria-level="2">Qui suis-je ?</h2>
      <figure class="me__figure">
        <?php $img = pf_get_image_data('pf_me_image', 'medium_large') ?>
        <img srcset="<?=$img->srcset?>"
             src="<?= $img->src ?>"
             alt="<?=$img->alt?>"
             class="card__image"
             width="<?= $img->width ?>"
             height="<?= $img->height ?>" />
      </figure>
      <div class="me__wrap">
        <p class="me__content">
          <?= get_field('pf_me_about');?>
        </p>
        <div class="me__links">
          <?php if (have_rows('pf_me_links')): while (have_rows('pf_me_links')): the_row(); ?>

          <a href="<?= get_sub_field('pf_me_link_url')?>"
             class="me__link link link__underscore"><?= get_sub_field('pf_me_link_name')?></a>
          <?php endwhile; endif; ?>
        </div>
      </div>
    </div>
  </section>
  <section class="contact"
           id="contact">
    <div class="contact__container">
      <h2 class="contact__title"
          role="heading"
          aria-level="2">Intéressé ?</h2>
      <?php $feedback = pf_feedBack();?>
      <form action="<?= esc_url(admin_url('admin-post.php')); ?>"
            method="POST"
            class="contact__form">
        <label for="name"
               class="form__label"><?= get_field('pf_name_input') ?>&nbsp;:</label>
        <input type="text"
               name="pf_name"
               id="name"
               class=" form__input"
               value=" <?php if ($feedback['data']['name']) {
    echo($feedback['data']['name']);
}?>" />
        <?php if ($feedback['errors']): ?>
        <span class="error"><?= $feedback['errors']['name'] ?></span>
        <?php endif;?>
        <label for="phone"
               class="form__label"><?= get_field('pf_phone_input') ?>&nbsp;:</label>
        <input type="tel"
               id="phone"
               name="pf_phone"
               class=" form__input"
               value=" <?php if ($feedback['data']['phone']) {
    echo($feedback['data']['phone']);
}?>" />
        <?php if ($feedback['errors']): ?>
        <span class="error"><?= $feedback['errors']['phone'] ?></span>
        <?php endif;?>
        <!-- pattern="^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$" -->
        <label for="email"
               class="form__label"><?= get_field('pf_email_input') ?>&nbsp;:</label>
        <input type="email"
               id="email"
               name="pf_email"
               class="form__input"
               value="<?php if ($feedback['data']['mail']) {
    echo($feedback['data']['mail']);
} ?>
" />
        <?php if ($feedback['errors']): ?>
        <span class="error"><?= $feedback['errors']['mail'] ?></span>
        <?php endif;?>
        <label for="message"
               class="form__label"><?= get_field('pf_message_input') ?>&nbsp;:</label>
        <textarea id="message"
                  name="pf_message"
                  class="form__input"
                  rows="10"><?php if ($feedback['data']['message']) {
    echo($feedback['data']['message']);
}?></textarea>
        <?php if ($feedback['errors']): ?>
        <span class="error"><?= $feedback['errors']['message'] ?></span>
        <?php endif;?>
        <input type="hidden"
               name="pf_nonce"
               value="<?= wp_create_nonce('pf_contact_form') ?>">
        <input type="hidden"
               name="action"
               value="pf_form_gestion">
        <button class="form__submit
              link__underscore"
                type="submit">
          <?= get_field('pf_submit_button') ?>
        </button>
        <?php if ($feedback['feedback'] && !$feedback['errors']): ?>
        <span class="feedback"><?= $feedback['feedback'] ?></span>
        <?php elseif ($feedback['errors']):?>
        <span class="feedback feedback--error"><?= $feedback['feedback'] ?></span>
        <?php endif; ?>
      </form>
      <div class="contact__info">
        <dl class="contact__list">
          <dt class="contact__item">Adresse&nbsp;:</dt>
          <dd class="contact__definition">Visé, Liège, Belgique</dd>
          <dt class="contact__item">Email&nbsp;:</dt>
          <dd class="contact__definition">vincent.bulfon@gmail.com</dd>
          <dt class="contact__item">Mobile&nbsp;:</dt>
          <dd class="contact__definition">0483 58 75 16</dd>
        </dl>
      </div>
    </div>
  </section>
</main>
<?php get_footer();
