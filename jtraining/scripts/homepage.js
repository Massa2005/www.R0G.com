$(document).ready(function() {
  Splitting();
  $.ajax({
    url: '../include/loadleaderboard.php',
    type: 'GET',
    dataType: 'json',
    success: function(response) {
        console.log(response);
        var leaderboardDiv = $('#leaderboard');
        leaderboardDiv.empty(); // Pulisce il contenitore prima di riempirlo nuovamente

        let posizione = 1;
        response.forEach(function(user) {
            var imageUrl = user.picture && user.picture.trim() ? user.picture : 'path_to_default_image.jpg';

            var userDiv = $('<div class="user-entry" data-userid="' + user.coderid + '"></div>');

            var posCol = $('<div class="column pos-col"></div>').text('#' + posizione);
            var imageCol = $('<div class="column image-col"></div>');
            var imageTag = $('<img>').attr('src', imageUrl).attr('alt', 'User Image').css({ width: '50px', height: '50px' });
            imageCol.append(imageTag);
            var nickCol;
            switch (user.effect) {
              case "rainbow-1":
                nickCol = $('<div class="column nick-col"><div class="rainbow-text animated" data-splitting>' + user.nickname + '</div></div>');
              break;
            
              case "rainbow-2":
                nickCol = $('<div class="column nick-col"><div class="rainbow-text animated">' + user.nickname + '</div></div>');
              break;

              default:
                nickCol = $('<div class="column nick-col">' + user.nickname + '</div>');
                break;
            }
            var pointsCol = $('<div class="column points-col"></div>').text(user.points);

            userDiv.append(posCol).append(imageCol).append(nickCol).append(pointsCol);
            leaderboardDiv.append(userDiv);

            posizione++;
        });
        $(document).on('click', '.user-entry', function() {
          var userId = $(this).data('userid');
          window.location.href = 'account.php?id=' + userId;
      });
      Splitting();
    },
});

  $.ajax({
    url: '../include/get_all_submitted_task.php',
    type: 'GET',
    success: function(response) {
        if (response && response.length > 0) {
            response.forEach(function(task) {
              var filledStars = '⭐'.repeat(task.stars); 
              var emptyStars = '☆'.repeat(5 - task.stars); 
              var taskHtml = `
                  <div class="task" data-taskid="${task.taskID}">
                      <p class="task-title">${task.nome}</p>  
                      <p class="task-stars">${filledStars}${emptyStars}</p>
                  </div>
              `;
                $('.Submitted_tasks').append(taskHtml); 
            });
        } else {
            $('.Submitted_tasks').append('<div>No tasks found</div>');
        }
    },
});

$(document).on('click', '.task', function() {
  var taskId = $(this).data('taskid'); 
  $.ajax({
      url: '../include/set_task_id.php', 
      type: 'POST',
      data: { 
        'TaskID': taskId 
      },
      success: function(response) {
        window.location.replace("tasksolver.php");
      },
  });
});

    function loadUserData() {
      $(document).ready(function() {
      fetch('../include/get_user_data.php')
        .then(response => response.json())
        .then(data => {
          setTimeout(() => {
            console.log(data)
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
          }, 1000);
        }) 
      });
    }
loadUserData();

dragElement(document.getElementById("pcontainer"), document.getElementById("Profile__Toolbar"));
dragElement(document.getElementById("scontainer"), document.getElementById("sNotebook__Toolbar"));
dragElement(document.getElementById("ncontainer"), document.getElementById("rNotebook__Toolbar"));
dragElement(document.getElementById("lcontainer"), document.getElementById("lNotebook__Toolbar"));

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