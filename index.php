
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <title>test</title>
  <meta name="author" content="fructcode.com">

  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script src="ajax.js"></script>

</head>

<body>
    <form method="post" id="ajax_form" action="" style="display: block;" >
        <p>Your name: <input type="text" name="name" /></p>
        <div id="name_form"></div> 
        <p>Your surname: <input type="text" name="surname" /></p>
        <div id="surname_form"></div>
        <p>Your email: <input type="text" name="email" /></p>
        <div id="email_form"></div>
        <p>Your password: <input type="text" name="password" /></p>
        <div id="password_form"></div>
        <p>Repeat password: <input type="text" name="repeat-password" /></p>
        <input type="button" id="btn" value="Отправить" />
    </form>
    <div id="result_form"></div> 
</body>
</html>