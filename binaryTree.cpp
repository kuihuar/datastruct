template <class T> class BinaryTree{
private:
	BinaryTreeNode<T>* root;
public:
	BinaryTree(root=NULL);
	~BinaryTree(){deleteBinaryTree(root);};

	bool isEmpty() const;//const 函数不能修改数据成员
	BinaryTreeNode<T>* root(){return root;};//返回根节点
	BinaryTreeNode<T>* parent(BinaryTreeNode<T>* current);//返回父节点
	BinaryTreeNode<T>* leftSibling(BinaryTreeNode<T>* current);//左兄弟节点
	BinaryTreeNode<T>* rightSibling(BinaryTreeNode<T>* current);
	void createTree(const T& elem, BinaryTree<T>& leftTree, BinaryTree<T> & rightTree);
	void preOrder(BinaryTreeNode<T>* root);
	void inOrder(BinaryTreeNode<T>* root);
	void postOrder(BinaryTreeNode<T>* root);
	void levelOrder(BinaryTreeNode<T> root);//按层次周游二叉树及其子树
	void deleteBinaryTree(BinaryTreeNode<T>* root);//删除二叉树及其子结

	//周游： 每个节点正好被访问一次，把二叉树的结点放入一个线性序列的过程
	//递归深度优先周游
	//非递归深度优先
	//广度优先

	//前 访问根节点，前序左子树， 前序右子树
	//  tlr  A B D C E G F H I
	//中 中序左子树，访问根节点， 中序右子树
	//ltr  D B A E G C H F I 
	//后 后序左子树，后序右子树， 访问根节点
	//lrt  D B G E H I F C A
};
template<class T>
void BinaryTree<T>::potOrderWithoutRecursion(BinaryTreeNode<T>* root)
{
	using std::stack;
	stack<BinaryTreeNode<T>* > astack;
	BinaryTreeNode<T>* pointer = root;
	while(!astack.empty() || pointer)
	{
		while(pointer !=NULL){
			element.pointer = pointer;
			element.tag = left;
			astack.push(element);
			pointer=pointer->leftSibling();
		}
		element = astack.top();
		astack.pop();
		pointer = element.pointer;
		if(element.tag=left){
			element.tag = right;
			astack.push(element);
			pointer = pointer->rightSibling();
		}else{
			visit(pointer->value());
			pointer = NULL;
		}
	}
}










//用栈去实现
template<class T>
void BinaryTree<T>::depthOrder(BinaryTreeNode<T>* root){
	if(root != NULL){
		//前序
		visit(root);
		depthOrder(root->leftSibling());
		depthOrder(root->rightSibling());

		//中序
		depthOrder(root->leftSibling());
		visit(root);
		depthOrder(root->rightSibling());
		//后序
		depthOrder(root->leftSibling());
		depthOrder(root->rightSibling());
		visit(root);
	}	
}


template<class T>
void BinaryTree<T>::preOrderWithoutRecursion(BinaryTreeNode<T>* root)
{
	using std::stack;
	stack<BinaryTreeNode<T>* > astack;
	BinaryTreeNode<T>* pointer = root;
	while(!astack.empty() || pointer)
	{
		if(pointer)
		{
			visit(pointer->value());
			astack.push(pointer);
			pointer = pointer->leftSibling();
		}
		else
		{
			pointer=astack.top();
			astack.pop();
			pointer=pointer->rightSibling();
		}
	}
}

/*思想
 *遇到一个站点，就把它推入栈中，并去周游它的左子树
 *周游完左子树之后，从栈顶弹出这个节点并访问之，然后按照它的链接指示的地址再去周游该节点的右子树
 */
enum Tags{left, right};
template<class T>
class StackElement{
public:
	BinaryTreeNode<T>* pointer;
	Tags tag;
};
template <class T>
void BinaryTree<T>::postOrderWithoutRecursion(BinaryTreeNode<T>* root){
	using std::Stack;
	Stack<StackElement<T>> astack;
	BinaryTreeNode<T>* pointer;
	if(root == NULL) return;

	pointer = root;
	while(true){
		while(pointer != NULL){
			//前序访问点
			element.pointer = pointer;
			element.tag = left;
			astack.push(element);
			pointer=pointer->leftSibling();
		}
		element = astack.top();
		astack.pop();
		pointer=element.pointer;
		while(element.tag == right){
			visit(pointer->value());
			if(astack.isEmpty())
				return;
			element=astack.top();
			astack.pop();
			pointer=element.pointer;
		}
		//中序访问点
		element.tag=right;
		astack.push(element);
		pointer=pointer->rightSibling();

	}
}
 /**
  * 后序思想
  * 遇到一个节点，把它放入栈中，周游它的左子树
  * 周游结束后， 还不能马上访问处于栈顶的该节点，
  * 而是要按照它的右链接结构指示的地址去周游该结
  * 点的右子树
  * 周游遍右子树后才能从栈顶托出该节点并访问之
template <class T>
void BinaryTree<T>::inOrderWithoutRecursion(BinaryTreeNode<T>* root){
	using std::stack;
	stack<BinaryTreeNode<T>* > astack;
	BinaryTreeNode<T>* pointer=root;
	while(!astack.empty() || pointer){
		if(pointer){
			astack.push(pointer);
			pointer=pointer->leftSibling();
		}else{
			pointer = astack.top();
			astack.pop();
			visit(pointer->value());
			pointer=pointer->rightSibling();

		}
	}
}






















