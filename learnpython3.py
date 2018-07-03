#! /usr/bin/env python3
# -*- coding: utf-8 -*-

name = input('who are u? \n')
print('你好!',name)
age = int(input('how is your old?\n'))
# age = int(s1)
if age >= 18:
    print('your age is', age)
    print('adult')
elif age > 6:
    print('teenager')
else:
    print('kid')

