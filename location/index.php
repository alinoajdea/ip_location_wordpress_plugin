<?php 
/*
    Plugin Name: Location
    Plugin URI: https://wordpress.org/plugins/mediavine-create/
    Description: Bla Bla Bla ... Best plugin EVER !
    Author: Portocala Lamaita
    Author URI: http://location.com
    Version: 0.1
*/
add_shortcode( 'location', 'location' );

function location( $atts ){
    $a = shortcode_atts ( array(
        'color' => '#5e90e0',
        'x' => '00000'
    ), $atts );

    $bgcolor = $a['color'];

$ip = $_SERVER['REMOTE_ADDR'];
if($ip == '127.0.0.1') {
    $ip = '188.26.121.154';
}

$json = file_get_contents("http://ip-api.com/json/$ip");
$obj = json_decode($json);

$html ="<table style='background-color:$bgcolor;'>";
$html .="<tr><th>City</th><td>$obj->city</td></tr>";
$html .="<tr><th>Postal Code</th><td>$obj->zip</td></tr>";
$html .="<tr><th>Postal Code</th><td>$obj->country</td></tr>";
$html .="<tr><th>Postal Code</th><td>$obj->regionName</td></tr>";
$html .="<tr><th>Postal Code</th><td>$obj->isp</td></tr>";
$html .="</table>";

return $html;
}