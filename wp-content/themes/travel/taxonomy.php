<?php
add_action( 'init', 'flights' );
function flights() {
// Раздел вопроса - flightscat
register_taxonomy('flights_cat', array('flights'), array(
'label'                 => 'Полеты', // определяется параметром $labels->name
'labels'                => array(
'name'              => 'Разделы Полетов',
'singular_name'     => 'Раздел Полетов',
'search_items'      => 'Искать Раздел вопроса',
'all_items'         => 'Все Разделы вопросов',
'parent_item'       => 'Родит. раздел вопроса',
'parent_item_colon' => 'Родит. раздел вопроса:',
'edit_item'         => 'Ред. Раздел вопроса',
'update_item'       => 'Обновить Раздел вопроса',
'add_new_item'      => 'Добавить Раздел вопроса',
'new_item_name'     => 'Новый Раздел вопроса',
'menu_name'         => 'Раздел Полеты',
),
'description'           => 'Рубрики для раздела вопросов', // описание таксономии
'public'                => true,
'show_in_nav_menus'     => false, // равен аргументу public
'show_ui'               => true, // равен аргументу public
'show_tagcloud'         => false, // равен аргументу show_ui
'hierarchical'          => true,
'rewrite'               => array('slug'=>'flights', 'hierarchical'=>false, 'with_front'=>false, 'feed'=>false ),
'show_admin_column'     => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
) );

// тип записи - вопросы - faq
register_post_type('flights', array(
'label'               => 'Вопросы',
'labels'              => array(
'name'          => 'Вопросы',
'singular_name' => 'Вопрос',
'menu_name'     => 'Полеты',
'all_items'     => 'Все Полеты',
'add_new'       => 'Добавить Полет',
'add_new_item'  => 'Добавить новый Полет',
'edit'          => 'Редактировать',
'edit_item'     => 'Редактировать вопрос',
'new_item'      => 'Новый вопрос',
),
'description'         => '',
'public'              => true,
'publicly_queryable'  => true,
'show_ui'             => true,
'show_in_rest'        => false,
'rest_base'           => '',
'show_in_menu'        => true,
'exclude_from_search' => false,
'capability_type'     => 'post',
'map_meta_cap'        => true,
'hierarchical'        => true,
'rewrite'             => array( 'slug'=>'flights/%flightscat%', 'with_front'=>false, 'pages'=>false, 'feeds'=>false, 'feed'=>false ),
'has_archive'         => 'flights',
'query_var'           => true,
'supports'            => array( 'title', 'editor' ),
'taxonomies'          => array( 'flights' ),
) );

}

## Отфильтруем ЧПУ произвольного типа
// фильтр: apply_filters( 'post_type_link', $post_link, $post, $leavename, $sample );
add_filter('post_type_link', 'flights_permalink', 1, 2);
function faq_permalink( $permalink, $post ){
// выходим если это не наш тип записи: без холдера %products%
if( strpos($permalink, '%flightscat%') === false )
return $permalink;

// Получаем элементы таксы
$terms = get_the_terms($post, 'flightscat');
// если есть элемент заменим холдер
if( ! is_wp_error($terms) && !empty($terms) && is_object($terms[0]) )
$term_slug = array_pop($terms)->slug;
// элемента нет, а должен быть...
else
$term_slug = 'no-flightscat';

return str_replace('%flightscat%', $term_slug, $permalink );
}



//**************************


add_action('init', 'hotels');
function hotels()
{
// Раздел вопроса - hotels
    register_taxonomy('hotels_cat', array('hotels'), array(
        'label' => 'hotels', // определяется параметром $labels->name
        'labels' => array(
            'name' => 'Разделы hotels',
            'singular_name' => 'Раздел hotels',
            'search_items' => 'Искать Раздел hotels',
            'all_items' => 'Все Разделы hotels',
            'parent_item' => 'Родит. раздел hotels',
            'parent_item_colon' => 'Родит. раздел hotels:',
            'edit_item' => 'Ред. Раздел hotels',
            'update_item' => 'Обновить Раздел hotels',
            'add_new_item' => 'Добавить Раздел hotels',
            'new_item_name' => 'Новый Раздел hotels',
            'menu_name' => 'Раздел hotels',
        ),
        'description' => 'Рубрики для раздела hotels', // описание таксономии
        'public' => true,
        'show_in_nav_menus' => false, // равен аргументу public
        'show_ui' => true, // равен аргументу public
        'show_tagcloud' => false, // равен аргументу show_ui
        'hierarchical' => true,
        'rewrite' => array('slug' => 'hotels', 'hierarchical' => false, 'with_front' => false, 'feed' => false),
        'show_admin_column' => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
    ));

// тип записи - вопросы - faq
    register_post_type('hotels', array(
        'label' => 'hotels',
        'labels' => array(
            'name' => 'hotels',
            'singular_name' => 'hotels',
            'menu_name' => 'hotels',
            'all_items' => 'Все hotels',
            'add_new' => 'Добавить hotels',
            'add_new_item' => 'Добавить новый hotels',
            'edit' => 'Редактировать hotels',
            'edit_item' => 'Редактировать hotels',
            'new_item' => 'Новый hotels',
        ),
        'description' => '',
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_rest' => false,
        'rest_base' => '',
        'show_in_menu' => true,
        'exclude_from_search' => false,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'hotels/%hotelscat%', 'with_front' => false, 'pages' => false, 'feeds' => false, 'feed' => false),
        'has_archive' => 'hotels',
        'query_var' => true,
        'supports' => array('title', 'editor'),
        'taxonomies' => array('hotels'),
    ));

}

## Отфильтруем ЧПУ произвольного типа
// фильтр: apply_filters( 'post_type_link', $post_link, $post, $leavename, $sample );
add_filter('post_type_link', 'hotels_permalink', 1, 2);
function faq_permalinkhotels($permalink, $post)
{
// выходим если это не наш тип записи: без холдера %products%
    if (strpos($permalink, '%hotelscat%') === false)
        return $permalink;

// Получаем элементы таксы
    $terms = get_the_terms($post, 'flightscat');
// если есть элемент заменим холдер
    if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0]))
        $term_slug = array_pop($terms)->slug;
// элемента нет, а должен быть...
    else
        $term_slug = 'no-flightscat';

    return str_replace('%flightscat%', $term_slug, $permalink);
}



//**************************

