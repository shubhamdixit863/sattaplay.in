
<?php
ob_start();
session_start();
if (!isset($_SESSION['username'])) {
header('Location:login.php');

}


if (isset($_GET['logout'])) {
  session_destroy();
  header('Location:login.php');
}

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=2, user-scalable=no" name="viewport" />
    <meta content="Semantic-UI-Forest, collection of design, themes and templates for Semantic-UI." name="description" />
    <meta content="Semantic-UI, Theme, Design, Template" name="keywords" />
    <meta content="PPType" name="author" />
    <meta content="#ffffff" name="theme-color" />
    <title>Satta</title>
    <link href="static/dist/semantic-ui/semantic.min.css" rel="stylesheet" type="text/css" />
    <link href="static/stylesheets/default.css" rel="stylesheet" type="text/css" />
    <link href="static/stylesheets/pandoc-code-highlight.css" rel="stylesheet" type="text/css" />
    <script src="static/dist/jquery/jquery.min.js"></script>
  </head>
  <body>
    <div class="ui inverted huge borderless fixed fluid menu">
      <a class="header item">Hi ,<?php echo $_SESSION['username'] ?></a>
      <div class="right menu">
        <div class="item">
          <div class="ui small input">
            <input placeholder="Search..." />
          </div>
        </div>
        <a class="item" href="dashboard.php">Dashboard</a><a class="item" href="playpage.php">Booking</a><a class="item">Profile</a><a class="item" href="playpage.php?logout">Sign Out</a>
      </div>
    </div>
    <div class="ui grid">
      <div class="row">
        <div class="column" id="sidebar">
          <div class="ui secondary vertical fluid menu">
            <a class="active item">Overview</a><a class="item">Reports</a><a class="item">Analytics</a><a class="item">Export</a>
            <div class="ui hidden divider"></div>
            <a class="item">Nav item</a><a class="item">Nav item again</a><a class="item">One more nav</a><a class="item">Another nav item</a><a class="item">More navigation</a>
            <div class="ui hidden divider"></div>
            <a class="item">Macintosh</a><a class="item">Linux</a><a class="item">Windows</a>
          </div>
        </div>
        <div class="column" id="content">
          <div class="ui grid">
            <div class="row">
              <h1 class="ui huge header">
                Dashboard
              </h1>
            </div>
            <div class="ui divider"></div>
            <div class="four column center aligned row">
              <div class="column">
                <img class="ui centered small circular image" src="static/images/templates/semantic-ui/wireframe/square-image.png" />
                <div class="ui hidden divider"></div>
                <div class="ui large green label">
                  Label
                </div>
                <p>
                  Something else
                </p>
              </div>
              <div class="column">
                <img class="ui centered small circular image" src="static/images/templates/semantic-ui/wireframe/square-image.png" />
                <div class="ui hidden divider"></div>
                <div class="ui large blue label">
                  Label
                </div>
                <p>
                  Something else
                </p>
              </div>
              <div class="column">
                <img class="ui centered small circular image" src="static/images/templates/semantic-ui/wireframe/square-image.png" />
                <div class="ui hidden divider"></div>
                <div class="ui large pink label">
                  Label
                </div>
                <p>
                  Something else
                </p>
              </div>
              <div class="column">
                <img class="ui centered small circular image" src="static/images/templates/semantic-ui/wireframe/square-image.png" />
                <div class="ui hidden divider"></div>
                <div class="ui large red label">
                  Label
                </div>
                <p>
                  Something else
                </p>
              </div>
            </div>
            <div class="ui hidden section divider"></div>
            <div class="row">
              <h1 class="ui huge header">
                Section title
              </h1>
            </div>
            <div class="ui divider"></div>
            <div class="row">
              <table class="ui single line striped selectable table">
                <thead>
                  <tr>
                    <th>
                      #
                    </th>
                    <th>
                      Header
                    </th>
                    <th>
                      Header
                    </th>
                    <th>
                      Header
                    </th>
                    <th>
                      Header
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      1,001
                    </td>
                    <td>
                      Lorem
                    </td>
                    <td>
                      ipsum
                    </td>
                    <td>
                      dolor
                    </td>
                    <td>
                      sit
                    </td>
                  </tr>
                  <tr>
                    <td>
                      1,002
                    </td>
                    <td>
                      amet
                    </td>
                    <td>
                      consectetur
                    </td>
                    <td>
                      adipiscing
                    </td>
                    <td>
                      elit
                    </td>
                  </tr>
                  <tr>
                    <td>
                      1,003
                    </td>
                    <td>
                      Integer
                    </td>
                    <td>
                      nec
                    </td>
                    <td>
                      odio
                    </td>
                    <td>
                      Praesent
                    </td>
                  </tr>
                  <tr>
                    <td>
                      1,003
                    </td>
                    <td>
                      libero
                    </td>
                    <td>
                      Sed
                    </td>
                    <td>
                      cursus
                    </td>
                    <td>
                      ante
                    </td>
                  </tr>
                  <tr>
                    <td>
                      1,004
                    </td>
                    <td>
                      dapibus
                    </td>
                    <td>
                      diam
                    </td>
                    <td>
                      Sed
                    </td>
                    <td>
                      nisi
                    </td>
                  </tr>
                  <tr>
                    <td>
                      1,005
                    </td>
                    <td>
                      Nulla
                    </td>
                    <td>
                      quis
                    </td>
                    <td>
                      sem
                    </td>
                    <td>
                      at
                    </td>
                  </tr>
                  <tr>
                    <td>
                      1,006
                    </td>
                    <td>
                      nibh
                    </td>
                    <td>
                      elementum
                    </td>
                    <td>
                      imperdiet
                    </td>
                    <td>
                      Duis
                    </td>
                  </tr>
                  <tr>
                    <td>
                      1,007
                    </td>
                    <td>
                      sagittis
                    </td>
                    <td>
                      ipsum
                    </td>
                    <td>
                      Praesent
                    </td>
                    <td>
                      mauris
                    </td>
                  </tr>
                  <tr>
                    <td>
                      1,008
                    </td>
                    <td>
                      Fusce
                    </td>
                    <td>
                      nec
                    </td>
                    <td>
                      tellus
                    </td>
                    <td>
                      sed
                    </td>
                  </tr>
                  <tr>
                    <td>
                      1,009
                    </td>
                    <td>
                      augue
                    </td>
                    <td>
                      semper
                    </td>
                    <td>
                      porta
                    </td>
                    <td>
                      Mauris
                    </td>
                  </tr>
                  <tr>
                    <td>
                      1,010
                    </td>
                    <td>
                      massa
                    </td>
                    <td>
                      Vestibulum
                    </td>
                    <td>
                      lacinia
                    </td>
                    <td>
                      arcu
                    </td>
                  </tr>
                  <tr>
                    <td>
                      1,011
                    </td>
                    <td>
                      eget
                    </td>
                    <td>
                      nulla
                    </td>
                    <td>
                      Class
                    </td>
                    <td>
                      aptent
                    </td>
                  </tr>
                  <tr>
                    <td>
                      1,012
                    </td>
                    <td>
                      taciti
                    </td>
                    <td>
                      sociosqu
                    </td>
                    <td>
                      ad
                    </td>
                    <td>
                      litora
                    </td>
                  </tr>
                  <tr>
                    <td>
                      1,013
                    </td>
                    <td>
                      torquent
                    </td>
                    <td>
                      per
                    </td>
                    <td>
                      conubia
                    </td>
                    <td>
                      nostra
                    </td>
                  </tr>
                  <tr>
                    <td>
                      1,014
                    </td>
                    <td>
                      per
                    </td>
                    <td>
                      inceptos
                    </td>
                    <td>
                      himenaeos
                    </td>
                    <td>
                      Curabitur
                    </td>
                  </tr>
                  <tr>
                    <td>
                      1,015
                    </td>
                    <td>
                      sodales
                    </td>
                    <td>
                      ligula
                    </td>
                    <td>
                      in
                    </td>
                    <td>
                      libero
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <style type="text/css">
      body {
        display: relative;
      }

      #sidebar {
        position: fixed;
        top: 51.8px;
        left: 0;
        bottom: 0;
        width: 18%;
        background-color: #f5f5f5;
        padding: 0px;
      }
      #sidebar .ui.menu {
        margin: 2em 0 0;
        font-size: 16px;
      }
      #sidebar .ui.menu > a.item {
        color: #337ab7;
        border-radius: 0 !important;
      }
      #sidebar .ui.menu > a.item.active {
        background-color: #337ab7;
        color: white;
        border: none !important;
      }
      #sidebar .ui.menu > a.item:hover {
        background-color: #4f93ce;
        color: white;
      }

      #content {
        margin-left: 19%;
        width: 81%;
        margin-top: 3em;
        padding-left: 3em;
        float: left;
      }
      #content > .ui.grid {
        padding-right: 4em;
        padding-bottom: 3em;
      }
      #content h1 {
        font-size: 36px;
      }
      #content .ui.divider:not(.hidden) {
        margin: 0;
      }
      #content table.ui.table {
        border: none;
      }
      #content table.ui.table thead th {
        border-bottom: 2px solid #eee !important;
      }
    </style>
  </body>
</html>
