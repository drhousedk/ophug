<head>
    <meta http-equiv="refresh" content="60">
    <title>Arbejdsstyring</title>
    <link href="/css/styles.css" rel="stylesheet" type="text/css">
</head>
<style>

    @import url(https://fonts.googleapis.com/css?family=Roboto:100,400);

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

    <h1>Arbejdsstyring forside</h1>
    <h2>
        <FORM METHOD="LINK" ACTION="/ekspedition">
            <button TYPE="submit" class="knap"><span><img src="/images/phone32.png" height="15px"/> Ekspedition</span>
            </button>
        </FORM>
        <FORM METHOD="LINK" ACTION="/vaerksted">
            <button TYPE="submit" class="knap"><span><img src="/images/spanner32.png" height="15px"/> Værksted</span>
            </button>
        </FORM>
        <FORM METHOD="LINK" ACTION="<?php echo "https://logout@" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>">
            <button TYPE="submit" class="knap"><span><img src="/images/unlock32.png" height="15px"/> Log ud</span>
            </button>
        </FORM>

        <div class="infobox">
            <?php include('./licens.php'); ?>
        </div>

    </h2>


</main>
</body>
