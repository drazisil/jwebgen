
$(document).ready(function() {
    $("#eyes").bind("change", function() {
        document.getElementById("eyesColor").style.background = "#" + document.forms[0].eyes.value;
    });

    $("#eyesColor").bind("click", function() {
        showColorPicker(this, document.forms[0].eyes, document.getElementById("eyesColor"));
    });

    $("#hair").bind("change", function() {
        document.getElementById("hairColor").style.background = "#" + document.forms[0].hair.value;
    });

    $("#hairColor").bind("click", function() {
        showColorPicker(this, document.forms[0].hair, document.getElementById("hairColor"));
    });
    $("#hair2").bind("change", function() {
        document.getElementById("hair2Color").style.background = "#" + document.forms[0].hair2.value;
    });

    $("#hair2Color").bind("click", function() {
        showColorPicker(this, document.forms[0].hair2, document.getElementById("hair2Color"));
    });
    $("#body").bind("change", function() {
        document.getElementById("bodyColor").style.background = "#" + document.forms[0].body.value;
    });

    $("#bodyColor").bind("click", function() {
        showColorPicker(this, document.forms[0].body, document.getElementById("bodyColor"));
    });
    $("#extra1").bind("change", function() {
        document.getElementById("extra1Color").style.background = "#" + document.forms[0].extra1.value;
    });

    $("#extra1Color").bind("click", function() {
        showColorPicker(this, document.forms[0].extra1, document.getElementById("extra1Color"));
    });
    $("#extra2").bind("change", function() {
        document.getElementById("extra2Color").style.background = "#" + document.forms[0].extra2.value;
    });

    $("#extra2Color").bind("click", function() {
        showColorPicker(this, document.forms[0].extra2, document.getElementById("extra2Color"));
    });

});

/**
 * 
 * @returns {Boolean}
 */
function genponyjs() {

    var tmpage;

    if (document.forms[0].age.options[document.forms[0].age.selectedIndex].value === "Baby") {
        tmpage = "&state=baby";
    } else {
        tmpage = "&state=a";
    }

    if (document.forms[0].surprise.checked) {
        document.forms[0].eyes.value = randHex();
        document.getElementById("eyesColor").style.background = "#" + document.forms[0].eyes.value;
        document.forms[0].hair.value = randHex();
        document.getElementById("hairColor").style.background = "#" + document.forms[0].hair.value;
        document.forms[0].hair2.value = randHex();
        document.getElementById("hair2Color").style.background = "#" + document.forms[0].hair2.value;
        document.forms[0].body.value = randHex();
        document.getElementById("bodyColor").style.background = "#" + document.forms[0].body.value;
        document.forms[0].extra1.value = randHex();
        document.getElementById("extra1Color").style.background = "#" + document.forms[0].extra1.value;
        document.forms[0].extra2.value = randHex();
        document.getElementById("extra2Color").style.background = "#" + document.forms[0].extra2.value;
        document.forms[0].breed.selectedIndex = randMax(17);
        document.forms[0].gender.selectedIndex = randMax(1);
        document.forms[0].spattern.selectedIndex = randMax(32);
        document.forms[0].ssocks.selectedIndex = randMax(8);
        document.forms[0].shair.selectedIndex = randMax(6);
        document.forms[0].sface.selectedIndex = randMax(9);
        var colors = document.forms[0].eyes.value + "|" + document.forms[0].hair.value + "|" + document.forms[0].hair2.value + "|";
        colors += document.forms[0].body.value + "|" + document.forms[0].extra1.value + "|" + document.forms[0].extra2.value;
        var genes = document.forms[0].spattern[document.forms[0].spattern.selectedIndex].value + "|";
        genes += document.forms[0].ssocks[document.forms[0].ssocks.selectedIndex].value + "|";
        genes += document.forms[0].shair[document.forms[0].shair.selectedIndex].value + "|";
        genes += document.forms[0].sface[document.forms[0].sface.selectedIndex].value;
    } else {
        var colors = document.forms[0].eyes.value + "|" + document.forms[0].hair.value + "|" + document.forms[0].hair2.value + "|";
        colors += document.forms[0].body.value + "|" + document.forms[0].extra1.value + "|" + document.forms[0].extra2.value;
        var genes = document.forms[0].spattern[document.forms[0].spattern.selectedIndex].value + "|";
        genes += document.forms[0].ssocks[document.forms[0].ssocks.selectedIndex].value + "|";
        genes += document.forms[0].shair[document.forms[0].shair.selectedIndex].value + "|";
        genes += document.forms[0].sface[document.forms[0].sface.selectedIndex].value;
    }
    var tmpimg = "http://im3.ponyisland.net/?img=pony&size=200&modified" + tmpage + "&breed=";
    tmpimg += document.forms[0].breed.options[document.forms[0].breed.selectedIndex].value + "&gender=";
    tmpimg += document.forms[0].gender.options[document.forms[0].gender.selectedIndex].value + "&colors=" + colors + "&genes=" + genes + "&jwgen20";
    var text = "<table>";
    text += "<tr>";
    text += "<td style=\"text-align: center;\">";
    text += "<img id=\"pony\" src=\"" + tmpimg + "jwg-gen\"><br/>\n";
    text += "URL<br/>\n";
    text += "<input type=\"text\" size=\"40\" value=\"[IMG]" + tmpimg + "&jwg-gen[/IMG]\"><br/>\n";
    text += "<form name=\"form\" method=\"post\" action=\"controller.php\">\n";
    text += "Pony Name<br/>\n";
    text += "(no spaces)<br/>\n";
    text += "<input type=\"text\" name=\"PonyName\" value=\"dreampony\"><br/>\n";
    text += "<input type=\"hidden\" name=\"ImgURL\" value=\"" + tmpimg + "\"><br/>\n";
    text += "<input name=\"SaveImg\" value=\"Save\" type=\"submit\">\n";
    text += "</td>\n";
    text += "</form>\n";
    text += "</tr>\n";
    text += "</table>\n";


    var genpony = document.getElementById("genpony");
    genpony.innerHTML = text;
    return false;
}

/**
 * 
 * @param {type} max
 * @returns {Number}
 */
function randMax(max) {
    return Math.round(Math.random() * max);
}

/**
 * 
 * @returns {color|String|digit}
 */
function randHex() {
    colors = new Array(14);
    colors[0] = "0";
    colors[1] = "1";
    colors[2] = "2";
    colors[3] = "3";
    colors[4] = "4";
    colors[5] = "5";
    colors[5] = "6";
    colors[6] = "7";
    colors[7] = "8";
    colors[8] = "9";
    colors[9] = "a";
    colors[10] = "b";
    colors[11] = "c";
    colors[12] = "d";
    colors[13] = "e";
    colors[14] = "f";

    digit = new Array(5);
    color = "";
    for (i = 0; i < 6; i++) {
        digit[i] = colors[Math.round(Math.random() * 14)];
        color = color + digit[i];
    }
    return color;
}
