<?php
/*для того, чтобы в папке открывался не index.php, необходимо в папке с проектом создать файл .htaccess и а нем написать:

DirectoryIndex default.html

соответвенно вместо default.html впишите имя своего файла*/


//функция, принимающая массив строк и выводящая каждую в отдельном параграфе
function paragraph($arr) {
	foreach ($arr as $value) {
		if (gettype($value) == 'string') {
			echo '<p>'.$value.'</p>';
		}
	}

}
$myArray = array('Вася идет домой', 'Петя ест кашу', 'Коля пишет письмо');
paragraph($myArray);

/*функция, принимающая 2 параметра: массив чисел и строку, обозначающуюарифметическое действие,
которое нужно выполнить со всеми элементами массива.
Функция должна выводить результат на экран.*/

function arifmetica($myArray, $action) {
	switch ($action) {
		case 'сложение':
			$sum;
			for ($i = 0; $i < count($myArray); $i++) {
				if (gettype($myArray[$i]) == 'integer' || gettype($myArray[$i]) == 'double') {
					$sum += $myArray[$i];
				}
			}
			echo "Сумма числовых элементов массива равна " . $sum;
			break;
		case 'вычитание':
			$dif;
			$j = 0;
			while ($j < count($myArray)) {
				if (gettype($myArray[$j]) != 'integer' && gettype($myArray[$j]) != 'double') {
					$j++;
				} else {
					$dif = $myArray[$j];
					break;
				}				
			}		
			for ($i = $j+1; $i < count($myArray); $i++) {
				if (gettype($myArray[$i]) == 'integer' || gettype($myArray[$i]) == 'double') {
					$dif -= $myArray[$i];					
				}
			}	
			echo "Разность между первым числовым и остальными числовыми элементами массива равна " . $dif;
			break;
		case 'умножение':
			$comp = 1;
			for ($i = 0; $i < count($myArray); $i++) {
				if (gettype($myArray[$i]) == 'integer' || gettype($myArray[$i]) == 'double') {
					$comp = $comp * $myArray[$i];
				}
			}
			echo "Произведение числовых элементов массива равно " . $comp;
			break;
		case 'деление':
			$quot;
			$j = 0;
			while ($j < count($myArray)) {
				if (gettype($myArray[$j]) != 'integer' && gettype($myArray[$j]) != 'double') {
					$j++;
				} else {
					$quot = $myArray[$j];
					break;
				}				
			}		
			for ($i = $j+1; $i < count($myArray); $i++) {
				if (gettype($myArray[$i]) == 'integer' || gettype($myArray[$i]) == 'double') {
					$quot = $quot / $myArray[$i];					
				}
			}
			echo "Частное от деления первого числового элемента массива на остальные элементы равна " . $quot;
			break;
		case 'возведение в степень':
			$involut;
			$j = 0;
			while ($j < count($myArray)) {
				if (gettype($myArray[$j]) != 'integer' && gettype($myArray[$j]) != 'double') {
					$j++;
				} else {
					$involut = $myArray[$j];
					break;
				}				
			}		
			for ($i = $j+1; $i < count($myArray); $i++) {
				if (gettype($myArray[$i]) == 'integer' || gettype($myArray[$i]) == 'double') {
					$involut = $involut ** $myArray[$i];					
				}
			}
			echo "Результат возведения первого числового элемента массива в степень, равную остальным числовым элементам (по порядку), равен " . $involut;
			break;
		case 'извлечение корня':
			$extract;
			$j = 0;
			while ($j < count($myArray)) {
				if (gettype($myArray[$j]) != 'integer' && gettype($myArray[$j]) != 'double') {
					$j++;
				} else {
					$extract = $myArray[$j];
					break;
				}				
			}		
			for ($i = $j+1; $i < count($myArray); $i++) {
				if (gettype($myArray[$i]) == 'integer' || gettype($myArray[$i]) == 'double') {
					$extract = pow($extract, 1 / $myArray[$i]);	
				}
			}
			echo "Результат извлечения корня из первого числового элемента массива равен " . $extract;
			break;
		default:
			echo 'Введите арифметическое дествие корректно.';
			break;
	}
};

