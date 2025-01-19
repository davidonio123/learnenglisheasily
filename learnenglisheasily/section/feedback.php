<div class="container text-center mt-4 pt-4 mb-2 pb-2">
    <p class="text mainColor">Feedback</p>
</div>
<div class="container py-5">
    <div class="row g-4">
        <!-- ANCORA DA AGGIUSTARE LA COSA DEI CARICAMENTI DEI COMMENTI SENZA FARLI CARICARE TUTTI -->
        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "no_comment") {
        ?>
                <div class="container text-center text">Non ci sono acnora commenti :)</div>
        <?php
            }
        }else{
            include("./function/feedback.php");
        }
        ?>
    </div>
</div>

<style>
    .feedback-card {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        margin-bottom: 24px;
    }

    .feedback-card h5 {
        font-size: 1.2rem;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .feedback-card p {
        font-size: 1rem;
        margin: 0;
    }
</style>