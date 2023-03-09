

function enterUserName(){
    username = $("#username").val();
    user_id = '';
    

    $.ajax({
        type: "POST",
        url: "/api/?path=user",
        data: JSON.stringify({'UserName': username}),
        dataType: 'json',
        success: function(data){
            user_id = data.UserID;
            startNewGame(user_id);
            $('#new_game').hide();
            
        }
    });
}

function startNewGame(user_id){
    game_id = '';

    $.ajax({
        type: "POST",
        url: "/api/?path=game",
        data: JSON.stringify({'UserID': user_id}),
        dataType: 'json',
        success: function(data){
            $('#board').show();
            game_id = data.GameID;
            watchMove(game_id);
        }
    });
}

function watchMove(game_id){
    $(".cell").each(function(index){
        $(this).click(()=>makeMove($(this), index, game_id));
    })
}

function makeMove(cell, index, game_id){
    column = index % 3;
    row = Math.floor(index / 3);

    $.ajax({
        type: "POST",
        url: "/api/?path=game/move&GameID=" + game_id,
        data: JSON.stringify({'Row': row, 'Column': column}),
        dataType: 'json',
        success: function(data){
            if(data.x_or_0){
                cell.append(data.x_or_0);
                winner = calculateWinner($(".cell"));
                if(winner){
                    $('#board').hide();
                    $('#winningMessage').show();
                    $('#winningMessageText').append(winner + "'s has won!");
                }
            }
        }
    });

}

function calculateWinner(cell) {
    const lines = [
      [0, 1, 2],
      [3, 4, 5],
      [6, 7, 8],
      [0, 3, 6],
      [1, 4, 7],
      [2, 5, 8],
      [0, 4, 8],
      [2, 4, 6]
    ];
    for (let i = 0; i < lines.length; i++) {
      const [a, b, c] = lines[i];

      if (cell[a].innerHTML && cell[a].innerHTML === cell[b].innerHTML && cell[a].innerHTML === cell[c].innerHTML) {
        return cell[a].innerHTML;
      }
    }
    return null;
  }


function reloadPage(){
    location.reload();    
}

