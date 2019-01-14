<?php
//funkcja zwracająca wartości metaboxów
function sjkp_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}


function sjkp_add_meta_boxes() {
    	add_meta_box(
		'prowadzcy-prowadzcy',
		__( 'prowadzący', 'prowadzcy' ),
		'prowadzcy_html',
		'sjkp_szkolenia',
		'normal',
		'default'
	);
    	add_meta_box(
		'sjkp_subpage_icon-sjkp-subpage-icon',
		__( 'sjkp_subpage-icon', 'sjkp_subpage_icon' ),
		'sjkp_subpage_icon_html',
		'page',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'sjkp_add_meta_boxes' );

function prowadzcy_html( $post) {
	wp_nonce_field( '_prowadzcy_nonce', 'prowadzcy_nonce' ); ?>
            <div class="inside">
                <p>
                    <label for="prowadzcy_imi_i_nazwisko">
                        <?php _e( 'imię i nazwisko', 'prowadzcy' ); ?>
                    </label>
                    <br>
                    <input type="text" name="prowadzcy_imi_i_nazwisko" id="prowadzcy_imi_i_nazwisko" value="<?php echo sjkp_get_meta( 'prowadzcy_imi_i_nazwisko' ); ?>"> </p>
                <p>
                    <label for="prowadzcy_o_prowadzcym">
                        <?php _e( 'o prowadzącym', 'prowadzcy' ); ?>
                    </label>
                    <br>
                    <textarea name="prowadzcy_o_prowadzcym" id="prowadzcy_o_prowadzcym">
                        <?php echo sjkp_get_meta( 'prowadzcy_o_prowadzcym' ); ?>
                    </textarea>
                </p>
            </div>
            <?php
}
function prowadzcy_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['prowadzcy_nonce'] ) || ! wp_verify_nonce( $_POST['prowadzcy_nonce'], '_prowadzcy_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['prowadzcy_imi_i_nazwisko'] ) )
		update_post_meta( $post_id, 'prowadzcy_imi_i_nazwisko', esc_attr( $_POST['prowadzcy_imi_i_nazwisko'] ) );
	if ( isset( $_POST['prowadzcy_o_prowadzcym'] ) )
		update_post_meta( $post_id, 'prowadzcy_o_prowadzcym', esc_attr( $_POST['prowadzcy_o_prowadzcym'] ) );
}

add_action( 'save_post', 'prowadzcy_save' );

function sjkp_subpage_icon_html( $post) {
	wp_nonce_field( '_sjkp_subpage_icon_nonce', 'sjkp_subpage_icon_nonce' ); ?>
                <p>
                    <input type="radio" name="sjkp_subpage_icon_ikona" id="sjkp_subpage_icon_ikona_0" value="0" <?php checked( sjkp_get_meta( 'sjkp_subpage_icon_ikona' ), '0' ); ?>>
                    <label for="sjkp_subpage_icon_ikona_0">brak</label>
                    <br>
                    <input type="radio" name="sjkp_subpage_icon_ikona" id="sjkp_subpage_icon_ikona_1" value="1" <?php checked( sjkp_get_meta( 'sjkp_subpage_icon_ikona' ), '1' ); ?>>
                    <label for="sjkp_subpage_icon_ikona_1">szkoła jogi - początkujący</label>
                    <br>
                    <input type="radio" name="sjkp_subpage_icon_ikona" id="sjkp_subpage_icon_ikona_2" value="2" <?php checked( sjkp_get_meta( 'sjkp_subpage_icon_ikona' ), '2' ); ?>>
                    <label for="sjkp_subpage_icon_ikona_2">szkoła jogi - średniozaawansowani</label>
                    <br>
                    <input type="radio" name="sjkp_subpage_icon_ikona" id="sjkp_subpage_icon_ikona_3" value="3" <?php checked( sjkp_get_meta( 'sjkp_subpage_icon_ikona' ), '3' ); ?>>
                    <label for="sjkp_subpage_icon_ikona_3">cennik</label>
                    <br>
                    <input type="radio" name="sjkp_subpage_icon_ikona" id="sjkp_subpage_icon_ikona_4" value="4" <?php checked( sjkp_get_meta( 'sjkp_subpage_icon_ikona' ), '4' ); ?>>
                    <label for="sjkp_subpage_icon_ikona_4">kontakt</label>
                    <br>
                    <input type="radio" name="sjkp_subpage_icon_ikona" id="sjkp_subpage_icon_ikona_5" value="5" <?php checked( sjkp_get_meta( 'sjkp_subpage_icon_ikona' ), '5' ); ?>>
                    <label for="sjkp_subpage_icon_ikona_5">joga ciążowa</label>
                    <br>
                    <input type="radio" name="sjkp_subpage_icon_ikona" id="sjkp_subpage_icon_ikona_6" value="6" <?php checked( sjkp_get_meta( 'sjkp_subpage_icon_ikona' ), '6' ); ?>>
                    <label for="sjkp_subpage_icon_ikona_6">logo</label>
                    <br>
                    <input type="radio" name="sjkp_subpage_icon_ikona" id="sjkp_subpage_icon_ikona_7" value="7" <?php checked( sjkp_get_meta( 'sjkp_subpage_icon_ikona' ), '7' ); ?>>
                    <label for="sjkp_subpage_icon_ikona_7">harmonogram</label>
                    <br>
                    <input type="radio" name="sjkp_subpage_icon_ikona" id="sjkp_subpage_icon_ikona_8" value="8" <?php checked( sjkp_get_meta( 'sjkp_subpage_icon_ikona' ), '8' ); ?>>
                    <label for="sjkp_subpage_icon_ikona_8">terapia</label>
                    <br>
										<br>
                    <input type="radio" name="sjkp_subpage_icon_ikona" id="sjkp_subpage_icon_ikona_9" value="9" <?php checked( sjkp_get_meta( 'sjkp_subpage_icon_ikona' ), '9' ); ?>>
                    <label for="sjkp_subpage_icon_ikona_9">newsletter</label>
                    <br>
								</p>
                <?php
}

