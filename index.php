<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="styles.css">
  <script src="script.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <title>Tic-tac-toe</title>
</head>
<body>

    <div id="new_game">
        <div>
            <label for="username">Enter your name:</label>
            <input type="text" id="username" name="username">
        </div>
    
        <input type="submit" value="Start new game" onclick="enterUserName()">
    </div>

    <div class="board" id="board" style="display:none">
		<div class="cell" data-cell></div>
		<div class="cell" data-cell></div>
		<div class="cell" data-cell></div>
		<div class="cell" data-cell></div>
		<div class="cell" data-cell></div>
		<div class="cell" data-cell></div>
		<div class="cell" data-cell></div>
		<div class="cell" data-cell></div>
		<div class="cell" data-cell></div>
	</div>
	<div class="winning-message" id="winningMessage" style="display:none">
		<div id="winningMessageText"></div>
		<button id="restartButton" onclick="reloadPage()">Restart</button>
	</div>
</body>

</body>
</html> 