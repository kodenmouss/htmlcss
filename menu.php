<?php
  $dir = '.';
  $files = scandir($dir);

  $menu = array();
  foreach ($files as &$file) {
    $html = get_meta_tags($file, true);
    $title = $html["title"];
    $tag = $html["keywords"];
    if ($title) {
      if ($menu[$tag]) {
        array_push($menu[$tag], $title, $file);
      } else {
        $menu[$tag] = array(
          0 => $title,
          1 => $file,
        );
      }
    }
  }

  echo '<a href="index.php">Index</a>';

  foreach ($menu as $keyword => $titles) {
    echo '<h2>' . $keyword . '</h2>';
    echo '<br/>';
    for ($i = 0; $i < count($titles); $i += 2) {
      echo '<a href="' . $titles[$i + 1] . '">' . $titles[$i] . '</a>';
      echo '<br/>';
    }
  }
?>
