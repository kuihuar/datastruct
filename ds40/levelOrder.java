public levelOrder{
	public List<List<Integer>> levelOrder(TreeNode root){
		List<List<Integer>> res = new ArrayList<>();
		if (root = null)
			return res;

		Queue<TreeNode> q = new LinkList<>();
		q.add(root);

		while(!q.isEmpty()){
			int levelSize = q.size();
			List<Integer> currentLevel = new ArrayList<>();

			for(int i =0; i < levelSize; i++){
				TreeNode currNode = q.poll();
				currentLevel.add(currNode.val);
				if(currNode.left != null)
					q.add(currNode.left);
				if(currNode.right != null)
					q.add(currNode.right)
			}
			res.add(currentLevel);
		}

		return res;
	}
}