<head>
    <link href="http://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
    <link href="/css/styles.css" rel="stylesheet" type="text/css">
    <title>Redigér mekanikere</title>


    <style>

        @import url(http://fonts.googleapis.com/css?family=Roboto:100,400);

        html {
            font-size: 62.5%;
            height: 100%;
        }

        body {
            min-height: 100%;
            min-width: 100%;
            background-color: #080808;
            background-image: url('/images/bg.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center bottom;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        main {
            width: 100%;
            /*max-width: 35rem;*/
            padding: 2.5rem;
            margin-left: auto;
            margin-right: auto;
            font-family: 'Roboto', sans-serif;
            font-size: 1.4rem;
            line-height: 3rem;
        }

        h1, h2, h3 {
            text-align: center;
            text-rendering: geometricPrecision;
        }

        h1 {
            font-size: 3.2rem;
            line-height: 2.4em;
            letter-spacing: 0.15em;
            color: #0a0a0a;
            margin-bottom: 1rem;
            text-transform: uppercase;
            font-family:
        }

        h2 {
            font-size: 1.6rem;
            line-height: 1.2em;
            letter-spacing: 0.15em;
            color: #0a0a0a;
            margin-bottom: 1rem;
            text-transform: uppercase;
            font-family: 'Roboto', sans-serif;
            font-weight: 100;
        }

    </style>
</head>
<body>
<main>

    <?php

    header('Content-Type: text/html; charset=utf-8');
    ?>

    <h1>Administrér mekanikere</h1>
    <h2>


        <div class="infobox">
            <?php require_once('../config.php');

            $action = $_GET['action'];
            $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
            mysqli_query($connection, "SET NAMES utf8");
            mysqli_query($connection, "SET character_set_results=’utf8′");
            $count = "SELECT * from mekaniker";
            $counted = mysqli_query($connection, $count);
            $rowcount = mysqli_num_rows($counted);
            echo "<p>Antal licenser: $rowcount</p>";

            if (!$action) {

                $sql = "SELECT * FROM mekaniker ORDER BY navn ASC";

                $result = mysqli_query($connection, $sql) or die(mysql_error());

                echo "<table class='mekaniker'>";
                echo "<tr bgcolor='#333333'><td><b>Navn</b></td><td><b>Handling</b></td></tr>";

                while ($row = mysqli_fetch_array($result)) {


                    $id = $row['id'];
                    $navn = $row['navn'];

                    echo "<tr bgcolor=#cecece><td class='navn'>$navn</td><td class='action'><a href='?id=$id&action=edit'><img src='/images/pencil32.png' height='20px'/></a></td></tr>";
                }

                echo "</table>";


            } else if ($action == "edit") {
                $id = $_GET['id'];
                $sql = "SELECT * FROM mekaniker WHERE id=$id";
                $result = mysqli_query($connection, $sql) or die(mysql_error());
                $row = mysqli_fetch_array($result);
                $navn = $row['navn'];
                echo " <form method='get' action='mekaniker.php?action=save'><p>Redigér <b>$navn</b></p><form>
           <table>
           <tr><td><p class='black'>Navn:</p></td><td><input type='text' name='navn' value='$navn'</td></tr>
           <tr></tr><td></td><td><input type='hidden' value='save' name='action' />
                                 <input type='hidden' value='$id' name='id' /><input type='submit' value='Gem'></tr>
           </table>
           </form><p class='black'><a href='mekaniker.php'>Tilbage</a></p>";

            } else if ($action == "save") {
                $navn = $_GET['navn'];
                $id = $_GET['id'];
                echo "<p>Id $id opdateret til: $navn</p><p class='black'><a href='./mekaniker.php'>Tilbage</a></p>";
                $sql = "UPDATE mekaniker SET navn='$navn' WHERE id='$id'";
                $result = mysqli_query($connection, $sql);
            }


            $connection->close();
            ?>
        </div>
        <p></p>
        <FORM METHOD="LINK" ACTION="/ekspedition/">
            <button TYPE="submit" class="knap"><span><img src="/images/leftturnarrow32.png"
                                                          height="15px"/> Tilbage</span>
            </button>
        </FORM>
    </h2>


</main>
</body>

