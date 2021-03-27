<div class="trv-topbar mb-3">
    <div class="flt-booking-top">
        <h5>Seat Booking</h5>
    </div>
    <div class="flt-booking-dts">
        <div class="plane">
            <div class="cockpit">
                <h1>Please select a seat</h1>
            </div>
            <!-- <div class="exit exit--front fuselage"></div> -->
  			<ol class="cabin fuselage">
			  	<?php foreach($seatData as $index => $row){  ?>
					
    				<li class="row_plane row--<?= $index+1 ?>">
      					<ol class="seats" type="A">
						  	<?php foreach($row->Seats as $item){ ?>
								<li class="seat">
									<input type="checkbox" name="seat_selection[]" <?= ($item->AvailabiltyType == 3) ? "disabled" : null ?> id="<?= $item->Code?>" value="<?= $item->Code?>" />
									<label for="<?= $item->Code ?>"><?= $item->Code ?></label>
								</li>
							<?php } ?>
						</ol>	
					</li>
				<?php } ?>
			</ol>	
  			<!-- <div class="exit exit--back fuselage"></div> -->
		</div>
    </div>
</div>