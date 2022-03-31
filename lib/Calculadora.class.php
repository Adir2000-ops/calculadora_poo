<?php

class Calculadora {

    private $value;

	public function __construct() {
        if(!isset($_SESSION['NUM'])){
            $_SESSION['NUM'] = 0;
            $_SESSION['RESULTADO'] = 0;
            $_SESSION['OPERADOR'] = '';
        }
        if(isset($_POST['num'])){
            if($_SESSION['NUM'] == 0){
                $_SESSION['NUM'] = $_POST['num'];
            } else {
                $_SESSION['NUM'] = $_SESSION['NUM'] . $_POST['num'];
            }
        }
        if(isset($_POST['op'])){
            switch ($_POST['op']){
                case 'C':
                    $_SESSION['RESULTADO'] = 0;
                    $_SESSION['OPERADOR'] = '';
                    $_SESSION['NUM'] = 0;
                    break;
                case '=':
                    $this->Calcular();
                    $_SESSION['NUM'] = $_SESSION['RESULTADO'];
                    $_SESSION['RESULTADO'] = 0;
                    break;
                case '+':
                    if($_SESSION['OPERADOR'] != ''){
                        $this->Calcular();
                    }
                    $_SESSION['OPERADOR'] = '+';
                    $_SESSION['RESULTADO'] = $_SESSION['NUM'];
                    $_SESSION['NUM'] = 0;
                    break;
                case '-':
                    if($_SESSION['OPERADOR'] != ''){
                        $this->Calcular();
                    }
                    $_SESSION['OPERADOR'] = '-';
                    $_SESSION['RESULTADO'] = $_SESSION['NUM'];
                    $_SESSION['NUM'] = 0;
                    break;
                case 'X':
                    if($_SESSION['OPERADOR'] != ''){
                        $this->Calcular();
                    }
                    $_SESSION['OPERADOR'] = 'X';
                    $_SESSION['RESULTADO'] = $_SESSION['NUM'];
                    $_SESSION['NUM'] = 0;
                    break;
                case '%':
                    if($_SESSION['OPERADOR'] != ''){
                        $this->Calcular();
                    }
                    $_SESSION['OPERADOR'] = '%';
                    $_SESSION['RESULTADO'] = $_SESSION['NUM'];
                    $_SESSION['NUM'] = 0;
                    break;
            }
        }
        $this->value = ($_SESSION['NUM'] <> 0 ? $_SESSION['NUM'] : $_SESSION['RESULTADO']);
	}

    private function Calcular(){
        switch ($_SESSION['OPERADOR']){
            case '+':
                $_SESSION['RESULTADO'] = $_SESSION['RESULTADO'] + $_SESSION['NUM'];
                break;
            case '-':
                $_SESSION['RESULTADO'] = $_SESSION['RESULTADO'] - $_SESSION['NUM'];
                break;
            case 'X':
                $_SESSION['RESULTADO'] = $_SESSION['RESULTADO'] * $_SESSION['NUM'];
                break;
            case '%':
                $_SESSION['RESULTADO'] = floatval($_SESSION['RESULTADO']) / floatval($_SESSION['NUM']);
                break;
        }
        $_SESSION['OPERADOR'] = '';
        $_SESSION['NUM'] = 0;
    }

	public function __toString() {
        $html = "<form method='post' class='container calculadora' action='index.php'> \n";
        $html .= new Result($this->value);
        $html .= "<div class='row'> \n";
        $html .= new Button("num", "1");
        $html .= new Button("num", "2");
        $html .= new Button("num", "3");
        $html .= new Button("op", "+");
        $html .= "</div> \n";
        $html .= "<div class='row'> \n";
        $html .= new Button("num", "4");
        $html .= new Button("num", "5");
        $html .= new Button("num", "6");
        $html .= new Button("op", "-");
        $html .= "</div> \n";
        $html .= "<div class='row'> \n";
        $html .= new Button("num", "7");
        $html .= new Button("num", "8");
        $html .= new Button("num", "9");
        $html .= new Button("op", "x");
        $html .= "</div> \n";
        $html .= "<div class='row'> \n";
        $html .= new Button("num", "0");
        $html .= new Button("op", "c");
        $html .= new Button("op", "%");
        $html .= new Button("op", "=");
        $html .= "</div> \n";
        $html .= "</form> \n";
        
		return $html;
	}

}