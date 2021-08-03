<?php
//include other function files
include(__DIR__ . '/core/translations.php');
include(__DIR__ . '/core/utils.php');
include(__DIR__ . '/core/menus.php');
include(__DIR__ . '/core/images.php');
include(__DIR__ . '/core/posts_types.php');
include(__DIR__ . '/core/customStyle.php');
include(__DIR__ . '/core/form.php');
include(__DIR__ . '/core/postCount.php');


//triggers the function
//when post is online
add_action('publish_post', 'pf_addNumber', 11);
//when edited
add_action('edit_post', 'pf_addNumber');
//when deleted
add_action('deleted_post', 'pf_addNumber');


//when post is online
add_action('publish_post', 'pf_createCustomStyleSheet', 12);
//when edited
add_action('save_post', 'pf_createCustomStyleSheet', 15);
//when deleted
add_action('delete_post', 'pf_deleteCustomStyleSheet', 11);
