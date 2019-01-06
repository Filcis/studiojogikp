<?php

//sendpress-email-button

function sjkp_email_button( $atts , $content = null ) {
  $a = shortcode_atts( array(
    'link' => '',
    'kolor' => '',
    'tekst' => '',
  ), $atts );

  $kolor ='#78f';
  switch($a['kolor']) {
    case 'wyjazdy':
      $kolor = '#78f';
      break;
    case 'szkoła':
      $kolor = '#00047A';
      break;
    case 'specjalistyczne':
      $kolor = '#0095C7';
      break;
    case 'szkolenia':
      $kolor =  '#1F489B';
      break;
    default:
      $kolor = '#78f';
      break;
  }

  $output = '<table class="row" style="border-collapse:collapse;border-spacing:0;display:table;padding:0;position:relative;text-align:left;vertical-align:top;width:100%">
    <tbody>
      <tr style="padding:0;text-align:left;vertical-align:top">
        <th class="small-12 large-12 columns first last" style="Margin:0 auto;color:#444;font-family:Helvetica,Tahoma,Arial,sans-serif;font-size:18px;font-weight:400;line-height:1.65;margin:0 auto;padding:0;padding-bottom:24px;padding-left:26px;padding-right:26px;text-align:left;width:554px">
          <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
            <tr style="padding:0;text-align:left;vertical-align:top">
              <th style="Margin:0;color:#444;font-family:Helvetica,Tahoma,Arial,sans-serif;font-size:18px;font-weight:400;line-height:1.65;margin:0;padding:0;text-align:left">
                <table class="spacer" style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                  <tbody>
                    <tr style="padding:0;text-align:left;vertical-align:top">
                      <td height="32px" style="-moz-hyphens:auto;-webkit-hyphens:auto;Margin:0;border-collapse:collapse!important;color:#444;font-family:Helvetica,Tahoma,Arial,sans-serif;font-size:32px;font-weight:400;hyphens:auto;line-height:32px;margin:0;mso-line-height-rule:exactly;padding:0;text-align:left;vertical-align:top;word-wrap:break-word">&#xA0;</td>
                    </tr>
                  </tbody>
                </table>
                <table class="button large expanded" style="Margin:0 0 16px 0;border-collapse:collapse;border-spacing:0;margin:0 0 16px 0;padding:0;text-align:left;vertical-align:top;width:100%!important">
                  <tr style="padding:0;text-align:left;vertical-align:top">
                    <td style="-moz-hyphens:auto;-webkit-hyphens:auto;Margin:0;border-collapse:collapse!important;color:#444;font-family:Helvetica,Tahoma,Arial,sans-serif;font-size:18px;font-weight:400;hyphens:auto;line-height:1.65;margin:0;padding:0;text-align:left;vertical-align:top;word-wrap:break-word">
                      <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                        <tr style="padding:0;text-align:left;vertical-align:top">
                          <td style="-moz-hyphens:auto;-webkit-hyphens:auto;Margin:0;background:'.$kolor.';border:2px solid '.$kolor.';border-collapse:collapse!important;color:#fefefe;font-family:Helvetica,Tahoma,Arial,sans-serif;font-size:18px;font-weight:400;hyphens:auto;line-height:1.65;margin:0;padding:0;text-align:left;vertical-align:top;word-wrap:break-word">
                            <center data-parsed="" style="min-width:0;width:100%"><a href="' . $a["link"]  . '" target="_blank" align="center" class="float-center" style="Margin:0;border:0 solid '.$kolor.';border-radius:3px;color:#fefefe;display:inline-block;font-family:Helvetica,Tahoma,Arial,sans-serif;font-size:20px;font-weight:700;line-height:1.65;margin:0;padding:10px 20px 10px 20px;padding-left:0;padding-right:0;text-align:center;text-decoration:none;width:100%">' . $a["tekst"]  . '</a></center>
                          </td>
                        </tr>
                      </table>
                    </td>
                    <td class="expander" style="-moz-hyphens:auto;-webkit-hyphens:auto;Margin:0;border-collapse:collapse!important;color:#444;font-family:Helvetica,Tahoma,Arial,sans-serif;font-size:18px;font-weight:400;hyphens:auto;line-height:1.65;margin:0;padding:0!important;text-align:left;vertical-align:top;visibility:hidden;width:0;word-wrap:break-word"></td>
                  </tr>
                </table>
                <table class="spacer" style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                  <tbody>
                    <tr style="padding:0;text-align:left;vertical-align:top">
                      <td height="32px" style="-moz-hyphens:auto;-webkit-hyphens:auto;Margin:0;border-collapse:collapse!important;color:#444;font-family:Helvetica,Tahoma,Arial,sans-serif;font-size:32px;font-weight:400;hyphens:auto;line-height:32px;margin:0;mso-line-height-rule:exactly;padding:0;text-align:left;vertical-align:top;word-wrap:break-word">&#xA0;</td>
                    </tr>
                  </tbody>
                </table>
              </th>
              <th class="expander" style="Margin:0;color:#444;font-family:Helvetica,Tahoma,Arial,sans-serif;font-size:18px;font-weight:400;line-height:1.65;margin:0;padding:0!important;text-align:left;visibility:hidden;width:0"></th>
            </tr>
          </table>
        </th>
      </tr>
    </tbody>
  </table>';
  return $output;
}
add_shortcode( 'email_button', 'sjkp_email_button' );

//lead otwierający tekst
function sjkp_lead_shortcode( $atts , $content = null ) {
    $output = '<div class="entry-content__lead">' . do_shortcode($content) . '</div>';
    return $output;
}
add_shortcode( 'sjkp_lead', 'sjkp_lead_shortcode' );

//uwagi w tekście
function sjkp_warning_shortcode( $atts , $content = null ) {
    $output = '<div class="entry-content__warning">' . do_shortcode($content) . '</div>';
    return $output;
}
add_shortcode( 'sjkp_uwaga', 'sjkp_warning_shortcode' );

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
        <section class="entry-content__section">'
            . do_shortcode($content) .
        '</section>';
    return $output;
}
add_shortcode( 'sjkp_sekcja', 'sjkp_section_shortcode' );