function sjkp_subpage_icon_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['sjkp_subpage_icon_nonce'] ) || ! wp_verify_nonce( $_POST['sjkp_subpage_icon_nonce'], '_sjkp_subpage_icon_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['sjkp_subpage_icon_ikona'] ) )
		update_post_meta( $post_id, 'sjkp_subpage_icon_ikona', esc_attr( $_POST['sjkp_subpage_icon_ikona'] ) );
}
add_action( 'save_post', 'sjkp_subpage_icon_save' );


function the_sjkp_subpage_icon (){
    $icon_value = sjkp_get_meta( 'sjkp_subpage_icon_ikona' );
    $output = '';
    if ($icon_value && sjkp_get_meta( 'sjkp_subpage_icon_ikona' )!== '0') {
    $output = '<img class="entry-title-icon" src="'. get_stylesheet_directory_uri() .'/assets/';
    switch ($icon_value) {
    case '1':
        $output.= 'icon_poczatkujacy';
        break;
    case '2':
        $output.= 'icon_sredniozaawansowani';
        break;
    case '3':
        $output.= 'icon_cennik';
        break;
    case '4':
        $output.= 'icon_kontakt';
        break;
    case '5':
        $output.= 'icon_ciaza';
        break;
    case '6':
        $output.= 'logo_znak';
        break;
    case '7':
        $output.= 'icon_harmonogram';
    break;
    case '8':
        $output.= 'icon_terapia';
    break;
		case '9':
        $output.= 'icon_newsletter';
    break;
    }
        $output.= '.svg">';
    }

    return $output;
}

// METABOXY DLA WYJAZDÓW =========================================================================
function sjkp_wyjazdy( $meta_boxes ) {
	$prefix = 'sjkp_wyjazdy-';

	$meta_boxes[] = array(
		'id' => 'sjkp_wyjazdy_meta',
		'title' => esc_html__( 'Informacje o wyjeździe', 'sjkp_metabox' ),
		'post_types' => array('sjkp_wyjazdy' ),
		'context' => 'normal',
		'priority' => 'default',
		'autosave' => 'false',
		'fields' => array(
			array(
				'id' => $prefix . 'date_start',
				'type' => 'date',
				'name' => esc_html__( 'Termin wyjazdu', 'sjkp_metabox' ),
			),
			array(
				'id' => $prefix . 'date_end',
				'type' => 'date',
				'name' => esc_html__( 'Termin powrotu', 'sjkp_metabox' ),
			),
			array(
				'id' => $prefix . 'lokalizacja',
				'type' => 'text',
				'name' => esc_html__( 'Lokalizacja', 'sjkp_metabox' ),
			),
			array(
				'id' => $prefix . 'cena',
				'type' => 'text',
				'name' => esc_html__( 'Cena', 'sjkp_metabox' ),
			),
		),
	);
	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'sjkp_wyjazdy' );

