let currentInput = "";
let currentOperator = "";
let previousInput = "";
let isOperatorClicked = false;
let result = null;

function appendToDisplay(value) {
    // Jika nilai sudah ada, akan ditulis ulang
    if (isOperatorClicked || result !== null) {
        document.getElementById("display").value = value;
        currentInput = value;
        isOperatorClicked = false;
        result = null;
    } else {
        document.getElementById("display").value += value;
        currentInput += value;
    }
}

function operate(operator) {
    if (currentInput !== "") {
        if (previousInput !== "") {
            calculate();
        } else {
            previousInput = currentInput;
            currentInput = "";
            currentOperator = operator;
            isOperatorClicked = true;
        }
    }
}

function calculate() {
    if (currentInput !== "" && previousInput !== "") {
        switch (currentOperator) {
            case "+":
                result = parseFloat(previousInput) + parseFloat(currentInput);
                break;
            case "-":
                result = parseFloat(previousInput) - parseFloat(currentInput);
                break;
            case "*":
                result = parseFloat(previousInput) * parseFloat(currentInput);
                break;
            case "/":
                result = parseFloat(previousInput) / parseFloat(currentInput);
                break;
            case "**":
                result = Math.pow(parseFloat(previousInput), parseFloat(currentInput));
                break;
            case "%":
                result = parseFloat(previousInput) % parseFloat(currentInput);
                break;
        }
        document.getElementById("display").value = result;
        previousInput = result.toString();
        currentInput = "";
        isOperatorClicked = true;
    }
}

function clearDisplay() {
    document.getElementById("display").value = "";
    currentInput = "";
    currentOperator = "";
    previousInput = "";
    isOperatorClicked = false;
    result = null;
}

function clearEntry() {
    document.getElementById("display").value = "";
    currentInput = "";
    isOperatorClicked = false;
}

function clearResult() {
    document.getElementById("display").value = "";
    result = null;
}
