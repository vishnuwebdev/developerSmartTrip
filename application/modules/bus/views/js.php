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
</script>