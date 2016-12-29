<?php

//lead otwierający tekst
function sjkp_lead_shortcode( $atts , $content = null ) {
    $output = '<div class="entry-content__lead">' . do_shortcode($content) . '</div>';
    return $output;
}
add_shortcode( 'sjkp_lead', 'sjkp_lead_shortcode' );

//sekcje z ikonami
function sjkp_section_shortcode( $atts = [], $content = null ) {
    
    $url = Get_template_directory_uri();
    // nazwy attr zamienione na lowercase
    $atts = array_change_key_case((array)$atts, CASE_LOWER);
	// Atrybuty
	$a = shortcode_atts(
		array(
			'ikona' => '',
            'tytul' => '',
		),
		$atts
	);
    //tytuł sekcji
    if(!empty($a['tytul'])){
    $title = '<h3 class="section__title">'. $a['tytul'] .'</h3>';
    } else {
        $title = '';
    }
    //ikona przed tytułem
    if(!empty($a['ikona'])){
        switch ($a['ikona']) {
            case 'koszt':
            case 'cena':
                $ikona = '<img class="entry-content__icon" src="'.$url.'/assets/kosztn.svg">';
            break;
            case 'zapisy':
                 $ikona = '<img class="entry-content__icon" src="'.$url.'/assets/zapisyn.svg">';
            break;
            case 'miejsce':
            case 'lokalizacja':
                $ikona = '<img class="entry-content__icon" src="'.$url.'/assets/lokalizacjan.svg">';
            break;
            case 'karta':
                $ikona = '<img class="entry-content__icon" src="'.$url.'/assets/icon_karta.svg">';
            break;
        }
    } else {
        $ikona = '';
    }
    //końcowy html
    $output ='<div class="entry-content__section-title">'. $ikona . $title . '</div
        <section class="entry-content__section '. $a['typ'] .'">' 
            . do_shortcode($content) . 
        '</section>';
    return $output;
}
add_shortcode( 'sjkp_sekcja', 'sjkp_section_shortcode' );