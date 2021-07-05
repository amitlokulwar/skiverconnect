<?php
/*
 * Template Name: Hotel Listing
 * description: >-
  Page template without sidebar
 */
//wp_enqueue_script('magnific.js' );
get_header();
global $post;
$link = st_get_link_with_search(get_permalink(), array('start', 'end', 'room_num_search', 'adult_number','children_num'), $_GET);
$hotel = new STHotel(get_the_ID());
$thumb_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
$check_in = '';
$check_out = '';
if(!isset($_REQUEST['start']) || empty($_REQUEST['start'])){
    $check_in = date('m/d/Y', strtotime("now"));
}else{
    $check_in = TravelHelper::convertDateFormat(STInput::request('start'));
}

if(!isset($_REQUEST['end']) || empty($_REQUEST['end'])){
    $check_out = date('m/d/Y', strtotime("+1 day"));
}else{
    $check_out = TravelHelper::convertDateFormat(STInput::request('end'));
}
$numberday = STDate::dateDiff($check_in, $check_out);
?>
<div id="st-content-wrapper" class="search-result-page">


    
    <div class="container">
        <div class="st-hotel-result style-full-map">
            <div class="row">
                                <div class="col-lg-9 col-md-9">
    <div class="toolbar ">
    <ul class="toolbar-action hidden-xs">
        <li>
            <div class="form-extra-field dropdown ">
                <button class="btn btn-link dropdown" type="button" id="dropdownMenuSort" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Sort <i class="fa fa-angle-down arrow"></i>
                </button>
                <div class="dropdown-menu sort-menu" aria-labelledby="dropdownMenuSort">
                    <div class="sort-title">
                        <h3>SORT BY <span class="hidden-lg hidden-md hidden-sm close-filter"><i class="fa fa-times" aria-hidden="true"></i></span></h3>
                    </div>
                    <div class="sort-item st-icheck">
                        <div class="st-icheck-item"><label> New hotel<input class="service_order" type="radio" name="service_order_" data-value="new"><span class="checkmark"></span></label></div>
                    </div>
                    <div class="sort-item st-icheck">
                        <span class="title">Price</span>
                        <div class="st-icheck-item"><label> Low to High<input class="service_order" type="radio" name="service_order_" data-value="price_asc"><span class="checkmark"></span></label></div>
                        <div class="st-icheck-item"><label> High to Low<input class="service_order" type="radio" name="service_order_" data-value="price_desc"><span class="checkmark"></span></label></div>
                    </div>
                    <div class="sort-item st-icheck">
                        <span class="title">Name</span>
                        <div class="st-icheck-item"><label> a - z<input class="service_order" type="radio" name="service_order_" data-value="name_asc"><span class="checkmark"></span></label></div>
                        <div class="st-icheck-item"><label> z - a<input class="service_order" type="radio" name="service_order_" data-value="name_desc"><span class="checkmark"></span></label></div>
                    </div>
                </div>
            </div>
        </li>
                <li class="layout">
            <span class="layout-item active" data-value="list">
                <!--<i class="fa fa-list" aria-hidden="true"></i>-->
                <span class="icon-active"><i class="input-icon field-icon fa"><svg width="24px" height="24px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <!-- Generator: Sketch 49 (51002) - http://www.bohemiancoding.com/sketch -->
    
    <desc>Created with Sketch.</desc>
    <defs></defs>
    <g id="Hotel-layout" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
        <g id="Search_Result_1_List" transform="translate(-1255.000000, -920.000000)" stroke="#5191FA">
            <g id="list-hotel" transform="translate(435.000000, 910.000000)">
                <g id="sort" transform="translate(818.000000, 10.000000)">
                    <g id="ico_list-active" transform="translate(2.000000, 0.000000)">
                        <g id="layout-bullets">
                            <rect id="Rectangle-path" x="6.875" y="0.6225" width="12.5" height="3.75" rx="1.5"></rect>
                            <rect id="Rectangle-path" x="6.875" y="8.1225" width="12.5" height="3.75" rx="1.5"></rect>
                            <rect id="Rectangle-path" x="6.875" y="15.6225" width="12.5" height="3.75" rx="1.5"></rect>
                            <rect id="Rectangle-path" x="0.625" y="0.6225" width="3.75" height="3.75" rx="1.5"></rect>
                            <rect id="Rectangle-path" x="0.625" y="8.1225" width="3.75" height="3.75" rx="1.5"></rect>
                            <rect id="Rectangle-path" x="0.625" y="15.6225" width="3.75" height="3.75" rx="1.5"></rect>
                        </g>
                    </g>
                </g>
            </g>
        </g>
    </g>
