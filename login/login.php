<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | HMS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Alegreya&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../css/style.css" />
  </head>
  <body>
    <!-- Landing Page -->
    <section class="home">
      <div>
        <!-- Nav Bar -->
        <div class="header">
          <a href="../index.html"
            ><img id="logo" src="../assets/hmsLogo.png" alt="Logo"
          /></a>
          <div class="nav">
            <nav>
              <ul>
                <a href="../index.html" id="active"
                  ><li class="navPage">Home</li></a
                >
                <li>|</li>
                <a href=""><li class="navPage">About</li></a>
                <li>|</li>
                <a href=""><li class="navPage">Contact</li></a>
              </ul>
            </nav>
          </div>
        </div>
        <!-- Headline and Button -->
        <div class="homeContent">
        <form action="try_log.php" method="post">
          <h1 id="title">Login</h1>
          <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
          <?php } ?>
          <input
            type="text"
            placeholder="Enter Username..."
            name="uname"
          />
          <input
            type="password"
            placeholder="Enter Password..."
            name="pword"
          />
          <em><p>*Consult receptionist for your login information.</p></em>
          <button id="log" type="submit">Login</button>
        </form>
        </div>
      </div>
      <div>
        <!-- Reminder: Compress Image -->
        <img id="mainImg" src="../assets/homeImg.jpg" alt="Nurse" />
      </div>
    </section>
  </body>
</html>