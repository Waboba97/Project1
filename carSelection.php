<!DOCTYPE html>


<html>
<head>
    <meta charset = "utf-8">
    <title>Redbook Car Selection</title>
<script type="text/javascript">
    let carObject = {
        "Subaru": ["","","",""],
        "Honda": ["","","",""],
        "Chevrolet": ["", "", "", ""],
        "Ford": ["","","",""],
        "Toyota": ["","","",""]
    };
    window.onload = function() {
        let makeSelect = document.getElementById("mk");
        let modelSelect = document.getElementById("model");
        for (let x in carObject) {
            makeSelect.options[makeSelect.options.length] = new Option (x,x);
        }
        makeSelect.onchange = function() {
            modelSelect.length = 1;
            let y = carObject[makeSelect.value];
            for (let i = 0; i < Object.keys(y).length; i++) {
                modelSelect.options[modelSelect.options.length] = new Option (y[i],y[i]);
            }
        };
    };
</script>
<style>
    body{text-align: center;}
</style>
</head>
<body>
<h1>Please select your vehicle</h1>
<form>
    Year: <select name = "yr" id = "yr">
        <option value = "" selected = "selected">Select Year</option>
        <option value = "2022">2022</option>
        <option value = "2021">2021</option>
        <option value = "2020">2020</option>
        <option value = "2019">2019</option>
        <option value = "2018">2018</option>
        <option value = "2017">2017</option>
        <option value = "2016">2016</option>
        <option value = "2015">2015</option>
        <option value = "2014">2014</option>
        <option value = "2013">2013</option>
        <option value = "2012">2012</option>
        <option value = "2011">2011</option>
        <option value = "2010">2010</option>
        <option value = "2009">2009</option>
        <option value = "2008">2008</option>
        <option value = "2007">2007</option>
        <option value = "2006">2006</option>
        <option value = "2005">2005</option>
        <option value = "2004">2004</option>
        <option value = "2003">2003</option>
        <option value = "2002">2002</option>
        <option value = "2001">2001</option>
        <option value = "2000">2000</option>
    </select>
    Make: <select name = "mk" id = "mk">
        <option value = "" selected = "selected">Please select car make </option></select>
    Model: <select name = "model" id = "model">
        <option value = "" selected = "selected">Please select make first </option>
    </select>
    <br><br>
    <input type = "submit" class = "myButton">
</form>
</body>

</html>





<?php