</svg></i></span>
                <span class="icon-normal"><i class="input-icon field-icon fa"><svg height="24px" width="24px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <!-- Generator: Sketch 49 (51002) - http://www.bohemiancoding.com/sketch -->
    
    <desc>Created with Sketch.</desc>
    <defs></defs>
    <g id="Hotel-layout" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
        <g id="Search_Result_1_Grid" transform="translate(-1255.000000, -920.000000)" stroke="#A0A9B2">
            <g id="list-hotel" transform="translate(435.000000, 910.000000)">
                <g id="ico_list" transform="translate(820.000000, 10.000000)">
                    <g id="layout-bullets">
                        <rect id="Rectangle-path" x="6.875" y="0.6225" width="12.5" height="3.75" rx="1.5"></rect>
                        <rect id="Rectangle-path" x="6.875" y="8.1225" width="12.5" height="3.75" rx="1.5"></rect>
                        <rect id="Rectangle-path" x="6.875" y="15.6225" width="12.5" height="3.75" rx="1.5"></rect>
                        <rect id="Rectangle-path" x="0.625" y="0.6225" width="3.75" height="3.75" rx="1.5"></rect>
                        <rect id="Rectangle-path" x="0.625" y="8.1225" width="3.75" height="3.75" rx="1.5"></rect>
                        <rect id="Rectangle-path" x="0.625" y="15.6225" width="3.75" height="3.75" rx="1.5"></rect>
                    </g>
                </g>
            </g>
        </g>
    </g>
</svg></i></span>
            </span>
            <span class="layout-item " data-value="grid">
                <!--<i class="fa fa-th" aria-hidden="true"></i>-->
                <span class="icon-active"><i class="input-icon field-icon fa"><svg width="24px" height="24px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <!-- Generator: Sketch 49 (51002) - http://www.bohemiancoding.com/sketch -->
    
    <desc>Created with Sketch.</desc>
    <defs></defs>
    <g id="Hotel-layout" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
        <g id="Search_Result_1_Grid" transform="translate(-1285.000000, -920.000000)" stroke="#5191FA">
            <g id="list-hotel" transform="translate(435.000000, 910.000000)">
                <g id="ico_grid_active" transform="translate(850.000000, 10.000000)">
                    <g id="layout-module">
                        <rect id="Rectangle-path" x="0.625" y="0.6225" width="3.75" height="3.75" rx="1.5"></rect>
                        <rect id="Rectangle-path" x="8.125" y="0.6225" width="3.75" height="3.75" rx="1.5"></rect>
                        <rect id="Rectangle-path" x="15.625" y="0.6225" width="3.75" height="3.75" rx="1.5"></rect>
                        <rect id="Rectangle-path" x="0.625" y="8.1225" width="3.75" height="3.75" rx="1.5"></rect>
                        <rect id="Rectangle-path" x="8.125" y="8.1225" width="3.75" height="3.75" rx="1.5"></rect>
                        <rect id="Rectangle-path" x="15.625" y="8.1225" width="3.75" height="3.75" rx="1.5"></rect>
                        <rect id="Rectangle-path" x="0.625" y="15.6225" width="3.75" height="3.75" rx="1.5"></rect>
                        <rect id="Rectangle-path" x="8.125" y="15.6225" width="3.75" height="3.75" rx="1.5"></rect>
                        <rect id="Rectangle-path" x="15.625" y="15.6225" width="3.75" height="3.75" rx="1.5"></rect>
                    </g>
                </g>
            </g>
        </g>
    </g>
