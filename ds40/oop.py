class Player():
    def __init__(self, name, hp, occu):
        self.__name = name
        self.hp = hp
        self.occu = occu
    def updateName(self, newname):
        self.__name = newname
    def print_role(self):
        print('%s: %s %s' %(self.__name, self.hp, self.occu))
class Monster():
    '定义怪物'
    def __init__(self, hp=100):
        self.hp = hp
    def run(self):
        print('move some position')
    def whoami(self):
        print('I am Monster')


class Animals(Monster):
    '普通怪物'
    def __init__(self, hp=10):
        super().__init__(hp)



class Boss(Monster):
    'Boss怪物'
    def __init__(self,hp):
        super().__init__(hp)
    def whoami(self):
        print('I am Boss')


a3 = Boss(800)
a3.whoami()
a1  = Monster(200)
print(a1.hp)
a1.run()
a2 = Animals(1)
print(a2.hp)
a2.run()


print('a1 \' type %s' %type(a1))
print('a2 \' type %s' %type(a2))
print('a3 \' type %s' %type(a3))

print((isinstance(a2, Monster)))




# user1 = Player('tom', 100, 'war')
# user1.updateName('jerry')
# user1.print_role()