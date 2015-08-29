<?php
/**
 * @package WordPress
 * @subpackage Traveler
 * @since 1.0
 *
 * Cars element search field pick up date time
 *
 * Created by ShineTheme
 *
 */
$default=array(
    'title'=>'',
    'is_required'=>'on',
);
if(isset($data)){
    extract(wp_parse_args($data,$default));
}else{
    extract($default);
}

$title_date = 'Date';
$title_time ='Time';
$title = explode(',',$title);
if(!empty($title[0])){
    $title_date = $title[0] ;
}
if(!empty($title[1])){
    $title_time = $title[1] ;
}
$size=6;
if(!empty($st_direction)){
    if($st_direction!='horizontal'){
        $size='x';
    }
}else{
    $st_direction = 'horizontal';
}
if($is_required == 'on'){
    $is_required = 'required';
}
?>
<div class="<?php  if($st_direction=='horizontal') echo 'row';?>">
    <div class="col-md-<?php echo esc_attr($size) ?>">
        <div class="form-group form-group-lg form-group-icon-left"  data-date-format="<?php echo TravelHelper::getDateFormatJs(); ?>">
            <i class="fa fa-calendar input-icon input-icon-highlight"></i>
            <label><?php echo esc_html( $title_date)?></label>
            <input placeholder="<?php echo TravelHelper::getDateFormatJs(); ?>" <?php echo esc_attr($is_required) ?>  class="form-control pick-up-date <?php echo esc_attr($is_required) ?>" name="pick-up-date" type="text" />
        </div>
    </div>
    <div class="col-md-<?php echo esc_attr($size) ?>">
        <div class="form-group form-group-lg form-group-icon-left">
            <i class="fa fa-clock-o input-icon input-icon-highlight"></i>
            <label><?php echo esc_html($title_time)?></label>
            <input name="pick-up-time" class="time-pick form-control <?php echo esc_attr($is_required) ?>" <?php echo esc_attr($is_required) ?> value="<?php _e('12:00 PM',ST_TEXTDOMAIN)?>" type="text" />
        </div>
    </div>
</div>