</svg></i></span>
                <span class="icon-normal"><i class="input-icon field-icon fa"><svg width="24px" height="24px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <!-- Generator: Sketch 49 (51002) - http://www.bohemiancoding.com/sketch -->
    
    <desc>Created with Sketch.</desc>
    <defs></defs>
    <g id="Hotel-layout" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
        <g id="Search_Result_1_List" transform="translate(-1285.000000, -920.000000)" stroke="#A0A9B2">
            <g id="list-hotel" transform="translate(435.000000, 910.000000)">
                <g id="sort" transform="translate(818.000000, 10.000000)">
                    <g id="ico_grid" transform="translate(32.000000, 0.000000)">
                        <g id="layout-module">
                            <rect id="Rectangle-path" x="0.625" y="0.6225" width="3.75" height="3.75" rx="1.5"></rect>
                            <rect id="Rectangle-path" x="8.125" y="0.6225" width="3.75" height="3.75" rx="1.5"></rect>
                            <rect id="Rectangle-path" x="15.625" y="0.6225" width="3.75" height="3.75" rx="1.5"></rect>
                            <rect id="Rectangle-path" x="0.625" y="8.1225" width="3.75" height="3.75" rx="1.5"></rect>
                            <rect id="Rectangle-path" x="8.125" y="8.1225" width="3.75" height="3.75" rx="1.5"></rect>
                            <rect id="Rectangle-path" x="15.625" y="8.1225" width="3.75" height="3.75" rx="1.5"></rect>
                            <rect id="Rectangle-path" x="0.625" y="15.6225" width="3.75" height="3.75" rx="1.5"></rect>
                            <rect id="Rectangle-path" x="8.125" y="15.6225" width="3.75" height="3.75" rx="1.5"></rect>
                            <rect id="Rectangle-path" x="15.625" y="15.6225" width="3.75" height="3.75" rx="1.5"></rect>
                        </g>
                    </g>
                </g>
            </g>
        </g>
    </g>
</svg></i></span>
            </span>
        </li>
            </ul>
    <div class="dropdown-menu sort-menu sort-menu-mobile">
        <div class="sort-title">
            <h3>SORT BY <span class="hidden-lg hidden-md close-filter"><i class="input-icon field-icon fa"><svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <!-- Generator: Sketch 49 (51002) - http://www.bohemiancoding.com/sketch -->
    
    <desc>Created with Sketch.</desc>
    <defs></defs>
    <g id="Ico_close" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
        <g id="Group" stroke="#1A2B48" stroke-width="1.5">
            <g id="close">
                <path d="M0.75,23.249 L23.25,0.749" id="Shape"></path>
                <path d="M23.25,23.249 L0.75,0.749" id="Shape"></path>
            </g>
        </g>
    </g>
</svg></i></span></h3>
        </div>
        <div class="sort-item st-icheck">
            <div class="st-icheck-item"><label> New hotel<input class="service_order" type="radio" name="service_order_m_" data-value="new"><span class="checkmark"></span></label></div>
        </div>
        <div class="sort-item st-icheck">
            <span class="title">Price</span>
            <div class="st-icheck-item"><label> Low to High<input class="service_order" type="radio" name="service_order_m_" data-value="price_asc"><span class="checkmark"></span></label></div>
            <div class="st-icheck-item"><label> High to Low<input class="service_order" type="radio" name="service_order_m_" data-value="price_desc"><span class="checkmark"></span></label></div>
        </div>
        <div class="sort-item st-icheck">
            <span class="title">Name</span>
            <div class="st-icheck-item"><label> a - z<input class="service_order" type="radio" name="service_order_m_" data-value="name_asc"><span class="checkmark"></span></label></div>
            <div class="st-icheck-item"><label> z - a<input class="service_order" type="radio" name="service_order_m_" data-value="name_desc"><span class="checkmark"></span></label></div>
        </div>
    </div>
    <ul class="toolbar-action-mobile hidden-lg hidden-md">
        <li><a href="#" class="btn btn-primary btn-date">Date</a></li>
                    <li><a href="#" class="btn btn-primary btn-guest">Guest</a></li>
        
                        <li><a href="#" class="btn btn-primary btn-map">Map</a>
                </li>
                        <li><a href="#" class="btn btn-primary btn-sort">Sort</a></li>
        <li><a href="#" class="btn btn-primary btn-filter">Filter</a></li>
    </ul>
        <h3 class="search-string modern-result-string" id="modern-result-string">20 hotels found  <div id="btn-clear-filter" class="btn-clear-filter" style="display: none">Clear filter</div> </h3>
</div>
    <div id="modern-search-result" class="modern-search-result" data-layout="1">
        <div class="map-content-loading">
    <div class="st-loader"></div>
