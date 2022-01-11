function getXMLHTTPRequest() {
    if (window.XMLHttpRequest) {
        return new XMLHttpRequest();
    }
    else {
        return new ActiveXObject("Microsoft.XMLHTTP");
    }
}

function convertUnit() {
    var xmlhttp = getXMLHTTPRequest();
    var unit_from = document.getElementById('unit-from');
    var unit_to = document.getElementById('unit-to');

    var input = encodeURI(document.getElementById('user_input').value);
    var value_from = encodeURI(unit_from.options[unit_from.selectedIndex].value);
    var value_to = encodeURI(unit_to.options[unit_to.selectedIndex].value);

    var url = "convert_unit.php?input=" + input + "&unit_from=" + value_from + "&unit_to=" + value_to;
    var inner = "result_area";

    xmlhttp.open("GET", url, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.onreadystatechange = function () {
        document.getElementById(inner).innerHTML = '<img src="assets/favicon.ico">';
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(inner).innerHTML = xmlhttp.responseText;
        }
        return false;
    }
    xmlhttp.send(null);
}