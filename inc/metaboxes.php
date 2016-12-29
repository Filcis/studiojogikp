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
		'informacje_o_wyjedzie-informacje-o-wyjedzie',
		__( 'informacje o wyjeździe', 'informacje_o_wyjedzie' ),
		'informacje_o_wyjedzie_html',
		'sjkp_wyjazdy',
		'normal',
		'default'
	);
    	add_meta_box(
		'informacje_o_szkoleniu-informacje-o-szkoleniu',
		__( 'informacje o szkoleniu', 'informacje_o_szkoleniu' ),
		'informacje_o_szkoleniu_html',
		'sjkp_szkolenia',
		'normal',
		'default'
	);
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

function informacje_o_wyjedzie_html( $post) {
	wp_nonce_field( '_informacje_o_wyjedzie_nonce', 'informacje_o_wyjedzie_nonce' ); ?>
    <p>
        <label for="informacje_o_wyjedzie_termin_wyjazdu">
            <?php _e( 'termin wyjazdu', 'informacje_o_wyjedzie' ); ?>
        </label>
        <br>
        <input type="text" name="informacje_o_wyjedzie_termin_wyjazdu" id="informacje_o_wyjedzie_termin_wyjazdu" value="<?php echo sjkp_get_meta( 'informacje_o_wyjedzie_termin_wyjazdu' ); ?>"> </p>
    <p>
        <label for="informacje_o_wyjedzie_miejsce">
            <?php _e( 'miejsce', 'informacje_o_wyjedzie' ); ?>
        </label>
        <br>
        <input type="text" name="informacje_o_wyjedzie_miejsce" id="informacje_o_wyjedzie_miejsce" value="<?php echo sjkp_get_meta( 'informacje_o_wyjedzie_miejsce' ); ?>"> </p>
    <p>
        <label for="informacje_o_wyjedzie_koszt">
            <?php _e( 'koszt', 'informacje_o_wyjedzie' ); ?>
        </label>
        <br>
        <input type="text" name="informacje_o_wyjedzie_koszt" id="informacje_o_wyjedzie_koszt" value="<?php echo sjkp_get_meta( 'informacje_o_wyjedzie_koszt' ); ?>"> </p>
    <?php
}

function informacje_o_wyjedzie_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['informacje_o_wyjedzie_nonce'] ) || ! wp_verify_nonce( $_POST['informacje_o_wyjedzie_nonce'], '_informacje_o_wyjedzie_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['informacje_o_wyjedzie_termin_wyjazdu'] ) )
		update_post_meta( $post_id, 'informacje_o_wyjedzie_termin_wyjazdu', esc_attr( $_POST['informacje_o_wyjedzie_termin_wyjazdu'] ) );
	if ( isset( $_POST['informacje_o_wyjedzie_miejsce'] ) )
		update_post_meta( $post_id, 'informacje_o_wyjedzie_miejsce', esc_attr( $_POST['informacje_o_wyjedzie_miejsce'] ) );
	if ( isset( $_POST['informacje_o_wyjedzie_koszt'] ) )
		update_post_meta( $post_id, 'informacje_o_wyjedzie_koszt', esc_attr( $_POST['informacje_o_wyjedzie_koszt'] ) );
}
add_action( 'save_post', 'informacje_o_wyjedzie_save' );


function informacje_o_szkoleniu_html( $post) {
	wp_nonce_field( '_informacje_o_szkoleniu_nonce', 'informacje_o_szkoleniu_nonce' ); ?>
        <div>
            <label for="informacje_o_szkoleniu_termin_szkolenia">
                <?php _e( 'termin szkolenia', 'informacje_o_szkoleniu' ); ?>
            </label>
            <br>
            <input type="text" name="informacje_o_szkoleniu_termin_szkolenia" id="informacje_o_szkoleniu_termin_szkolenia" value="<?php echo sjkp_get_meta( 'informacje_o_szkoleniu_termin_szkolenia' ); ?>"> </div>
        <p>
            <label for="informacje_o_szkoleniu_miejsce">
                <?php _e( 'miejsce', 'informacje_o_szkoleniu' ); ?>
            </label>
            <br>
            <input type="text" name="informacje_o_szkoleniu_miejsce" id="informacje_o_szkoleniu_miejsce" value="<?php echo sjkp_get_meta( 'informacje_o_szkoleniu_miejsce' ); ?>"> </p>
        <p>
            <label for="informacje_o_szkoleniu_cena">
                <?php _e( 'cena', 'informacje_o_szkoleniu' ); ?>
            </label>
            <br>
            <input type="text" name="informacje_o_szkoleniu_cena" id="informacje_o_szkoleniu_cena" value="<?php echo sjkp_get_meta( 'informacje_o_szkoleniu_cena' ); ?>"> </p>
        <?php
}

