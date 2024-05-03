$(document).ready(function() {
    let logged = "not logged";
    document.querySelector('#container').style.display = 'none';
    document.querySelector('#ncontainer').style.display = 'none';
    document.querySelector('#pcontainer').style.display = 'none';
    document.querySelector('.Prompt__error').style.display = 'none';
    document.querySelector('.Prompt__success').style.display = 'none';
    document.querySelector('.profile-banner-container').style.display = 'profile-banner-container';
    setTimeout(function() {
        jQuery('#loading').fadeOut("slow");
        jQuery('#container').fadeIn("slow");
        jQuery('#ncontainer').fadeIn("slow");
        jQuery('#pcontainer').fadeIn("slow");
        document.querySelector('#container').style.display = 'flex';
        document.querySelector('#ncontainer').style.display = 'flex';
        document.querySelector('#pcontainer').style.display = 'flex';
    }, 1000);

    function loadUserData() {
      $(document).ready(function() {
      fetch('include/get_user_data.php')
        .then(response => response.json())
        .then(data => {
          setTimeout(() => {
            console.log(data);
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
              switch (data.effect) {
                case "rainbow-1":
                  document.querySelector('.Profile__nick').classList.add('rainbow-text', 'animated');
                  document.querySelector('.Profile__nick').setAttribute('data-splitting', '');
                  Splitting();
                break;
              
                case "rainbow-2":
                  document.querySelector('.Profile__nick').classList.add('rainbow-text', 'animated');
                break;

                default:
                  document.querySelector('.Profile__nick').classList.remove('rainbow-text', 'animated');
                break;
              }
            }
          }, 1000);
        })
        .catch(error => console.error('Error:', error));
      });
    }
loadUserData();


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
      if(arr.length-1 != 2){
        errore("numero inconsistente di argomenti");
        break;
      } 
      $.ajax({
        type: "POST",
        url: "include/login.php",
        data: {
            username: arr[1],
            password: arr[2]
        },
        success: function(response) {
            var responseData = JSON.parse(response);
            if (responseData.status === 'success') {
              loadUserData();
              successo("Login riuscito!");
            } else {
                errore("username e/o password errati");
            }
        },
    });
      break;

    case "register":
      if(arr.length-1 != 2){
        errore("numero inconsistente di argomenti");
        break;
      } 
      $.ajax({
        type: "POST",
        url: "include/register.php",
        data: {
            username: arr[1],
            password: arr[2]
        },
        success: function(response) {
            var responseData = JSON.parse(response);
            if (responseData.status === 'success') {
                loadUserData();
                successo("Registrazione riuscita!");
            } else {
              console.log(response);
                errore(responseData);
            }
        },
    });
      break;

    case "logout":
      $.ajax({
        type: "POST",
        url: "include/logout.php",
        success: function(response) {
            var responseData = JSON.parse(response);
            if (responseData.status === 'success') {
                loadUserData();
                successo("Logout eseguito");
            } else {
              console.log(response);
                errore(responseData);
            }
        },
    });
      break;

    case "setpropic":
      if(arr.length!=2){
        errore("numero inconsistente di argomenti");
      } else if(logged == "not logged"){
        errore("per fare questa azione devi essere loggato");
      } else {
        $.ajax({
          type: "POST",
          url: "include/setpropic.php",
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
          url: "include/setbanner.php",
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
      if(arr.length!=3){
        errore("numero inconsistente di argomenti");
      } else if(logged == "not logged"){
        errore("per fare questa azione devi essere loggato");
      } else {
        $.ajax({
          type: "POST",
          url: "include/changepass.php",
          data: {
            oldPassword: arr[1],
            newPassword: arr[2]
          },
          success: function(response) {
              var responseData = JSON.parse(response);
              if (responseData.status === 'success') {
                  loadUserData();
                  successo("password cambiata correttamente");
                } else {
                  console.log(response);
                    errore(responseData);
                }
            },
        });
        }
        break;

    case "sandbox":
      if(logged == "not logged"){
        errore("per fare questa azione devi essere loggato");
      } else {
        window.location.replace("userpages/sandbox.php");
      }
      break;

    case "taskcreator":
        if(logged == "not logged"){
          errore("per fare questa azione devi essere loggato");
        } else {
          window.location.replace("userpages/taskcreator.php");
        }
        break;

    case "homepage":
        if(logged == "not logged"){
          errore("per fare questa azione devi essere loggato");
        } else {
          window.location.replace("userpages/homepage.php");
        }
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

dragElement(document.getElementById("container"), document.getElementById("Terminal__Toolbar"));
dragElement(document.getElementById("ncontainer"), document.getElementById("Notebook__Toolbar"));
dragElement(document.getElementById("pcontainer"), document.getElementById("Profile__Toolbar"));

function dragElement(elmnt , elmnthd) {
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  if (document.getElementById(elmnt.id)) {
    /* if present, the header is where you move the DIV from:*/
    document.getElementById(elmnthd.id).onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
    console.log("down");
    e = e || window.event;
    e.preventDefault();
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }

  function closeDragElement() {
    /* stop moving when mouse button is released:*/
    document.onmouseup = null;
    document.onmousemove = null;
  }

  $(".draggable").mousedown(function(){
    // Incrementa z-index quando il div viene trascinato
    var highestZIndex = 0;
    $(".draggable").each(function(){
        var zIndex = parseInt($(this).css("z-index"));
        if(zIndex > highestZIndex) {
            highestZIndex = zIndex;
        }
    });
    $(this).css("z-index", highestZIndex + 1);
});

$(".draggable").mouseup(function(){
    // Rimani sopra se non viene cliccato un altro div
    $(this).off("mousedown");
    $(this).mousedown(function(){
        var highestZIndex = 0;
        $(".draggable").each(function(){
            var zIndex = parseInt($(this).css("z-index"));
            if(zIndex > highestZIndex) {
                highestZIndex = zIndex;
            }
        });
        $(this).css("z-index", highestZIndex + 1);
    });
});
}
});