var lat;
var lng;
var latlng = new google.maps.LatLng(-34.60317042715438, -58.375210762023926);
var mapOptions = {
    center: latlng,
    zoom: 15,
    mapTypeId: google.maps.MapTypeId.ROADMAP
};

function initialize() {
    var map = new google.maps.Map(document.getElementById("map_container"),mapOptions);

    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        draggable: true,
        visible:false
    });

    var infowindow = new google.maps.InfoWindow();

    var geocoder = new google.maps.Geocoder();

    google.maps.event.addListener(map, 'click', function(a) {
        marker.setPosition(a.latLng);
        marker.setVisible(true);  
        map.setZoom(16);
        getAddress(a.latLng);
        guardarLatLng(marker);
    });

    google.maps.event.addListener(marker, 'dragend', function(a){
        marker.setPosition(a.latLng);
        map.setZoom(16);
        getAddress(a.latLng);
        guardarLatLng(marker);
    });

    google.maps.event.addListenerOnce(map, 'idle', function(){        
        var l = $('body').data("lat");
        var lt = $('body').data("lng");
        var ltlg;
        if (l == 0.000000){            
            return true;
        }else{
            ltlg = new google.maps.LatLng(l,lt);
        }
        marker.setPosition(ltlg);        
        map.setZoom(16);
        marker.setVisible(true);
        map.setCenter(ltlg);
        getAddress(ltlg);
        guardarLatLng(marker);
    });

    function getAddress(loc){
        geocoder.geocode({'latLng': loc}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            if (results[0]) {
                //alert(results[0].formatted_address)           
                infowindow.setContent(results[0].formatted_address);
                infowindow.open(map, marker);
            }
          } else {
            alert("Geocoder failed due to: " + status);
          }
        });
    }
}

function guardarLatLng(marker){
    var markerLatLng = marker.getPosition();
    lat = markerLatLng.lat();
    lng = markerLatLng.lng();
    //alert(lat);
    $('body').data("lat",lat);
    $('body').data("lng",lng);
}