<script>
    const autoCompleteHTTPRequest  = function (request, response, inputString) {
        $.ajax({
            type: "POST",
            url: "<?= site_url() ?>bus/get_cities",
            dataType : "json",
            cache : false,
            data: {id: inputString},
            success: function(data){
                var findCities = [];
                var ittrateCount = data.length;
                for(var i=0; i < ittrateCount; i++){
                    findCities.push({ 
                        "city_code": data[i].CityId, 
                        "value": data[i].CityName 
                    });
                }
                response(findCities);
            }	
        });	  
    } 

    function travel_suggest(inputString) {
        $( "#from_travel" ).autocomplete({
            autoFocus: true,	
            minLength : 2,
            source : function (e, r) { autoCompleteHTTPRequest(e, r, inputString) },
            select: function(event, ui) {
                $( "#from_travel").val(ui.item.value);	
                $( "#from_city").val(ui.item.city_code);	
                $( "#to_travel").focus();	
            },
        });    
    }

    function travel_suggest_to(inputString) {
        $( "#to_travel" ).autocomplete({
            autoFocus: true,	
            minLength : 2,
            source : function (e, r) { autoCompleteHTTPRequest(e, r, inputString) },
            select: function(event, ui) {
                console.log(ui.item);
                $( "#to_travel").val(ui.item.value);	
                $( "#to_city").val(ui.item.city_code);	
                $( "#travel_date" ).focus();
            },
        });    
    }

    $('#travel_date').datepicker({
        numberOfMonths: 1,
        dayNamesMin: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
        minDate: 0,
        showOn: 'both',
        buttonText: '',
        dateFormat: 'dd-mm-yy',
        beforeShow: function() {
            $('#ui-datepicker-div').addClass("searchdatepicker");
        },
        onClose: function(selectedDate){}
    });

    var cityErrorMsg = "Please select the city by the type name of city.";
    $("#bus_search").validate({
        ignore: [],
        rules: {
            from_city: {
                required: function () {  
                    var fromCity = $("#from_city").val();
                    if(!fromCity){
                        $("#bus_search").validate().showErrors({ 
                            "from_travel": cityErrorMsg 
                        }); 
                    }
                }
            },
            to_city: {
                required: function () { 
                    var toCity = $("#to_city").val();
                    if(!toCity){
                        $("#bus_search").validate().showErrors({
                            "to_travel": cityErrorMsg
                        }); 
                    } 
                }
            },
            travel_date: {
                required: true,
            }
        },
        messages: {
            travel_date: {
                required: "Please select the travel date.",
            }
        }
    });

    
    $("#travel_date").on("change",function(){
        var city = $(this).val();
        if(city){
            $(this).removeClass("error");
            $(this).next("label").html("");
        }
    });

    if(isBusSearchSection){
        var current_page = 0;
        function getBusCards(){
            if(current_page * PER_PAGE < totalRecords){
                $('#loader').modal('show');
                $.ajax({
                    type: "POST",
                    url: "<?= site_url() ?>bus/loadCards?page="+current_page,
                    data:{},
                    success:function (data) {
                        data = $.parseJSON(data);
                        var buses = data.list;
                        $('.bus_card_list').append(buses);
                        $('.lazy').Lazy();
                        $('#loader').modal('hide');
                    }
                });
                current_page++;
            }
        }

        function getDocHeight() {
            var D = document;
            return Math.max(
                D.body.scrollHeight, D.documentElement.scrollHeight,
                D.body.offsetHeight, D.documentElement.offsetHeight,
                D.body.clientHeight, D.documentElement.clientHeight
            );
        }

        var sIndex = 11, offSet = 10, isPreviousEventComplete = true, isDataAvailable = true;
        $(window).scroll(function() {
            var bp_document_heigh=getDocHeight();
            bp_document_heigh=bp_document_heigh-50;
            if($(window).scrollTop() + $(window).height() >= bp_document_heigh) {
                isPreviousEventComplete = false;
                getBusCards();
            }
        });

        getBusCards();

        // var min="<?= ceil($price->min) ?>";
        // var max="<?= ceil($price->max) ?>";
        // max = max > 10000 ? max : 10000;
        // console.log(min,max);
        // $( "#price_filter_slider" ).slider({
        //     range: true,
        //     min: min,
        //     max: max,
        //     values: [ min, max ],
        //     slide: function( event, ui ) {
        //         $( "#amount" ).val( "<?= isset($js_currency_symbol) ? $js_currency_symbol : null ?> " + ui.values[0]);
        //         $( "#amount1" ).val("<?= isset($js_currency_symbol) ? $js_currency_symbol : null ?> " + ui.values[1]);
        //         min=ui.values[0];
        //         // max=ui.values[1];     
        //         max = ui.values[1] > 1000 ? ui.values[1] : 10000;
        //     }
        // });
        // $("#amount").val("<?= isset($js_currency_symbol) ? $js_currency_symbol : null ?> " + min );
        // $("#amount1").val("<?= isset($js_currency_symbol) ? $js_currency_symbol : null ?> " + max );  


        $("#bus_name").on("keyup",function(){
            var bus_name = $(this).val();
            $(".travel_card").hide().filter(function () {
                var bus = $(this).attr("traveller-name").toUpperCase();
                return bus.indexOf(bus_name.toUpperCase()) != -1;
            }).show();
        });


    }
</script>