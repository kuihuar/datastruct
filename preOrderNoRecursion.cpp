template <class T>
void BinaryTree<T>::PreOrderWithoutRecursion(BinaryTreeNode<T>* root)
{
    using std::stack;
    stack<BinaryTreeNode<T>* > aStack;
    BinaryTreeNode<T>* pointer=root;
    aStack.push(NULL);
    while(pointer){
        visit(pointer->value());
	if(pointer->right() != NULL)
	    aStack.push(pointer->rightChild());
	    if(pointer->leftChild() != NULL)
	        pointer=pointer->leftChild();
            else{
	        pointer=aStack.pop();
		aStack.pop();
	    }
    }
    
}
