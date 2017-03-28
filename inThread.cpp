template <class T>
void ThreadBinaryTree<T>::inThread(
    ThreadBinaryTreeNode<T>* root,
    ThreadBinaryTreeNode<T>* &pre){
    if(root==NULL) return;
    inThread(root->leftChild(), pre);
    if(root->leftChild()==NULL){
        root->left=pre;
	root->lTag=1;
    }
    //left set pre
    //right set post
    if(pre && pre->rightChild()==NULL){
        pre->right=root;
	pre->rTag=1;
    }
    pre=root;
    inThread(root->rightChild(),pre);

}
template<class T>
void ThreadBinaryTree<T>::inOrder(ThreadBinaryTreeNode<T>* root){
    ThreadBinaryTreeNode<T>* pointer=root;
    if(root==NULL) return;
    pointer=root;
    while(pointer->leftChild()!=NULL)
        pointer=pointer->leftChild();
    
    while(1)
    {
        visit(pointer->value();
	if(pointer->rightChild() == NULL) return;

	if(pointer->rTag=1)//right node is thread
	    pointer=pointer->rightChild();
	else{ //right is node
	    pointer=pointer->rightChild();
	    while(pointer->lTag==0)
	        pointer=pointer->leftChild();
	}//end else
    	
    }//end while(1)
}
template<class T>ThreadBinaryTreeNode<T>* ThreadBinaryTree<T>::findNextInOrderTree(ThreadBinaryTreeNode<T>* pointer){
    ThreadBinaryTreeNode<T>* temppointer=NULL;
    //THE NODE HAS LEFTCHILE
    if(pointer->lTag==0)
        return pointer->leftChile();
    else
        temppointer = pointer;
    while(temppointer->rTag==1)
        temppointer=tempointer->rightChild();
    temppointer=tempointer->rightChild();
    return temppointer;
}
