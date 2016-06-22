<?php
 
class Stack {
 
	/**
	 * @var Stack El objeto que contiene la Pila
	 */
	private $stack;
  
	/**
	 * Constructor. Crea la pila
	 */
	public function __construct(){
		$this->stack = array();
	}
	
	/**
	 * Inserta un elemento en el tope de la pila.
	 * El formato $array[]=$v es m�s eficiente para un elemento que la funci�n nativa array_push()
	 *
	 * @param mixed $v Elemento a insertar
	 */
	public function push($v){
		$this->stack[] = $v;
	}
	
	/**
	 * Remueve el elemento al tope de la pila y lo regresa
	 *
	 * @return mixed El elemento del tope.
	 * Si la pila est� vac�a devolver� NULL
	 */
	public function pop(){
		return array_pop($this->stack);
	}
	
	/**
	 * Checa si la pila est� vac�a
	 *
	 * @return boolean True si est� vac�a, false caso contrario
	 */
	public function isEmpty(){
		return empty($this->stack);
	}
	
	/**
	 * Cuenta el tama�o de la pila
	 *
	 * @return int El tama�o de la pila
	 */
	public function length(){
		return count($this->stack);
	}
	
	/**
	 * Observa el ultimo elemento de la pila, sin removerlo
	 * 
	 * @return mixed El �ltimo elemento de la pila
	 */
	public function peek(){
		return $this->stack[($this->length() - 1)];
	}
}