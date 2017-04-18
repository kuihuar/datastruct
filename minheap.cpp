template <class T>
class MinHeap
{
private:
	T* heapArray;
	int CurrentSize;
	int maxSize;
	void BuidHeap();
public:
	MinHeap(const int n);
	virtual ~MinHeap(){delete []heapArray};

	bool isLeaf() const;
	int leftChild(int pos) const;
	int rightChild(int pos) const;
	int parent() const;
	bool remove(int pos,T& node);
	//const引用形参，
	bool insert(const T& newNode);
	T& removeMIn();
	void ShiftDown(int left);
	void ShiftUP(int postion);

	/* data */
};
template<T>
MinHeap<T>::MinHeap(const int n){
	if(n<=0)return;
	CurrentSize=0;
	maxSize=n;
	heapArray=new T[maxSize];
	BuidHeap();
}
template<class T>
void MinHeap::BuidHeap()
{
	for(int i=CurrentSize/2-1;i>=0;i--){
		ShiftDown(i);
	}
};


template <class T>
void MinHeap<T>::ShiftDown(int postion)
{
	int i=postion;
	int j=2*i+1;
	T temp=heapArray[i];
	while(j<CurrentSize){
		if(j<CurrentSize-1 && heapArray[j]>heapArray[j+1] ){
			j++;
		}

		if(temp>heapArray[j]){
			heapArray[i]=heapArray[j];
			//终于理解了这两行了
			//如果一共有5层，已经比较到第2层了。还是要再往下层继续
			i=j;
			j=j*2+1;
		}//end if
		break;
	}//end while
	heapArray[i]= temp;
}
template<class T>
bool MinHeap<T>::Remove(int pos, T& node){
	if(pos <0  || pos>=CurrentSize) return false;
	T temp=heapArray[0];
	heapArray[pos]=heapArray[--CurrentSize];
	ShiftUp(pos);
	ShiftDown(pos);
	node=temp;
	return true;
}

2 3 5 7 17 19 23 29 31
//haffman树类
template <class T>
class HuffmanTree
{
 
private:
  HuffmanTreeNode<T>* root;//树根
  void MergeTree(HuffmanTreeNode<T> &ht1,
  	HuffmanTreeNode<T> &ht2,
  	HuffmanTreeNode<T>* parent);
  void DeleteTree(HuffmanTreeNode<T>* root);
public:
	HuffmanTreeNode(T weight[], int n);
	virtual ~HuffmanTree(){DeleteTree(root);};
};

template <class T>
HuffmanTree<T>::HuffmanTree(T weight[], int n) //权值数据，n个节点
{
	MinHeap<HuffmanTreeNode<T>> heap;//定义最小堆
	HuffmanTreeNode<T> *parent,&leftChild,&rightChild;
	HuffmanTreeNode<T>* NodeList=new HuffmanTreeNode<T>[n];
	for(int i=0; i<n;i++){//创建独根节点
		NodeList[i].element=weight[i];
		NodeList[i].parent=NodeList[i].left=NodeList[i].right=NULL;
		heap.Insert(NodeList[i]);
	}//end for
	for(int i=0;i<n-1;i++)
	{
		parent=new HuffmanTreeNode<T>;
		firstchild=heap.Delete();
		secondChild=heap.Delete();
		MergeTree(firstchild,secondChild,parent);
		root=parent;
	}
	delete []NodeList;

}


























