#!/usr/bin/env python

#反转列表
class Solution():
    def __init__(self):
    def reverseList(self, head):
        cur, prev = head, None
        #while cur:
        #    cur.next, prev, cur = prev, cur, cur.next
        return prev
    def swapPairs(self, head):
        pre, pre.next = self,head
        while pre.ext and pre.next.next:
            a=pre.next
            b=a.next
            pre.next,b.next,a.next = b,a, b.next
            pre = a
        return self.next
    def hasCycle(self, head):
        fast = slow = head;
        while slow and fast and fast.next:
            slow = slow.next
            fast = fast.next.next
            if slow is fast:
                return True
        return False
    def isValid(self, s):
        stack = []
        paren_map = {')':'(', ']':'[', '}':'{'}
        for c in s:
            if c not in paren_map:
                stack.append(c)
            elif not stack or paren_map[c] != stack.pop():
                return False
        return not stack

