<?php require_once('../../config.php'); ?>
<title>Opret opgave</title>
<head>
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
    <link href="/css/styles.css" rel="stylesheet" type="text/css">
</head>
<p>Opret opgave</p>
<form method="post" action="add_do.php">
    <table class="formtable">
        <tr>
            <td>Stamnr:</td>
            <td><input type="text" name="stamnr" maxlength="6"> (Max. 6 tegn)</td>
        </tr>
        <tr>
            <td>Bil:</td>
            <td><input type="text" name="bil" maxlength="20"> (Max. 20 tegn)</td>
        </tr>
        <tr>
            <td>Reservedel:</td>
            <td><input type="text" name="reservedel" maxlength="30"> (Max. 30 tegn)</td>
        </tr>
        <tr>
            <td>Besked:</td>
            <td><textarea name="besked"></textarea></td>
        </tr>
        <tr>
            <td>Varetur:</td>
            <td><select name="varetur">
                    <option id="Nej">Nej</option>
                    <option id="GLS">GLS</option>
                    <option id="Brink">Brink</option>
                    <option id="Nord">Nord</option>
                    <option id="Syd">Syd</option>
                    <option id="Øst">Øst</option>
                    <option id="Vest">Vest</option>
                </select></td>
        </tr>
        <tr>
            <td>Ekspedient:</td>
            <td><select name="ekspedient">
                    <?php


                    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
                    mysqli_query($connection, "SET NAMES utf8");
                    mysqli_query($connection, "SET character_set_results= ^ ^ utf8 ^  ");
                    $sql = "SELECT * FROM ekspedient ORDER BY navn ASC";
                    $result = mysqli_query($connection, $sql);

                    while ($row = mysqli_fetch_array($result)) {
                        $navn = $row['navn'];
                        $ekspedient = "<option id='$navn'>$navn</option>";
                        echo $ekspedient;
                    }

                    $connection->close();


                    ?>
                </select></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="knap"><span><img src="/images/boxdownload32.png"
                                                              height="15px"/> Gem!</span></button>
                <button type="reset" class="knap"><span><img src="/images/exchange32.png" height="15px"/> Nulstil</span>
                </button>
                <button Type="button" ONCLICK="window.location.href='./index.php'" class="knap"><span><img
                            src="/images/leftturnarrow32.png" height="15px"/> Tilbage</span>
            </td>
        </tr>
    </table>
</form>
