<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #e0e0e0;
            font-family: Arial, sans-serif;
        }
        .calculator {
            width: 320px;
            padding: 20px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }
        .display {
            width: 100%;
            height: 80px;
            background-color: #333;
            color: #fff;
            text-align: right;
            padding: 20px;
            font-size: 2.5rem;
            border-radius: 10px;
            margin-bottom: 20px;
            overflow: hidden;
        }
        .button-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
        }
        .button {
            padding: 20px;
            font-size: 1.6rem;
            background-color: #f4f4f4;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.2s ease;
            text-align: center;
        }
        .button.operator {
            background-color: #ffa500;
            color: #fff;
        }
        .button.equal {
            background-color: #007bff;
            color: #fff;
        }
        .button.clear {
            background-color: #dc3545;
            color: #fff;
        }
        .button:active {
            background-color: #ccc;
        }
    </style>
</head>
<body>

    <div class="calculator">
        <!-- Display -->
        <div id="display" class="display">0</div>

        <!-- Buttons Grid -->
        <div class="button-grid">
            <!-- Numbers and Operations -->
            <button class="button" onclick="appendNumber('1')">1</button>
            <button class="button" onclick="appendNumber('2')">2</button>
            <button class="button" onclick="appendNumber('3')">3</button>
            <button class="button operator" onclick="setOperation('+')">+</button>

            <button class="button" onclick="appendNumber('4')">4</button>
            <button class="button" onclick="appendNumber('5')">5</button>
            <button class="button" onclick="appendNumber('6')">6</button>
            <button class="button operator" onclick="setOperation('-')">-</button>

            <button class="button" onclick="appendNumber('7')">7</button>
            <button class="button" onclick="appendNumber('8')">8</button>
            <button class="button" onclick="appendNumber('9')">9</button>
            <button class="button operator" onclick="setOperation('*')">*</button>

            <button class="button clear" onclick="clearDisplay()">C</button>
            <button class="button" onclick="appendNumber('0')">0</button>
			<button class="button equal" onclick="calculateResult()">=</button>
            <button class="button operator" onclick="setOperation('/')">/</button>
            
        </div>
    </div>

    <script>
        let displayValue = '';
        let num1 = '';
        let num2 = '';
        let operator = '';

        function appendNumber(number) {
            displayValue += number;
            document.getElementById('display').innerText = displayValue;
        }

        function clearDisplay() {
            displayValue = '';
            num1 = '';
            num2 = '';
            operator = '';
            document.getElementById('display').innerText = '0';
        }

        function setOperation(op) {
            if (displayValue === '') return;
            num1 = displayValue;
            operator = op;
            displayValue = '';
        }

        function calculateResult() {
            if (num1 === '' || displayValue === '' || operator === '') return;
            num2 = displayValue;

            let result;
            switch (operator) {
                case '+':
                    result = parseFloat(num1) + parseFloat(num2);
                    break;
                case '-':
                    result = parseFloat(num1) - parseFloat(num2);
                    break;
                case '*':
                    result = parseFloat(num1) * parseFloat(num2);
                    break;
                case '/':
                    result = parseFloat(num1) / parseFloat(num2);
                    break;
                default:
                    return;
            }

            document.getElementById('display').innerText = result;
            displayValue = result;
            num1 = '';
            num2 = '';
            operator = '';
        }
    </script>

</body>
</html>
