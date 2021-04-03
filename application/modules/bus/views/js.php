<script>
    function travel_suggest(inputString,id) {
        $( "#from_travel" ).autocomplete({
            autoFocus: true,	
            minLength : 2,
            source : function(request, response) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url() ?>bus/get_cities",
                    dataType : "json",
                    cache : false,
                    data: {id: inputString,div_id:id},
                    success: function(data){
                        var all_l=[];
                        for(var i=0;i<data.length;i++){
                            var city_name=data[i].airport_city_name; 
                            var air_name=data[i].airport_name; 
                            var air_code=data[i].airport_code;
                            var air_country_code=data[i].airport_country_code; 
                            var air_city_code = data[i].airport_city_code;
                            all_l.push({ "label": city_name+" ("+air_name+"), "+air_code, "value": city_name+" ("+air_name+"), "+air_code, "country": air_country_code,"city": air_city_code } );
                        }
                        response(all_l);
                    }	
                });	  
            },
            select: function(event, ui) {
                $( "#flight_from_country"+id).val(ui.item.country);	
                $( "#flight_from_city"+id).val(ui.item.city);	
                $( ".flight_from_to"+id).focus();	
            },
        });    
    }

    function travel_suggest_to(inputString,id) {
        $( ".flight_from_to"+id ).autocomplete({
            autoFocus: true,	
            minLength : 2,
            source : function(request, response) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url() ?>/front/fetch_city",
                    dataType : "json",
                    cache : false,
                    data: {id: inputString,div_id:id},
                    success: function(data){
                        var all_l=[];
                        for(var i=0;i<data.length;i++){
                            var city_name=data[i].airport_city_name; 
                            var air_name=data[i].airport_name; 
                            var air_code=data[i].airport_code;
                            var air_country_code=data[i].airport_country_code; 
                            var air_city_code = data[i].airport_city_code;
                            all_l.push({ "label": city_name+" ("+air_name+"), "+air_code, "value": city_name+" ("+air_name+"), "+air_code, "country": air_country_code,"city": air_city_code } );
                        }
                        response(all_l);
                    }	
                });	  
            },
            select: function(event, ui) {
                $( "#flight_from_to_country"+id ).val(ui.item.country);	
                $( "#flight_from_to_city"+id ).val(ui.item.city);	
                $( "#depart_date" ).focus();
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
        onClose: function(selectedDate){
            // $("#return_date").datepicker("option", "minDate", selectedDate);
        }
    });
</script>