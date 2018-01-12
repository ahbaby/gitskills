#! /usr/bin/env python3
# -*- coding:UTF-8 -*-

classmates = ['Alex','Ben','Candy']
for mates in classmates:
    print('hello,', mates)
class_score = {'Alex':59, 'Ben':70, 'Candy':99}
for cs in class_score:
    print(cs)

sum = 0
for s in range(101):
    sum += s
print(sum)

x = 1
while x <= 20:
    x += 1
    if x % 2 == 0:
        continue
    print(x)
print('END')
