<?php

function pf_addNumber()
{
    //access to the global wp object which allow to communicate with the DB
    global $wpdb;
    // create a quesry to retive our posts
    $query = "SELECT $wpdb->posts.* FROM $wpdb->posts WHERE $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type = 'project' ";
    // use wpdp->get_restults() it allows us to retrive data from database with mySQL request

    $posts = $wpdb->get_results($query, OBJECT);
  
    //loop for adding the number

    $number = 0;

    if ($posts) {
        foreach ($posts as $post) {
            $number ++;
            //add meta to post only if it doesn't exist already, if it already exits it does nothing
            add_post_meta($post->ID, 'pf_number', $number, true);
            //update the post meta if it exist or not
            update_post_meta($post->ID, 'pf_number', $number);
        }
    }
}
