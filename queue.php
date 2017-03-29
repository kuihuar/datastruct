<?php
/**
 * @$front int
 * @rear int
 * @$qlist
 */
class Queue{
	private $front;//前
	private $rear;//尾
	private $qList;
	private $maxSize;
	//private $currLen;
	public function __contruct($size){
		$this->front = 0;
		$this->rear = 0;
		$this->maxSize = $size;
		$this->qList=array($this->maxSize);
	}

	//区分空和满的状态，不借助$this->currLen

	private function isEmpty(){
		return $this->front == $this->rear;
	}
	private function isFull(){
		return ($this->front - $this->rear) == $this->maxSize;
	}
	public function enqueue($item){
		if($this->front - $this->rear == $this->maxSize){
			$this->currLen++;
			$this->qList[$this->rear] = $item;
			$this->rear = ($this->rear +1) % $this->maxSize;
		}
	}
	public function dequeue(){
		if($this->currLen == 0){
			return false;
		}
		$temp = $this->qList[$front];
		$this->currLen--;
		$this->front = ($this->front+1) % $this->maxSize;
		return $temp;
	}

}