</div>        <div class="style-list">        
<?php
$posts = get_posts([
  'post_type' => 'st_hotel',
  'post_status' => 'publish',
  'numberposts' => -1
  // 'order'    => 'ASC'
]);
//echo '<pre>';
//print_r($posts);
//die();
foreach($posts as $post){
$id=$post->ID;
$content=$post->post_content;
$hotel_name=$post->post_title;
$hotel_link=get_permalink($id);

$hotel_star= get_post_meta( $id, 'hotel_star', true );

$hotel_facilities = wp_get_object_terms($id,  'hotel_facilities' );
$hotel_address = get_post_meta( $id, 'address', true );
$hotel_price = get_post_meta( $id, 'price_avg', true );
?>
<div class="item-service">
    <div class="row item-service-wrapper has-matchHeight" style="">
        <div class="col-sm-4 thumb-wrapper">
            <div class="thumb">
                <a href="" class="login" data-toggle="modal" data-target="#st-login-form">
                        <div class="service-add-wishlist" title="Add to wishlist">
                            <i class="fa fa-heart"></i>
                            <div class="lds-dual-ring"></div>
                        </div>
                    </a>
            <div class="service-tag bestseller">
                    <div class="feature_class st_featured featured">Featured</div>                
			</div>
                <a href="https://homap.travelerwp.com/st_hotel/hotel-stanford/">
                    <img width="450" height="417" src="https://homap.travelerwp.com/wp-content/uploads/2014/12/74264099-450x417.jpg" class="img-responsive wp-post-image" alt="WordPress Booking Theme" loading="lazy" srcset="https://homap.travelerwp.com/wp-content/uploads/2014/12/74264099-450x417.jpg 450w, https://homap.travelerwp.com/wp-content/uploads/2014/12/74264099-680x630.jpg 680w" sizes="(max-width: 450px) 100vw, 450px">                
				</a>
                        <ul class="icon-list icon-group booking-item-rating-stars">
                        <span class="pull-left mr10">Hotel star</span>
						<?php if($hotel_star==1){?>
						 <li><i class="fa  fa-star"></i></li>
						<?php }elseif($hotel_star==2){?>
                        <li><i class="fa  fa-star"></i></li>
						<li><i class="fa  fa-star"></i></li>
						<?php }elseif($hotel_star==3){?>
						<li><i class="fa  fa-star"></i></li> 
						<li><i class="fa  fa-star"></i></li> 
						<li><i class="fa  fa-star"></i></li> 		
						<?php }else{?>
						<li><i class="fa  fa-star"></i></li> 
						<li><i class="fa  fa-star"></i></li> 
						<li><i class="fa  fa-star"></i></li> 
						<li><i class="fa  fa-star"></i></li> 
						<?php }?>
						</ul>
                            </div>
        </div>
        <div class="col-sm-5 item-content">
            <div class="item-content-w">
                                    <ul class="icon-list icon-group booking-item-rating-stars">
                        <span class="pull-left mr10">Hotel star</span>
                       <?php if($hotel_star==1){?>
						 <li><i class="fa  fa-star"></i></li>
						<?php }elseif($hotel_star==2){?>
                        <li><i class="fa  fa-star"></i></li>
						<li><i class="fa  fa-star"></i></li>
						<?php }elseif($hotel_star==3){?>
						<li><i class="fa  fa-star"></i></li> 
						<li><i class="fa  fa-star"></i></li> 
						<li><i class="fa  fa-star"></i></li> 		
						<?php }else{?>
						<li><i class="fa  fa-star"></i></li> 
						<li><i class="fa  fa-star"></i></li> 
						<li><i class="fa  fa-star"></i></li> 
						<li><i class="fa  fa-star"></i></li> 
						<?php }?>
						</ul>
             <h4 class="service-title">
			 <a href="<?php echo $hotel_link;?>"><?php echo $hotel_name;?></a>
			 </h4>
                <ul class="facilities">
				<?php foreach( $hotel_facilities as $term ) {?>
				<li><?php echo esc_html( $term->name );?></li>
				<?php }?>
				</ul>                                   
				<p class="service-location">
				<i class="input-icon field-icon fa">
				<svg width="15px" height="15px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <!-- Generator: Sketch 49 (51002) - http://www.bohemiancoding.com/sketch -->
    
    <desc>Created with Sketch.</desc>
    <defs></defs>
    <g id="Ico_maps" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
        <g id="Group" transform="translate(4.000000, 0.000000)" stroke="#666666">
            <g id="pin-1" transform="translate(-0.000000, 0.000000)">
                <path d="M15.75,8.25 C15.75,12.471 12.817,14.899 10.619,17.25 C9.303,18.658 8.25,23.25 8.25,23.25 C8.25,23.25 7.2,18.661 5.887,17.257 C3.687,14.907 0.75,12.475 0.75,8.25 C0.75,4.10786438 4.10786438,0.75 8.25,0.75 C12.3921356,0.75 15.75,4.10786438 15.75,8.25 Z" id="Shape"></path>
                <circle id="Oval" cx="8.25" cy="8.25" r="3"></circle>
            </g>
        </g>
    </g>
</svg></i><?php echo $hotel_address;?></p>
  </div>
        </div>
        <div class="col-sm-3 section-footer">
            <div class="service-review hidden-xs">
                                <div class="count-review">
                    <span class="text-rating">Very Good</span>
                    <span class="review">7 Reviews</span>
                </div>
                <span class="rating">3.5<small>/5</small></span>
            </div>
            <div class="service-review hidden-lg hidden-md hidden-sm">
                                <span class="rating">3.5/5 Very Good</span>
                <span class="st-dot"></span>
                <span class="review">7 Reviews</span>
            </div>
            <div class="service-price">
                <span>
                    <i class="input-icon field-icon fa">
					<svg width="10px" height="16px" viewBox="0 0 11 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

					</svg>
					</i> From 
					</span>
                <span class="price">€<?php echo $hotel_price;?>/span>
                <span class="unit">/night</span>
            </div>
        </div>
    </div>
</div>
<?php }?>



        </div>
    </div>

    <div class="pagination moderm-pagination" id="moderm-pagination" data-layout="normal">
                        <ul class="page-numbers">
	<li><a aria-current="page" class="page-numbers current">1</a></li>
	<li><a class="page-numbers" href="https://homap.travelerwp.com/list-right-sidebar/page/2/">2</a></li>
	<li><a class="next page-numbers" href="https://homap.travelerwp.com/list-right-sidebar/page/2/"><i class="fa fa-angle-right"></i></a></li>
