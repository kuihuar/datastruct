template<class T>
class TreeNode
{
private:
	T m_value;
	TreeNode<T>* pChild;
	TreeNode<T>*pSibling;
public:
	TreeNode(const T&);//拷贝构造函数
	virtual ~TreeNode(){};
	bool isLeaf();
	T Value();
	TreeNode<T>* LeftMostChild();
	TreeNode<T>* RightSibling();
	void setValue(T&);//设置节点的值
	void setChild(TreeNode<T>* pointer);//设置左子节点
	void setSibling(TreeNode<T>* pointer);
	void InsertFirst(TreeNode<T>* node);//以第一个左子节点身份插入结点
	void InsertNext(TreeNode<T>* node);//以右兄弟的身份加入
};
template<class T>TreeNode<T>::TreeNode(const T& value)
{
	m_value=value;
	pChild=NULL;
	pSibling=NULL;
}
template<class T>T TreeNode<T>::value()
{
	return m_value;
}
template<class T> bool TreeNode<T>::isLeaf()
{
	if(pChild==NULL)
		return true;
	return false;
}
template <class T>*TreeNode<T>::LeftMostChild()
{
	return pChild;
}
template<class T>*TreeNode<T>::RightSibling()
{
	return pSibling;
}
template<class T>void TreeNode<T>::setValue(T& value)
{
	m_value=value;
}
template<class T>
void TreeNode<T>::setChild(TreeNode<T>* pointer)
{
	pChild=pointer;
}
template<class T>
void TreeNode<T>::setSibling(TreeNode<T>* pointer)
{
	pSibling=pointer;
}
template<class T>
void TreeNode<T>::InsertFirst(TreeNode<T>* node)
{
	if(!pChild){
		pChild = node;
	}else{
		//不好理解啊
		node->pSibling=pChild;
		pChild=node;
	}
}
template<class T>
void TreeNode<T>::InsertNext(TreeNode<T>* node)
{
	if(!pSibling)
	{
		pSibling=node;
	}
	else
	{
		node->pSibling=pSibling;
		pSibling=node;
	}
}

//树的后根对应二叉树的中序
template<class T> class Tree
{
public:
	Tree();
	virtual ~Tree();
	TreeNode<T>* getRoot();
	void createRoot(const T& rootValue);
	bool isEmpty();
	TreeNode<T>* parent(TreeNode<T>* current);
	//找上一级的兄弟
	TreeNode<T>* prevSibling(TreeNode<T>* current);
	void deleteSubTree(TreeNode<T>* subroot);
	//深度
	void rootFirstTraverse(TreeNode<T>* root);
	void rootLastTraverse(TreeNode<T>* root);
	//广度
	void widthTraverse(TreeNode<T>* root);

};
template<class T> Tree<T>::~Tree()
{
	while(root)
		deleteSubTree(root);
}
template <class T> 
TreeNode<T>* Tree<T>::getRoot()
{
	return root;
}
template<class T>
void Tree<T>::createRoot(const T& rootValue)
{
	if(!root)
		root=new TreeNode<T>(rootValue);
}
template<class T>
bool Tree<T>::isEmpty()
{
	if(root)
		return false;
	return true;
}
template <class T>
TreeNode<T>* Tree<T>::prevSibling(TreeNode<T>* current)
{
	using std::queue;
	queue<TreeNode<T>*> aQueue;
	TreeNode<T>* pointer=root;
	TreeNode<T>* prev=NULL;

	if(current==NULL || pointer==NULL || current==pointer)
		return NULL;
	while(pointer){
		if(pointer==current)
			return prev;
		aQueue.push(pointer);
		prev=pointer;
		pointer=pointer->pSibling;
	}
	while(aQueue.empty()){
		prev=NULL;
		pointer=aQueue.front();
		aQueue.pop();
		pointer=pointer->LeftMostChild();
		while(pointer){
			if(pointer==current){
				return prev;
			}
			aQueue.push(pointer);
			prev=pointer;
			pointer=pointer->pSibling;

		}//end while
	}//end while;
	return NULL;
}
TreeNode<T>* Tree<T>::getParent(TreeNode<T>* root, TreeNode<T>* current)
{
	TreeNode<T>* temp;
	if(root==NULL) return NULL;
	if(root->LeftMostChild==current)
		return root;
	if((temp=getParent(root->LeftMostChild(),current))!=NULL)
		return temp;
	else
		return getParent(root->RightSibling(),current);

}
template <class T>
TreeNode<T>* Tree<T>::parent(TreeNode<T>* current)
{//返回current的父结点
	TreeNode<T>* pointer=current;
	if(pointer!=NULL) return NULL;
	TreeNode<T>* LeftMostChild=NULL;
	while((LeftMostChild=prevSibling(pointer))!=NULL){
		pointer=LeftMostChild;
	}
	LeftMostChild=pointer;
	pointer=root;
	if(LeftMostChild==root){
		return NULL;
	}else{
		return getParent(pointer,LeftMostChild);
	}

}
template <class T>
void Tree<T>::DeleteNodes(TreeNode<T>* root)
{
	if(root){
		DeleteNodes(root->LeftMostChild());
		DeleteNodes(root->RightSibling());
		delete root;
	}
}

