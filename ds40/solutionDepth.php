<?php
/**
 * Created by PhpStorm.
 * User: jianfen1
 * Date: 2019/1/30
 * Time: 5:39 PM
 */

class TreeNode{
    public $val = null;
    public $left = null;
    public $right = null;
    public function __construct($val){$this->val = $val;}
}
class Solution{
    public function minDepth(TreeNode $root){
        if(!$root) return 0;//结束条件
        if(!$root->left) return $this->minDepth($root->right) + 1;
        if(!$root->right) return $this->minDepth($root->left) + 1;

        $leftpath = $this->minDepth($root->left) + 1;
        $rightpath = $this->minDepth($root->right) + 1;

        return min($leftpath, $rightpath);


    }
    public function minDepth1(TreeNode $root){
        if(!$root) return 0;
        $leftpath = $this->minDepth1($root->left);
        $rightpath = $this->minDepth1($root->right);
        return ($leftpath == 0 || $rightpath == 0)?($leftpath + $rightpath + 1):1+mim($leftpath, $rightpath);
    }


    public function maxDepth(TreeNode $root){
        if(!$root) return 0;
        // 1 表求自己本身这一层
        return max($this->maxDepth($root->left), $this->maxDepth($root->right)) + 1;
    }
}