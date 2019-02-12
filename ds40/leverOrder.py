import collections
class Solution(object):

    ##bfs solution
    def levelOrder(self, root):
        if not root: return []

        result = []
        queue= collections.deque()
        queue.append(root)
        #visited = set(root)

        while queue:
            level_size = len(queue)##当前层的总长度
            current_level=[]
            for _ in range(level_size):
                node = queue.popleft()##处理的语句
                current_level.append(node.val)
                if node.left: queue.append(node.left)
                if node.right: queue.append(node.right)
            result.append(current_level)
        return result
    def leverOrderDfs(self,root):
        if not root: return []
        self.result = []
        self._dfs(root, 0)
        return self.result
    def _dfs(self, node, level):
        if not node: return

        ##如果结果比当前行小的话，放个空，方便后面的元素放进来
        if(len(self.result)) < level +1:
            self.result.append([])

        self.result[level].append(node.val)
        self._dfs(node.left, level + 1)
        self._dfs(node.right, level + 1)


    def maxDepth(self, root):
        if not root: return 0
        return 1 + max(self.maxDepth(root.left), self.maxDepth(root.right))
    def minDepth(self, root):
        if not root: return 0
        if not root.left: return 1 + minDepth(root.right)
        if not root.right: return 1+ minDepth(root.left)

        leftDepth = minDepth(root.left)
        rightDepth = minDepth(root.right)

        result = 1 + min(leftDepth, rightDepth)
        return result