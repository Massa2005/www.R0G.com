function formatDoc(cmd, value=null) {
	if(value) {
		document.execCommand(cmd, false, value);
	} else {
		document.execCommand(cmd);
	}
}

$(document).ready(function () {
    document.getElementById('addRowBtn').addEventListener('click', addRow);
    document.getElementById('removeRowBtn').addEventListener('click', removeRow);
  
      let selectedTaskID = '';

      var taskList = document.getElementById('tasklist');
      var newFileBtn = document.getElementById("newFileBtn");
      var overwriteFileBtn = document.getElementById("overwriteFileBtn");
      var modal = document.getElementById("myModal");
      var taskmodal = document.getElementById("tasklistModal");
      var span = document.getElementsByClassName("close")[0];
      var taskspan = document.getElementsByClassName("close-tasklist")[0];
      var warningElement = document.getElementById("warning");
      var taskStatusElement = document.getElementById("taskStatus");

      function addRow() {
        var table = document.getElementById('myTable').getElementsByTagName('tbody')[0];
        var rowCount = table.rows.length;
      
        if (rowCount < 200) {
          var row = table.insertRow();
          var cell0 = row.insertCell(0);
          var cell1 = row.insertCell(1);
          var cell2 = row.insertCell(2);
          cell0.innerHTML = rowCount + 1;
          cell1.innerHTML = '<input type="text" title="input" placeholder="Input">';
          cell2.innerHTML = '<input type="text" title="output" placeholder="Output">';
        } else {
          alert('Hai raggiunto il numero massimo di righe.');
        }
      }

      function removeRow() {
        var table = document.getElementById('myTable').getElementsByTagName('tbody')[0];
        var rowCount = table.rows.length;
      
        if (rowCount > 1) {
          table.deleteRow(rowCount - 1);
        } else {
          alert('Non puoi rimuovere tutte le righe.');
        }
      }

      function addRowsFromJson(jsonData) {
        clearTable();
        var table = document.getElementById('myTable').getElementsByTagName('tbody')[0];
        for (var i = 0; i < jsonData.length; i++) {
            var row = table.insertRow();
            var cell0 = row.insertCell(0);
            var cell1 = row.insertCell(1);
            var cell2 = row.insertCell(2);
            cell0.innerHTML = i + 1;
            cell1.innerHTML = '<input type="text" title="input" placeholder="Input" value="' + jsonData[i].input + '">';
            cell2.innerHTML = '<input type="text" title="output" placeholder="Output" value="' + jsonData[i].output + '">';
        }
    }

      function clearTable() {
        var table = document.getElementById('myTable').getElementsByTagName('tbody')[0];
        while (table.rows.length > 0) {
            table.deleteRow(0);
        }
    }
      document.getElementById('saveBtn').addEventListener('click', function() {
        modal.style.display = "block";
      });

      newFileBtn.onclick = function() {
        modal.style.display = "none";
        
        var inputList = "";
        var outputList = "";
        var titolo = document.querySelector('input[name="nome"]').value.trim();
        var description = document.getElementById("content").innerHTML.trim();

        var table = document.getElementById('myTable');
        var rows = table.querySelectorAll('tbody tr');

        rows.forEach(function(row) {
            var inputField = row.querySelector('input[title="input"]');
            var outputField = row.querySelector('input[title="output"]');

            var inputValue = inputField.value;
            var outputValue = outputField.value;

            inputList += (inputValue + '`');
            outputList += (outputValue + '`');
        });
        let linesIn = countBackticks(inputList);
        let linesOut = countBackticks(outputList);

        if(linesIn != linesOut){
          return;
        }

        $.ajax({
          type: "POST", 
          url: "../include/savenewtask.php", 
          data: {
              descrizione: description,
              nome: titolo,
              inputList: inputList,
              outputList: outputList,
              nlines: linesIn
          },
          success: function(response) {
              console.log(response);
          },
      });
      }   

      document.getElementById('submitBtn').addEventListener('click', function() {
        taskmodal.style.display = "block";
        reloadTaskModal(submit);
        document.getElementById('selectTaskBtn').innerText = 'Submit';
        document.getElementById("warning").removeAttribute("hidden");
        document.getElementById("taskStatus").removeAttribute("hidden");

      });

      overwriteFileBtn.onclick = function() {
        modal.style.display = "none";
        taskmodal.style.display = "block";
        reloadTaskModal(sovrascrivi);
        document.getElementById('selectTaskBtn').innerText = 'Sovrascrivi';
        var warningElement = document.getElementById("warning");
        warningElement.setAttribute("hidden", "hidden");
        var taskStatusElement = document.getElementById("taskStatus");
        taskStatusElement.setAttribute("hidden", "hidden");
      }   
      
      document.getElementById('caricaBtn').addEventListener('click', function() {
        taskmodal.style.display = "block";
        reloadTaskModal(carica);
        document.getElementById('selectTaskBtn').innerText = 'Carica';
        var warningElement = document.getElementById("warning");
        warningElement.setAttribute("hidden", "hidden");
        var taskStatusElement = document.getElementById("taskStatus");
        taskStatusElement.setAttribute("hidden", "hidden");
      });

        document.getElementById('eliminaBtn').addEventListener('click', function() {
          taskmodal.style.display = "block";
          reloadTaskModal(elimina);
          document.getElementById('selectTaskBtn').innerText = 'Elimina';
          var warningElement = document.getElementById("warning");
          warningElement.setAttribute("hidden", "hidden");
          var taskStatusElement = document.getElementById("taskStatus");
          taskStatusElement.setAttribute("hidden", "hidden");
        });

    function sovrascrivi() {
      if (getSelectedTaskID() == '') {
        console.log('Nessun task selezionato');
        return;
      }

    let submitted = false;
    isSubmitted().then(response => {
        console.log(response);
        if (response[0].submit == 1) {
            warningElement.removeAttribute('hidden');
            submitted = true;
        }
        if (!submitted) {
          console.log("Lo sovrascrivo lo stesso")
        var inputList = "";
        var outputList = "";
        var titolo = document.querySelector('input[name="nome"]').value.trim();
        var description = document.getElementById("content").innerHTML.trim();

        var table = document.getElementById('myTable');
        var rows = table.querySelectorAll('tbody tr');

        rows.forEach(function(row) {
            var inputField = row.querySelector('input[title="input"]');
            var outputField = row.querySelector('input[title="output"]');

            var inputValue = inputField.value;
            var outputValue = outputField.value;

            inputList += (inputValue + '`');
            outputList += (outputValue + '`');
        });
        let linesIn = countBackticks(inputList);
        let linesOut = countBackticks(outputList);

        if(linesIn != linesOut){
          return;
        }

        $.ajax({
          type: "POST", 
          url: "../include/overwritetask.php", 
          data: {
              descrizione: description,
              nome: titolo,
              inputList: inputList,
              outputList: outputList,
              nlines: linesIn,
              taskid: selectedTaskID
          },
          success: function(response) {
              console.log(response);
            },
          });
        }
    });
  }

      function carica(){
        if(getSelectedTaskID() == ''){
          console.log('nessun task selezionato');
        } else {
          let jsonTask;
          $.ajax({
            type: "POST", 
            url: "../include/loadtask.php", 
            data: {
                taskid: selectedTaskID
            },
            success: function(response) {
              jsonTask = JSON.parse(response);
              document.querySelector('input[name="nome"]').value = jsonTask[0].nome
              document.getElementById("content").innerHTML = jsonTask[0].descrizione
              addRowsFromJson(jsonTask);
            },
        });
      }
    }

    function submit(){
      if(getSelectedTaskID() == ''){
        console.log('nessun task selezionato');
      } else {
        $.ajax({
          type: "POST", 
          url: "../include/submit_task.php", 
          data: {
              taskid: selectedTaskID
          },
          success: function(response) {
            reloadTaskModal();
              console.log(response);
              },
          });
      }
  }

      function elimina(){
        if(getSelectedTaskID() == ''){
          console.log('nessun task selezionato');
        } else {
          $.ajax({
            type: "POST", 
            url: "../include/deletetask.php", 
            data: {
                taskid: selectedTaskID
            },
            success: function(response) {
              reloadTaskModal();
              document.getElementById('selectTaskBtn').addEventListener('click', elimina);
                console.log(response);
                },
            });
        }
      }

    const content = document.getElementById('content');
    content.addEventListener('mouseenter', function () {
        const a = content.querySelectorAll('a');
        a.forEach(item=> {
            item.addEventListener('mouseenter', function () {
                content.setAttribute('contenteditable', false);
                item.target = '_blank';
            })
            item.addEventListener('mouseleave', function () {
                content.setAttribute('contenteditable', true);
            })
        })
    })

    var resize = document.querySelector("#resize");
    var left = document.querySelector(".left");
    var container = document.querySelector(".container");
    var moveX =
    left.getBoundingClientRect().width +
    resize.getBoundingClientRect().width / 2;

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

span.onclick = function() {
  modal.style.display = "none";
}

taskspan.onclick = function() {
  taskmodal.style.display = "none";
  clearTaskList();
}


window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  } else if (event.target == taskmodal) {
    taskmodal.style.display = "none";
    clearTaskList();
  }
}

