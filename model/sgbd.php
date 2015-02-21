<?php
/**
 * Description of sgbd
 *
 * @author Isael Sousa <faelp22@hotmail.com>
 */

namespace model;

class sgbd {
    public static function cDateBase(){
    try {
  $dbh = \model\Storage::sgbd_PDO('sqlite:'.\PROJECT_PATH.'data/teste.db.sqlite');

  $sth = $dbh->prepare("SELECT * FROM accounts");
  $sth->execute();

  $result = $sth->fetch(PDO::FETCH_ASSOC);
  
  print_r($result);
  print("\n");

  $dbh = null;
}
catch(PDOException $e) {
  echo $e->getMessage();
}

    }
}


