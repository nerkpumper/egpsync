<?php

	include 'Stack.php';

	abstract class TokenType
	{
		const Invalido    = 0;
		const Operador    = 1;
		const Operando    = 2;
		const ParentesisA = 3;
		const ParentesisB = 4;
		const Funcion     = 5;
		const Constante   = 6; 
		const Columna     = 7;
	}

	class MathEvaluator
	{
		private $expresion;
		private $notacion;
		private $isvalid;
		private $errormsg;	
		private $evaluatedValue;
		private $arrayColumns;

		public function __construct($expresion = '')
		{
			$this->expresion = $expresion;			
			$this->isvalid = '0';
			if (strlen($expresion) > 0)
				$this->getInfixNotation($this->expresion);			
			else
			{
				$this->errormsg = "No se ha definido expresión para evaluar";
			}
		}
				
		public function setColumns(&$columns)
		{
// 			echo "<br/>MathEvaluator SetColumns<br/>";
// 			var_dump($columns);
// 			echo "<br/><br/><br/>";
			$this->arrayColumns = $columns;
		}

		public function setExpresion($expresion)
		{
			$this->expresion = $expresion;			
			$this->isvalid = '0';
			if (strlen($expresion) > 0)
				$this->getInfixNotation($this->expresion);			
			else
			{
				$this->errormsg = "No se ha definido expresión para evaluar";
			}
		}

		public function isValidNotation()
		{
			return $this->isvalid;
		}

		public function getMsgError()
		{
			return $this->errormsg;
		}

		public function evaluateNotation($x = 0, $y = 0, $z = 0)
		{
			//echo '<br/><br/><br/> Notacion = ' . $this->notacion . ' <br/><br/><br/>';

			if ($this->isvalid == '0')
				return;

			$this->evaluatedvalue = $this->evaluateInfixNotation($x, $y, $z);
		}

		public function getResult ()
		{
			return $this->evaluatedvalue;
		}

		private function evaluateInfixNotation($x, $y, $z)
		{
			$pila = new Stack();
			$tokens = explode(' ', $this->notacion);
			$operando = 0.0;

			//echo '<br/><br/>EvaluateNotacion<br/>';
			foreach ($tokens as $token) 
			{				
				//echo ' Validando el  token = ' . $token . '<br/>';
				$tipo = $this->getTokenType($token);

				if ($tipo == TokenType::Operador || $tipo == TokenType::Funcion)
				{
					$this->ejecutarOperacion($pila, $token);
					if ($this->isvalid == '0')
						return 0;
				}
				else if ($tipo == TokenType::Columna)
				{                     	 
					$operando = $this->getValueColumn($token);
					if ($this->isvalid == '0')
						return 0;

					$pila->push($operando);
				}                    	
				else if (is_numeric($token))                	 	  
					$pila->push($token);                	 	  
				else if ($token == 'x')
					$pila->push($x);
				else if ($token == 'y')
					$pila->push($y);
				else if ($token == 'z')
					$pila->push($z);
				else if ($token == 'pi')
					$pila->push(M_PI);
				else if ($token == 'e')
					$pila->push(M_E);
				else
				{                								   	   
					$this->isvalid = '0';
					$this->errormsg = 'Error formato numerico no valido';
					return 0;
				}
			}

			if ($pila->length() != 1)
			{
				$this->isvalid = '0';
				$this->errormsg = 'No se ha podido evaluar la expresion';
				return 0;
			}


			return $pila->pop();
		}

		private function getValueColumn($columnName)
		{			
			$columnName = strtoupper($columnName);
			//echo '<br/>Tratando de recuperar ' . $columnName . '<br/>';
			if (isset($this->arrayColumns[$columnName]))
			{
				//echo '<br/>Si está ' . $columnName . ' y  vale =======  kkk' . $this->arrayColumns[$columnName] . 'kkk<br/>';
				if (!is_numeric($this->arrayColumns[$columnName]))
				{
					$this->isvalid = '0';
					$this->errormsg = 'Columna ' . strtoupper($columnName) . ' no definida.';
					//echo '<br/>Pos parece que no es numerica tu ' . $columnName . ' y  vale ******************************************* kkk' . $this->arrayColumns[$columnName] . 'kkk<br/>';
					return 0;
				}
				//echo '<br/>Retornando ' . $columnName . '  el valorcillo ++++++++++++++ ++++ ' . $this->arrayColumns[$columnName] . ' <br/>';
				return $this->arrayColumns[$columnName];
			}
			else
			{
				$this->isvalid = '0';
				$this->errormsg = 'Columna ' . strtoupper($columnName) . ' no definida.';
			}

			return 0;
		}

		/* Ejecuta la operacion especificada por el operador */        
		private function ejecutarOperacion($pila, $operacion)
		{
			$first = $this->getOperando($pila);
			$operando = 0;
			if ($this->isvalid == '0') return;

			switch ($operacion)
			{
				case '+':
					$operando = $this->getOperando($pila);
					if ($this->isvalid == '0') return;
					$pila->push($operando + $first);
					break;
				case '-':
					$operando = $this->getOperando($pila);
					if ($this->isvalid == '0') return;
					$pila->push($operando - $first);
					break;
				case '*':
					$operando = $this->getOperando($pila);
					if ($this->isvalid == '0') return;
					$pila->push($operando * $first);
					break;
				case '/':
					if ($first == 0) 
					{
						$this->isvalid = '0';
						$this->errormsg = 'Error division por cero';                    	
						return;
					}

					$operando = $this->getOperando($pila);
					if ($this->isvalid == '0') return;
					$pila->push($operando / $first);
					break;
				case '^':
					$operando = $this->getOperando($pila);
					if ($this->isvalid == '0') return;
					$pila->push(pow($operando, $first));
					break;
				case '%':
					$operando = $this->getOperando($pila);
					if ($this->isvalid == '0') $return;
					$pila->push($operando % first);
					break;
				case 'sin':
					$pila->push(sin($first));
					break;
				case 'cos':
					$pila->push(cos($first));
					break;
				case 'tan':
					$pila->push(tan($first));
					break;
				case 'sinh':
					$pila->push(sinh($first));
					break;
				case 'cosh':
					$pila->push(cosh($first));
					break;
				case 'tanh':
					$pila->push(tanh($first));
					break;
				case 'ln':
					$pila->push(log($first));
					break;
				case 'log':
					$pila->push(log10($first));
					break;
				case 'abs':
					$pila->push(abs($first));
					break;
				case 'sec':
					$pila->push(1 / cos($first));
					break;
				case 'csc':
					$pila->push(1 / sin($first));
					break;
				case 'cot':
					$pila->push(1 / tan($first));
					break;
				case 'sech':
					$pila->push(2 / (exp($first) + exp(-$first)));
					break;
				case 'csch':
					$pila->push(2 / (exp($first) - exp(-$first)));
					break;
				case 'coth':
					$pila->push((exp($first) + exp(-$first)) / (exp($first) - exp(-$first)));
					break;
				default:
					$this->isvalid = '0';
					$this->errormsg = 'Error operacion no admitida';
					return;                    
			}
		}


		/* Devuelve un operando de la pila */        
		private function getOperando($pila)
		{
			$operando = 0;

			if ($pila->length() == 0) 
			{
				$this->isvalid = '0';
				$this->errormsg = 'Error faltan operandos';
				return 0;
			}

			return $pila->pop();
		}
		
		/* Realizar notación infija*/
		private function getInfixNotation()
		{
			$this->notacion = '';
			$this->expresion = strtolower ($this->expresion);
			$operadores = new Stack();
			$this->isvalid = 1;
			$this->errormsg = '';

			$token = '';
			$tipo = TokenType::Invalido;
			$last = TokenType::Invalido;
			//echo '  total caracteres = ' . strlen($this->expresion) . '<br/>';

			for ($i = 0 ; $i < strlen($this->expresion) ; $i++)
			{
				$token = $this->expresion[$i];
				//echo '  token = ' . $token . '<br/>';

				if ($this->isNullOrEmptyString($token)) continue;

				if ($i + 1 < strlen($this->expresion) && $this->expresion[$i] == 'p' && $this->expresion[$i + 1] == 'i')
				{
					$token = 'pi';
					$i++;
				}

				if ($this->expresion[$i] == 'c')
				{
					for ($iaux = $i + 1 ; $iaux < strlen($this->expresion) ; $iaux ++)
					{
						if (is_numeric($this->expresion[$iaux]))
						{
							$token .= $this->expresion[$iaux];
							$i++;
						}
						else                    
							break;
					}                        
				}                
				

				$tipo = $this->getTokenType($token);

				if ($tipo == TokenType::Operando)
				{
					if ($last == TokenType::Constante || $last == TokenType::ParentesisB)
						$this->apilarOperador($operadores, '*');

					$this->notacion .= $token;                
				}
				else if ($tipo == TokenType::Constante || $tipo == TokenType::Columna)
				{
					if ($tipo == TokenType::Columna && $last == TokenType::Columna)
					{
						$this->isvalid = '0';
						$this->errormsg = 'Error falta operando.';
	                        //echo '<br/> ERROR: ' . $this->errormsg . ' linea 320' ;
						return;
					}

					$this->verificarMultiplicacionOculta($operadores, $last);
					$this->notacion .= ' ' . $token . ' ';
				}
				else if ($tipo == TokenType::Operador) 
				{
					if ($last ==  TokenType::Operador && $token != '-')
					{
						$this->isvalid = '0';
						$this->errormsg = 'Error falta operando';
	                         	//echo '<br/> ERROR: ' . $this->errormsg . ' linea 332' ;
						return;
					}

					if (($last == TokenType::Operador && $token == '-') ||
						($last == TokenType::Invalido && $token == '-') || 
						($last == TokenType::ParentesisA && $token == '-'))
					{
						$this->notacion .= ' -1 ';
						$operadores->push('*');
					}
					else $this->apilarOperador($operadores, $token);
				}
				else if ($tipo == TokenType::ParentesisA)
				{
					$this->verificarMultiplicacionOculta($operadores, $last);
					$operadores->push('(');
				}
				else if ($tipo == TokenType::ParentesisB) 
				{
					$this->desapilarParentesis($operadores);
					if ($this->isvalid == '0')
					{
	                           	        	//echo '<br/> ERROR: ' . $this->errormsg . ' linea 356' ;
						return;
					}
				}
				else
				{
					$index = strpos($this->expresion, '(', $i);
					//echo '<br/> Index para NewToken:'. $index;
					if ($index < 0) 
					{
						$this->isvalid = '0';
						$this->errormsg = 'Error en sintaxis';
						return;
					}
					$newtoken = substr($this->expresion, $i, $index - $i);
					$i = $index - 1;

					$tipo = $this->getTokenType($newtoken);
					//echo '  newtoken = ' . $newtoken . '<br/>';

					if ($tipo == TokenType::Funcion)
					{
						//echo '  funcion = ' . $newtoken . '<br/>';
						$this->verificarMultiplicacionOculta($operadores, $last);
						$operadores->push($newtoken);                        					
					}
					else
					{
						$this->isvalid = '0';
						$this->errormsg = 'Error de sintaxis';                    						
						return;
					}                     						
				}
				$last = $tipo;	            
			}

			if ($last == TokenType::Operador)
			{
				$this->isvalid ='0';
				$this->errormsg = 'Error de Sintaxis';
				return;
			}

			$this->vaciarOperandos($operadores);
			if ($this->isvalid == '0')
				return;

			$this->removerEspaciosVacios();
		}
		
		/* Elimina espacios en blanco innecesarios */
		private function removerEspaciosVacios()
		{
			do
			{
				$this->notacion = str_replace('  ', ' ', trim($this->notacion), $count);
			}
			while($count > 0);

		}

		/* Envia todos los operadores restantes en la pila a la salida */
		private function vaciarOperandos($operadores)
		{
			$this->notacion .= ' ';

			while ($operadores->length() > 0)
			{
				$sop = $operadores->pop();

				if ($sop == '(')
				{
					$this->isvalid = '0';
					$this->errormsg = 'Error falta parentesis de cierre )';
					return;                    
				}

				$this->notacion .=  $sop . ' ';
			}
		}


		/* Envia a la salida todos los operadores hasta encontrar un parentesis */
		private function desapilarParentesis($operadores)
		{
			$sop = $operadores->pop();
			$this->notacion .= ' ';

			while ($sop != '(')
			{
				$this->notacion .= $sop . ' ';

				if ($operadores->length() == 0) 
				{   
					$this->isvalid = '0';
					$this->errormsg = 'Error falta parentesis de apertura (';
					return;
				}

				$sop = $operadores->pop();
			}            
		}

		/*Verifica si hay una multiplicación oculta y la procesa*/
		private function verificarMultiplicacionOculta($operadores, $last)
		{
			if ($last == TokenType::Constante || $last == TokenType::Operando || $last == TokenType::ParentesisB)
				$this->apilarOperador($operadores, '*');
		}

		/* Apila los Operadores */
		private function apilarOperador($stackOperadores, $token)
		{
			$this->notacion .= ' ';
			if ($stackOperadores->length() > 0) $this->desapilarOperando($token, $stackOperadores);
			$stackOperadores->push($token);
		}

		/*Desapila los Operandos*/
		private function desapilarOperando($operador, $stackOperadores)
		{
			$pc = $this->getPrioridad($operador);
			$op = $stackOperadores->pop();
			$po = $this->getPrioridad($op);

			while ($pc <= $po)
			{
				$this->notacion .= $op . ' ';

				if ($stackOperadores->length() == 0) break;

				$op = $stackOperadores->pop();
				$po = $this->getPrioridad($op);
			}

			if ($pc > $po)
				$stackOperadores->push($op);
		}

		/*Determina la prioridad del operando*/
		private function getPrioridad($operando)
		{
			switch ($operando)
			{
				case '(':
				return 0;
				case '+':
				case '-':
				return 1;
				case '*':
				case '/':
				case '%':
				return 2;
				case '^':
				return 3;
				default:
				return 4;
			}
		}

		/*Obtiene el tipo del token*/
		private function getTokenType ($token)
		{
			if (is_numeric($token) || $token == '.') return TokenType::Operando;
			//echo '<br/> getTokenType ---  ' . $token . '<br/>';

			if (strlen($token) == 0) return TokenType::Invalido;

			if ($token[0] == 'c' && strlen($token) > 1) 
			{
				if (is_numeric($token[1]))
					return TokenType::Columna;
			}

			switch ($token) 
			{
				case '/':
				case '*':
				case '-':
				case '+':
				case '^':
				case '%':
				return TokenType::Operador;
				case 'e':
				case 'x':
				case 'y':
				case 'z':
				case 'pi':
				return TokenType::Constante;
				case '(':
				return TokenType::ParentesisA;
				case ')':
				return TokenType::ParentesisB;
				case 'sin':
				case 'cos':
				case 'tan':
				case 'sinh':
				case 'cosh':
				case 'tanh':
				case 'ln':
				case 'log':
				case 'abs':
				case 'sec':
				case 'csc':
				case 'cot':
				case 'sech':
				case 'csch':
				case 'coth':
	                //agregar una nueva funcion aqui.
	                	//echo '<br/><br/> ' . $token . ' es una FUNCION<br/>';
				return TokenType::Funcion;
				default:
				return TokenType::Invalido;
			}
		}

		private function isNullOrEmptyString($question){
			return (!isset($question) || trim($question)==='');
		}		
	}