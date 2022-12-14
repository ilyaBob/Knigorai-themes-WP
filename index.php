<?php get_header(); ?>
<!-- Template Name: Главная страница -->
<div class="container">
   <div class="main-content">

      <?php get_sidebar() ?>

      <main class="main">
         <div class="container">
            <section class="main__content-section">
               <div class="main__filter">
                  <form class="main__filter-form" action="">
                     <select class="main__filter-genre main__filter-st" name="main__filter-genre" id="main__filter-genre">
                        <option value="1">Выберите жанр</option>
                        <option value="2">Фантастика</option>
                        <option value="3">Фэнтези</option>
                        <option value="4">Попаданцы</option>
                     </select>
                     <input class="main__filter-author main__filter-st" type="text" placeholder="Автор">
                     <input class="main__filter-performer main__filter-st" type="text" placeholder="Исполнитель">
                     <input class="main__filter-name-book main__filter-st" type="text" placeholder="Название книги">
                     <input class="main__filter-year-before main__filter-st" type="text" placeholder="Год: от">
                     <input class="main__filter-year-after main__filter-st" type="text" placeholder="Год: до">
                     <button type="submit" class="main__filter-btn-start main__filter-st">Применить</button>
                     <button type="reset" class="main__filter-btn-reset main__filter-st">Сбросить</button>
                  </form>
               </div>
               <div class="main__content">
                  <div class="main__content-top">
                     <h2 class="main__title">Главная</h2>
                     <div class="main__content-filter-panel">
                        <div class="main__content-grid main__content-grid--list"><svg width="27px" fill='#fff' height="27px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M1 4h2v2H1V4zm4 0h14v2H5V4zM1 9h2v2H1V9zm4 0h14v2H5V9zm-4 5h2v2H1v-2zm4 0h14v2H5v-2z"/></svg></div>
                        <div class="main__content-grid main__content-grid--grid"><svg width="24px" fill='#fff' height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M4 4h4v4H4zm6 0h4v4h-4zm6 0h4v4h-4zM4 10h4v4H4zm6 0h4v4h-4zm6 0h4v4h-4zM4 16h4v4H4zm6 0h4v4h-4zm6 0h4v4h-4z"/></svg></div>
                        <!-- <button class="main__content-btn-filter btn-hov">Фильтр</button> -->
                     </div>
                  </div>
                  <div class="main__content-body">
                     <?php
                     $current = absint(
                        max(1, get_query_var('page'))
                     );
                     $posts_per_page = 20;
                     $query          = new WP_Query(
                        [
                           'post_type'      => 'post',
                           'posts_per_page' => $posts_per_page,
                           'paged'          => $current,
                        ]
                     );
                     if ($query->have_posts()) {
                        while ($query->have_posts()) {
                           $query->the_post();
                     ?>
                           <a href='<?php the_permalink(); ?>' class="main__item">
                              <div class="main__item-box-image">
                                 <img class="main__item-image" src="<?php the_post_thumbnail_url(); ?>" alt="vladimir-aleksandrovich-suhinin-pervye-spolohi-voyny">
                                 <div class="main__item-overlay"><?xml version="1.0" standalone="no"?>
<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 20010904//EN"
 "http://www.w3.org/TR/2001/REC-SVG-20010904/DTD/svg10.dtd">
<svg version="1.0" xmlns="http://www.w3.org/2000/svg"
 width="50px" height="50px" viewBox="0 0 1280.000000 998.000000"
 preserveAspectRatio="xMidYMid meet">
<metadata>
Created by potrace 1.15, written by Peter Selinger 2001-2017
</metadata>
<g transform="translate(0.000000,998.000000) scale(0.100000,-0.100000)"
fill="#fff" stroke="none">
<path d="M6290 9974 c-25 -2 -106 -8 -180 -14 -577 -47 -1158 -204 -1635 -442
-548 -274 -1048 -697 -1447 -1225 -289 -381 -554 -863 -790 -1435 l-43 -103
-3 -331 -4 -331 -41 -13 c-113 -36 -331 -126 -454 -189 -1329 -678 -1982
-2185 -1568 -3620 144 -502 419 -957 807 -1337 276 -271 571 -471 918 -622
253 -111 576 -204 701 -203 154 1 270 81 334 229 20 47 20 72 25 3172 l5 3125
43 100 c135 311 343 700 501 935 509 755 1154 1229 1985 1455 342 93 840 153
1110 134 1310 -94 2215 -617 2855 -1649 151 -242 266 -469 418 -825 l56 -130
6 -3135 c7 -3074 7 -3136 26 -3183 42 -104 137 -191 238 -218 67 -18 160 -12
288 20 807 199 1497 709 1923 1422 377 629 514 1367 390 2099 -145 859 -660
1627 -1404 2094 -197 125 -520 274 -702 327 l-48 13 0 311 c0 174 -5 336 -10
368 -11 57 -114 316 -210 527 -403 886 -928 1540 -1586 1978 -494 329 -1114
556 -1764 647 -278 38 -606 60 -740 49z"/>
<path d="M6258 6481 c-52 -17 -98 -53 -124 -97 -27 -46 -21 -11 -149 -829 -19
-121 -52 -335 -74 -475 -22 -140 -61 -385 -86 -545 -25 -159 -45 -294 -46
-300 -2 -16 -10 30 -123 665 -59 327 -112 612 -119 634 -16 57 -81 121 -137
136 -60 16 -130 7 -179 -24 -82 -52 -76 -27 -230 -947 -78 -460 -141 -840
-141 -844 0 -5 -10 1 -22 12 -53 48 -141 73 -190 54 -16 -6 -28 -7 -28 -3 0 4
-11 174 -25 377 -13 204 -45 687 -70 1075 -45 690 -46 706 -71 758 -78 162
-314 151 -383 -17 l-13 -31 -50 45 c-103 93 -255 116 -380 58 -79 -37 -137
-94 -175 -171 l-28 -57 0 -2845 0 -2845 26 -56 c37 -79 90 -133 167 -171 60
-30 75 -33 152 -33 71 1 95 5 146 29 115 52 197 166 210 293 l7 61 48 5 c99
12 128 40 255 244 l99 158 12 -80 c6 -44 12 -85 12 -91 1 -6 15 -31 32 -57 76
-115 246 -122 336 -13 15 19 84 167 152 328 69 161 128 297 133 303 4 5 8 -97
8 -226 0 -184 3 -245 15 -280 36 -105 138 -161 248 -137 91 19 108 43 310 439
100 197 185 359 190 359 4 0 7 -15 7 -32 0 -93 112 -1093 126 -1126 56 -135
225 -174 333 -77 21 19 45 51 54 72 14 32 74 245 259 923 11 41 22 76 23 78 2
2 35 -78 74 -178 82 -208 99 -244 137 -284 82 -87 247 -72 316 29 16 23 46 99
69 175 23 74 44 138 48 142 4 4 24 -92 45 -215 47 -277 55 -305 110 -355 86
-80 209 -77 288 6 20 20 41 48 48 61 7 13 32 178 56 366 l43 343 122 156 c68
86 126 156 129 156 3 0 45 -127 94 -283 109 -343 120 -374 154 -411 30 -32 96
-65 129 -66 l22 0 3 -277 c3 -277 3 -278 30 -335 130 -279 518 -271 652 12
l21 45 0 2840 0 2840 -27 57 c-131 280 -509 285 -646 8 l-27 -55 -5 -950 c-3
-522 -6 -943 -8 -935 -1 8 -38 250 -81 537 -44 290 -86 534 -95 550 -23 45
-90 101 -138 113 -92 25 -198 -22 -242 -108 -8 -15 -76 -268 -151 -562 -75
-294 -139 -542 -142 -550 -5 -12 -7 -11 -10 5 -64 295 -150 642 -168 680 -39
82 -108 120 -204 113 -69 -5 -130 -39 -161 -91 -11 -18 -63 -165 -116 -327
-53 -162 -99 -298 -103 -302 -4 -4 -19 65 -34 155 -34 205 -40 223 -79 271
-60 73 -171 98 -253 56 -22 -11 -40 -20 -41 -20 -3 0 -11 121 -69 1090 -19
322 -37 604 -40 626 -8 56 -55 125 -104 152 -45 25 -122 36 -163 23z"/>
</g>
</svg>
</div>
                              </div>
                              <div class="main__item-box-info">
                                 <h3 class="main__item-title"><?php the_title(); ?></h3>
                                 <p size="10" class="main__item-desc"><?php echo get_post_meta(get_the_ID(), 'record_description', true) ?></p>
                              </div>
                           </a>
                     <?php
                        }
                        wp_reset_postdata();
                     } else {
                        global $wp_query;
                        $wp_query->set_404();
                        status_header(404);
                        nocache_headers();
                        require get_404_template();
                     }
                     ?>
                  </div>
               </div>
               <div class="main__pagination">
                  <div class="container">
                     <div class="main__pagination-number-page">
                        <?php
                        //  ================= Пагинация =================== 
                        $res = paginate_links(
                           [
                              'total'              => $query->max_num_pages,
                              'current'            => $current,
                              'prev_next' => false,
                              'screen_reader_text' => __('Posts navigation'),
                              'class'              => 'pagination123123', // CSS класс, добавлено в 5.5.0.
                              'end_size'           => 1,
                              'mid_size'           => 2,
                              'type'               => 'array',
                              'before_page_number' => '<span class="main__pagination-item-num">',
                              'after_page_number' => '</span>',
                           ]
                        );
                        if ($res) {
                           foreach ($res as $item) {
                              // var_dump($item);
                              echo '<span class="main__pagination-item-num">' . $item . '</span>';
                           }
                        } ?>
                     </div>
                  </div>
               </div>
            </section>
         </div>
      </main>
   </div>
</div>
<!-- End Main -->
<?php get_footer(); ?>