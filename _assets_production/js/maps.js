var map_sf;
var sanfran = new google.maps.LatLng(37.771125, -122.401663);
var chicago = new google.maps.LatLng(40.6743890, -73.9455);
 
var MY_MAPTYPE_ID = 'custom_style';
 
function initialize() {
 
  var featureOpts_sf = [{stylers: [{ hue: '#0192ce' }, { gamma: 0.5 }, { weight: 0.5 } ]},{featureType: 'water', stylers: [ { color: '#0192ce' } ]];

  var featureOpts_chi = [{stylers: [{ hue: '#0192ce' }, { gamma: 0.5 }, { weight: 0.5 } ]},{featureType: 'water', stylers: [ { color: '#0192ce' } ]];
  
  var mapOptions_sf = {
    zoom: 12,
    center: sanfran,
    mapTypeControlOptions: {
      mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]
    },
    mapTypeId: MY_MAPTYPE_ID
  };
 
  var mapOptions_chi = {
    zoom: 12,
    center: chicago,
    mapTypeControlOptions: {
      mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]
    },
    mapTypeId: MY_MAPTYPE_ID
  };
 
  map_sf = new google.maps.Map(document.getElementById('sanfran-map'),
      mapOptions_sf);
 
  map_chi = new google.maps.Map(document.getElementById('chi-map'),
      mapOptions_chi);
 
  var styledMapOptions_sf = {
    name: 'Custom Style'
  };
 
  var styledMapOptions_chi = {
    name: 'Custom Style'
  };
 
  var customMapType_sf = new google.maps.StyledMapType(featureOpts_sf, styledMapOptions_sf);
  var customMapType_chi = new google.maps.StyledMapType(featureOpts_chi, styledMapOptions_chi);
 
  map_sf.mapTypes.set(MY_MAPTYPE_ID, customMapType_sf);
 
  map_chi.mapTypes.set(MY_MAPTYPE_ID, customMapType_chi);
}
 
google.maps.event.addDomListener(window, 'load', initialize);