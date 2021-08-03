<?php
function pf_sessionStart()
{
    if (session_id()) {
        return;
    }
    session_start();
};

function pf_getData()
{
    //get nonce from request
    $wpNonce = $_POST['pf_nonce'] ? $_POST['pf_nonce'] : null;
    //get action from request
    //$action = $_POST['action'] ? $_POST['action'] : null;

    //check if nonce is not valid if not it stop the function execution with a return
    if (!wp_verify_nonce($wpNonce, 'pf_contact_form')) {
        return;
    }
    $data['name'] = sanitize_text_field($_POST['pf_name']);
    $data['phone'] = sanitize_text_field($_POST['pf_phone']);
    $data['mail'] = sanitize_text_field($_POST['pf_email']);
    $data['message'] = sanitize_textarea_field($_POST['pf_message']);
    $errors = [];
    foreach ($data as $item => $value) {
        if (!strlen($value)) {
            $errors[$item] = 'Veuillez compléter ce champ.';
            $errors['feedback'] = 'Veuillez remplir tous les champs';
        };
    }

    $message = 'Bonjour un nouveau message est arrivé depuis votre portfolio :'. PHP_EOL;
    $message .= 'Nom :' . $data['name'] . PHP_EOL;
    $message .= 'GSM :' . $data['phone'] . PHP_EOL;
    $message .= 'Email :' . $data['mail'] . PHP_EOL;
    $message .= 'Message :' . $data['message'] . PHP_EOL;

    if (!$errors) {
        if (wp_mail('vincent.bulfon@gmail.com', 'Un message depuis votre portfolio', $message)) {
            return  pf_redirect($data, $errors);
        }
        return pf_redirect($data, $errors['feedback']= 'votre message n’as pas pu être envoyé');
    }

    //I can pass the action and concatenate it to te data and errors in the pf_redirect to make $data and $errors specifit to this form if this function was used by multiple forms
    pf_redirect($data, $errors);
};

function pf_feedBack()
{
    $feedback = [];
    if ($_SESSION['data']) {
        $feedback['data'] = $_SESSION['data'];
    }
    if ($_SESSION['errors']) {
        $feedback['errors'] = $_SESSION['errors'];
    }
    if ($_SESSION['feedback']) {
        $feedback['feedback'] = $_SESSION['feedback'];
    }
    session_unset();
    return $feedback;
}

function pf_redirect($data, $errors)
{
    if (!$errors) {
        session_unset();
        $_SESSION['feedback'] = "Votre message à bien été envoyé";
    } else {
        $_SESSION['data'] = $data;
        $_SESSION['errors'] = $errors;
        $_SESSION['feedback'] = $errors['feedback'];
    }

    $url = wp_get_referer()."#contact";
    wp_safe_redirect($url);
    exit;
}


//see /wp-admin/admin_post.php for more info about these events and how to handle them. This file is given the the form action field, because it will execute and create an action when a request is fired.

//these hook will execute function right after request is fired. admin_post_{$action}
add_action('init', 'pf_sessionStart');
add_action('admin_post_pf_form_gestion', 'pf_getData');
add_action('admin_post_nopriv_pf_form_gestion', 'pf_getData');
