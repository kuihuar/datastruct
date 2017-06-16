temploate <class T>
void binarySearchTree::deleteNode(BinaryTreeNode<T>*pointer){
    BinaryTreeNode<T>* tempPointer=NULL;
    BinaryTreeNode<T>* parent=getParent(root,pointer);

    if(pointer->leftChild()==NULL)
    {
        if(pointer->leftChild()!=NULL){
	    child=tempointer=pointer->leftChild();
	    while(temppointer-<rightChild()!=NULL){
	        temppointer=temppointer->rightChild();
		temppointer->right=pointer->rightChild();
	    }
	{

    }else{
        child=pointer->rightChild();
    }

    if(parent==NULL)
       root=child;
    else if(parent->leftChild()==pointer)
        parent->left=child;
    else
        parent->right=child;
    delete pointer;pointer=NULL;
}
