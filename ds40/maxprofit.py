class Solution(object):
    def __init(self):
    def maxprofit(self, prices):
        max = 0
        for i in prices:
            for j in prices[1:]:
                if j - i > max:
                    max = j-i
        return max
    def maxprofit(self, prices):
        min,max=prices[0],0
        for i in prices:
            if i < min:
                min = i
            elif i - min > max:
                max = i - min
        return max