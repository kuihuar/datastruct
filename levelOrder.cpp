temploate<class T>
void binaryTree<T>::levelOrder(BinaryTreeNode<T>* root)
{
    using std::queue;
    queue<BinaryTreeNode<T>* aQueue;
    BinaryTreeNode<T>* pointer=root;
    if(pointer)
        aQueue.push(pointer);
	while(!aQueue.empty(){
	    pointer=aQueue.front();
	    visit(pointer->value());
	    aQueue.pop();
	    if(pointer->leftChild())
	        aQueue.push(pointer->leftChild());
	    if(pointer->rightChild())
	        aQueue.push(pointer->rightChild();
	}
}
