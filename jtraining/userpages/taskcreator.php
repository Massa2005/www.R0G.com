<!DOCTYPE html>
<html lang="en">
<head>
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../scripts/creator.js"></script>  
	<link rel="stylesheet" href="../css/taskcreator.css">
	<title>Task Creator</title>
</head>
<body>
<?php include '../include/navbar.php' ?>
	<div id="myModal" class="modal">
		<div class="modal-content">
			<span class="close">&times;</span>
			<p><b>Vuoi creare un nuovo task o sovrascriverne uno esistente?</b></p>
			<button id="newFileBtn">Nuovo Task</button>
			<button id="overwriteFileBtn">Sovrascrivi Task</button>
		</div>
	</div>
	<div id="tasklistModal" class="modal">
		<div class="modal-content">
			<span class="close-tasklist">&times;</span>
			<h2>Lista dei Task</h2>
			<div id="tasklist"></div>
			<h3 id="warning" hidden="hidden">Se submitti un task, non potrai più modificarlo</h3>
			<h2 id="taskStatus" hidden="hidden">Stato attuale:</h2>
			<button id="selectTaskBtn">Seleziona</button>
		</div>
	</div>
<div class="container">
<div class="left">
	<div class="context">
		<p id="titolo">Titolo: <input name="nome" cols="30" rows="1" autocomplete="off" placeholder="Dai un titolo al tuo task"></input></p>
		<div class="toolbar">
			<div class="head">
				<select onchange="formatDoc('fontSize', this.value); this.selectedIndex=0;">
					<option value="" selected="" hidden="" disabled="">Font size</option>
					<option value="1">Extra small</option>
					<option value="2">Small</option>
					<option value="3">Regular</option>
					<option value="4">Medium</option>
					<option value="5">Large</option>
					<option value="6">Extra Large</option>
					<option value="7">Big</option>
				</select>
				<div class="color">
					<span>Color</span>
					<input type="color" oninput="formatDoc('foreColor', this.value); this.value='#000000';">
				</div>
			</div>
			<div class="btn-toolbar">
				<button onclick="formatDoc('undo')"><i class='bx bx-undo' ></i></button>
				<button onclick="formatDoc('redo')"><i class='bx bx-redo' ></i></button>
				<button onclick="formatDoc('bold')"><i class='bx bx-bold'></i></button>
				<button onclick="formatDoc('underline')"><i class='bx bx-underline' ></i></button>
				<button onclick="formatDoc('italic')"><i class='bx bx-italic' ></i></button>
				<button onclick="formatDoc('justifyLeft')"><i class='bx bx-align-left' ></i></button>
				<button onclick="formatDoc('justifyCenter')"><i class='bx bx-align-middle' ></i></button>
				<button onclick="formatDoc('justifyRight')"><i class='bx bx-align-right' ></i></button>
				<button onclick="formatDoc('insertOrderedList')"><i class='bx bx-list-ol' ></i></button>
				<button onclick="formatDoc('insertUnorderedList')"><i class='bx bx-list-ul' ></i></button>
			</div>
		</div>
		<div id="content" contenteditable="true" spellcheck="false">
			Spiegaci il tuo task!
		</div>
	</div>
</div>
<div class="resize" id="resize"></div>
    <div class="right">
        <div id="tablelimit">
        <table id="myTable">
        <thead>
            <tr>
            <th>#</th>
            <th>Input</th>
            <th>Output</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td>1</td>
            <td><input type="text" title="input" placeholder="Input"></td>
			<td><input type="text" title="output" placeholder="Output"></td>
            </tr>
			<tr>
            <td>2</td>
            <td><input type="text" title="input" placeholder="Input"></td>
			<td><input type="text" title="output" placeholder="Output"></td>
            </tr>
        </tbody>
        </table>
        </div>
        <div id="addRowContainer">
            <button id="addRowBtn"><img src="../images/plus-modified.png" alt="Add" class="btn-img"><b>Aggiungi riga</b></button>
            <button id="removeRowBtn"><img src="../images/minus-modified.png" alt="Rimuovi" class="btn-img"><b>Rimuovi riga</b></button>
			<button id="saveBtn"><img src="../images/save-modified.png" alt="Salva" class="btn-img"><b>Salva task</b></button>
			<button id="caricaBtn"><img src="../images/download-modified.png" alt="Scarica" class="btn-img"><b>Carica task</b></button>
			<button id="eliminaBtn"><img src="../images/trashcan.png" alt="Elimina" class="btn-img"><b>Elimina task</b></button>
            <button id="submitBtn"><img src="../images/upload-modified.png" alt="Submit" class="btn-img"><b>Submit</b></button>
        </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>