先根树周游等于先序周游等价二叉树
后根周游树等于中序周游等价二叉对
//这个好像要横线理解 
template <class T>
void Tree<T>::deleteSubTree(TreeNode<T>* subroot)
{//删除以subroot为根的子树的所有结点
	TreeNode<T>* pointer=prevSibling(subroot);
	if(pointer==NULL){//subroot为最左子节点的情况
		pointer=parent(subroot);
		if(pointer){
			pointer->pChild=subroot->RightSibling();
			subroot->pSibling=NULL;
		}else{
			root=subroot->RightSibling();
			subroot->pSibling=NULL;
		}
	}else{//subroot不是最左子节点
		pointer->pSibling=subroot->RightSibling();
		subroot->pSibling=NULL;
	}
	destroyNodes(subroot);
}
/**
// 先根次序
先访问头一棵树的根，
在先根次序下周游头一棵树树根的子树
在先根次序下周游其它树
// 后根次序
在后根次序下周游头一棵树树根的子树
访问头一棵树的根
在后根次序下周游其它树
**/
//先根等价于叉树的先序
template <class T>
void Tree<T>::rootFirstTraverse(TreeNode<T>* root)
{
	while(root!=NULL)
	{
		//访问当前结点
		visit(root->value());
		//周游头一棵树树根的子树
		rootFirstTraverse(root->LeftMostChild());
		//周游其它树
		root=root->RightSibling();
	}
}
//后根等于二叉权的中序
template <class T>
void Tree<T>::rootFirstTraverse(TreeNode<T>* root)
{
	while(root!=NULL)
	{
		//周游头一棵树树根的子树
		rootFirstTraverse(root->LeftMostChild());
		//访问当前结点
		visit(root->value());
		//周游其它树
		root=root->RightSibling();
	}
}
//递归等价的循环
离散数学 北京大学
集合论与图论
百度雲盘
代数结构与组合数学
http://opencourse.pku.edu.cn/course/opencourse/classification.html

数理逻辑
http://opencourse.pku.edu.cn/course/opencourse/classification.html
//广度优先周游森林
template <class T>
void Tree<T>::widthTraverse(TreeNode<T>* root)
{
	using std::queue;
	queue<TreeNode><T>*> aQueue;
	TreeNode<T>* pointer=root;
	while(pointer){
		aQueue.push(pointer);
		pointer=pointer->RightSibling();
	}
	while(!aQueue.empty()){
		pointer=pointer.front();
		aQueue.pop();
		visit(pointer.value());
		pointer=pointer->LeftMostChild();
		while(pointer){
			aQueue.push(pointer);
			pointer=pointer->RightSibling();
		}
	}
}
//广度优先周游森林
template <class T>
void Tree<T>::widthTraverse1(TreeNode<T>* root)
{
	using std::queue;
	queue<TreeNode<T>*> aQueue;
	TreeNode<T>* pointer=root;
	if(pointer){
		aQueue.push(pointer);
		while(!aQueue.empty()){
			pointer=aQueue.front();
			visit(pointer->value());
			while(pointer->RightSibling()){
				if(pointer->LeftMostChild()){
					aQueue.push(pointer->LeftMostChild());
				}
				pointer=pointer->RightSibling();
				visit(pointer->value());
			}
			if(pointer->LeftMostChild()){
				aQueue.push(pointer->LeftMostChild());
			}
			aQueue.pop();
		}//end while
	}//end if

}
template <class T>
void Tree<T>::widthTraverse2(TreeNode <T> *root)
{
	using std::queue;
	queue<TreeNode<T>*>aQueue;
	TreeNode pointer=root;
	if(pointer){
		aQueue.push(pointer);
		while(!aQueue.empty()){
			pointer=aQueue->pop();

		}
	}
}
//
void print(GTNode * rt){
	while(rt!=NULL){
		visit(rt);
		print(rt->LeftMost_child());//递归左节点
		rt=rt->right_sibling():
	}
}
//完全套用二叉树的框架
void print(GTNode * rt){
	if(rt == NULL) return;
	visit(rt);
	print(rt->leftmost_child());
	print(rt->right_sibling());
}
void print(GTNode * rt){
	if(rt==NULL) return;
	visit(rt);
	print(rt->leftmost_child());
	GTNode *temp=rt->right_sibling();
	while(temp!=NULL){
		print(temp);
		temp=temp->right_sibling();
	}
}



















































