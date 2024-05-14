
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
</head>
<body>
  <h1 class="info">Nagy László</h1>
  <h1 class="info">MSRRF6</h1>
  <div class="limiter" id="loginka">
    <div class = "container-login100">
      <div class="wrap-login100 p-t-30 p-b-50">
        <span class="login100-form-title p-b-41" style="font-weight:bold;">
          Account Login
        </span>
        <form method="POST" action="#" class="login100-form validate-form p-b-33 p-t-5">
          <div class="wrap-input100 validate-input">
            <input class="input100" id="user" type="text" name="username" placeholder="Enter Username"/>
          </div>
          <div class="wrap-input100 validate-input">
            <input class="input100" id="pass" type="password" name="password" placeholder="Enter Password"/>
          </div>
          <div class="container-login100-form-btn m-t-32">
            <input class="login100-form-btn" type="submit" name="submit" value="LOGIN" class="_login"/>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="image" id="after" style="text-align:center;display:block;">
  </div>
</body>
</html>
<?php
  $link = mysqli_connect("localhost","root","")or die("Nem sikerult kapcsolodni");
  $link -> select_db("adatok")or die("Nem sikerult kivalasztani adatbazis");
  $megtalaltamuser = 0;
  $megtalaltampassword = 0;
  if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $filename = 'password.txt';
    $sor = "";
    $szamom;
    if(file_exists($filename)){
      $file = fopen("password.txt","r");
      $counter = 1;
      while(!feof($file)){
        if($counter == 6){
          $counter = 1;
        }
        $character = fgetc($file);
        $asciicharacter = ord($character);
        if($asciicharacter != 10){
        switch ($counter) {
            case 1:
                $asciicharacter = $asciicharacter - 5;
                break;
            case 2:
                $asciicharacter = $asciicharacter + 14;
                break;
            case 3:
                $asciicharacter = $asciicharacter - 31;
                break;
            case 4:
                $asciicharacter = $asciicharacter + 9;
                break;
            case 5:
                $asciicharacter = $asciicharacter - 3;
                break;
            default:
                break;
          }
        $sor = $sor.chr($asciicharacter);
        $counter = $counter + 1;
        }else{
          $counter = 1;
          //echo "<br>".$sor."<br>";
          list($nev,$kod) = explode("*",$sor);
          $sor = "";
          if(strcmp($nev,$username)==0){
            $megtalaltamuser = 1;
          }
          if(strcmp($kod,$password)==0){
            $megtalaltampassword = 1;
          }
        }
        if($megtalaltamuser && $megtalaltampassword){
          break;
        }
      }
    }else{
      echo "Nincs meg a file";
    }
    if(($megtalaltamuser==1) && ($megtalaltampassword ==0)){
      ?><script type="text/javascript">
        window.alert("NÍNÚNÍNÚ");
        setTimeout(function(){ window.location.href = "http://www.police.hu/";}, 3000);
        </script>
      <?php
    }else if(($megtalaltamuser==0) && ($megtalaltampassword ==1)){
      ?><script type="text/javascript">
        window.alert("Hibás felhasználónév!");
        window.location.href = "";
        header("Refresh:0");
        </script>
      <?php
    }else if(($megtalaltamuser!=1) && ($megtalaltampassword !=1)){
      ?><script type="text/javascript">
        window.alert("...")
        window.location.href = "";
        header("Refresh:0");
      </script>
      <?php
    }else{
      $sql = "select titkos from tabla where username = '$username'";
      $ered = $link -> query($sql);
      $result = $ered -> fetch_row();
      list($csnev,$szemet) = explode("@",$username);
      switch ($result[0]) {
        case 'piros':
        echo "<h1>Üdv újra:</h1>".'<h1 class="piros">'.$csnev.'</h1>'."<h1>A titkos színed: </h1>".'<h1 class="piros">'.$result[0].'</h1>';
        break;
        case 'zold':
        echo "<h1>Üdv újra:</h1>".'<h1 class="zold">'.$csnev.'</h1>'."<h1>A titkos színed: </h1>".'<h1 class="zold">'.$result[0].'</h1>';
        break;
        case 'sarga':
        echo "<h1>Üdv újra:</h1>".'<h1 class="sarga">'.$csnev.'</h1>'."<h1>A titkos színed: </h1>".'<h1 class="sarga">'.$result[0].'</h1>';
        break;
        case 'kek':
        echo "<h1>Üdv újra:</h1>".'<h1 class="kek">'.$csnev.'</h1>'."<h1>A titkos színed: </h1>".'<h1 class="kek">'.$result[0].'</h1>';
        break;
        case 'fekete':
        echo "<h1>Üdv újra:</h1>".'<h1 class="fekete">'.$csnev.'</h1>'."<h1>A titkos színed: </h1>".'<h1 class="fekete">'.$result[0].'</h1>';
        break;
        case 'feher':
        echo "<h1>Üdv újra:</h1>".'<h1 class="feher">'.$csnev.'</h1>'."<h1>A titkos színed: </h1>".'<h1 class="feher">'.$result[0].'</h1>';
        break;
        default:
          exit();
        break;
      }
      //exit();
    }
    unset($_POST);
    fclose($file);
  }
?>