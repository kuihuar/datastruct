int findPat(String s, String p, int startIndex)
{
	int lastIndex = s.size - p.size;
	if(lastIndex < startIndex){
		return -1;
	}
	// i指向s内部的游标
	// j指向p内部的游标
	int i = startIndex, j=0;
	while(i<=s.size && j<p.size)
	{
		if(p.str[j] == s.str[i])
		{
			i++;
			j++;
		}
		else
		{
			i=j-j+1;
			j=0;
		}

		if(j==p.size)
			return (i-j);
		else
			return -1; 
	}
}