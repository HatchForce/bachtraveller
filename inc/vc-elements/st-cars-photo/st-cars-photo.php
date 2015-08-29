<?php
    if(function_exists('vc_map')){
        vc_map( array(
            "name" => __("ST Detailed Car Gallery", ST_TEXTDOMAIN),
            "base" => "st_car_detail_photo",
            "content_element" => true,
            "icon" => "icon-st",
            "category"=>'Shinetheme',
            "params" => array(
                array(
                    "type" => "dropdown",
                    "holder" => "div",
                    "heading" => __("Style", ST_TEXTDOMAIN),
                    "param_name" => "style",
                    "description" =>"",
                    "value" => array(
                        __('Slide',ST_TEXTDOMAIN)=>'slide',
                        __('Grid',ST_TEXTDOMAIN)=>'grid',
                    ),
                )
            )
        ) );
    }
    if(!function_exists('st_vc_car_detail_photo')){
        function st_vc_car_detail_photo($attr,$content=false)
        {
            if(is_singular('st_cars'))
            {
                return st()->load_template('cars/elements/photo',null,array('attr'=>$attr));
            }
        }
    }
    st_reg_shortcode('st_car_detail_photo','st_vc_car_detail_photo');
