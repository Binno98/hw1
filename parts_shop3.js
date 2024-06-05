function saveComponent(price, searchingBike, itemTitle) {
  console.log("Salvataggio");

  const formData = new FormData();
  formData.append('component_name', itemTitle);
  formData.append('model', searchingBike);
  formData.append('price', price);

  fetch("add_to_cart.php", {method: 'post', body: formData})
    .then(handleResponse)
    .catch(handleError);
}

function handleResponse(response) {
  if (response.ok) {
    return response.json().then(databaseResponse);
  } else {
    throw new Error("Errore durante la richiesta: " + response.status);
  }
}

function handleError(error) {
  console.error("Si è verificato un errore:", error);
  alert("Per salvare nel carrello devi prima fare l'accesso");
}

function databaseResponse(json) {
  if (json.ok) {
    alert('Componente aggiunto al carrello con successo!');
  } else {
    throw new Error("Errore nel salvataggio del componente.");
  }
}


  
function onJson(json, parts, searchingBike, retry) {
    console.log(json[0]);
  
    if (!json[0] && !retry) {
      const modifiedBikeName = searchingBike.charAt(0) + " " + searchingBike.slice(1); 
      search(modifiedBikeName, parts, true);
      return;
    }
    
    var itemTitle;
    const existingItemTitle = document.querySelector('.itemTitle');
    const existingItemContainer = document.querySelector('.itemContainer');
    const existingPrice = document.querySelector('.price');
    const existingCartImage = document.querySelector('.cart');
  
    if (existingItemContainer) {
      existingItemContainer.removeChild(existingItemTitle);
      existingItemContainer.removeChild(existingPartPhoto);
      existingItemContainer.removeChild(existingPrice);
      existingItemContainer.removeChild(existingCartImage);
      modalView.removeChild(existingItemContainer);
    }
  
    var price = document.createElement('div');
    const itemContainer = document.createElement('div');
    itemTitle = document.createElement('div');
    var cart = document.createElement('img');
    cart.src='cart.jpg';
  
    itemTitle.className = 'itemTitle';
    price.className = 'price';
    cart.id='cart';
    itemContainer.className = 'itemContainer';
  
  
    if (json[0]) {
      switch (parts) {
          case 'engine':
              itemTitle.textContent = 'Engine: ' + (json[0].engine || 'generic engine');
              price.textContent = (Math.floor(Math.random() * (1800 - 200 + 1)) + 200).toFixed(2) + ' €';
              break;
          case 'starter':
              itemTitle.textContent = 'Starter: ' + (json[0].starter || 'generic starter');
              price.textContent = (Math.floor(Math.random() * (150 - 80 + 1)) + 80).toFixed(2) + ' €';
              break;
          case 'fuel control':
              itemTitle.textContent = 'Fuel Control: ' + (json[0]['fuel control'] || 'generic fuel control');
              price.textContent = (Math.floor(Math.random() * (70 - 40 + 1)) + 40).toFixed(2) + ' €';
              break;
          case 'fuel system':
              itemTitle.textContent = 'Fuel System: ' + (json[0]['fuel system'] || 'generic fuel system');
              price.textContent = (Math.floor(Math.random() * (180 - 100 + 1)) + 100).toFixed(2) + ' €';
              break;
          case 'cooling':
              itemTitle.textContent = 'Cooling: ' + (json[0].cooling || 'generic cooling');
              price.textContent = (Math.floor(Math.random() * (1000 - 600 + 1)) + 600).toFixed(2) + ' €';
              break;
          case 'rear brakes':
              itemTitle.textContent = 'Rear Brakes: ' + (json[0]['rear brakes'] || 'generic rear brakes');
              price.textContent = (Math.floor(Math.random() * (500 - 200 + 1)) + 200).toFixed(2) + ' €';
              break;
          case 'clutch':
              itemTitle.textContent = 'Clutch: ' + (json[0].clutch || 'generic clutch');
              price.textContent = (Math.floor(Math.random() * (1800 - 200 + 1)) + 200).toFixed(2) + ' €';
              break;
          case 'gearbox':
              itemTitle.textContent = 'Gearbox: ' + (json[0].gearbox || 'generic gearbox');
              price.textContent = (Math.floor(Math.random() * (1800 - 500 + 1)) + 500).toFixed(2) + ' €';
              break;
          case 'rear suspension':
              itemTitle.textContent = 'Rear Suspension: ' + (json[0]['rear suspension'] || 'generic rear suspension');
              price.textContent = (Math.floor(Math.random() * (1000 - 300 + 1)) + 300).toFixed(2) + ' €';
              break;
          case 'lubrification':
              itemTitle.textContent = 'Lubrification: ' + (json[0].lubrification || 'generic lubrification');
              price.textContent = (Math.floor(Math.random() * (600 - 200 + 1)) + 200).toFixed(2) + ' €';
              break;
          case 'transmission':
              itemTitle.textContent = 'Transmission: ' + (json[0].transmission || 'generic transmission');
              price.textContent = (Math.floor(Math.random() * (1800 - 200 + 1)) + 200).toFixed(2) + ' €';
              break;
          case 'front brakes':
              itemTitle.textContent = 'Front Brakes: ' + (json[0]['front brakes'] || 'generic front brakes');
              price.textContent = (Math.floor(Math.random() * (800 - 200 + 1)) + 200).toFixed(2) + ' €';
              break;
          case 'frame':
              itemTitle.textContent = 'Frame: ' + (json[0].frame || 'generic frame');
              price.textContent = (Math.floor(Math.random() * (2800 - 1100 + 1)) + 1000).toFixed(2) + ' €';
              break;
          default:
              itemTitle.textContent = 'generic part';
              price.textContent = (Math.floor(Math.random() * (1800 - 200 + 1)) + 200).toFixed(2) + ' €';
      }
  } else {
      itemTitle.textContent = 'generic part';
      price.textContent = (Math.floor(Math.random() * (1800 - 200 + 1)) + 200).toFixed(2) + ' €';
  }
  
  modalView.appendChild(itemContainer);
  itemContainer.appendChild(price);
  itemContainer.appendChild(cart);
  itemContainer.appendChild(itemTitle);
  
  cart.addEventListener('click', function(){
      saveComponent(price.textContent, searchingBike, itemTitle.textContent);
  });
  

  }
  

