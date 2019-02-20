# from threading import Thread, current_thread
# import time
# import random
# from queue import Queue
#
# queue = Queue(5)
#
# class ProducerThread(Thread):
#     def run(self):
#         name = current_thread().getName()
#         nums = range(100)
#         global queue
#         while True:
#             num = random.choice(nums)
#             queue.put(num)
#             print('生产者 %s 生产了数据 %s' %(name, num))
#             t = random.randint(1,3)
#             time.sleep(t)
#             print('生产者 %s 睡眠了 %s 秒' %(name, t))
#
#
# class ConsumerThread(Thread):
#     def run(self):
#         name = current_thread().getName()
#         global queue
#         while True:
#             num = queue.get()
#             queue.task_done()
#             print('消费者 %s 消费数据 %s' %(name, num))
#             t = random.randint(1,5)
#             time.sleep(t)
#             print('消费者 %s 睡眠了 %s 秒' %(name, t))
#
# p1 = ProducerThread(name = 'p1')
# p1.start()
# p2 = ProducerThread(name = 'p2')
# p2.start()
# p3 = ProducerThread(name = 'p3')
# p3.start()
#
# c1 = ConsumerThread(name= 'c1')
# c1.start()
# c2 = ConsumerThread(name= 'c2')
# c2.start()


from pandas import Series,DataFrame
#
# data2 = Series(np.random.randn(10), index=[['a','a','a','b','b','b','c','c','d','d'], [1,2,3,1,2,3,1,2,2,3]])
#
# #print(data2['b':'c'])
#
# print(data2.unstack().stack())

import numpy as np
import matplotlib.pyplot as plt
import seaborn as sns
import warnings
warnings.filterwarnings('ignore')


# x = np.arange(1,10)
# y = pow(2,x)+4
#
# fig = plt.figure()
# plt.scatter(x,y, c='r', marker='x')
# plt.show()
# import pandas as pd
#
# iris = pd.read_csv("/tmp/a.csv")
# print(iris.head())
# # plt.figure(1,dpi=50)
#
# data = [1,1,2,2,2,3,3,4,4,5,5,6,6,8]
# plt.hist(data)


# for i in range(1,5):
#     plt.plot(x,np.sin(x/i))
# plt.show()
# plt.plot(x, np.sin(x))
plt.show()