$numbers = array('vfv', 11, 0.2, 5, 'тут');
arifmetica($numbers, 'извлечение корня');

/*функция, принимающая переменное кол-во аргументов, но первым аргументом должна быть строка,
 обозначающая арифметическое действие, которое необходимо выполнить со всеми передаваемыми аргументами.*/
function free_arifmetica() {
	if (func_get_arg(0)) {
		$first = func_get_arg(0);
		if (gettype($first) == 'string') {
			$arg_list = func_get_args();
			arifmetica($arg_list, $first);
		} else {
			echo "первым аргументом должна быть строка,
 			обозначающая арифметическое действие, которое необходимо выполнить со всеми передаваемыми аргументами";	
		};


	} else {
		echo "введите хотя бы один параметр";
	};

}
free_arifmetica('вычитание', 7, 'мама', 1, 5);
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Таблица умножения</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<style>
    table {
        background: #ffc6d6;
        border-collapse: collapse;
        /*padding: 20px; /* Поля вокруг текста */
    }
    td {
        border: 1px solid #000;
        padding: 20px;
    }
</style>
</head>
<body>
<?php
/*Функция принимающая два параметра ­ 2 целых числа.
Если вводятся не 2 целых числа­ то функция должна выводить ошибку наэкран.
Если пользователь вводит 2 целых числа ­ то ему должна отрисовываться таблица умножения
размером со значения параметров, переданных функции. */

function mult_table($a, $b) {
	if (is_integer($a) && is_integer($b)) {
		echo '<table>';
        for ($j = 1; $j <= $b; $j++) {
			echo "<tr>";
                for ($i = 1; $i <= $a; $i++) {
                    echo "<td>" . $i * $j . "</td>";
                }
            echo "</tr>";
		}
        echo '</table>';
	} else {
		echo "ошибка, введите 2 целых числа!";
	}
}
mult_table(6, 5);
?>

<?php

/*Функция, принимающая в качестве аргумента массив чисел вида: 1, 22, 5, 66, 3, 57
и возвращает массив по возрастанию: 1, 3, 5, 22, 57, 66 */

function sort_arr($arr){
	echo 'Исходный массив: ' . join(', ', $arr) . '<br>';
	for ($i = 0; $i < count($arr); $i++) {
		for ($j = $i + 1; $j < count($arr); $j++) {
			if ($arr[$i] > $arr[$j]) {
				$a = $arr[$i];
				$arr[$i] = $arr[$j];
				$arr[$j] = $a;
			}
		}
	}
	echo 'Массив с элементами, отсортированными по возрастанию: ' . join(', ', $arr) . '<br>';
}
$myArr = array(5, 7, 9, 3, 1, 4, 3);
sort_arr($myArr);
?>

<?php

/*Рекурсивную функцию, принимающую два целых числа ­ начальное значение и
конечное значение. Например, первый аргумент 10, второй ­ 35. Функция должна
вывести на список нечетных чисел от 10 до 35 */

function odd_interval($a, $b)
{
	if (gettype($a) == 'integer' && gettype($b) == 'integer') {
		if ($a <= $b) {
			if ($a % 2 == 0) {
				echo ++$a . '<br>';
				$a += 2;
			} else {
				echo $a . '<br>';
				$a += 2;
			}
			odd_interval($a, $b);
		} else {
			return;
		}
	} else {
		echo 'Функция принимает только целые числа';
	}
}

odd_interval(1, 15);
?>

<?php

/*Функция, получающая 1 параметр (строку) и возвращающая TRUE ­ если строка
является палиндромом, FALSE ­ в противном случае.*/

function check_polindrom($string){
	$delim = ' ';
	$arr = explode($delim, $string);
	$string = implode($arr);
	$string = mb_strtolower($string);
	function utf8_strrev($str){
		preg_match_all('/./us', $str, $ar);
		return join('', array_reverse($ar[0]));
	}
	$reverce = utf8_strrev($string);
	if ($string === $reverce) {
		return true;
	}else{
		return false;
	}
}
$mySentence = 'Жили у бабуси 2 ису бабу ил иж';
check_polindrom($mySentence);
?>

