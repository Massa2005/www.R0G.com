$(document).ready(function() {
    let logged = "not logged";
/*
    function loadUserData() {
      $(document).ready(function() {
      fetch('../include/get_user_data.php')
        .then(response => response.json())
        .then(data => {
          setTimeout(() => {
            if(data.status == "notLogged") {
              logged = "not logged";
              document.querySelector('.Profile__text').style.display = 'flex';
              document.querySelector('.profile-banner-container').style.display = 'none';
            } else { 
              logged = "logged";
              document.querySelector('.Profile__text').style.display = 'none';
              document.querySelector('.profile-banner-container').style.display = 'flex';
              document.querySelector('.Profile__nick').textContent = data.nickname;
              document.getElementById('profile-picture').src = data.profileImage;
              document.getElementById('banner-image').src = data.bannerImage;
              
            }
          }, 1000);
        })
        .catch(error => console.error('Error:', error));
      });
    }
loadUserData();
*/

const input = document.getElementById('Prompt__line');

input.addEventListener('input', function() {
    this.style.width = '1px';
    this.style.width = (this.scrollWidth) + 'px'; 
});

function clear(){
  input.value = '';
  input.style.width = '5px';
}

document.getElementById('Prompt__line').addEventListener('keydown', function(event) {
  if (event.key === 'Enter' || event.keyCode === 13) {
      event.preventDefault();
      esegui(input.value);
      clear();
  }
});

function esegui(text){
  text = sanitize(text);
  arr = segmenta(text);
  console.log(arr[0]);
  switch (arr[0]){
    case "login":
        errore("non puoi eseguire il login qua");
        break;

    case "register":
        errore("non puoi eseguire la registrazione qua");
        break;

    case "logout":
        errore("non puoi eseguire il logout qua");
        break;

    case "setpropic":
      if(arr.length!=2){
        errore("numero inconsistente di argomenti");
      } else if(logged == "not logged"){
        errore("per fare questa azione devi essere loggato");
      } else {
        $.ajax({
          type: "POST",
          url: "../include/setpropic.php",
          data: {
            profileImage: arr[1],
          },
          success: function(response) {
              var responseData = JSON.parse(response);
              if (responseData.status === 'success') {
                  loadUserData();
                  successo("immagine cambiata correttamente");
              } else {
                console.log(response);
                  errore(responseData);
              }
          },
      });
      }
      break;

    case "setbanner":
      if(arr.length!=2){
        errore("numero inconsistente di argomenti");
      } else if(logged == "not logged"){
        errore("per fare questa azione devi essere loggato");
      } else {
        $.ajax({
          type: "POST",
          url: "../include/setbanner.php",
          data: {
            bannerImage: arr[1],
          },
          success: function(response) {
              var responseData = JSON.parse(response);
              if (responseData.status === 'success') {
                  loadUserData();
                  successo("banner cambiato correttamente");
                } else {
                  console.log(response);
                    errore(responseData);
                }
            },
        });
        }
        break;

    case "changepass":
        errore("non puoi cambiare password qua");
        break;

    case "sandbox":
        window.location.replace("sandbox.php");
      break;

    case "taskcreator":
        window.location.replace("taskcreator.php");
      break;

    case "index":
        window.location.replace("../index.php");
      break;

    case "homepage":
        window.location.replace("homepage.php");
      break;
        
    default:
      errore("comando non riconosciuto");
  }
}

function segmenta(text){
  const arr = text.split(" ");
  return arr;
}

function sanitize(text){
  text = text.trim();

  const map = {
    '&': '&amp;',
    '<': '&lt;',
    '>': '&gt;',
    '"': '&quot;',
    "'": '&#x27;',
    "/": '&#x2F;',
};
const reg = /[&<>"'/]/ig;
return text.replace(reg, (match) => (map[match]));
}

function errore(text){
  document.querySelector('.Prompt__success').style.display = 'none';
  let field = document.querySelector('.Prompt__error');
  field.textContent = 'Errore: ' + text;
  field.style.display = 'none';
  jQuery('.Prompt__error').fadeIn("slow");
}

function successo(text){
  document.querySelector('.Prompt__error').style.display = 'none';
  let field = document.querySelector('.Prompt__success');
  field.textContent = 'OK: ' + text;
  field.style.display = 'none';
  jQuery('.Prompt__success').fadeIn("slow");
}
});