</ul>
        <span class="count-string">
            1 - 12 of 20 Hotels        </span>
    </div>
</div>
<div class="col-lg-3 col-md-3 sidebar-filter">
        <h3 class="sidebar-title">FILTER BY <span class="hidden-lg hidden-md close-filter"><i class="input-icon field-icon fa"><svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <!-- Generator: Sketch 49 (51002) - http://www.bohemiancoding.com/sketch -->
    
    <desc>Created with Sketch.</desc>
    <defs></defs>
    <g id="Ico_close" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
        <g id="Group" stroke="#1A2B48" stroke-width="1.5">
            <g id="close">
                <path d="M0.75,23.249 L23.25,0.749" id="Shape"></path>
                <path d="M23.25,23.249 L0.75,0.749" id="Shape"></path>
            </g>
        </g>
    </g>
</svg></i></span></h3>

    <div class="sidebar-item range-slider">
    <div class="item-title">
        <h4>Filter Price</h4>
        <i class="fa fa-angle-up" aria-hidden="true"></i>
    </div>
    <div class="item-content">
        <span class="irs js-irs-1"><span class="irs"><span class="irs-line" tabindex="0"><span class="irs-line-left"></span><span class="irs-line-mid"></span><span class="irs-line-right"></span></span><span class="irs-min" style="visibility: hidden;">€20,00</span><span class="irs-max" style="visibility: hidden;">€350,00</span><span class="irs-from" style="visibility: visible; left: 0%;">€20,00</span><span class="irs-to" style="visibility: visible; left: 70.3742%;">€350,00</span><span class="irs-single" style="visibility: hidden; left: 20.1822%;">€20,00 — €350,00</span></span><span class="irs-grid"></span><span class="irs-bar" style="left: 2.63158%; width: 94.7368%;"></span><span class="irs-shadow shadow-from" style="display: none;"></span><span class="irs-shadow shadow-to" style="display: none;"></span><span class="irs-slider from" style="left: 0%;"></span><span class="irs-slider to" style="left: 94.7368%;"></span></span><input type="text" class="price_range irs-hidden-input" name="price_range" value="20;350" data-symbol="€" data-min="20" data-max="350" data-step="0" tabindex="-1" readonly="">
        <button class="btn btn-link btn-apply-price-range">APPLY</button>
    </div>
