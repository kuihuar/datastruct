template <class T>
void BinarySearchTree::insertNode(BinaryTreeNode<T>* root, BinaryTreeNode<T> * newPointer){
    BinaryTree<T>* pointer=NULL;
    if(NULL==root){
        initialize(newPointer);
	return;
    }else{
        pointer=root;
    }
    while(1){
    	if(newPointer->value() ==pointer.value()){
	    return;
	}else if(newPointer->value()<pointer.value()){
	    if(pointer->leftChile()==NULL){
	        pointer-left=newpointer;
		return;
	    }else{
	        pointer=pointer->leftChile();
	    }
	}else{
	    if(pointer->rightChild()==NULL){
	        pointer->rightChild()=newPointer;
		return;
	    }else{
	        pointer=pointer->rightChild();
	    }
	}
    }
}
