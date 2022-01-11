<?php
include('WolframAlphaEngine/WolframAlphaEngine.php');
include('header.php');
?>

<header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Avatar Image-->
        <img class="masthead-avatar mb-5" src="assets/img/quaterminion.png" />
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-5">Quater Minion</h1>

        <!-- Fields -->
        <nav>
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-calculator-tab" data-bs-toggle="tab" data-bs-target="#nav-calculator" type="button" role="tab" aria-controls="nav-calculator" aria-selected="true">Calculator</button>
                <button class="nav-link" id="nav-converter-tab" data-bs-toggle="tab" data-bs-target="#nav-converter" type="button" role="tab" aria-controls="nav-converter" aria-selected="false">Converter</button>
            </div>
        </nav>
        <div class="w-75" style="background-color: whitesmoke;">
            <div class="tab-content" id="nav-tabContent">
                <!-- Calculator -->
                <?php include('calculator.php') ?>

                <!-- Converter -->
                <?php include('converter.php') ?>
            </div>
        </div>
    </div>
</header>

<?php include('footer.php') ?>