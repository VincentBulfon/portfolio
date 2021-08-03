<?php

/**
 * return an image object with parameters
 *
 * @param string $field
 * @return object
 */
function pf_get_image_data($field, $defaultSize)
{
    $data = get_field($field);
    if (!$data) {
        return;
    }

    $item = new stdClass();
    $item->alt = $data['alt'];
    $item->src = $data['sizes'][$defaultSize];
    $item->width = $data['sizes'][$defaultSize .'-width' ];
    $item->height =$data['sizes'][$defaultSize.'-width'];
    $item->srcset = wp_get_attachment_image_srcset($data["ID"]);

    return $item;
};

add_image_size("square_tiny", '388', '388');
add_image_size("square_med", '667', '667');
add_image_size("square_big", '1021', '1021');
add_image_size("square_high", '1220', '1220');
