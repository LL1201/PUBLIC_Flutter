<?php
$operazione=$_POST['cmbOperazioni'];
$addendo1=$_POST['txt1'];
$addendo2=$_POST['txt2'];
$risultato;
switch  ($operazione)
{
    case "+":
        $risultato = $addendo1 + $addendo2;
        break;
    case "-":
        $risultato = $addendo1 - $addendo2;
        break;
    case "*":
        $risultato = $addendo1 * $addendo2;
        break;
    case "/":
        $risultato = $addendo1 / $addendo2;
        break;
        
    default: 
}
echo "Risultato: $risultato";
?>
