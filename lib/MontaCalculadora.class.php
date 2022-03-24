<?php


class MontaCalculadora {

    private $value;

	/**
	 * Constructor.
	 * @param $value
	 */
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
                case 'CE':
                    $_SESSION['RESULTADO'] = 0;
                    $_SESSION['OPERADOR'] = '';
                    $_SESSION['NUM'] = 0;
                    break;
                case '=':
                    $this->realizaCalculo();
                    $_SESSION['NUM'] = $_SESSION['RESULTADO'];
                    $_SESSION['RESULTADO'] = 0;
                    break;
                case '+':
                    if($_SESSION['OPERADOR'] != ''){
                        $this->realizaCalculo();
                    }
                    $_SESSION['OPERADOR'] = '+';
                    $_SESSION['RESULTADO'] = $_SESSION['NUM'];
                    $_SESSION['NUM'] = 0;
                    break;
                case '-':
                    if($_SESSION['OPERADOR'] != ''){
                        $this->realizaCalculo();
                    }
                    $_SESSION['OPERADOR'] = '-';
                    $_SESSION['RESULTADO'] = $_SESSION['NUM'];
                    $_SESSION['NUM'] = 0;
                    break;
                case 'X':
                    if($_SESSION['OPERADOR'] != ''){
                        $this->realizaCalculo();
                    }
                    $_SESSION['OPERADOR'] = 'X';
                    $_SESSION['RESULTADO'] = $_SESSION['NUM'];
                    $_SESSION['NUM'] = 0;
                    break;
                case '%':
                    if($_SESSION['OPERADOR'] != ''){
                        $this->realizaCalculo();
                    }
                    $_SESSION['OPERADOR'] = '%';
                    $_SESSION['RESULTADO'] = $_SESSION['NUM'];
                    $_SESSION['NUM'] = 0;
                    break;
            }
        }
        $this->value = ($_SESSION['NUM'] <> 0 ? $_SESSION['NUM'] : $_SESSION['RESULTADO']);
	}

    private function realizaCalculo(){
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
        $html .= new VisorCalculadora($this->value);
        $html .= "<div class='row'> \n";
        $html .= new BotaoCalculadora("num", "7");
        $html .= new BotaoCalculadora("num", "8");
        $html .= new BotaoCalculadora("num", "9");
        $html .= new BotaoCalculadora("op", "%");
        $html .= "</div> \n";
        $html .= "<div class='row'> \n";
        $html .= new BotaoCalculadora("num", "4");
        $html .= new BotaoCalculadora("num", "5");
        $html .= new BotaoCalculadora("num", "6");
        $html .= new BotaoCalculadora("op", "X");
        $html .= "</div> \n";
        $html .= "<div class='row'> \n";
        $html .= new BotaoCalculadora("num", "1");
        $html .= new BotaoCalculadora("num", "2");
        $html .= new BotaoCalculadora("num", "3");
        $html .= new BotaoCalculadora("op", "+");
        $html .= "</div> \n";
        $html .= "<div class='row'> \n";
        $html .= new BotaoCalculadora("num", "0");
        $html .= new BotaoCalculadora("op", "c");
        $html .= new BotaoCalculadora("op", "=");
        $html .= new BotaoCalculadora("op", "-");
        $html .= "</div> \n";
        $html .= "</form> \n";
        
		return $html;
	}

}