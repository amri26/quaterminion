<!-- Footer-->
<div class="footer">
    <div class="container text-center">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
                <a href="#" class="text-white">Home</a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="#" class="text-white">About</a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="privacy.php" class="text-white">Privacy</a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="#" class="text-white">Terms</a>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
                <a href="#" class="me-4 text-reset">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="me-4 text-reset">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="me-4 text-reset">
                    <i class="fab fa-google"></i>
                </a>
                <a href="#" class="me-4 text-reset">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="me-4 text-reset">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="#" class="me-4 text-reset">
                    <i class="fab fa-github"></i>
                </a>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->
    </div>
</div>

<div class="copyright py-4 text-center text-white">
    <div class="container"><small>Copyright &copy; 2021 Quaterminion. All rights reserved.</small></div>
</div>

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

<!-- MathQuill-->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="mathquill/mathquill.js"></script>
<script type="text/javascript">
    var MQ = MathQuill.getInterface(2);

    var staticMath = MQ.StaticMath(staticMathSpan);
    mathField instanceof MQ.StaticMath // => true
    mathField instanceof MQ // => true
    mathField instanceof MathQuill // => true

    var mathField = MQ.MathField(mathFieldSpan);
    mathField instanceof MQ.MathField // => true
    mathField instanceof MQ.EditableField // => true
    mathField instanceof MQ // => true
    mathField instanceof MathQuill // => true

    function inputMath() {
        var mathFieldSpan = document.getElementById('math-field');
        var latexSpan = document.getElementById('inputX');

        var mathField = MQ.MathField(mathFieldSpan, {
            spaceBehavesLikeTab: true,
            restrictMismatchedBrackets: true,
            supSubsRequireOperand: true,
            handlers: {
                edit: function() { // useful event handlers
                    var enteredMath = mathField.latex(); // Get entered math in LaTeX format
                    latexSpan.textContent = enteredMath; // simple API
                }
            }
        });

        mathField.latex();
        latexSpan.value = mathField.latex();
    }

    function mfield(mid) {

        var htmlElement = document.getElementById(mid);
        var config = {
            spaceBehavesLikeTab: true,
            restrictMismatchedBrackets: true
        };
        window.mathField = MQ.MathField(htmlElement, config);
        mathField.focus();
    }

    function mclick(h) {
        var m = mathField.latex();
        $("#" + h).val(m);
    }

    function input(cmdtext) {
        mathField.cmd(cmdtext).focus();
    }
    for (i = 0; i < 5; i++) {
        var problemSpan = document.getElementById('problem' + i);
        MQ.StaticMath(problemSpan);
    }

    function onlyNumberKey(evt) {
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode;
        if (ASCIICode > 33 && (ASCIICode < 40 || ASCIICode > 57 && ASCIICode < 60 || ASCIICode > 62 && ASCIICode < 91 || ASCIICode > 94 && ASCIICode < 123 || ASCIICode > 125))
            return false;
        return true;
    }
</script>

<script src="js/ajax.js"></script>
</body>

</html>