<?php
    $publish_fare = $item->BusPrice->PublishedPriceRoundedOff;
    $offer_fare =   $item->BusPrice->OfferedPriceRoundedOff;
    $currency  = $item->BusPrice->CurrencyCode;
    $currency = $currency ? $currency : getCurrentCurrency();
    $symbol = getCurrencySymbol($currency); 
    $customer_fare = ceil($publish_fare);
    $pickupPoint = $item->BoardingPointsDetails[0]->CityPointName;
    $dropupPoint = $item->DroppingPointsDetails[0]->CityPointName;
?>
<div class="travel_card card_<?= $key ?>" traveller-name="<?= $item->TravelName ?>">
    <div class="price_div" price="<?= $customer_fare ?>">
        <div class="address_div">
             <div class="hotel_name_div">
			 	<div class="htl-listing-result-wrap">
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="htl-listing-img">
                                <img class="hotel-thumnail lazy" data-src="<?= site_url() ?>assets/images/placeholder.png" />
                            </div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="htl-listing-desc">
                                <h3 class="htl-name"> <?= $item->TravelName ?></h3>
                                <div class="htl-add">
                                    <span class="area">
                                        <b>Bus Type </b>: <?= $item->BusType ?>
                                    </span>
                                </div>
                                <div class="htl-add">
                                    <span class="area">
                                        <b>Available Seats </b>: <?= $item->AvailableSeats ?>
                                    </span>
                                    <span class="area">
                                        <b>Maximum Booking Seats </b>: <?= $item->MaxSeatsPerTicket ?>
                                    </span>
                                </div>
                                <div class="htl-add">
                                    <span class="area">
                                        <b>Pickup City Point</b>: <?= $pickupPoint ?>
                                    </span>
                                    <span class="area">
                                        <b>Drop City Point </b>: <?= $dropupPoint ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            <div class="htl-listing-price text-center">
                                <div class="htl-price-list  mb-10">
                                    <div class="per-nt-price"><?= $symbol.'  '.$customer_fare ?>
                                        <small class="d-block">per travel</small> 
                                    </div>
                                </div>
                                <div class="htl-view-list">
                                    <form  action="<?= site_url () ?>bus/booking_detail" method="POST" target="_blank">
                                        <input type="hidden" name="result_index" value="<?= $item->ResultIndex ?>">
                                        <input type="hidden" name="hotel_name" value="<?= $item->TravelName ?>">
                                        <input type="hidden" name="array_index" value="<?= $key ?>">
                                        <button type="submit" class="btn btn-search booknow">View Detail</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>        
            </div>
        </div>
    </div>
</div>
<!------end new box----------->