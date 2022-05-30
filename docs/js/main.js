ymaps.ready(init);
    function init(){
     var myMap = new ymaps.Map("map", {
        center: [43.23739173405009,76.89356774865722],
        zoom: 17
    });

    let placemark = new ymaps.Placemark([43.238201481481376,76.89550387829644], {}, {
    	iconLayout: 'default#image',
    	iconImageHref: '../img/placeholder.png',
    	iconImageSize: [70, 70],
    	iconImageOffset: [-30, -40]
    });

    myMap.controls.remove('geolocationControl');
    myMap.controls.remove('searchControl');
    myMap.controls.remove('trafficControl');
    myMap.controls.remove('typeSelector');
    myMap.controls.remove('fullscreenControl');
    myMap.controls.remove('zoomControl');

    myMap.geoObjects.add(placemark);
}

$(function(){

});