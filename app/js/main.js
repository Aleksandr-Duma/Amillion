
let myMap;

ymaps.ready(init);
    function init(){
     	myMap = new ymaps.Map("map", {
        center: [43.23761921392348,76.89491958200068],
        zoom: 17
    });

    let placemark = new ymaps.Placemark([43.238201481481376,76.89550387829644], {}, {
    	iconLayout: 'default#image',
    	iconImageHref: 'img/placeholder.png',
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
//...................E-mail Ajax Send...................

    $("form").submit(function() { //Change
        var th = $(this);
        $.ajax({
            type: "POST",
            url: "mail.php", //Change
            data: th.serialize()
        }).done(function() {
            window.location.href = 'thxpage.html';
            setTimeout(function() {
                // Done Functions
                th.trigger("reset");
            }, 1000);
        });
        return false;
    });
});