function isSubmitted(){
  return $.ajax({
    type: "POST", 
    url: "../include/get_task_from_id.php", 
    data: {
      taskid: selectedTaskID
    }
  });
}
function countBackticks(sentence) {
  var occurrences = sentence.split('`');
  return occurrences.length - 1;
}

function createTaskSquare(task) {
  var taskSquare = document.createElement('div');
  taskSquare.classList.add('task');
  taskSquare.dataset.taskId = task.taskID;
  taskSquare.dataset.submitted = task.submit;
  taskSquare.textContent = task.nome;
  taskSquare.title = task.descrizione;

  if (warningElement && !warningElement.hasAttribute("hidden") && taskStatusElement && !taskStatusElement.hasAttribute("hidden")) {
    taskSquare.addEventListener('click', function() {
      if(taskSquare.dataset.submitted == 1){
        taskStatusElement.innerHTML = "Stato attuale: submitted";
      } else {
        taskStatusElement.innerHTML = "Stato attuale: not submitted";
      }
    });
  }

  taskList.appendChild(taskSquare);
}

function handleClick(event) {
  var selectedTask = event.target;
  if (selectedTask.classList.contains('task')) {
      var allTasks = document.querySelectorAll('.task');
      allTasks.forEach(function(task) {
          task.classList.remove('selected');
      });

      selectedTask.classList.add('selected');
      setSelectedTaskID(selectedTask.dataset.taskId);
      console.log("task selezionato id: " + getSelectedTaskID());
  }
}

document.getElementById('tasklist').addEventListener('click', handleClick);


function clearTaskList() {
  var taskList = document.getElementById('tasklist');
  taskList.innerHTML = '';
  selectedTaskID = "";
  document.getElementById('selectTaskBtn').removeEventListener('click', elimina);
  document.getElementById('selectTaskBtn').removeEventListener('click', carica);
  document.getElementById('selectTaskBtn').removeEventListener('click', sovrascrivi);
  document.getElementById('selectTaskBtn').removeEventListener('click', submit);
  taskStatusElement.innerHTML = "Stato attuale:";
}

function getSelectedTaskID(){
  return selectedTaskID;
}

function setSelectedTaskID(newid){
  selectedTaskID = newid;
}

function reloadTaskModal(action){
  selectedTaskID = "";
  clearTaskList();
  $.ajax({
    type: "POST", 
    url: "../include/get_task.php", 
    success: function(response) {
        response.forEach(createTaskSquare);
      },
  });
  document.getElementById('selectTaskBtn').addEventListener('click', action);
}
}); 