<div class="tab-pane fade show active" id="nav-calculator" role="tabpanel" aria-labelledby="nav-calculator-tab">
    <div class="d-grid gap-2 d-md-block mb-1">
        <button class="btn btn-primary" type="button" onclick="input('+')">+</button>
        <button class="btn btn-primary" type="button" onclick="input('-')">-</button>
        <button class="btn btn-primary" type="button" onclick="input('\\cdot')">*</button>
        <button class="btn btn-primary" type="button" onclick="input('\\sqrt')">√</button>
        <button class="btn btn-primary" type="button" onclick="input('=')">=</button>
        <button class="btn btn-primary" type="button" onclick="input('\\ne')">≠</button>
        <button class="btn btn-primary" type="button" onclick="input('\\div')">÷</button>
        <button class="btn btn-primary" type="button" onclick="input('\\times')">x</button>
        <button class="btn btn-primary" type="button" onclick="input('>')">></button>
        <button class="btn btn-primary" type="button" onclick="input('<')">
            < </button>
                <button class="btn btn-primary" type="button" onclick="input('\\le')">≤</button>
                <button class="btn btn-primary" type="button" onclick="input('\\ge')">≥</button>
    </div>
    <div class="d-grid gap-2 d-md-block mb-1">
        <button class="btn btn-primary" type="button" onclick="input('^')">^</button>
        <button class="btn btn-primary" type="button" onclick="input('\\frac')">/</button>
        <button class="btn btn-primary" type="button" onclick="input('\\log')">log</button>
        <button class="btn btn-primary" type="button" onclick="input('\\pi')">π</button>
        <button class="btn btn-primary" type="button" onclick="input('\\int')">∫</button>
        <button class="btn btn-primary" type="button" onclick="input('\\lim')">lim</button>
        <button class="btn btn-primary" type="button" onclick="input('\\sin')">sin</button>
        <button class="btn btn-primary" type="button" onclick="input('\\cos')">cos</button>
        <button class="btn btn-primary" type="button" onclick="input('\\tan')">tan</button>
        <button class="btn btn-primary" type="button" onclick="input('\\alpha')">α</button>
        <button class="btn btn-primary" type="button" onclick="input('\\beta')">β</button>
        <button class="btn btn-primary" type="button" onclick="input('\\gamma')">γ</button>
    </div>

    <!-- MathQuill-->
    <div id="body" style="background-color: gray;">
        <form action="">
            <p>
                <span id="math-field" name="ures1" onclick="mfield('math-field');" onselect="mfield('math-field');" onkeyup="mclick('h1');" class="mq-editable-field" onkeypress="return onlyNumberKey(event)" style="width: 100%; padding: 8px; background-color: white; color: black;">
                    <input type="text" class="r-100">
                </span>
            </p>
            <p>
                <button name="submit" type="submit" class="btn btn-secondary" onclick="inputMath()">Calculate</button>
                <input class="visually-hidden" type="text" id="inputX" name="inputX" value="">
            </p>
        </form>

        <?php include('wolfram_config.php'); ?>
    </div>
</div>