// METABOXY DLA SZKOLEŃ =========================================================================

function sjkp_szkolenia( $meta_boxes ) {
	$prefix = 'sjkp_szkolenia-';

	$meta_boxes[] = array(
		'id' => 'sjkp_szkolenia_meta',
		'title' => esc_html__( 'Informacje o szkoleniu', 'sjkp_metabox' ),
		'post_types' => array('sjkp_szkolenia' ),
		'context' => 'normal',
		'priority' => 'default',
		'autosave' => 'false',
		'fields' => array(
			array(
				'id' => $prefix . 'date_start',
				'type' => 'date',
				'name' => esc_html__( 'Termin wyjazdu', 'sjkp_metabox' ),
			),
			array(
				'id' => $prefix . 'date_end',
				'type' => 'date',
				'name' => esc_html__( 'Termin powrotu', 'sjkp_metabox' ),
			),
			array(
				'id' => $prefix . 'lokalizacja',
				'type' => 'text',
				'name' => esc_html__( 'Lokalizacja', 'sjkp_metabox' ),
			),
			array(
				'id' => $prefix . 'cena',
				'type' => 'text',
				'name' => esc_html__( 'Cena', 'sjkp_metabox' ),
			),
		),
	);
	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'sjkp_szkolenia' );

//Zwracanie wartości metaboxów___________________________________________________________________________________________________________________

  function get_sjkp_subpage_icon (){
        if (the_sjkp_subpage_icon ()){
        echo the_sjkp_subpage_icon ();
        }
    }


function the_sjkp_meta($meta) {
    $url = Get_template_directory_uri();
//    $output ='';
    if ($meta === 'wyjazdy'){
				$termin = date("d.m.Y",strtotime(rwmb_meta( 'sjkp_wyjazdy-date_start' ))) . "-" . date("d.m.Y",strtotime(rwmb_meta( 'sjkp_wyjazdy-date_end' )));
        $miejsce = rwmb_meta( 'sjkp_wyjazdy-lokalizacja' );
        $koszt = rwmb_meta( 'sjkp_wyjazdy-cena' );
        //sprawdz czy którakolwiek zmienna posiada wartość:
        if (!empty($termin) || !empty($miejsce) || !empty($koszt)){
                $output = '<div class="post-meta"><p>' ;
            if (!empty($termin)){
                $output.= '<img class="meta-icon" src="'.$url.'/assets/kalendarzn.svg">'. $termin;
            }
            if (!empty($miejsce)){
                $output.=  '<img class="meta-icon" src="'.$url.'/assets/lokalizacjan.svg">' . $miejsce;
            }
            // if (!empty($koszt)){
            //     $output.=  '<img class="meta-icon" src="'.$url.'/assets/kosztn.svg">'. $koszt;
            // }
            $output.= '</p></div>';
        }
    } elseif ($meta === 'szkolenia') {
				$termin = date("d.m.Y",strtotime(rwmb_meta( 'sjkp_szkolenia-date_start' ))) . "-" . date("d.m.Y",strtotime(rwmb_meta( 'sjkp_szkolenia-date_end' )));
				$miejsce = rwmb_meta( 'sjkp_szkolenia-lokalizacja' );
				$koszt = rwmb_meta( 'sjkp_szkolenia-cena' );
        if (!empty($termin) || !empty($miejsce) || !empty($koszt)){
                  $output = '<div class="post-meta"><p>' ;
            if (!empty($termin)){
                $output.= '<img class="meta-icon" src="'.$url.'/assets/kalendarzn.svg">'. $termin;
            }
            if (!empty($miejsce)){
                $output.=  '<img class="meta-icon" src="'.$url.'/assets/lokalizacjan.svg">' . $miejsce;
            }
            // if (!empty($koszt)){
            //     $output.=  '<img class="meta-icon" src="'.$url.'/assets/kosztn.svg">'. $koszt;
            // }
            $output.= '</p></div>';
        }
    }
    return $output;
}
// Filtr do Wp_Query. Bez tego będzie preferowac date a nie meta_value
