<?php
$grammar_topics = [
    ["Present Simple", 45],
    ["Present Continuous", 12],
    ["Past Simple", 92],
    ["Past Continuous", 37],
    ["Present Perfect Simple", 88],
    ["Present Perfect Continuous", 64],
    ["Past Perfect Simple", 29],
    ["Past Perfect Continuous", 71],
    ["Future Simple (will)", 90],
    ["Future Continuous", 55],
    ["Future Perfect Simple", 33],
    ["Future Perfect Continuous", 69],
    ["Going to per il futuro", 87],
    ["Condizionale zero", 12],
    ["Primo condizionale", 82],
    ["Secondo condizionale", 19],
    ["Terzo condizionale", 68],
    ["Condizionali misti", 73],
    ["Forma passiva", 86],
    ["Discorso diretto e indiretto", 24],
    ["Question tags", 80],
    ["Preposizioni di luogo", 82],
    ["Preposizioni di tempo", 7],
    ["Preposizioni di movimento", 49],
    ["Espressioni di quantità", 14],
    ["Frasi con 'there is/there are'", 90],
    ["Uso di 'so' e 'such'", 42],
    ["Uso di 'too' e 'enough'", 81],
    ["Verbi con preposizioni", 74],
    ["Verbi regolari e irregolari", 92],
    ["Gerundio e infinito", 78],
    ["Uso di 'used to' per parlare del passato", 23],
    ["Strutture impersonali", 66],
    ["Particelle interrogative", 88],
    ["Ordine delle parole nella frase", 34],
    ["Connettivi e congiunzioni", 10]
];
// ordino l'array in base al punteggio
usort($grammar_topics, function($a, $b) {
    return $b[1] <=> $a[1];
});

// caso in cui non si e svolto neanche un esercizio
if (count($grammar_topics) == 0) {
?>
    <p class="text lightGray down mt-3">
        Nessun esercizio svolto
    </p>
<?php
    die();
}

$length = count($grammar_topics);
$count = 1;
?><div class="col-md-3"><?php
for ($i = 0; $i < count($grammar_topics); $i++) {
    if($count * (intdiv($length, 4) + 1) <= $i) {
        $count += 1;
        ?></div><div class="col-md-3"><?php
    }
    $punteggio = $grammar_topics[$i][1];
    ?>
    <span class="badge badge-<?php
    if ($punteggio < 50) {
        echo "danger";
    } else if ($punteggio < 80) {
        echo "warning";
    } else {
        echo "success";
    }
    ?>"><?=$grammar_topics[$i][0]?> (<?=$punteggio?>)</span><br>
    <?php
}
?></div><?php