</div><div class="sidebar-item st-icheck">
    <div class="item-title">
        <h4>Review Score</h4>
        <i class="fa fa-angle-up" aria-hidden="true"></i>
    </div>
    <div class="item-content">
        <ul>
            <li class="st-icheck-item"><label>Excellent<input type="checkbox" name="review_score" value="4" class="filter-item" data-type="star_rate"><span class="checkmark fcheckbox"></span></label></li>
            <li class="st-icheck-item"><label>Very Good<input type="checkbox" name="review_score" value="3" class="filter-item" data-type="star_rate"><span class="checkmark fcheckbox"></span></label></li>
            <li class="st-icheck-item"><label>Average<input type="checkbox" name="review_score" value="2" class="filter-item" data-type="star_rate"><span class="checkmark fcheckbox"></span></label></li>
            <li class="st-icheck-item"><label>Poor<input type="checkbox" name="review_score" value="1" class="filter-item" data-type="star_rate"><span class="checkmark fcheckbox"></span></label></li>
            <li class="st-icheck-item"><label>Terrible<input type="checkbox" name="review_score" value="zero" class="filter-item" data-type="star_rate"><span class="checkmark fcheckbox"></span></label></li>
        </ul>
    </div>
</div><div class="sidebar-item st-icheck">
    <div class="item-title">
        <h4>Hotel Star</h4>
        <i class="fa fa-angle-up" aria-hidden="true"></i>
    </div>
    <div class="item-content">
        <ul>
            <li class="st-icheck-item"><label><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <input type="checkbox" name="review_score" data-type="hotel_rate" value="5" class="filter-item"><span class="checkmark fcheckbox"></span>
        </label>
        </li><li class="st-icheck-item"><label><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <input type="checkbox" name="review_score" data-type="hotel_rate" value="4" class="filter-item"><span class="checkmark fcheckbox"></span>
        </label>
        </li><li class="st-icheck-item"><label><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <input type="checkbox" name="review_score" data-type="hotel_rate" value="3" class="filter-item"><span class="checkmark fcheckbox"></span>
        </label>
        </li><li class="st-icheck-item"><label><i class="fa fa-star"></i> <i class="fa fa-star"></i> <input type="checkbox" name="review_score" data-type="hotel_rate" value="2" class="filter-item"><span class="checkmark fcheckbox"></span>
        </label>
        </li><li class="st-icheck-item"><label><i class="fa fa-star"></i> <input type="checkbox" name="review_score" data-type="hotel_rate" value="1" class="filter-item"><span class="checkmark fcheckbox"></span>
        </label>
        </li>        </ul>
    </div>
</div><div class="sidebar-item pag st-icheck">
    <div class="item-title">
        <h4>Facilities</h4>
        <i class="fa fa-angle-up" aria-hidden="true"></i>
    </div>
    <div class="item-content">
            <ul>
                    <li class=" st-icheck-item" style=""><label>Air Conditioning<input data-tax="taxonomy" data-type="hotel_facilities" value="80" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span>
                        </label>
                        </li>
                    <li class=" st-icheck-item" style=""><label>Airport Transport<input data-tax="taxonomy" data-type="hotel_facilities" value="78" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span>
                        </label>
                        </li>
                    <li class=" st-icheck-item" style=""><label>Fitness Center<input data-tax="taxonomy" data-type="hotel_facilities" value="82" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span>
                        </label>
                        </li>
                    <li class="hidden st-icheck-item" style=""><label>Flat Tv<input data-tax="taxonomy" data-type="hotel_facilities" value="83" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span>
                        </label>
                        </li>
                    <li class="hidden st-icheck-item" style=""><label>Heater<input data-tax="taxonomy" data-type="hotel_facilities" value="84" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span>
                        </label>
                        </li>
                    <li class="hidden st-icheck-item" style=""><label>Internet – Wifi<input data-tax="taxonomy" data-type="hotel_facilities" value="85" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span>
                        </label>
                        </li>
                    <li class="hidden st-icheck-item" style=""><label>Parking<input data-tax="taxonomy" data-type="hotel_facilities" value="86" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span>
                        </label>
                        </li>
                    <li class="hidden st-icheck-item" style=""><label>Pool<input data-tax="taxonomy" data-type="hotel_facilities" value="87" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span>
                        </label>
                        </li>
                    <li class="hidden st-icheck-item" style=""><label>Restaurant<input data-tax="taxonomy" data-type="hotel_facilities" value="88" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span>
                        </label>
                        </li>
                    <li class="hidden st-icheck-item" style=""><label>Smoking Room<input data-tax="taxonomy" data-type="hotel_facilities" value="89" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span>
                        </label>
                        </li>
                    <li class="hidden st-icheck-item" style=""><label>Spa &amp; Sauna<input data-tax="taxonomy" data-type="hotel_facilities" value="90" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span>
                        </label>
                        </li>
                    <li class="hidden st-icheck-item" style=""><label>Washer &amp; Dryer<input data-tax="taxonomy" data-type="hotel_facilities" value="91" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span>
                        </label>
                        </li></ul>        <button class="btn btn-link btn-more-item" style="display: inline-block;">More <i class="fa fa-caret-down"></i></button>
    </div>
