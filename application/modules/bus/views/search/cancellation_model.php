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
           