function informacje_o_szkoleniu_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['informacje_o_szkoleniu_nonce'] ) || ! wp_verify_nonce( $_POST['informacje_o_szkoleniu_nonce'], '_informacje_o_szkoleniu_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['informacje_o_szkoleniu_termin_szkolenia'] ) )
		update_post_meta( $post_id, 'informacje_o_szkoleniu_termin_szkolenia', esc_attr( $_POST['informacje_o_szkoleniu_termin_szkolenia'] ) );
	if ( isset( $_POST['informacje_o_szkoleniu_miejsce'] ) )
		update_post_meta( $post_id, 'informacje_o_szkoleniu_miejsce', esc_attr( $_POST['informacje_o_szkoleniu_miejsce'] ) );
	if ( isset( $_POST['informacje_o_szkoleniu_cena'] ) )
		update_post_meta( $post_id, 'informacje_o_szkoleniu_cena', esc_attr( $_POST['informacje_o_szkoleniu_cena'] ) );
}
add_action( 'save_post', 'informacje_o_szkoleniu_save' );


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
                    <br> </p>
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
    if ($icon_value && sjkp_get_meta( 'sjkp_subpage_icon_ikona' )!== '0') {
    $output= '<img class="entry-title-icon" src="'. get_stylesheet_directory_uri() .'/assets/';    
    switch ($icon_value) {
    case '1':
        $output.= 'icon_1';
        break;
    case '2':
        $output.= 'icon_2';
        break;
    case '3':
        $output.= 'icon_3';
        break;
    case '4':
        $output.= 'icon_4'; //kontakt
        break;
    case '5':
        $output.= 'icon_5'; //ciąża
        break;
    case '6':
        $output.= 'logo_znak';
        break;
    }
        $output.= '.svg">';
    return $output;
}
}


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
        $termin = sjkp_get_meta( 'informacje_o_wyjedzie_termin_wyjazdu' );
        $miejsce = sjkp_get_meta( 'informacje_o_wyjedzie_miejsce' );
        $koszt = sjkp_get_meta( 'informacje_o_wyjedzie_koszt' );
        //sprawdz czy którakolwiek zmienna posiada wartość:
        if (!empty($termin) || !empty($miejsce) || !empty($koszt)){
                $output = '<div class="post-meta"><p>' ;
            if (!empty($termin)){
                $output.= '<img class="meta-icon" src="'.$url.'/assets/kalendarzn.svg">'. $termin;
            }
            if (!empty($miejsce)){
                $output.=  '<img class="meta-icon" src="'.$url.'/assets/lokalizacjan.svg">' . $miejsce;
            }
            if (!empty($koszt)){
                $output.=  '<img class="meta-icon" src="'.$url.'/assets/kosztn.svg">'. $koszt;
            }
            $output.= '</p></div>';  
        }
    } elseif ($meta === 'szkolenia'){
        $termin = sjkp_get_meta( 'informacje_o_szkoleniu_termin_szkolenia' );
        $miejsce = sjkp_get_meta( 'informacje_o_szkoleniu_miejsce' );
        $koszt = sjkp_get_meta( 'informacje_o_szkoleniu_cena' );
        if (!empty($termin) || !empty($miejsce) || !empty($koszt)){
                  $output = '<div class="post-meta"><p>' ;
            if (!empty($termin)){
                $output.= '<img class="meta-icon" src="'.$url.'/assets/kalendarzn.svg">'. $termin;
            }
            if (!empty($miejsce)){
                $output.=  '<img class="meta-icon" src="'.$url.'/assets/lokalizacjan.svg">' . $miejsce;
            }
            if (!empty($koszt)){
                $output.=  '<img class="meta-icon" src="'.$url.'/assets/kosztn.svg">'. $koszt;
            }
            $output.= '</p></div>';  
        }
    }
    return $output;
}