<?php

/**
* Is this page is Partner list?
*
* @author Robert Kuznetsou
* @return bool if true is the page is partner list
*/
function isPartnerPage() {
return ('our-partners' == get_post()->post_name) ? true : false;
}

/**
 * Render all partners
 *
 * @author Robert Kuznetsou
*/
function renderPartners() {
echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">';

$partners = get_posts([
'post_type' => 'partners',
]);

echo '<div class="row">';

    foreach($partners as $partner) {
        $image = '...';
        if (has_post_thumbnail($partner->ID)) {
        $image = wp_get_attachment_image_src(get_post_thumbnail_id($partner->ID), 'single-post-thumbnail');
        $image = $image[0] ?? '...';
        }
        echo <<<LIST
        <div class="card col-sm-4 m-1">
            <img src="$image" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">
                    $partner->post_title
                </h5>
                <p class="card-text">
                    $partner->post_content
                </p>

                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
LIST;
    }

    echo '</div>';

}
