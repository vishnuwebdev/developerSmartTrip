<div class="modal fade" id="boarding-<?= $key?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Boarding Points</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <span class="d-block black-color p-2 light-bg border">Boarding Points</span>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">City</th>
                                <th class="text-center">Location</th>
                                <th class="text-center">Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($boarding as $feature){ ?>
                                <tr>
                                    <td class="text-center">
                                        <?= $feature->CityPointLocation ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $feature->CityPointName ?>
                                    </td>
                                    <td class="text-center">
                                        <?= date("d, D M, Y h:i A", strtotime($feature->CityPointTime)) ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <span class="d-block black-color p-2 light-bg border">Dropping Points</span>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">City</th>
                                <th class="text-center">Location</th>
                                <th class="text-center">Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($dropping as $feature){ ?>
                                <tr>
                                    <td class="text-center">
                                        <?= $feature->CityPointLocation ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $feature->CityPointName ?>
                                    </td>
                                    <td class="text-center">
                                        <?= date("d, D M, Y h:i A", strtotime($feature->CityPointTime)) ?>
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
