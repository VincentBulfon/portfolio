</main>
<footer class="footer">
    <?php $postType = get_post_type();?>
    <?php if ($postType === 'project'): $id = 58; ?>
    <p class="footer__intro">
        <?= get_field('pf_footerIntro', $id)  ?>
    </p>
    <?php if (get_field('pf_display_link', $id)) : ?>
    <a href="<?= get_field('pf_footerLink', $id) ?>"
       class="footer__link link link__underscore">Contactez-moi !
    </a>
    <?php endif; ?>
    <?php else:  ?>
    <p class="footer__intro">
        <?= get_field('pf_footerIntro')  ?>
    </p>
    <?php if (get_field('pf_display_link')) : ?>
    <a href="<?= get_field('pf_footerLink') ?>"
       class="footer__link link link__underscore">Contactez-moi !
    </a>
    <?php endif; ?>
    <?php endif;  ?>
    <div class="footer__actions">
        <nav class="secondary__nav">
            <h2 class="sro">Navigation secondaire</h2>
            <ul class="secondary__list">
                <?php foreach (pf_get_menu('main', 'secondary__link') as $i => $link): ?>
                <li class="secondary__item">
                    <a href="<?= $link->url; ?>"
                       <?php if ($link->target):?>target="<?= $link->target; ?>"<?php endif; ?>
                        <?php if ($link->current):?>aria-current="page"<?php endif; ?>
                        class="link secondary__link <?= implode(' ', $link->classes);?>"><?= $link->label; ?></a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <div class="footer__socials">
            <?php foreach (pf_get_menuAndHost('social')
 as $link): ?>
            <a href="<?= $link->url ?>"
               class="footer__socials__link link"><span class="sro"><?= $link->label ?></span>
                <span
                      class="<?="icon-".$link->class."__logo" ?>"></span>
            </a>
            <?php endforeach; ?>

        </div>
    </div>
</footer>
</body>

</html>