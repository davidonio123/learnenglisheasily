<?php
$videoUrl = "https://www.youtube.com/embed/N0IDkzhBQMg?si=s_fgZiaoNyFBMPJK"; //qui mettici il link di yt (i link prendili con l'opzione incorpora di yt)
$pdfUrl = "../asserts/pdf/regolamento.pdf"; //e qui invece il contenuto del pdf
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prova</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        .container { display: flex; justify-content: space-around; flex-wrap: wrap; }
        .frame { border: none; }
    </style>
</head>
<body>
    <h1>Ciao davidonio</h1>
    <div class="container">
        <div>
            <h2>Video YT</h2>
            <iframe width="560" height="315" src="<?php echo $videoUrl; ?>" allowfullscreen></iframe> <!--se non vuoi il full screen togli 'allowfullscreen' -->
        </div>
        <div>
            <h2>PDF</h2>
            <iframe class="frame" src="<?php echo $pdfUrl; ?>#navpanes=0" width="560" height="500"></iframe> <!--iframe per i pdf -->
        </div>
    </div>
</body>
</html>