<?php 
function voteWinner($votes){
  $winner = "";
  $new_votes = array_count_values($votes);
  print_r($new_votes);
  foreach($new_votes as $vote => $value) {
    if ($value > $winner) {
      $winner = $vote;
    } else {
      if ($vote > $winner) {
      	 $winner = $vote;
         $winner = $vote;
      }
    }
  }
  return $winner;

}

echo voteWinner(['Glenn', 'Emilly', 'Emilly','Glenn']);

?>
