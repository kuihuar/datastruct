/**
*指针实现二叉树
*/
template<class T>
bool BinaryTree<T>::isEmpty() const{
    return ((root)?true:false);
}
template<class T>
BinaryTreeNode<T>* BinaryTree<T>::getParent(BinaryTreeNode<T>* root,
BinaryTreeNode<T>* current){
   BinaryTreeNode<T>* temp;
   if(root==NULL)
       return null;
   if((root->leftChild()==current ||root->rightChild())
       return root;
   //递归找父节点

   if(temp=getParent(root->leftChild(), current)!=NULL
       return temp;
   else
      return getParent(root->rightChild(), current);
}

/////////////////////////////////////////////
template<class T>
void BinaryTree<T>::deleteBinaryTree(BinaryTreeNode<T>* root)
{
    if(root){
        deleteBinaryTree(root->left);
	deleteBinaryTree(root->right);
	delete root;
    }
}











template<class T>
void BinaryTree<T>::createTree(
const T& elem,
BinaryTree<T>& leftTree,
BinaryTree<T>& rightTree){
    //elem root node
    //leftTree: left child tree
    //rightTree: right child tree
    root=new BinaryTreeNode(elem, leftTree.root, rightTree.root);
    leftTree.root=rightTree.root=NULL;
}
