class Solution{
	public List<String> gererateParenthesis(int n) {
		List<String> result = new ArrayList<String>();
		gererateParenthesis("", result, n, n);
		return result;
	}
	public void gererateParenthesis(String sublist, List<String> result, int left, int right) {
		if (left ==0 && right == 0) {
			result.add(sublist);
			return;
		}
		if(left > 0){
			gererateParenthesis(sublist + "(", result, left -1, right);
		}
		if(right > left){
			gererateParenthesis(sublist + ")", result, left, right - 1)
		}
	}
}