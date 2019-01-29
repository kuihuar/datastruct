class Solution_BST:
    def __init__(self):
    def isValidBST(self, root):
        inorder = self.inorder(root)
        return inorder == list(sorted(set(inorder)))
    def inorder(self, root):
        if root is None:
            return []
        return self.inorder(root.left) + [root.val] + self.inorder(root.right)
    def isValisdBST1(self, root):
        self.prev = None
        return self.helper(root)
    def helper(self, root):
        if root is None:
            return True
        if not self.helper(root.left):
            return False
        if self.prev and self.prev.val >= root.val:
            return False
        self.prev = root
        return self.helper(root.right)
    ##递归
    def lowestCommonAncestor(self, root, p, q):
        if p.val < root.val > q.val:
            return self.lowestCommonAncestor(root.left, p, q)
        if p.val > root.val < q.val:
            return self.lowestCommonAncestor(root.right, p, q)
        return root
    ##非递归
    def lowestComonAncestor1(self, root, p, q):
        while root:
            if p.val < root.val > p.val:
                root = root.left
            elif p.val > root.val < q.val:
                root = root.right
            else:
                return root

    def preorder(self, root):
        self.traverse_path.append(root.val)
        self.preorder(root.left)
        self.preorder(root.right)
    def inorder(self, root):
        if root:
            self.inorder(root.left)
            self.traverse_path.append(root.val)
            self.inorder(root.right)
    def postorder(self, root):
        if root:
            self.postorder(root.left)
            self.postorder(root.right)
            self.traverse_path.append(root.val)

    def mypow(self, x, n):
        if not n:
            return 1
        if n < 0:
            return 1 / self.mypow(x, -n)
        if n % 2:###奇数
            return x * self.mypow(x, n-1)
        return self.mypow(x*x, n/2)
    def myPow(self, x, n):
        if not n:
            return 1
        if n < 0:
            return 1 / self.myPow(x, -1)
        if n % 2:
            return self.myPow(x, n/2) * self.myPow(x, n/2) * x
        return self.myPow(x, n/2) * self.myPow(x, n/2)

    def myPow1(self, x, n):
        if n < 0:
            x = 1/x
            n = -n
        pow = 1
        while n:
            if n & 1:
                pow *= x
            x *= x
            n >>= 1
        return pow






















