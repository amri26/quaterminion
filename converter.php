<script>
    function getUnits() {
        var subcat = document.getElementById('subcategory');
        var value = subcat.options[subcat.selectedIndex].value;

        var unit_from = document.getElementById('unit-from');
        var unit_to = document.getElementById('unit-to');

        if (value == 1) {
            var text =
                '<option value="1">miligram</option>' +
                '<option value="2">centigram</option>' +
                '<option value="3">desigram</option>' +
                '<option value="4">gram</option>' +
                '<option value="5">dekagram</option>' +
                '<option value="6">kilogram</option>'

            unit_from.innerHTML = text;
            unit_to.innerHTML = text;
        } else if (value == 2) {
            var text =
                '<option value="1">milimeter</option>' +
                '<option value="2">centimeter</option>' +
                '<option value="3">desimeter</option>' +
                '<option value="4">meter</option>' +
                '<option value="5">dekameter</option>' +
                '<option value="6">kilometer</option>'

            unit_from.innerHTML = text;
            unit_to.innerHTML = text;
        } else {
            var text = '<option selected>Choose...</option>'

            unit_from.innerHTML = text;
            unit_to.innerHTML = text;
        }
    }
</script>
<div class="tab-pane fade" id="nav-converter" role="tabpanel" aria-labelledby="nav-converter-tab">
    <div class="container">
        <div class="row row-cols-2" style="color: black;">
            <div class="col">
                <div class="input-group mb-3">
                    <select class="form-select" id="subcategory" onchange="getUnits()">
                        <option selected>Sub Category</option>
                        <option value="1">Mass</option>
                        <option value="2">Length</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">From: </label>
                    <select class="form-select" id="unit-from">
                        <option selected>Choose...</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <input id="user_input" type="number" step="0.1" placeholder="Enter your number" style="width: 100%; padding: 8px;">
            </div>
            <div class="col">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">To: </label>
                    <select class="form-select" id="unit-to">
                        <option selected>Choose...</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <button type="button" class="btn btn-secondary" onclick="convertUnit()">Submit</button>
            </div>
            <div class="col" id="result_area">Result Area</div>
        </div>
    </div>
</div>