function onResponse(response) {
    console.log('Risposta ricevuta');
    return response.json();
  }


  
  function search(searchingBike, parts, retry = false) {
    fetch("https://api.api-ninjas.com/v1/motorcycles?make=bmw&model=" + searchingBike,
      {
        method: "get",
        headers: { 'X-Api-Key': '6/+a4+78OLLOtx5s/U3gxw==TEwV8HzoGs4swCMS' },
        contentType: 'application/json',
      }).then(onResponse).then(json => onJson(json, parts, searchingBike, retry));
  }
  
  
function PartImageOpen(index) {
    return function () {
      const new_image = document.createElement('img');
      new_image.id = "part_modal";
      const exit = document.createElement('img');
      exit.id = 'modal_exit_button';
      exit.src = 'x-png-35392.png';
      modalView.appendChild(exit);
      exit.addEventListener('click', onModalExitClick);
  
      new_image.src = PARTS_PHOTO_LIST[index];
      document.body.classList.add('no-scroll');
      new_image.removeEventListener('click', PartImageOpen);
      modalView.style.top = window.scroll + 'px';
      modalView.appendChild(new_image);
      modalView.classList.remove('hidden');
      
      console.log(bikeModel);
      const partName = PARTS_PHOTO_LIST[index].replace('.jpg', '').replace('_', ' ');
    
      search(bikeModel, partName); 
    }
}



  
  function onModalExitClick() {
    document.body.classList.remove('no-scroll');
    modalView.classList.add('hidden');
    modalView.innerHTML = '';
  }

const items = document.querySelectorAll('.item-row');
const modalView = document.querySelector('#modal-view');

for (let i = 0; i < items.length; i++) {
  items[i].addEventListener('click', PartImageOpen(i));
}