</div><div class="sidebar-item pag st-icheck">
    <div class="item-title">
        <h4>Hotel Theme</h4>
        <i class="fa fa-angle-up" aria-hidden="true"></i>
    </div>
    <div class="item-content">
            <ul>
                    <li class=" st-icheck-item" style=""><label>Best value<input data-tax="taxonomy" data-type="hotel_theme" value="27" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span>
                        </label>
                        </li>
                    <li class=" st-icheck-item" style=""><label>Boutique<input data-tax="taxonomy" data-type="hotel_theme" value="28" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span>
                        </label>
                        </li>
                    <li class=" st-icheck-item" style=""><label>Budget<input data-tax="taxonomy" data-type="hotel_theme" value="29" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span>
                        </label>
                        </li>
                    <li class="hidden st-icheck-item" style=""><label>Business<input data-tax="taxonomy" data-type="hotel_theme" value="16" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span>
                        </label>
                        </li>
                    <li class="hidden st-icheck-item" style=""><label>Charming<input data-tax="taxonomy" data-type="hotel_theme" value="17" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span>
                        </label>
                        </li>
                    <li class="hidden st-icheck-item" style=""><label>Classic<input data-tax="taxonomy" data-type="hotel_theme" value="18" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span>
                        </label>
                        </li>
                    <li class="hidden st-icheck-item" style=""><label>Green<input data-tax="taxonomy" data-type="hotel_theme" value="19" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span>
                        </label>
                        </li>
                    <li class="hidden st-icheck-item" style=""><label>Luxury<input data-tax="taxonomy" data-type="hotel_theme" value="20" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span>
                        </label>
                        </li>
                    <li class="hidden st-icheck-item" style=""><label>Mid-range<input data-tax="taxonomy" data-type="hotel_theme" value="25" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span>
                        </label>
                        </li>
                    <li class="hidden st-icheck-item" style=""><label>Party<input data-tax="taxonomy" data-type="hotel_theme" value="26" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span>
                        </label>
                        </li>
                    <li class="hidden st-icheck-item" style=""><label>Quaint<input data-tax="taxonomy" data-type="hotel_theme" value="21" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span>
                        </label>
                        </li>
                    <li class="hidden st-icheck-item" style=""><label>Quite<input data-tax="taxonomy" data-type="hotel_theme" value="22" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span>
                        </label>
                        </li>
                    <li class="hidden st-icheck-item" style=""><label>Romantic<input data-tax="taxonomy" data-type="hotel_theme" value="23" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span>
                        </label>
                        </li>
                    <li class="hidden st-icheck-item" style=""><label>Standard<input data-tax="taxonomy" data-type="hotel_theme" value="24" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span>
                        </label>
                        </li>
                    <li class="hidden st-icheck-item" style=""><label>Trendy<input data-tax="taxonomy" data-type="hotel_theme" value="30" type="checkbox" name="taxonomy" class="filter-tax"><span class="checkmark fcheckbox"></span>
                        </label>
                        </li></ul>        <button class="btn btn-link btn-more-item" style="display: inline-block;">More <i class="fa fa-caret-down"></i></button>
    </div>
</div></div>            </div>
        </div>
    </div>
    </div>
<?php
    wp_reset_query();

    get_footer();
?>