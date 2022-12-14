<?php

// ajax поиск по сайту
add_action("wp_ajax_nopriv_ajax_search", "ajax_search");
add_action("wp_ajax_ajax_search", "ajax_search");

function ajax_search()
{
   $args = array(
      "post_type"      => "any", // Тип записи: post, page, кастомный тип записи
      "post_status"    => "publish",
      "order"          => "DESC",
      "orderby"        => "date",
      "s"              => $_POST["term"],
      "posts_per_page" => -1,
      // 'tax_query' => array(
      //    'relation' => 'OR',
      //    array(
      //       'taxonomy' => 'post_tag',
      //       'field'    => 'name',
      //    ),
      // ),

   );

   $query = new WP_Query($args);
   // print_r($query);

   if ($query->have_posts()) {

      while ($query->have_posts()) : $query->the_post();
?>
         <li class="ajax-search__item">
            <a href="<?php the_permalink(); ?>" class="ajax-search__link"><?php the_title(); ?></a>
            <div class="ajax-search__excerpt"><?php echo mb_strimwidth(get_post_meta(get_the_ID(), 'record_description', true), 0, 150, '...'); ?></div>
         </li>
<?php
      endwhile;
   } else {
      echo '<li class="ajax-search__item">Ничего не найдено</li>';
   }
   exit;
}




?>