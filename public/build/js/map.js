/*
Author       : Dreamstechnologies
Template Name: PriGina Global Telemed - Bootstrap Template
Version      : 1.3
*/

google.maps.visualRefresh = true;
var slider, infowindow = null;
var bounds = new google.maps.LatLngBounds();
var map, current = 0;
var locations =[{
	"id":"01",
	"doc_name":"Dr. Michael Brown",
	"speciality":"Psychologist",
	"address":"Minneapolis, MN",
	"lat":53.470692,
	"lng":-2.220328,
	"icons":"default",
	"profile_link":"profile',
	"total_review":"17",
	"image":'build/img/doctor-grid/doctor-grid-01.jpg'
	}, {
		
	"id":"02",
	"doc_name":"Dr. Darren Elder",
	"speciality":"Psychologist",
	"address":"Newyork, USA",
	"lat":53.469189,
	"lng":-2.199262,
	"icons":"default",
	"profile_link":"profile',
	"total_review":"35",
	"image":'build/img/doctors/doctor-02.jpg'
	}, {
	"id":"03",
	"doc_name":"Dr. Deborah Angel",
	"speciality":"Psychologist",
	"address":"Georgia, USA",
	"lat":53.468665,
	"lng":-2.189269,
	"icons":"default",
	"profile_link":"profile',
	"total_review":"27",
	"image":'build/img/doctors/doctor-03.jpg'
	}, {
	"id":"04",
	"doc_name":"Dr. Sofia Brient",
	"speciality":"Psychologist",
	"address":"Louisiana, USA",
	"lat":53.463894,
	"lng":-2.177880,
	"icons":"default",
	"profile_link":"profile',
	"total_review":"4",
	"image":'build/img/doctors/doctor-04.jpg'
	}, {
	"id":"05",
	"doc_name":"Dr. Marvin Campbell",
	"speciality":"Psychologist",
	"address":"Michigan, USA",
	"lat":53.466359,
	"lng":-2.213314,
	"icons":"default",
	"profile_link":"profile',
	"total_review":"66",
	"image":'build/img/doctors/doctor-05.jpg'
	}, {
	"id":"06",
	"doc_name":"Dr. Katharine Berthold",
	"speciality":"Psychologist",
	"address":"Texas, USA",
	"lat":53.463906,
	"lng":-2.213271,
	"icons":"default",
	"profile_link":"profile',
	"total_review":"52",
	"image":'build/img/doctors/doctor-06.jpg'
	}, {
	"id":"07",
	"doc_name":"Dr. Linda Tobin",
	"speciality":"Psychologist",
	"address":"Kansas, USA",
	"lat":53.461974,
	"lng":-2.210661,
	"icons":"default",
	"profile_link":"profile',
	"total_review":"43",
	"image":'build/img/doctors/doctor-07.jpg'
	}, {
	"id":"08",
	"doc_name":"Dr. Paul Richard",
	"speciality":"Psychologist",
	"address":"California, USA",
	"lat":53.458785,
	"lng":-2.188532,
	"icons":"default",
	"profile_link":"profile',
	"total_review":"49",
	"image":'build/img/doctors/doctor-08.jpg'
	}, {
	"id":"09",
	"doc_name":"Dr. John Gibbs",
	"speciality":"Psychologist",
	"address":"Oklahoma, USA",
	"lat":53.4558571,
	"lng":-2.1950372,
	"icons":"default",
	"profile_link":"profile',
	"total_review":"112",
	"image":'build/img/doctors/doctor-09.jpg'
	}, {
	"id":10,
	"doc_name":"Dr. Olga Barlow",
	"speciality":"Psychologist",
	"address":"Montana, USA",
	"lat":53.458850,
	"lng":-2.194549,
	"icons":"default",
	"profile_link":"profile',
	"total_review":"65",
	"image":'build/img/doctors/doctor-10.jpg'
	}, {
	"id":11,
	"doc_name":"Dr. Julia Washington",
	"speciality":"Psychologist",
	"address":"Oklahoma, USA",
	"lat":53.461733,
	"lng":-2.194502,
	"icons":"default",
	"profile_link":"profile',
	"total_review":"5",
	"image":'build/img/doctors/doctor-11.jpg'
	}, {
	"id":12,
	"doc_name":"Dr. Shaun Aponte",
	"speciality":"Psychologist",
	"address":"Indiana, USA",
	"lat":53.460548,
	"lng":-2.190956,
	"icons":"default",
	"profile_link":"profile',
	"total_review":"5",
	"image":'build/img/doctors/doctor-12.jpg'
	}
	];

