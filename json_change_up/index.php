
<?php
session_start();

$lang = "eng";
$theme = "light";
if(isset($_POST['set_up'])){
    $lang = $_POST['lang'];
    $theme = $_POST['theme'];
}
$settings = json_decode(file_get_contents("settings.json"), true);
    // print_r($settings['dark']);
?>
<!DOCTYPE html>
<html>
    <head></head>
    <style>
        body{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 100vw;
            height:100vh;
            display: grid;
            grid-template-columns:1fr 3fr;
            grid-template-rows: 0.5fr 0.5fr 2fr 1fr;
            column-gap:5px;
            row-gap:5px;
        }
        .sidenav{
            background-color: <?php echo $settings[$theme]['sidenav']; ?>;
            color: <?php echo $settings[$theme]['color']; ?>;
            grid-column-start: 1;
            grid-column-end: 2;
            grid-row-start: 2;
            grid-row-end: 5;
        }
        .header{
            background-color: <?php echo $settings[$theme]['header']; ?>;
            color: <?php echo $settings[$theme]['color']; ?>;
            grid-column-start: 2;
            grid-column-end: 3;
            grid-row-start: 2;
            grid-row-end: 3;
        }
        .main{
            background-color: <?php echo $settings[$theme]['main']; ?>;
            color: <?php echo $settings[$theme]['color']; ?>;
            grid-column-start: 2;
            grid-column-end: 3;
            grid-row-start: 3;
            grid-row-end: 4;
        }
        .footter{
            background-color: <?php echo $settings[$theme]['footer']; ?>;
            color: <?php echo $settings[$theme]['color']; ?>;
            grid-column-start: 2;
            grid-column-end: 3;
            grid-row-start: 4;
            grid-row-end: 5;
        }
        form{
            display: flex;
            width:90%;
            height: 100%;
            flex-direction: row;
            align-content: center;
            justify-content: space-between;
            align-items: center;
            padding: 0 2%;
        }
        .form{
            display: flex;
            width: 30%;
        }
        .formGroup{
            display: flex;
            flex-direction: column;
            align-content: flex-start;
            justify-content: center;
            align-items: center;
            width: 48%;
            margin-right: 2%;
        }
        .formGroup> label, .formGroup> select{
            width: 100%;
        }
    </style>
    <body>
        <form action="" method="POST">
            <div class="form">
                <div class="formGroup">
                    <label>Language</label>
                    <select name="lang">
                        <option value="eng">English</option>
                        <option value="kor">Korean</option>
                    </select>
                </div>
                <div class="formGroup">
                    <label>Theme</label>
                    <select name="theme">
                        <option value="dark">dark</option>
                        <option value="light">light</option>
                        <option value="red">red</option>
                    </select>
                </div>
            </div>
            <button type="submit" name="set_up">Save changes</button>
        </form>
        <div class="container">
            <div class="header"><?php echo $settings[$lang]['header']; ?></div>
            <div class="sidenav"><?php echo $settings[$lang]['sidenav']; ?></div>
            <div class="main"><?php echo $settings[$lang]['main']; ?></div>
            <div class="footter"><?php echo $settings[$lang]['footer']; ?></div>
        </div>
    </body>
</html>