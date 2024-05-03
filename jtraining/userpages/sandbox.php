<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.32.5/ace.js" integrity="sha512-VSXv1IpWmRvbc/CVHfjLtq2oUgwXiGp4E3rMaUbXjXKizz2tDpH1X8Wr4l5ipPTtotlrSxGrsn+yyWoT2qsYUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="../scripts/coding.js"></script>
  
  <link rel="stylesheet" href="../css/sandbox.css">
  <title>Editor</title>
</head>
<body>
<p id="hiddenText">Usa il dispositivo in orizzontale o ingrandisci la finestra</p> 
<div id="superContainer">
<?php include '../include/navbar.php' ?>
<div class="container">
   <div class="left">
      <div class="gruppo">
         <a href="#"><b>ISTRUZIONI BASE</b></a>
         <div class="button button-4">
            <div class="underline"></div>
            <a href="#">VARIABILI</a>
         </div>

         <div class="button button-4">
            <div class="underline"></div>
            <a href="#">ARRAY</a>
         </div>
         <div class="button button-4">
            <div class="underline"></div>
            <a href="#">GRAFI</a>
         </div>
         <div class="button button-4">
            <div class="underline"></div>
            <a href="#">FUNZIONI</a>
         </div>
      </div>
      
      <div class="gruppo">
         <a href="#"><b>INTRODUZIONE AI CICLI</b></a>
         <div class="button button-4">
            <div class="underline"></div>
            <a href="#">CICLO FOR</a>
         </div>
         <div class="button button-4">
            <div class="underline"></div>
            <a href="#">CICLO WHILE</a>
         </div>

         <div class="button button-4">
            <div class="underline"></div>
            <a href="#">CICLO DO-WHILE</a>
         </div>
      </div>

      <div class="gruppo">
         <a href="#"><b>ALGORITMI DI RICERCA</b></a>
         <div class="button button-4">
            <div class="underline"></div>
            <a href="#">LINEAR SEARCH</a>
         </div>

         <div class="button button-4">
            <div class="underline"></div>
            <a href="#">BINARY SEARCH</a>
         </div>

         <div class="button button-4">
            <div class="underline"></div>
            <a href="#">DEPTH FIRST SEARCH</a>
         </div>
      </div>

      <div class="gruppo">
      <a href="#"><b>ALGORITMI DI ORDINAMENTO</b></a>
      <div class="button button-4">
         <div class="underline"></div>
         <a href="#">QUICKSORT</a>
         </div>

         <div class="button button-4">
         <div class="underline"></div>
         <a href="#">BUBBLESORT</a>
         </div>

         <div class="button button-4">
         <div class="underline"></div>
         <a href="#">MERGESORT</a>
         </div>
      </div>

      <div class="gruppo">
         <a href="#"><b>TECNICHE RICORSIVE</b></a>
         <div class="button button-4">
            <div class="underline"></div>
            <a href="#">RICORSIONE</a>
         </div>

         <div class="button button-4">
            <div class="underline"></div>
            <a href="#">BACKTRACKING</a>
         </div>

         <div class="button button-4">
            <div class="underline"></div>
            <a href="#">PROGRAMMAZIONE DINAMICA</a>
         </div>
      </div>
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
      <div class="console-container">
    <div class="console-content">
        <div class="console-input">
            <p>INPUT</p>
            <textarea id="userInput" placeholder="Inserisci qui il tuo input"></textarea>
        </div>
        <div class="console-output">
            <p>OUTPUT</p>
            <textarea id="userOutput" placeholder="Qui verrà visualizzato l'output" readonly></textarea>
         </div>
      </div>
      </div>
      <div id="divInFondo">
         <button id="btn-theme"><img src="../images/icons8-theme-64.png" alt="Tema" class="btn-img"><b>Tema</b></button>
         <button id="btn-exec"><img src="../images/icons8-play-64.png" alt="Esegui" class="btn-img"><b>Esegui</b></button>
         <button id="btn-refresh"><img src="../images/icons8-refresh-50.png" alt="Refresh" class="btn-img"><b>Refresh</b></button>
         <button id="btn-save"><img src="../images/save-modified.png" alt="Save" class="btn-img"><b>Salva</b></button>
         <button id="btn-load"><img src="../images/download-modified.png" alt="Carica" class="btn-img"><b>Carica</b></button>
         <div class="console-line">JTRAINING - SANDBOX</div>
      </div>
   </div>
   </div>
</div>
</div>
</body>
</html>
