var textData = "";

function checkInput() {
    var text = document.getElementById("inputText").value;

    if (text.trim().length === 0) {
        document.getElementById("InputErr").innerHTML = "Please enter some text.";
        return false;
    } else {
        document.getElementById("InputErr").innerHTML = "";
        return true;
    }
}

function countCharacters(text) {
    return text.length;
}

function countWords(text) {
    var words = text.trim().split(/\s+/);
    if (words[0] === "") {
        return 0;
    }
    return words.length;
}

function reverseText(text) {
    return text.split("").reverse().join("");
}

function analyzeData() {
    var isValid = checkInput();

    if (!isValid) {
        return false;
    }

    var text = document.getElementById("inputText").value;
    
    var totalChars = countCharacters(text);
    var totalWords = countWords(text);
    var reversed = reverseText(text);

    document.getElementById("charCount").innerHTML = totalChars;
    document.getElementById("wordCount").innerHTML = totalWords;
    document.getElementById("reversedText").innerHTML = reversed;

    var panel = document.getElementById("analyticsPanel");
    var button = document.getElementById("toggleBtn");
    panel.style.display = "block";
    button.innerHTML = "Hide Analysis Result";

    alert("Text Analyzed!");
    return true;
}

function toggleAnalysis() {
    var panel = document.getElementById("analyticsPanel");
    var button = document.getElementById("toggleBtn");

    if (panel.style.display === "none" || panel.style.display === "") {
        panel.style.display = "block";
        button.innerHTML = "Hide Analysis Result";
    } else {
        panel.style.display = "none";
        button.innerHTML = "Show Analysis Result";
    }
}