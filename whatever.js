var longitude = 0;
var latitude = 0;
var tempMarker;
var markers;

var customIcons = {
    culture: {
        icon: 'http://labs.google.com/ridefinder/images/mm_20_blue.png'
    },
    buisness: {
        icon: 'http://labs.google.com/ridefinder/images/mm_20_green.png'
    }
};

function load() {
    var map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(59.9112012, 10.736577),
        zoom: 14,
        mapTypeId: 'roadmap'
    });

    
    map.addListener('click', function(e) {
        setTemporaryMarker(e.latLng, map);
        $('#name').val("");
        $('#address').val("");
        $("#info").val("");
        $('#lat').val(e.latLng.lat().toString());
        $('#lng').val(e.latLng.lng().toString());
    });


    function setTemporaryMarker(latLng, xmap) {

        if (tempMarker != null) tempMarker.setMap(null);

        tempMarker = new google.maps.Marker({
            position: latLng,
            map: xmap
        });
    }

    var infoWindow = new google.maps.InfoWindow;

    $('body').on('click', '.edit-button', function(e) {
        console.log(e);
        var index = e.target.name;
        console.log("index: " + index);

        $("#name").val(markers[index]["name"]);
        $("#address").val(markers[index]["address"]);
        $("#info").val(markers[index]["info"]);
        $("#lat").val(markers[index]["lat"]);
        $("#lng").val(markers[index]["lng"]);
        $('select').prop('selectedValue', 0);
        $("#id").val(markers[index]["id"]);

    });

    $('body').on('click', '.delete-button', function(e) {
        console.log(e);
        var index = e.target.name;
        var id = markers[index]["id"];
        console.log(id);
        $.post("deletemarker.php", {
            id: id
        }).done(function(result) {
            console.log(result);
            location.reload();
        });
    });

    downloadUrl("phpsqlajax_genxml.php", function(data) {
        markers = data;

        for (var i = 0; i < markers.length; i++) {
            var name = markers[i]["name"];
            var address = markers[i]["address"];
            var info = markers[i]["info"];
            var type = markers[i]["type"];
            var id = markers[i]["id"];

            var point = new google.maps.LatLng(
                parseFloat(markers[i]["lat"]),
                parseFloat(markers[i]["lng"]));

            var html = "<b>" + name + "</b><br/>" + address + "<br/>" + info + "<br/><br/><div><button class='edit-button' name='" + i + "' id='" + id + "' type=submit>Edit</button></div>" + "<div><button class='delete-button' name='" + i + "' id='" + id + "' type=submit>Delete</button></div>";
            var icon = customIcons[type] || {};
            var marker = new google.maps.Marker({
                map: map,
                position: point,
                icon: icon.icon
            });
            bindInfoWindow(marker, map, infoWindow, html);
        }
    });
}

function bindInfoWindow(marker, map, infoWindow, html) {
    google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
    });
}

function downloadUrl(url, callback) {
    $.ajax({
        url: url,
        beforeSend: function(xhr) {
            xhr.overrideMimeType("application/json;");
        }
    }).done(function(data) {
        callback(data, data.statusCode);
    });
}