<?php
/**
 * @package WordPress
 * @subpackage Traveler
 * @since 1.0
 *
 * Cars element search field pick up time
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
if($is_required == 'on'){
    $is_required = 'required';
}
?>
<div class="form-group form-group-lg form-group-icon-left">
    <i class="fa fa-clock-o input-icon input-icon-highlight"></i>
    <label><?php echo esc_html($title)?></label>
    <input name="pick-up-time" <?php echo esc_attr($is_required) ?> class="time-pick form-control <?php echo esc_attr($is_required) ?>" value="<?php echo STInput::request('pick-up-time') ?>" type="text" />
</div>