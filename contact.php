<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home | HMS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Alegreya&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <section class="home">
      <div>
        <div class="header">
          <a href="index.html"
            ><img id="logo" src="assets/hmsLogo.png" alt="Logo"
          /></a>
          <div class="nav">
            <nav>
              <ul>
                <a href="index.html"
                  ><li class="navPage">Home</li></a
                >
                <li>|</li>
                <a href="about.html"><li class="navPage">About</li></a>
                <li>|</li>
                <a href="contact.php" id="active"><li class="navPage">Contact</li></a>
              </ul>
            </nav>
          </div>
        </div>
        <div class="homeContent">
            <h2 class="title">Contact</h2>
            <form action="" method="POST">
              <input type="text" placeholder="Name" name="name"/>
              <input type="text" placeholder="Email" name="email"/>
              <input type="text" placeholder="Subject" name="subject"/>
              <textarea placeholder="Your message" name="msg" cols="30" rows="10" maxlength="255"></textarea>
              <button id="log" type="submit" onclick="submitTest()">Submit</button>
            </form>
        </div>
      </div>
      <div>
        <img id="mainImg" src="assets/homeImg.jpg" alt="Nurse" />
      </div>
    </section>
    <script>
      function submitTest() {
        alert("Your email has been sent.");
      }
    </script>
  </body>
</html>