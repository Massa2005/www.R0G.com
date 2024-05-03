<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.32.5/ace.js" integrity="sha512-VSXv1IpWmRvbc/CVHfjLtq2oUgwXiGp4E3rMaUbXjXKizz2tDpH1X8Wr4l5ipPTtotlrSxGrsn+yyWoT2qsYUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="../scripts/tasksolver.js"></script>
  
  <link rel="stylesheet" href="../css/tasksolver.css">
  <title>Editor</title>
</head>
<body>
<p id="hiddenText">Usa il dispositivo in orizzontale o ingrandisci la finestra</p> 
<?php include '../include/navbar.php' ?>
<div class="container">
   <div class="left">
   		<p id="titolo">Titolo</p>
		<div id="content" spellcheck="false"></div>
   </div>
   <div class="resize" id="resize"></div>
   <div class="right">
      <div class="code-container">
         <pre id="editor">/*Benvenuto nella sandbox di JTraining!
Qua puoi provare a scrivere codice liberamente, testare algoritmi e fare pratica con le strutture dati
Quando sei pronto torna alla homepage e consulta la lista dei task :)
Ricorda che, per ora, refreshando la pagina perderai tutto il codice*/
let a = getInput();
a;</pre>
      </div>
      </div>
      <div id="divInFondo">
         <button id="btn-theme"><img src="../images/icons8-theme-64.png" alt="Tema" class="btn-img"><b>Tema</b></button>
         <button id="btn-exec"><img src="../images/icons8-play-64.png" alt="Esegui" class="btn-img"><b>Esegui</b></button>
         <button id="btn-refresh"><img src="../images/icons8-refresh-50.png" alt="Refresh" class="btn-img"><b>Refresh</b></button>
         <div class="console-line">JTRAINING - SANDBOX</div>
      </div>
   </div>
</div>
</div>
</body>
</html>
