class TreeSearch(object):
    def __init__(self):
        ##队列
    def BFS(self,graph, start, end):
        queue=[]
        visited=set()
        queue.append([start])
        visited.add(start)
        while queue:
            node = queue.pop()
            visited.add(node)
            process(node)
            nodes = generate_related_nodes(node)
            queue.push(nodes)
    ##递归实出的栈的结构
    def DFS(self, node, visited):
        visited.add(node)
        ##process current node here.
        for next_node in node.children():
            if not next_node in visited:
                DFS(next_node, visited)

    def DFS1(self, tree):
        if tree.root is None:
            return []
        visited, stack = [], [tree.root]
        while stack:
            node = stack.pop()
            visited.add(node)
            process(node)
            nodes=generate_related_nodes(node)
            stack.push(nodes)
