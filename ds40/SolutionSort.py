from collections import deque
class SolutionSort(object):
    def __init__(self):
        print('init')
    def quickSort(self, arr):
        if len(arr) < 2:
            return arr
        else:
            pivot = arr[0]
            less = [i for i in arr[1:] if i <= pivot]
            greater = [i for i in arr[1:] if i > pivot]
            return self.quickSort(less) + [pivot] + self.quickSort(greater)
    def merge(self, left, right):
        c = []
        l=r=0
        while l < len(left) and r < len(right):
            if left[l] < right[r]:
                c.append(left[l])
                l += 1
            else:
                c.append(right[r])
                r += 1
        c+=right[r:]
        c+=left[l:]
        return c
    def mergeSort(self, arr):
        if len(arr) <= 1:
            return arr
        mid = len(arr) // 2
        left = self.mergeSort(arr[:mid])
        right = self.mergeSort(arr[mid:])
        return self.merge(left, right)
    def bfsSearch(self, name):
        search_queue = deque()
        search_queue  += graph[name]
        searched = set()

        while search_queue:
            person = search_queue.popleft()
            if person not in searched:
                if self.person_is_seller(person):
                    print(person + " is a mango seller")
                    return True
                else:
                    search_queue += graph[person]
                    searched.add(person)
        return False
    def person_is_seller(self, name):
        return name[-1] == 'm'
    def find_lowest_cost_node(self,costs):
        lowest_cost = float("inf")
        low_cost_node = None
        for node in costs:
            cost = costs[node]
            if cost < lowest_cost and node not in processed:
                lowest_cost = cost
                low_cost_node = node
        return low_cost_node
    def dijkstra(self, costs):
        node = self.find_lowest_cost_node(costs)
        while node is not None:
            cost = costs[node]
            neighbors = graph[node]
            for n in neighbors.keys():
                new_cost = cost + neighbors[n]
                if costs[n] > new_cost:
                    costs[n] = new_cost
                    parents[n] = node
            processed.append(node)
            # 更新之后，再找的node就不是原来的node
            node = self.find_lowest_cost_node(costs)

graph = {}
# graph["you"] = ["alice", "bob", "claire"]
# graph["bob"] = ["anuj", "peggy"]
# graph["alice"] = ["peggy"]
# graph["claire"] = ["thom", "jonny"]
# graph["anuj"] = []
# graph["peggy"] = []
# graph["thom"] = []
# graph["jonny"] = []


# graph["start"] = {}
# graph['start']["a"] = 6
# graph["start"]["b"] = 2
# graph["a"] = {}
# graph["a"]["fin"] = 1
# graph["b"] = {}
# graph["b"]["a"] = 3
# graph["b"]["fin"] = 5
# graph["fin"] = {}
#
# costs = {}
# infinity = float("inf")
# costs["a"] = 6
# costs["b"] = 2
# costs["fin"] = infinity
#
# parents = {}
# parents["a"] = "start"
# parents["b"] = "start"
# parents["fin"] = None
#
# processed = []



if __name__ == '__main__':
    s = SolutionSort()
    print(s.quickSort([10,5,2,3,9,8,1,7]))
    #print([8,5,4,7,1,3,6,2])
    #print(s.mergeSort([8,5,4,7,1,3,6,2]))
    #s.bfsSearch('you')
    # s.dijkstra(costs)
    # print(costs['fin'])
    # print(parents)
