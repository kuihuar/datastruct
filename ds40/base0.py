# def a_line(a,b):
#     def arg_y(x):
#         return a*x+b
#     return arg_y

def a_line(a, b):
    return lambda x:a*x+b
line = a_line(3,5)
print(type(line))