$(document).ready(function () {
    Splitting();
    $.ajax({
        url: '../include/getglobalrank.php', 
        type: 'GET',
        success: function(response) {
            document.getElementById("global-rank").innerHTML = "#" + response;
        },
    });
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