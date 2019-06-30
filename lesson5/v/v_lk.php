<h1><?= $username ?></h1>

<h2>Последние действия:</h2>

<ul>
  <?php foreach($lasturls as $lasturl){ ?>
  <li><?= $lasturl ?></li>
  <?php } ?>
</ul>