var icons = {
  'default':'build/img/marker.png'
};

function show() {
    infowindow.close();
  if (!map.slide) {
    return;
  }
    var next, marker;
    if (locations.length == 0 ) {
       return
     } else if (locations.length == 1 ) {
       next = 0;
     }
    if (locations.length >1) {
      do {
        next = Math.floor (Math.random()*locations.length);
      } while (next == current)
    }
    current = next;
    marker = locations[next];
    setInfo(marker);
    infowindow.open(map, marker);
}

function initialize() {
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        zoom: 14,
		center: new google.maps.LatLng(53.470692, -2.220328),
        scrollwheel: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
		
    };
  
     map = new google.maps.Map(document.getElementById('map'), mapOptions);
    map.slide = true;

    setMarkers(map, locations);
    infowindow = new google.maps.InfoWindow({
        content: "loading..."
    });
    google.maps.event.addListener(infowindow, 'closeclick',function(){
       infowindow.close();
    });
    slider = window.setTimeout(show, 3000);
}

function setInfo(marker) {
  var content = 
'<div class="card border-0" style="width: 100%; display: inline-block;">'+
	'<div class="card-body">'+
		'<div class="doc-img d-flex align-items-center">'+
			'<a href="' + marker.profile_link + '" class="avatar flex-shrink-0 me-2 avatar-xl avatar-rounded" tabindex="0" target="_blank">'+
				'<img class="img-fluid" alt="' + marker.doc_name + '" src="' + marker.image + '">'+
			'</a>'+
			'<div>'+
				'<h6 class="title fs-16 mb-1">'+
					'<a href="' + marker.profile_link + '" tabindex="0">' + marker.doc_name + '</a>'+
					'<span class="badge bg-orange mt-1"><i class="fa-solid fa-star me-1"></i>5.0</span>'+
				'</h6>'+
				'<p class="speciality text-indigo">' + marker.speciality + '</p>'+
			'</div>'+
		'</div>'+
		'<div class="pro-content">'+
			'<ul class="available-info">'+
				'<li><i class="fas fa-map-marker-alt"></i> ' + marker.address + ' </li>'+
			'</ul>'+
		'</div>'+
	'</div>'+
'</div>';
  infowindow.setContent(content);
}

function setMarkers(map, markers) {
  for (var i = 0; i < markers.length; i++) {
    var item = markers[i];
    var latlng = new google.maps.LatLng(item.lat, item.lng);
    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        doc_name: item.doc_name,
        address: item.address,
        speciality: item.speciality,
        next_available: item.next_available,
        amount: item.amount,
        profile_link: item.profile_link,
        total_review: item.total_review,
        animation: google.maps.Animation.DROP,
        icon: icons[item.icons],
        image: item.image
        });
        bounds.extend(marker.position);
        markers[i] = marker;
        google.maps.event.addListener(marker, "click", function () {
            setInfo(this);
            infowindow.open(map, this);
            window.clearTimeout(slider);
        });
    }
    map.fitBounds(bounds);
  google.maps.event.addListener(map, 'zoom_changed', function() {
    if (map.zoom > 16) map.slide = false;
  });
}

google.maps.event.addDomListener(window, 'load', initialize);