<?php
/**
 * @package WordPress
 * @subpackage Traveler
 * @since 1.1.0
 *
 * User hotel booking
 *
 * Created by ShineTheme
 *
 */
?>
<div class="st-create">
    <h2><?php _e("Hotel Booking") ?></h2>
</div>
    <?php
    $paged = get_query_var('paged') ? intval(get_query_var('paged')) : 1;
    $limit=10;
    $offset=($paged-1)*$limit;
    $data_post=STAdmin::get_history_bookings('st_hotel',$offset,$limit,$data->ID);
    $posts=$data_post['rows'];
    $total=ceil($data_post['total']/$limit);
    ?>

<table class="table table-bordered table-striped table-booking-history">
    <thead>
    <tr>
        <th><?php _e("STT",ST_TEXTDOMAIN)?></th>
        <th><?php _e("Customer",ST_TEXTDOMAIN)?></th>
        <th><?php _e("Check-in/Check-out",ST_TEXTDOMAIN)?></th>
        <th><?php _e("Hotel - Room Name",ST_TEXTDOMAIN)?></th>
        <th><?php _e("Rooms",ST_TEXTDOMAIN)?></th>
        <th><?php _e("Price",ST_TEXTDOMAIN)?></th>
        <th><?php _e("Created Date",ST_TEXTDOMAIN)?></th>
        <th><?php _e("Status",ST_TEXTDOMAIN)?></th>
        <th><?php _e("Payment Method",ST_TEXTDOMAIN)?></th>
    </tr>
    </thead>
    <tbody id="data_history_book booking-history-title">
    <?php if(!empty($posts)) {
        $i=1 + $offset;
        foreach( $posts as $key => $value ) {
            $post_id = $value->ID;
            $item_id = get_post_meta($value->ID, 'item_id', true);
            ?>
            <tr>
                <td class="text-center"><?php echo esc_attr($i) ?></td>
                <td class="booking-history-type">
                    <?php
                    if ($post_id) {
                        $name = get_post_meta($post_id, 'st_first_name', true);
                        if (!$name) {
                            $name = get_post_meta($post_id, 'st_name', true);
                        }
                        if (!$name) {
                            $name = get_post_meta($post_id, 'st_email', true);
                        }
                        echo esc_html( $name);
                    }
                    ?>
                </td>
                <td class="">
                    <?php $date= get_post_meta($post_id, 'check_in', true);if($date) echo date('m/d/Y',strtotime($date)); ?><br>
                    <i class="fa fa-long-arrow-right"></i><br>
                    <?php $date= get_post_meta($post_id, 'check_out', true);if($date) echo date('m/d/Y',strtotime($date)); ?>
                </td>
                <td class=""> <?php
                    if ($item_id) {
                        if ($item_id) {
                            echo "<a href='" . get_the_permalink($item_id) . "' target='_blank'>" . get_the_title($item_id) . "</a>";
                        }
                        $room_id=get_post_meta($post_id,'room_id',true);
                        if($room_id){
                            echo " <br>".__("Room : ",ST_TEXTDOMAIN)."<strong>".get_the_title($room_id)."</strong>";
                        }
                    }
                    ?>
                </td>
                <td class="text-center"><?php echo get_post_meta($post_id, 'item_number', true) ?> </td>
                <td class=""> <?php
                    $price=get_post_meta($post_id,'item_price',true);
                    $currency=get_post_meta($post_id,'st_currency',true);
                    echo TravelHelper::format_money_raw($price,$currency);
                    ?>
                </td>
                <td class=""><?php echo date(get_option('date_format'),strtotime($value->post_date)) ?></td>
                <td class=""><?php echo get_post_meta($post_id, 'status', true) ?> </td>
                <td class=""> <?php echo STPaymentGateways::get_gatewayname(get_post_meta($post_id,'payment_method',true));?> </td>
            </tr>
    <?php
            $i++;
        }
    }else{
        echo '<h5>'.st_get_language('no_hotel').'</h5>';
    }
    ?>
    </tbody>
</table>

<?php st_paging_nav('',null,$total) ?>


