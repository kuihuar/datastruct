# class TestWith():
#     def __enter__(self):
#         print('run')
#     def __exit__(self, exc_type, exc_val, exc_tb):
#         if exc_tb is None:
#             print('normal exit')
#         else:
#             print('has error %s' %exc_tb)
#
#
#
# with TestWith():
#     print('Test is running')
#     raise NameError('testNameError')

#并发
import threading
from threading import current_thread


class myThread(threading.Thread):
    def run(self):
        print(current_thread().getName(), 'start')
        print('run')
        print(current_thread().getName(), 'stop')


t1 = myThread()
t1.start()
t1.join()

print(current_thread().getName(), 'end')













# import threading
# import time
# from threading import current_thread
#
#
# def myThread(arg1, arg2):
#     print(current_thread().getName(), 'start')
#     print('%s %s' %(arg1, arg2))
#
#     time.sleep(1)
#     print(current_thread().getName(), 'stop')
#
# for i in range(1,6,1):
#     #t1 = myThread(i, i+1)
#     t1 = threading.Thread(target=myThread, args=(i, i+1))
#     t1.start()
#
# print(current_thread().getName(), 'end')










