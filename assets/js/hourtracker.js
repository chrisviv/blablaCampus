window.onload = () => {
  let placeStart = document.querySelectorAll('.place-start')
  let hourStart = document.querySelectorAll('.hour-start')
  let hourEnd = document.querySelectorAll('.hour-end')
  var apiKey = '360b948f27c34be5be832cd8c5e132e9';
  let arrive = "Lons-le-Saunier"
  let halfPlace = document.querySelectorAll('.half-place')
  let halfPlace2 = document.querySelectorAll('.half-place2')
  let halfPlace3 = document.querySelectorAll('.half-place3')
  let halfHour = document.querySelectorAll('.half-hour')
  let halfHour2 = document.querySelectorAll('.half-hour2')
  let halfHour3 = document.querySelectorAll('.half-hour3')



  function track() {

    for (let i = 0; i < placeStart.length; i++) {

      currentValue = placeStart[i].textContent

      var promise = new Promise((resolve, reject) => {
        currentPromiseReject = reject;

        var url = `https://api.geoapify.com/v1/geocode/autocomplete?text=${encodeURIComponent(currentValue)}&lang=fr&filter=countrycode:fr&limit=5&apiKey=${apiKey}`;

        fetch(url)
          .then(response => {
            if (response.ok) {
              response.json().then(data => resolve(data));


            } else {
              response.json().then(data => reject(data));
            }
          });
      });


      promise.then((data) => {

        let lat = data.features[0].properties.lat;
        let lon = data.features[0].properties.lon;

        latLon(lat, lon, hourEnd[i], hourStart)


      }, (err) => {
        if (!err.canceled) {

        }
      });


      async function latLon(lat, lon, container, add) {

        var url2 = `https://api.geoapify.com/v1/routing?waypoints=${encodeURIComponent(lat)},${encodeURIComponent(lon)}|46.6727037,5.5589973&mode=drive&lang=fr&details=instruction_details&apiKey=${apiKey}`;

        let response = await fetch(url2)
        if (response.ok) {
          const data = await response.json();
          const time = data.features[0].properties.time

          let replace = add[i].textContent.replace(':', '')
          let secondvalue = secondsToHms(time)
        

          let finalValue = parseInt(replace) + parseInt(secondvalue)
          if (finalValue < 1000) {
            finalValue = '0' + finalValue
            
          }
          if (finalValue < 100){
            finalValue = "0" + finalValue
          }
          console.log(finalValue);
         
          let opt1 = finalValue.toString().substring(0, 2)
          let opt2 = finalValue.toString().substring(2, 4)

          if (opt2 >= 60) {
            opt2 = parseInt(opt2) - 60
            opt1 = parseInt(opt1) + 1
            if (opt1 < 10) {
              opt1 = 0 + opt1
            }
            if (parseInt(opt1) == 0){
              opt1 = "00"
             
            }
          }
         

          if (opt2 < 10) {
            opt2 = '0' + opt2
          }
          
          container.textContent = opt1 + ':' + opt2
        }

      }
    }

  }

  track()


  function secondsToHms(d) {
    d = Number(d);
    var h = Math.floor(d / 3600);
    var m = Math.floor(d % 3600 / 60);

    if (m < 10) {
      m = '0' + m

    }
    if (h < 10) {
      h = '0' + h

    }
    return h + m

  }


  function tracking2() {
    for (let i = 0; i < placeStart.length; i++) {


      currentDepart = placeStart[i].textContent

      if (document.body.contains(halfPlace3[i])) {
        etape3 = halfPlace3[i].textContent
        getPlaces(currentDepart, etape3, halfHour3[i], hourStart[i])

      }
      if (document.body.contains(halfPlace2[i])) {
        etape2 = halfPlace2[i].textContent
        getPlaces(currentDepart, etape2, halfHour2[i], hourStart[i])
      }
      if (document.body.contains(halfPlace[i])) {
        etape = halfPlace[i].textContent
        getPlaces(currentDepart, etape, halfHour[i], hourStart[i])

      }

      getPlaces(currentDepart, arrive, hourEnd[i], hourStart[i])
    }


    async function getPlaces(currentDepart, currentEtape, container, start) {
      var urlDepart = `https://api.geoapify.com/v1/geocode/autocomplete?text=${encodeURIComponent(currentDepart)}&lang=fr&filter=countrycode:fr&limit=5&apiKey=${apiKey}`;
      var urlEtape = `https://api.geoapify.com/v1/geocode/autocomplete?text=${encodeURIComponent(currentEtape)}&lang=fr&filter=countrycode:fr&limit=5&apiKey=${apiKey}`;
      let depart = await fetch(urlDepart)
      let etape = await fetch(urlEtape)


      if (depart.ok || etape.ok) {
        const dataDepart = await depart.json()
        const dataEtape = await etape.json()
        var latDepart = dataDepart.features[0].properties.lat
        var lonDepart = dataDepart.features[0].properties.lon
        var latEtape = dataEtape.features[0].properties.lat
        var lonEtape = dataEtape.features[0].properties.lon

        latLon(latDepart, lonDepart, latEtape, lonEtape, container, start);
      }


    }


    async function latLon(lat, lon, lat2, lon2, container, add) {

      var url2 = `https://api.geoapify.com/v1/routing?waypoints=${encodeURIComponent(lat)},${encodeURIComponent(lon)}|${encodeURIComponent(lat2)},${encodeURIComponent(lon2)}&mode=drive&lang=fr&details=instruction_details&apiKey=${apiKey}`;

      let response = await fetch(url2)
      if (response.ok) {
        const data = await response.json();

        const time = data.features[0].properties.time



        let replace = add.textContent.replace(':', '')
        let secondvalue = secondsToHms(time)


        let finalValue = parseInt(replace) + parseInt(secondvalue)

        if (finalValue <= 1000) {
          finalValue = '0' + finalValue

        }
        if (finalValue < 100){
          finalValue = "0" + finalValue
        }
        let opt1 = finalValue.toString().substring(0, 2)
        let opt2 = finalValue.toString().substring(2, 4)
        
        if (opt2 >= 60) {
          opt2 = parseInt(opt2) - 60
          opt1 = parseInt(opt1) + 1
          if (opt1 < 10) {
            opt1 = '0' + opt1
          }

        }
        if (opt2 < 10) {
          opt2 = '0' + opt2
        }

        container.textContent = opt1 + ':' + opt2
        
      }
    }
  }

  tracking2()
}