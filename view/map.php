<!--
Do not forget to insert google API key
-->

<div  id="map" style="height: 30em;"></div>
<script>
    function initMap() {
        let element = document.getElementById('map');
        let options = {
            center: {lat: -36.845298, lng: 174.764637},
            zoom: 16,
        };

        let myMap = new google.maps.Map(element, options);

        let marker = new google.maps.Marker({
            position: {lat: -36.845298, lng: 174.764637},
            title: 'Rent with us',
            map: myMap
        });

        let video = new google.maps.InfoWindow({
            content: '<iframe width="500px" height="300px" src="https://www.youtube.com/embed/CObPyy6UsL0" frameborder="0"></iframe>'
        });

        google.maps.event.addListener(marker, 'click', function initialize() {
            video.open(myMap, marker);
        });
    }
</script async defer>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8Xjdl0Ra5k-KEjUdi5iZfD7Wx9779Lp8&callback=initMap" async
        defer></script>