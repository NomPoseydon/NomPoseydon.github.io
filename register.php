<?
// Страница регистрации нового пользователя

// Соединямся с БД
$link=mysqli_connect("sql300.byethost10.com", "b10_32400272", "YuKo6457", "b10_32400272_atline");

if(isset($_POST['submit']))
{
    $err = [];

    // проверям логин
    if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))
    {
        $err[] = "Логин может состоять только из букв английского алфавита и цифр";
    }

    if(strlen($_POST['login']) < 4 or strlen($_POST['login']) > 30)
    {
        $err[] = "Логин должен быть не меньше 4-х символов и не больше 32";
    }

    // проверяем, не сущестует ли пользователя с таким именем
    $query = mysqli_query($link, "SELECT id FROM users WHERE login='".mysqli_real_escape_string($link, $_POST['login'])."'");
    if(mysqli_num_rows($query) > 0)
    {
        $err[] = "Пользователь с таким логином уже существует в базе данных";
    }

    // Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err) == 0)
    {

        $login = (trim($_POST['login']));

        // Убераем лишние пробелы и делаем двойное хеширование
        $pass = (trim($_POST['pass']));

        mysqli_query($link,"INSERT INTO users SET login='".$login."', pass='".$pass."'");
        header("Location: login.php"); exit();
    }
    else
    {
        print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }
    }
}
?>



<!DOCTYPE html>
<html lang="ua">	
	<head>	
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="login.css"> 
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet"> 
 	   <title>AtLine</title>
	</head>
	<body>
	
	<header class="header">
      <div class="container">
        <div class="header_inner">
          <div class="header_logo"><a class="header_logo" href="/index.html">AtLine</a></div>

          <nav class="nav">
            <a class="nav_menu" href="/index.html">Главная</a>
          </nav>

        </div>
      </div>
    </header>
	
	
		<div class="form">
			<h1>Вход</h1>
			<form method="post">
				<input name="login" placeholder="Логин" type="text" class="input-form" required><br>
				<input type="password" placeholder="Пароль" class="input-form" name="pass"><br>
				<input name="submit" type="submit" class="input-form" value="Зарегистрироваться">
				<a href="#" class="forget">Забыли пароль?</a>
			</form>
		</div>



	</body>
</html>