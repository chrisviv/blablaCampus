let autocomplete = document.getElementById("autocomplete-container")
let inputDepart = document.getElementById("inputDepart");


function addressAutocomplete(inputElement, containerElement, callback) {

  /* Active request promise reject function. To be able to cancel the promise when a new request comes */
  var currentPromiseReject;


  /* Current autocomplete items data (GeoJSON.Feature) */
  var currentItems;


  var clearButton = document.createElement("div");
  clearButton.classList.add("clear-button");
  addIcon(clearButton);
  clearButton.addEventListener("click", (e) => {
    e.stopPropagation();
    inputElement.value = '';
    callback(null);
    clearButton.classList.remove("visible");
    closeDropDownList();
  });
  inputElement.parentNode.appendChild(clearButton);

  /* Execute a function when someone writes in the text field: */
  inputElement.addEventListener("input", function (e) {

    /* Close any already open dropdown list */
    closeDropDownList();

    var currentValue = this.value;



    // Cancel previous request promise
    if (currentPromiseReject) {
      currentPromiseReject({
        canceled: true
      });
      clearButton.classList.remove("visible");
    }

    if (!currentValue) {
      return false;
    }

    if (!currentValue) {
      clearButton.classList.remove("visible");
      return false;
    }

    // Show clearButton when there is a text
    clearButton.classList.add("visible");


    /* Create a new promise and send geocoding request */
    var promise = new Promise((resolve, reject) => {
      currentPromiseReject = reject;

      var apiKey = '360b948f27c34be5be832cd8c5e132e9';
      var url = `https://api.geoapify.com/v1/geocode/autocomplete?text=${encodeURIComponent(currentValue)}&lang=fr&filter=countrycode:fr&limit=5&apiKey=${apiKey}`;

      fetch(url)
        .then(response => {
          // check if the call was successful
          if (response.ok) {
            response.json().then(data => resolve(data));
            
          } else {
            response.json().then(data => reject(data));
          }
        });
    });


    promise.then((data) => {
      currentItems = data.features;

      /*create a DIV element that will contain the items (values):*/
      var autocompleteItemsElement = document.createElement("div");
      autocompleteItemsElement.setAttribute("class", "autocomplete-items");
      containerElement.appendChild(autocompleteItemsElement);

      /* For each item in the results */
      data.features.forEach((feature, index) => {
        /* Create a DIV element for each element: */
        var itemElement = document.createElement("DIV");
        /* Set formatted address as item value */
        itemElement.innerHTML = feature.properties.formatted;
        autocompleteItemsElement.appendChild(itemElement);

        /* Set the value for the autocomplete text field and notify: */
        itemElement.addEventListener("click", function (e) {
          inputElement.value = currentItems[index].properties.city;
          callback(currentItems[index]);
          /* Close the list of autocompleted values: */
          closeDropDownList();
        });
        autocompleteItemsElement.appendChild(itemElement);
      });
    }, (err) => {
      if (!err.canceled) {
        console.log(err);
      }
    });
  });

  function closeDropDownList() {
    var autocompleteItemsElement = containerElement.querySelector(".autocomplete-items");
    if (autocompleteItemsElement) {
      containerElement.removeChild(autocompleteItemsElement);
    }
  }

  function addIcon(buttonElement) {
    var svgElement = document.createElementNS("http://www.w3.org/2000/svg", 'svg');
    svgElement.setAttribute('viewBox', "0 0 24 24");
    svgElement.setAttribute('height', "24");

    var iconElement = document.createElementNS("http://www.w3.org/2000/svg", 'path');
    iconElement.setAttribute("d", "M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z");
    iconElement.setAttribute('fill', 'currentColor');
    svgElement.appendChild(iconElement);
    buttonElement.appendChild(svgElement);
  }
}


addressAutocomplete(inputDepart, autocomplete, (data) => {

});

let allez = document.getElementById('allez')
let retour = document.getElementById('retour')


    allez.addEventListener('click', ()=>{
        if (allez.checked == true) {
            retour.checked = false
        }
    })

    retour.addEventListener('click', ()=>{
        if(retour.checked == true){
            allez.checked = false
        }
    })


/* var myAPIKey = '360b948f27c34be5be832cd8c5e132e9' */

/* const map = L.map('map', {zoomControl: false}).setView([48.864716, 2.349014], 12);

  // Retina displays require different mat tiles quality
const isRetina = L.Browser.retina;

const baseUrl = "https://maps.geoapify.com/v1/tile/osm-bright/{z}/{x}/{y}.png?apiKey=" + myAPIKey;
const retinaUrl = "https://maps.geoapify.com/v1/tile/osm-bright/{z}/{x}/{y}@2x.png?apiKey=" + myAPIKey;

  // Add map tiles layer. Set 20 as the maximal zoom and provide map data attribution.
L.tileLayer(isRetina ? retinaUrl : baseUrl, {
    attribution: 'Powered by <a href="https://www.geoapify.com/" target="_blank">Geoapify</a> | <a href="https://openmaptiles.org/" rel="nofollow" target="_blank">(c) OpenMapTiles</a> <a href="https://www.openstreetmap.org/copyright" rel="nofollow" target="_blank">(c) OpenStreetMap</a> contributors',
    apiKey: myAPIKey,
    maxZoom: 20,
    
    id: 'osm-bright'
  }).addTo(map);

  // add a zoom control to bottom-right corner

L.control.zoom({
    position: 'bottomright'
  }).addTo(map); 
 */