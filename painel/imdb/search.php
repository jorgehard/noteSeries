<?php
require __DIR__ . "/bootstrap.php";
	
if (!empty($_POST["mid"]) && preg_match('/^[0-9]+$/',$_POST["mid"])) {
  header("Location: movie.php?mid=".$_POST["mid"]);
  return;
}

  $headname = "Filmes/Series";
  $search = new \Imdb\TitleSearch();
  if (@$_POST["searchtype"] == "episode") {
    $results = $search->search($_POST["name"], array(\Imdb\TitleSearch::TV_EPISODE));
  } else {
    $results = $search->search($_POST["name"]);
  }
?>
    <h2>[IMDB v<?php echo $search->version ?> Demo] Resultado da busca '<?php echo $_POST["name"] ?>':</h2>
    <table align="center" border="1" style="border-collapse:collapse;margin-top:20px;">
      <tr><th><?php echo $headname ?> Detalhes</th><th>IMDb</th></tr>
      <?php foreach ($results as $res):
        if(@$_POST['searchtype'] === 'nm'):
          $details = $res->getSearchDetails();
          if (!empty($details)) {
            $hint = " (".$details["role"]." in <a target='_blank' href='imdb/movie.php?mid=".$details["mid"]."'>".$details["moviename"]."</a> (".$details["year"]."))";
          } ?>
        <?php else: ?>
          <tr>
            <td><a target="_blank" href="imdb/movie.php?mid=<?php echo $res->imdbid() ?>"><?php echo $res->title() ?> (<?php echo $res->year() ?>) (<?php echo $res->movietype() ?>)</a></td>
            <td align="center"><a href="<?php echo $res->main_url() ?>">IMDb Page</a></td>
          </tr>
        <?php endif ?>
      <?php endforeach ?>
    </table>

