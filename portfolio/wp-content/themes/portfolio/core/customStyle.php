<?php
/**
 * return a className beginning with "c_"
 *
 * @param string $string classname
 * @param boolean $after true for after class false for not
 * @return $string
 */
function pf_createClassName($string, $after = false)
{
    if (!$after) {
        return strtolower("c_".str_replace(" ", "_", ltrim($string, "#")));
    } elseif ($after) {
        return strtolower("c_".str_replace(" ", "_", ltrim($string, "#"))."::after");
    }
}

function pf_getPostData()
{
    //store upadated post
    $post = get_post();
    //create_custom css file for the post
    $fileName = $post->ID."_style.css";
    $path ='public/css/';
    $currentFilePath =rtrim(__DIR__, "core").$path;
    return[ 'post'=>$post, 'fileName'=>$fileName,  'path'=>$path,  'currentFilePath'=>$currentFilePath];
}


function pf_getRepeaterData($repeater, $field)
{
    if (have_rows($repeater)):
        while (have_rows($repeater)): the_row();
    $data[] =  get_sub_field($field);
    endwhile;
    endif;
    return $data;
};

function pf_constructCss($item, $after, $className)
{
    return(".".pf_createClassName($item, $after)."{".$className.": " .$item." ;}");
}


/**
 * create or add data into a file
 *
 * @param array $content content you want to put in the file
 * @param string $path path where you want to put the file
 * @param string $fileName name you want to give to the file
 * @param string $porpertyName css property you want the value for
 * @return void
 */
function pf_createCssFile($content, $path, $fileName, $after, $porpertyName)
{
    if ($content) {
        foreach ($content as $item) {
            file_put_contents($path.$fileName, pf_constructCss($item, $after, $porpertyName) . PHP_EOL, FILE_APPEND);
        }
    }
}



/**
 * create a Css file in "public/css/" from "core/" folder
 *
 * @return file un fichier CSS
 */
function pf_createCustomStyleSheet()
{
    $postData = pf_getPostData();

    /**
     * Return the content from a field inside a repeater as an array
     *
     * @param string repeater repreter name
     * @param string field  field you want to retrive
     * @return string return one or more strings if mutiple fields in repeater
     */
    $data = pf_getRepeaterData('pf_fonts', 'pf_font_name');
    $colors = pf_getRepeaterData('pf_projectColors', 'pf_color');

    if (file_exists($postData['currentFilePath'].$postData['fileName'])) {
        unlink($postData['currentFilePath'].$postData['fileName']);
        pf_createCssFile($data, $postData['currentFilePath'], $postData['fileName'], false, "font-family");
        pf_createCssFile($colors, $postData['currentFilePath'], $postData['fileName'], true, "background-color");
    } else {
        pf_createCssFile($data, $postData['currentFilePath'], $postData['fileName'], false, "font-family");
        pf_createCssFile($colors, $postData['currentFilePath'], $postData['fileName'], true, "background-color");
    }
}


/**
 * supprime a Css file in "public/css/" from "core/" folder
 *
 * @return void
 */
function pf_deleteCustomStyleSheet()
{
    $postData =  pf_getPostData();
    if (file_exists($postData['currentFilePath'].$postData['fileName'])) {
        unlink($postData['currentFilePath'].$postData['fileName']);
    }
    return;
}
