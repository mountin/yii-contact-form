var placeSearch, autocomplete;
var componentForm = {
    street_number: 'short_name',
    route: 'long_name',
    locality: 'long_name',
    administrative_area_level_1: 'short_name',
    country: 'long_name',
    postal_code: 'short_name',
    sublocality_level_1: 'short_name'
};
var componentIndex = {
    street_number: 'Address_state1',
    route: 'Address_address2',
    administrative_area_level_1: 'Address_state',
    //administrative_area_level_2: 'Address_address2',
    locality:'Address_city',
    postal_code: 'Address_zip',
    sublocality_level_1: 'Address_city'
}

function initAutocomplete() {
    autocomplete = new google.maps.places.Autocomplete(
        /** @type {!HTMLInputElement} */(document.getElementsByClassName('autocomplete')[0]),
        {types: ['geocode']});

    autocomplete.addListener('place_changed', fillInAddress);
}

// [START region_fillform]
function fillInAddress() {

    var place = autocomplete.getPlace();


    console.table(place.address_components);

    for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];


        if(componentIndex[addressType]){
            var val = place.address_components[i][componentForm[addressType]];
            console.log(addressType+'='+val);
            //if(val != null)
            document.getElementById(componentIndex[addressType]).value = val;
        }
    }
}

function geolocate() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
                center: geolocation,
                radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
        });
    }
}
// [END region_geolocation]

function ajaxCheckOrder(form, data, hasError) {
    //console.log('aftervalidate');
    if (!hasError) {
        $.ajax({
            type: "POST",
            url: "?r=address/add&saveData=true",
            data: $("#my-form").serialize(),
            success: function(data) {
                $('#formResult').html('Your information has been saved!');
            }

        });
        return false;
    }

}

$(function(){
    console.log('ready');
    $('#Address_phone').mask('+1(000) 000-0000');
});