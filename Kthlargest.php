<?php
/**
 * Created by PhpStorm.
 * User: jianfenliu
 * Date: 2019/1/28
 * Time: 下午9:22
 */
class KthLargest{
    private $n;
    private $queue;
    public function __construct(Integer $n, Array $init)
    {
        $this->n=$n;
        $this->queue = new SplPriorityQueue();
        foreach ($init as $value){
            $this->queue->insert($value);
        }
    }
    public function addItem($item)
    {
        if($this->queue.count() < $this->n){
            $this->queue->insert($item);
        }elseif($this->queue->top() < $item){
            $this->queue->extract();
            $this->queue->insert($item);
        }
        return $this->queue->top();
    }
}