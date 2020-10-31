<?php
// disable direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// get setting for date format
$date_format_custom = get_option('vsel-setting-38');

// set date format
if ( !empty($vsel_widget_atts['date_format']) ) {
	$date_format = $vsel_widget_atts['date_format'];
} elseif ( !empty($date_format_custom) ) {
	$date_format = $date_format_custom;
} else {
	$date_format = get_option('date_format');
}

// utc timezone
$utc_time_zone = vsel_utc_timezone();

// get event meta
$widget_start_date = get_post_meta( get_the_ID(), 'event-start-date', true );
$widget_end_date = get_post_meta( get_the_ID(), 'event-date', true );
$widget_time = get_post_meta( get_the_ID(), 'event-time', true );
$widget_location = get_post_meta( get_the_ID(), 'event-location', true );
$widget_link = get_post_meta( get_the_ID(), 'event-link', true );
$widget_link_label = get_post_meta( get_the_ID(), 'event-link-label', true );
$widget_link_target = get_post_meta( get_the_ID(), 'event-link-target', true );
$widget_summary = get_post_meta( get_the_ID(), 'event-summary', true );

// get custom labels from settingspage
$widget_date_label = get_option('vsel-setting-22');
$widget_start_label = get_option('vsel-setting-23');
$widget_end_label = get_option('vsel-setting-24');
$widget_time_label = get_option('vsel-setting-25');
$widget_location_label = get_option('vsel-setting-26');

// get setting to show date icon instead of a label
$widget_show_icon  = get_option('vsel-setting-63');

// get setting to combine dates on the same line
$widget_date_combine = get_option('vsel-setting-21');

// get setting to show excerpt
$widget_excerpt = get_option('vsel-setting-1');

// get settings to link title and featured image to event page
$widget_link_title = get_option('vsel-setting-14');
$widget_link_image = get_option('vsel-setting-31');

// get setting to link category to category page
$widget_link_cat = get_option('vsel-setting-45');

// get setting for event layout
$widget_image_loc = get_option('vsel-setting-37');

// get setting to set featured image size
$widget_image_size = get_option('vsel-setting-32');

// get setting to set featured image max width
$widget_image_width = get_option('vsel-setting-54');

// get settings to hide elements
$widget_date_hide = get_option('vsel-setting-2');
$widget_time_hide = get_option('vsel-setting-3');
$widget_location_hide = get_option('vsel-setting-4');
$widget_image_hide = get_option('vsel-setting-5');
$widget_info_hide = get_option('vsel-setting-7');
$widget_link_hide = get_option('vsel-setting-6');
$widget_cats_hide = get_option('vsel-setting-34');
$widget_acf_hide = get_option('vsel-setting-52');

// show default label if no custom label is set
if (empty($widget_date_label)) {
	$widget_date_label = __( 'Date: %s', 'very-simple-event-list' );
}
if (empty($widget_start_label)) {
	$widget_start_label = __( 'Start date: %s', 'very-simple-event-list' );
}
if (empty($widget_end_label)) {
	$widget_end_label = __( 'End date: %s', 'very-simple-event-list' );
}
if (empty($widget_time_label)) {
	$widget_time_label = __( 'Time: %s', 'very-simple-event-list' );
}
if (empty($widget_location_label)) {
	$widget_location_label = __( 'Location: %s', 'very-simple-event-list' );
}
if (empty($widget_link_label)) {
	$widget_link_label = __( 'More info', 'very-simple-event-list' );
}

// set link target
if ($widget_link_target == 'yes') {
	$widget_link_target = ' target="_blank"';
} else {
	$widget_link_target = ' target="_self"';
}

// set size for featured image
if ($widget_image_size == 'small') {
	$widget_image_source = 'thumbnail';
} elseif ($widget_image_size == 'medium') {
	$widget_image_source = 'medium';
} elseif ($widget_image_size == 'large') {
	$widget_image_source = 'large';
} else {
	$widget_image_source = 'post-thumbnail';
}

// set custom max width for featured image
if (!empty($widget_image_width) && is_numeric($widget_image_width) && ($widget_image_width > 19) && ($widget_image_width < 101) ) {
	if ($widget_image_width == '100') {
		$widget_image_max_width = 'style="max-width:'.$widget_image_width.'%; float:none; margin-left:0; margin-right:0;"';
	} else {
		$widget_image_max_width = 'style="max-width:'.$widget_image_width.'%;"';
	}
} else {
	$widget_image_max_width = '';
}

// set css class for featured image
if ($widget_image_loc == 'left') {
	$widget_img_class = 'vsel-image-left';
} else {
	$widget_img_class = 'vsel-image';
}

// separator for date
$sep = ' - ';

// show date label or icon
$start_default = sprintf(esc_attr($widget_start_label), '<span>'.wp_date( esc_attr($date_format), esc_attr($widget_start_date), $utc_time_zone ).'</span>' );
$end_default = sprintf(esc_attr($widget_end_label), '<span>'.wp_date( esc_attr($date_format), esc_attr($widget_end_date), $utc_time_zone ).'</span>' );
$same_default = sprintf(esc_attr($widget_date_label), '<span>'.wp_date( esc_attr($date_format), esc_attr($widget_end_date), $utc_time_zone ).'</span>' );
$start_icon_1 = '<span class="vsel-day vsel-day-top">'.wp_date( 'j', esc_attr($widget_start_date), $utc_time_zone ).'</span><span class="vsel-month">'.wp_date( 'M', esc_attr($widget_start_date), $utc_time_zone ).'</span><span class="vsel-year">'.wp_date( 'Y', esc_attr($widget_start_date), $utc_time_zone ).'</span>';
$start_icon_2 = '<span class="vsel-month vsel-month-top">'.wp_date( 'M', esc_attr($widget_start_date), $utc_time_zone ).'</span><span class="vsel-day">'.wp_date( 'j', esc_attr($widget_start_date), $utc_time_zone ).'</span><span class="vsel-year">'.wp_date( 'Y', esc_attr($widget_start_date), $utc_time_zone ).'</span>';
$end_icon_1 = '<span class="vsel-day vsel-day-top">'.wp_date( 'j', esc_attr($widget_end_date), $utc_time_zone ).'</span><span class="vsel-month">'.wp_date( 'M', esc_attr($widget_end_date), $utc_time_zone ).'</span><span class="vsel-year">'.wp_date( 'Y', esc_attr($widget_end_date), $utc_time_zone ).'</span>';
$end_icon_2 = '<span class="vsel-month vsel-month-top">'.wp_date( 'M', esc_attr($widget_end_date), $utc_time_zone ).'</span><span class="vsel-day">'.wp_date( 'j', esc_attr($widget_end_date), $utc_time_zone ).'</span><span class="vsel-year">'.wp_date( 'Y', esc_attr($widget_end_date), $utc_time_zone ).'</span>';
