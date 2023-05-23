<div class="container py-4 py-lg-5">
    <div class="row">
        <div class="col">
            <h2 class="pb-3 pb-lg-5 text-uppercase text-center">Aktuelle Messen und Seminare</h2>
            <div class="p-5 bg-dark rounded shadow">
                <div>
                    <a href="/messen/" class="me-3"><button class="btn btn-w-100 btn-outline-light text-uppercase mb-3 mb-lg-0" type="button">Alle Messen ansehen</button></a>
                    <a href="/seminare/"><button class="btn btn-w-100 btn-outline-secondary text-uppercase" type="button">Alle Seminare ansehen</button></a>
                </div>
                
                <hr class="text-light my-5">
                <?php
                    $args = array(
                        'post_type' => array( 'messe', 'seminar' ),
                        'posts_per_page' => -1,
                        'meta_key' => 'datum_start',
                        'orderby' => 'meta_value',
                        'order' => 'ASC',
                    );
                    $query = new WP_Query( $args );
                    if ( $query->have_posts() ) {
                        while ( $query->have_posts() ) {
                            $query->the_post();
                            $date_range = get_field('datum');
                            ?>
                             <div class="p-4 bg-primary rounded text-light shadow<?php if( $query->current_post === $query->post_count - 1 ):?><?php else: ?> mb-5 mb-lg-3<?php endif;?>">
                                <div class="row">
                                    <div class="col-12 col-lg-5 d-flex align-items-center mb-3 mb-lg-0">
                                        <a class="text-white" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </div>
                                    <div class="col-12 col-lg-4 d-flex align-items-center mb-3 mb-lg-0">
                                        <?php
                                            if ( $date_range ) {
                                                $start = date_i18n( get_option( 'date_format' ), strtotime( $date_range['start'] ) );
                                                $end = date_i18n( get_option( 'date_format' ), strtotime( $date_range['end'] ) );
                                                echo $start . ' - ' . $end;
                                            } else {
                                                echo 'Datum nicht verfügbar';
                                            }
                                        ?>
                                    </div>
                                    <div class="col-12 col-lg-3 d-flex justify-content-lg-end">
                                        <a href="<?php the_permalink(); ?>"><button class="btn btn-link text-uppercase text-secondary" type="button">Mehr Informationen</button></a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        // Keine Beiträge gefunden
                    }
                    wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</div>
