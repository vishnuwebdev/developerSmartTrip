
<div class="modal fade" id="combo-<?= $key?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Boarding & Policy details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item active">
                        <a class="nav-link active" data-toggle="tab" href="#boarding_detail_<?= $item->ResultIndex ?>">
                            <i class="icofont-home"></i> Boarding Points
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#cancellation_policy_<?= $item->ResultIndex ?>">
                            <i class="icofont-info"></i>Bus Booking Cancellation Policies
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="boarding_detail_<?= $item->ResultIndex ?>" role="tabpanel" class="tab-pane fade show active">
                        <?php
                            if(isset($item->DroppingPointsDetails) && count($item->DroppingPointsDetails) > 0 && isset($item->BoardingPointsDetails) && count($item->BoardingPointsDetails) > 0){
                                $this->load->view("boarding_model",[ 
                                        'boarding' => $item->BoardingPointsDetails, 
                                        'key' => $item->ResultIndex, 
                                        'dropping' => $item->DroppingPointsDetails
                                    ]
                                );
                            } 
                        ?>
                    </div> 
                    <div id="cancellation_policy_<?= $item->ResultIndex ?>" role="tabpanel" class="tab-pane fade">
                        <?php 
                            if(isset($item->CancellationPolicies) && count($item->CancellationPolicies) > 0) {
                                $this->load->view("cancellation_model",[ 
                                        'policy' => $item->CancellationPolicies, 
                                        'key' => $item->ResultIndex 
                                    ]
                                );
                            }  
                        ?>
                    </div>
                </div>    
            </div>    
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
