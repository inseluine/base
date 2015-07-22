# coding: utf-8
import sys
nums = sys.stdin.read().split("\n")
print(min([int(x) for x in nums[1:]]))
