class Solution(object):
    def climbStarirs(self, n):
        x,y=1,1
        for _ in range(1, n, 1):
            x,y = y, x+y
        return y
    def maxProduct(self, nums):
        if nums is None: return 0
        res, curMax, curMin = nums[0], nums[0], nums[0]
        for i in range(1, len(nums)):
            num = nums[i]
            curMax , curMin = curMax  * num, curMin * num
            curMax, curMin = max(curMax, curMin, num), min(curMax, curMin, num)
            res = curMax if curMax > res else res
            print (num, curMax, curMin, res)
        return res
    def productMax(self, nums):
        if nums is None: return 0
        dp = [[0 for _ in range(2)] for _ in range(2)]
        dp[0][1], dp[0][0], res = nums[0],nums[0],nums[0]

        for i in range(1, len(nums)):
            x, y = i%2, (i-1)%2
            dp[x][0] = max(dp[y][0] * nums[i], dp[y][1] * nums[i], nums[i])
            dp[x][1] = min(dp[y][0] * nums[i], dp[y][1] * nums[i], nums[i])
            res = max(res, dp[x][0])
        return res
    def lengthOfLIS(self, nums):
        if not nums or len(nums) == 0:
            return 0
        res = 1
        dp = []
        for i in range(0,len(nums)):
            dp[i]=1

        for i in range(1, len(nums)):
            for j in range(0, i):
                if nums[j] < nums[i]:
                    dp[i] = max(dp[i], dp[j] + 1)
            res = max(res, dp[i])
        return res
    def minDistance(self, word1, word2):
        m, n = len(word1), len(word2)
        dp = [[0 for _ in range(n + 1)] for _ in range(m +1)]
        for i in range(m + 1): dp[i][0] = i
        for j in range(n + 1): dp[0][j] = j
        for i in range(1, m + 1):
            for j in range(1,n + 1):
                dp[i][j] = min(dp[i-1][j-1] +(0 if word1[i-1] == word2[j-1] else 1),#insert
                               dp[i-1][j] + 1, #delete
                               dp[i][j-1] +1) #replace
        return dp[m][n]

if __name__ == '__main__':
    s = Solution()
    a = s.minDistance('wordbfiii', 'words')
    print a