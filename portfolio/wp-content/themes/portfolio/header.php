<!DOCTYPE html>
<html lang="fr">

<head>
      <meta charset="UTF-8" />
      <?php $postType = get_post_type();?>
    <?php if ($postType === 'project'): $id = 58; ?>
            <!-- seo/og meta-->
      <meta name="description"
            content="<?= get_field("meta_description", $id) ?>" />
      <meta name="keywords"
            content="<?= get_field("meta_keywords", $id) ?>" />
      <meta name="author"
            content="Vincent Bulfon" />
      <?php $img = pf_get_image_data('meta_image', 'medium_large');?>
      <meta property="og:image"
            content="<?= $img->src ?>" />
      <meta property="twitter:image"
            content="<?= $img->src ?>" />
      <meta property="og:description"
            content="<?= get_field("meta_description", $id) ?>" />
      <meta property="twitter:description"
            content="<?= get_field("meta_description", $id) ?>" />
      <meta property="og:title"
            content="Vincent Bulfon | <?= get_the_title() ?>" />
      <meta name="twitter:title"
            content="Vincent Bulfon | <?= get_the_title() ?>" />
      <meta name="viewport"
            content="width=device-width, initial-scale=1.0" />
      <!-- end seo/og meta -->
    <?php else:  ?>
      <!-- seo/og meta-->
      <meta name="description"
            content="<?= get_field("meta_description", $id) ?>" />
      <meta name="keywords"
            content="<?= get_field("meta_keywords", $id) ?>" />
            <meta name="author"
            content="Vincent Bulfon" />
      <?php $img = pf_get_image_data('meta_image', 'medium_large');?>
      <meta property="og:image"
            content="<?= $img->src ?>" />
      <meta property="twitter:image"
            content="<?= $img->src ?>" />
      <meta property="og:description"
            content="<?= get_field("meta_description") ?>" />
      <meta property="twitter:description"
            content="<?= get_field("meta_description") ?>" />
      <meta property="og:title"
            content="Vincent Bulfon | <?= get_the_title() ?>" />
      <meta name="twitter:title"
            content="Vincent Bulfon | <?= get_the_title() ?>" />
      <meta name="viewport"
            content="width=device-width, initial-scale=1.0" />
      <!-- end seo/og meta -->
      <?php endif;  ?>
      <!-- beginning of import styles fonts and scripts-->
      <link rel="stylesheet"
            href="<?= pf_get_template_assets("public/css/style.css") ?>" />
      <link rel="stylesheet"
            href="https://use.typekit.net/ytn0anm.css"/>
      <script src="<?= pf_get_template_assets("/public/js/script.js") ?>"
              defer>
                    
              </script>
      <?php if ('project' == get_post_type($post->ID)) {
    if (have_rows('pf_fonts')):
    while (have_rows('pf_fonts')):the_row(); ?>
      <?="<link rel=\"stylesheet\" href=\"" .get_sub_field('pf_font_link')."\">" ?>

      <?="<link rel=\"stylesheet\" href=\"".pf_get_template_assets("/public/css/".$post->ID."_style.css\"/>") ?>
      <?php   endwhile;
    endif;
} ?>

      <!--end import-->
      <title>Vincent Bulfon | <?= get_the_title('', false) ?>
      </title>
</head>

<body class="nojs">