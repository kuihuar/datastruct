#!/usr/bin/python

class Solution:
    def __init__(self):
        print(self)
    def maxSligingWindow(self, nums, k):
        if not nums:
            return []
        window, res = [],[]#window 存储的是下标 res存储的是结果
        for i, x in enumerate(nums):
            if i >= k and window[0] <= i - k:#window只有k大小，i-k表示超过左界
                window.pop(0)
            while window and nums[window[-1]] <= x:
                window.pop()
            window.append(i)
            if i >= k-1:
                res.append(nums[window[0]])
        return res
