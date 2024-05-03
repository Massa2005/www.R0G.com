$(document).ready(function () {

  $.ajax({
    type: "POST", 
    url: "../include/loadtaskfromsession.php", 
    success: function(response) {
      console.log(response)
      jsonTask = JSON.parse(response);
      document.getElementById('titolo').innerHTML = jsonTask[0].nome
      document.getElementById("content").innerHTML = jsonTask[0].descrizione
    },
  });
  var editor = ace.edit("editor");
  editor.session.setMode("ace/mode/javascript");
  editor.setTheme("ace/theme/twilight");
  editor.setOptions({
    fontSize: "11pt",
    maxLines: 51,
    minLines: 51
  });
  console.log(editor.getSession().getDocument().getLength())
  var resize = document.querySelector("#resize");
  var left = document.querySelector(".left");
  var container = document.querySelector(".container");
  var moveX =
  left.getBoundingClientRect().width +
  resize.getBoundingClientRect().width / 2;

  let style = window.getComputedStyle(document.querySelector('.ace_gutter'));
  let gutterColor = style.background;
  console.log(style);
  let divInFondo = document.getElementById('divInFondo');
      if (divInFondo) {
          divInFondo.style.backgroundColor = gutterColor;
          }

  $('#btn-theme').on('click', changeTheme);
  $('#btn-exec').on('click', execute);
  $('#btn-refresh').on('click', refresh);

  function countNewlines(text) {
    return (text.match(/\n/g) || []).length;
  }

  function save(){
    let newlineCount = countNewlines(editor.getValue());
    console.log(newlineCount)
      $.ajax({
          type: "POST",
          url: "../include/savecode.php",
          data: {
          code: editor.getValue()
            },
            success: function(response) {
                var responseData = JSON.parse(response);
                if (responseData.status === 'success') {
                  console.log(editor.getValue());
                } else {
                  console.log(response);
                }
            },
      });
  }

  function load(){
      $.ajax({
          type: "POST",
          url: "../include/loadcode.php",
            success: function(response) {
              var responseData = JSON.parse(response);
              editor.setValue(responseData.code)
              console.log(responseData)
            },
      });
      editor.resize();
  }
  const themes = [
      "ambiance", "chaos", "chrome", "clouds", "clouds_midnight",
      "cobalt", "crimson_editor", "dawn", "dreamweaver", "eclipse",
      "github", "gob", "gruvbox", "idle_fingers", "iplastic",
      "katzenmilch", "kr_theme", "kuroir", "merbivore", "merbivore_soft",
      "mono_industrial", "monokai", "pastel_on_dark", "solarized_dark",
      "solarized_light", "sqlserver", "terminal", "textmate", "tomorrow",
      "tomorrow_night", "tomorrow_night_blue", "tomorrow_night_bright",
      "tomorrow_night_eighties", "twilight", "vibrant_ink", "xcode"
  ];
  
  let index = 0;
  
  function changeTheme() {
      const nextIndex = (index + 1) % themes.length;
      const nextTheme = themes[nextIndex];
      editor.setTheme("ace/theme/" + nextTheme);
      
      setTimeout(() => {
          let style = window.getComputedStyle(document.querySelector('.ace_gutter'));
          let gutterColor = style.backgroundColor;
          console.log(gutterColor);
          document.getElementById('divInFondo').style.backgroundColor = gutterColor;
          document.querySelector('.console-input').style.borderRight = "2px solid " + gutterColor;
      }, 100); // Ritarda di 100 millisecondi, regola questo valore se necessario
  
      index = nextIndex;
  }
  

  function execute() {
      const code = document.querySelector('.ace_text-layer').textContent;
      const input = document.querySelector('#userInput').value;
      if (window.Worker) {
          const myWorker = new Worker('../scripts/worker.js');
        
          myWorker.onmessage = function(e) {
              document.querySelector('#userOutput').value = e.data;
          };
        
          myWorker.onerror = function(e) {
            console.error('Si è verificato un errore nel worker:', e);
          };
          
          myWorker.postMessage([code, input]);
        } else {
          console.log('Il tuo browser non supporta Web Workers.');
        }
      /*
      (function inner() {
          var localVariable = 'This is local';
          eval('console.log(localVariable)'); // Works fine
        })();
    }*/
  }

  function refresh(){
      location.reload();
  }

  var drag = false;
  resize.addEventListener("mousedown", function (e) {
  drag = true;
  moveX = e.x;
  });

  container.addEventListener("mousemove", function (e) {
  moveX = e.x;
  if (drag)
      left.style.width = moveX - resize.getBoundingClientRect().width / 2 + "px";
  });

  container.addEventListener("mouseup", function (e) {
  drag = false;
  });
}); 

