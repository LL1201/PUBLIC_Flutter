import numpy as np

#dichiarazione array
arr = np.array([1, 2, 3, 4, 5])
print(arr)
print(arr.shape)

#dichiarazione matrice
arr2 = np.array([[1, 2, 3, 4, 5],[6, 7, 8, 9, 10]])
print(arr2)
print(arr2.shape)

#dichiarazione array casuale
arr3=np.random.randint(0, high=255, size=(100, 100))
print(arr3)
print(arr3.shape)

