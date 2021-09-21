<?php
    $publish_fare = $item->BusPrice->PublishedPriceRoundedOff;
    $offer_fare =   $item->BusPrice->OfferedPriceRoundedOff;
    $currency  = $item->BusPrice->CurrencyCode;
    $currency = $currency ? $currency : getCurrentCurrency();
    $symbol = getCurrencySymbol($currency); 
    $customer_fare = ceil($publish_fare);
    $pickupPoint = $item->BoardingPointsDetails[0]->CityPointName;
    $dropupPoint = $item->DroppingPointsDetails[0]->CityPointName;
    $arrivalTime = date("D, d M, Y h:i A",strtotime($item->ArrivalTime));
    $departureTime = date("D, d M, Y h:i A",strtotime($item->DepartureTime));
    // dd($item);
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
                                <!-- <div class="htl-add">
                                    <span class="area">
                                        <b>Pickup City Point</b>: <?= $pickupPoint ?>
                                    </span>
                                    <span class="area">
                                        <b>Drop City Point </b>: <?= $dropupPoint ?>
                                    </span>
                                </div> -->
                                <div class="htl-add">
                                    <span class="area">
                                        <b>Departure Time</b>: <?= $departureTime ?>
                                    </span>
                                </div>
                                <div class="htl-add">
                                    <span class="area">
                                        <b>Arrival Time</b>: <?= $arrivalTime ?>
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
                                    <button href="#book-now-<?= $item->ResultIndex ?>"  data-toggle="modal" type="button" data-index="<?= $item->ResultIndex ?>" data-trace="<?= $traceId ?>" class="btn btn-search booknow">Book</button>
                                    
                                    <a href="#combo-<?= $item->ResultIndex ?>" data-toggle="modal" class="btn danger-bg fz10 mb-10">Traveller Details</a>
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
<?php
    $this->load->view("combo_model",['item'=>$item,"key"=>$item->ResultIndex]);
    $this->load->view("seat_model",['item'=>$item,"key" =>$item->ResultIndex]);
?>