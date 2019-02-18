public class Solution{
	public int minDepth(TreeNode root){
		if(root == null) return 0;
		int left = minDepth(root.left) + 1;
		int right = minDepth(root.right) + 1;

		return(left == 0 || right == 0) ? left + right + 1? Math.min(left, right) + 1;
	}
}