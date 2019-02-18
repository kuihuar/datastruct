import re

p = re.compile(r'(\d+)-(\d+)-(\d+)')

# print(p.match('2018-7-21').groups())
#
# year, month, day = p.match('we2018-7-21').groups()
#
# print(year)
# print(r'\nx\n')

# print(p.search('we2018-7-21'))
#
# phone = '123-456-7 # this is phone'
#
# p2 = re.sub(r'\D','', phone)
#
# print(p2)

import time


# print(time.strftime('%Y-%m-%d %H:%M:%S'))
# print(time.strftime('%Y%m%d'))

import numpy as np

# arr1 = np.array([2,3,4])
# arr2 = np.array([3,4,5])
#
# data = [[1,2,3],[4,5,6]]
#
# print(np.empty((3,2,3)))

from pandas import Series, DataFrame
import pandas as pd

data = {"city":['beijing', 'shanghai', 'shanghai', 'beijing', 'beijing'],
        'year':[2016, 2017, 2018, 2017, 2018],
        'pop':[1.5, 1.7, 3.6, 2.4, 2.9]}

pop = {'beijing':{2008: 1.5, 2009: 2.0},
       'shanghai':{2008: 2.0, 2009: 3.6}}

frame3 = DataFrame(pop)

# obj4 = Series([4.5,7.2,-5.3], index=[0,2,4])
# print(obj4)
# obj5 = obj4.reindex(range(6),method='ffill')
# print(obj5)

from numpy import nan as NA

# data = Series([1, NA, 2, 3])
data2 = DataFrame([[1,6.5,3],[1,NA, NA],[NA,NA,NA]])

data2[4] = NA
print(data2)
print(data2.dropna(axis=1,how='all'))
data2.fillna(0, inplace=True)

print(data2)




# frame = DataFrame(data)
#
# print(frame)
# frame2 = DataFrame(data, columns=['year', 'city', 'pop'])
#
# print(frame2)
#
# print(frame2['city'])
# print(frame2.year)
#
#
# frame2['new'] = 100
#
# frame2['cap'] = frame2.city == 'beijing'
#
# print(frame2)
#
#



# obj = Series([4,5,6,-7])
# a = {3:'f','d':4}
# print(a)
#
#
# obj2 = Series([4,7,-5,3], index=['d','b','c','a'])
#
# obj2['c'] = 'c'
# print('f' in obj2)

# sdata = {'beijing':3500 , 'shanghai':5000, 'shenzhen':10000}
# print(sdata)
# obj3 = Series(sdata)
#
# print(obj3)
#
# obj3.index = ['bj', 'sh', 'sz']
#
# print(obj3)





















# import datetime
# import random
# print(random.randint(1,10))
# print(random.choice(['q','a','cc','d']))
# import os
#
# print(os.path.abspath('..'))
#
# print(os.path.exists('/Users'))
# print((os.path.isfile('/Users')))
# os.path.join('/tmp/a', 'b/c')
# from pathlib import Path
# p = Path('/tmp/a/b')
#
# Path.mkdir(p, parents=True)


