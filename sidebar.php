<aside class="aside">
      <div class="aside__janr">
            <div class="aside__title">Жанры</div>

            <?php
            $menu = 'primary';
            $menu_items = wp_get_nav_menu_items($menu); // Получаем элементы меню
            $menu_list = '<ul class="aside__menu">' . "\n";

            $count = 0;
            $countSubDiv  = 0;
            $submenu = false;

            foreach ($menu_items as $menu_item) {
                  $title = $menu_item->title;
                  $link = $menu_item->url;
                  if (!$menu_item->menu_item_parent) {
                        $parent_id = $menu_item->ID;
                        $menu_list .= '<li class="aside__menu-item">' . "\n";
                        $menu_list .= '<a href="' . $link . '">' . $title . '</a>' . "\n";
                  }
                  if ($parent_id == $menu_item->menu_item_parent && $parent_id != 0) {
                        if ($countSubDiv < 1) {
                              $menu_list .= '<div class="aside__menu-btn"><span class="aside__minuse"></span></div>' . "\n";
                              $countSubDiv++;
                        }
                        if (!$submenu) {
                              $submenu = true;
                              $menu_list .= '<ul class="aside__submenu">' . "\n";
                        }
                        $menu_list .= '<li class="aside__submenu-item">' . "\n";
                        $menu_list .= '<a href="' . $link . '" class="aside__submenu-item-url">' . $title . '</a>' . "\n";
                        $menu_list .= '</li>' . "\n";
                        if ($menu_items[$count + 1]) {
                              if ($menu_items[$count + 1]->menu_item_parent != $parent_id && $submenu) {
                                    $menu_list .= '</ul>' . "\n";
                                    $submenu = false;
                                    $countSubDiv = 0;
                              }
                        }
                  }
                  $count++;
            }
            $menu_list .= '</ul> ';
            echo  $menu_list;
            ?>
      </div>
      <div class="aside__title">Топ недели</div>
      <ul class="aside__top">


            <?php
            // параметры по умолчанию
            $my_posts = get_posts(array(
                  'numberposts' => 5,
                  'category'    => 0,
                  'orderby'     => 'date',
                  'order'       => 'DESC',
                  'include'     => array(),
                  'exclude'     => array(),
                  'meta_key'    => '',
                  'meta_value'  => '',
                  'post_type'   => 'post',
                  'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                  'tag' => 'top',
            ));

            global $post;

            foreach ($my_posts as $post) {
                  setup_postdata($post);
            ?>
                  <li class="aside__top-item"><a href="<?php the_permalink();?>">
                              <img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>">
                              <div class="aside__top-item-box">
                                    <div class="aside__top-item-title"><?php the_title(); ?></div>
                                    <div class="aside__top-item-genre"><?php
                                                                        foreach (get_the_category() as $category) {
                                                                              echo  $category->name . " / ";
                                                                        }
                                                                        ?></div>
                              </div>
                        </a></li>
            <?php
            }
            wp_reset_postdata(); // сброс
            ?>

      </ul>
</aside>