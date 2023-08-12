<div>
    <div class="clear"></div>
    <div class="cart-content-authentication">
        <div class="left">
            <div class="display-customer">
                <img src="{{ asset('img/member-icon-male.png') }}" class="member-icon" />
                <span>{{ auth()->user()->name }}</span>
                <span>{{ auth()->user()->email }}</span>
            </div>
        </div>
        <div class="right">
            <h1>Lokasi Pengantaran</h1>

            <h2>1. Set Lokasi Pengantaran di Peta</h2>
            <p class="note">Pastikan pin lokasi sudah sesuai dengan lokasi pengantaran</p>
            <input type="text" value="" id="search-address" class="search-address"
                placeholder="Search for location or address..." />
            <div class="map-wrapper">
                <div id="display-map" class="map">
                </div>
                <div class="marker">
                    <img src="{{ asset('img/Map-pointer-1x.png') }}"
                        srcset="{{ asset('img/Map-pointer-1x.png') }},
                                    {{ asset('img/Map-pointer-2x.png') }} 2x" />
                </div>
            </div>
            <h2>2. Berikan Alamat Lengkap</h2>
            <p class="note">Tambahkan catatan atau acuan jika perlu (contoh: "di sebelah salon")</p>
            <textarea name="address" cols="40" rows="4" placeholder="Ketik alamat lengkap berserta acuannya"
                maxlength="300" required id="id_address"></textarea>
            <input type="hidden" id="id_latitude" name="latitude" />
            <input type="hidden" id="id_longitude" name="longitude" />
            <div class="clear"></div>
            <button class="button" id="continue" wire:click="submit(livewireData())">Continue</button>
        </div>
    </div>
</div>
</div>
<div class="clear"></div>
</div>
@push('scripts')
<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyA3TVibvaWnS0ZwvVW-m0PAeWKnZIKoZeg&libraries=places'>
</script>
<script>
    const zoom = 12;
    const latElement = document.getElementById('id_latitude');
    const longElement = document.getElementById('id_longitude');
    const idAddress = document.getElementById('id_address');
    const geocoder = new google.maps.Geocoder;
    let map;
    const repeatOrder = false;
    const input = document.getElementById('search-address');
    const nextBtn = document.getElementById('continue');


    if (!repeatOrder) {
        idAddress.disabled = true;
        idAddress.placeholder = 'Mohon set lokasi pengantaran di peta ' +
            'sebelum mengisi alamat pengantaran';
    }

    initAutocomplete(zoom, null, null);

    const updateLatLng = function() {
        const center = map.getCenter();
        latElement.value = center.lat();
        longElement.value = center.lng();

        const latlng = {
            lat: center.lat(),
            lng: center.lng()
        };
        geocodeLatLng(latlng);
    };

    const userNameInput = document.getElementById('id_name');



    // get current latitude and longitude
    const latitude = null;
    const longitude = null;

    // validate current latitude and longitude
    if ((latitude != null) && (longitude != null)) {
        latElement.value = latitude;
        longElement.value = longitude;


        initAutocomplete(16, latitude, longitude);
        updateLatLng();
    }

    function initAutocomplete(_zoom, _latitude, _longitude) {
        _latitude = _latitude ? _latitude : -7.338245;
        _longitude = _longitude ? _longitude : 112.7271303;

        const myLatlng = new google.maps.LatLng(_latitude, _longitude);

        map = new google.maps.Map(document.getElementById('display-map'), {
            center: myLatlng,
            zoom: _zoom,
            mapTypeControl: false, // disabled satelite
            streetViewControl: false, // disabled street view
            disableDefaultUI: false, // disabled all component in UI
            clickableIcons: false, // Disable clicking on landmarks
            fullscreenControl: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
        });

        // Whenever the center map has changed, update lat long after 1s
        let timeoutUpdateLatLng = null;
        map.addListener('dragend', function() {
            if (timeoutUpdateLatLng !== null) {
                clearTimeout(timeoutUpdateLatLng);
            }

            timeoutUpdateLatLng = window.setTimeout(function() {
                updateLatLng();
            }, 1000);
        });

        // Create the search box and link it to the UI element.
        const searchBox = new google.maps.places.Autocomplete(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
            searchBox.setBounds(map.getBounds());
        });

        // Listen for the event fired when the user selects a
        // prediction and retrieve more details for that place.
        searchBox.addListener('place_changed', function(event) {
            const place = searchBox.getPlace();

            if (!place.geometry) {
                return;
            }

            idAddress.removeAttribute('disabled');
            idAddress.value = place.formatted_address;

            // For each place, get the icon, name and location.
            const bounds = new google.maps.LatLngBounds();

            // set current latitude and longitude to its textbox
            latElement.value = place.geometry.location.lat();
            longElement.value = place.geometry.location.lng();

            map.setZoom(14);

            if (place.geometry.viewport) {
                // Only geocodes have viewport.
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }

            map.fitBounds(bounds);

            input.value = '';
        });
    }

    function geocodeLatLng(latlng) {
        geocoder.geocode({
            'location': latlng
        }, function(results, status) {
            if (status == 'OK') {
                if (results[0]) {
                    const formattedAddress = results[0].formatted_address;
                    idAddress.removeAttribute('disabled');
                    idAddress.value = formattedAddress;

                } else {
                    window.alert('No results found');
                }
            } else {
                window.alert('Geocoder failed due to: ' + status);
            }
        });
    }

    input.addEventListener('keydown', function(e) {
        if (e.which == 13) {
            e.preventDefault();
        }
    });

    

    nextBtn.addEventListener('click', function() {
        if (!latElement.value && !longElement.value) {
            alert('Please update delivery location on the map before you continue');
        }
    });

    function livewireData(){
        const latElement = document.getElementById('id_latitude');
        const longElement = document.getElementById('id_longitude');
        const idAddress = document.getElementById('id_address');

        const data = {
            'address': idAddress.value,
            'latitude': latElement.value,
            'longitude': longElement.value,
        } 

        return data;
    }

    
</script>
@endpush