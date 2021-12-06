<?php

    ob_start();
    session_start();

    include('config.php');
    $grid = $_SESSION['grId'];

    if($grid == ''){
        header("location:index.php");
    }

    $sqls = "SELECT * FROM gim_students WHERE grid='$grid'";
    $resu = mysqli_query($conn,$sqls);

    $check = mysqli_fetch_assoc($resu);

    if($check['e_status']==2){
        header("location:profile.php");
    }


    if($_SESSION['start'] != ''){
        header("location:question.php?sub=".$_SESSION['start']);
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/paper.css" rel="stylesheet">
    <title>Exam Papers</title>
</head>
<style>
.scp-quizzes-data {
    margin-bottom: 20px !important;
}

.episode__content {
    min-width: inherit !important;
}

.episode__number {
    font-size: 10vw;
    font-weight: 600;
    padding: 10px 0;
    position: sticky;
    top: 0;
    text-align: center;
    height: auto;
    transition: all 0.2s ease-in;
}

.episode__content {
    border-top: 2px solid rgb(0, 0, 0);
    display: grid;
    grid-template-columns: auto !important;
    grid-gap: 10px;
    padding: 15px 0;
}

body {
    background-image: url("assets/images/shadow_rnw.png");
    background-size: 25%;
    background-repeat: no-repeat;
    background-position: center;
    background-attachment: fixed;
    background-opacity: .2;
}
</style>

<body>

    <ul class="tilesWrap">
        <li>
            <h2 style="color: aliceblue;">P</h2>
            <h3>Photoshop Web</h3>
            <p>
                1 Questions.
            </p>
            <a href="question.php?sub=p">
                <button>Start Paper</button>
            </a>

        </li>
        <li>
            <h2 style="color: aliceblue;">A</h2>
            <h3>Visulization<br>Animate</h3>
            <p>
                2 Questions.
            </p>
            <a href="question.php?sub=a">
                <button>Start Paper</button>
            </a>
        </li>
        <li>
            <h2 style="color: aliceblue;">C</h2>
            <h3>C Language</h3>
            <p>
                5 Questions.
            </p>
            <a href="question.php?sub=c">
                <button>Start Paper</button>
            </a>
        </li>

    </ul>
    <ul class="tilesWrap">

        <li>
            <h2 style="color: aliceblue;">G</h2>
            <h3>Photoshop Graphics</h3>
            <p>
                1 Questions.
            </p>
            <a href="question.php?sub=pg">
                <button>Start Paper</button>
            </a>
        </li>
        <li>
            <h2 style="color: aliceblue;">L</h2>
            <h3>Logic</h3>
            <p>
                30 Questions.
            </p>
            <a href="question_logic.php?sub=l">
                <button>Start Paper</button>
            </a>
        </li>
    </ul>
</body>

</html>