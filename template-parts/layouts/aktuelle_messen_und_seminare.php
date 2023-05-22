<div class="container py-5">
    <div class="row">
        <div class="col">
            <h2 class="pb-5 text-uppercase text-center">Aktuelle Messen und Seminare</h2>
            <div class="p-5 bg-dark rounded shadow">
                <a href="/messen/" class="me-3"><button class="btn btn-outline-light text-uppercase" type="button">Alle Messen ansehen</button></a>
                <a href="/seminare/"><button class="btn btn-outline-secondary text-uppercase" type="button">Alle Seminare ansehen</button></a>
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
                             <div class="p-3 bg-primary rounded text-light shadow<?php if( $query->current_post === $query->post_count - 1 ):?><?php else: ?> mb-3<?php endif;?>">
                                <div class="row">
                                    <div class="col-5 d-flex align-items-center">
                                        <a class="text-white" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </div>
                                    <div class="col-4 d-flex align-items-center">
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
                                    <div class="col-3">
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
