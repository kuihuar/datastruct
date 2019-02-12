class Solution(object):
    def __init__(self):
        print('I am Solution')
    def hammingWeight(self, n):
        rst =0
        mask = 1
        for i in range(32):
            if n & mask:
                rst += 1
                mask = mask << 1
        return rst
    def hammingW(self, n):
        ret = 0
        while n:
            ret+=1
            n = n&n-1
        return ret
    def isPowerOfTwo(self, n):
        return n > 0 and not ( n&n-1 )
    def countbits(self, n):
        bits = [0] * n
        for i in range(1, n, 1):
            bits[i] += bits[i & (i-1)] + 1
        return bits

    def totalNQueens(self, n):
        if n < 1: return []
        self.count = 0
        self.dfs(n,0,0,0,0)
        return self.count
    def dfs(self, n, row, cols, pie, na):
        # rcursion terminator
        if row >= n:
            self.count += 1
            return
        # 得到当前所有的空位
        bits = (~(cols | pie | na)) & (( 1<< n) -1)
        while bits:
            p = bits & -bits # 取位最低位的 1
            self.dfs(n,row+1, cols|p, (pie |p) << 1, (na|p)>>1)
            bits = bits & (bits - 1) ## 去掉最低位的1
    def fib(self, n, []):
        if  n <=0:
            return 0
        elif n == 1:
            return 1
        elif not mem[n]{
            mem[n] = self.fib(n-1) + self(n-1)
        }
        return mem[n]


if __name__  == '__main__':
    solution = Solution()
    ret = solution.totalNQueens(4)
    print ret
    exit(0)