# def a_line(a,b):
#     def arg_y(x):
#         return a*x+b
#     return arg_y

# import mymod
#
#
# def a_line(a, b):
#     return lambda x: a * x + b
#
#
# line = a_line(3, 5)
# print(type(line))


# import time
#
# def timer(func):
#     def wrapper():
#         start_time = time.time()
#         func()
#         stop_time = time.time()
#         print("take %s seconds" % (stop_time-start_time))
#     return wrapper
#
#
# @timer
# def i_can_sleep():
#     time.sleep(3)
#     return 0
#
#
# i_can_sleep()
# def new_tips(argv):
#     def tips(func):
#         def nei(a, b):
#             print("start %s %s" %(argv, func.__name__))
#             func(a, b)
#             print("end")
#             return 0
#         return nei
#     return tips
#
# @new_tips('add Module')
# def add(a, b):
#     print(a + b)
#
# print(add(3, 4))

# fd = open("../liu.txt")
# try:
#     for line in fd:
#         print(line)
# finally:
#     fd.close()

# with open("../liu.txt") as fd:
#     for line in fd:
#         print(line)

#from 模块名 import 方法名
#import 模块名
# import
# mymod.print_me()



user1 = {'name':'tom', 'hp':100}
user2 = {'name':'jerry', 'hp':90}

def print_role(rolename):
    print('name is %s, and hp is %s' %(rolename['name'], rolename['hp']));

print_role(user1)



class Player():
    def __init__(self, name, hp):
        self.name = name
        self.hp = hp
    def print_role(self):
        print('%s, %s' %(self.name, self.hp))


user3 = Player('ak', 30)
user3.print_role()




permutation and combination



def binary_search(self,list, item):
    low = 0
    high = len(list) - 1

    while low <= high:
        mid = low + (high - low) / 2
        if item == list[mid]:
            return mid
        if item < list[mid]:
            high = mid - 1
        else:
            low = mid + 1
    return None





















