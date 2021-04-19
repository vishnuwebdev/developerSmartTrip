<div class="modal fade" id="cancel-<?= $key?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Bus Booking Cancellation Policies</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <!-- <span class="d-block black-color p-2 light-bg border">title</span> -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Cancellation time</th>
                                <th class="text-center">Cancellation charges</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($policy as $feature){ ?>
                                <tr>
                                    <td class="text-center">
                                        <?= $feature->PolicyString ?>
                                    </td>
                                    <td class="text-center">
                                        <?php
                                            if($feature->CancellationChargeType === 1){
                                                echo $feature->CancellationCharge;   
                                            }else if($feature->CancellationChargeType === 2){
                                                echo $feature->CancellationCharge." %";   
                                            }else{
                                                echo $feature->CancellationCharge."/nights";  
                                            }
                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
